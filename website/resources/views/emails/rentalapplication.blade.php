@component('mail::message')
# New Rental Application Form

A new Rental Application form is submitted using website. <br>

@component('mail::table')
| name                   | Email                   | Year     | 
| -----------------------|:------------------------| --------:|
| {{$name}}              |{{$email}}               |{{$year}}|
@endcomponent

<br>
Message: <br>

@component('mail::panel')
{{$notes}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}<br>
628 Main St<br>
Wolfville, NS B0P1T0<br>
902-680-2540<br>
@endcomponent