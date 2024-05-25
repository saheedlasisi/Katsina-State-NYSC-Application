<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedLectureView extends Model
{
     //Table Name
    protected $table = 'saed_lecture_view';

    //primary key
    public $primaryKey = 'saed_lecture_view_id';

    //TImestamps
    public $timestamps = true;
}
