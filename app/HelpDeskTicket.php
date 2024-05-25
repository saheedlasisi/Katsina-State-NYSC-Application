<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpDeskTicket extends Model
{
     //Table Name
    protected $table = 'help_desk_ticket';

    //primary key
    public $primaryKey = 'h_d_id';

    //TImestamps
    public $timestamps = true;


}
