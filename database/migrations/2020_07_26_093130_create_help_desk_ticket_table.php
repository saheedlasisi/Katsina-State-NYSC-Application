<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpDeskTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_desk_ticket', function (Blueprint $table) {
            $table->increments('h_d_id');
            $table->string('ticket_id');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->string('ticket_status');
            $table->string('staff_name');
            $table->string('staff_email');
            $table->integer('staff_id');
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
        Schema::dropIfExists('help_desk_ticket');
    }
}
