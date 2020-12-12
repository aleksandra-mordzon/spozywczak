@component('mail::message')
# Zamówienie nr {{$data["orderId"]}}

Dziękujemy za zakupy w naszym sklepie!

Zamówienie:
{{$data["products"]}} <br>
Do zapłaty {{$data["price"]}}


<br>
{{ config('app.name') }}
@endcomponent
