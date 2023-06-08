<?php

namespace App\Http\Controllers\Admin;

use App\Models\QrCode;
use App\Models\Statistics;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StatisticsController extends Controller
{
    // Dynamic link
    public function dynamicLink(Request $request, $id)
    {
        // Check custom url found
        $qrcode_count = QrCode::where('qr_code_id', $id)->count();

        // count
        if ($qrcode_count >= 1) {

            // Queries
            $qrcode_details = QrCode::where('qr_code_id', $id)->first();

            // User ip address
            $ip = $request->ip();

            // Get location details
            $location = geoip()->getLocation($ip);

            // Get User Agent
            $agent = new Agent();
            $agent->setHttpHeaders($ip);

            // Save statistics
            $statistics = new Statistics();
            $statistics->qr_code_id = $id;
            $statistics->iso_code = $location->iso_code;
            $statistics->country_code = $location->country;
            $statistics->os_name = $agent->platform();
            $statistics->browser_name = $agent->browser();
            $statistics->city_name = $location->city;
            $statistics->referrer_host = "direct";
            $statistics->referrer_path = "";
            $statistics->device_type = $agent->device();
            $statistics->browser_language = $agent->languages()[1];
            $statistics->save();

            return Redirect::to(json_decode($qrcode_details->settings)->url_value);
        } else {
            return redirect()->route('admin.dashboard')->with('failed', trans('URL not found.'));
        }
    }

    // View Statistics
    public function qrStatistics(Request $request, $id)
    {
        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {

            // Get Country wise count
            $countries = Statistics::where('qr_code_id', $id)
            ->groupBy('country_code')
            ->get(DB::raw('count(*) as total, statistics.country_code, statistics.iso_code'));

            // Get City wise count
            $cities = Statistics::where('qr_code_id', $id)
                ->groupBy('city_name')
                ->get(DB::raw('count(*) as total, statistics.city_name'));

            // Get Device wise count
            $device_types = Statistics::where('qr_code_id', $id)
                ->groupBy('device_type')
                ->get(DB::raw('count(*) as total, statistics.device_type'));

            // Get Operacting System wise count
            $os_names = Statistics::where('qr_code_id', $id)
                ->groupBy('os_name')
                ->get(DB::raw('count(*) as total, statistics.os_name'));

            // Get Browsers wise count
            $browser_names = Statistics::where('qr_code_id', $id)
                ->groupBy('browser_name')
                ->get(DB::raw('count(*) as total, statistics.browser_name'));

            // Get Languages wise count
            $browser_languages = Statistics::where('qr_code_id', $id)
                ->groupBy('browser_language')
                ->get(DB::raw('count(*) as total, statistics.browser_language'));

            // Get QR Code Scanning Count
            $count = Statistics::where('qr_code_id', $id)->count();

            return view('user.pages.statistics.index', compact('countries', 'cities', 'device_types', 'os_names', 'browser_names', 'browser_languages', 'count'));
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }
}
