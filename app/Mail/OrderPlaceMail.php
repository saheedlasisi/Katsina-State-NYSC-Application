<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($shop_name, $unique, $quantity, $product_price, $product_period, $buyer_name,$product_name)
    {
        $this->buyer_name = $buyer_name;
        $this->unique = $unique;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->quantity = $quantity;
        $this->product_period = $product_period;
         $this->shop_name = $shop_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@katsinastatenysc.com','KatsinaStateNysc')->subject('New Order :'.$this->unique)->markdown('orderplacemail')->with(['buyer_name'=>$this->buyer_name, 'product_name' => $this->product_name, 'unique' => $this->unique,'product_price' => $this->product_price,'quantity' => $this->quantity,'product_period' => $this->product_period,'shop_name' => $this->shop_name]);
    }
}
