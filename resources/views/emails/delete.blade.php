@component('mail::message')
# {{ config('app.name') }} - Usunięcie konta

{{$email}}, Twoje konto zostało usunięte.

<br>
{{ config('app.name') }}
@endcomponent
