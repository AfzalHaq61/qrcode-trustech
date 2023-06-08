<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BillingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  Billing
    public function billing($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $settings = Setting::first();

        return view('user.pages.billing.index', compact('user', 'settings'));
    }

    public function updateBilling(Request $request)
    {
        $id = $request->plan_id;

        $selected_plan = Plan::where('id', $id)->where('status', 1)->first();
        $config = Config::get();

        $validated = $request->validate([
            'billing_name' => 'required',
            'billing_email' => 'required',
            'billing_phone' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_state' => 'required',
            'billing_zipcode' => 'required',
            'billing_country' => 'required',
            'type' => 'required'
        ]);

        User::where('id', Auth::user()->id)->update([
            'billing_name' => $request->billing_name,
            'billing_email' => $request->billing_email,
            'billing_phone' => $request->billing_phone,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_zipcode' => $request->billing_zipcode,
            'billing_country' => $request->billing_country,
            'type' => $request->type,
            'vat_number' => $request->vat_number
        ]);

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
        $invoice_details['to_billing_name'] = $request->billing_name;
        $invoice_details['to_billing_address'] = $request->billing_address;
        $invoice_details['to_billing_city'] = $request->billing_city;
        $invoice_details['to_billing_state'] = $request->billing_state;
        $invoice_details['to_billing_zipcode'] = $request->billing_zipcode;
        $invoice_details['to_billing_country'] = $request->billing_country;
        $invoice_details['to_billing_phone'] = $request->billing_phone;
        $invoice_details['to_billing_email'] = $request->billing_email;
        $invoice_details['to_vat_number'] = $request->vat_number;
        $invoice_details['tax_name'] = $config[24]->config_value;
        $invoice_details['tax_type'] = $config[14]->config_value;
        $invoice_details['tax_value'] = $config[25]->config_value;
        $invoice_details['invoice_amount'] = 0;
        $invoice_details['subtotal'] = 0;
        $invoice_details['tax_amount'] = 0;

        $transaction = new Transaction();
        $transaction->transaction_date = now();
        $transaction->transaction_id = uniqid();
        $transaction->user_id = Auth::user()->id;
        $transaction->plan_id = $selected_plan->id;
        $transaction->desciption = $selected_plan->plan_name . " Plan";
        $transaction->payment_gateway_name = "FREE";
        $transaction->transaction_amount = $selected_plan->plan_price;
        $transaction->transaction_currency = $config[1]->config_value;
        $transaction->invoice_details = json_encode($invoice_details);
        $transaction->payment_status = "SUCCESS";
        $transaction->save();

        $plan_validity = Carbon::now();
        $plan_validity->addDays($selected_plan->validity);
        User::where('id', Auth::user()->id)->update([
            'plan_id' => $id,
            'term' => "9999",
            'plan_validity' => $plan_validity,
            'plan_activation_date' => now(),
            'plan_details' => $selected_plan,
        ]);
        // Making all cards inactive, For Plan change
        // BusinessCard::where('user_id', Auth::user()->id)->update([
        //     'card_status' => 'inactive',
        // ]);
        return redirect()->route('user.plans')->with('success', trans("FREE Plan activated!"));
    }
}
