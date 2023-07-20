<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Gateway;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use App\Http\Controllers\Controller;

class PaymentMethodController extends Controller
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

    // All Payment Methods
    public function index(BreadcrumbService $breadcrumbService)
    {
        // Get payment methods
        $payment_methods = Gateway::orderBy('created_at', 'desc')->paginate(10);
        $settings = Setting::where('status', 1)->first();
        $breadcrumbs = $breadcrumbService->generate();

        return Inertia::render('Admin/PaymentMethods/Index', [
            'payment_methods' => $payment_methods,
            'settings' => $settings,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Add Payment Method
    public function addPaymentMethod()
    {
        // Queries
        $settings = Setting::where('status', 1)->first();
        return view('admin.pages.payment-methods.add', compact('settings'));
    }

    // Save Payment Method
    public function savePaymentMethod(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'payment_gateway_logo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:' . env('SIZE_LIMIT'),
            'payment_gateway_name' => 'required',
            'display_name' => 'required',
            'client_id' => 'required',
            'secret_key' => 'required'
        ]);

        // Upload images
        $payment_gateway_logo = 'img/payments/' . 'payment-' . time() . '.' . $request->payment_gateway_logo->extension();

        // Upload
        $request->payment_gateway_logo->move(public_path('img/payments'), $payment_gateway_logo);

        // Save payment method
        $paymentMethod = new Gateway;
        $paymentMethod->payment_gateway_logo = $payment_gateway_logo;
        $paymentMethod->payment_gateway_name = $request->payment_gateway_name;
        $paymentMethod->display_name = $request->display_name;
        $paymentMethod->client_id = $request->client_id;
        $paymentMethod->secret_key = $request->secret_key;
        $paymentMethod->save();

        // Page redirect
        return redirect()->back()->with('success', trans('New Payment Method Created Successfully!'));
    }

    // Edit Payment Method
    public function editPaymentMethod(Request $request, $id)
    {
        // Payment gateway id
        $gateway_id = $request->id;

        // Check payment gateway id
        if ($gateway_id == null) {
            return view('errors.404');
        } else {
            // Check payment gateway details
            $gateway_details = Gateway::where('id', $gateway_id)->first();
            $settings = Setting::where('status', 1)->first();

            return view('admin.pages.payment-methods.edit', compact('gateway_details', 'settings'));
        }
    }

    // Update Payment Method
    public function updatePaymentMethod(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'payment_gateway_name' => 'required',
            'display_name' => 'required',
            'client_id' => 'required',
            'secret_key' => 'required'
        ]);

        // Check status
        if ($request->is_status == null) {
            $is_status = 'disabled';
        } else {
            $is_status = 'enabled';
        }

        // Update payment details
        Gateway::where('id', $request->payment_gateway_id)->update([
            'payment_gateway_name' => $request->payment_gateway_name, 'display_name' => $request->display_name,
            'client_id' => $request->client_id, 'secret_key' => $request->secret_key, 'is_status' => $is_status
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Payment Gateway Details Updated Successfully!'));
    }

    // Delete Payment Method
    public function deletePaymentMethod(Request $request)
    {
        // Payment gateway details
        $payment_gateway_details = Gateway::where('id', $request->query('id'))->first();

        // Check payment gateway
        if ($payment_gateway_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update payment gateway
        Gateway::where('id', $request->query('id'))->update(['status' => $status]);
        // Page redirect
        return redirect()->back()->with('success', trans('Payment Method Status Updated Successfully!'));
    }
}
