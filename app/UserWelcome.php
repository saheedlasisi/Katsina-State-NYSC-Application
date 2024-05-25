<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWelcome extends Model
{
    //Table Name
    protected $table = 'user_welcome';

    //primary key
    public $primaryKey = 'user_welcome_id';

    //TImestamps
    public $timestamps = true;
}
