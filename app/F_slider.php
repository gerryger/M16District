<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F_slider extends Model
{
    protected $table = 'f_sliders';
    protected $fillable = array('image', 'created_by');
}
