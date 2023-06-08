<?php

namespace App\Http\Controllers\Payment;

use App\Models\Plan;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfflineController extends Controller
{
    // Offline checkot
    public function offlineCheckout(Request $request, $planId)
    {
        // Queries
        $config = Config::get();

        // Check value
        if ($config[31]->config_value == null) {
            // Page redirect
            return redirect()->route('user.checkout', $planId)->with('failed', trans('No Bank Transfer details found!'));
        } else {
            // Queries
            $settings = Setting::where('status', 1)->first();
            $plan_details = Plan::where('id', $planId)->where('status', 1)->first();
            // Page view
            return view('user.pages.checkout.pay-with-offline', compact('settings', 'plan_details', 'config'));
        }
    }

    // Mark offline payment
    public function markOfflinePayment(Request $request)
    {
        // Check customer
        if (Auth::user()) {
            // Queries
            $config = Config::get();
            // Get customer details
            $userData = User::where('id', Auth::user()->id)->first();

            // Get setting
            $settings = Setting::where('status', 1)->first();

            // Get plan details
            $plan_details = Plan::where('id', $request->plan_id)->where('status', 1)->first();

            // Check plan
            if ($plan_details == null) {
                // Page redirect
                return view('errors.404');
            } else {
                // Current plan price
                $plan_price = $plan_details->plan_price * ($plan_details->validity/30);

                // Paid amount
                $amountToBePaid = ((int)($plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_price);

                // Generate custom transaction id
                $gobiz_transaction_id = uniqid();

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


                // If order is created from stripe
                $transaction = new Transaction();
                $transaction->transaction_date = now();
                $transaction->transaction_id = $request->transaction_id;
                $transaction->user_id = Auth::user()->id;
                $transaction->plan_id = $plan_details->id;
                $transaction->desciption = $plan_details->plan_name . " Plan";
                $transaction->payment_gateway_name = "Offline";
                $transaction->transaction_amount = $amountToBePaid;
                $transaction->transaction_currency = $config[1]->config_value;
                $transaction->invoice_details = json_encode($invoice_details);
                $transaction->payment_status = "PENDING";
                $transaction->save();

                // Page redirect
                return redirect()->route('user.plans')->with('success', trans('Bank transfer transaction pending now. Once, Transaction is done, will be implemented your plan by the admin.'));
            }
        } else {
            // Page redirect
            return redirect()->route('login');
        }
    }
}
