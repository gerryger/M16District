<?php

namespace App\Http\Controllers;


use App\M16_instagram_acc;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\Event;
use App\Admin;
use App\L_About;
use Intervention\Image\Facades\Image;
use Mockery\CountValidator\Exception;


class MainController extends Controller
{
   //GET
   public function index(){
       if (session('login') != null) {
           return view('admin.home');
       }else{
           return view('admin.login');
       }
   }

   //GET
   public function m16_instagram(){
       return view('admin.m16_instagram');
   }

   //POST
   public function doAddInstagram(Request $request){
       if($request != null){
           $instagramID = $request->get('txtInstagramID');
           $instagramPass = $request->get('txtInstagramPass');

           $obj = new M16_instagram_acc();
           $obj->instagram_id = $instagramID;
           $obj->instagram_pass = $instagramPass;

           $obj->save();

           return redirect('/m16_instagram');
       }
   }

   //GET
   public function newevent(){
       return view('admin.newevent', ['events' => Event::all()]);
   }

   //POST
   public function deleteevent(Request $request, Event $event){
        //$this->authorize('destroy', $event);

       $event->delete();

       return redirect('/newevent');
   }

   //POST
   public function doinsertevent(Request $request){
       $validator = Validator::make($request->all(), [
           'txtEventName' => 'required',
           'txtStartDate' => 'required',
           'txtEndDate' => 'required',
           'txtDescription' => 'required',
           'txtEventPlace' => 'required',
           'image' => 'required|image'
       ]);

       if($validator->fails()){
           return redirect('/newevent')->withInput()->withErrors($validator);
       }else{
           $event = new Event();

           $dt = new \DateTime();

           $milliseconds = round(microtime(true) * 1000);



           $imgName = $dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

           $event->ev_name = $request->txtEventName;
           $event->ev_page = $request->page;
           $event->ev_place = $request->txtEventPlace;
           $event->ev_start = $request->txtStartDate;
           $event->ev_end = $request->txtEndDate;
           $event->ev_img = $imgName;
           $event->ev_desc = $request->txtDescription;

           //$request->file('image')->move(base_path().'/public/sbadmin/eventImages/', $imgName);

           Image::make($request->file('image'))->resize(500,300)->save(base_path().'/public/sbadmin/eventImages/'.$imgName)->destroy();

           $event->save();

//           $img = Image::make(base_path().'/public/sbadmin/eventImages/'.$imgName);
//           $img->resize(500,300);

           return redirect('/newevent');
       }
   }

   //GET
   public function editevent(){
       return view('admin.editevent', ['events' => Event::all()]);
   }

   //POST
   public function doeditevent(Request $request){
       $validator = Validator::make($request->all(), [
           'page' => 'required',
           'txtEventName' => 'required',
           'txtStartDate' => 'required',
           'txtEndDate' => 'required|different:txtStartDate',
           'txtDescription' => 'required'
       ]);

       if($validator->fails()){
           return redirect('/editevent')->withInput()->withErrors($validator);
       }else{
           $event = Event::find($request->eventID);

           $event->ev_name = $request->txtEventName;
           $event->ev_page = $request->page;
           $event->ev_start = $request->txtStartDate;
           $event->ev_end = $request->txtEndDate;
           $event->ev_desc = $request->txtDescription;

           $event->save();

           return redirect('/editevent');
       }
   }

   //GET
   public function manageadmin(){
       return view('admin.manageadmin', ['admins' => Admin::all()]);
   }

   //POST
   public function doaddadmin(Request $request){
       if($request != null){
           $name = $request->name;
           $email = $request->email;
           $pass = $request->pass;
           $page = $request->page;

           $admin = new Admin();
           $admin->name = $name;
           $admin->email = $email;
           $admin->password = $pass;
           $admin->page = $request->page;


           if($admin->save()){
               $response = array(
                   'status'=>true,
                   'msg'=>'Success adding new admin'
               );
           }else{
               $response = array(
                   'status'=>false,
                   'msg'=>'FAILED adding new admin'
               );
           }

           return Response::json($response);
       }
   }

   //POST
   public function dodeleteadmin(Request $request){
       if($request != null){
           $admin = Admin::find($request->admin_id);

           if($admin->delete()){
                $response = array(
                    'status'=>true,
                    'msg'=>'Delete Admin Successful'
                );
           }else{
               $response = array(
                   'status'=>false,
                   'msg'=>'FAILED Delete Admin'
               );
           }

           return Response::json($response);
       }
   }

   //POST
   public function doeditadmin(Request $request){
       if($request != null){
           $admin = Admin::find($request->id);

           $admin->name = $request->name;
           $admin->email = $request->email;
           $admin->password = $request->pass;

           if($admin->save()){
               $response = array(
                   'status'=>true,
                   'msg'=>'Update Admin Successful'
               );
           }else{
               $response = array(
                   'status'=>false,
                   'msg'=>'FAILED Update Admin'
               );
           }
           return Response::json($response);
       }
   }


   /*============= Landing Page [START] ====================*/

    //About Us
        //GET
        public function aboutus(){
            $page = session('page');

            if($page == '*'){
                $abouts = L_About::all();
            }else{
                $abouts = L_About::where('page', $page)->get();
            }
            //echo $abouts;
            return view('admin.l_abouts', ['abouts' => $abouts]);
        }

        //POST
        public function doaddaboutus(Request $request){
            if($request != null){

                $validator = Validator::make($request->all(), [
                    'image' => 'required|image'
                ]);

                if($validator->fails()){
                    //validation fails

                    return redirect('/aboutus')->withInput()->withErrors($validator);
                }else {
                    //validation success

                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    //set up variables
                    $page = $request->get('page');
                    $imgName = $dt->format('Ymd') .$milliseconds . '.' . $request->file('image')->getClientOriginalExtension();
                    $title = $request->get('txtTitle');
                    $about = $request->get('txtAbout');
                    $url = $request->get('txtUrl');
                    $href = $request->get('txtHref');
                    $fontfamily = $request->get('fontFamily');
                    $color = $request->get('txtColor');
                    $fontsize = $request->get('txtFontSize');
                    $instagram = $request->get('txtInstagram');



                    //assign variables to class
                    $newAbout = new L_About();

                    $newAbout->page = $page;
                    $newAbout->img = $imgName;
                    $newAbout->title = $title;
                    $newAbout->about = $about;
                    $newAbout->url = $url;
                    $newAbout->href = $href;
                    $newAbout->fontfamily = $fontfamily;
                    $newAbout->color = $color;
                    $newAbout->fontsize = $fontsize;
                    $newAbout->instagram = $instagram;

                    try {
                        //insert data
                        $newAbout->save();

                        //move image to server directory
                        Image::make($request->file('image'))->resize(null,550)->save(base_path().'/public/landingpage_asset/images/L_aboutImages/'.$imgName)->destroy();

                        //redirect
                        return redirect('/aboutus');
                    }catch(Exception $e) {
                        return redirect('/aboutus')->withErrors($e->getMessage());
                    }
                }
            }
        }

        //POST
        public function deleteabout(Request $request, L_About $about){
            $about->delete();
            return redirect('/aboutus');
        }

   /*============= Landing Page [END] ====================*/

}
