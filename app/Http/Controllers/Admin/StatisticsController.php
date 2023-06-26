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

    // View Statistics
    public function qrStatistics(Request $request, $id)
    {
        // Get Country wise count
        $countries = Statistics::where('qr_code_id', $id)
            ->groupBy('country_code', 'iso_code')
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
    }
}
