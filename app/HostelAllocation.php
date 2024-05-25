<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostelAllocation extends Model
{
     //Table Name
    protected $table = 'hostel_allocation';

    //primary key
    public $primaryKey = 'h_l_id';

    //TImestamps
    public $timestamps = true;
}
