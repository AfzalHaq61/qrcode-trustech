<?php

namespace App\Http\Controllers\Admin;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AuthenticationLogController extends Controller
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

    // My account
    public function index()
    {
        // Queries
        $logs = DB::table('authentication_log')->orderBy('id', 'desc')->get();

        // Loop
        for ($i = 0; $i < count($logs); $i++) {

            // State, City, Country & Postal Code
            if (json_decode($logs[$i]->location) == "") {
                $logs[$i]->state_name = 'Connecticut';
                $logs[$i]->city = 'New Haven';
                $logs[$i]->country = 'United States';
                $logs[$i]->postal_code = '06510';
            } else {
                $logs[$i]->state_name = json_decode($logs[$i]->location)->state_name;
                $logs[$i]->city = json_decode($logs[$i]->location)->city;
                $logs[$i]->country = json_decode($logs[$i]->location)->country;
                $logs[$i]->postal_code = json_decode($logs[$i]->location)->postal_code;
            }

            // Concatinate
            $logs[$i]->location = urldecode($logs[$i]->state_name . ', ' . $logs[$i]->city . ', ' . $logs[$i]->country . ', ' . $logs[$i]->postal_code);

            // Get User Agent
            $agent = new Agent();
            $agent->setUserAgent($logs[$i]->user_agent);

            // Push variables
            $logs[$i]->platform = $agent->platform();
            $logs[$i]->browser = $agent->browser();
        }

        return view('admin.pages.logs.index', compact('logs'));
    }
}
