<?php

namespace App\Http\Controllers\Website;

use App\Models\Page;
use App\Models\Plan;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Application;

class WebController extends Controller
{
    // Web Index
    public function webIndex()
    {
        // Plans
        $plans = Plan::where('status', 1)->get();
        $config = Config::get();
        $currency = Currency::where('iso_code', $config['1']->config_value)->get();
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'home')->where('status', 1)->get();

        // view
        return Inertia::render('Website/Index', [
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'plans' => $plans,
            'config' => $config,
            'currency' => $currency,
            'settings' => $settings,
            'page' => $page
        ]);
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
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'pricing')->where('status', 1)->get();

        // view
        return Inertia::render('Website/Pricing', [
            'plans' => $plans,
            'config' => $config,
            'currency' => $currency,
            'settings' => $settings,
            'page' => $page
        ]);
    }

    // Web Contact
    public function webContact()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'contact')->where('status', 1)->get();

        // view
        return Inertia::render('Website/Contact', [
            'config' => $config,
            'settings' => $settings,
            'page' => $page
        ]);
    }

    // Web FAQs
    public function webFAQ()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'faq')->where('status', 1)->get();

        // view
        return Inertia::render('Website/Faq', [
            'config' => $config,
            'settings' => $settings,
            'page' => $page
        ]);
    }

    // Web Privacy
    public function webPrivacy()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'privacy-policy')->where('status', 1)->get();

        // view
        return Inertia::render('Website/PrivacyPolicy', [
            'config' => $config,
            'settings' => $settings,
            'page' => $page
        ]);
    }

    // Web Privacy
    public function webCookies()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'privacy-policy')->where('status', 1)->get();

        // view
        return Inertia::render('Website/CookiesAndGDPR', [
            'config' => $config,
            'settings' => $settings,
            'page' => $page
        ]);
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
        $settings = Setting::where('status', 1)->first();
        $page = Page::where('slug', 'terms-and-conditions')->where('status', 1)->get();

        // view
        return Inertia::render('Website/TermsAndCondition', [
            'config' => $config,
            'settings' => $settings,
            'page' => $page
        ]);
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
