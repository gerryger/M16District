<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class S_slider extends Model
{
    protected $fillable = array('image', 'image2', 'heading', 'headingColor', 'created_by');
}
