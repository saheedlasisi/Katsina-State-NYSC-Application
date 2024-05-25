<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
     //Table Name
    protected $table = 'states';

    //primary key
    public $primaryKey = 'state_id';

    //TImestamps
    public $timestamps = true;
}
