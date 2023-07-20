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
# Your account has been created successfully.

Thank you for choosing EasyQR to create your QR Codes

With your account you can enjoy:

- Create unlimited QR codes.
- Edit and manage your QR codes.
- Access to full analytics.

@component('mail::button', ['url' => ENV('APP_URL')])
    Access your account
@endcomponent

If you have any questions or concerns, please reply to this email.

Sincerely,
the EasyQR team

---
{{ __('This email was sent to') }}: {{ $details['email'] }}

{{ __('You received it because you are registered in EasyQR') }}

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
<p class="f-fallback sub">© 2023 <a href="{{ ENV('APP_URL') }}">{{ ENV('APP_NAME') }}</a>. {{ __('All
    rights reserved.') }}</p>
@endcomponent
@endslot
@endcomponent
