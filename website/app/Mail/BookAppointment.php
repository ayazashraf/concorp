<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Appointment;
use Illuminate\Support\Facades\URL;

class BookAppointment extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array();

        $data = [

            'name'  =>  $this->appointment->name,

            'email'  =>  $this->appointment->email,
            'phone'  =>  $this->appointment->phone,
            'message'  =>  $this->appointment->message,
            'day'  =>  $this->appointment->day,
            'time'  =>  $this->appointment->time,    
            'url'  =>  URL::to('/'),

        ];
        return $this->subject('ConCorp Inc. - Book Appoiontment')
                    ->markdown('emails.scheduleappointment',$data);

    }
}
