<?php

namespace App\Http\Controllers\User;

use Imagick;
use App\Models\Plan;
use App\Models\User;
use Spatie\Color\Hex;
use App\Models\Config;
use App\Models\QrCode;
use App\Models\Setting;
use App\Models\QrCodeItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Generator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class QRCodeController extends Controller
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

    // All User QR Codes
    public function index()
    {
        // Get User QR Codes
        $qr_codes = QrCode::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $settings = Setting::where('status', 1)->first();

        // View page
        return view('user.pages.qr-codes.index', compact('qr_codes', 'settings'));

    }

    // Create QR Code
    public function CreateQr()
    {
        // Get user created qr code count
        $qr_code_count = QrCode::where('user_id', Auth::user()->id)->count();

        // Get plan details
        $plan = User::where('id', Auth::user()->id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        // Check no of qrcodes
        if ($plan_details->no_qrcodes == 999) {
            $no_qrcodes = 999999;
        } else {
            $no_qrcodes = $plan_details->no_qrcodes;
        }

        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Check user created qr code count
            if ($qr_code_count < $no_qrcodes) {
                // View page
                return view('user.pages.qr-codes.create');
            } else {
                return redirect()->route('user.all.qr')->with('failed', trans('Maximum creation limit is exceeded, Please upgrade your plan.'));
            }
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Save QR Code
    public function saveQr(Request $request)
    {
        // Upload logo
        $directory = 'images/user/qr-code/';
        $qrImage = uniqid() . '.png';
        $qr_code_id = uniqid();

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
        // Check eye color
        if ($request->need_eye_color == "1") {
            // Set eye color & eye position (style)
            $qrcode->eyeColor($request->eyeColor_position, $eye_color->red(), $eye_color->green(), $eye_color->blue());

            // Set eye style
            $qrcode->eye($request->eye_color_style);
        }
        // Set QR code size
        $qrcode->style($request->qrcode_style)->size($request->size)->margin(1)->errorCorrection($request->qrcode_ecc);

        // Upload logo
        $destinationPath = '';
        $mergedImage = '';
        if ($request->hasFile('upload_logo')) {
            $destinationPath = 'images/user/qr-code/logos/';
            $mergedImage = uniqid() . '.' . $request->file('upload_logo')->getClientOriginalExtension();
            $request->file('upload_logo')->move($destinationPath, $mergedImage);
            // Set logo
            $qrcode->merge($destinationPath . $mergedImage, $request->upload_logo_size, true);
        }

        // Default fields
        $enable_analytics = '';

         // Check QR Code Type (Text)
        if ($request->qrcode_type == 'text') {

            // generating & saving the qr code in folder
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/text/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "text_field" => 'content',
                "text_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (URL)
        if ($request->qrcode_type == 'url') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/url/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "url_field" => 'url',
                "url_value" => $request->url,
                "url_enable_analytics" => 'checkbox',
                "url_enable_analytics_value" => $request->enable_analytics,
                "back_url" => $enable_analytics,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (PDF)
        if ($request->qrcode_type == 'pdf') {

            $pdf = $request->file('content');
            $pdf_path = Storage::putFile('public/pdfs', $pdf);
            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/pdf/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "pdf_path_field" => 'pdf',
                "pdf_path_value" => $pdf_path,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Phone)
        if ($request->qrcode_type == 'phone') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/phone/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "phone_field" => 'phone',
                "phone_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (SMS)
        if ($request->qrcode_type == 'sms') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/sms/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "sms_phone_field" => 'sms_phone',
                "sms_phone_value" => $request->phone,
                "sms_msg_field" => 'sms_msg',
                "sms_msg_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Email)
        if ($request->qrcode_type == 'email') {

            // generating & saving the qr code in folder
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/email/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "email_address_field" => 'email',
                "email_address_value" => $request->email,
                "email_subject_field" => 'subject',
                "email_subject_value" => $request->subject,
                "email_body_field" => 'body',
                "email_body_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (WhatsApp)
        if ($request->qrcode_type == 'whatsapp') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/whatsapp/' . $qr_code_id, $directory . $qrImage);

            // Default Message
            $phone = " ";
            $content = ' ';

            if ($request->phone != null && $request->content != null) {
                $phone = $request->phone;
                $content = $request->content;
            }

            // Generate QR
            $whatsapp_send_msg_link = "https://api.whatsapp.com/send?phone=" . $phone . "&text=" . urlencode($content);

            // Generate settings
            $settings =  json_encode(array(
                "whatsapp_no_field" => 'whatsapp_no',
                "whatsapp_no_value" => $request->phone,
                "whatsapp_msg_field" => 'whatsapp_msg',
                "whatsapp_msg_value" => $request->content,
                "whatsapp_send_msg_field" => 'whatsapp_msg',
                "whatsapp_send_msg_value" => $whatsapp_send_msg_link,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Facetime)
        if ($request->qrcode_type == 'facetime') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/facetime/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "facetime_field" => 'facetime',
                "facetime_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Location)
        if ($request->qrcode_type == 'location') {

            // generating & saving the qr code in folder
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/location/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "location_latitude_field" => 'latitude',
                "location_latitude_value" => $request->latitude,
                "location_longitude_field" => 'longitude',
                "location_longitude_value" => $request->longitude,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Wifi)
        if ($request->qrcode_type == 'wifi') {

            // generating & saving the qr code in folder
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/wifi/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "wifi_ssid_field" => 'wifi_ssid',
                "wifi_ssid_value" => $request->wifi_ssid,
                "wifi_encryption_field" => 'wifi_encryption',
                "wifi_encryption_value" => $request->wifi_encryption,
                "wifi_password_field" => 'wifi_password',
                "wifi_password_value" => $request->wifi_password,
                "wifi_is_hidden_field" => 'wifi_is_hidden',
                "wifi_is_hidden_value" => $request->wifi_is_hidden,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Event)
        if ($request->qrcode_type == 'event') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/event/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "event_name_field" => 'event',
                "event_name_value" => $request->event,
                "event_location_field" => 'event_location',
                "event_location_value" => $request->event_location,
                "event_note_field" => 'event_note',
                "event_note_value" => $request->event_note,
                "event_start_datetime_field" => 'event_start_datetime',
                "event_start_datetime_value" => $request->event_start_datetime,
                "event_end_datetime_field" => 'event_end_datetime',
                "event_end_datetime_value" => $request->event_end_datetime,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Crypto)
        if ($request->qrcode_type == 'crypto') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/crypto/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "crypto_coin_field" => 'crypto_coin',
                "crypto_coin_value" => $request->crypto_coin,
                "crypto_addressn_field" => 'crypto_address',
                "crypto_address_value" => $request->crypto_address,
                "crypto_amount_field" => 'crypto_amount',
                "crypto_amount_value" => $request->crypto_amount,
                "crypto_msg_field" => 'crypto_msg',
                "crypto_msg_value" => $request->crypto_msg,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (vCard)
        if ($request->qrcode_type == 'vcard') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/vcard/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "vcard_first_name_field" => 'vcard_first_name',
                "vcard_first_name_value" => $request->vcard_first_name,
                "vcard_last_name_field" => 'vcard_last_name',
                "vcard_last_name_value" => $request->vcard_last_name,
                "vcard_phone_field" => 'vcard_phone',
                "vcard_phone_value" => $request->vcard_phone,
                "vcard_email_field" => 'vcard_email',
                "vcard_email_value" => $request->vcard_email,
                "vcard_url_field" => 'vcard_url',
                "vcard_url_value" => $request->vcard_url,
                "vcard_company_field" => 'vcard_company',
                "vcard_company_value" => $request->vcard_company,
                "vcard_job_title_field" => 'vcard_job_title',
                "vcard_job_title_value" => $request->vcard_job_title,
                "vcard_birthday_field" => 'vcard_birthday',
                "vcard_birthday_value" => $request->vcard_birthday,
                "vcard_street_field" => 'vcard_street',
                "vcard_street_value" => $request->vcard_street,
                "vcard_city_field" => 'vcard_city',
                "vcard_city_value" => $request->vcard_city,
                "vcard_postal_field" => 'vcard_postal',
                "vcard_postal_value" => $request->vcard_postal,
                "vcard_region_field" => 'vcard_region',
                "vcard_region_value" => $request->vcard_region,
                "vcard_country_field" => 'vcard_country',
                "vcard_country_value" => $request->vcard_country,
                "vcard_note_field" => 'vcard_note',
                "vcard_note_value" => $request->vcard_note,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Paypal)
        if ($request->qrcode_type == 'paypal') {

            // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/paypal/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "paypal_link_field" => 'paypal_link',
                "paypal_link_value" => "http://paypal.me/" . $request->paypal_link,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (UPI)
        if ($request->qrcode_type == 'upi') {

            $upi_id = " ";
            $upi_payee_name = " ";
            $upi_currency = " ";

            if ($request->upi_id != "" && $request->upi_payee_name != "" && $request->upi_currency != "") {
                $upi_id = $request->upi_id;
                $upi_payee_name = $request->upi_payee_name;
                $upi_currency = $request->upi_currency;
            }

            $dafault_upi = "upi://pay?pa=" . $upi_id . "&pn=" . $upi_payee_name . "&cu=" . $upi_currency;

            if ($request->upi_amount) {
                $dafault_upi .= "&am=" . $request->upi_amount;
            }

            if ($request->upi_msg) {
                $dafault_upi .= "&tn=" . $request->upi_msg;
            }

           // generating & saving the qr code in folder'
            $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/upi/' . $qr_code_id, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "upi_id_field" => 'upi_id',
                "upi_id_value" => $request->upi_id,
                "upi_payee_name_field" => 'upi_payee_name',
                "upi_payee_name_value" => $upi_payee_name,
                "upi_payee_email_field" => 'upi_email',
                "upi_payee_email_value" => $dafault_upi,
                "upi_amount_field" => 'upi_amount',
                "upi_amount_value" => $request->upi_amount,
                "upi_msg_field" => 'upi_msg',
                "upi_msg_value" => $request->upi_msg,
                "upi_currency_field" => 'upi_currency',
                "upi_currency_value" => $request->upi_currency,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Save QR code text
        $qrCode = new QrCode();
        $qrCode->qr_code_id = $qr_code_id;
        $qrCode->user_id = Auth::user()->id;
        $qrCode->name = $request->name;
        $qrCode->type = $request->qrcode_type;
        $qrCode->qr_code_logo = $destinationPath . $mergedImage;
        $qrCode->qr_code_logo_size = $request->upload_logo_size;
        $qrCode->qr_code = $directory . $qrImage;
        $qrCode->settings = $settings;
        $qrCode->save();

        // Redirect url
        return redirect()->route('user.download.qrcode', $qr_code_id)->with('success', 'QR Code created successfully.');
    }

    // Edit QR Code
    public function editQr($id)
    {
        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Get QR code details
            $qr_code_details = QrCode::where('qr_code_id', $id)->where('qr_codes.user_id', Auth::user()->id)->first();

            return view('user.pages.qr-codes.edit', compact('qr_code_details'));
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Update QR Code
    public function updateQr(Request $request)
    {
        // Upload logo
        $directory = 'images/user/qr-code/';
        $qrImage = uniqid() . '.png';
        $qr_code_id = $request->qr_code_id;

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

        // Upload logo
        $destinationPath = '';
        $mergedImage = '';
        if ($request->hasFile('upload_logo')) {
            $destinationPath = 'images/user/qr-code/logos/';
            $mergedImage = uniqid() . '.' . $request->file('upload_logo')->getClientOriginalExtension();
            $request->file('upload_logo')->move($destinationPath, $mergedImage);
            // Set logo
            $qrcode->merge($destinationPath . $mergedImage, $request->upload_logo_size, true);
        }

        // Default fields
        $enable_analytics = '';

        // Check QR Code Type (Text)
        if ($request->qrcode_type == 'text') {
            // generating & saving the qr code in folder
            $qrcode->encoding('UTF-8')->format('png')->generate($request->content, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "text_field" => 'content',
                "text_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (URL)
        if ($request->qrcode_type == 'url') {
            // generating & saving the qr code in folder'
            if ($request->enable_analytics == "on") {
                $qrcode->encoding('UTF-8')->format('png')->generate(env('APP_URL') . '/qr/' . $qr_code_id, $directory . $qrImage);
            } else {
                $qrcode->encoding('UTF-8')->format('png')->generate($request->url, $directory . $qrImage);
            }

            // Generate settings
            $settings =  json_encode(array(
                "url_field" => 'url',
                "url_value" => $request->url,
                "url_enable_analytics" => 'checkbox',
                "url_enable_analytics_value" => $request->enable_analytics,
                "back_url" => $enable_analytics,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (Phone)
        if ($request->qrcode_type == 'phone') {
            // generating & saving the qr code in folder
            $qrcode->encoding('UTF-8')->format('png')->generate("tel:" . $request->content, $directory . $qrImage);

            // Generate settings
            $settings =  json_encode(array(
                "phone_field" => 'phone',
                "phone_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));
        }

        // Check QR Code Type (SMS)
        if ($request->qrcode_type == 'sms') {

            if ($request->phone != null && $request->content != null) {
                $phone = $request->phone;
                $content = $request->content;
            }

            // Generate settings
            $settings =  json_encode(array(
                "sms_phone_field" => 'sms_phone',
                "sms_phone_value" => $request->phone,
                "sms_msg_field" => 'sms_msg',
                "sms_msg_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "sms:" . $phone . ":" . $content;
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Email)
        if ($request->qrcode_type == 'email') {

            if ($request->email != null && $request->subject != null && $request->content != null) {
                $email = $request->email;
                $subject = $request->subject;
                $content = $request->content;
            }

            // Generate settings
            $settings =  json_encode(array(
                "email_address_field" => 'email',
                "email_address_value" => $request->email,
                "email_subject_field" => 'subject',
                "email_subject_value" => $request->subject,
                "email_body_field" => 'body',
                "email_body_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "mailto:" . $email . "?subject=" . $subject . "&body=" . $content;
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (WhatsApp)
        if ($request->qrcode_type == 'whatsapp') {

            if ($request->phone != null && $request->content != null) {
                $phone = $request->phone;
                $content = $request->content;
            }

            // Generate settings
            $settings =  json_encode(array(
                "whatsapp_no_field" => 'whatsapp_no',
                "whatsapp_no_value" => $request->phone,
                "whatsapp_msg_field" => 'whatsapp_msg',
                "whatsapp_msg_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "https://api.whatsapp.com/send?phone=" . $phone . "&text=" . urlencode($content);
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Facetime)
        if ($request->qrcode_type == 'facetime') {

            if ($request->content != null) {
                $content = $request->content;
            }

            // Generate settings
            $settings =  json_encode(array(
                "facetime_field" => 'facetime',
                "facetime_value" => $request->content,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "facetime:" . $content;
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Location)
        if ($request->qrcode_type == 'location') {

            if ($request->latitude != null && $request->longitude != null) {
                $latitude = $request->latitude;
                $longitude = $request->longitude;
            }

            // Generate settings
            $settings =  json_encode(array(
                "location_latitude_field" => 'latitude',
                "location_latitude_value" => $request->latitude,
                "location_longitude_field" => 'longitude',
                "location_longitude_value" => $request->longitude,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "geo:" . $latitude . "," . $longitude;
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Wifi)
        if ($request->qrcode_type == 'wifi') {

            if ($request->wifi_ssid != null && $request->wifi_encryption != null && $request->wifi_password != null && $request->wifi_is_hidden != null) {
                $wifi_ssid = $request->wifi_ssid;
                $wifi_encryption = $request->wifi_encryption;
                $wifi_password = $request->wifi_password;
                $wifi_is_hidden = $request->wifi_is_hidden;
            }

            // Generate settings
            $settings =  json_encode(array(
                "wifi_ssid_field" => 'wifi_ssid',
                "wifi_ssid_value" => $request->wifi_ssid,
                "wifi_encryption_field" => 'wifi_encryption',
                "wifi_encryption_value" => $request->wifi_encryption,
                "wifi_password_field" => 'wifi_password',
                "wifi_password_value" => $request->wifi_password,
                "wifi_is_hidden_field" => 'wifi_is_hidden',
                "wifi_is_hidden_value" => $request->wifi_is_hidden,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = 'WIFI:S:' . $wifi_ssid . ';T:' . $wifi_encryption . ';P:' . $wifi_password . $wifi_is_hidden . ';';
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Event)
        if ($request->qrcode_type == 'event') {

            if ($request->event != null && $request->event_location != null && $request->event_note != null && $request->event_start_datetime != null && $request->event_end_datetime != null) {
                $event = $request->event;
                $event_location = $request->event_location;
                $event_note = $request->event_note;
                $event_start_datetime = $request->event_start_datetime;
                $event_end_datetime = $request->event_end_datetime;
            }

            // Generate settings
            $settings =  json_encode(array(
                "event_name_field" => 'event',
                "event_name_value" => $request->event,
                "event_location_field" => 'event_location',
                "event_location_value" => $request->event_location,
                "event_note_field" => 'event_note',
                "event_note_value" => $request->event_note,
                "event_start_datetime_field" => 'event_start_datetime',
                "event_start_datetime_value" => $request->event_start_datetime,
                "event_end_datetime_field" => 'event_end_datetime',
                "event_end_datetime_value" => $request->event_end_datetime,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "BEGIN:VEVENT:\nSUMMARY:" . $event . ";\nDESCRIPTION:" . $event_note . ";\nLOCATION:" . $event_location . ";\nDTSTART:" . $event_start_datetime . ";\nDTEND:" . $event_end_datetime . ";\nEND:VEVENT;";
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Crypto)
        if ($request->qrcode_type == 'crypto') {

            if ($request->crypto_coin != null && $request->crypto_address != null && $request->crypto_amount != null && $request->crypto_msg != null) {
                $crypto_coin = $request->crypto_coin;
                $crypto_address = $request->crypto_address;
                $crypto_amount = $request->crypto_amount;
                $crypto_msg = $request->crypto_msg;
            }

            // Generate settings
            $settings =  json_encode(array(
                "crypto_coin_field" => 'crypto_coin',
                "crypto_coin_value" => $request->crypto_coin,
                "crypto_addressn_field" => 'crypto_address',
                "crypto_address_value" => $request->crypto_address,
                "crypto_amount_field" => 'crypto_amount',
                "crypto_amount_value" => $request->crypto_amount,
                "crypto_msg_field" => 'crypto_msg',
                "crypto_msg_value" => $request->crypto_msg,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = $crypto_coin . ":" . $crypto_address . "?amount=" . $crypto_amount . "&message=" . urlencode($crypto_msg);
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (vCard)
        if ($request->qrcode_type == 'vcard') {

            if (
                $request->vcard_first_name != null && $request->vcard_last_name != null && $request->vcard_phone != null && $request->vcard_email != null && $request->vcard_url != null &&
                $request->vcard_company != null && $request->vcard_job_title != null && $request->vcard_birthday != null && $request->vcard_street != null && $request->vcard_city != null &&
                $request->vcard_postal != null && $request->vcard_region != null && $request->vcard_country != null && $request->vcard_note != null
            ) {
                $vcard_first_name = $request->vcard_first_name;
                $vcard_last_name = $request->vcard_last_name;
                $vcard_phone = $request->vcard_phone;
                $vcard_email = $request->vcard_email;
                $vcard_company = $request->vcard_company;
                $vcard_job_title = $request->vcard_job_title;
                $vcard_url = $request->vcard_url;
                $vcard_birthday = $request->vcard_birthday;
                $vcard_street = $request->vcard_street;
                $vcard_city = $request->vcard_city;
                $vcard_postal = $request->vcard_postal;
                $vcard_region = $request->vcard_region;
                $vcard_country = $request->vcard_country;
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

            // Setting Values
            $addressLabel     = $vcard_street;
            $addressPobox     = '';
            $addressExt       = '';
            $addressStreet    = $vcard_street;
            $addressTown      = $vcard_city;
            $addressRegion    = $vcard_region;
            $addressPostCode  = $vcard_postal;
            $addressCountry   = $vcard_country;

            // VCard Setting up
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

            $generateQrCode .= 'URL;TYPE=PREF:' . str_replace('https://', '', $vcard_url) . "\n";

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

            // Generate settings
            $settings =  json_encode(array(
                "vcard_first_name_field" => 'vcard_first_name',
                "vcard_first_name_value" => $request->vcard_first_name,
                "vcard_last_name_field" => 'vcard_last_name',
                "vcard_last_name_value" => $request->vcard_last_name,
                "vcard_phone_field" => 'vcard_phone',
                "vcard_phone_value" => $request->vcard_phone,
                "vcard_email_field" => 'vcard_email',
                "vcard_email_value" => $request->vcard_email,
                "vcard_url_field" => 'vcard_url',
                "vcard_url_value" => $request->vcard_url,
                "vcard_company_field" => 'vcard_company',
                "vcard_company_value" => $request->vcard_company,
                "vcard_job_title_field" => 'vcard_job_title',
                "vcard_job_title_value" => $request->vcard_job_title,
                "vcard_birthday_field" => 'vcard_birthday',
                "vcard_birthday_value" => $request->vcard_birthday,
                "vcard_street_field" => 'vcard_street',
                "vcard_street_value" => $request->vcard_street,
                "vcard_city_field" => 'vcard_city',
                "vcard_city_value" => $request->vcard_city,
                "vcard_postal_field" => 'vcard_postal',
                "vcard_postal_value" => $request->vcard_postal,
                "vcard_region_field" => 'vcard_region',
                "vcard_region_value" => $request->vcard_region,
                "vcard_country_field" => 'vcard_country',
                "vcard_country_value" => $request->vcard_country,
                "vcard_note_field" => 'vcard_note',
                "vcard_note_value" => $request->vcard_note,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (Paypal)
        if ($request->qrcode_type == 'paypal') {

            if ($request->paypal_link != null) {
                $paypal_link = $request->paypal_link;
            }

            // Generate settings
            $settings =  json_encode(array(
                "paypal_link_field" => 'paypal_link',
                "paypal_link_value" => $request->paypal_link,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = "http://paypal.me/" . $paypal_link;
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Check QR Code Type (UPI)
        if ($request->qrcode_type == 'upi') {

            if ($request->upi_id != "" && $request->upi_payee_name != "" && $request->upi_currency != "") {
                $upi_id = $request->upi_id;
                $upi_payee_name = $request->upi_payee_name;
                $upi_currency = $request->upi_currency;
            }

            $dafault_upi = "upi://pay?pa=" . $upi_id . "&pn=" . $upi_payee_name . "&cu=" . $upi_currency;

            if($request->upi_amount) {
                $dafault_upi .= "&am=".$request->upi_amount;
            }

            if($request->upi_msg) {
                $dafault_upi .= "&tn=".$request->upi_msg;
            }

            // Generate settings
            $settings =  json_encode(array(
                "upi_id_field" => 'upi_id',
                "upi_id_value" => $request->upi_id,
                "upi_payee_name_field" => 'upi_payee_name',
                "upi_payee_name_value" => $upi_payee_name,
                "upi_amount_field" => 'upi_amount',
                "upi_amount_value" => $request->upi_amount,
                "upi_msg_field" => 'upi_msg',
                "upi_msg_value" => $request->upi_msg,
                "upi_currency_field" => 'upi_currency',
                "upi_currency_value" => $request->upi_currency,
                "qrcode_style" => $request->qrcode_style,
                "color_style" => $request->color_style,
                "color" => $request->color,
                "foreground_gradient_type" => $request->foreground_gradient_type,
                "primary_color" => $request->primary_color,
                "secondary_color" => $request->secondary_color,
                "need_eye_color" => $request->need_eye_color,
                "eye_color" => $request->eye_color,
                "eyeColor_position" => $request->eyeColor_position,
                "eye_color_style" => $request->eye_color_style,
                "size" => $request->size,
                "margin" => 1,
                "qrcode_ecc" => $request->qrcode_ecc
            ));

            // Generate QR
            $generateQrCode = $dafault_upi;
            $qrcode->encoding('UTF-8')->format('png')->generate($generateQrCode, $directory . $qrImage);
        }

        // Update QR code text
        QrCode::where('qr_code_id', $qr_code_id)->where('user_id', Auth::user()->id)->update([
            'name' => $request->name, 'qr_code_logo' => $destinationPath . $mergedImage,
            'qr_code_logo_size' => $request->upload_logo_size, "qr_code" => $directory . $qrImage, "settings" => $settings
        ]);

        // Redirect url
        return redirect()->route('user.download.qrcode', $qr_code_id)->with('success', trans('QR Code updated successfully.'));
    }

    // Update QR Code Status
    public function updateQrCodeStatus(Request $request)
    {
        // Get user created qr code count
        $qr_code_count = QrCode::where('user_id', Auth::user()->id)->where('status', 1)->count();

        // Get plan details
        $plan = User::where('id', Auth::user()->id)->where('status', 1)->first();
        $plan_details = json_decode($plan->plan_details);

        // Get QRCode details
        $qr_details = QrCode::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->first();

        if ($qr_details == null) {
            return view('errors.404');
        } else {
            // Check no of qrcodes
            if ($plan_details->no_qrcodes == 999) {
                $no_qrcodes = 999999;
            } else {
                $no_qrcodes = $plan_details->no_qrcodes;
            }

            // Check active plan
            $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            $current_time = Carbon::now();

            if ($current_time < $plan_validity) {
                // Check user created qr code count
                if ($qr_code_count < $no_qrcodes) {
                    // Check status
                    if ($qr_details->status == 0) {
                        $status = 1;
                    } else {
                        $status = 0;
                    }

                    // Update status
                    QrCode::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => $status]);
                    QrCodeItem::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => $status]);
                    return redirect()->route('user.all.qr')->with('success', trans('QR Code Status Updated Successfully!'));
                } else {
                    // Update status
                    QrCode::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => 0]);
                    QrCodeItem::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->update(['status' => 0]);
                    return redirect()->route('user.all.qr')->with('failed', trans('Maximum qrcode creation limit is exceeded, Please upgrade your plan.'));
                }
            } else {
                // Redirect plan
                return redirect()->route('user.plans');
            }
        }
    }

    // Delete QR Code
    public function deleteQrCode(Request $request)
    {
        // Check active plan
            $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
            $current_time = Carbon::now();

            if ($current_time < $plan_validity) {
                // Update status
                QrCode::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->delete();
                QrCodeItem::where('qr_code_id', $request->query('id'))->where('user_id', Auth::user()->id)->delete();
                return redirect()->route('user.all.qr')->with('success', trans('QR Code Deleted Successfully!'));
            } else {
                // Redirect plan
                return redirect()->route('user.plans');
            }
    }

    // Download QR Code
    public function downloadQrCode($id)
    {
        // Check active plan
        $plan_validity = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Auth::user()->plan_validity);
        $current_time = Carbon::now();

        if ($current_time < $plan_validity) {
            // Queries
            $qrcode_details = QrCode::where('qr_code_id', $id)->where('user_id', Auth::user()->id)->first();
            $config = Config::get();

            return view('user.pages.qr-codes.download', compact('qrcode_details', 'config'));
        } else {
            // Redirect plan
            return redirect()->route('user.plans');
        }
    }

    // Type Wise Qr Codes
    public function getTypeQRCode(Request $request, $type)
    {
        // Queries
        $qr_codes = QrCode::where('type', $request->type)->where('user_id', Auth::user()->id)->get();

        return view('user.pages.qr-codes.type-qrcodes', compact('qr_codes'));
    }

    // Regenerate QR Code
    public function regenerateQr(Request $request)
    {
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

        // Check QR Code Type (PDF)
        if ($request->qrcode_type == 'pdf') {
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

        // Redirect url
        return response()->json(['status' => true, 'source' => "data:image/png+xml;base64," . $output]);
    }
}
