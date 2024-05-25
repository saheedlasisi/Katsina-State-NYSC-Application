<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureQuestion extends Model
{
          //Table Name
    protected $table = 'lecture_question';

    //primary key
    public $primaryKey = 'l_q_id';

    //TImestamps
    public $timestamps = true;
}
