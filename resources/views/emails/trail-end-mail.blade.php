
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
# Your trial period is over

To continue, please upgrade your account to one of our plans. With a paid plan, you can:

- Reactivate your deactivated QR Codes.
- Create new QR Codes.
- Customize landing pages.
- Track and share scan metrics.

@component('mail::button', ['url' => url('/user/qrcodes/all')])
Select a plan
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
