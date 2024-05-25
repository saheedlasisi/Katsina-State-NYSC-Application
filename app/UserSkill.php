<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    
    //Table Name
    protected $table = 'skill';

    //primary key
    public $primaryKey = 'skill_id';

    //TImestamps
    public $timestamps = true;
}
