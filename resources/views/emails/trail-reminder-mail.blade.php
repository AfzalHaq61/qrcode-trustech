
@php
// Settings
use App\Models\Setting;
$setting = Setting::where('status', 1)->first();
@endphp

@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<a href="{{ ENV('APP_URL') }}"">
    <img src="{{ asset($setting->site_logo) }}" width="110"
        alt="{{ config('app.name') }}" class="navbar-brand-image custom-logo">
</a>
@endcomponent
@endslot

{{-- Body --}}
# Your free trial will end in a few days.

After {{ $user->plan_validity }}, you will lose access to the following features:

- Your dynamic QR Codes will no longer be scannable.
- You won't be able to create new, or edit existing, QR codes.
- You will lose access to all your QR Code tracking metrics.
- Downloads will no longer be available.

In order to continue using EasyQR, you should access your account as soon as possible and upgrade to one of our plans by clicking the following button:

@component('mail::button', ['url' => url('/user/qrcodes/all')])
Upgrade now
@endcomponent

If you have any questions or concerns, please reply to this email.

Sincerely,
The EasyQR team

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
<p class="f-fallback sub">© 2023 <a href="{{ ENV('APP_URL') }}">{{ ENV('APP_NAME') }}</a>. {{ __('All
    rights reserved.') }}</p>
@endcomponent
@endslot
@endcomponent
