@component('mail::message')
# Report Maintenance Issue Form is submitted.

A new report is submitted using website. <br>

@component('mail::table')
| name         | Email          | Phone     | Unit    | Property  | Service  |
| -------------|:---------------| ---------:| -------:| ---------:|---------:|    
| {{$name}}    |{{$email}}      |{{$phone}} |{{$unitnumber}}| {{$property}}| {{$service}}  
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