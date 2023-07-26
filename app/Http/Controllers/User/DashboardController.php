<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use App\Services\BreadcrumbService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barcode;
use Inertia\Inertia;
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
    public function index(BreadcrumbService $breadcrumbService)
    {
         
        $breadcrumbs = $breadcrumbService->generate();
       
        // return Inertia::render('User/Index');
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
        $qr_codes = QrCode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);

        // Get User Barcodes
        $bar_codes = Barcode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        
        //Barcode QrCode Graph
        $barcodeCount = [];
        $qrcodeCount = [];
        $startD = [];
        $getYear = "";

        for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::create(date('Y'), $month);
            $getYear = $startDate->year;
            $endDate = $startDate->copy()->endOfMonth();
            
            
            $barcode = Barcode::where('user_id', Auth::user()->id)->where('status',1)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
            $qrcode = Qrcode::where('user_id', Auth::user()->id)->where('status',1)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
           
            $barcodeCount[$month-1] = $barcode;
            $qrcodeCount[$month-1] = $qrcode;
            $startD[$month-1] = $startDate;
        }

  

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();
        if ($current_time < $plan_validity) {
            // Remaining dates
            $remaining_days = $current_time->diffInDays($plan_validity, false);
  
            return Inertia::render('User/Index', ['settings' => $settings, 'active_plan' => $active_plan, 'remaining_days' => $remaining_days, 'barcodes_count' => $barcodes_count, 'qr_codes_count' => $qr_codes_count, 'qr_codes' => $qr_codes, 'bar_codes' => $bar_codes, 'settings' => $settings, 'config' => $config, 'qrcode' => $qrcodeCount, 'barcode' => $barcodeCount, 'getCurrentYear' => $getYear, 'breadcrumbs' => $breadcrumbs]);
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }
}
