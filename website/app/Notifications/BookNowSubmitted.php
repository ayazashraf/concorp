<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Inquiry;
use Illuminate\Support\Facades\URL;

class BookNowSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     *   a new notification instance.
     *
     * @return void
     */


    protected $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
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

            'name'  =>  $this->inquiry->name,

            'email'  =>  $this->inquiry->email,
            'year'  =>  $this->inquiry->year,
            'notes'  =>  $this->inquiry->notes,

            'url'  =>  URL::to('/'),

        ];
        return (new MailMessage)
            ->subject('ConCorp Inc. - Rental Booking Inquiry')
            ->markdown('emails.rentalapplication',$data);
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

            'name'  =>  $this->inquiry->name,

            'email'  =>  $this->inquiry->email,
            'year'  =>  $this->inquiry->year,
            'notes'  =>  $this->inquiry->notes,

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

            'name'  =>  $this->inquiry->name,

            'email'  =>  $this->inquiry->email,
            'year'  =>  $this->inquiry->year,
            'notes'  =>  $this->inquiry->notes,

            'url'  =>  URL::to('/'),

        ];

        return [
            'data' => $data
         ];        
    }

}

