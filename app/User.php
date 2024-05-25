<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','state_code','profile_pic','phone_number','gender','religion','batch','stream','year','password','state_of_origin','serving_state', 'serving_lga','platoon','about_me','account_status','marital_status','whatsapp_number','facebook_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    public function reply(){

      return $this->hasMany('App\ShopReviewReply', 'user_id');

    }


}
