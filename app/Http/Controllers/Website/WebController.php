<?php

namespace App\Http\Controllers\Website;

use App\Models\Page;
use App\Models\Plan;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class WebController extends Controller
{
    // Web Index
    public function webIndex()
    {
            // Plans
         
            $plans = Plan::where('status', 1)->first();
            $config = Config::get();
            $currency = Currency::where('iso_code', $config['1']->config_value)->first();
            $setting = Setting::where('status', 1)->first();

            // view
            return view("website.index", compact('plans', 'config', 'currency', 'setting'));
    }

    // Web About
    public function webAbout()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();


        return view("website.pages.about", compact('config', 'setting'));
    }

    // Web Pricing
    public function webPricing()
    {
        // Plans
        $plans = Plan::where('status', 1)->get();
        $config = Config::get();
        $currency = Currency::where('iso_code', $config['1']->config_value)->first();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.pricing", compact('plans', 'config', 'currency', 'setting'));
    }

    // Web Contact
    public function webContact()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.contact", compact('config', 'setting'));
    }

    // Web FAQs
    public function webFAQ()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.faq", compact('config', 'setting'));
    }

    // Web Privacy
    public function webPrivacy()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.privacy", compact('config', 'setting'));
    }

    // Web Privacy
    public function webCookies()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.cookies", compact('config', 'setting'));
    }

    // Web Refund
    public function webRefund()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.refund", compact('config', 'setting'));
    }

    // Web Terms
    public function webTerms()
    {
        // Queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        return view("website.pages.terms", compact('config', 'setting'));
    }

    // Custom pages
    public function customPage($id)
    {
        // Get page details
        $page = Page::where('slug', $id)->where('status', 1)->first();
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();

        if (!empty($page)) {
            // View page
            return view("website.pages.custom-page", compact('page', 'config', 'setting'));
        } else {
            return abort(404);
        }
    }
}
