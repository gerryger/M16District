<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class F_services extends Model
{
    protected $fillable = array('name', 'image', 'description', 'price_S', 'price_M', 'price_L', 'price_XL', 'created_by');
}
