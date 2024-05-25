<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopAward extends Model
{
       //Table Name
    protected $table = 'shop_award';

    //primary key
    public $primaryKey = 'shopaward_id';

    //TImestamps
    public $timestamps = true;
}
