<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_allocation', function (Blueprint $table) {
            $table->increments('h_a_id');
            $table->integer('user_id');
            $table->string('h_block');
            $table->string('h_room');
            $table->string('h_batch');
            $table->integer('h_stream');
            $table->integer('h_year');
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
        Schema::dropIfExists('hostel_allocation');
    }
}
