<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWhatsapp extends Model
{
     //Table Name
    protected $table = 'user_whatsapp';

    //primary key
    public $primaryKey = 'user_whatsapp_id';

    //TImestamps
    public $timestamps = true;
}
