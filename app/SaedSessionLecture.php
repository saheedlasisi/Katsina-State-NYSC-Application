<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedSessionLecture extends Model
{
    
    

        //Table Name
    protected $table = 'saed_session_lecture';

    //primary key
    public $primaryKey = 'saed_session_lecture_id';

    //TImestamps
    public $timestamps = true;
}
