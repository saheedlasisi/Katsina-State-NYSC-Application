<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
     //Table Name
    protected $table = 'slide';

    //primary key
    public $primaryKey = 'slide_id';

    //TImestamps
    public $timestamps = true;
}
