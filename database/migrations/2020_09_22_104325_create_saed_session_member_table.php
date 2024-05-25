<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedSessionMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saed_session_member', function (Blueprint $table) {
            $table->increments('saed_session_member_id');
            $table->integer('saed_id');
            $table->integer('session_id');
            $table->integer('user_id');
            $table->string('access');
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
        Schema::dropIfExists('saed_session_member');
    }
}
