<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //Table Name
    protected $table = 'year';

    //primary key
    public $primaryKey = 'year_id';

    //TImestamps
    public $timestamps = true;
}
