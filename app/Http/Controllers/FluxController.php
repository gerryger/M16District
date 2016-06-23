<?php

namespace App\Http\Controllers;

use App\F_product;
use App\F_services;
use App\F_slider;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use App\f_blog;
use App\F_eventpromo;
use Intervention\Image\Facades\Image;
use Mockery\CountValidator\Exception;

class FluxController extends Controller
{
    //Flux Front end [START]
        //GET
        public function index(){
            $blogs = f_blog::orderBy('created_at', 'desc')->get();
            $eventpromos = f_eventpromo::all();
            return view('flux.index', ['blogs'=>$blogs, 'eventpromos'=>$eventpromos, 'sliders'=>F_slider::all()]);
        }

        //GET
        public function blog(){
            $blogs = f_blog::orderBy('created_at', 'desc')->get();
            return view('flux.blog', ['blogs'=>$blogs, 'sliders'=>F_slider::all()]);
        }

        //GET
        public function contact(){
            return view('flux.contact', ['sliders'=>F_slider::all()]);
        }

        //GET
        public function about(){
            return view('flux.about', ['sliders'=>F_slider::all()]);
        }

        //GET
        public function services(){
            return view('flux.services', ['services'=>F_services::all(), 'sliders'=>F_slider::all()]);
        }

        //GET
        public function blogdetail(Request $request, f_blog $blog)
        {
            $selBlog = f_blog::find($blog->id);
            //echo $selBlog->description;
            return view('flux.blogdetail', ['blogs'=>$selBlog, 'sliders'=>F_slider::all()]);
        }

        //GET
        public function products(){
            $products = F_product::all();
            return view('flux.products', ['products'=>$products, 'sliders'=>F_slider::all()]);
        }
    //Flux Front end [END]









/*============= Flux Admin Page [START] ====================*/
    //GET
    public function f_slider(){
        return view('admin.flux.f_slider', ['sliders'=>F_slider::all()]);
    }

    //POST
    public function f_doaddslider(Request $request){
        if($request != null){
            $messages = [
                'image.required' => 'Image required!',
                'image.mimes' => 'Supported image format (jpeg, png, bmp, gif, or svg)!'
            ];

            $validator = Validator::make($request->all(), [
                'image' => 'required|image'
            ], $messages);

            if($validator->fails()){
                return redirect('/f_slider')->withInput()->withErrors($validator);
            }else{
                //get all input
                //set memory space
                ini_set('memory_limit','256M');

                //create date and miliseconds for image naming
                $dt = new \DateTime();
                $milliseconds = round(microtime(true) * 1000);

                $imgName = 'f_slider_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                $created_by = $request->get('txtCreatedby');

                $slider = new F_slider();
                $slider->image = $imgName;
                $slider->created_by = $created_by;

                $slider->save();

                $imgWatermark = Image::make(base_path().'/public/flux_asset/images/FluxGallery/slider/logo.png')->resize(130,30);

                //upload image to server
                Image::make($request->file('image'))->resize(1139,461)->insert($imgWatermark, 'bottom-left', 5, 5)->save(public_path('flux_asset/images/sliders/'.$imgName))->destroy();

                return redirect('/f_slider');
            }
        }
    }

    //POST
    public function f_dodeleteslider(Request $request, F_slider $slider){
        //delete current image
        unlink(base_path('/public/flux_asset/images/sliders/'.$slider->image));
        $slider->delete();
        return redirect('/f_slider');
    }

    //POST
    public function f_doupdateslider(Request $request){
        if($request != null){
            $messages = [
                'image.required' => 'Image required!',
                'image.mimes' => 'Supported image format (jpeg, png, bmp, gif, or svg)!'
            ];

            $validator = Validator::make($request->all(), [
                'image' => 'required|image'
            ], $messages);

            if($validator->fails()){
                $response = array('status'=>false, 'msg'=>$validator->errors()->all());

                return Response::json($response);
            }else{
                //set memory space
                ini_set('memory_limit','256M');

                //create date and miliseconds for image naming
                $dt = new \DateTime();
                $milliseconds = round(microtime(true) * 1000);

                //get all param
                $id = $request->get('txtId');
                $imgName = 'f_slider_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

//                    try{
                $selSlider = F_slider::find($id);

                //delete current image
                unlink(base_path('/public/flux_asset/images/sliders/'.$selSlider->image));

                $selSlider->image = $imgName;
                $selSlider->save();

                $imgWatermark = Image::make(base_path().'/public/flux_asset/images/FluxGallery/slider/logo.png')->resize(130,30);

                //move uploaded image to server
                Image::make($request->file('image'))->resize(1139,461)->insert($imgWatermark, 'bottom-left', 5, 5)->save(public_path('flux_asset/images/sliders/'.$imgName))->destroy();

                $response = array('status'=>true, 'msg'=>'Success to update event/promo!');

                return Response::json($response);
//                    }catch(\Exception $e){
                //DebugBar::addException($e);
//                        $response = array('status'=>false, 'msg'=>'FAILED to update event/promo!');
//
//                        return Response::json($response);
//                    }
            }
        }
    }

    //GET
    public function f_promoevent(){
        return view('admin.flux.f_promoevent', ['eventpromos'=>F_eventpromo::all()]);
    }

    //POST
    public function f_doaddeventpromo(Request $request){
        $messages = [
            'txtName.required' => 'Name required!',
            'txtStart.required' => 'Start date required!',
            'txtEnd.required' => 'End date required!',
            'image.required' => 'Image required!',
            'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!',
            'txtDesc.required' => 'Description required!'
        ];

        $validator = Validator::make($request->all(), [
            'txtName' => 'required',
            'txtStart' => 'required',
            'txtEnd' => 'required',
            'image' => 'required|image',
            'txtDesc' => 'required'
        ], $messages);

        if($validator->fails()){
            return redirect('/f_promoevent')->withInput()->withErrors($validator);
        }else{
            //get all input
            $name = $request->get('txtName');
            $start = $request->get('txtStart');
            $end = $request->get('txtEnd');
            $desc = $request->get('txtDesc');

            ini_set('memory_limit','256M');

            $dt = new \DateTime();

            $milliseconds = round(microtime(true) * 1000);

            $imgName = 'f_eventpromo_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

            //create object
            $eventpromo = new F_eventpromo();
            $eventpromo->name = $name;
            $eventpromo->start = $start;
            $eventpromo->end = $end;
            $eventpromo->image = $imgName;
            $eventpromo->description = $desc;

            //echo public_path('flux_asset/images/eventpromo/'.$imgName);

            Image::make($request->file('image'))->resize(461,317)->save(public_path('flux_asset/images/eventpromo/'.$imgName))->destroy();

            $eventpromo->save();

//                dd($eventpromo);
            return redirect('/f_promoevent');
        }
    }

    //POST
    public function f_geteventpromobyid(Request $request){
        $id =  $request->get('eventpromo_id');
        $selEventpromo = F_eventpromo::find($id);

        if(count($selEventpromo) < 0){
            $response = array(
                'status'=>false,
                'msg'=>'No data found!'
            );
        }else{
            $response = array(
                'status'=>true,
                'msg'=>$selEventpromo
            );
        }

        return Response::json($response);
    }


    //POST
    public function f_doupdateeventpromo(Request $request){
        if($request != null){
            $messages = [
                'txtName.required' => 'Name required!',
                'txtStart.required' => 'Start date required!',
                'txtEnd.required' => 'End date required!',
                'image.required' => 'Image required!',
                'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!',
                'txtDesc.required' => 'Description required!'
            ];

            $validator = Validator::make($request->all(), [
                'txtName' => 'required',
                'txtStart' => 'required',
                'txtEnd' => 'required',
                'image' => 'required|image',
                'txtDesc' => 'required'
            ], $messages);

            if($validator->fails()){
                $response = array('status'=>false, 'msg'=>$validator->errors()->all());

                return Response::json($response);
            }else{
                //get all param
                $id = $request->get('txtId');
                $name = $request->get('txtName');
                $start = $request->get('txtStart');
                $end = $request->get('txtEnd');
                $desc = $request->get('txtDesc');

                ini_set('memory_limit','256M');

                $dt = new \DateTime();

                $milliseconds = round(microtime(true) * 1000);

                $imgName = 'f_eventpromo_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

                //get eventpromo based on id
                $selEventPromo = F_eventpromo::find($id);

                //delete current image from server
                unlink(base_path('/public/flux_asset/images/eventpromo/'.$selEventPromo->image));

                //update data
                $selEventPromo->name = $name;
                $selEventPromo->start = $start;
                $selEventPromo->end = $end;
                $selEventPromo->description = $desc;
                $selEventPromo->image = $imgName;

                //save updated data to db
                $selEventPromo->save();

                //move updated image to server
                Image::make($request->file('image'))->resize(461,317)->save(public_path('flux_asset/images/eventpromo/'.$imgName))->destroy();

                $response = array('status'=>true, 'msg'=>'Success to update event/promo!');

                return Response::json($response);
            }
        }
    }

    //GET
    public function f_products(){
        $products = f_product::all();
        return view('admin.flux.f_products', ['products'=>$products]);
    }

    //POST
    public function f_dodeleteproduct(Request $request, F_product $product){
        unlink(base_path('/public/flux_asset/images/ourproducts/'.$product->image));
        $product->delete();
        return redirect('/f_products');
    }

    //POST
    public function f_doaddproduct(Request $request){
        if($request != null){
            $messages = [
                'txtName.required' => 'Name required!',
                'txtYoutube'=>'Youtube link required!',
                'image.required' => 'Image required!',
                'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!',
                'txtDesc.required' => 'Description required!'
            ];

            $validator = Validator::make($request->all(), [
                'txtName' => 'required',
                'txtYoutube' => 'required',
                'image' => 'required|image',
                'txtDesc' => 'required'
            ], $messages);

            if($validator->fails()){
                return redirect('/f_products')->withInput()->withErrors($validator);
            }else{
                //get all params
                $name = $request->get('txtName');
                $youtube = $request->get('txtYoutube');
                $desc = $request->get('txtDesc');
                $createdby = $request->get('txtCreatedby');

                ini_set('memory_limit','256M');

                $dt = new \DateTime();

                $milliseconds = round(microtime(true) * 1000);

                $imgName = 'f_products_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

                try {
                    //create object
                    $product = new F_product();
                    $product->name = $name;
                    $product->image = $imgName;
                    $product->youtubelink = $youtube;
                    $product->description = $desc;
                    $product->created_by = $createdby;

                    //move image to server
                    Image::make($request->file('image'))->fit(306,249)->save(public_path('flux_asset/images/ourproducts/'.$imgName))->destroy();

                    $product->save();

                    return redirect('/f_products');
                }catch(Exception $e){
                    Debugbar::addException($e);
                }
            }
        }
    }

    //POST
    public function f_doupdateproduct(Request $request){
        if($request != null){
            $messages = [
                'txtName.required' => 'Name required!',
                'txtYoutube'=>'Youtube link required!',
                'image.required' => 'Image required!',
                'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!',
                'txtDesc.required' => 'Description required!'
            ];

            $validator = Validator::make($request->all(), [
                'txtName' => 'required',
                'txtYoutube' => 'required',
                'image' => 'required|image',
                'txtDesc' => 'required'
            ], $messages);

            if($validator->fails()){
                $response = array('status'=>false, 'msg'=>$validator->errors()->all());

                return Response::json($response);
            }else{
                //set memory space
                ini_set('memory_limit','256M');

                //create date and miliseconds for image naming
                $dt = new \DateTime();
                $milliseconds = round(microtime(true) * 1000);

                //get all item
                $id = $request->get('txtId');
                $name = $request->get('txtName');
                $youtubelink = $request->get('txtYoutube');
                $desc = $request->get('txtDesc');
                $createdby = $request->get('txtCreatedby');
                $imgName = 'f_product_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

                try{
                    //get product by id
                    $selProduct = F_product::find($id);

                    //delete current image
                    unlink(base_path('/public/flux_asset/images/ourproducts/'.$selProduct->image));

                    //update data
                    $selProduct->name = $name;
                    $selProduct->image = $imgName;
                    $selProduct->youtubelink = $youtubelink;
                    $selProduct->description = $desc;
                    $selProduct->created_by = $createdby;

                    $selProduct->save();

                    //move updated image to server
                    Image::make($request->file('image'))->resize(306,249)->save(public_path('flux_asset/images/ourproducts/'.$imgName))->destroy();

                    $response = array('status'=>true, 'msg'=>'Success to update event/promo!');

                    return Response::json($response);

                }catch(Exception $e){
                    DebugBar::addException($e);
                    $response = array('status'=>false, 'msg'=>'FAILED to update event/promo!');

                    return Response::json($response);
                }
            }
        }
    }

    //GET
    public function f_services(){
        $services = F_services::all();
        return view('admin.flux.f_services', ['services'=>$services]);
    }

    //POST
    public function f_dodeleteservice(Request $request, F_services $service){
        //delete image
        unlink(base_path('/public/flux_asset/images/services/'.$service->image));

        //delete data in db
        $service->delete();

        return redirect('f_services');
    }

    //POST
    public function f_doaddservice(Request $request){
        if($request != null){
            $messages = [
                'txtName.required' => 'Name required!',
                'image.required' => 'Image required!',
                'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!',
                'txtDesc.required' => 'Description required!',
            ];

            $validator = Validator::make($request->all(), [
                'txtName' => 'required',
                'image' => 'required|image',
                'txtDesc' => 'required'
            ], $messages);

            if($validator->fails()){
                return redirect('/f_services')->withInput()->withErrors($validator);
            }else{
                //set memory space
                ini_set('memory_limit','256M');

                //create date and miliseconds for image naming
                $dt = new \DateTime();
                $milliseconds = round(microtime(true) * 1000);

                //get all input
                $name = $request->get('txtName');
                $desc = $request->get('txtDesc');
                $imgName = 'f_service_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                $price_S = $request->get('txtPrice_S');
                $price_M = $request->get('txtPrice_M');
                $price_L = $request->get('txtPrice_L');
                $price_XL = $request->get('txtPrice_XL');
                $created_by = $request->get('txtCreatedby');

                //create object
                $service = new F_services();
                $service->name = $name;
                $service->image = $imgName;
                $service->description = $desc;
                $service->price_S = $price_S;
                $service->price_M = $price_M;
                $service->price_L = $price_L;
                $service->price_XL = $price_XL;
                $service->created_by = $created_by;

                $service->save();

                $imgWatermark = Image::make(base_path().'/public/flux_asset/images/FluxGallery/slider/logo.png')->resize(130,30);

                //move uploaded image to server
                Image::make($request->file('image'))->resize(509,211)->insert($imgWatermark, 'bottom-right', 5, 5)->save(public_path('flux_asset/images/services/'.$imgName))->destroy();


                return redirect('/f_services');
            }
        }
    }

    //POST
    public function f_doupdateservice(Request $request){
        if($request != null){
            $messages = [
                'txtName.required' => 'Name required!',
                'image.required' => 'Image required!',
                'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!',
                'txtDesc.required' => 'Description required!',
            ];

            $validator = Validator::make($request->all(), [
                'txtName' => 'required',
                'image' => 'required|image',
                'txtDesc' => 'required'
            ], $messages);

            if($validator->fails()){
                $response = array('status'=>false, 'msg'=>$validator->errors()->all());

                return Response::json($response);
            }else{
                //set memory space
                ini_set('memory_limit','256M');

                //create date and miliseconds for image naming
                $dt = new \DateTime();
                $milliseconds = round(microtime(true) * 1000);

                //get all param
                $id = $request->get('txtId');
                $name = $request->get('txtName');
                $desc = $request->get('txtDesc');
                $imgName = 'f_service_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();
                $price_S = $request->get('txtPrice_S');
                $price_M = $request->get('txtPrice_M');
                $price_L = $request->get('txtPrice_L');
                $price_XL = $request->get('txtPrice_XL');
                $created_by = $request->get('txtCreatedby');

                try{
                    //get service by id
                    $selService = F_services::find($id);

                    //delete current image
                    unlink(base_path('/public/flux_asset/images/services/'.$selService->image));

                    $selService->name = $name;
                    $selService->image = $imgName;
                    $selService->description = $desc;
                    $selService->price_S = $price_S;
                    $selService->price_M = $price_M;
                    $selService->price_L = $price_L;
                    $selService->price_XL = $price_XL;
                    $selService->created_by = $created_by;

                    $selService->save();

                    $imgWatermark = Image::make(base_path().'/public/flux_asset/images/FluxGallery/slider/logo.png')->resize(130,30);

                    //move uploaded image to server
                    Image::make($request->file('image'))->resize(509,211)->insert($imgWatermark, 'bottom-right', 5, 5)->save(public_path('flux_asset/images/services/'.$imgName))->destroy();

                    $response = array('status'=>true, 'msg'=>'Success to update event/promo!');

                    return Response::json($response);

                }catch(\Exception $e){
                    DebugBar::addException($e);
                    $response = array('status'=>false, 'msg'=>'FAILED to update event/promo!');

                    return Response::json($response);
                }
            }
        }
    }


    //GET
    public function f_manageblogs(){
        $blogs = f_blog::all();
        return view('admin.flux.f_manageblogs', ['blogs' => $blogs]);
    }

    //POST
    /**
     * @param Request $request
     * @return $this
     */
    public function doaddblog(Request $request){
        if($request != null){
            $messages = [
                'txtTitle.required' => 'Title required!',
                'txtDesc.required' => 'Description required!',
                'image.required' => 'Image required!',
                'image.image' => 'Unsupported image format (jpeg, png, bmp, gif, or svg)!'
            ];

            $validator = Validator::make($request->all(), [
                'txtTitle' => 'required',
                'txtDesc' => 'required',
                'txtDate' => 'required',
                'txtCreatedby' => 'required',
                'image' => 'required|image'
            ], $messages);

            if($validator->fails()){
                return redirect('/f_blogs')->withInput()->withErrors($validator);
            }else{
                if(isset($_POST['btnAddBlog'])){
                    $this->dbInsertBlog($request);
                }else if(isset($_POST['btnUpdateBlog'])){
                    $this->dbUpdateBlog($request);
                }else{
                    echo "ERROR!!";
                }

                return redirect('/f_blogs');
            }
        }
    }

    private function dbInsertBlog(Request $request){
        ini_set('memory_limit','256M');

        //get all parameters
        $title = $request->get('txtTitle');
        $desc = $request->get('txtDesc');
        $date = $request->get('txtDate');
        $createdby = $request->get('txtCreatedby');

        $blog = new f_blog();

        $dt = new \DateTime();

        $milliseconds = round(microtime(true) * 1000);

        $imgName = 'f_blog_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

        $blog->title = $title;
        $blog->description = $desc;
        $blog->image = $imgName;
        $blog->date = $date;
        $blog->created_by = $createdby;

        $imgWatermark = Image::make(base_path().'/public/flux_asset/images/FluxGallery/slider/logo.png')->fit(160,60);

        Image::make($request->file('image'))->fit(1280,500)->insert($imgWatermark, 'bottom-right', 10, 10)->save(base_path().'/public/flux_asset/images/blog/'.$imgName)->destroy();

        $blog->save();
        //echo 'ASSGGJSDFVJGF';
    }

    private function dbUpdateBlog(Request $request){
        ini_set('memory_limit','256M');
        $dt = new \DateTime();
        $milliseconds = round(microtime(true) * 1000);

        //get all parameters
        $id = $request->get('txtId');
        $title = $request->get('txtTitle');
        $desc = $request->get('txtDesc');
        $date = $request->get('txtDate');
        $createdby = $request->get('txtCreatedby');
        $imgName = 'f_blog_'.$dt->format('Ymd').$milliseconds.'.'.$request->file('image')->getClientOriginalExtension();

        try {
            $selBlog = f_blog::find($id);

            $this->deleteBlogImageAndThumbnails($selBlog);

            $selBlog->title = $title;
            $selBlog->description = $desc;
            $selBlog->image = $imgName;
            $selBlog->date = $date;
            $selBlog->created_by = $createdby;

            $imgWatermark = Image::make(base_path().'/public/flux_asset/images/FluxGallery/slider/logo.png')->fit(160,60);
            Image::make($request->file('image'))->fit(1280,500)->insert($imgWatermark, 'bottom-right', 10, 10)->save(base_path().'/public/flux_asset/images/blog/'.$imgName)->destroy();

            DB::beginTransaction();
            $selBlog->save();
            DB::commit();
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    private function deleteBlogImageAndThumbnails(f_blog $selBlog){
        try{
            File::delete('flux_asset/images/blog/'.$selBlog->image);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    //POST
    public function dodeleteblog(Request $request, f_blog $blog){
        //echo 'url: '.url('/sbadmin/f_blog_images/'.$blog->image).'            , blog id: '.$blog->id.', image name: '.$blog->image;
        //unlink(url('/flux_asset/images/blog/'.$blog->image));
        unlink(base_path('/public/flux_asset/images/blog/'.$blog->image));
        $blog->delete();
        return redirect('/f_blogs');
    }



/*============= Flux Admin Page [END] ====================*/
}
