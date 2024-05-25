<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_question', function (Blueprint $table) {
            $table->increments('l_q_id');
            $table->integer('l_q_l_id');
            $table->integer('user_id');
            $table->integer('obs_id');
            $table->text('question');
            $table->text('reply');
            $table->string('q_status');
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
        Schema::dropIfExists('lecture_question');
    }
}
