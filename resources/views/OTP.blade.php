@component('mail::message')
# Kode Verifikasi

Kode Verifikasi Email Anda {{ $OTP }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
