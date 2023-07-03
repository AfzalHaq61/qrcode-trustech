<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            $transactions = Transaction::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
            $settings = Setting::where('status', 1)->first();
            $currencies = Currency::get();

            // View page
            return Inertia::render('User/Transactions/Index', [
                'transactions' => $transactions,
                'settings' => $settings,
                'currencies' => $currencies,
            ]);
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

        // View invoice page
        return Inertia::render('User/Transactions/ViewInvoice', [
            'transaction' => $transaction,
            'settings' => $settings,
            'config' => $config,
            'currencies' => $currencies,
        ]);
    }
}
