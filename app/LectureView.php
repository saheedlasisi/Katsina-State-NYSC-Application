<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureView extends Model
{
      //Table Name
    protected $table = 'lecture_view';

    //primary key
    public $primaryKey = 'l_v_id';

    //TImestamps
    public $timestamps = true;
}
