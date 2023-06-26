<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Gateway;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\BreadcrumbService;

class CheckOutController extends Controller
{
    // Checkout
    public function paymentStripe($id){
        dd(\auth()->user());
        return Inertia::render('User/Payment/payment-stripe');
    }
    public function checkout(Request $request, $id,BreadcrumbService $breadcrumbService)
    {
       

        $breadcrumbs = $breadcrumbService->generate();
   
        return Inertia::render('User/Checkout/Index',[
            'breadcrumbs'=>$breadcrumbs
        ]);
        $selected_plan = Plan::where('id', $id)->where('status', 1)->first();

        // Check selected plan status
        if ($selected_plan == null) {
            return redirect()->route('user.plans')->with('failed', trans('Your current plan is not available. Choose another plan.'));
        } else {

            // Queries
            $config = Config::get();

            // Check plan status
            if ($selected_plan == null) {
                return view('errors.404');
            } else {

                // Selected plan price
                if ($selected_plan->plan_price == 0) {
                    if (Auth::user()->billing_name == "") {
                        return redirect()->route('user.billing', $id);
                    } else {

                        // Invoice generate by user
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

                        // Save transaction
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

                        // Set validity
                        $plan_validity = Carbon::now();
                        $plan_validity->addDays($selected_plan->validity);

                        // Update validity by user
                        User::where('user_id', Auth::user()->id)->update([
                            'plan_id' => $id,
                            'term' => "9999",
                            'plan_validity' => $plan_validity,
                            'plan_activation_date' => now(),
                            'plan_details' => $selected_plan,
                        ]);

                        return redirect()->back()->with('success', trans("FREE Plan activated!"));
                    }
                } else {
                    // Queries
                    $settings = Setting::where('status', 1)->first();
                    $config = Config::get();
                    $currency = Currency::where('iso_code', $config[1]->config_value)->first();
                    $gateways = Gateway::where('is_status', 'enabled')->where('status', 1)->get();

                    // Current plan price
                    $plan_price = $selected_plan->plan_price * ($selected_plan->validity / 30);

                    $tax = $config[25]->config_value;

                    // Calculate total
                    $total = ((int)($plan_price) * (int)($tax) / 100) + (int)($plan_price);

                    return view('user.pages.checkout.index', compact('settings', 'config', 'currency', 'selected_plan', 'gateways', 'total'));
                }
            }
        }
    }
}
