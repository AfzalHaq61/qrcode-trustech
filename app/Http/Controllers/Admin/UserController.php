<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\QrCode;
use App\Models\Barcode;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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

    // All Users
    public function index()
    {
        // Queries
      
       
        $users = User::where('role_id', '2')->orderBy('created_at', 'desc')->paginate(10);
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        return Inertia::render('Admin/Users/Index', [
            'users' => $users,
            'settings' => $settings,
            'config' => $config
        ]);
    }

    // View User
    public function viewUser(Request $request, $id)
    {
        // Get user details
        return $user_details = User::where('id', $id)->first();

        // Check user
        if ($user_details == null) {
            return view('errors.404');
        } else {
            // Queries
            $bar_codes = Barcode::where('user_id', $user_details->id)->orderBy('id', 'desc')->get();
            $qr_codes = QrCode::where('user_id', $user_details->id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();

            return view('admin.pages.users.view', compact('user_details', 'settings', 'bar_codes', 'qr_codes'));
        }
    }

    // Edit User
    public function editUser(Request $request, $id)
    {
        // Get user details
        $user_details = User::where('id', $id)->first();
        $settings = Setting::where('status', 1)->first();

        // Check user
        if ($user_details == null) {
            return Inertia::render('Errors.404');
        } else {
            return Inertia::render('Admin/Users/Edit', [
                'user_details' => $user_details,
                'settings' => $settings,
            ]);
        }
    }

    // Update User
    public function updateUser(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'user_id' => 'required',
            'full_name' => 'required',
            'email' => 'required'
        ]);

        // Update user details
        if ($request->password == null) {
            // Update
            User::where('id', $request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email
            ]);
        } else {
            // Update
            User::where('id', $request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        }

        session()->flash('success', 'Record created successfully.');

        // Page redirect
        return redirect()->back()->with('success', trans('User Updated Successfully!'));
    }

    // Change user plan
    public function ChangeUserPlan(Request $request, $id)
    {
        // Get user details
        $user_details = User::where('id', $id)->first();
        // Get plans
        $plans = Plan::where('status', 1)->get();

        // Queries
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        // Check plans
        if ($plans == null) {
            return Inertia::render('Errors.404');
        } else {
            return Inertia::render('Admin/Users/ChangePlan', [
                'user_details' => $user_details,
                'plans' => $plans,
                'settings' => $settings,
                'config' => $config
            ]);
        }
    }

    // Upgrade user plan
    public function UpdateUserPlan(Request $request)
    {
        // Queries
        $config = Config::get();

        // Get user details
        $user_details = User::where('id', $request->user_id)->first();

        // Get plan details
        $plan_data = Plan::where('id', $request->plan_id)->first();
        $term_days = $plan_data->validity;

        // Paid amount
        $amountToBePaid = ((int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100) + (int)($plan_data->plan_price);

        // Check user current validity
        if ($user_details->plan_validity == "") {

            // Add new plan validity
            $plan_validity = Carbon::now();
            $plan_validity->addDays($term_days);

            // Get transactions count
            $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
            $invoice_number = $invoice_count + 1;

            // Generate transaction id
            $transaction_id = uniqid();

            // Generate JSON
            $invoice_details = [];

            $invoice_details['from_billing_name'] = $config[16]->config_value;
            $invoice_details['from_billing_address'] = $config[19]->config_value;
            $invoice_details['from_billing_city'] = $config[20]->config_value;
            $invoice_details['from_billing_state'] = $config[21]->config_value;
            $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
            $invoice_details['from_billing_country'] = $config[23]->config_value;
            $invoice_details['from_vat_number'] = $config[26]->config_value;
            $invoice_details['from_billing_phone'] = $config[18]->config_value;
            $invoice_details['from_billing_email'] = $config[17]->config_value;
            $invoice_details['to_billing_name'] = $user_details->billing_name;
            $invoice_details['to_billing_address'] = $user_details->billing_address;
            $invoice_details['to_billing_city'] = $user_details->billing_city;
            $invoice_details['to_billing_state'] = $user_details->billing_state;
            $invoice_details['to_billing_zipcode'] = $user_details->billing_zipcode;
            $invoice_details['to_billing_country'] = $user_details->billing_country;
            $invoice_details['to_billing_phone'] = $user_details->billing_phone;
            $invoice_details['to_billing_email'] = $user_details->billing_email;
            $invoice_details['to_vat_number'] = $user_details->vat_number;
            $invoice_details['tax_name'] = $config[24]->config_value;
            $invoice_details['tax_type'] = $config[14]->config_value;
            $invoice_details['tax_value'] = $config[25]->config_value;
            $invoice_details['invoice_amount'] = $amountToBePaid;
            $invoice_details['subtotal'] = $plan_data->plan_price;
            $invoice_details['tax_amount'] = (int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100;

            // If order is created from stripe
            $transaction = new Transaction();
            $transaction->transaction_date = now();
            $transaction->transaction_id = $transaction_id;
            $transaction->user_id = $user_details->id;
            $transaction->plan_id = $plan_data->id;
            $transaction->desciption = $plan_data->plan_name . " Plan";
            $transaction->payment_gateway_name = "Offline";
            $transaction->transaction_amount = $amountToBePaid;
            $transaction->invoice_prefix = $config[15]->config_value;
            $transaction->invoice_number = $invoice_number;
            $transaction->transaction_currency = $config[1]->config_value;
            $transaction->invoice_details = json_encode($invoice_details);
            $transaction->payment_status = "SUCCESS";
            $transaction->save();

            // Update user plan validity details
            User::where('id', $user_details->id)->update([
                'plan_id' => $request->plan_id,
                'term' => $term_days,
                'plan_validity' => $plan_validity,
                'plan_activation_date' => now(),
                'plan_details' => $plan_data
            ]);

            // Generate JSON
            $details = [
                'from_billing_name' => $config[16]->config_value,
                'from_billing_email' => $config[17]->config_value,
                'from_billing_address' => $config[19]->config_value,
                'from_billing_city' => $config[20]->config_value,
                'from_billing_state' => $config[21]->config_value,
                'from_billing_country' => $config[23]->config_value,
                'from_billing_zipcode' => $config[22]->config_value,
                'transaction_id' => $transaction_id,
                'to_billing_name' => $user_details->billing_name,
                'invoice_currency' => $config[1]->config_value,
                'subtotal' => $plan_data->plan_price,
                'tax_amount' => '0',
                'invoice_amount' => $plan_data->plan_price,
                'invoice_id' => $config[15]->config_value . $invoice_number,
                'invoice_date' => Carbon::now(),
                'description' => $plan_data->plan_name . ' plan Upgrade',
                'email_heading' => $config[27]->config_value,
                'email_footer' => $config[28]->config_value,
            ];

            // Mail send to user
            try {
                Mail::to($user_details->email)->send(new \App\Mail\SendEmailInvoice($details));
            } catch (\Exception $e) {
            }

            // Page redirect
            return redirect()->route('admin.offline.transactions')->with('success', trans('Plan changed successfully!'));
        } else {
            $message = "";

            // Check plan id
            if ($user_details->plan_id == $request->plan_id) {

                // Check if plan validity is expired or not.
                $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $user_details->plan_validity);
                $current_date = Carbon::now();
                $remaining_days = $current_date->diffInDays($plan_validity, false);

                // Check remaining days
                if ($remaining_days > 0) {
                    // Add plan validity
                    $plan_validity = Carbon::parse($user_details->plan_validity);
                    $plan_validity->addDays($term_days);
                    $message = trans("Plan changed successfully!");
                } else {
                    // Add plan validity
                    $plan_validity = Carbon::now();
                    $plan_validity->addDays($term_days);
                    $message = trans("Plan changed successfully!");
                }

                // Making all QR codes inactive, For Plan change
                QrCode::where('user_id', $request->user_id)->update([
                    'status' => 0,
                ]);
                // Making all Barcodes inactive, For Plan change
                Barcode::where('user_id', $request->user_id)->update([
                    'status' => 0,
                ]);
            } else {
                // Making all QR codes inactive, For Plan change
                QrCode::where('user_id', $request->user_id)->update([
                    'status' => 0,
                ]);
                // Making all Barcodes inactive, For Plan change
                Barcode::where('user_id', $request->user_id)->update([
                    'status' => 0,
                ]);

                // Add plan validity
                $plan_validity = Carbon::now();
                $plan_validity->addDays($term_days);
                $message = trans("Plan changed successfully!");
            }

            // Get transaction count
            $invoice_count = Transaction::where("invoice_prefix", $config[15]->config_value)->count();
            $invoice_number = $invoice_count + 1;

            // Generate transaction id
            $transaction_id = uniqid();

            // Generate JSON
            $invoice_details = [];

            $invoice_details['from_billing_name'] = $config[16]->config_value;
            $invoice_details['from_billing_address'] = $config[19]->config_value;
            $invoice_details['from_billing_city'] = $config[20]->config_value;
            $invoice_details['from_billing_state'] = $config[21]->config_value;
            $invoice_details['from_billing_zipcode'] = $config[22]->config_value;
            $invoice_details['from_billing_country'] = $config[23]->config_value;
            $invoice_details['from_vat_number'] = $config[26]->config_value;
            $invoice_details['from_billing_phone'] = $config[18]->config_value;
            $invoice_details['from_billing_email'] = $config[17]->config_value;
            $invoice_details['to_billing_name'] = $user_details->billing_name;
            $invoice_details['to_billing_address'] = $user_details->billing_address;
            $invoice_details['to_billing_city'] = $user_details->billing_city;
            $invoice_details['to_billing_state'] = $user_details->billing_state;
            $invoice_details['to_billing_zipcode'] = $user_details->billing_zipcode;
            $invoice_details['to_billing_country'] = $user_details->billing_country;
            $invoice_details['to_billing_phone'] = $user_details->billing_phone;
            $invoice_details['to_billing_email'] = $user_details->billing_email;
            $invoice_details['to_vat_number'] = $user_details->vat_number;
            $invoice_details['tax_name'] = $config[24]->config_value;
            $invoice_details['tax_type'] = $config[14]->config_value;
            $invoice_details['tax_value'] = $config[25]->config_value;
            $invoice_details['invoice_amount'] = $amountToBePaid;
            $invoice_details['subtotal'] = $plan_data->plan_price;
            $invoice_details['tax_amount'] = (int)($plan_data->plan_price) * (int)($config[25]->config_value) / 100;

            // If order is created from admin
            $transaction = new Transaction();
            $transaction->transaction_date = now();
            $transaction->transaction_id = $transaction_id;
            $transaction->user_id = $user_details->id;
            $transaction->plan_id = $plan_data->id;
            $transaction->desciption = $plan_data->plan_name . " Plan";
            $transaction->payment_gateway_name = "Offline";
            $transaction->transaction_amount = $amountToBePaid;
            $transaction->invoice_prefix = $config[15]->config_value;
            $transaction->invoice_number = $invoice_number;
            $transaction->transaction_currency = $config[1]->config_value;
            $transaction->invoice_details = json_encode($invoice_details);
            $transaction->payment_status = "SUCCESS";
            $transaction->save();

            // Update plan validity
            User::where('id', $user_details->id)->update([
                'plan_id' => $request->plan_id,
                'term' => $term_days,
                'plan_validity' => $plan_validity,
                'plan_activation_date' => now(),
                'plan_details' => $plan_data
            ]);

            // Generate JSON
            $details = [
                'from_billing_name' => $config[16]->config_value,
                'from_billing_email' => $config[17]->config_value,
                'from_billing_address' => $config[19]->config_value,
                'from_billing_city' => $config[20]->config_value,
                'from_billing_state' => $config[21]->config_value,
                'from_billing_country' => $config[23]->config_value,
                'from_billing_zipcode' => $config[22]->config_value,
                'to_billing_name' => $user_details->billing_name,
                'transaction_id' => $transaction_id,
                'invoice_currency' => $config[1]->config_value,
                'subtotal' => $plan_data->plan_price,
                'tax_amount' => '0',
                'invoice_amount' => $plan_data->plan_price,
                'invoice_id' => $config[15]->config_value . $invoice_number,
                'invoice_date' => Carbon::now(),
                'description' => $plan_data->plan_name . ' plan Upgrade',
                'email_heading' => $config[27]->config_value,
                'email_footer' => $config[28]->config_value,
            ];

            // Mail sent to user
            try {
                Mail::to($user_details->email)->send(new \App\Mail\SendEmailInvoice($details));
            } catch (\Exception $e) {
            }

            // Page redirect
            return redirect()->route('admin.change.user.plan', $request->user_id)->with('success', $message);
        }
    }

    // Update status
    public function updateStatus(Request $request)
    {
        // Get user details
        $user_details = User::where('id', $request->query('id'))->first();
        // Check status
        if ($user_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update status
        User::where('id', $request->query('id'))->update(['status' => $status]);
        // Page redirect
        return redirect()->back()->with('success', trans('User Status Updated Successfully!'));
    }

    // Delete User
    public function deleteUser(Request $request)
    {
        $user = User::where('id', $request->query('id'))->first();
        QrCode::where('user_id', $user->id)->delete();
        Barcode::where('user_id', $user->id)->delete();

        // Get transactions
        $transactions = Transaction::where('user_id', $request->query('id'))->first();

        if ($transactions != null) {
            $transactions->delete();
        }

        // Delete user
        User::where('id', $request->query('id'))->delete();

        // Page redirect
        return redirect()->back()->with('success', trans('User deleted Successfully!'));
    }

    // Login As User
    public function authAs($id)
    {
        // Check user details
        $user_details = User::where('id', $id)->where('status', 1)->first();

        // Check user
        if (isset($user_details)) {
            // Login user
            Auth::loginUsingId($user_details->id);
            // Page redirect
            return redirect()->route('user.dashboard');
        } else {
            // User not found and page redirect
            return redirect()->route('admin.users')->with('info', 'User account was not found!');
        }
    }
}
