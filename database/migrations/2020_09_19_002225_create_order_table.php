<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('buyer_id');
            $table->integer('seller_id');
            $table->integer('shop_id');
            $table->integer('product_id');
            $table->text('order_unique_id');
            $table->integer('product_price');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('destination');
            $table->date('period');
            $table->string('order_status');
            $table->string('buyer_order_status');
            $table->string('seller_order_status'); 
            $table->integer('buyer_order_notify');
            $table->integer('seller_order_notify');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
