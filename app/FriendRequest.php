<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
      //Table Name
    protected $table = 'friend_request';

    //primary key
    public $primaryKey = 'f_r_id';

    //TImestamps
    public $timestamps = true;
}
