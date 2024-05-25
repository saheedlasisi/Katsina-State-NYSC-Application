<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedLectureQuestion extends Model
{
         //Table Name
    protected $table = 'saed_lecture_question';

    //primary key
    public $primaryKey = 'saed_lecture_question_id';

    //TImestamps
    public $timestamps = true;
}
