<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopView extends Model
{
   
    //Table Name
    protected $table = 'shop_view';

    //primary key
    public $primaryKey = 'shop_view_id';

    //TImestamps
    public $timestamps = true;
}
