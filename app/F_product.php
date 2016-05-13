<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F_product extends Model
{
    protected $fillable = array('name', 'image', 'youtubelink', 'description', 'created_by');
}
