<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Services\BreadcrumbService;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
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

    // plans
    public function index(BreadcrumbService $breadcrumbService)
    {
        // Plans
        
        $breadcrumbs = $breadcrumbService->generate();
        
        $plans = Plan::where('status', 1)->get();

        // Get access types
        $access_types = "";
        for ($i = 0; $i < count($plans); $i++) {
            if ($plans[$i]->access_text == "1") {
                $plans[$i]->access_types .= 'Text';
            }
            if ($plans[$i]->access_url == "1") {
                $plans[$i]->access_types .= ' URL';
            }
            if ($plans[$i]->access_url == "1") {
                $plans[$i]->access_types .= ' PDF';
            }
            if ($plans[$i]->access_phone == "1") {
                $plans[$i]->access_types .= ' Phone';
            }
            if ($plans[$i]->access_sms == "1") {
                $plans[$i]->access_types .= ' SMS';
            }
            if ($plans[$i]->access_email == "1") {
                $plans[$i]->access_types .= ' Email';
            }
            if ($plans[$i]->access_whatsapp == "1") {
                $plans[$i]->access_types .= ' WhatsApp';
            }
            if ($plans[$i]->access_facetime == "1") {
                $plans[$i]->access_types .= ' Facetime';
            }
            if ($plans[$i]->access_location == "1") {
                $plans[$i]->access_types .= ' Location';
            }
            if ($plans[$i]->access_wifi == "1") {
                $plans[$i]->access_types .= ' Wifi';
            }
            if ($plans[$i]->access_event == "1") {
                $plans[$i]->access_types .= ' Event';
            }
            if ($plans[$i]->access_crypto == "1") {
                $plans[$i]->access_types .= ' Crypto';
            }
            if ($plans[$i]->access_vcard == "1") {
                $plans[$i]->access_types .= ' vCard';
            }
            if ($plans[$i]->access_paypal == "1") {
                $plans[$i]->access_types .= ' Paypal';
            }
            if ($plans[$i]->access_upi == "1") {
                $plans[$i]->access_types .= ' UPI';
            }
        }

        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();

        $currency = Currency::where('iso_code', $config[1]->config_value)->first();

        // Current user plan details
        $free_plan = Transaction::where('user_id', Auth::user()->id)->where('transaction_amount', '0')->count();

        $plan = User::where('id', Auth::user()->id)->first();
        $active_plan = json_decode($plan->plan_details);
       
        // Initial remaining days
        $remaining_days = 0;

        // Check plan
        if (isset($active_plan)) {
            $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            $current_date = Carbon::now();

            // Remaining days
            $remaining_days = $current_date->diffInDays($plan_validity, false);
        }
      
        return Inertia::render('User/Plan/index', [
            'breadcrumbs' => $breadcrumbs,
            'plans' => $plans,
            'settings' => $settings,
            'currency' => $currency,
            'active_plan' => $active_plan,
            'remaining_days' => $remaining_days,
            'config' => $config,
            'free_plan' => $free_plan
        ]);
    }
}
