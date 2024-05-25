<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //Table Name
    protected $table = 'order';

    //primary key
    public $primaryKey = 'order_id';

    //TImestamps
    public $timestamps = true;

}
