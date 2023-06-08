<?php

namespace App\Http\Controllers\Website;

use Exception;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailerController extends Controller
{
    // Compose Email
    public function composeEmail(Request $request)
    {
        try {
            // Contact Details Array
            $contactDetails = [
                'name' => $request->emailName,
                'email' => $request->emailRecipient,
                'message' => $request->emailBody,
            ];

            // Send mail
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($contactDetails));

            return redirect()->back()->with('success', trans("Thank you for contacting us. We will get back to you shortly."));
        } catch (Exception $e) {
            return back()->with("error", "Email service not available.");
        }
    }
}
