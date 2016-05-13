<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class f_blog extends Model
{
    protected $table = 'f_blogs';
    protected $fillable = array('title', 'description', 'image', 'date', 'created_by');
}
