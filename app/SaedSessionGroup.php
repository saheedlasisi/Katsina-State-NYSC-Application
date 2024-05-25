<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedSessionGroup extends Model
{
       //Table Name
    protected $table = 'saed_session_group';

    //primary key
    public $primaryKey = 'saed_session_group_id';

    //TImestamps
    public $timestamps = true;
}
