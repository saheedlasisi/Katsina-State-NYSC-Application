<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
     //Table Name
    protected $table = 'lecture';

    //primary key
    public $primaryKey = 'l_id';

    //TImestamps
    public $timestamps = true;
}
