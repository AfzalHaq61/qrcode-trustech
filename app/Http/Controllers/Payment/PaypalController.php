<?php

namespace App\Http\Controllers\Payment;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use App\Models\Config;
use App\Models\QrCode;
use PayPal\Api\Amount;
use App\Models\Barcode;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Transaction as ScriptTransaction;

class PaypalController extends Controller
{
    // PayPal
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_configuration = Config::get();

        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration[4]->config_value, $paypal_configuration[5]->config_value));
        $this->_api_context->setConfig(array(
            'mode' => $paypal_configuration[3]->config_value,
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'DEBUG',
        ));
    }

    public function payWithpaypal(Request $request, $planId)
    {
        if (Auth::user()) {

            // Queries
            $plan_details = Plan::where('id', $planId)->where('status', 1)->first();
            $config = Config::get();
            $userData = User::where('id', Auth::user()->id)->first();

            // Check plan
            if ($plan_details == null) {
                return view('errors.404');
            } else {

                // Current plan price
                $plan_price = $plan_details->plan_price * ($plan_details->validity/30);

                // Paid amount
                $amountToBePaid = ((int)($plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_price);

                $payer = new Payer();
                $payer->setPaymentMethod('paypal');

                $item_1 = new Item();
                $item_1->setName($plan_details->plan_name . " Plan")
                    /** item name **/
                    ->setCurrency($config[1]->config_value)
                    ->setQuantity(1)
                    ->setPrice($amountToBePaid);
                /** unit price **/

                $item_list = new ItemList();
                $item_list->setItems(array($item_1));

                $amount = new Amount();
                $amount->setCurrency($config[1]->config_value)
                    ->setTotal($amountToBePaid);
                $redirect_urls = new RedirectUrls();
                /** Specify return URL **/
                $redirect_urls->setReturnUrl(URL::route('paypalPaymentStatus'))
                    ->setCancelUrl(URL::route('paypalPaymentStatus'));

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription($plan_details->plan_name . " Plan");

                $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                try {
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    if (\Config::get('app.debug')) {
                        \Session::put('error', 'Connection timeout');
                        return redirect()->route('user.plans')->with('failed', trans("Payment failed, Something went wrong!"));
                    } else {
                        \Session::put('error', 'Some error occur, sorry for inconvenient');
                        return redirect()->route('user.plans')->with('failed', trans("Payment failed, Something went wrong!"));
                    }
                }
                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirect_url = $link->getHref();
                        break;
                    }
                }

                // Generate JSON
                $invoice_details = [];

                $invoice_details['from_billing_name'] = $config[16]->config_value;
                $invoice_details['from_billing_address'] = $config[19]->config_value;
                $invoice_details['from_billing_city'] = $config[20]->config_value;
                $invoice_details['from_billing_state'] = $config[21]->config_value;
                $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
                $invoice_details['from_billing_country'] = $config[23]->config_value;
                $invoice_details['from_vat_number'] = $config[26]->config_value;
                $invoice_details['from_billing_phone'] = $config[18]->config_value;
                $invoice_details['from_billing_email'] = $config[17]->config_value;
                $invoice_details['to_billing_name'] = $userData->billing_name;
                $invoice_details['to_billing_address'] = $userData->billing_address;
                $invoice_details['to_billing_city'] = $userData->billing_city;
                $invoice_details['to_billing_state'] = $userData->billing_state;
                $invoice_details['to_billing_zipcode'] = $userData->billing_zipcode;
                $invoice_details['to_billing_country'] = $userData->billing_country;
                $invoice_details['to_billing_phone'] = $userData->billing_phone;
                $invoice_details['to_billing_email'] = $userData->billing_email;
                $invoice_details['to_vat_number'] = $userData->vat_number;
                $invoice_details['tax_name'] = $config[24]->config_value;
                $invoice_details['tax_type'] = $config[14]->config_value;
                $invoice_details['tax_value'] = $config[25]->config_value;
                $invoice_details['invoice_amount'] = $amountToBePaid;
                $invoice_details['subtotal'] = $plan_details->plan_price;
                $invoice_details['tax_amount'] = (int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100;

                // Store into Database before starting PayPal redirect
                $transaction = new ScriptTransaction();
                $transaction->transaction_date = now();
                $transaction->transaction_id = $payment->getId();
                $transaction->user_id = Auth::user()->id;
                $transaction->plan_id = $plan_details->id;
                $transaction->desciption = $plan_details->plan_name . " Plan";
                $transaction->payment_gateway_name = "PayPal";
                $transaction->transaction_amount = $amountToBePaid;
                $transaction->transaction_currency = $config[1]->config_value;
                $transaction->invoice_details = json_encode($invoice_details);
                $transaction->payment_status = "PENDING";
                $transaction->save();

                /** add payment ID to session **/
                \Session::put('paypal_payment_id', $payment->getId());
                if (isset($redirect_url)) {
                    /** redirect to paypal **/
                    return Redirect::away($redirect_url);
                }

                \Session::put('error', 'Unknown error occurred');
                return redirect()->route('user.plans')->with('failed', trans("Payment failed, Something went wrong!"));
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function paypalPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        $orderId = $payment_id;
        $transaction_details = ScriptTransaction::where('transaction_id', $orderId)->where('status', 1)->first();
        $user_details = User::find(Auth::user()->id);
        $config = Config::get();

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            ScriptTransaction::where('transaction_id', $orderId)->update([
                'transaction_id' => $orderId,
                'payment_status' => 'FAILED',
            ]);

            return redirect()->route('user.plans')->with('failed', trans("Payment failed, Something went wrong!"));
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $plan_data = Plan::where('id', $transaction_details->plan_id)->first();
            $term_days = $plan_data->validity;


            // Check plan validity
            if ($user_details->plan_validity == "") {

                // Add days
                $plan_validity = Carbon::now();
                $plan_validity->addDays($term_days);

                $invoice_count = ScriptTransaction::where("invoice_prefix", $config[15]->config_value)->count();
                $invoice_number = $invoice_count + 1;

                // Update transactions details
                ScriptTransaction::where('transaction_id', $orderId)->update([
                    'transaction_id' => $orderId,
                    'invoice_prefix' => $config[15]->config_value,
                    'invoice_number' => $invoice_number,
                    'payment_status' => 'SUCCESS',
                ]);

                // Update plans details for user
                User::where('id', Auth::user()->id)->update([
                    'plan_id' => $transaction_details->plan_id,
                    'term' => $term_days,
                    'plan_validity' => $plan_validity,
                    'plan_activation_date' => now(),
                    'plan_details' => $plan_data
                ]);

                // Generate JSON
                $encode = json_decode($transaction_details['invoice_details'], true);
                $details = [
                    'from_billing_name' => $encode['from_billing_name'],
                    'from_billing_email' => $encode['from_billing_email'],
                    'from_billing_address' => $encode['from_billing_address'],
                    'from_billing_city' => $encode['from_billing_city'],
                    'from_billing_state' => $encode['from_billing_state'],
                    'from_billing_country' => $encode['from_billing_country'],
                    'from_billing_zipcode' => $encode['from_billing_zipcode'],
                    'transaction_id' => $transaction_details->transaction_id,
                    'to_billing_name' => $encode['to_billing_name'],
                    'invoice_currency' => $transaction_details->transaction_currency,
                    'subtotal' => $encode['subtotal'],
                    'tax_amount' => $encode['tax_amount'],
                    'invoice_amount' => $encode['invoice_amount'],
                    'invoice_id' => $config[15]->config_value . $invoice_number,
                    'invoice_date' => $transaction_details->created_at,
                    'description' => $transaction_details->desciption,
                    'email_heading' => $config[27]->config_value,
                    'email_footer' => $config[28]->config_value,
                ];

                // Send email to customer
                try {
                    Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                } catch (\Exception $e) {
                }

                // Page redirect
                return redirect()->route('user.plans')->with('success', trans('Plan activation success!'));
            } else {

                $message = "";

                // Check plan id
                if ($user_details->plan_id == $transaction_details->plan_id) {

                    // Check if plan validity is expired or not.
                    $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
                    $current_date = Carbon::now();
                    $remaining_days = $current_date->diffInDays($plan_validity, false);

                    // Check previous plan validity
                    if ($remaining_days > 0) {
                        $plan_validity = Carbon::parse($user_details->plan_validity);
                        $plan_validity->addDays($term_days);
                        $message = "Plan renewed successfully!";
                    } else {
                        $plan_validity = Carbon::now();
                        $plan_validity->addDays($term_days);
                        $message = "Plan renewed successfully!";
                    }

                    // Making all QR codes inactive, For Plan change
                    QrCode::where('user_id', Auth::user()->id)->update([
                        'status' => 0,
                    ]);
                    // Making all Barcodes inactive, For Plan change
                    Barcode::where('user_id', Auth::user()->id)->update([
                        'status' => 0,
                    ]);
                } else {

                    // Making all QR codes inactive, For Plan change
                    QrCode::where('user_id', Auth::user()->id)->update([
                        'status' => 0,
                    ]);
                    // Making all Barcodes inactive, For Plan change
                    Barcode::where('user_id', Auth::user()->id)->update([
                        'status' => 0,
                    ]);

                    // Add days
                    $plan_validity = Carbon::now();
                    $plan_validity->addDays($term_days);
                    $message = trans("Plan activated successfully!");
                }

                $invoice_count = ScriptTransaction::where("invoice_prefix", $config[15]->config_value)->count();
                $invoice_number = $invoice_count + 1;

                // Update transactions details
                ScriptTransaction::where('transaction_id', $orderId)->update([
                    'transaction_id' => $orderId,
                    'invoice_prefix' => $config[15]->config_value,
                    'invoice_number' => $invoice_number,
                    'payment_status' => 'SUCCESS',
                ]);

                // Update plans details for user
                User::where('id', Auth::user()->id)->update([
                    'plan_id' => $transaction_details->plan_id,
                    'term' => $term_days,
                    'plan_validity' => $plan_validity,
                    'plan_activation_date' => now(),
                    'plan_details' => $plan_data
                ]);

                // Generate JSON
                $encode = json_decode($transaction_details['invoice_details'], true);
                $details = [
                    'from_billing_name' => $encode['from_billing_name'],
                    'from_billing_email' => $encode['from_billing_email'],
                    'from_billing_address' => $encode['from_billing_address'],
                    'from_billing_city' => $encode['from_billing_city'],
                    'from_billing_state' => $encode['from_billing_state'],
                    'from_billing_country' => $encode['from_billing_country'],
                    'from_billing_zipcode' => $encode['from_billing_zipcode'],
                    'transaction_id' => $transaction_details->transaction_id,
                    'to_billing_name' => $encode['to_billing_name'],
                    'invoice_currency' => $transaction_details->transaction_currency,
                    'subtotal' => $encode['subtotal'],
                    'tax_amount' => $encode['tax_amount'],
                    'invoice_amount' => $encode['invoice_amount'],
                    'invoice_id' => $config[15]->config_value . $invoice_number,
                    'invoice_date' => $transaction_details->created_at,
                    'description' => $transaction_details->desciption,
                    'email_heading' => $config[27]->config_value,
                    'email_footer' => $config[28]->config_value,
                ];

                // Send email to customer
                try {
                    Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                } catch (\Exception $e) {
                }

                // Page redirect
                return redirect()->route('user.plans')->with('success', $message);
            }
        } else {
            ScriptTransaction::where('transaction_id', $orderId)->update([
                'transaction_id' => $orderId,
                'payment_status' => 'FAILED',
            ]);

            return redirect()->route('user.plans')->with('failed', trans("Payment failed, Something went wrong!"));
        }
    }
}
