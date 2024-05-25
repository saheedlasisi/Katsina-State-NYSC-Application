<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    //Table Name
    protected $table = 'users_status';

    //primary key
    public $primaryKey = 'u_s_id';

    //TImestamps
    public $timestamps = true;
}
