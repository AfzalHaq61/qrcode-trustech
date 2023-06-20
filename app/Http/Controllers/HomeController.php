<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->role_id==2){
            return Inertia::render('User/Index');
        }else{
            return Inertia::render('Admin/Index');
        }
    }
}
