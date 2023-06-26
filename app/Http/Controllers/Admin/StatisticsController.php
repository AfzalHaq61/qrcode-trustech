<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\QrCode;
use App\Models\Statistics;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StatisticsController extends Controller
{
    // Text
    public function text(Request $request, $id)
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
            // $location = geoip()->getLocation($ip);

            // Get User Agent
            $agent = new Agent();
            $agent->setHttpHeaders($ip);

            if(isset($agent->languages()[1])){
                $browser_lang = $agent->languages()[1];
            }
            else {
                $browser_lang = 'en';
            }

            // Save statistics
            $statistics = new Statistics();
            $statistics->qr_code_id = $id;
            $statistics->iso_code = 123;
            $statistics->country_code = 'pakistan';
            $statistics->os_name = $agent->platform();
            $statistics->browser_name = $agent->browser();
            $statistics->city_name = 'city';
            $statistics->referrer_host = "direct";
            $statistics->referrer_path = "";
            $statistics->device_type = $agent->device();
            $statistics->browser_language = $browser_lang;
            $statistics->save();

            // View page
            return Inertia::render('QrCodes/Text', [
                'content' => $qrcode_details->settings,
            ]);

            // Check active plan
            // $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            // $current_time = Carbon::now();

            // if ($current_time < $plan_validity) {
                // Save statistics
                // $statistics = new Statistics();
                // $statistics->qr_code_id = $id;
                // $statistics->iso_code = $location->iso_code;
                // $statistics->country_code = $location->country;
                // $statistics->os_name = $agent->platform();
                // $statistics->browser_name = $agent->browser();
                // $statistics->city_name = $location->city;
                // $statistics->referrer_host = "direct";
                // $statistics->referrer_path = "";
                // $statistics->device_type = $agent->device();
                // $statistics->browser_language = $browser_lang;
                // $statistics->save();

                // View page
            //     return Inertia::render('QrCodes/Text', [
            //         'content' => $qrcode_details->settings,
            //     ]);
            // } else {
                // Redirect to Expired page
            //     return Inertia::render('Errors/Expired');
            // }

        } else {
            return redirect()->route('user.dashboard')->with('failed', trans('URL not found.'));
        }
    }
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

            return Inertia::render('Admin/Statistics/Index', [
                'countries' => $countries,
                'cities' => $cities,
                'device_types' => $device_types,
                'os_names' => $os_names,
                'browser_names' => $browser_names,
                'browser_languages' => $browser_languages,
                'count' => $count
            ]);
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }
}
