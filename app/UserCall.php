<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCall extends Model
{
    //Table Name
    protected $table = 'user_call';

    //primary key
    public $primaryKey = 'user_call_id';

    //TImestamps
    public $timestamps = true;
}
