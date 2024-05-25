<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCall extends Model
{
       //Table Name
    protected $table = 'shop_call';

    //primary key
    public $primaryKey = 'shop_call_id';

    //TImestamps
    public $timestamps = true;
}
