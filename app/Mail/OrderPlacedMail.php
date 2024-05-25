<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlacedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyer_name, $unique, $product_name, $product_price, $quantity, $product_period)
    {
        $this->buyer_name = $buyer_name;
        $this->unique = $unique;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->quantity = $quantity;
        $this->product_period = $product_period;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@katsinastatenysc.com','KatsinaStateNysc')->subject('Order Placed :'.$this->unique)->markdown('orderplacedmail')->with(['buyer_name'=>$this->buyer_name, 'product_name' => $this->product_name, 'unique' => $this->unique,'product_price' => $this->product_price,'quantity' => $this->quantity,'product_period' => $this->product_period]);
    }
}
