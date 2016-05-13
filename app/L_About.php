<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class L_About extends Model
{
    protected $table = 'l_abouts';
    protected $fillable = array('page', 'img', 'title', 'about', 'url', 'href', 'fontfamily', 'color', 'fontsize', 'instagram');
}
