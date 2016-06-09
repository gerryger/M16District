<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\L_About;
use App\About;

class LandingPageController extends Controller
{
    public function index(){
        $abouts = L_About::where('page', 'l')->get();
        $events = Event::where('ev_page', 'l')->get();
        //echo json_encode($abouts);
        return view('landingpage.index2', ['abouts' => $abouts, 'events' => $events]);
    }

    /*================ADMIN PAGE [START]================*/
    public function aboutus(){
        return view('admin.landingpage.l_about_us', ['abouts'=>About::all()]);
    }
    /*================ADMIN PAGE [END]================*/
}
