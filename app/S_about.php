<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class S_about extends Model
{
    protected $fillable = ['about', 'image1', 'image2', 'image3', 'image4', 'created_by'];
}
