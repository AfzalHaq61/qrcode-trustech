<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use DB;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Barcode;
use App\Services\BreadcrumbService;
use App\Models\QrCode;
use App\Models\Gateway;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // Dashboard
    public function index(BreadcrumbService $breadcrumbService)
    {       
        
        // Dashboard counts
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();
       
        $currency = Currency::where('iso_code', $config['1']->config_value)->first();
      
        $this_month_income = Transaction::where('payment_status', 'Success')->whereMonth('created_at', Carbon::now()->month)->sum('transaction_amount');
        $today_income = Transaction::where('payment_status', 'Success')->whereDate('created_at', Carbon::today())->sum('transaction_amount');
        $overall_users = User::where('role_id', 2)->where('status', 1)->count();
        $today_users = User::where('role_id', 2)->where('status', 1)->whereDate('created_at', Carbon::today())->count();

        $breadcrumbs = $breadcrumbService->generate();

        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

      

        //get current year sales
        $currentYearTransactions = DB::table('transactions')
        ->where('payment_status', 'Success')
        ->whereYear('created_at', $currentYear)    
        ->sum('transaction_amount');
        
        //get current year barcodes
        $currentYearBarCodes = DB::table('barcodes')
        ->where('status', 1)
        ->whereYear('created_at', $currentYear)    
        ->count();
       //get current year qrcodes
        $currentYearQRCodes = DB::table('qr_codes')
        ->where('status', 1)
        ->whereYear('created_at', $currentYear)    
        ->count();


        //percentage for users last year
        $lastYearUsersPercentage = DB::table('users')
        ->where('role_id', 2)
        ->whereYear('created_at', $previousYear)
        ->count();    
        
          //percentage for users current year
        $currentYearUsersPercentage = DB::table('users')
        ->where('role_id', 2)
        ->whereYear('created_at', $currentYear)
        ->count();  
        
        //how many users are increase or decrease
        $differecesUsers = $currentYearUsersPercentage - $lastYearUsersPercentage;
        
        //get percentage of of increase users current year
        $percentageUsers = round($differecesUsers/$currentYearUsersPercentage * 100); 
        
        
        //percentage for users last year
        $lastYearTransactionsPercentage = DB::table('transactions')
        ->where('payment_status', 'Success')
        ->whereYear('created_at', $previousYear)
        ->sum('transaction_amount');    
        
          //percentage for sales current year
        $currentYearTransactionsPercentage = DB::table('transactions')
        ->where('payment_status', 'Success')
        ->whereYear('created_at', $currentYear)
        ->sum('transaction_amount');  
        
        //how many sales are increase or decrease
        $differecesTransactions = $currentYearTransactionsPercentage - $lastYearTransactionsPercentage;
        
        //get percentage of of increase sales current year
        $percentageTransactions = round($differecesTransactions/$currentYearTransactionsPercentage * 100); 
        
       
        
        
        $monthIncome = [];
        $monthUsers = [];
        $barcodeCount = [];
        $qrcodeCount = [];
        $startD = [];
        $getYear = "";
               for ($month = 1; $month <= 12; $month++) {
            $startDate = Carbon::create(date('Y'), $month);
            $getYear = $startDate->year;
            $endDate = $startDate->copy()->endOfMonth();
            
            $sales = Transaction::where('payment_status', 'Success')->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->sum('transaction_amount');
            $users = User::where('role_id', 2)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
            $barcode = Barcode::where('status',1)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
            $qrcode = Qrcode::where('status',1)->where('created_at', '>=', $startDate)->where('created_at', '<=', $endDate)->count();
            $monthIncome[$month-1] = $sales;
            $monthUsers[$month-1] = $users;
            $barcodeCount[$month-1] = $barcode;
            $qrcodeCount[$month-1] = $qrcode;
            $startD[$month-1] = $startDate;
        }

    

      
       
        //  $monthIncome = implode(',', $monthIncome);
        //  $monthUsers = implode(',', $monthUsers);
        return Inertia::render('Admin/Index', ['this_month_income' => $this_month_income, 'today_income' => $today_income, 'overall_users' => $overall_users, 'today_users' => $today_users, 'currency' => $currency, 'settings' => $settings, 'monthIncome' => $monthIncome, 'monthUsers' => $monthUsers, 'qrcode' => $qrcodeCount, 'barcode' => $barcodeCount, 'getCurrentYear' => $getYear,'breadcrumbs' => $breadcrumbs, 'currentYearTransactions' => $currentYearTransactions, 'currentYearBarCodes' => $currentYearBarCodes, 'currentYearQRCodes' => $currentYearQRCodes, 'percentageUsers' => $percentageUsers, 'lastYearUsersPercentage' => $lastYearUsersPercentage, 'percentageTransactions' => $percentageTransactions, 'lastYearTransactionsPercentage' => $lastYearTransactionsPercentage]);

        // return view('admin.index', compact('this_month_income', 'today_income', 'overall_users', 'today_users', 'currency', 'settings', 'monthIncome', 'monthUsers'));
    }

    // Check Update
    public function checkUpdate(Request $request)
    {
        // Queries
        $config = Config::get();

        // Default message
        $resp_data = [];
        $errorMessage = trans("Something went wrong! Please contact author support team.");
        $server_name = serverReq::server("SERVER_NAME");
        $server_name = $server_name ? $server_name : "LOCAL.TEST";

        // Check update validator
        $client = new \GuzzleHttp\Client();
        $res = $client->post('https://verification.goapps.co.in/check-update', [
            'form_params' => [
                'purchase_code' => $config[32]->config_value,
                'server_name' => $server_name,
                'version' => $config[33]->config_value
            ]
        ]);

        $resp_data = json_decode($res->getBody(), true);

        if ($resp_data) {
            if ($resp_data['status'] == true) {
                // Queries
                $settings = Setting::first();
                $purchase_code = env('PURCHASE_CODE');
                // Response
                $response = ['message' => $resp_data['message'], 'version' => $resp_data['version'], 'update' => $resp_data['update'], 'notes' => $resp_data['notes']];
                return view('admin.pages.update.index', compact('response', 'settings', 'config'));
            } else {
                $errorMessage = $resp_data['message'];
                return redirect()->back()->with('failed', $errorMessage);
            }
        } else {
            return redirect()->back()->with('failed', $errorMessage);
        }
    }
}
