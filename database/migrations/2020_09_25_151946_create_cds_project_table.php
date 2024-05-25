<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdsProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cds_project', function (Blueprint $table) {
            $table->increments('cds_project_id');
            $table->integer('user_id');
            $table->string('project_topic');
            $table->text('project_image');
            $table->text('project_detail');
            $table->string('sponsored_by');
            $table->date('project_from_date');
            $table->date('project_to_date');
            $table->text('project_slide_1');
             $table->text('project_slide_2');
              $table->text('project_slide_3');
               $table->text('project_slide_4');
                $table->text('project_slide_5');
                 $table->text('project_slide_6');
            $table->integer('view');
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
        Schema::dropIfExists('cds_project');
    }
}
