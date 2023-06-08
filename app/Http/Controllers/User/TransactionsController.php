<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionsController extends Controller
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

    //  User Transactions
    public function indexTransactions()
    {

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Queries
            $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();
            $currencies = Currency::get();

            // Page view
            return view('user.pages.transactions.index', compact('transactions', 'settings', 'currencies'));
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    //  View Invoice
    public function viewInvoice($id)
    {
        $transaction = Transaction::where('id', $id)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();
        $currencies = Currency::get();
        $transaction['billing_details'] = json_decode($transaction['invoice_details'], true);
        return view('user.pages.transactions.view-invoice', compact('transaction', 'settings', 'config', 'currencies'));
    }
}
