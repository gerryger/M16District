<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class S_featureddish extends Model
{
    protected $table = 's_featured_dish';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
