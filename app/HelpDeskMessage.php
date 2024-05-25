<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpDeskMessage extends Model
{
    //Table Name
    protected $table = 'help_desk_message';

    //primary key
    public $primaryKey = 'h_d_m_id';

    //TImestamps
    public $timestamps = true;
}
