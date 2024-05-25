<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comment', function (Blueprint $table) {
            $table->increments('blog_comment_id');
            $table->integer('c_b_id');
            $table->text('c_b_title');
            $table->string('c_name');
            $table->string('c_email');
            $table->text('c_comment');
            $table->text('c_b_image');
            $table->text('c_type');
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
        Schema::dropIfExists('blog_comment');
    }
}
