<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\Admin;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        //check session
        if (session('login') != null) {
            return redirect('/main');
        } else {
            return view('admin.login');
        }
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->get('email');
        $password = $request->get('password');

        if($validator->fails()){
            return redirect('/m16admin')->withInput()->withErrors($validator);
        }else{
            $admin = Admin::where('email', $email)
                ->where('password', $password)->first();

            if(count($admin) > 0){
                //create session
                session(['login' => $admin->name, 'page' => $admin->page]);
                return redirect('/main');
            }else{
                return redirect('/m16admin')->withInput($request->all())->withErrors('Incorrect Credentials!');
            }
        }
    }

    public function logout(Request $request){
        if($request->session()->has('login') != null){
            $request->session()->forget('login');
            return redirect('/m16admin');
        }
    }

    public function doforgotpassword(Request $request)
    {

        if ($request != null) {
            $admin = Admin::where('email', $request->email)->first();
            //$email = $request->email;
            $tempPass = str_random(5);

            //print_r($admin);

            if($admin != null) {
                if (
                Mail::send('emails.forgotpassword', ['admin' => $admin, 'newpass' => $tempPass], function ($m) use ($admin) {
                    $m->from('m16district@gmail.com', 'TESTTT');
                    $m->to($admin->email);
                    $m->subject('TEST EMAIL');
                })

                ) {
                    //update password admin
                    $admin->password = $tempPass;

                    $admin->save();

                    $response = array(
                        'status' => true,
                        'msg' => 'sucess'
                    );
                } else {
                    $response = array(
                        'status' => false,
                        'msg' => 'FAILED'
                    );
                }
            }else{
                $response = array(
                    'status' => false,
                    'msg' => 'USER NOT FOUND!'
                );
            }

            return Response::json($response);
        }

        //echo 'asd';
    }





    /*Mail::raw('Text to e-mail', function($message){
                $message->from('m16district@gmail.com', 'TESTTT');

                $message->to('gabrielcaesario@gmail.com')->cc('gabriel@korindo.co.id');
            })*/
}
