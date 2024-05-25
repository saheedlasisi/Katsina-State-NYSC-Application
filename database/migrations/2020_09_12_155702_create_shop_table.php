<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->increments('shop_id');
            $table->text('shop_auth_id');
            $table->text('shop_image');
            $table->integer('user_id');
            $table->text('shop_phone_number');
            $table->text('shop_address');
            $table->text('shop_specialist');
            $table->string('shop_open_hour');
            $table->string('shop_closing_hour');
            $table->text('shop_working_days');
            $table->string('shop_account_status');
            $table->string('amount_paid');
            $table->string('account_activator_name');
            $table->integer('shop_like');
            $table->integer('shop_review');
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
        Schema::dropIfExists('shop');
    }
}
