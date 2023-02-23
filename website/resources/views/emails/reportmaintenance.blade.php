@component('mail::message')
Dear {{ $name }},

Thank you for reporting an issue to ConCorp. We have received your message.

One of our representative will contact you soon at your phone "{{$phone}}" and/or Email "{{$email}}"

Thanks,<br>
{{ config('app.name') }}<br>
628 Main St<br>
Wolfville, NS B0P1T0<br>
902-680-2540<br>
@endcomponent