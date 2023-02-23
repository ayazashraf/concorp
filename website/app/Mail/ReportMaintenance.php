<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Report;
use App\Business;

class ReportMaintenance extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $report;
    public function __construct(Report $report)
    {
        $this->report = $report;
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

            'name'  =>  $this->report->name,

            'email'  =>  $this->report->email,
            'phone'  =>  $this->report->phone,
            'message'  =>  $this->report->complain,
            'unitnumber'  =>  $this->report->unit,
            'property'  =>  $this->report->business->name,
            'service'  =>  $this->report->service,
            

        ];
        return $this->subject('ConCorp Inc. - Maintenance Issue Report')->markdown('emails.reportmaintenance',$data);
    }
}
