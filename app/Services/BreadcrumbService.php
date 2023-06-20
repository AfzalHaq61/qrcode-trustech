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
       
        if($request->route()->getPrefix()=='admin'){
                
           
                // Generate breadcrumbs based on the route name
                if ($routeName === 'admin.add.plan') {
                    // Add a breadcrumb for a specific route
                   
                    $breadcrumbs[] = [
                        'text' => 'Admin',
                        'url' => '#',
                    ];
                    $breadcrumbs[] = [
                        'text' => 'AddPlan',
                        'url' => route('admin.add.plan'),
                    ];
                } elseif ($routeName === 'another.route.name') {
                    // Add a breadcrumb for another specific route
                    $breadcrumbs[] = [
                        'text' => 'Another Page',
                        'url' => route('another.route.name'),
                    ];
                }
        }else{

        }


        // Add the current page as the last breadcrumb
        $breadcrumbs[] = [
            'text' => 'Current Page',
            'url' => '',
        ];

        return $breadcrumbs;
    }
}


?>