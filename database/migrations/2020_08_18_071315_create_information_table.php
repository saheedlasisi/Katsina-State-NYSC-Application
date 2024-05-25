<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('i_id');
            $table->integer('obs_id');
            $table->text('i_title');
            $table->text('i_info');
            $table->string('i_from');
            $table->string('i_signed');
            $table->string('i_batch');
            $table->string('i_stream');
            $table->string('i_year');
            $table->string('info_status');
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
        Schema::dropIfExists('information');
    }
}
