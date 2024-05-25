<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaedEbookView extends Model
{
        //Table Name
    protected $table = 'saed_ebook_view';

    //primary key
    public $primaryKey = 'saed_ebook_view_id';

    //TImestamps
    public $timestamps = true;
}
