<?php

namespace App\Http\Controllers\Admin;

use DateTimeZone;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Setting;
use App\Models\Currency;
use App\Services\BreadcrumbService;
use Illuminate\Http\Request;
use App\Classes\AccessableQr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Validator;
use Spatie\ResponseCache\Facades\ResponseCache;

class SettingController extends Controller
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

    // GeneralConfigurationSettings
    public function index(BreadcrumbService $breadcrumbService)
    {
        // Queries
        $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
        $currencies = Currency::get();
        $settings = Setting::first();
        $config = Config::get();

        // Get image limit
        $image_limit = [
            'SIZE_LIMIT' => env('SIZE_LIMIT', '')
        ];

        $settings['image_limit'] = $image_limit;
        $breadcrumbs = $breadcrumbService->generate();

        return Inertia::render('Admin/Settings/GeneralConfigurationSettings', [
            'settings' => $settings,
            'timezonelist' => $timezonelist,
            'currencies' => $currencies,
            'config' => $config,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // WebsiteConfigurationSettings
    public function websiteConfigurationForm(BreadcrumbService $breadcrumbService)
    {

        $config = Config::get();
        $settings = Setting::first();
        $breadcrumbs = $breadcrumbService->generate();


        return Inertia::render('Admin/Settings/WebsiteConfigurationSettings', [
            'config' => $config,
            'settings' => $settings,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // WebsiteQrGeneratorConfigurationSettings.
    public function websiteQrGeneratorConfigSetting(BreadcrumbService $breadcrumbService)
    {

        $config = Config::get();
        $settings = Setting::first();
        $breadcrumbs = $breadcrumbService->generate();

        return Inertia::render('Admin/Settings/WebsiteQrGeneratorConfigurationSettings', [
            'config' => $config,
            'settings' => $settings,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // PaymentMethodConfigurationSettings
    public function paymentMethodConfigurationSetting(BreadcrumbService  $breadcrumbService)
    {
        $config = Config::get();
        $settings = Setting::first();
        $breadcrumbs = $breadcrumbService->generate();

        return Inertia::render('Admin/Settings/PaymentMethodConfigurationSettings', [
            'config' => $config,
            'settings' => $settings,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // GoogleConfigurationSettings.
    public function googleConfigurationSetting(BreadcrumbService  $breadcrumbService)
    {
        $settings = Setting::first();
        $breadcrumbs = $breadcrumbService->generate();

        // Get Recaptcha configuration details
        $recaptcha_configuration = [
            'RECAPTCHA_ENABLE' => env('RECAPTCHA_ENABLE', ''),
            'RECAPTCHA_SITE_KEY' => env('RECAPTCHA_SITE_KEY', ''),
            'RECAPTCHA_SECRET_KEY' => env('RECAPTCHA_SECRET_KEY', '')
        ];

        // Get google configuration details
        $google_configuration = [
            'GOOGLE_ENABLE' => env('GOOGLE_ENABLE', ''),
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID', ''),
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET', ''),
            'GOOGLE_REDIRECT' => env('GOOGLE_REDIRECT', '')
        ];

        $settings['recaptcha_configuration'] = $recaptcha_configuration;
        $settings['google_configuration'] = $google_configuration;

        return Inertia::render('Admin/Settings/GoogleConfigurationSettings', [
            'settings' => $settings,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // EmailConfigurationSettings
    public function emailConfiguration(BreadcrumbService  $breadcrumbService)
    {

        $settings = Setting::first();
      
        $breadcrumbs = $breadcrumbService->generate();
        // Get email configuration details
        $email_configuration = [
            'driver' => env('MAIL_MAILER', 'smtp'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'address' => env('MAIL_FROM_ADDRESS'),
            'name' => env('MAIL_FROM_NAME', $settings->site_name),
        ];

        $settings['email_configuration'] = $email_configuration;
        
       
        return Inertia::render('Admin/Settings/EmailConfigurationSettings', [
            'settings' => $settings,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Update General Setting
    public function changeGeneralSettings(Request $request)
    {
        Setting::where('id', '1')->update([
            'tawk_chat_bot_key' => $request->tawk_chat_bot_key
        ]);

        Config::where('config_key', 'timezone')->update([
            'config_value' => $request->timezone,
        ]);

        Config::where('config_key', 'currency')->update([
            'config_value' => $request->currency,
        ]);

        Config::where('config_key', 'term')->update([
            'config_value' => $request->term,
        ]);

        Config::where('config_key', 'share_content')->update([
            'config_value' => $request->share_content,
        ]);

        $this->changeEnv([
            'TIMEZONE' => $request->timezone,
            'APP_TYPE' => $request->app_type,
            'COOKIE_CONSENT_ENABLED' => $request->cookie,
            'SIZE_LIMIT' => $request->image_limit
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('General Settings Updated Successfully!'));
    }

    // Update Website Setting
    public function changeWebsiteSettings(Request $request)
    {
        
        Setting::where('id', '1')->update([
            'site_name' => $request->site_name, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords
        ]);

        $double_site_name = str_replace('"', '', trim($request->site_name, '"'));
        $space_name = str_replace("'", '', trim($double_site_name, "'"));
        $site_name = str_replace(" ", '', trim($space_name, " "));

        Config::where('config_key', 'site_name')->update([
            'config_value' => $site_name,
        ]);

        Config::where('config_key', 'app_theme')->update([
            'config_value' => $request->app_theme,
        ]);

        // Check website logo
        if (isset($request->site_logo)) {
            $validator = $request->validate([
                'site_logo' => 'mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            $site_logo = '/images/web/elements/' . uniqid() . '.' . $request->site_logo->extension();
            $request->site_logo->move(public_path('images/web/elements'), $site_logo);

            // Update details
            Setting::where('id', '1')->update([
                'google_analytics_id' => $request->google_analytics_id,
                'site_name' => $request->site_name, 'site_logo' => $site_logo, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords,
                'tawk_chat_bot_key' => $request->tawk_chat_bot_key,
            ]);
        }

        // Check favicon
        if (isset($request->favi_icon)) {
            $validator = $request->validate([
                'favi_icon' => 'mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            $favi_icon = '/images/web/elements/' . uniqid() . '.' . $request->favi_icon->extension();
            $request->favi_icon->move(public_path('images/web/elements'), $favi_icon);

            // Update details
            Setting::where('id', '1')->update([
                'google_analytics_id' => $request->google_analytics_id,
                'site_name' => $request->site_name, 'favicon' => $favi_icon, 'seo_meta_description' => $request->seo_meta_desc, 'seo_keywords' => $request->meta_keywords,
                'tawk_chat_bot_key' => $request->tawk_chat_bot_key,
            ]);
        }

        // Check primary image for website banner
        if (isset($request->primary_image)) {
            $validator = $request->validate([
                'primary_image' => 'mimes:jpeg,png,jpg,gif,svg|max:' . env("SIZE_LIMIT") . '',
            ]);

            $primary_image = '/images/web/elements/' . uniqid() . '.' . $request->primary_image->extension();
            $request->primary_image->move(public_path('/images/web/elements'), $primary_image);

            // Update image
            Config::where('config_key', 'primary_image')->update([
                'config_value' => $primary_image,
            ]);
        }

        // Page redirect
        return redirect()->back()->with('success', trans('Website Settings Updated Successfully!'));
    }

    // Update Website QR Generator Setting
    public function changeWebsiteQrGeneratorSettings(Request $request)
    {
        $accessableQr = new AccessableQr;
        $accessableQr->Qr($request);

        // Update settings
        Setting::where('id', '1')->update([
            'show_qr' => $request->show, 'qr_count' => $request->qr_count, 'accessable_qr' => json_encode($accessableQr->access_types)
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('QR Generator Settings Updated Successfully!'));
    }

    // Update Payments Setting
    public function changePaymentsSettings(Request $request)
    {
        Config::where('config_key', 'paypal_mode')->update([
            'config_value' => $request->paypal_mode,
        ]);

        Config::where('config_key', 'paypal_client_id')->update([
            'config_value' => $request->paypal_client_key,
        ]);

        Config::where('config_key', 'paypal_secret')->update([
            'config_value' => $request->paypal_secret,
        ]);

        Config::where('config_key', 'razorpay_key')->update([
            'config_value' => $request->razorpay_client_key,
        ]);

        Config::where('config_key', 'razorpay_secret')->update([
            'config_value' => $request->razorpay_secret,
        ]);

        Config::where('config_key', 'stripe_publishable_key')->update([
            'config_value' => $request->stripe_publishable_key,
        ]);

        Config::where('config_key', 'stripe_secret')->update([
            'config_value' => $request->stripe_secret,
        ]);

        Config::where('config_key', 'bank_transfer')->update([
            'config_value' => $request->bank_transfer,
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Payment Settings Updated Successfully!'));
    }

    // Update Google Setting
    public function changeGoogleSettings(Request $request)
    {
        Setting::where('id', '1')->update([
            'google_analytics_id' => $request->google_analytics_id,
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Google Settings Updated Successfully!'));
    }

    // Update Email Setting
    public function changeEmailSettings(Request $request)
    {
        dd('welcome
        ');
        // Page redirect
        return redirect()->back()->with('failed', trans('You can change the respective values directly from .env file.'));
    }

    // Tax settings
    public function taxSetting()
    {
        // Queries
        $config = Config::get();
        $settings = Setting::first();

        // Page view
        return Inertia::render('Admin/Tax/Index', [
            'settings' => $settings,
            'config' => $config,
        ]);
    }

    // Update tax setting
    public function updateTaxSetting(Request $request)
    {
        // Update
        Config::where('config_key', 'invoice_prefix')->update([
            'config_value' => $request->invoice_prefix,
        ]);

        Config::where('config_key', 'invoice_name')->update([
            'config_value' => $request->invoice_name,
        ]);

        Config::where('config_key', 'invoice_email')->update([
            'config_value' => $request->invoice_email,
        ]);

        Config::where('config_key', 'invoice_phone')->update([
            'config_value' => $request->invoice_phone,
        ]);

        Config::where('config_key', 'invoice_address')->update([
            'config_value' => $request->invoice_address,
        ]);

        Config::where('config_key', 'invoice_city')->update([
            'config_value' => $request->invoice_city,
        ]);

        Config::where('config_key', 'invoice_state')->update([
            'config_value' => $request->invoice_state,
        ]);

        Config::where('config_key', 'invoice_zipcode')->update([
            'config_value' => $request->invoice_zipcode,
        ]);

        Config::where('config_key', 'invoice_country')->update([
            'config_value' => $request->invoice_country,
        ]);

        Config::where('config_key', 'tax_name')->update([
            'config_value' => $request->tax_name,
        ]);

        Config::where('config_key', 'tax_number')->update([
            'config_value' => $request->tax_number,
        ]);

        Config::where('config_key', 'tax_value')->update([
            'config_value' => $request->tax_value,
        ]);

        Config::where('config_key', 'invoice_footer')->update([
            'config_value' => $request->invoice_footer,
        ]);

        // Page redirect
        return redirect()->back()->with('success', trans('Invoice Setting Updated Successfully!'));
    }

    // Update email setting
    public function updateEmailSetting(Request $request)
    {
        // Update
        Config::where('config_key', 'email_heading')->update([
            'config_value' => $request->email_heading,
        ]);

        Config::where('config_key', 'email_footer')->update([
            'config_value' => $request->email_footer,
        ]);

        // Page redirect
        return redirect()->route('admin.tax.setting')->with('success', trans('Email Setting Updated Successfully!'));
    }

    // Clear cache
    public function clear()
    {
        // Laravel cache commend
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        ResponseCache::clear();

        // Page redirect
        return redirect()->back()->with('success', trans('Application Cache Cleared Successfully!'));
    }

    // Test email
    public function testEmail()
    {
       
        $message = [
            'msg' => 'Test mail'
        ];
        $mail = false;
       
        // dd( Mail::to(ENV('MAIL_FROM_ADDRESS'))->send(new \App\Mail\TestMail($message)));
        try {
            Mail::to(ENV('MAIL_FROM_ADDRESS'))->send(new \App\Mail\TestMail($message));
            $mail = true;
        } catch (\Exception $e) {
            // Page redirect
           
            return redirect()->back()->with('failed', trans('Email configuration wrong.'));
        }
        
        // Check email
        if ($mail == true) {
            // Page redirect
            return redirect()->back()->with('success', trans('Test mail send successfully.'));
        }
    }

    // Change .env file
    public function changeEnv($data = array())
    {
        if (count($data) > 0) {

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);

            // Loop through given data
            foreach ((array) $data as $key => $value) {

                // Loop through .env-data
                foreach ($env as $env_key => $env_value) {

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if ($entry[0] == $key) {
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }
}
