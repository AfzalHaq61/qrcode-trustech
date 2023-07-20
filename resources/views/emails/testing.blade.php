@component('mail::message')
# Your account has been created successfully.

Thank you for choosing EasyQR to create your QR Codes

With your account you can enjoy:

- Create unlimited QR codes.
- Edit and manage your QR codes.
- Access to full analytics.

@component('mail::button', ['url' => url('/')])
    Access your account
@endcomponent

If you have any questions or concerns, please reply to this email.

Sincerely,
The EasyQR team

---
{{ __('This email was sent to') }}: {{ $details['email'] }}

{{ __('You received it because you are registered in EasyQR') }}
@endcomponent
