<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    protected $fillable = array('ev_name', 'ev_page', 'ev_start', 'ev_end', 'ev_desc');

    protected  $policies = [
        'App\Event' => 'App\Policies\EventPolicy'
    ];
}
