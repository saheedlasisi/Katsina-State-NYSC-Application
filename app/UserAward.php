<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAward extends Model
{
       //Table Name
    protected $table = 'award';

    //primary key
    public $primaryKey = 'a_id';

    //TImestamps
    public $timestamps = true;
}
