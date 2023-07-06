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


        if ($request->route()->getPrefix() == 'admin') {
            // Generate breadcrumbs based on the route name
            if ($routeName === 'admin.add.plan') {
                // Add a breadcrumb for a specific route

                $breadcrumbs[] = [
                    'text' => 'AddPlan',
                    'url' => url('/admin/add-plan'),
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
        }


        return $breadcrumbs;
    }
}
