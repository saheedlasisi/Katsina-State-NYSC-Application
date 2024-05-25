<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopAwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_award', function (Blueprint $table) {
            $table->increments('shopaward_id');
               $table->integer('user_id');
            $table->string('shopaward_name');
            $table->text('shopaward_detail');
            $table->date('shopaward_date');
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
        Schema::dropIfExists('shop_award');
    }
}
