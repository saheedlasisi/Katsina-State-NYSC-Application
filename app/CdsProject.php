<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CdsProject extends Model
{
     //Table Name
    protected $table = 'cds_project';

    //primary key
    public $primaryKey = 'cds_project_id';

    //TImestamps
    public $timestamps = true;
}
