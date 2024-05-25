<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedSessionMember extends Model
{
       //Table Name
    protected $table = 'saed_session_member';

    //primary key
    public $primaryKey = 'saed_session_member_id';

    //TImestamps
    public $timestamps = true;

   
}
