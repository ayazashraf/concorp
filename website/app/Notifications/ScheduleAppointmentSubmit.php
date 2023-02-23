<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Appointment;
use Illuminate\Support\Facades\URL;

class ScheduleAppointmentSubmit extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     *   a new notification instance.
     *
     * @return void
     */


    protected $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
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
       
        return (new MailMessage)
            ->subject('ConCorp Inc. - Appointment Schedule Request')
            ->markdown('emails.appointmentapplication',$data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    
    public function toArray($notifiable)
    {
        $data = array();

        $data = [

            'name'  =>  $this->appointment->name,

            'email'  =>  $this->appointment->email,
            'year'  =>  $this->appointment->year,
            'notes'  =>  $this->appointment->notes,

            'url'  =>  URL::to('/'),

        ];

        return [
            'data' => $data
         ];        
    }

    public function toDatabase($notifiable)
    {
        $data = array();

        $data = [

            'name'  =>  $this->appointment->name,

            'email'  =>  $this->appointment->email,
            'year'  =>  $this->appointment->year,
            'notes'  =>  $this->appointment->notes,

            'url'  =>  URL::to('/'),

        ];

        return [
            'data' => $data
         ];        
    }

}

