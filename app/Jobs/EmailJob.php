<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\CustomEmail;
use Mail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email_address, $subject, $body, $attachment, $template;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct($email_address, $subject, $body, $attachment, $template)
    {
        $this->email_address = $email_address;
        $this->subject = $subject;
        $this->body = $body;
        $this->attachment = $attachment;
        $this->template = $template;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        {
            $handle = Mail::to($this->email_address)
                ->send(new CustomEmail($this->email_address,$this->subject,$this->body,$this->attachment, $this->template));
        }

        // print_r($handle);
    }
}
