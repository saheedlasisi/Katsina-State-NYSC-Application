<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopMessage extends Model
{
      //Table Name
    protected $table = 'shop_message';

    //primary key
    public $primaryKey = 'shop_message_id';

    //TImestamps
    public $timestamps = true;
}
