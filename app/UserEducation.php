<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
     //Table Name
    protected $table = 'education';

    //primary key
    public $primaryKey = 'e_id';

    //TImestamps
    public $timestamps = true;
}
