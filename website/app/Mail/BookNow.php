<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Inquiry;
use App\InquiryDetail;
use Illuminate\Support\Facades\URL;

class BookNow extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
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

            'name'  =>  $this->inquiry->name,

            'email'  =>  $this->inquiry->email,
            'year'  =>  $this->inquiry->year,
            'notes'  =>  $this->inquiry->notes,

            'url'  =>  URL::to('/'),

        ];
        return $this->subject('ConCorp Inc. - Rental Booking Application')
                    ->markdown('emails.booknow',$data)
                   
                    ;

                    /*
                    //
                    ->with([ // pass the data to view 
                        'orderName' => $this->order->name,
                        'orderPrice' => $this->order->price,
                    ])

                    File Attachments
                    
                    ->attach('/path/to/file', [
                        'as' => 'name.pdf',
                        'mime' => 'application/pdf',
                    ])

                    ->attachFromStorage('/path/to/file')

                    ->attachFromStorage('/path/to/file', 'name.pdf', [
                   'mime' => 'application/pdf'
                    ])

                    */
    }
}
