<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Report;
use App\Business;

class ReportMaintenanceSubmit extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $report;
    public function __construct(Report $report)
    {
        $this->report = $report;
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

            'name'  =>  $this->report->name,

            'email'  =>  $this->report->email,
            'phone'  =>  $this->report->phone,
            'message'  =>  $this->report->complain,
            'unitnumber'  =>  $this->report->unit,
            'property'  =>  $this->report->business->name,
            'service'  =>  $this->report->service,
            

        ];
              
        return (new MailMessage)
            ->subject('ConCorp Inc. - Maintenance Issue Report')
            ->markdown('emails.reportmaintenancesubmit',$data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
