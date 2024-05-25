<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedSession extends Model
{
    
       //Table Name
    protected $table = 'saed_session';

    //primary key
    public $primaryKey = 'saed_session_id';

    //TImestamps
    public $timestamps = true;

     public function member(){

      return $this->BelongsTo('App\SaedSessionMember', 'user_id');

    }
}
