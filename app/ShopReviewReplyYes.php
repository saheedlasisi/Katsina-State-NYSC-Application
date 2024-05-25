<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopReviewReplyYes extends Model
{
    //Table Name
    protected $table = 'shop_review_reply_yes';

    //primary key
    public $primaryKey = 'shop_review_reply_yes_id';

    //TImestamps
    public $timestamps = true;
}
