<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email_address, $subject, $body, $attachment, $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_address, $subject, $body, $attachment, $template ='custom')
    {
        $this->email_address = $email_address; 
        $this->subject = $subject;
        $this->body = $body; 
        $this->attachment = $attachment;
        $this->template = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
     { 
        return   $this->view("emails.custom")
                ->text("emails.custom_txt")
                ->subject($this->subject)
                ->with('subject',$this->subject)
                ->with('body',$this->body)
                ->with('attachment',$this->attachment)
                ->with('email_address',$this->email_address);
    }
}
