<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     //Table Name
    protected $table = 'blog';

    //primary key
    public $primaryKey = 'b_id';

    //TImestamps
    public $timestamps = true;
}
