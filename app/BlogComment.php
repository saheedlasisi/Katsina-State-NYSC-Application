<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //Table Name
    protected $table = 'blog_comment';

    //primary key
    public $primaryKey = 'blog_comment_id';

    //TImestamps
    public $timestamps = true;
}
