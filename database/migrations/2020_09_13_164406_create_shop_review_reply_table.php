<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopReviewReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_review_reply', function (Blueprint $table) {
            $table->increments('shop_review_reply_id');
             $table->integer('user_id');
            $table->integer('shop_review_id');
            $table->text('reply_review_content');
            $table->integer('reply_review_star');
            $table->integer('reply_review_like');
            $table->integer('reply_review_unlike');
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
        Schema::dropIfExists('shop_review_reply');
    }
}
