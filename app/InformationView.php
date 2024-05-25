<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationView extends Model
{
     //Table Name
    protected $table = 'info_view';

    //primary key
    public $primaryKey = 'i_v_id';

    //TImestamps
    public $timestamps = true;
}
