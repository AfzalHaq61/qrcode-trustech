<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use Spatie\Color\Hex;
use App\Models\Config;
use App\Models\Setting;
use App\Models\QrCodeItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Generator;

class QRGeneratorController extends Controller
{
    public function qrGenerator($type)
    {
        // Default queries
        $config = Config::get();
        $setting = Setting::where('status', 1)->first();
            
        return view('website.generator.qr', compact('config'));
    }

    // Regenerate QR Code
    public function generateQr(Request $request)
    {
        // User ip address
        $ip = $request->ip();

        // Default queries
        $setting = Setting::where('status', 1)->first();
        $qrCounts = QrCodeItem::where('user_id', $ip)->whereDate('created_at', Carbon::today())->get();

        // User ip address
        $ip = $request->ip();

        // Check ip count
        if ($setting->qr_count > count($qrCounts)) {
            // Convert to RGB color (Color)
            $color = Hex::fromString($request->color)->toRgb();
            // Convert to RGB first color (Gradient)
            $primary_color = Hex::fromString($request->primary_color)->toRgb();
            // Convert to RGB second color (Gradient)
            $secondary_color = Hex::fromString($request->secondary_color)->toRgb();
            // Convert to RGB eye color (Eye Color)
            $eye_color = Hex::fromString($request->eye_color)->toRgb();

            // new QR code init
            $qrcode = new Generator;

            if ($request->color_style == "color") {
                // Set color
                $qrcode->color($color->red(), $color->green(), $color->blue());
            }


            if ($request->color_style == "gradient") {
                // Set Gradient start & end colors & type
                $qrcode->gradient($primary_color->red(), $primary_color->green(), $primary_color->blue(), $secondary_color->red(), $secondary_color->green(), $secondary_color->blue(), $request->foreground_gradient_type);
            }

            if ($request->need_eye_color == "1") {
                // Set eye color & eye position (style)
                $qrcode->eyeColor($request->eyeColor_position, $eye_color->red(), $eye_color->green(), $eye_color->blue());

                // Set eye style
                $qrcode->eye($request->eye_color_style);
            }
            // Set QR code size
            $qrcode->style($request->qrcode_style)->size($request->size)->margin(1)->errorCorrection($request->qrcode_ecc);

            // Set logo
            if ($request->hasFile('upload_logo')) {
                // Set logo
                $qrcode->merge($request->upload_logo, $request->upload_logo_size, .6, true);
            }

            // Check QR Code Type (Text)
            if ($request->qrcode_type == 'text') {
                // Output (Base64)
                $content = " ";

                if (isset($request->content)) {
                    $content = $request->content;
                }

                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($content));
            }

            // Check QR Code Type (URL)
            if ($request->qrcode_type == 'url') {
                // Output (Base64)
                $content = " ";

                if (isset($request->content)) {
                    $content = $request->content;
                }

                // generating & saving the qr code in folder'
                if ($request->enable_analytics == "true") {
                    $qr_code_id = uniqid();
                    $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/' . $qr_code_id));
                } else {
                    $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($content));
                }
            }

            // Check QR Code Type (Phone)
            if ($request->qrcode_type == 'phone') {
                // Output (Base64)
                $content = " ";

                if (isset($request->content)) {
                    $content = "tel:" . $request->content;
                }

                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($content));
            }

            // Check QR Code Type (SMS)
            if ($request->qrcode_type == 'sms') {
                // Default Message
                $phone = " ";
                $content = ' ';

                if (isset($request->phone)) {
                    $phone = $request->phone;
                }

                if (isset($request->content)) {
                    $content = $request->content;
                }

                // Generate QR
                $generateQrCode = "sms:" . $phone . ":" . $content;
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Email)
            if ($request->qrcode_type == 'email') {
                // Default message
                $email = " ";
                $subject = ' ';
                $content = ' ';

                if (isset($request->email)) {
                    $email = $request->email;
                }

                if (isset($request->subject)) {
                    $subject = $request->subject;
                }

                if (isset($request->content)) {
                    $content = $request->content;
                }

                // Generate QR
                $generateQrCode = "mailto:" . $email . "?subject=" . $subject . "&body=" . $content;
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (WhatsApp)
            if ($request->qrcode_type == 'whatsapp') {
                // Default Message
                $phone = " ";
                $content = ' ';

                if (isset($request->phone)) {
                    $phone = $request->phone;
                }

                if (isset($request->content)) {
                    $content = $request->content;
                }

                // Generate QR
                $generateQrCode = "https://api.whatsapp.com/send?phone=" . $phone . "&text=" . urlencode($content);
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Facetime)
            if ($request->qrcode_type == 'facetime') {
                // Default Message
                $content = " ";

                if (isset($request->content)) {
                    $content = $request->content;
                }

                // Generate QR
                $generateQrCode = "facetime:" . $content;
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Location)
            if ($request->qrcode_type == 'location') {
                // Default Message
                $latitude = " ";
                $longitude = " ";

                if (isset($request->latitude)) {
                    $latitude = $request->latitude;
                }

                if (isset($request->longitude)) {
                    $longitude = $request->longitude;
                }

                // Generate QR
                $generateQrCode = "geo:" . $latitude . "," . $longitude;
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Wifi)
            if ($request->qrcode_type == 'wifi') {
                // Default Message
                $wifi_ssid = ' ';
                $wifi_encryption = ' ';
                $wifi_password = '';
                $wifi_is_hidden = ' ';

                if (isset($request->wifi_ssid)) {
                    $wifi_ssid = $request->wifi_ssid;
                }

                if (isset($request->wifi_encryption)) {
                    $wifi_encryption = $request->wifi_encryption;
                }

                if (isset($request->wifi_password)) {
                    $wifi_password = $request->wifi_password;
                }

                if (isset($request->wifi_is_hidden)) {
                    $wifi_is_hidden = $request->wifi_is_hidden;
                }

                // Generate QR
                $generateQrCode = 'WIFI:S:' . $wifi_ssid . ';T:' . $wifi_encryption . ';P:' . $wifi_password . ';' . $wifi_is_hidden . ';';
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Event)
            if ($request->qrcode_type == 'event') {
                // Default Message
                $event = ' ';
                $event_location = ' ';
                $event_note = " ";
                $event_start_datetime = " ";
                $event_end_datetime = " ";

                if (isset($request->event)) {
                    $event = $request->event;
                }

                if (isset($request->event_location)) {
                    $event_location = $request->event_location;
                }

                if (isset($request->event_note)) {
                    $event_note = $request->event_note;
                }

                if (isset($request->event_start_datetime)) {
                    $event_start_datetime = $request->event_start_datetime;
                }

                if (isset($request->event_end_datetime)) {
                    $event_end_datetime = $request->event_end_datetime;
                }

                // Generate QR
                $generateQrCode = "BEGIN:VEVENT:\nSUMMARY:" . $event . ";\nDESCRIPTION:" . $event_note . ";\nLOCATION:" . $event_location . ";\nDTSTART:" . $event_start_datetime . ";\nDTEND:" . $event_end_datetime . ";\nEND:VEVENT;";
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Crypto)
            if ($request->qrcode_type == 'crypto') {
                // Default Message
                $crypto_coin = " ";
                $crypto_address = " ";
                $crypto_amount = " ";
                $crypto_msg = " ";

                if (isset($request->crypto_coin)) {
                    $crypto_coin = $request->crypto_coin;
                }

                if (isset($request->crypto_address)) {
                    $crypto_address = $request->crypto_address;
                }

                if (isset($request->crypto_amount)) {
                    $crypto_amount = $request->crypto_amount;
                }

                if (isset($request->crypto_msg)) {
                    $crypto_msg = $request->crypto_msg;
                }

                // Generate QR
                $generateQrCode = $crypto_coin . ":" . $crypto_address . "?amount=" . $crypto_amount . "&message=" . urlencode($crypto_msg);
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (vCard)
            if ($request->qrcode_type == 'vcard') {
                // Default Message
                $vcard_first_name = " ";
                $vcard_last_name = " ";
                $vcard_phone = " ";
                $vcard_email = " ";
                $vcard_url = " ";
                $vcard_company = " ";
                $vcard_job_title = " ";
                $vcard_birthday = " ";
                $vcard_street = " ";
                $vcard_city = " ";
                $vcard_postal = " ";
                $vcard_region = " ";
                $vcard_country = " ";
                $vcard_note = " ";

                if (isset($request->vcard_first_name)) {
                    $vcard_first_name = $request->vcard_first_name;
                }

                if (isset($request->vcard_last_name)) {
                    $vcard_last_name = $request->vcard_last_name;
                }

                if (isset($request->vcard_phone)) {
                    $vcard_phone = $request->vcard_phone;
                }

                if (isset($request->vcard_email)) {
                    $vcard_email = $request->vcard_email;
                }

                if (isset($request->vcard_url)) {
                    $vcard_url = $request->vcard_url;
                }

                if (isset($request->vcard_company)) {
                    $vcard_company = $request->vcard_company;
                }

                if (isset($request->vcard_job_title)) {
                    $vcard_job_title = $request->vcard_job_title;
                }

                if (isset($request->vcard_birthday)) {
                    $vcard_birthday = $request->vcard_birthday;
                }

                if (isset($request->vcard_street)) {
                    $vcard_street = $request->vcard_street;
                }

                if (isset($request->vcard_city)) {
                    $vcard_city = $request->vcard_city;
                }

                if (isset($request->vcard_postal)) {
                    $vcard_postal = $request->vcard_postal;
                }

                if (isset($request->vcard_region)) {
                    $vcard_region = $request->vcard_region;
                }

                if (isset($request->vcard_country)) {
                    $vcard_country = $request->vcard_country;
                }

                if (isset($request->vcard_note)) {
                    $vcard_note = $request->vcard_note;
                }

                // Generate QR
                $name         =  $vcard_first_name . " " . $vcard_last_name;
                $sortName     = $vcard_last_name . ";" . $vcard_first_name;
                $phone        = $vcard_phone;
                $phonePrivate = $vcard_phone;
                $phoneCell    = $vcard_phone;
                $orgName      = $vcard_company;

                $email        = $vcard_email;

                // Setting up
                $addressLabel     = $vcard_street;
                $addressPobox     = '';
                $addressExt       = '';
                $addressStreet    = $vcard_street;
                $addressTown      = $vcard_city;
                $addressRegion    = $vcard_region;
                $addressPostCode  = $vcard_postal;
                $addressCountry   = $vcard_country;

                // Vcard
                $generateQrCode  = 'BEGIN:VCARD' . "\n";
                $generateQrCode .= 'VERSION:3.0' . "\n";
                $generateQrCode .= 'N:' . $sortName . "\n";
                $generateQrCode .= 'FN:' . $name . "\n";
                $generateQrCode .= 'BDAY:' . $vcard_birthday . "\n";
                $generateQrCode .= 'ORG:' . $orgName . "\n";
                $generateQrCode .= 'TITLE:' . $vcard_job_title . "\n";

                $generateQrCode .= 'TEL;WORK;VOICE:' . $phone . "\n";
                $generateQrCode .= 'TEL;HOME;VOICE:' . $phonePrivate . "\n";
                $generateQrCode .= 'TEL;TYPE=cell:' . $phoneCell . "\n";

                $generateQrCode .= 'URL;TYPE=PREF:http://' . str_replace('https://', '', $vcard_url) . "\n";

                $generateQrCode .= 'ADR;TYPE=work;' .
                    'LABEL="' . $addressLabel . '":'
                    . $addressPobox . ';'
                    . $addressExt . ';'
                    . $addressStreet . ';'
                    . $addressTown . ';'
                    . $addressRegion . ';'
                    . $addressPostCode . ';'
                    . $addressCountry
                    . "\n";

                $generateQrCode .= 'EMAIL:' . $email . "\n";
                $generateQrCode .= 'NOTE:' . $vcard_note . "\n";

                $generateQrCode .= 'END:VCARD';

                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (Paypal)
            if ($request->qrcode_type == 'paypal') {
                // Default Message
                $paypal_link = " ";

                if (isset($request->paypal_link)) {
                    $paypal_link = $request->paypal_link;
                }

                // Generate QR
                $generateQrCode = "http://paypal.me/" . $paypal_link;
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Check QR Code Type (UPI)
            if ($request->qrcode_type == 'upi') {
                // Default Message
                $upi_id = " ";
                $upi_payee_name = " ";
                $upi_currency = " ";

                if (isset($request->upi_id)) {
                    $upi_id = $request->upi_id;
                }

                if (isset($request->upi_payee_name)) {
                    $upi_payee_name = $request->upi_payee_name;
                }

                if (isset($request->upi_currency)) {
                    $upi_currency = $request->upi_currency;
                }

                $dafault = "upi://pay?pa=" . $upi_id . "&pn=" . $upi_payee_name . "&cu=" . $upi_currency;

                if ($request->upi_amount) {
                    $dafault .= "&am=" . $request->upi_amount;
                }

                if ($request->upi_msg) {
                    $dafault .= "&tn=" . $request->upi_msg;
                }

                // Generate QR
                $generateQrCode = $dafault;
                $output = base64_encode($qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode));
            }

            // Save QR code text
            $qrCodeItem = new QrCodeItem();
            $qrCodeItem->qr_code_id = uniqid();
            $qrCodeItem->user_id = $ip;
            $qrCodeItem->field_name = "";
            $qrCodeItem->field_value = "";
            $qrCodeItem->save();

            // Redirect url
            return response()->json(['status' => true, 'source' => "data:image/png+xml;base64," . $output]);
        } else {
            // Redirect url
            return response()->json(['status' => false, 'source' => ""]);
        }
    }
}
