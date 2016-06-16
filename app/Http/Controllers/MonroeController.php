<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MonroeController extends Controller
{
    public function index(){
        return view('monroe.monroe');
    }
}
