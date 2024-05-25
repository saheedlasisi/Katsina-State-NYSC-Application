<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedSessionChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saed_session_chat', function (Blueprint $table) {
            $table->increments('saed_session_chat_id');
            $table->integer('saed_id');
            $table->integer('session_id');
            $table->integer('user_id');
            $table->string('user_type');
            $table->text('message');
            $table->integer('saed_notify');
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
        Schema::dropIfExists('saed_session_chat');
    }
}
