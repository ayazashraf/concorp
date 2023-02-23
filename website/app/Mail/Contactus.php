<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Contact;

class Contactus extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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

            'name'  =>  $this->contact->name,

            'email'  =>  $this->contact->email,
            'phone'  =>  $this->contact->phone,
            'message'  =>  $this->contact->message,

            

        ];

        return $this->subject('ConCorp Inc. - Contact us')
                    ->markdown('emails.contactus',$data);
    }
}
