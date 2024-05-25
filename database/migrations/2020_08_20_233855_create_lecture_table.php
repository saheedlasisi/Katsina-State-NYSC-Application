<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
              $table->increments('l_id');
            $table->integer('obs_id');
            $table->text('l_topic');
            $table->text('l_content');
            $table->string('lecturer_name');
            $table->string('i_batch');
            $table->string('i_stream');
            $table->string('i_year');
            $table->string('obs_lecture_status');
            $table->string('admin_lecture_status');
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
        Schema::dropIfExists('lecture');
    }
}
