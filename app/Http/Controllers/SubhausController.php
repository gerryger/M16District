<?php

namespace App\Http\Controllers;

use App\S_about;
use App\S_featureddish;
use App\S_pricing;
use App\S_slider;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


use Intervention\Image\Facades\Image;
use Mockery\CountValidator\Exception;


class SubhausController extends Controller
{
    /*##############FRONT END PAGE [START]##############*/
        public function index(){
            return view('subhaus.index', [
                'sliders'=>S_slider::all(),
                'abouts'=>S_about::all(),
                'pricings'=>S_pricing::all(),
                'foods1'=>S_featureddish::where('category', 'food1')->get(),
                'foods2'=>S_featureddish::where('category', 'food2')->get(),
                'drinks'=>S_featureddish::where('category', 'drinks')->get()
            ]);
        }
    /*##############FRONT END PAGE [END]##############*/


    /*##############ADMIN PAGE [START]##############*/

        //GET
        public function s_slider(){
            return view('admin.subhaus.s_slider', ['sliders'=>S_slider::all()]);
        }

        //POST
        public function s_doaddslider(Request $request){
            if($request != null){
                $messages = [
                    'image.required'=>'Image required!',
                    'image.mimes'=>'Must be an image!',
                    'image2.image'=>'Must be an image!'
                ];

                $validator = Validator::make($request->all(),[
                    'image'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image2'=>'image|mimes:jpg,jpeg,png,JPG,PNG,JPEG'
                ], $messages);

                if($validator->fails()){
                    return redirect('/s_slider')->withInput()->withErrors($validator);
                }else{
                    ini_set('memory_limit','256M');
                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    //get all input
                    $imgName = 's_slider_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                    $imgName2 = 's_sliderthumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
                    $heading = $request->get('txtHeading');
                    $headingColor = $request->get('headingColor');
                    $created_by = $request->get('txtCreatedby');

                    $slider = new S_slider();
                    $slider->image = $imgName;
                    $slider->image2 = $imgName2 == null ? '' : $imgName2;
                    $slider->heading = $heading == null ? '' : $heading;
                    $slider->headingColor = $headingColor == null ? '' : $headingColor;
                    $slider->created_by = $created_by;

                    //upload image
                    Image::make($request->file('image'))->fit(1454,631)->save(base_path().'/public/subhaus_asset/images/slider/'.$imgName)->destroy();
                    Image::make($request->file('image2'))->fit(300,300)->save(base_path().'/public/subhaus_asset/images/slider/'.$imgName2)->destroy();

                    $slider->save();

                    return redirect('/s_slider');
                }
            }
        }

        //POST
        public function s_doadeleteslider(Request $request, S_slider $slider){
            unlink(base_path('/public/subhaus_asset/images/slider/'.$slider->image));
            unlink(base_path('/public/subhaus_asset/images/slider/'.$slider->image2));
            $slider->delete();
            return redirect('/s_slider');
        }

        //POST
        public function s_doupdateslider(Request $request){
            if($request != null){
                $messages = [
                    'image.required'=>'Image required!',
                    'image.mimes'=>'Must be an image!',
                    'image2.image'=>'Must be an image!'
                ];

                $validator = Validator::make($request->all(),[
                    'image'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image2'=>'image|mimes:jpg,jpeg,png,JPG,PNG,JPEG'
                ], $messages);

                if($validator->fails()){
                    $response = array('status'=>false, 'msg'=>$validator->errors()->all());

                    return Response::json($response);
                }else{
                    ini_set('memory_limit','256M');
                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    $id = $request->get('txtId');
                    $imgName = 's_slider_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                    $imgName2 = 's_sliderthumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
                    $heading = $request->get('txtHeading');
                    $headingColor = $request->get('headingColor');
                    $created_by = $request->get('txtCreatedby');

                    $selSlider = S_slider::find($id);

                    unlink(base_path('/public/subhaus_asset/images/slider/'.$selSlider->image));
                    unlink(base_path('/public/subhaus_asset/images/slider/'.$selSlider->image2));

                    $selSlider->image = $imgName;
                    $selSlider->image2 = $imgName2;
                    $selSlider->heading = $heading;
                    $selSlider->headingColor = $headingColor;
                    $selSlider->created_by = $created_by;

                    Image::make($request->file('image'))->fit(1454,631)->save(base_path().'/public/subhaus_asset/images/slider/'.$imgName)->destroy();
                    Image::make($request->file('image2'))->fit(300,300)->save(base_path().'/public/subhaus_asset/images/slider/'.$imgName2)->destroy();

                    $selSlider->save();

                    $response = array('status'=>true, 'msg'=>'success to update slider!');

                    return Response::json($response);
                }
            }
        }

        //GET
        public function s_about(){
            return view('admin.subhaus.s_about', ['abouts'=>S_about::all()]);
        }

        //POST
        public function s_doaddabout(Request $request){
            if($request != null){
                $messages = [
                    'image1.required'=>'Image1 required!',
                    'image1.mimes'=>'Image1 Must be an image!',
                    'image2.required'=>'Image2 required!',
                    'image2.mimes'=>'Image2 Must be an image!',
                    'image3.required'=>'Image3 required!',
                    'image3.mimes'=>'Image3 Must be an image!',
                    'image4.required'=>'Image4 required!',
                    'image4.mimes'=>'Image4 Must be an image!',
                ];

                $validator = Validator::make($request->all(),[
                    'txtAbout'=>'required',
                    'image1'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image2'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image3'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image4'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG'
                ], $messages);

                if($validator->fails()){
                    return redirect('/s_about')->withInput()->withErrors($validator);
                }else{
                    $about = S_about::all();

                    if(count($about) > 0) {
                        return redirect('/s_about')->withInput()->withErrors("Data already exist! Only 1 record allowed!");
                    }else{
                        ini_set('memory_limit','256M');
                        $dt = new \DateTime();
                        $milliseconds = round(microtime(true) * 1000);

                        $about = $request->get('txtAbout');
                        $imgName1 = 's_about1_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image1')->getClientOriginalExtension();
                        $imgName2 = 's_about2_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
                        $imgName3= 's_about3_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image3')->getClientOriginalExtension();
                        $imgName4 = 's_about4_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image4')->getClientOriginalExtension();
                        $created_by = $request->get('txtCreatedby');


                        $obj = new S_about();

                        $obj->about = $about;
                        $obj->image1 = $imgName1;
                        $obj->image2 = $imgName2;
                        $obj->image3 = $imgName3;
                        $obj->image4 = $imgName4;
                        $obj->created_by = $created_by;

                        Image::make($request->file('image1'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName1)->destroy();
                        Image::make($request->file('image2'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName2)->destroy();
                        Image::make($request->file('image3'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName3)->destroy();
                        Image::make($request->file('image4'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName4)->destroy();

                        $obj->save();

                        return redirect('/s_about');
                    }
                }
            }
        }

        //POST
        public function s_dodeleteabout(Request $request, S_about $about){
            unlink('/public/');
        }

        //POST
        public function s_doupdateabout(Request $request){
            if($request != null){
                $messages = [
                    'image1.required'=>'Image1 required!',
                    'image1.mimes'=>'Image1 Must be an image!',
                    'image2.required'=>'Image2 required!',
                    'image2.mimes'=>'Image2 Must be an image!',
                    'image3.required'=>'Image3 required!',
                    'image3.mimes'=>'Image3 Must be an image!',
                    'image4.required'=>'Image4 required!',
                    'image4.mimes'=>'Image4 Must be an image!',
                ];

                $validator = Validator::make($request->all(),[
                    'txtAbout'=>'required',
                    'image1'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image2'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image3'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG',
                    'image4'=>'required|image|mimes:jpg,jpeg,png,JPG,PNG,JPEG'
                ], $messages);

                if($validator->fails()){
                    $response = array('status'=>false, 'msg'=>$validator->errors()->all());

                    return Response::json($response);
                }else{
                    ini_set('memory_limit','256M');
                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    $id = $request->get('txtId');
                    $about = $request->get('txtAbout');
                    $imgName1 = 's_about1_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image1')->getClientOriginalExtension();
                    $imgName2 = 's_about2_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
                    $imgName3= 's_about3_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image3')->getClientOriginalExtension();
                    $imgName4 = 's_about4_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image4')->getClientOriginalExtension();
                    $created_by = $request->get('txtCreatedby');

                    $obj = S_about::find($id);

                    unlink(base_path('/public/subhaus_asset/images/about/'.$obj->image1));
                    unlink(base_path('/public/subhaus_asset/images/about/'.$obj->image2));
                    unlink(base_path('/public/subhaus_asset/images/about/'.$obj->image3));
                    unlink(base_path('/public/subhaus_asset/images/about/'.$obj->image4));

                    $obj->about = $about;
                    $obj->image1 = $imgName1;
                    $obj->image2 = $imgName2;
                    $obj->image3 = $imgName3;
                    $obj->image4 = $imgName4;
                    $obj->created_by = $created_by;

                    Image::make($request->file('image1'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName1)->destroy();
                    Image::make($request->file('image2'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName2)->destroy();
                    Image::make($request->file('image3'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName3)->destroy();
                    Image::make($request->file('image4'))->fit(250,220)->save(base_path().'/public/subhaus_asset/images/about/'.$imgName4)->destroy();

                    $obj->save();


                    $response = array('status'=>true, 'msg'=>'success to update about!');

                    return Response::json($response);
                }
            }
        }

        //GET
        public function s_pricing(){
            return view('admin.subhaus.s_pricing', ['pricings'=>S_pricing::all()]);
        }

        //POST
        public function s_doaddpricing(Request $request){
            if($request != null){
                //echo 'ASD';
                $messages = [
                    'txtName.required'=>'Name required!',
                    'txtPrice.required'=>'Price required!',
                    'txtCategory.required'=>'Category required!',
                    'image.required'=>'Image required!',
                    'image.image'=>'Unsupported image format!'
                ];

                $validator = Validator::make($request->all(),[
                    'txtName'=>'required',
                    'txtPrice'=>'required',
                    'txtCategory'=>'required',
                    'image'=>'required|image|mimes:jpg,png,jpeg,PNG,JPG,JPEG'
                ],$messages);

                if($validator->fails()){
                    return redirect('/s_pricing')->withInput()->withErrors($validator);
                }else{
                    ini_set('memory_limit','256M');
                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    $name = $request->get('txtName');
                    $price = $request->get('txtPrice');
                    $category = $request->get('txtCategory');
                    $imgName = 's_pricing_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                    $created_by = $request->get('txtCreatedby');

                    $pricing = new S_pricing();
                    $pricing->name = $name;
                    $pricing->price = $price;
                    $pricing->category = $category;
                    $pricing->image = $imgName;
                    $pricing->created_by = $created_by;

                    Image::make($request->file('image'))->fit(209,211)->save(base_path().'/public/subhaus_asset/images/pricing/'.$imgName)->destroy();

                    $pricing->save();

                    return redirect('/s_pricing');
                }
            }
        }

        //POST
        public function s_dodeletepricing(Request $request, S_pricing $pricing){
            unlink(base_path('/public/subhaus_asset/images/pricing/'.$pricing->image1));
            $pricing->delete();
            return redirect('/s_pricing');
        }

        //POST
        public function s_doupdatepricing(Request $request){
            if($request != null){
                $messages = [
                    'txtName.required'=>'Name required!',
                    'txtPrice.required'=>'Price required!',
                    'txtCategory.required'=>'Category required!',
                    'image.required'=>'Image required!',
                    'image.image'=>'Unsupported image format!'
                ];

                $validator = Validator::make($request->all(),[
                    'txtName'=>'required',
                    'txtPrice'=>'required',
                    'txtCategory'=>'required',
                    'image'=>'required|image|mimes:jpg,png,jpeg,PNG,JPG,JPEG'
                ],$messages);

                if($validator->fails()){
                    $response = [
                        'status'=>false,
                        'msg'=>$validator->errors()->all()
                    ];

                    return Response::json($response);
                }else{
                    ini_set('memory_limit','256M');
                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    $id = $request->get('txtId');
                    $name = $request->get('txtName');
                    $price = $request->get('txtPrice');
                    $category = $request->get('txtCategory');
                    $imgName = 's_pricing_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                    $created_by = $request->get('txtCreatedby');

                    $selPricing = S_pricing::find($id);

                    unlink(base_path('/public/subhaus_asset/images/pricing/'.$selPricing->image));

                    $selPricing->name = $name;
                    $selPricing->price = $price;
                    $selPricing->category = $category;
                    $selPricing->image = $imgName;
                    $selPricing->created_by = $created_by;

                    Image::make($request->file('image'))->fit(209,211)->save(base_path('/public/subhaus_asset/images/pricing/'.$imgName))->destroy();

                    $selPricing->save();

                    $response = [
                        'status'=>true,
                        'msg'=>'Success!'
                    ];

                    return Response::json($response);
                }
            }
        }

        //GET
        public function s_featureddish(){
            $dishes = S_featureddish::all();
            return view('admin.subhaus.s_featureddish', ['dishes'=>$dishes]);
        }

        //POST
        public function s_doaddorupdatefeatureddish(Request $request){
            if($request != null){
                $messages = [
                    'txtHeading1.required'=>'Heading 1 required!',
                    'txtHeading2.required'=>'Heading 2 required!',
                    'txtCategory.required'=>'Category required!',
                    'image1.required'=>'Image 1 required!',
                    'image1.image'=>'[image 1 ERROR!]Unsupported image format!',
                    'image2.image'=>'[image 2 ERROR!]Unsupported image format!',
                    'image3.image'=>'[image 3 ERROR!]Unsupported image format!',
                    'txtDescription.required'=>'Description required!'
                ];

                $validator = Validator::make($request->all(),[
                    'txtHeading1'=>'required',
                    'txtHeading2'=>'required',
                    'txtDescription'=>'required',
                    'txtCategory'=>'required',
                    'image1'=>'required|image|mimes:jpg,png,jpeg,PNG,JPG,JPEG',
                    'image2'=>'image|mimes:jpg,png,jpeg,PNG,JPG,JPEG',
                    'image3'=>'image|mimes:jpg,png,jpeg,PNG,JPG,JPEG'
                ],$messages);

                if($validator->fails()){
                    return redirect('/s_featureddish')->withInput()->withErrors($validator);
                }else {
                    ini_set('memory_limit', '256M');
                    $dt = new \DateTime();
                    $milliseconds = round(microtime(true) * 1000);

                    $img1 = '';
                    $img2 = '';
                    $img3 = '';

                    $id = $request->get('txtId');
                    $heading1 = $request->get('txtHeading1');
                    $heading2 = $request->get('txtHeading2');
                    $category = $request->get('txtCategory');
                    $desc = $request->get('txtDescription');


                    if($category == 'food1'){
                        $img1 = $request->file('image1') == null ? '' : 's_featured_food1_'.$dt->format('Ymd').uniqid().'.'.$request->file('image1')->getClientOriginalExtension();
                    }

                    if($category == 'food2'){
                        $img1 = $request->file('image1') == null ? '' : 's_featured_food2_1_'.$dt->format('Ymd').uniqid().'.'.$request->file('image1')->getClientOriginalExtension();
                        $img2 = $request->file('image2') == null ? '' : 's_featured_food2_2_'.$dt->format('Ymd').uniqid().'.'.$request->file('image2')->getClientOriginalExtension();
                    }

                    if($category == 'drinks'){
                        $img1 = $request->file('image1') == null ? '' : 's_featured_drinks_1_'.$dt->format('Ymd').uniqid().'.'.$request->file('image1')->getClientOriginalExtension();
                        $img2 = $request->file('image2') == null ? '' : 's_featured_drinks_2_'.$dt->format('Ymd').uniqid().'.'.$request->file('image2')->getClientOriginalExtension();
                        $img3 = $request->file('image3') == null ? '' : 's_featured_drinks_3_'.$dt->format('Ymd').uniqid().'.'.$request->file('image3')->getClientOriginalExtension();
                    }

                    $created_by = $request->get('txtCreatedby');

                    if (isset($_POST['btnAddFeatureddish'])) {

                        if(count(S_featureddish::where('category', $category)) > 0){
                            return redirect('/s_featureddish')->withInput()->withErrors('Category '.$category.' already exists!');
                        }else {

                            //INSERT
                            $dish = new S_featureddish();
                            $dish->heading1 = $heading1;
                            $dish->heading2 = $heading2;
                            $dish->category = $category;
                            $dish->description = $desc;
                            $dish->image1 = $img1;
                            $dish->image2 = $img2;
                            $dish->image3 = $img3;
                            $dish->created_by = $created_by;

                            if ($category == 'food1') {
                                Image::make($request->file('image1'))->fit(445, 376)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img1))->destroy();
                            }

                            if ($category == 'food2') {
                                Image::make($request->file('image1'))->fit(265, 263)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img1))->destroy();
                                Image::make($request->file('image2'))->fit(265, 263)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img2))->destroy();
                            }

                            if ($category == 'drinks') {
                                Image::make($request->file('image1'))->fit(501, 300)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img1))->destroy();
                                Image::make($request->file('image2'))->fit(501, 300)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img2))->destroy();
                                Image::make($request->file('image3'))->fit(501, 300)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img3))->destroy();
                            }

                            $dish->save();

                        }
                    } else if (isset($_POST['btnUpdateFeatureddish'])) {
                        //UPDATE
                        $dish = S_featureddish::find($id);

                        if(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($dish->image1).$this->getImageExtensionOnlyFromDb($dish->image1)))) {
                            unlink(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($dish->image1).$this->getImageExtensionOnlyFromDb($dish->image1)));
                        }

                        if(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($dish->image2).$this->getImageExtensionOnlyFromDb($dish->image2)))) {
                            unlink(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($dish->image2).$this->getImageExtensionOnlyFromDb($dish->image2)));
                        }

                        if(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($dish->image3).$this->getImageExtensionOnlyFromDb($dish->image3)))) {
                            unlink(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($dish->image3).$this->getImageExtensionOnlyFromDb($dish->image3)));
                        }

                        $dish->heading1 = $heading1;
                        $dish->heading2 = $heading2;
                        $dish->category = $category;
                        $dish->description = $desc;
                        $dish->image1 = $img1;
                        $dish->image2 = $img2;
                        $dish->image3 = $img3;
                        $dish->created_by = $created_by;

                        if($dish->category == 'food1') {
                            Image::make($request->file('image1'))->fit(445, 376)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img1))->destroy();
                        }

                        if($dish->category == 'food2'){
                            Image::make($request->file('image1'))->fit(265, 263)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img1))->destroy();
                            Image::make($request->file('image2'))->fit(265, 263)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img2))->destroy();
                        }

                        if($dish->category == 'drinks'){
                            Image::make($request->file('image1'))->fit(501, 300)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img1))->destroy();
                            Image::make($request->file('image2'))->fit(501, 300)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img2))->destroy();
                            Image::make($request->file('image3'))->fit(501, 300)->save(base_path('/public/subhaus_asset/images/featured_dishes/' . $img3))->destroy();
                        }

                        $dish->save();
                    } else {
                        echo 'ERROR!';
                    }
                    return redirect('/s_featureddish');
                }
            }
        }

        //POST
        public function s_dodeletefeatureddish(Request $request, S_featureddish $dish){
            if($request != null){
                $selDish = S_featureddish::find($dish->id);

//                $pos = strpos($selDish->image1, '.');
//                echo substr($dish->image1,0,$pos-1).'<br/>'; //image name
//                echo substr($dish->image1, $pos, strlen($dish->image1)-1);//image ext

//                echo 'public_path() : '.base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image1).$this->getImageExtensionOnlyFromDb($selDish->image1)).'<br/>';
//                dd(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image1).$this->getImageExtensionOnlyFromDb($selDish->image1))));

                if(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image1).$this->getImageExtensionOnlyFromDb($selDish->image1)))) {
                    unlink(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image1).$this->getImageExtensionOnlyFromDb($selDish->image1)));
                }

                if(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image2).$this->getImageExtensionOnlyFromDb($selDish->image2)))) {
                    unlink(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image2).$this->getImageExtensionOnlyFromDb($selDish->image2)));
                }

                if(file_exists(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image3).$this->getImageExtensionOnlyFromDb($selDish->image3)))) {
                    unlink(base_path('public/subhaus_asset/images/featured_dishes/' . $this->getImageNameOnlyFromDb($selDish->image3).$this->getImageExtensionOnlyFromDb($selDish->image3)));
                }

                $selDish->delete();

                return redirect('/s_featureddish');
            }
        }

        private function getImageNameOnlyFromDb($str){
            $pos = strpos($str, '.');
            $imageNameOnly = substr($str,0,$pos);

            return $imageNameOnly;
        }

        private function getImageExtensionOnlyFromDb($str){
            if($str == null || empty($str)){
                $str = '.JPG';
            }
            $pos = strpos($str, '.');
            $imageExtensionOnly = substr($str, $pos, strlen($str)-1);

            return $imageExtensionOnly;
        }
    
        //POST
        public function s_dosendemail(Request $request){
			if($request != null){
				$name = $request->get('name');
                $email = $request->get('email');
                $subject = $request->get('subject');
                $msg = $request->get('message');

                Mail::raw($msg, function($message) use ($name, $email, $subject){
                    $message->from($email, $name);
                    $message->to('subhaus@m16district.com');
                    $message->subject($subject);
                });

                return redirect('/subhaus');
			}
        }
    /*##############ADMIN PAGE [END]##############*/
}
