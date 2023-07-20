<?php

namespace App\Http\Middleware;

use DB;
use App\Models\Config;
use App\Models\Setting;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
            ],
            'appName' => 'QR Code',
            'webURL' => env('APP_URL'),
            'imagePath' => 'http://127.0.0.1:8000/',
            'appUrl' => 'http://127.0.0.1:8000/',
            'TIMEZONE' => env('TIMEZONE'),
            'APP_TYPE' => env('APP_TYPE', 'BOTH'),
            'COOKIE_CONSENT_ENABLED' => env('COOKIE_CONSENT_ENABLED'),
            'SIZE_LIMIT' => env('SIZE_LIMIT'),
            'themeColor' => $this->themeColor(),
            'siteLogo' => 'http://127.0.0.1:8000' . $this->siteLogo(),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    //get theme color
    public function themeColor()
    {
        $query = DB::table('configs')->select('config_value')->where('id', 12)->first();
        return $query;
    }

    // get site logo
    public function siteLogo()
    {
        $query = Setting::first();
        return $query->site_logo;
    }
}
