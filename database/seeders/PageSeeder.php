<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Home (Banner) page
        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Title 1',
            'slug' => 'home',
            'body' => 'Advanced QR Code Barcode Generator',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Title 2',
            'slug' => 'home',
            'body' => 'Ultimate QR',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Description',
            'slug' => 'home',
            'body' => 'Ultimate QR is the advanced customizable QR code generator. Ultimate QR is the simple and modern application to create powerful QR codes.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Button Name 1',
            'slug' => 'home',
            'body' => 'Sign up',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Button Link 1',
            'slug' => 'home',
            'body' => 'register',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Button Name 2',
            'slug' => 'home',
            'body' => 'More features',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Banner Button Link 2',
            'slug' => 'home',
            'body' => '#features',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Home page
        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Subtitle',
            'slug' => 'home',
            'body' => '#1 Fastest growing QR code and Barcode Maker',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Title',
            'slug' => 'home',
            'body' => 'Main Features',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 1 Title',
            'slug' => 'home',
            'body' => 'Unlimited QRcode Generation',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 1 Description',
            'slug' => 'home',
            'body' => 'Create QR codes in your own business service/products.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 2 Title',
            'slug' => 'home',
            'body' => 'Barcode Generation',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 2 Description',
            'slug' => 'home',
            'body' => 'Generate unlimited high quality barcodes.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 3 Title',
            'slug' => 'home',
            'body' => 'Statistics',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 3 Description',
            'slug' => 'home',
            'body' => 'All URL link statistics are managable from admin and user panel.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 4 Title',
            'slug' => 'home',
            'body' => 'One Tap Sign-in',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 4 Description',
            'slug' => 'home',
            'body' => 'Signin with Google Integrated. Engage with your users very faster.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 5 Title',
            'slug' => 'home',
            'body' => 'Enable Dark Mode',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 5 Description',
            'slug' => 'home',
            'body' => 'Admin and User Panels are Dark mode enabled.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 6 Title',
            'slug' => 'home',
            'body' => 'SEO Friendly',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature 6 Description',
            'slug' => 'home',
            'body' => 'URL Title, Meta and SEO Settings are controllable from admin.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Title',
            'slug' => 'home',
            'body' => 'Many useful features',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Description',
            'slug' => 'home',
            'body' => 'Advanced QR Builder - Customizable QR Code generation with gradient colors, custom colors, qr styles and logo branding.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Button Name',
            'slug' => 'home',
            'body' => 'Signup now',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Button Link',
            'slug' => 'home',
            'body' => 'register',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Codes Count',
            'slug' => 'home',
            'body' => '13+',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Codes Title',
            'slug' => 'home',
            'body' => 'QR Code Types',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 1',
            'slug' => 'home',
            'body' => 'Text',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 2',
            'slug' => 'home',
            'body' => 'UPI',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 3',
            'slug' => 'home',
            'body' => 'URL',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 4',
            'slug' => 'home',
            'body' => 'Phone',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 5',
            'slug' => 'home',
            'body' => 'SMS',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 6',
            'slug' => 'home',
            'body' => 'Email',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 7',
            'slug' => 'home',
            'body' => 'WhatsApp',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 8',
            'slug' => 'home',
            'body' => 'Facetime',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 9',
            'slug' => 'home',
            'body' => 'Location',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'QR Code Type 10',
            'slug' => 'home',
            'body' => 'More',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Barcode Counts',
            'slug' => 'home',
            'body' => '30+',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Barcode Title',
            'slug' => 'home',
            'body' => 'Barcode Formats',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Title',
            'slug' => 'home',
            'body' => 'Many useful QR & Barcode Formats',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Description',
            'slug' => 'home',
            'body' => 'Advanced QR Builder - Customizable QR Code generation with gradient colors, custom colors, qr styles and logo branding.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Button Name',
            'slug' => 'home',
            'body' => 'Signup now',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Feature Banner Button Link',
            'slug' => 'home',
            'body' => 'register',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Pricing section
        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Pricing Subtitle',
            'slug' => 'home',
            'body' => 'Pricing',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Pricing Title',
            'slug' => 'home',
            'body' => 'Choose your best plan',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Home',
            'title' => 'Pricing Description',
            'slug' => 'home',
            'body' => 'Good investments will gives you 10x more revenue.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // About page
        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Page Subtitle',
            'slug' => 'about',
            'body' => 'About Us',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Page Title',
            'slug' => 'about',
            'body' => 'Ultimate QR is a simple, beautiful tool that helps you work sanely',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 1',
            'slug' => 'about',
            'body' => 'The only SaaS business platform that combines CRM, marketing automation &amp; commerce.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 2',
            'slug' => 'about',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 3',
            'slug' => 'about',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 4',
            'slug' => 'about',
            'body' => 'Ultimate QR is the only saas business platform that lets you run your business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 5',
            'slug' => 'about',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 6',
            'slug' => 'about',
            'body' => 'Enterprise software for startups',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 7',
            'slug' => 'about',
            'body' => 'Time is money. Stop jumping from tool to tool with all the hassle of integrations.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 8',
            'slug' => 'about',
            'body' => 'Now you can manage your entire business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'About Us',
            'title' => 'Description 9',
            'slug' => 'about',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Pricing page
        DB::table('pages')->insert([
            'name' => 'Pricing',
            'title' => 'Page Subtitle',
            'slug' => 'pricing',
            'body' => 'Pricing',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Pricing',
            'title' => 'Page Title',
            'slug' => 'pricing',
            'body' => 'Flexible pricing plan for your startup',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Pricing',
            'title' => 'Page Description',
            'slug' => 'pricing',
            'body' => 'Pricing that scales with your business immediately.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Contact page
        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Page Subtitle',
            'slug' => 'contact',
            'body' => 'Contact us',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Page Title',
            'slug' => 'contact',
            'body' => 'Let’s stay connected',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Page Description',
            'slug' => 'contact',
            'body' => 'It\'s never been easier to get in touch with Flex. Call us, use our live chat widget or email and we\'ll get back to you as soon as possible!',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Button Name',
            'slug' => 'contact',
            'body' => 'About Us',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Button Link',
            'slug' => 'contact',
            'body' => 'about',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Email Address',
            'slug' => 'contact',
            'body' => 'Email',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Email Address',
            'slug' => 'contact',
            'body' => 'contact@ultimateqr.in',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Phone Number',
            'slug' => 'contact',
            'body' => 'Phone',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Phone Number',
            'slug' => 'contact',
            'body' => '+91 987-654-3210',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Office Address',
            'slug' => 'contact',
            'body' => 'Office',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Office Address 1',
            'slug' => 'contact',
            'body' => '1686, Geraldine Lane',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Office Address 2',
            'slug' => 'contact',
            'body' => 'New York, NY 10013',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Social Links',
            'slug' => 'contact',
            'body' => 'Socials',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Facebook Link',
            'slug' => 'contact',
            'body' => '#',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Twitter Link',
            'slug' => 'contact',
            'body' => '#',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'Instagram Link',
            'slug' => 'contact',
            'body' => '#',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Contact us',
            'title' => 'LinkedIn Link',
            'slug' => 'contact',
            'body' => '#',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // FAQs
        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Page Subtitle',
            'slug' => 'faq',
            'body' => 'FAQs',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Page Title',
            'slug' => 'faq',
            'body' => 'Frequently Asked Questions',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Page Description',
            'slug' => 'faq',
            'body' => 'Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Question 1',
            'slug' => 'faq',
            'body' => 'What shipping options do you have?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Answer 1',
            'slug' => 'faq',
            'body' => 'For USA domestic orders we offer FedEx and USPS shipping. Contact us via email to learn more.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Question 2',
            'slug' => 'faq',
            'body' => 'What payment methods do you accept?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Answer 2',
            'slug' => 'faq',
            'body' => 'Any method of payments acceptable by you. For example: We accept MasterCard, Visa.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Question 3',
            'slug' => 'faq',
            'body' => 'How long does it take to ship my order?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Answer 3',
            'slug' => 'faq',
            'body' => 'Orders are usually shipped within 1-2 business days after placing the order.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Question 4',
            'slug' => 'faq',
            'body' => 'What shipping options do you have?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Answer 4',
            'slug' => 'faq',
            'body' => 'For USA domestic orders we offer FedEx and USPS shipping. Contact us via email to learn more.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Question 5',
            'slug' => 'faq',
            'body' => 'What payment methods do you accept?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Answer 5',
            'slug' => 'faq',
            'body' => 'Any method of payments acceptable by you. For example: We accept MasterCard, Visa.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Question 6',
            'slug' => 'faq',
            'body' => 'How long does it take to ship my order?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Answer 6',
            'slug' => 'faq',
            'body' => 'Orders are usually shipped within 1-2 business days after placing the order.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Get in touch Title',
            'slug' => 'faq',
            'body' => 'Have any additional questions?',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Get in touch Description',
            'slug' => 'faq',
            'body' => 'Ultimate QR is a Small SaaS Business. Ultimate QR isn’t a traditional company.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Button name',
            'slug' => 'faq',
            'body' => 'Get in touch',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'FAQs',
            'title' => 'Button link',
            'slug' => 'faq',
            'body' => '#',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Privacy policy
        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Page Subtitle',
            'slug' => 'privacy-policy',
            'body' => 'Privacy Policy',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Page Title',
            'slug' => 'privacy-policy',
            'body' => 'Beautiful tool that helps you',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 1',
            'slug' => 'privacy-policy',
            'body' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Updated on',
            'slug' => 'privacy-policy',
            'body' => 'Updated on',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Date',
            'slug' => 'privacy-policy',
            'body' => '23-04-2022 20:30 PM',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 1',
            'slug' => 'privacy-policy',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 2',
            'slug' => 'privacy-policy',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 3',
            'slug' => 'privacy-policy',
            'body' => 'Ultimate QR is the only saas business platform that lets you run your business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 4',
            'slug' => 'privacy-policy',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 5',
            'slug' => 'privacy-policy',
            'body' => 'Enterprise software for startups',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 6',
            'slug' => 'privacy-policy',
            'body' => 'Time is money. Stop jumping from tool to tool with all the hassle of integrations.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 7',
            'slug' => 'privacy-policy',
            'body' => 'Now you can manage your entire business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Privacy Policy',
            'title' => 'Description 8',
            'slug' => 'privacy-policy',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Refund policy
        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Page Subtitle',
            'slug' => 'refund-policy',
            'body' => 'Refund Policy',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Page Title',
            'slug' => 'refund-policy',
            'body' => 'Beautiful tool that helps you',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 1',
            'slug' => 'refund-policy',
            'body' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Updated on',
            'slug' => 'refund-policy',
            'body' => 'Updated on',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Date',
            'slug' => 'refund-policy',
            'body' => '23-04-2022 20:30 PM',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 1',
            'slug' => 'refund-policy',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 2',
            'slug' => 'refund-policy',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 3',
            'slug' => 'refund-policy',
            'body' => 'Ultimate QR is the only saas business platform that lets you run your business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 4',
            'slug' => 'refund-policy',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 5',
            'slug' => 'refund-policy',
            'body' => 'Enterprise software for startups',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 6',
            'slug' => 'refund-policy',
            'body' => 'Time is money. Stop jumping from tool to tool with all the hassle of integrations.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 7',
            'slug' => 'refund-policy',
            'body' => 'Now you can manage your entire business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Refund Policy',
            'title' => 'Description 8',
            'slug' => 'refund-policy',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        // Terms and Conditions
        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Page Subtitle',
            'slug' => 'terms-and-conditions',
            'body' => 'Terms and Conditions',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Page Title',
            'slug' => 'terms-and-conditions',
            'body' => 'Beautiful tool that helps you',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 1',
            'slug' => 'terms-and-conditions',
            'body' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Updated on',
            'slug' => 'terms-and-conditions',
            'body' => 'Updated on',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Date',
            'slug' => 'terms-and-conditions',
            'body' => '23-04-2022 20:30 PM',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 1',
            'slug' => 'terms-and-conditions',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 2',
            'slug' => 'terms-and-conditions',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 3',
            'slug' => 'terms-and-conditions',
            'body' => 'Ultimate QR is the only saas business platform that lets you run your business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 4',
            'slug' => 'terms-and-conditions',
            'body' => 'With Ultimate QR, you can run your business on one platform, seamlessly across all digital channels—and grow it anywhere. With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 5',
            'slug' => 'terms-and-conditions',
            'body' => 'Enterprise software for startups',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 6',
            'slug' => 'terms-and-conditions',
            'body' => 'Time is money. Stop jumping from tool to tool with all the hassle of integrations.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 7',
            'slug' => 'terms-and-conditions',
            'body' => 'Now you can manage your entire business on one platform.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);

        DB::table('pages')->insert([
            'name' => 'Terms and Conditions',
            'title' => 'Description 8',
            'slug' => 'terms-and-conditions',
            'body' => 'With a single point of view, Ultimate QR integrates customer data and marketing tools in one flexible cloud platform that lets you get business results wherever they show up. Ultimate QR is the only saas business platform that lets you run your business on one platform, seamlessly across all digital channels.',
            'meta_keywords' => 'qrcode generator, barcode generator',
            'meta_description' => 'The only SaaS business platform that combines CRM, marketing automation & commerce.'
        ]);
    }
}
