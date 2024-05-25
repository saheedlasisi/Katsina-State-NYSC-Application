<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopLike extends Model
{
     //Table Name
    protected $table = 'shop_like';

    //primary key
    public $primaryKey = 'shop_like_id';

    //TImestamps
    public $timestamps = true;
}
