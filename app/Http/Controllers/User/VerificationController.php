<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    // Verified email
    public function verifyEmailVerification()
    {
        // Update
        User::where('id', auth()->user()->id)->update([
            'email_verified_at' => now()
        ]);

        // Page redirect 
        return redirect()->route('user.dashboard');
    }

    // Resend Email Verification
    public function resendEmailVerification()
    {
        // Queries
        $user = User::where('id', Auth::user()->id)->where('status', 1)->first();
        // Send Email
        try {            
            $user->newEmail($user->email);
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed', trans('Email service not available.'));
        }

        // Page redirect 
        return redirect()->back()->with('success', trans('Mail Sent.'));
    }
}
