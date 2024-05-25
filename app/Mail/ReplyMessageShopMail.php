<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyMessageShopMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop_name, $shop_auth_id, $subjects, $sender_name, $body)
    {
         $this->shop_name = $shop_name;
        $this->shop_auth_id = $shop_auth_id;
        $this->subjects = $subjects;
        $this->sender_name = $sender_name;
        $this->body = $body;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@katsinastatenysc.com','KatsinaStateNysc')->subject($this->subjects)->markdown('replymessageshopmail')->with(['shop_name'=>$this->shop_name, 'subjects' => $this->subjects, 'shop_auth_id' => $this->shop_auth_id,'sender_name' => $this->sender_name,'body' => $this->body]);
    }
}
