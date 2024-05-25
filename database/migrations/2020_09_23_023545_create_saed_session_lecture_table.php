<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedSessionLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saed_session_lecture', function (Blueprint $table) {
            $table->increments('saed_session_lecture_id');
            $table->integer('saed_id');
            $table->integer('session_id');
            $table->string('lecture_title');
            $table->text('lecture_content');
            $table->integer('view');
            $table->integer('question');
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
        Schema::dropIfExists('saed_session_lecture');
    }
}
