<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMailMe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name)
    {
        $this->sender_name = $sender_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lasisisaheed5@gmail.com','Lasisi Saheed')->subject('Contact Me')->markdown('replymailme')->with(['sender_name'=>$this->sender_name]);
    }
}
