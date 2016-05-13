<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class S_pricing extends Model
{
    protected $fillable = ['name', 'price', 'image', 'category', 'created_by'];
}
