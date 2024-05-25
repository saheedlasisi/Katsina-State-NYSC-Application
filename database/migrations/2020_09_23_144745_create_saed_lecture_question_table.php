<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedLectureQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saed_lecture_question', function (Blueprint $table) {
            $table->increments('saed_lecture_question_id');
            $table->integer('saed_lecture_id');
            $table->integer('user_id');
            $table->text('question');
            $table->text('reply');
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
        Schema::dropIfExists('saed_lecture_question');
    }
}
