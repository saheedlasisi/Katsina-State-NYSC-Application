<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedEbook extends Model
{
   
         //Table Name
    protected $table = 'saed_ebook';

    //primary key
    public $primaryKey = 'saed_ebook_id';

    //TImestamps
    public $timestamps = true;
}
