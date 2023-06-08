<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\User;
use Spatie\Color\Hex;
use App\Models\Barcode;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Get User Bar Codes
        $bar_codes = Barcode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        // View page
        return view('admin.pages.bar-codes.index', compact('bar_codes', 'settings'));
    }

    // Create Bar Code
    public function CreateBarCode()
    {
        return view('admin.pages.bar-codes.create');
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
        return redirect()->route('admin.download.barcode', $barcode_id)->with('success', trans('Barcode created successfully.'));
    }

    // Edit Barcode
    public function editBarCode($id)
    {
        // Queries
        $barcode_details = Barcode::where('barcode_id', $id)->where('user_id', Auth::user()->id)->first();

        return view('admin.pages.bar-codes.edit', compact('barcode_details'));
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
        return redirect()->route('admin.download.barcode', $request->barcode_id)->with('success', trans('Barcode updated successfully.'));
    }

    // Update Barcode Status
    public function updateBarCodeStatus(Request $request)
    {
        // Get barcode details
        $barcode_details = Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->first();

        if ($barcode_details == null) {
            return view('errors.404');
        } else {
            // Check status
            if ($barcode_details->status == 0) {
                $status = 1;
            } else {
                $status = 0;
            }

            // Update status
            Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => $status]);
            return redirect()->route('admin.all.barcode')->with('success', trans('Barcode Status Updated Successfully!'));
        }
    }

    // Delete Barcode
    public function deleteBarCode(Request $request)
    {
        // Update status
        Barcode::where('barcode_id', $request->query('id'))->where('user_id', Auth::user()->id)->delete();
        return redirect()->route('admin.all.barcode')->with('success', trans('Barcode Deleted Successfully!'));
    }

    // Download Barcode
    public function downloadBarCode($id)
    {
        // Queries
        $barcode_details = Barcode::where('barcode_id', $id)->where('user_id', Auth::user()->id)->first();

        return view('admin.pages.bar-codes.download', compact('barcode_details'));
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
