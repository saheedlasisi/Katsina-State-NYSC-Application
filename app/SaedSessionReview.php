<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedSessionReview extends Model
{
       //Table Name
    protected $table = 'saed_session_review';

    //primary key
    public $primaryKey = 'saed_session_review_id';

    //TImestamps
    public $timestamps = true;
}
