<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use App\Models\User;
use Spatie\Color\Hex;
use App\Models\Barcode;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BarCodeController extends Controller
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

    // All User Bar Codes
    public function index()
    {
        // Check active plans
        $active_plan = Plan::where('id', Auth::user()->plan_id)->first();

        // Check user plan
        $plan = User::where('id', Auth::user()->id)->first();

         // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Get User Bar Codes
            $bar_codes = Barcode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            $settings = Setting::where('status', 1)->first();

            // View page
            return view('user.pages.bar-codes.index', compact('bar_codes', 'settings'));
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Create Bar Code
    public function CreateBarCode()
    {
        // Get user created bar code counts
        $bar_code_counts = Barcode::where('user_id', Auth::user()->id)->count();

        // Get plan details
        $plan = User::where('id', Auth::user()->id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        // Check no of qrcodes
        if ($plan_details->no_barcodes == 999) {
            $no_barcodes = 999999;
        } else {
            $no_barcodes = $plan_details->no_barcodes;
        }

        // Check user created qr code count
        if ($bar_code_counts < $no_barcodes) {
            return view('user.pages.bar-codes.create');
        } else {
            return redirect()->route('user.all.barcode')->with('failed', trans('Maximum barcode creation limit is exceeded, Please upgrade your plan.'));
        }
    }

    // Save bar code
    public function saveBarCode(Request $request)
    {
        // Generate barcode id
        $barcode_id = uniqid();

        // Show text
        $showtext = true;
        if ($request->showtext == null) {
            $showtext = false;
        }

        // Generate barcode
        $result = $request->barcode_type::getBarcodeSVG($request->content, $request->barcode_format, $request->width, $request->height, $request->color, $showtext);

        // Generate settings
        $settings =  json_encode(array(
            "barcode_type" => $request->barcode_type,
            "barcode_format" => $request->barcode_format,
            "content" => $request->content,
            "width" => $request->width,
            "height" => $request->height,
            "color" => $request->color,
            "showtext" => $request->showtext
        ));

        // Save Bar Code
        $barcode = new Barcode();
        $barcode->barcode_id = $barcode_id;
        $barcode->user_id = Auth::user()->id;
        $barcode->name = $request->name;
        $barcode->bar_code = $result;
        $barcode->settings = $settings;
        $barcode->save();

        // Redirect url
        return redirect()->route('user.download.barcode', $barcode_id)->with('success', trans('Barcode created successfully.'));
    }

    // Edit Barcode
    public function editBarCode($id)
    {
        // Queries
        $barcode_details = Barcode::where('barcode_id', $id)->where('user_id', Auth::user()->id)->first();

        return view('user.pages.bar-codes.edit', compact('barcode_details'));
    }

    // Update bar code
    public function updateBarCode(Request $request)
    {
        // Show text
        $showtext = true;
        if ($request->showtext == null) {
            $showtext = false;
        }

        // Generate barcode
        $result = $request->barcode_type::getBarcodeSVG($request->content, $request->barcode_format, $request->width, $request->height, $request->color, $showtext);

        // Generate settings
        $settings =  json_encode(array(
            "barcode_type" => $request->barcode_type,
            "barcode_format" => $request->barcode_format,
            "content" => $request->content,
            "width" => $request->width,
            "height" => $request->height,
            "color" => $request->color,
            "showtext" => $request->showtext
        ));

        // Update barcode
        Barcode::where('barcode_id', $request->barcode_id)->where('user_id', Auth::user()->id)->update([
            'name' => $request->name, 'bar_code' => $result, "settings" => $settings
        ]);

        // Redirect url
        return redirect()->route('user.download.barcode', $request->barcode_id)->with('success', trans('Barcode updated successfully.'));
    }

    // Update Barcode Status
    public function updateBarCodeStatus(Request $request)
    {
        // Get barcode details
        $barcode_details = Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->first();

        if ($barcode_details == null) {
            return view('errors.404');
        } else {
            // Get user created qr code count
            $barcode_count = Barcode::where('user_id', Auth::user()->id)->where('status', 1)->count();

            // Get plan details
            $plan = User::where('id', Auth::user()->id)->where('status', 1)->first();
            $plan_details = json_decode($plan->plan_details);

            // Check no of qrcodes
            if ($plan_details->no_barcodes == 999) {
                $no_barcodes = 999999;
            } else {
                $no_barcodes = $plan_details->no_barcodes;
            }

            // Check user created barcode count
            if ($barcode_count < $no_barcodes) {
                // Check status
                if ($barcode_details->status == 0) {
                    $status = 1;
                } else {
                    $status = 0;
                }

                // Update status
                Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => $status]);
                return redirect()->route('user.all.barcode')->with('success', trans('Barcode Status Updated Successfully!'));
            } else {
                // Update status
                Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => 0]);
                return redirect()->route('user.all.barcode')->with('failed', trans('Maximum barcode creation limit is exceeded, Please upgrade your plan.'));
            }
        }
    }

    // Delete Barcode
    public function deleteBarCode(Request $request)
    {
        // Update status
        Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->delete();
        return redirect()->route('user.all.barcode')->with('success', trans('Barcode Deleted Successfully!'));
    }

    // Download Barcode
    public function downloadBarCode($id)
    {
        // Queries
        $barcode_details = Barcode::where('barcode_id', $id)->where('user_id', Auth::user()->id)->first();

        return view('user.pages.bar-codes.download', compact('barcode_details'));
    }

    // Regenerate Barcode
    public function regenerateBarCode(Request $request)
    {
        // Show text
        $showtext = true;
        if ($request->showtext == "false") {
            $showtext = false;
        }

        // Default content
        $content = '9876543210';
        if ($request->content) {
            $content = $request->content;
        }

        // Generate barcode
        $result = base64_encode($request->barcode_type::getBarcodeSVG($content, $request->barcode_format, $request->width, $request->height, $request->color, $showtext));

        // Redirect url
        return response()->json(['source' => "data:image/svg+xml;base64," . $result]);
    }
}
