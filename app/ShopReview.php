<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopReview extends Model
{
     //Table Name
    protected $table = 'shop_review';

    //primary key
    public $primaryKey = 'shop_review_id';

    //TImestamps
    public $timestamps = true;

    public function replies(){

      return $this->hasMany('App\ShopReviewReply', 'shop_review_id');

    }

    // public function user(){

    //   return $this->BelongsTo('App\User', 'id');

    // }
}
