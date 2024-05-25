<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaedEbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saed_ebook', function (Blueprint $table) {
            $table->increments('saed_ebook_id');
            $table->integer('saed_id');
            $table->integer('session_id');
            $table->string('ebook_title');
            $table->text('ebook');
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
        Schema::dropIfExists('saed_ebook');
    }
}
