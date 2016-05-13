<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PitstopController extends Controller
{
    public function index(){
        return view('pitstop.pitstop');
    }
}
