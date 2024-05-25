<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserShop extends Model
{
    //Table Name
    protected $table = 'shop';

    //primary key
    public $primaryKey = 'shop_id';

    //TImestamps
    public $timestamps = true;
}
