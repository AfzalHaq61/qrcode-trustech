<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Models\QrCode;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

    // Dashboard
    public function index()
    {
        // User current plan details
        $plan = User::where('id', Auth::user()->id)->first();
        $active_plan = json_decode($plan->plan_details);

        // Queries
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        // Initial Remaining days
        $remaining_days = 0;

        // QR Codes count
        $qr_codes_count = QrCode::where('user_id', Auth::user()->id)->count();

        // Barodes count
        $barcodes_count = Barcode::where('user_id', Auth::user()->id)->count();

        // Get User QR Codes
        $qr_codes = QrCode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();

        // Get User Barcodes
        $bar_codes = Barcode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->limit(10)->get();

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Remaining dates
            $remaining_days = $current_time->diffInDays($plan_validity, false);

            return view('user.index', compact('settings', 'active_plan', 'remaining_days', 'barcodes_count', 'qr_codes_count', 'qr_codes', 'bar_codes', 'settings', 'config'));
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }
}
