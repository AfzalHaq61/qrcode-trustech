<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    // All Plans
    public function index()
    {
        // Queries
        $plans = Plan::get();
        $currencies = Setting::where('status', 1)->get();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        return view('admin.pages.plans.index', compact('plans', 'currencies', 'settings', 'config'));
    }

    // Add Plan
    public function addPlan()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();

        return view('admin.pages.plans.add', compact('settings', 'config'));
    }

    // Save Plan
    public function savePlan(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required',
            'validity' => 'required',
            'no_access_qr' => 'required',
            'no_qrcodes' => 'required',
            'no_barcodes' => 'required'
        ]);

        // Text
        if ($request->text == null) {
            $text = 0;
        } else {
            $text = 1;
        }

        // URL
        if ($request->url == null) {
            $url = 0;
        } else {
            $url = 1;
        }

        // Phone
        if ($request->phone == null) {
            $phone = 0;
        } else {
            $phone = 1;
        }

        // SMS
        if ($request->sms == null) {
            $sms = 0;
        } else {
            $sms = 1;
        }

        // Email
        if ($request->email == null) {
            $email = 0;
        } else {
            $email = 1;
        }

        // WhatsApp
        if ($request->whatsapp == null) {
            $whatsapp = 0;
        } else {
            $whatsapp = 1;
        }

        // Facetime
        if ($request->facetime == null) {
            $facetime = 0;
        } else {
            $facetime = 1;
        }

        // Location
        if ($request->location == null) {
            $location = 0;
        } else {
            $location = 1;
        }

        // Wifi
        if ($request->wifi == null) {
            $wifi = 0;
        } else {
            $wifi = 1;
        }

        // Event
        if ($request->event == null) {
            $event = 0;
        } else {
            $event = 1;
        }

        // Crypto
        if ($request->crypto == null) {
            $crypto = 0;
        } else {
            $crypto = 1;
        }

        // vCard
        if ($request->vcard == null) {
            $vcard = 0;
        } else {
            $vcard = 1;
        }

        // Paypal
        if ($request->paypal == null) {
            $paypal = 0;
        } else {
            $paypal = 1;
        }

        // UPI
        if ($request->upi == null) {
            $upi = 0;
        } else {
            $upi = 1;
        }

        // Additional Tools
        if ($request->additional_tools == null) {
            $additional_tools = 0;
        } else {
            $additional_tools = 1;
        }

        // Enable Analaytics
        if ($request->enable_analaytics == null) {
            $enable_analaytics = 0;
        } else {
            $enable_analaytics = 1;
        }

        // Hide branding
        if ($request->hide_branding == null) {
            $hide_branding = 0;
            $is_watermark_enabled = 0;
        } else {
            $hide_branding = 1;
            $is_watermark_enabled = 1;
        }

        // Free setup
        if ($request->free_setup == null) {
            $free_setup = 0;
        } else {
            $free_setup = 1;
        }

        // Support
        if ($request->support == null) {
            $support = 0;
        } else {
            $support = 1;
        }

        // Recommended
        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        // Save plan
        $plan = new Plan;
        $plan->plan_name = $request->plan_name;
        $plan->plan_description = $request->plan_description;
        $plan->recommended = $recommended;
        $plan->plan_price = $request->plan_price;
        $plan->validity = $request->validity;
        $plan->no_access_qr = $request->no_access_qr;
        $plan->no_qrcodes = $request->no_qrcodes;
        $plan->no_barcodes = $request->no_barcodes;
        $plan->access_text = $text;
        $plan->access_url = $url;
        $plan->access_phone = $phone;
        $plan->access_sms = $sms;
        $plan->access_email = $email;
        $plan->access_whatsapp = $whatsapp;
        $plan->access_facetime = $facetime;
        $plan->access_location = $location;
        $plan->access_wifi = $wifi;
        $plan->access_event = $event;
        $plan->access_crypto = $crypto;
        $plan->access_vcard = $vcard;
        $plan->access_paypal = $paypal;
        $plan->access_upi = $upi;
        $plan->additional_tools = $additional_tools;
        $plan->enable_analaytics = $enable_analaytics;
        $plan->hide_branding = $hide_branding;
        $plan->free_setup = $free_setup;
        $plan->support = $support;
        $plan->is_watermark_enabled = $is_watermark_enabled;
        $plan->save();

        return redirect()->route('admin.add.plan')->with('success', trans('New Plan Created Successfully!'));
    }

    // Edit Plan
    public function editPlan(Request $request, $id)
    {
        // Queries
        $id = $request->id;
        $plan_details = Plan::where('id', $id)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        // Plan Checking
        if ($plan_details == null) {
            return view('errors.404');
        } else {
            return view('admin.pages.plans.edit', compact('plan_details', 'settings', 'config'));
        }
    }

    // Update Plan
    public function updatePlan(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'plan_id' => 'required',
            'plan_name' => 'required',
            'plan_description' => 'required',
            'plan_price' => 'required',
            'validity' => 'required',
            'no_access_qr' => 'required',
            'no_qrcodes' => 'required',
            'no_barcodes' => 'required'
        ]);

        // Text
        if ($request->text == null) {
            $text = 0;
        } else {
            $text = 1;
        }

        // URL
        if ($request->url == null) {
            $url = 0;
        } else {
            $url = 1;
        }

        // Phone
        if ($request->phone == null) {
            $phone = 0;
        } else {
            $phone = 1;
        }

        // SMS
        if ($request->sms == null) {
            $sms = 0;
        } else {
            $sms = 1;
        }

        // Email
        if ($request->email == null) {
            $email = 0;
        } else {
            $email = 1;
        }

        // WhatsApp
        if ($request->whatsapp == null) {
            $whatsapp = 0;
        } else {
            $whatsapp = 1;
        }

        // Facetime
        if ($request->facetime == null) {
            $facetime = 0;
        } else {
            $facetime = 1;
        }

        // Location
        if ($request->location == null) {
            $location = 0;
        } else {
            $location = 1;
        }

        // Wifi
        if ($request->wifi == null) {
            $wifi = 0;
        } else {
            $wifi = 1;
        }

        // Event
        if ($request->event == null) {
            $event = 0;
        } else {
            $event = 1;
        }

        // Crypto
        if ($request->crypto == null) {
            $crypto = 0;
        } else {
            $crypto = 1;
        }

        // vCard
        if ($request->vcard == null) {
            $vcard = 0;
        } else {
            $vcard = 1;
        }

        // Paypal
        if ($request->paypal == null) {
            $paypal = 0;
        } else {
            $paypal = 1;
        }

        // UPI
        if ($request->upi == null) {
            $upi = 0;
        } else {
            $upi = 1;
        }

        // Additional Tools
        if ($request->additional_tools == null) {
            $additional_tools = 0;
        } else {
            $additional_tools = 1;
        }

        // Include Analaytics
        if ($request->enable_analaytics == null) {
            $enable_analaytics = 0;
        } else {
            $enable_analaytics = 1;
        }

        // Hide branding
        if ($request->hide_branding == null) {
            $hide_branding = 0;
            $is_watermark_enabled = 0;
        } else {
            $hide_branding = 1;
            $is_watermark_enabled = 1;
        }

        // Free setup
        if ($request->free_setup == null) {
            $free_setup = 0;
        } else {
            $free_setup = 1;
        }

        // Support
        if ($request->support == null) {
            $support = 0;
        } else {
            $support = 1;
        }

        // Recommended
        if ($request->recommended == null) {
            $recommended = 0;
        } else {
            $recommended = 1;
        }

        // Update plan
        Plan::where('id', $request->plan_id)->update([
            'plan_name' => $request->plan_name, 'plan_description' => $request->plan_description, 'recommended' => $recommended,
            'plan_price' => $request->plan_price, 'validity' => $request->validity, 'no_access_qr' => $request->no_access_qr,
            'no_qrcodes' => $request->no_qrcodes, 'no_barcodes' => $request->no_barcodes,
            'access_text' => $text, 'access_url' => $url, 'access_phone' => $phone, 'access_sms' => $sms, 'access_email' => $email,
            'access_whatsapp' => $whatsapp, 'access_facetime' => $facetime, 'access_location' => $location, 'access_wifi' => $wifi, 'access_event' => $event, 'access_crypto' => $crypto,
            'access_vcard' => $vcard, 'access_paypal' => $paypal, 'access_upi' => $upi,
            'additional_tools' => $additional_tools, 'enable_analaytics' => $enable_analaytics, 'hide_branding' => $hide_branding,
            'free_setup' => $free_setup, 'support' => $support, 'is_watermark_enabled' => $is_watermark_enabled
        ]);

        return redirect()->route('admin.edit.plan', $request->plan_id)->with('success', trans('Plan Details Updated Successfully!'));
    }

    // Delete Plan
    public function deletePlan(Request $request)
    {
        // Get plan details
        $plan_details = Plan::where('id', $request->query('id'))->first();

        // Check status
        if ($plan_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update status
        Plan::where('id', $request->query('id'))->update(['status' => $status]);
        return redirect()->route('admin.index.plans')->with('success', trans('Plan Status Updated Successfully!'));
    }
}
