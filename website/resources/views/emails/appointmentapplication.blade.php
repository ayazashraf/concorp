@component('mail::message')
# New Book Appointment Application is submitted.

A new Rental Application form is submitted using website. <br>

@component('mail::table')
| name                   | Email                   | Phone    |  Preferred Day | Preferred Time|                    
| -----------------------|:------------------------| --------:| ---------------|---------------|
| {{$name}}              |{{$email}}               |{{$phone}}| {{$day}}       | {{$time}}     |
@endcomponent

<br>
Message: <br>

@component('mail::panel')
{{$message}}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
