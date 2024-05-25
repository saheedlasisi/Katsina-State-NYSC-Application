<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    //Table Name
    protected $table = 'work';

    //primary key
    public $primaryKey = 'w_id';

    //TImestamps
    public $timestamps = true;
}
