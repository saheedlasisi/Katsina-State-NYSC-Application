<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopReviewReply extends Model
{
     //Table Name
    protected $table = 'shop_review_reply';

    //primary key
    public $primaryKey = 'shop_review_reply_id';

    //TImestamps
    public $timestamps = true;

    public function user(){

      return $this->BelongsTo('App\User', 'id');

    }
}
