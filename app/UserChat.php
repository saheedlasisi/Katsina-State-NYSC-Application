<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChat extends Model
{
        //Table Name
    protected $table = 'chat';

    //primary key
    public $primaryKey = 'chat_id';

    //TImestamps
    public $timestamps = true;
}
