<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Subhaus</title>
        <link rel="stylesheet" href="{{ asset('subhaus_asset/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('subhaus_asset/css/main.css') }}" media="screen" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('subhaus_asset/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('subhaus_asset/css/style-portfolio.css') }}">
        <link rel="stylesheet" href="{{ asset('subhaus_asset/css/picto-foundry-food.css') }}" />
        <link rel="stylesheet" href="{{ asset('subhaus_asset/css/jquery-ui.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('subhaus_asset/css/font-awesome.min.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('subhaus_asset/favicon-1.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('pitstop_asset/css/jquery.vegas.css') }}" />
    </head>

    <body>
        <!--=== Preloader section starts ===-->
        <section id="preloader">
            <div class="loading-circle fa-spin"></div>
        </section>
        <!--=== Preloader section Ends ===-->

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="row">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        {{--<a class="navbar-brand" href="#">--}}
                            {{--Subhaus--}}
                        {{--</a>--}}
                        <div class="back-button">
                            <a class="btn-col" href="{{ url('/') }}">
									<span class="icon">
										<i class="fa fa-arrow-left"></i>
										<img src="{{ asset('pitstop_asset/images/m16Logo.png') }}">
									</span>
                            </a>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right ">
                            <li><a class="navactive color_animation" href="#slider_part">Welcome</a></li>
                            <li><a class="color_animation" href="#story">About</a></li>
                            <li><a class="color_animation" href="#pricing">Menu</a></li>
                            <li><a class="color_animation" href="#beer">Our Specials</a></li>
                            {{--<li><a class="color_animation" href="#bread">BREAD</a></li>--}}
                            {{--<li><a class="color_animation" href="#featured">FEATURED</a></li>--}}
                            {{--<li><a class="color_animation" href="#reservation">RESERVATION</a></li>--}}
                            <li><a class="color_animation" href="#contact">Contact</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>
         
        <!--<div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="top-title"> Restaurant</h2>
                    <h2 class="white second-title">" Best in the city "</h2>
                    <hr>
                </div>
            </div>
        </div>-->

        <!-- Slider start -->
        <section id="slider_part">
            <div class="carousel slide" id="subhaus-slider" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @for($i = 0 ; $i < count($sliders) ; $i++)
                        <li data-target="#subhaus-slider" data-slide-to="{{$i}}" {{$i == 0 ? 'class=active' : ''}}></li>
                    @endfor
                </ol>

                <div class="carousel-inner" role="listbox">
                    <!-- M16 District [START] -->
                    @if(is_array($sliders) || is_object($sliders))
                        @foreach($sliders as $key=>$slider)
                            <div class="item {{$key == 0 ? 'active' : ''}}">
                                <div class="overlay-slide">
                                    <img src="{{ asset('subhaus_asset/images/slider/'.$slider->image) }}" style="height: 100%;width: 100%"  alt="" class="img-responsive">
                                </div>
                                <div class="carousel-caption">
                                    <div class="col-md-12 col-xs-12 text-center">
                                        <img src="{{ asset('subhaus_asset/images/slider/'.$slider->image2) }}" style="width: 300px;height: 300px;border: hidden" alt="..." />
                                        <br/>
                                        @if($slider->heading != '')
                                            <h1 class="animated2" style="border: 1px solid {{$slider->headingColor}};color: {{$slider->headingColor}}">{{$slider->heading}}</h1>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div> 	 <!-- End Carousel Inner -->

                <!-- Controls -->
                <div class="slides-control ">
                    <a class="left carousel-control" role="button" href="#subhaus-slider" data-slide="prev">
                        <span><i class="fa fa-chevron-circle-left fa-3x"></i></span>
                    </a>
                    <a class="right carousel-control" role="button" href="#subhaus-slider" data-slide="next">
                        <span><i class="fa fa-chevron-circle-right fa-3x"></i></span>
                    </a>
                </div>
            </div>
        </section>
        <!--/ Slider end -->

        <!-- ============ About Us ============= -->

        <section id="story" class="description_content">
            <div class="text-content container">
                <div class="col-md-6">
                    <h1>About us</h1>
                    <div class="fa fa-cutlery fa-2x"></div>
                @if(is_array($abouts) || is_object($abouts))
                    @foreach($abouts as $about)
                    <p class="desc-text">{{$about->about}}</p>
                </div>
                <div class="col-md-6">
                    <div class="img-section">
                       <img src="{{ asset('subhaus_asset/images/about/'.$about->image1) }}" width="250" height="220">
                       <img src="{{ asset('subhaus_asset/images/about/'.$about->image2) }}" width="250" height="220">
                       <div class="img-section-space"></div>
                       <img src="{{ asset('subhaus_asset/images/about/'.$about->image3) }}"  width="250" height="220">
                       <img src="{{ asset('subhaus_asset/images/about/'.$about->image4) }}"  width="250" height="220">
                   </div>
                </div>
                    @endforeach
                @endif
            </div>
        </section>


       <!-- ============ Pricing  ============= -->


        <section id ="pricing" class="description_content">
             <div class="pricing background_content">
                <h1><span>Our</span> Menu</h1>
             </div>
            <div class="text-content container"> 
                <div class="container">
                    <div class="row">
                        <div id="w">
                            <ul id="filter-list" class="clearfix">
                                <li class="filter" data-filter="all">All</li>
                                <li class="filter" data-filter="food">Food</li>
                                <li class="filter" data-filter="beverages">Beverages</li>
                            </ul><!-- @end #filter-list -->    
                            <ul id="portfolio">
                                @if(is_array($pricings) || is_object($pricings))
                                    @foreach($pricings as $pricing)
                                        <li class="item {{$pricing->category}}">
                                            <div class="overlay-item">
                                                <h2 class="overlay-content">{{$pricing->name}}</h2>
                                                <h2 class="overlay-content">IDR {{$pricing->price}}K</h2>
                                            </div>
                                            <img src="{{ asset('subhaus_asset/images/pricing/'.$pricing->image) }}"  alt="Food" >
                                            {{--<h2 class="white">1540</h2>--}}
                                        </li>
                                    @endforeach
                                @endif
                                {{--<li class="item food">--}}
                                    {{--<div class="overlay-item">--}}
                                        {{--<h2 class="overlay-content">asd</h2>--}}
                                        {{--<h2 class="overlay-content">IDR 30K</h2>--}}
                                    {{--</div>--}}
                                    {{--<img src="{{ asset('subhaus_asset/images/SubhausGallery/IMG_1573.JPG') }}" height="210" alt="Food" >--}}
                                    {{--<h2 class="white">1573G</h2>--}}
                                {{--</li>--}}
                            </ul><!-- @end #portfolio -->
                        </div><!-- @end #w -->
                    </div>
                </div>
            </div>  
        </section>


        <!-- ============ Featured food 1  ============= -->


        <section id ="beer" class="description_content">
			@if(is_array($foods1) || is_object($foods1))
				@foreach($foods1 as $food1)
					<div  class="beer background_content">
						<h1><span>{{ $food1->heading1 }}</span></h1>
					</div>
					<div class="text-content container"> 
						<div class="col-md-5">
						   <div class="img-section">
							   <img src="{{ asset('subhaus_asset/images/featured_dishes/'.$food1->image1) }}" width="100%"/>
						   </div>
						</div>
						<br>
						<div class="col-md-6 col-md-offset-1">
							<h1>{{ $food1->heading2 }}</h1>
							<div class="icon-beer fa-2x"></div>
							<p class="desc-text">{{ $food1->description }}</p>
						</div>
					</div>
				@endforeach
			@endif
        </section>


       <!-- ============ Featured food 2  ============= -->


        <section id="bread" class=" description_content">
            @if(is_array($foods2) || is_object($foods2))
                @foreach($foods2 as $food2)
                    <div  class="bread background_content">
                        <h1><span>{{ $food2->heading1 }}</span></h1>
                    </div>
                    <div class="text-content container">
                        <div class="col-md-6">
                            <h1>{{ $food2->heading2 }}</h1>
                            <div class="icon-bread fa-2x"></div>
                            <p class="desc-text">{{  $food2->description }}</p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('subhaus_asset/images/featured_dishes/'.$food2->image1) }}" alt="Bread">
                            <img src="{{ asset('subhaus_asset/images/featured_dishes/'.$food2->image2) }}" alt="Bread"> {{--width="260"--}}
                        </div>
                    </div>
                @endforeach
            @endif
        </section>


        
        <!-- ============ Featured Dish  ============= -->

        <section id="featured" class="description_content">
            @if(is_array($drinks) || is_object($drinks))
                @foreach($drinks as $drink)
                    <div  class="featured background_content">
                        <h1><span>{{$drink->heading1}}</span></h1>
                    </div>
                    <div class="text-content container">
                        <div class="col-md-6">
                            <h1>{{$drink->heading2}}</h1>
                            <div class="icon-hotdog fa-2x"></div>
                            <p class="desc-text">{{$drink->description}}</p>
                        </div>
                        <div class="col-md-6">
                            <ul class="image_box_story2">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img src="{{ asset('subhaus_asset/images/featured_dishes/'.$drink->image1) }}"  alt="...">
                                            <div class="carousel-caption">

                                            </div>
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('subhaus_asset/images/featured_dishes/'.$drink->image2) }}"  alt="...">
                                            <div class="carousel-caption">

                                            </div>
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('subhaus_asset/images/featured_dishes/'.$drink->image3) }}"  alt="...">{{--style="width: 500px;height: 300px;"--}}
                                            <div class="carousel-caption">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>

        <!-- ============ Reservation  ============= -->

        {{--<section  id="reservation"  class="description_content">
            <div class="featured background_content">
                <h1>Reserve a Table!</h1>
            </div>
            <div class="text-content container"> 
                <div class="inner contact">
                    <!-- Form Area -->
                    <div class="contact-form">
                        <!-- Form -->
                        <form id="contact-us" method="post" action="reserve.php">
                            <!-- Left Inputs -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-md-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-xs-6">
                                                <!-- Name -->
                                                <input type="text" name="first_name" id="first_name" required="required" class="form" placeholder="First Name" />
                                                <input type="text" name="last_name" id="last_name" required="required" class="form" placeholder="Last Name" />
                                                <input type="text" name="state" id="state" required="required" class="form" placeholder="State" />
                                                <input type="text" name="datepicker" id="datepicker" required="required" class="form" placeholder="Reservation Date" />
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-xs-6">
                                                <!-- Name -->
                                                <input type="text" name="phone" id="phone" required="required" class="form" placeholder="Phone" />
                                                <input type="text" name="guest" id="guest" required="required" class="form" placeholder="Guest Number" />
                                                <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                                                <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                                            </div>

                                            <div class="col-xs-6 ">
                                                <!-- Send Button -->
                                                <button type="submit" id="submit" name="submit" class="text-center form-btn form-btn">Reserve</button> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 col-xs-12">
                                        <!-- Message -->
                                        <div class="right-text">
                                            <h2>Hours</h2><hr>
                                            <p>Monday to Friday: 7:30 AM - 11:30 AM</p>
                                            <p>Saturday & Sunday: 8:00 AM - 9:00 AM</p>
                                            <p>Monday to Friday: 12:00 PM - 5:00 PM</p>
                                            <p>Monday to Saturday: 6:00 PM - 1:00 AM</p>
                                            <p>Sunday to Monday: 5:30 PM - 12:00 AM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Clear -->
                            <div class="clear"></div>
                        </form>
                    </div><!-- End Contact Form Area -->
                </div><!-- End Inner -->
            </div>
        </section>--}}


        <!-- ============ Subhaus IG Section  ============= -->
        <section class="description_content">
            <div class="featured background_content">
                <h1>Follow Us On Instagram <span><a href="https://www.instagram.com/subhaus.bintaro/" style="color: white"><i class="fa fa-instagram"></i></a></span></h1>
            </div>
            <br>
            <div class="col-sm-12 col-md-12">
                <!-- SnapWidget -->
                <script src="http://snapwidget.com/js/snapwidget.js"></script>
                <iframe src="http://snapwidget.com/bd/?h=c3ViaGF1c3xpbnwyMDB8M3wyfHx5ZXN8MjB8bm9uZXxvblN0YXJ0fHllc3x5ZXM=&ve=250216" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>
            </div>
        </section>


        <!-- ============ Contact Section  ============= -->

        <section id="contact">
            <div class="map">
                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.664063989472!2d91.8316103150038!3d24.909437984030877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37505558dd0be6a1%3A0x65c7e47c94b6dc45!2sTechnext!5e0!3m2!1sen!2sbd!4v1444461079802" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8537289079104!2d106.71108281517294!3d-6.282951463250014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69faa297972ad7%3A0xa1980a9bf9be5cef!2sSUBHAUS!5e0!3m2!1sen!2sid!4v1455852049541" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner contact">
                            <!-- Form Area -->
                            <div class="contact-form">
                                <!-- Form -->
<!--                                <form id="contact-us" method="post" action="contact.php">-->
                                {!! Form::open(array('id'=>'contact-us', 'method'=>'post', 'url'=>'/s_dosendemail')) !!}
                                    <!-- Left Inputs -->
                                    <div class="col-md-6 ">
                                        <!-- Name -->
                                        <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                                        <!-- Email -->
                                        <input type="email" name="email" id="email" required="required" class="form" placeholder="Email" />
                                        <!-- Subject -->
                                        <input type="text" name="subject" id="subject" required="required" class="form" placeholder="Subject" />
                                    </div><!-- End Left Inputs -->
                                    <!-- Right Inputs -->
                                    <div class="col-md-6">
                                        <!-- Message -->
                                        <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                                    </div><!-- End Right Inputs -->
                                    <!-- Bottom Submit -->
                                    <div class="relative fullwidth col-xs-12">
                                        <!-- Send Button -->
                                        <button type="submit" id="submit" name="submit" class="form-btn">Send Message</button> 
                                    </div><!-- End Bottom Submit -->
                                    <!-- Clear -->
                                    <div class="clear"></div>
<!--                                </form>-->
                                {!! Form::close() !!}
                            </div><!-- End Contact Form Area -->
                        </div><!-- End Inner -->
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ Social Section  ============= -->

        {{--<section class="social_connect">--}}
            {{--<div class="text-content container">--}}
                {{--<div class="col-md-6">--}}
                    {{--<span class="social_heading">FOLLOW</span>--}}
                    {{--<ul class="social_icons">--}}
                        {{--<li><a class="icon-twitter color_animation" href="#" target="_blank"></a></li>--}}
                        {{--<li><a class="icon-github color_animation" href="#" target="_blank"></a></li>--}}
                        {{--<li><a class="icon-linkedin color_animation" href="#" target="_blank"></a></li>--}}
                        {{--<li><a class="icon-mail color_animation" href="#"></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<span class="social_heading">OR DIAL</span>--}}
                    {{--<span class="social_info"><a class="color_animation" href="tel:883-335-6524">(941) 883-335-6524</a></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}

        <!-- ============ Footer Section  ============= -->

        <footer class="sub_footer">
            <div class="footer-top">
                <div class="container">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        {{--<p class="sub-footer-text text-center">Back to <a href="#slider_part">TOP</a></p>--}}
                        <h3 class="menu_head text-center">Contact</h3>
                        <div class="footer_menu_contact">
                            <ul>
                                <li> <i class="fa fa-home"></i>
                                    <span> JL. Maleo Raya Bintaro Sektor 9 </span></li>
                                <li><i class="fa fa-globe"></i>
                                    <span> info@mail.com</span></li>
                                <li><i class="fa fa-phone"></i>
                                    <span> +880-12345678</span></li>
                                {{--<li><i class="fa fa-map-marker"></i>--}}
                                    {{--<span> JL. Maleo Raya Blok JC 1 No 16 Bintaro Sektor 9</span></li>--}}
                                <li> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        {{--<p class="sub-footer-text text-center">Built With Care By <a href="#" target="_blank">Us</a></p>--}}
                        <h3 class="menu_head text-center"><span style="color: #FFFFFF"><i class="fa fa-instagram"></i></span></h3>
                        <!-- SnapWidget -->
                        <script src="http://snapwidget.com/js/snapwidget.js"></script>
                        <iframe src="http://snapwidget.com/in/?h=c3ViaGF1c3xpbnwxMDB8MnwyfHx5ZXN8MHxub25lfG9uU3RhcnR8eWVzfHllcw==&ve=310316" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        {{--<p class="sub-footer-text text-center">&copy; Copyright 2016, Theme by <a href="#">Telematics Research Group</a></p>--}}
                        <h3 class="menu_head text-center">Member Of</h3>
                        <a href="{{ url('/') }}"><img src="{{ asset('landingpage_asset/images/_m16Logo.png') }}" style="width: 100%;"></a>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <a href="{{ url('/monroe') }}"><img src="{{ asset('landingpage_asset/images/_monroeLogo.png') }}" style="max-width: 100%;max-height: 100%"></a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <a href="{{ url('/subhaus') }}"><img src="{{ asset('landingpage_asset/images/_subhausLogo.png') }}" style="max-width: 100%;max-height: 100%"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <a href="{{ url('/flux') }}"><img src="{{ asset('landingpage_asset/images/_fluxLogo.png') }}" style="max-width: 100%;max-height: 100%"></a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <a href="{{ url('/pitstop') }}"><img src="{{ asset('landingpage_asset/images/_pitstopLogo.png') }}" style="max-width: 100%;max-height: 100%"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer_b">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <p class="text-block" style="color: #FFFFFF"> &copy; 2016 by <span style="color: #985f0d">Global Resource Solusindo </span></p>
                        </div>
                    </div>
            </div>
        </footer>


        <script type="text/javascript" src="{{ asset('subhaus_asset/js/jquery-1.10.2.min.js') }}"> </script>
        <script type="text/javascript" src="{{ asset('subhaus_asset/js/bootstrap.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('subhaus_asset/js/jquery-1.10.2.js') }}"></script>
        <script type="text/javascript" src="{{ asset('subhaus_asset/js/jquery.mixitup.min.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('subhaus_asset/js/main.js') }}" ></script>
        <script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.vegas.min.js') }}"></script>
    </body>
</html>