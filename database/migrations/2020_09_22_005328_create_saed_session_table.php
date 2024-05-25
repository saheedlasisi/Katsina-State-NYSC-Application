<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saed_session', function (Blueprint $table) {
            $table->increments('saed_session_id');
            $table->text('session_id');
            $table->integer('saed_id');
            $table->string('session_batch');
            $table->string('session_stream');
            $table->integer('session_year');
            $table->integer('member');
            $table->string('session_status');
            $table->string('activator_name');
            $table->string('activator_type');
            $table->string('amount_paid');
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
        Schema::dropIfExists('saed_session');
    }
}
