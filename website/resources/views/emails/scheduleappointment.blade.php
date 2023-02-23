@component('mail::message')
# Your Appointment Booking Application is submitted.

Thank you {{$name}} for contacting ConCorp Inc. 

Your Booking Appointment Request is submitted!
One of our representative will contact you soon at your phone {{$phone}}.

Thanks,<br>
{{ config('app.name') }}<br>
628 Main St<br>
Wolfville, NS B0P1T0<br>
902-680-2540<br>
@endcomponent