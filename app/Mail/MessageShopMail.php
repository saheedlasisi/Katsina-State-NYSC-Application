<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageShopMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_name, $sender_email, $subjects, $message, $shop_name, $shop_auth_id)
    {
        $this->sender_name = $sender_name;
        $this->sender_email = $sender_email;
        $this->subjects = $subjects;
        $this->message = $message;
        $this->shop_name = $shop_name;
        $this->shop_auth_id = $shop_auth_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@katsinastatenysc.com','KatsinaStateNysc')->subject($this->subjects)->markdown('messageshopmail')->with(['sender_name'=>$this->sender_name, 'sender_email'=>$this->sender_email, 'subjects' => $this->subjects, 'message' => $this->message,'shop_auth_id' => $this->shop_auth_id, 'shop_name' => $this->shop_name  ]);
    }
}
