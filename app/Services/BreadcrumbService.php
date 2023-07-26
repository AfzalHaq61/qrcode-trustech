<?php
// app/Services/BreadcrumbService.php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class BreadcrumbService
{
    public function generate()
    {
        $breadcrumbs = [];

        // Add a home link
        $breadcrumbs[] = [
            'text' => 'Dashboard',
            'url' => url('dashboard'),
        ];

        // Get the current route name and parameters
        $currentRoute = Route::current();
        $routeName = $currentRoute->getName();

        $request = Request();



        $routeParams = $currentRoute->parameters();
      
       
        if ($request->route()->getPrefix() == '/admin') {
            
            //qrcode routes
            if($routeName === 'admin.all.qr'){
                $breadcrumbs[] = [
                    'text' => 'All QR Codes',
                    'url' => url('admin/qrcodes/all'),
                ];
            }else if($routeName === 'admin.create.qr'){
                $breadcrumbs[] = [
                    'text' => 'Add QR Codes',
                    'url' => url('/admin/qrcode/create'),
                ];
            }else if($routeName === 'admin.edit.qr'){
                $breadcrumbs[] = [
                    'text' => 'Edit QR Codes',
                    'url' => url('/admin/qrcode/edit/{id}'),
                ];
            }else if($routeName === 'admin.qr.statistics'){
                $breadcrumbs[] = [
                    'text' => 'Statistics QR Codes',
                    'url' => url('/admin/qrcode/statistics/{id}'),
                ];
            }
        // Barcode Routes
           else if($routeName === 'admin.all.barcode'){
                $breadcrumbs[] = [
                    'text' => 'All Barcodes',
                    'url' => url('admin/barcodes/all'),
                ];
            }else if($routeName === 'admin.create.barcode'){
                $breadcrumbs[] = [
                    'text' => 'Add Barcode',
                    'url' => url('/admin/barcode/create'),
                ];
            }else if($routeName === 'admin.edit.barcode'){
                $breadcrumbs[] = [
                    'text' => 'Edit Barcode',
                    'url' => url('/admin/barcode/edit/{id}'),
                ];
            }
            
            //user routes
            else if($routeName === 'admin.users'){
                $breadcrumbs[] = [
                    'text' => 'All Users',
                    'url' => url('/admin/users'),
                ];
            }

            //payments routes           
            else if($routeName === 'admin.payment.methods'){
                $breadcrumbs[] = [
                    'text' => 'All Payment Methods',
                    'url' => url('/admin/payment-method'),
                ];
            }
             //transactions routes           
             else if($routeName === 'admin.transactions'){
                $breadcrumbs[] = [
                    'text' => 'All Transactions',
                    'url' => url('/admin/transactions'),
                ];
            }

             //pages routes           
             else if($routeName === 'admin.pages'){
                $breadcrumbs[] = [
                    'text' => 'All Pages',
                    'url' => url('/admin/pages'),
                ];
            }

            // Generate breadcrumbs based on the route name
            else if ($routeName === 'admin.add.plan') {
                // Add a breadcrumb for a specific route

                $breadcrumbs[] = [
                    'text' => 'Add Plan',
                    'url' => url('/admin/add-plan'),
                ];
            }elseif($routeName === 'admin.index.plans'){

                $breadcrumbs[] = [
                    'text' => 'Plan',
                    'url' => url('/admin/plans'),
                ];

            } elseif ($routeName === 'admin.settings.general_settings') {

                // Add a breadcrumb for another specific route
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'General Settings',
                    'url' => url('/admin/settings/general-settings'),
                ];
            } elseif ($routeName === 'admin.settings.website_config_settings') {

                // Add a breadcrumb for another specific route
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Website Configuration Settings',
                    'url' => url('/admin/settings/website-configuration-settings'),
                ];
            } elseif ($routeName === 'admin.settings.website_qr_config_settings') {

                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Website QR Configuration Settings',
                    'url' => url('/admin/settings/website-qr-generator-configuration-settings'),
                ];
            } elseif ($routeName === 'admin.settings.payment_method_config_setting') {
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Payment Configuration Settings',
                    'url' => url('/admin/settings/payment-method-configuration-setting'),
                ];
            } elseif ($routeName === 'admin.settings.google_configuration_setting') {
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Google Configuration Settings',
                    'url' => url('/admin/settings/google-configuration-settings'),
                ];
            } elseif ($routeName === 'admin.settings.email_configuration') {
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Email Configuration Settings',
                    'url' => url('/admin/settings/email-configuration'),
                ];
            } elseif ($routeName === 'admin.settings.licence') {
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Licence',
                    'url' => url('/admin/settings/license'),
                ];
            } elseif ($routeName === 'admin.settings.tax_setting') {
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Tax Settings',
                    'url' => url('/admin/settings/tax-settings'),
                ];
            } elseif ($routeName === 'admin.settings.check_update') {
                $breadcrumbs[] = [
                    'text' => 'Settings',
                    'url' =>  '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Check Update',
                    'url' => url('/admin/settings/check-update'),
                ];
            }
        } else {
           
            if ($routeName === 'user.plans') {
                $breadcrumbs[] = [
                    'text' => 'User',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Plan',
                    'url' => url('/user/plans'),
                ];
            }
            if ($routeName === 'user.checkout') {
                $id = \Request::segment(3);
                $breadcrumbs[] = [
                    'text' => 'User',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Checkout',
                    'url' => url('/user/plans', $id),
                ];
            }
            if ($routeName === 'user.whois-lookup') {

                $breadcrumbs[] = [
                    'text' => 'User',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'tools',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Whos Lookup',
                    'url' => url('/user/tools/whois-lookup'),
                ];
            }
            if ($routeName === 'user.dns-lookup') {
                $breadcrumbs[] = [
                    'text' => 'User',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'tools',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'Dns Lookup',
                    'url' => url('/user/tools/dns-lookup'),
                ];
            }
            if ($routeName === 'user.ip-lookup') {
                $breadcrumbs[] = [
                    'text' => 'User',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'tools',
                    'url' => '#',
                ];
                $breadcrumbs[] = [
                    'text' => 'IP Lookup',
                    'url' => url('/user/tools/ip-lookup
                    '),
                ];
            }

             //qrcode routes
             if($routeName === 'user.all.qr'){
                $breadcrumbs[] = [
                    'text' => 'All QR Codes',
                    'url' => url('user/qrcodes/all'),
                ];
            }
            if($routeName === 'user.create.qr'){
                $breadcrumbs[] = [
                    'text' => 'Add QR Codes',
                    'url' => url('/user/qrcode/create'),
                ];
            } 
            if($routeName === 'user.edit.qr'){
                $breadcrumbs[] = [
                    'text' => 'Edit QR Codes',
                    'url' => url('/user/qrcode/edit/{id}'),
                ];
            }
            if($routeName === 'user.qr.statistics'){
                $breadcrumbs[] = [
                    'text' => 'Statistics QR Codes',
                    'url' => url('/user/qrcode/statistics/{id}'),
                ];
            }
        // Barcode Routes
            if($routeName === 'user.all.barcode'){
                $breadcrumbs[] = [
                    'text' => 'All Barcodes',
                    'url' => url('user/barcodes/all'),
                ];
            } 
            if($routeName === 'user.create.barcode'){
                $breadcrumbs[] = [
                    'text' => 'Add Barcode',
                    'url' => url('/user/barcode/create'),
                ];
            } 
            if($routeName === 'user.edit.barcode'){
                $breadcrumbs[] = [
                    'text' => 'Edit Barcode',
                    'url' => url('/user/barcode/edit/{id}'),
                ];
            }
            
            //user routes
            if($routeName === 'user.users'){
                $breadcrumbs[] = [
                    'text' => 'All Users',
                    'url' => url('/user/users'),
                ];
            }

            //payments routes           
            if($routeName === 'user.payment.methods'){
                $breadcrumbs[] = [
                    'text' => 'All Payment Methods',
                    'url' => url('/user/payment-method'),
                ];
            }
             //transactions routes           
            if($routeName === 'user.transactions'){
                $breadcrumbs[] = [
                    'text' => 'All Transactions',
                    'url' => url('/user/transactions'),
                ];
            }

             //pages routes           
            if($routeName === 'user.pages'){
                $breadcrumbs[] = [
                    'text' => 'All Pages',
                    'url' => url('/user/pages'),
                ];
            }
        }


        return $breadcrumbs;
    }
}
