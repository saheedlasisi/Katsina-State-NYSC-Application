<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopReviewNo extends Model
{
    
     //Table Name
    protected $table = 'shop_review_no';

    //primary key
    public $primaryKey = 'shop_review_no_id';

    //TImestamps
    public $timestamps = true;

}
