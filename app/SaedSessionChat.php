<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedSessionChat extends Model
{
        //Table Name
    protected $table = 'saed_session_chat';

    //primary key
    public $primaryKey = 'saed_session_chat_id';

    //TImestamps
    public $timestamps = true;
}
