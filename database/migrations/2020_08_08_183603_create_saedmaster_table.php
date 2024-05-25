<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedmasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saedmaster', function (Blueprint $table) {
            $table->increments('id');
              $table->string('name');
            $table->string('image');
             $table->string('email')->unique();
             $table->string('job_title');
             $table->text('phone_number');
             $table->text('about');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('saedmaster');
    }
}
