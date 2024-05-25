<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductLove extends Model
{
           //Table Name
    protected $table = 'product_love';

    //primary key
    public $primaryKey = 'product_love_id';

    //TImestamps
    public $timestamps = true;
}
