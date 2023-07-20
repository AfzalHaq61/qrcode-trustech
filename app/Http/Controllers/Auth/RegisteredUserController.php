<?php

namespace App\Http\Controllers\Auth;

use App\Models\Plan;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $selected_plan = Plan::where('id', 1)->where('status', 1)->first();

        $plan_validity = Carbon::now();

        $plan_validity->addDays($selected_plan->validity);

        User::where('id', $user->id)->update([
            'plan_id' => 1,
            'term' => "9999",
            'plan_validity' => $plan_validity,
            'plan_activation_date' => now(),
            'plan_details' => $selected_plan,
            'billing_name' => $request->name,
            'billing_email' => $request->email,
        ]);

        event(new Registered($user));
       
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
