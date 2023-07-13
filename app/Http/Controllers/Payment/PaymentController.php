<?php

namespace App\Http\Controllers\Payment;

use App\Models\User;
use App\Models\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function preparePaymentGateway(Request $request, $planId)
    {
        $payment_mode = Gateway::where('id', $request->payment_gateway_id)->first();

        if ($payment_mode == null) {
            return redirect()->back()->with('failed', trans('Please choose valid payment method!'));
        } else {

            $validated = $request->validate([
                'billing_name' => 'required',
                'billing_email' => 'required',
                'billing_phone' => 'required',
                'billing_address' => 'required',
                'billing_city' => 'required',
                'billing_state' => 'required',
                'billing_zipcode' => 'required',
                'billing_country' => 'required',
                // 'type' => 'required'
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
                // 'type' => $request->type,
                'vat_number' => $request->vat_number
            ]);

            if ($payment_mode->payment_gateway_name == "Paypal") {
                return redirect()->route('paywithpaypal', $planId);
            } else if ($payment_mode->payment_gateway_name == "Razorpay") {
                return redirect()->route('paywithrazorpay', $planId);
            } else if ($payment_mode->payment_gateway_name == "Stripe") {
                return redirect()->route('paywithstripe', $planId);
            } else if ($payment_mode->payment_gateway_name == "Bank Transfer") {
                return redirect()->route('paywithoffline', $planId);
            } else {
                return redirect()->back()->with('failed', trans('Something went wrong!'));
            }
        }
    }
}
