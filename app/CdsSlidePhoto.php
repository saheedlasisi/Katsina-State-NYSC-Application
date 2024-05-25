<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CdsSlidePhoto extends Model
{
    //Table Name
    protected $table = 'cds_slide_photo';

    //primary key
    public $primaryKey = 'cds_slide_photo_id';

    //TImestamps
    public $timestamps = true;
}
