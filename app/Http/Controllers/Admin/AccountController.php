<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
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

    // My account
    public function index()
    {
        // Queries
        $account_details = User::where('id', auth()->user()->id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        return view('admin.pages.account.index', compact('account_details', 'settings', 'config'));
    }

    // Edit account
    public function editAccount()
    {
        // Queries
        $account_details = User::where('id', auth()->user()->id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        return view('admin.pages.account.edit', compact('account_details', 'settings', 'config'));
    }

    // Update account
    public function updateAccount(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required'
        ]);
        
        // Check profile image
        if (isset($request->profile_picture)) {
            // Image validatation
            $validator = $request->validate([
                'profile_picture' => 'required|mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            // get profile image
            $profile_picture = $request->profile_picture->getClientOriginalName();
            $UploadProfile = pathinfo($profile_picture, PATHINFO_FILENAME);
            $UploadExtension = pathinfo($profile_picture, PATHINFO_EXTENSION);

            // Upload image
            $profile_picture = 'images/admin/profile_images/' . $UploadProfile . '_' . uniqid() . '.' . $UploadExtension;
            $request->profile_picture->move(public_path('images/admin/profile_images'), $profile_picture);

            // Update user profile image
            User::where('id', auth()->user()->id)->update([
                'profile_image' => $profile_picture
            ]);
            
            return redirect()->route('admin.edit.account')->with('success', trans('Profile Updated Successfully!'));
        } else {
            // Update user profile data
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name
            ]);
                
            // Get register user data
            $registerUserData = User::where('id', auth()->user()->id)->first();
            
            if($request->email != $registerUserData->email) {
                // Check already register count
                $alreadyRegister = User::where('email', $request->email)->count();
                
                // Check already register
                if($alreadyRegister <= 0) {
                    // Update user profile data
                    User::where('id', auth()->user()->id)->update([
                        'email' => $request->email
                    ]);
                    return redirect()->route('admin.edit.account')->with('success', trans('Profile Updated Successfully!'));
                } else {
                    return redirect()->route('admin.edit.account')->with('failed', trans('This email address already registered.'));
                }
            }
            
            return redirect()->route('admin.edit.account')->with('success', trans('Profile Updated Successfully!'));
        }
    }

    // Change password
    public function changePassword()
    {
        // Queries
        $account_details = User::where('id', auth()->user()->id)->where('status', 1)->first();
        $settings = Setting::where('status', 1)->first();
        $config = Config::get();

        return view('admin.pages.account.change-password', compact('account_details', 'settings', 'config'));
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $validator = $request->validate([
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        if ($request->new_password == $request->confirm_password) {
            // Update Password
            User::where('id', auth()->user()->id)->update([
                'password' => bcrypt($request->new_password)
            ]);

            return redirect()->route('admin.change.password')->with('success', trans('Profile Password Changed Successfully!'));
        } else {
            return redirect()->route('admin.change.password')->with('failed', trans('Confirm Password Mismatched.'));
        }
    }

    // Change theme
    public function changeTheme($id)
    {
        // Update Password
        User::where('id', auth()->user()->id)->update([
            'choosed_theme' => $id
        ]);

        return redirect()->back();
    }
}
