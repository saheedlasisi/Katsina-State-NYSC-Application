<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
   
     //Table Name
    protected $table = 'information';

    //primary key
    public $primaryKey = 'i_id';

    //TImestamps
    public $timestamps = true;
}
