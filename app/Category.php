<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Table Name
    protected $table = 'category';

    //primary key
    public $primaryKey = 'c_id';

    //TImestamps
    public $timestamps = true;
}
