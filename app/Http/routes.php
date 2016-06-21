<?php



/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    //Routes for front end page [START]

    //landingpage
    Route::get('/', 'LandingPageController@index');

    //Subhaus
    Route::get('/subhaus', 'SubhausController@index');
    Route::post('/s_dosendemail', 'SubhausController@s_dosendemail');


    //Flux
    Route::get('/flux', 'FluxController@index');
    Route::get('/flux/blog', 'FluxController@blog');
    Route::get('/flux/contact', 'FluxController@contact');
    Route::get('/flux/about', 'FluxController@about');
    Route::get('/flux/services', 'FluxController@services');
    Route::get('/flux/blog/{blog}', 'FluxController@blogdetail');
    Route::get('/flux/products', 'FluxController@products');

    //Pitstop
    Route::get('/pitstop', 'PitstopController@index');

    //Monroe
    Route::get('/monroe', 'MonroeController@index');

    //Routes for front end page [END]


    /*==================================================================*/

    //Routes for admin page [START]

    Route::get('/m16admin', 'LoginController@index');
    Route::get('/main', 'MainController@index');

    //login and logout route
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
    Route::post('/doforgotpassword', 'LoginController@doforgotpassword');

    //Event Route
    Route::get('/newevent', 'MainController@newevent');
    Route::get('/editevent', 'MainController@editevent');
    Route::post('/doinsertevent', 'MainController@doinsertevent');
    Route::delete('/deleteevent/{event}', 'MainController@deleteevent');
    Route::post('/doeditevent', 'MainController@doeditevent');

    //Add instagram account[START]
    Route::get('/m16_instagram', 'MainController@m16_instagram');
    Route::post('/doAddInstagram', 'MainController@doAddInstagram');
    //Add instagram account[END]

    //Landing Page[START]

        //About Us
        Route::post('/addaboutus', 'LandingPageController@doaddaboutus');
        Route::delete('/aboutus/{about}', 'LandingPageController@dodeleteabout');
        Route::get('/aboutus', 'LandingPageController@aboutus');


    //Landing Page[END]

    //Subhaus Page [START]
        Route::get('/s_slider', 'SubhausController@s_slider');
        Route::post('/s_doaddslider', 'SubhausController@s_doaddslider');
        Route::delete('/s_slider/{slider}', 'SubhausController@s_doadeleteslider');
        Route::post('/s_doupdateslider', 'SubhausController@s_doupdateslider');

        Route::get('/s_about', 'SubhausController@s_about');
        Route::post('/s_doaddabout', 'SubhausController@s_doaddabout');
        Route::delete('/s_about/{about}', 'SubhausController@s_dodeleteabout');
        Route::post('/s_doupdateabout', 'SubhausController@s_doupdateabout');

        Route::get('/s_pricing', 'SubhausController@s_pricing');
        Route::post('/s_doaddpricing', 'SubhausController@s_doaddpricing');
        Route::delete('/s_pricing/{pricing}', 'SubhausController@s_dodeletepricing');
        Route::post('/s_doupdatepricing', 'SubhausController@s_doupdatepricing');

        Route::get('/s_featureddish', 'SubhausController@s_featureddish');
        Route::post('/s_doaddorupdatefeatureddish', 'SubhausController@s_doaddorupdatefeatureddish');
        Route::delete('/s_featureddish/{dish}', 'SubhausController@s_dodeletefeatureddish');
    //Subhaus Page [END]

    //Flux Page [START]

        //slider
        Route::get('/f_slider', 'FluxController@f_slider');
        Route::post('/f_doaddslider', 'FluxController@f_doaddslider');
        Route::delete('f_slider/{slider}', 'FluxController@f_dodeleteslider');
        Route::post('/f_doupdateslider', 'FluxController@f_doupdateslider');

        //blogs
        Route::get('/f_blogs', 'FluxController@f_manageblogs');
        Route::delete('f_blogs/{blog}', 'FluxController@dodeleteblog');
        Route::post('/doaddblog', 'FluxController@doaddblog');

        //promo & event
        Route::get('/f_promoevent', 'FluxController@f_promoevent');
        Route::post('/f_doaddeventpromo', 'FluxController@f_doaddeventpromo');
        Route::get('/f_geteventpromobyid', 'FluxController@f_geteventpromobyid');
        Route::post('/f_updateeventpromo', 'FluxController@f_doupdateeventpromo');

        //products
        Route::get('/f_products', 'FluxController@f_products');
        Route::delete('/f_products/{product}', 'FluxController@f_dodeleteproduct');
        Route::post('/f_doaddproduct', 'FluxController@f_doaddproduct');
        Route::post('/f_doupdateproduct', 'FluxController@f_doupdateproduct');

        //services
        Route::get('/f_services', 'FluxController@f_services');
        Route::delete('/f_services/{service}', 'FluxController@f_dodeleteservice');
        Route::post('/f_doaddservice', 'FluxController@f_doaddservice');
        Route::post('/f_doupdateservice', 'FluxController@f_doupdateservice');

    //Flux Page [END]

    //Add admin route
    Route::get('/manageadmin', 'MainController@manageadmin');
    Route::post('/doaddadmin', 'MainController@doaddadmin');

    //Delete admin
    Route::post('/dodeleteadmin', 'MainController@dodeleteadmin');

    //Update Admin
    Route::post('/doeditadmin', 'MainController@doeditadmin');

    //Routes for admin page [END]
});
