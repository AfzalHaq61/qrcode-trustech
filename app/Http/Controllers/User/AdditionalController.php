<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Plan;
use App\Models\User;
use Iodev\Whois\Factory as Whois;
use GeoIp2\Database\Reader as GeoIP;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\BreadcrumbService;

class AdditionalController extends Controller
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

    // Whois Lookup
    public function whoisLookup(BreadcrumbService $breadcrumbService)
    {

        // Check active plans
        $breadcrumbs = $breadcrumbService->generate();

        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Page rendor
            return Inertia::render('User/Additional/WhoisLookup', [
                'breadcrumbs' => $breadcrumbs
            ]);
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Search Whois Lookup
    public function resultWhoisLookup(Request $request, BreadcrumbService $breadcrumbService)
    {
       
        $breadcrumbs = $breadcrumbService->generate();

        // Queries
        $domain = str_replace(['http://', 'https://', 'www.'], '', $request->input('domain'));
       
        $whoisRecords = false;
        try {
            $whoisRecords = Whois::get()->createWhois()->loadDomainInfo($domain);
        
        } catch (\Exception $e) {
        }
      
        return Inertia::render('User/Additional/WhoisLookup', [
            'breadcrumbs' => $breadcrumbs,
            'domain' => $domain,
            'result' => $whoisRecords
        ]);
    }

    // DNS Lookup
    public function dnsLookup(BreadcrumbService $breadcrumbService)
    {
        $breadcrumbs = $breadcrumbService->generate();

        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Page rendor
            return Inertia::render('User/Additional/DNSLookup', [
                'breadcrumbs' => $breadcrumbs,
            ]);
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Search DNS Lookup
    public function resultDnsLookup(Request $request, BreadcrumbService $breadcrumbService)
    {
        $breadcrumbs = $breadcrumbService->generate();
        // Queries
        $domain = str_replace(['http://', 'https://'], '', $request->input('domain'));

        try {
            $dnsRecords = dns_get_record($domain, DNS_A + DNS_AAAA + DNS_CNAME + DNS_MX + DNS_TXT + DNS_NS);
        } catch (\Exception $e) {
            $dnsRecords = [];
        }

    

        return Inertia::render('User/Additional/DNSLookup', [
            'breadcrumbs' => $breadcrumbs,
            'domain' => $domain,
            'results' => $dnsRecords
        ]);
        return view('user.pages.additional.dns-lookup', ['domain' => $domain, 'results' => $dnsRecords]);
    }

    // IP Lookup
    public function ipLookup(BreadcrumbService $breadcrumbService)
    {
        $breadcrumbs = $breadcrumbService->generate();

        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Page rendor
            return Inertia::render('User/Additional/IPLookup', [
                'breadcrumbs' => $breadcrumbs
            ]);
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Search IP Lookup
    public function resultIpLookup(Request $request, BreadcrumbService $breadcrumbService)
    {
        $breadcrumbs = $breadcrumbService->generate();

        // Queries
        try {
            $result = (new GeoIP(storage_path('app/geoip/GeoLite2-City.mmdb')))->city($request->input('ip'))->raw;
        } catch (\Exception $e) {
            $result = false;
        }

        return Inertia::render('User/Additional/IPLookup', [
            'breadcrumbs' => $breadcrumbs,
            'content' => $request->input('content'),
            'result' => $result
        ]);
    }
}
