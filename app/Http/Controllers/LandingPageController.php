<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Event;
use App\L_about_us;
use App\About;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class LandingPageController extends Controller
{
    public function index(){
        $abouts = L_about_us::all();
        //$events = Event::where('ev_page', 'l')->get();
        //echo json_encode($abouts);
        return view('landingpage.index2', ['abouts' => $abouts]);
    }

    /*================ADMIN PAGE [START]================*/
    public function aboutus(){
        return view('admin.landingpage.l_about_us', ['abouts'=>L_about_us::all()]);
    }

    public function doaddaboutus(Request $request){
        if($request != null){
            $messages = [
                'txtAbout.required'=>'About is required!',
                'txtInstagram.required'=>'Instagram link is required!',
                'image1.required'=>'Image 1 is required!',
                'image2.required'=>'Image 2 is required!',
                'image3.required'=>'Image 3 is required!',
                'image4.required'=>'Image 4 is required!'
            ];

            $validator = Validator::make($request->all(), [
                'txtAbout'=>'required',
                'txtInstagram'=>'required',
                'image1'=>'required',
                'image2'=>'required',
                'image3'=>'required',
                'image4'=>'required',
            ], $messages);

            if($validator->fails()){
                return redirect('/aboutus')->withInput()->withErrors($validator);
            }else{
                if(isset($_POST['btnAddAbout'])){
                    //echo 'INSERT';
                    $about = L_about_us::all();

                    if(count($about) > 0){
                        return redirect('/aboutus')->withInput()->withErrors("Data already exist!");
                    }else {
                        $this->dbInsertAbout($request);
                    }

                }else if(isset($_POST['btnUpdateAbout'])){
                    //echo 'UPDATE';
                    $this->dbUpdateAbout($request);

                }else{
                    echo 'ERROR!!!';
                }

                return redirect('/aboutus');
            }
        }
    }

    public function dbInsertAbout(Request $request){
        //set configuration for image processing
        ini_set('memory_limit','256M');
        $dt = new \DateTime();
        $milliseconds = round(microtime(true) * 1000);

        //get all params
        $about = $request->get('txtAbout');
        $fontFamily = $request->get('fontFamily');
        $color = $request->get('txtColor');
        $fontSize = $request->get('txtFontSize');
        $instagram = $request->get('txtInstagram');
        $image1 = 'l_about1_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image1')->getClientOriginalExtension();
        $captionImage1 = $request->get('txtCaptionImage1');
        $image2 = 'l_about2_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
        $captionImage2 = $request->get('txtCaptionImage2');
        $image3 = 'l_about3_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image3')->getClientOriginalExtension();
        $captionImage3 = $request->get('txtCaptionImage3');
        $image4 = 'l_about4_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image4')->getClientOriginalExtension();
        $captionImage4 = $request->get('txtCaptionImage4');

        //image names for thumbnail
        $imageThumb1 = 'l_about1_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image1')->getClientOriginalExtension();
        $imageThumb2 = 'l_about2_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
        $imageThumb3 = 'l_about3_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image3')->getClientOriginalExtension();
        $imageThumb4 = 'l_about4_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image4')->getClientOriginalExtension();

        try {
            //create object
            $obj = new L_about_us();
            $obj->about = $about;
            $obj->fontFamily = $fontFamily;
            $obj->color = $color;
            $obj->fontSize = $fontSize;
            $obj->instagram = $instagram;
            $obj->image1 = $image1;
            $obj->caption_image1 = $captionImage1;
            $obj->thumb_image1 = $imageThumb1;
            $obj->image2 = $image2;
            $obj->caption_image2 = $captionImage2;
            $obj->thumb_image2 = $imageThumb2;
            $obj->image3 = $image3;
            $obj->caption_image3 = $captionImage3;
            $obj->thumb_image3 = $imageThumb3;
            $obj->image4 = $image4;
            $obj->caption_image4 = $captionImage4;
            $obj->thumb_image4 = $imageThumb4;

            $this->saveImagesAndThumbnails($request, $obj);

            DB::beginTransaction();

            $obj->save();

            DB::commit();

        }catch(\Exception $e){
           return $e->getMessage();
        }

    }

    public function dbUpdateAbout(Request $request){
        //set configuration for image processing
        ini_set('memory_limit','256M');
        $dt = new \DateTime();
        $milliseconds = round(microtime(true) * 1000);

        //get all params
        $id = $request->get('txtId');
        $about = $request->get('txtAbout');
        $fontFamily = $request->get('fontFamily');
        $color = $request->get('txtColor');
        $fontSize = $request->get('txtFontSize');
        $instagram = $request->get('txtInstagram');
        $image1 = 'l_about1_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image1')->getClientOriginalExtension();
        $captionImage1 = $request->get('txtCaptionImage1');
        $image2 = 'l_about2_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
        $captionImage2 = $request->get('txtCaptionImage2');
        $image3 = 'l_about3_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image3')->getClientOriginalExtension();
        $captionImage3 = $request->get('txtCaptionImage3');
        $image4 = 'l_about4_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image4')->getClientOriginalExtension();
        $captionImage4 = $request->get('txtCaptionImage4');

        //image names for thumbnail
        $imageThumb1 = 'l_about1_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image1')->getClientOriginalExtension();
        $imageThumb2 = 'l_about2_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image2')->getClientOriginalExtension();
        $imageThumb3 = 'l_about3_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image3')->getClientOriginalExtension();
        $imageThumb4 = 'l_about4_thumb_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image4')->getClientOriginalExtension();


        try{

            $selAbout = L_about_us::find($id);

            $this->deleteImagesAndThumbnails($selAbout);

            $selAbout->about = $about;
            $selAbout->fontFamily = $fontFamily;
            $selAbout->color = $color;
            $selAbout->fontSize = $fontSize;
            $selAbout->instagram = $instagram;
            $selAbout->image1 = $image1;
            $selAbout->caption_image1 = $captionImage1;
            $selAbout->thumb_image1 = $imageThumb1;
            $selAbout->image2 = $image2;
            $selAbout->caption_image2 = $captionImage2;
            $selAbout->thumb_image2 = $imageThumb2;
            $selAbout->image3 = $image3;
            $selAbout->caption_image3 = $captionImage3;
            $selAbout->thumb_image3 = $imageThumb3;
            $selAbout->image4 = $image4;
            $selAbout->caption_image4 = $captionImage4;
            $selAbout->thumb_image4 = $imageThumb4;


            $this->saveImagesAndThumbnails($request, $selAbout);

            DB::beginTransaction();

            $selAbout->save();

            DB::commit();

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function dodeleteabout(Request $request, L_about_us $about){
        if($request != null){
            try {
                DB::beginTransaction();

                $this->deleteImagesAndThumbnails($about);

                $about->delete();

                DB::commit();
            }catch(\Exception $e){
                return $e->getMessage();
            }

            return redirect('/aboutus');
        }
    }

    public function deleteImagesAndThumbnails(L_about_us $about){
        try {

            //delete thumbnail
            File::delete('landingpage_asset/images/about/thumbnail/' . $about->thumb_image1);
            File::delete('landingpage_asset/images/about/thumbnail/' . $about->thumb_image2);
            File::delete('landingpage_asset/images/about/thumbnail/' . $about->thumb_image3);
            File::delete('landingpage_asset/images/about/thumbnail/' . $about->thumb_image4);


            //delete image
            File::delete('landingpage_asset/images/about/' . $about->image1);
            File::delete('landingpage_asset/images/about/' . $about->image2);
            File::delete('landingpage_asset/images/about/' . $about->image3);
            File::delete('landingpage_asset/images/about/' . $about->image4);

        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function saveImagesAndThumbnails(Request $request, L_about_us $obj){
        try{

            //save image
            Image::make($request->file('image1'))->fit(628, 619)->save('landingpage_asset/images/about/' . $obj->image1)->destroy();
            Image::make($request->file('image2'))->fit(628, 619)->save('landingpage_asset/images/about/' . $obj->image2)->destroy();
            Image::make($request->file('image3'))->fit(628, 619)->save('landingpage_asset/images/about/' . $obj->image3)->destroy();
            Image::make($request->file('image4'))->fit(628, 619)->save('landingpage_asset/images/about/' . $obj->image4)->destroy();

            //save thumbnail image
            Image::make($request->file('image1'))->fit(239, 256)->save('landingpage_asset/images/about/thumbnail/' . $obj->thumb_image1)->destroy();
            Image::make($request->file('image2'))->fit(239, 256)->save('landingpage_asset/images/about/thumbnail/' . $obj->thumb_image2)->destroy();
            Image::make($request->file('image3'))->fit(239, 256)->save('landingpage_asset/images/about/thumbnail/' . $obj->thumb_image3)->destroy();
            Image::make($request->file('image4'))->fit(239, 256)->save('landingpage_asset/images/about/thumbnail/' . $obj->thumb_image4)->destroy();


        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    /*================ADMIN PAGE [END]================*/


}
