<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_review', function (Blueprint $table) {
            $table->increments('shop_review_id');
            $table->integer('user_id');
            $table->integer('shop_id');
            $table->string('review_title');
            $table->text('review_content');
            $table->integer('review_star');
            $table->integer('review_like');
            $table->integer('review_unlike');
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
        Schema::dropIfExists('shop_review');
    }
}
