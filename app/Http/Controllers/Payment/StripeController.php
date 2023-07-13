<?php

namespace App\Http\Controllers\Payment;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\QrCode;
use App\Models\Barcode;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    // Stripe checkout
    public function stripeCheckout(Request $request, $planId)
    {
        if (Auth::user()) {

            // Queries
            $config = Config::get();
            $plan_details = Plan::where('id', $planId)->where('status', 1)->first();
            $settings = Setting::where('status', 1)->first();
            $gobiz_transaction_id = uniqid();

            // Check plan details
            if ($plan_details == null) {
                return view('errors.404');
            } else {

                // create stripe intent
                $intent = auth()->user()->createSetupIntent();

                // View page
                return Inertia::render('User/Checkout/PayWithStripe', [
                    'settings' => $settings,
                    'intent' => $intent,
                    'plan_details' => $plan_details,
                    'gobiz_transaction_id' => $gobiz_transaction_id,
                    'config' => $config
                ]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function stripePaymentStatus(Request $request, $planSlug)
    {
        $config = Config::get();
        $userData = User::where('id', Auth::user()->id)->first();
        $plan_details = Plan::where('id', $request->plan_id)->where('status', 1)->first();

        // Current plan price
        $plan_price = $plan_details->plan_price * ($plan_details->validity / 30);

        // Paid amount
        $amountToBePaid = ((int)($plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_price);
        $amountToBePaidPaise = $amountToBePaid * 100;

        try {
            $subscription = $request->user()->newSubscription($planSlug, $plan_details->stripe_id)
                ->create($request->token);
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error creating subscription. ' . trans($e->getMessage()));
        }

        $paymentId = $subscription->stripe_id;

        // Check payment id
        if (!$paymentId) {
            return view('errors.404');
        } else {

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

            // Check payment status
            if ($subscription->stripe_status == "active") {

                $term_days = $plan_details->validity;

                // Check if plan validity is expired or not.
                $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $userData->plan_validity);
                $current_date = Carbon::now();
                $remaining_days = $current_date->diffInDays($plan_validity, false);

                // Check plan remaining days
                if ($remaining_days > 0) {
                    // Add days
                    $plan_validity = Carbon::parse($userData->plan_validity);
                    $plan_validity->addDays($term_days);
                    $message = "Plan renewed successfully!";
                } else {
                    // Add days
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

                // Transactions count
                $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                $invoice_number = $invoice_count + 1;

                // Create transaction
                $transaction = new Transaction();
                $transaction->transaction_date = now();
                $transaction->transaction_id = $paymentId;
                $transaction->user_id = Auth::user()->id;
                $transaction->plan_id = $plan_details->id;
                $transaction->desciption = $plan_details->plan_name . " Plan";
                $transaction->payment_gateway_name = "Stripe";
                $transaction->transaction_amount = $amountToBePaid;
                $transaction->transaction_currency = $config[1]->config_value;
                $transaction->invoice_details = json_encode($invoice_details);
                $transaction->invoice_prefix = $config[15]->config_value;
                $transaction->invoice_number = $invoice_number;
                $transaction->payment_status = "SUCCESS";
                $transaction->save();

                // Update customer details
                User::where('id', Auth::user()->id)->update([
                    'plan_id' => $request->plan_id,
                    'term' => $term_days,
                    'plan_validity' => $plan_validity,
                    'plan_activation_date' => now(),
                    'plan_details' => $plan_details
                ]);

                $details = [
                    'from_billing_name' => $config[16]->config_value,
                    'from_billing_email' => $config[19]->config_value,
                    'from_billing_address' => $config[20]->config_value,
                    'from_billing_city' => $config[20]->config_value,
                    'from_billing_state' => $config[21]->config_value,
                    'from_billing_country' => $config[23]->config_value,
                    'from_billing_zipcode' => $config[22]->config_value,
                    'transaction_id' => $paymentId,
                    'to_billing_name' => $userData->billing_name,
                    'invoice_currency' => $config[1]->config_value,
                    'subtotal' => $plan_details->plan_price,
                    'tax_amount' => (int)($plan_details->plan_price) * (int)($config[25]->config_value) / 100,
                    'invoice_amount' => $amountToBePaid,
                    'invoice_id' => $config[15]->config_value . $invoice_number,
                    'invoice_date' => now(),
                    'description' => $plan_details->plan_name . " Plan",
                    'email_heading' => $config[27]->config_value,
                    'email_footer' => $config[28]->config_value,
                ];

                // Send mail to customer invoice
                // try {
                //     Mail::to($userData->billing_email)->send(new \App\Mail\SendEmailInvoice($details));
                // } catch (\Exception $e) {
                // }

                // Page redirect
                return redirect()->route('user.plans')->with('success', $message);
            } else {
                // Page redirect
                return redirect()->route('user.plans')->with('failed', trans("Something went wrong!"));
            }
        }
    }

    public function stripePaymentCancel(Request $request, $paymentId)
    {
        if (!$paymentId) {
            return view('errors.404');
        } else {
            $config = DB::table('config')->get();
            $stripe = new \Stripe\StripeClient($config[10]->config_value);

            try {
                $payment = $stripe->paymentIntents->cancel($paymentId, []);
            } catch (\Exception $e) {
                $payment = new \stdClass();
                $payment->status = "error";
            }

            Transaction::where('transaction_id', $paymentId)->update([
                'transaction_id' => $paymentId,
                'payment_status' => 'FAILED',
            ]);

            return redirect()->route('user.plans')->with('failed', trans("Payment cancelled!"));
        }
    }

    public function stripePaymentCancelSubscribtion()
    {
        $config = Config::get();

        $transactions = Transaction::where('user_id', Auth::user()->id)->where('status', 1)->get();

        if (!$transactions->isEmpty()) {
            $stripe = new \Stripe\StripeClient($config[10]->config_value);

            foreach ($transactions as $transaction) {
                $stripe->paymentIntents->retrieve($transaction->transaction_id);
                $transaction->status = 2;
                $transaction->save();
            }

            // Update validity by user
            $user = User::where('id', Auth::user()->id)->first();
            $user->plan_id = '';
            $user->term = '';
            $user->plan_details = '';
            $user->plan_validity = '0000-00-00 00:00:00';
            $user->plan_activation_date = '';

            $user->save();

            return redirect()->back()->with('success', trans("Subscribtion cancelled successfully"));
        }

        return redirect()->back()->with('failed', trans("Something went wrong!"));;
    }
}
