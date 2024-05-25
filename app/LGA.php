<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LGA extends Model
{
        //Table Name
    protected $table = 'lga';

    //primary key
    public $primaryKey = 'lga_id';

    //TImestamps
    public $timestamps = true;
}
