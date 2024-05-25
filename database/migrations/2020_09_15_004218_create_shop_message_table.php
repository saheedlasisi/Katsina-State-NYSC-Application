<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_message', function (Blueprint $table) {
            $table->increments('shop_message_id');
            $table->integer('sender_id');
            $table->integer('shop_id');
            $table->integer('receiver_id');
            $table->string('sender_name');
            $table->string('sender_email');
            $table->string('shop_message_subject');
            $table->text('shop_message_content');
            $table->integer('shop_owner_notify');
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
        Schema::dropIfExists('shop_message');
    }
}
