<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeadSessionReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sead_session_review', function (Blueprint $table) {
            $table->increments('sead_session_review_id');
            $table->integer('saed_id');
            $table->integer('session_id');
            $table->integer('user_id');
            $table->integer('review_star');
            $table->text('review_content');
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
        Schema::dropIfExists('sead_session_review');
    }
}
