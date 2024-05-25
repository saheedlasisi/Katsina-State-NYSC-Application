<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
        
     //Table Name
    protected $table = 'shop_product';

    //primary key
    public $primaryKey = 'shop_product_id';

    //TImestamps
    public $timestamps = true;
}
