<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            "plan_name" => "Beginner",
            "plan_description" => "Nullam diam arcu, sodales quis convallis sit amet, sagittis varius ligula.",
            "plan_price" => 0,
            "validity" => 7,
            "no_access_qr" => 4,
            "no_qrcodes" => 20,
            "no_barcodes" => 20,
            "access_text" => 1,
            "access_url" => 1,
            "access_phone" => 1,
            "access_sms" => 0,
            "access_email" => 1,
            "access_whatsapp" => 0,
            "access_facetime" => 0,
            "access_location" => 0,
            "access_wifi" => 0,
            "access_event" => 0,
            "access_crypto" => 0,
            "access_vcard" => 0,
            "access_paypal" => 0,
            "access_upi" => 0,
            "additional_tools" => 0,
            "enable_analaytics" => 0,
            "hide_branding"  => 0,
            "is_watermark_enabled"  => 0,
            "support" => 1
        ]);

        DB::table('plans')->insert([
            "plan_name"  => "Intermediate",
            "plan_description"  => "Nullam diam arcu, sodales quis convallis sit amet, sagittis varius ligula.",
            "plan_price"  => 24,
            "validity"  => 31,
            "no_access_qr" => 10,
            "no_qrcodes" => 100,
            "no_barcodes" => 100,
            "access_text" => 1,
            "access_url" => 1,
            "access_phone" => 1,
            "access_sms" => 1,
            "access_email" => 1,
            "access_whatsapp" => 1,
            "access_facetime" => 1,
            "access_location" => 1,
            "access_wifi" => 1,
            "access_event" => 1,
            "access_crypto" => 0,
            "access_vcard" => 0,
            "access_paypal" => 0,
            "access_upi" => 0,
            "additional_tools" => 1,
            "enable_analaytics" => 1,
            "recommended"  => 1,
            "hide_branding"  => 1,
            "is_watermark_enabled"  => 1,
            "support" => 1
        ]);

        DB::table('plans')->insert([
            "plan_name"  => "Professional",
            "plan_description"  => "Nullam diam arcu, sodales quis convallis sit amet, sagittis varius ligula.",
            "plan_price"  => 48,
            "validity"  => 31,
            "no_access_qr" => 14,
            "no_qrcodes" => 999,
            "no_barcodes" => 999,
            "access_text" => 1,
            "access_url" => 1,
            "access_phone" => 1,
            "access_sms" => 1,
            "access_email" => 1,
            "access_whatsapp" => 1,
            "access_facetime" => 1,
            "access_location" => 1,
            "access_wifi" => 1,
            "access_event" => 1,
            "access_crypto" => 1,
            "access_vcard" => 1,
            "access_paypal" => 1,
            "access_upi" => 1,
            "additional_tools" => 1,
            "enable_analaytics" => 1,
            "hide_branding"  => 1,
            "is_watermark_enabled"  => 1,
            "support" => 1
        ]);
    }
}
