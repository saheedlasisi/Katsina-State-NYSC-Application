<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopReviewReplyNo extends Model
{
     //Table Name
    protected $table = 'shop_review_reply_no';

    //primary key
    public $primaryKey = 'shop_review_reply_no_id';

    //TImestamps
    public $timestamps = true;
}
