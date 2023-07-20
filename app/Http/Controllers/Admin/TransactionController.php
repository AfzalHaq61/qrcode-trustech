<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
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

    //  Transactions
    public function index(BreadcrumbService $breadcrumbService)
    {
        // Queries
   
        $transactions = Transaction::where('payment_gateway_name', '!=', 'Offline')->paginate(10);
        $settings = Setting::where('status', 1)->first();
        $currencies = Currency::get();
        $breadcrumbs = $breadcrumbService->generate();

        // Get user transactions
        for ($i = 0; $i < count($transactions); $i++) {
            $user_details = User::where('id', $transactions[$i]->user_id)->first();

            // Check user details
            if ($user_details) {
                $transactions[$i]['name'] = $user_details->name;
                $transactions[$i]['userId'] = $user_details->id;
            } else {
                $transactions[$i]['name'] = 'User not found';
                $transactions[$i]['userId'] = '#';
            }
        }

        // View page
        return Inertia::render('Admin/Transactions/Index', [
            'transactions' => $transactions,
            'settings' => $settings,
            'currencies' => $currencies,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Update transaction status
    public function transactionStatus($id, $status)
    {
        // Update status
        Transaction::where('id', $id)->update([
            'payment_status' => $status
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Transaction Status Updated Successfully!'));
    }

    // View transaction invoice
    public function viewInvoice($id)
    {
        // Get transaction details
        $transaction = Transaction::where('id', $id)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();
        $currencies = Currency::get();
        $transaction['billing_details'] = json_decode($transaction['invoice_details'], true);

        // View invoice page
        return Inertia::render('Admin/Transactions/ViewInvoice', [
            'transaction' => $transaction,
            'settings' => $settings,
            'config' => $config,
            'currencies' => $currencies,
        ]);
    }

    // Offline transactions
    public function offlineTransactions()
    {
        
        // All offline transactions
        $transactions = Transaction::where('payment_gateway_name', 'Offline')->paginate(10);
        $settings = Setting::where('status', 1)->first();
        $currencies = Currency::get();

        // Get customer transactions
        for ($i = 0; $i < count($transactions); $i++) {
            $user_details = User::where('id', $transactions[$i]->user_id)->first();

            // Check user details
            if ($user_details) {
                $transactions[$i]['name'] = $user_details->name;
                $transactions[$i]['userId'] = $user_details->id;
            } else {
                $transactions[$i]['name'] = 'User not found';
                $transactions[$i]['userId'] = '#';
            }
        }

        // View offline page
        return Inertia::render('Admin/Transactions/Offline', [
            'transactions' => $transactions,
            'settings' => $settings,
            'currencies' => $currencies,
        ]);
    }

    // Offline transaction status
    public function offlineTransactionStatus(Request $request, $id, $status)
    {
        // Check status
        if ($status == "SUCCESS") {

            $config = Config::get();

            // Check transaction details
            $transaction_details = Transaction::where('id', $id)->where('status', 1)->first();
            $user_details = User::find($transaction_details->user_id);

            // Get plan details
            $plan_data = Plan::where('id', $transaction_details->plan_id)->first();
            $term_days = $plan_data->validity;

            // Check plan validity
            if ($user_details->plan_validity == "") {

                // Add plan validity
                $plan_validity = Carbon::now();
                $plan_validity->addDays($term_days);

                // Get transaction count
                $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                $invoice_number = $invoice_count + 1;

                // Update transaction details
                Transaction::where('id', $id)->update([
                    'invoice_prefix' => $config[15]->config_value,
                    'invoice_number' => $invoice_number,
                    'payment_status' => 'SUCCESS',
                ]);

                // Update user plan details
                User::where('id', $user_details->id)->update([
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
                    'subtotal' => $encode['subtotal'],
                    'tax_amount' => $encode['tax_amount'],
                    'invoice_currency' => $transaction_details->transaction_currency,
                    'invoice_amount' => $encode['invoice_amount'],
                    'invoice_id' => $config[15]->config_value . $invoice_number,
                    'invoice_date' => $transaction_details->created_at,
                    'description' => $transaction_details->description,
                    'email_heading' => $config[27]->config_value,
                    'email_footer' => $config[28]->config_value,
                ];

                // Send email to customer
                try {
                    Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                } catch (\Exception $e) {
                }

                // Page redirect
                return redirect()->route('admin.offline.transactions')->with('success', trans('Plan activation success!'));
            } else {
                $message = "";

                // Check plan
                if ($user_details->plan_id == $transaction_details->plan_id) {

                    // Check if plan validity is expired or not.
                    $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
                    $current_date = Carbon::now();
                    $remaining_days = $current_date->diffInDays($plan_validity, false);

                    // Check remaining days
                    if ($remaining_days > 0) {
                        $plan_validity = Carbon::parse($user_details->plan_validity);
                        $plan_validity->addDays($term_days);
                        $message = trans("Plan renewed successfully!");
                    } else {
                        $plan_validity = Carbon::now();
                        $plan_validity->addDays($term_days);
                        $message = trans("Plan renewed successfully!");
                    }
                } else {

                    // Making all cards inactive, For Plan change
                    // BusinessCard::where('user_id', $user_details->user_id)->update([
                    //     'card_status' => 'inactive',
                    // ]);

                    // Add days
                    $plan_validity = Carbon::now();
                    $plan_validity->addDays($term_days);
                    $message = trans("Plan renewed successfully!");
                }

                // Get transactions count
                $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
                $invoice_number = $invoice_count + 1;

                // Update transaction details
                Transaction::where('id', $id)->update([
                    'invoice_prefix' => $config[15]->config_value,
                    'invoice_number' => $invoice_number,
                    'payment_status' => 'SUCCESS',
                ]);

                // Update user plan details
                User::where('id', $user_details->id)->update([
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
                    'description' => $transaction_details->description,
                    'email_heading' => $config[27]->config_value,
                    'email_footer' => $config[28]->config_value,
                ];

                try {
                    Mail::to($encode['to_billing_email'])->send(new \App\Mail\SendEmailInvoice($details));
                } catch (\Exception $e) {
                }

                // Page redirect
                return redirect()->route('admin.offline.transactions')->with('success', $message);
            }
        } else {
            // Update transaction status details
            Transaction::where('id', $id)->update([
                'transaction_id' => '',
                'payment_status' => 'FAILED',
            ]);

            // Page redirect
            return redirect()->route('admin.offline.transactions')->with('success', trans("Transaction updated successfully"));
        }
    }
}
