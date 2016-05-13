<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F_eventpromo extends Model
{
    protected $table = 'f_eventpromo';
    protected $fillable = array('name', 'start', 'end', 'image', 'description');
}
