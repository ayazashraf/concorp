@component('mail::message')
# Contact us Form is submitted.

A new Contact form is submitted using website. <br>

@component('mail::table')
| name                   | Email                   | Phone    | 
| -----------------------|:------------------------| --------:| 
| {{$name}}              |{{$email}}               |{{$phone}}| 
@endcomponent

<br>
Message: <br>

@component('mail::panel')
{{$message}}
@endcomponent


Thanks,<br>
{{ config('app.name') }}<br>
628 Main St<br>
Wolfville, NS B0P1T0<br>
902-680-2540<br>
@endcomponent
