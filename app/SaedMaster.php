<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\SaedMasterResetPasswordNotification;

class SaedMaster extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image','email', 'saed_title','phone_number','about','state_of_origin','lga','register_by','register_user_type','address','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SaedMasterResetPasswordNotification($token));
    }
}
