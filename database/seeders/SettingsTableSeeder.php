<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            "show_qr" => 1,
            "qr_count" => 10,
            "accessable_qr" => '{"text":true,"url":true,"phone":true,"sms":true,"email":true,"whatsapp":false,"facetime":false,"location":false,"wifi":false,"event":false,"crypto":false,"vcard":false,"paypal":false,"upi":false}',
            "google_analytics_id" => "UA-144200805-4",
            "google_adsense" => "",
            "facebook_pixel" => "",
            "site_name" => "Ultimate QR",
            "site_logo" => "images/web/logo/logo.png",
            "favicon" => "images/web/logo/favicon.png",
            "seo_meta_description" => "Ultimate QR is the advanced customizable QR code generator. Ultimate QR is the simple and modern application to create powerful QR codes.",
            "seo_keywords" => "qr code maker, qr code generator, barcode maker, barcode generator",
            "seo_image" => "images/web/logo/logo.png",
            "tawk_chat_bot_key" => "624ace832abe5b455fc45d5f/1fvq3dddn"
        ]);
    }
}
