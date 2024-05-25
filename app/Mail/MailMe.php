<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailMe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name, $sender_email, $sender_subject, $sender_message)
    {
        $this->sender_name = $sender_name;
        $this->sender_email = $sender_email;
        $this->sender_subject = $sender_subject;
        $this->sender_message = $sender_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender_email , $this->sender_name)->subject('Contact Me')->markdown('mailme')->with(['sender_name' => $this->sender_name, 'sender_email'=>$this->sender_email, 'sender_subject'=>$this->sender_subject, 'sender_message'=>$this->sender_message]);
    }
}
