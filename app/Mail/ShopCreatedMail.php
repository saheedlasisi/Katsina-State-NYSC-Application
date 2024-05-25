<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop_name, $shop_auth_id)
    {
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
        return $this->from('support@katsinastatenysc.com','KatsinaStateNysc')->subject('Shop Created Successfully'.'|'.$this->shop_auth_id)->markdown('shopcreatedmail')->with(['shop_name'=>$this->shop_name, 'shop_auth_id'=>$this->shop_auth_id]);
    }
}
