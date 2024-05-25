<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
       //Table Name
    protected $table = 'user_photo';

    //primary key
    public $primaryKey = 'user_photo_id';

    //TImestamps
    public $timestamps = true;
}
