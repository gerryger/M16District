<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <title>Subhaus</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/linea-icon.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/fancy-buttons.css') }}" />

    <!--=== Google Fonts ===-->
    <link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--=== Other CSS files ===-->
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/jquery.vegas.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/jquery.bxslider.css') }}" />

    <!--=== Main Stylesheets ===-->
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('pitstop_asset/css/_pitstop.css') }}" />

    <!--=== Color Scheme, three colors are available red.css, orange.css and gray.css ===-->
    <link rel="stylesheet" id="scheme-source" href="{{ asset('pitstop_asset/css/_pitstop.css') }}" />

    <!--=== Internet explorer fix ===-->
    <!-- [if lt IE 9]>
    <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->


    <!--=== Subhaus Asset [START] ===-->
    <link rel="stylesheet" href="{{ asset('subhaus_asset/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('subhaus_asset/css/main.css') }}" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('subhaus_asset/css/style-portfolio.css') }}">
    <link rel="stylesheet" href="{{ asset('subhaus_asset/css/picto-foundry-food.css') }}" />
    <link rel="stylesheet" href="{{ asset('subhaus_asset/css/jquery-ui.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('subhaus_asset/favicon-1.ico') }}" type="image/x-icon">
    <!--=== Subhaus Asset [END] ===-->


</head>
<body>
<!--=== Preloader section starts ===-->
<section id="preloader">
    <div class="loading-circle fa-spin"></div>
</section>
<!--=== Preloader section Ends ===-->

<!--=== Header section Starts ===-->
<div id="header" class="header-section">
    <!-- sticky-bar Starts-->
    <div class="sticky-bar-wrap">
        <div class="sticky-section">
            <div id="topbar-hold" class="nav-hold container">
                <nav class="navbar" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--=== Site Name ===-->
                        <div class="back-button">
                            <a class="btn-col" href="{{ url('/') }}">
									<span class="icon">
										<i class="fa fa-arrow-left"></i>
										<img src="{{ asset('pitstop_asset/images/_m16logo-s.png') }}">
									</span>
                            </a>
                        </div>
                    </div>

                    <!-- Main Navigation menu Starts -->
                    <div class="collapse navbar-collapse navbar-responsive-collapse">
                        {{--<ul class="nav navbar-nav main-nav  clear navbar-right ">--}}
                            {{--<li><a class="navactive color_animation" href="#slider_part">WELCOME</a></li>--}}
                            {{--<li><a class="color_animation" href="#story">ABOUT</a></li>--}}
                            {{--<li><a class="color_animation" href="#pricing">PRICING</a></li>--}}
                            {{--<li><a class="color_animation" href="#beer">BEER</a></li>--}}
                            {{--<li><a class="color_animation" href="#bread">BREAD</a></li>--}}
                            {{--<li><a class="color_animation" href="#featured">FEATURED</a></li>--}}
                            {{--<li><a class="color_animation" href="#reservation">RESERVATION</a></li>--}}
                            {{--<li><a class="color_animation" href="#contact">CONTACT</a></li>--}}
                        {{--</ul>--}}
                    </div>
                    <!-- Main Navigation menu ends-->
                </nav>
            </div>
        </div>
    </div>
    <!-- sticky-bar Ends-->
    <!--=== Header section Ends ===-->

    <!--=== Home Section Starts ===-->
    <div id="section-home" class="home-section-wrap center">
        <div class="container">
            <div class="row main-container">

                <!-- Slider start -->
                <section id="slider_part">
                    <div class="carousel slide" id="subhaus-slider" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#subhaus-slider" data-slide-to="0" class="active"></li>
                            <li data-target="#subhaus-slider" data-slide-to="1"></li>
                            <li data-target="#subhaus-slider" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <!-- M16 District [START] -->
                            <div class="item active">
                                <div class="overlay-slide">
                                    <img src="{{ asset('IMG_1152.png') }}" style="height: 100%;width: 100%"  alt="" class="img-responsive">
                                </div>
                                <div class="carousel-caption">
                                    <div class="col-md-12 col-xs-12 text-center">
                                        <img src="{{ asset('subhaus_asset/images/subhaus_logo.png') }}" style="width: 300px;height: 300px;border: hidden" alt="..." />
                                        <br/>
                                        <h1 class="animated2">dgdfg</h1>
                                    </div>
                                </div>
                            </div>
                            <!-- M16 District [END] -->

                            <!-- Subhaus [START] -->
                            <div class="item">
                                <div class="overlay-slide">
                                    <img src="{{ asset('subhaus_asset/images/SubhausGallery/IMG_1465.JPG') }}" style="height: 100%;width: 100%"  alt="" class="img-responsive">
                                </div>
                                <div class="carousel-caption">
                                    <div class="col-md-12 col-xs-12 text-center">
                                        <img src="{{ asset('subhaus_asset/images/subhaus_logo.png') }}" style="width: 300px;height: 300px;border: hidden" alt="..." />
                                        <br/>
                                        <h1 class="animated3">asd</h1>
                                    </div>
                                </div>
                            </div>
                            <!-- Subhaus [END] -->

                            <!-- Monroe [START] -->
                            <div class="item">
                                <div class="overlay-slide">
                                    <img src="{{ asset('subhaus_asset/images/SubhausGallery/IMG_1573.JPG') }}" style="height: 100%;width: 100%" alt="" class="img-responsive">
                                </div>
                                <div class="carousel-caption">
                                    <div class="col-md-12 col-xs-12 text-center">
                                        <img src="{{ asset('subhaus_asset/images/subhaus_logo.png') }}" style="width: 300px;height: 300px;border: hidden" alt="..." />
                                        <br/>
                                        <h1 class="animated3">def</h1>
                                    </div>
                                </div>
                            </div>
                            <!-- Monroe [START] -->
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

            </div>
        </div>
    </div>
    <!--=== Home Section Ends ===-->
</div>

<!--=== events section Starts ===-->
<section id="section-events" class="events-wrap">
    <div class="container events center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Events</h1>
            </div>
        </div>
    </div>
</section>
<!--=== events section Ends ===-->

<!--=== location section Starts ===-->
<section id="section-location" class="location-wrap">
    <div class="container location center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Location</h1>
            </div>
        </div>
    </div>
</section>
<!--=== location section Ends ===-->

<!--=== Footer section Starts ===-->
<div id="section-footer" class="footer-wrap">
    <div class="container footer center">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="footer-title"><!-- Footer Title -->
                    <a class="site-name"><img src="{{ asset('pitstop_asset/images/_m16logo-s.png') }}"></a>
                </h4>

                <!-- Social Links -->
                <div class="social-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    </ul>
                </div>

                <p class="copyright">All rights reserved &copy; 2016</p>
            </div>
        </div>
    </div>
</div>
<!--=== Footer section Ends ===-->

<!--==== Js files ====-->
<!--==== Essential files ====-->
<script type="text/javascript" src="{{ asset('pitstop_asset/images/_m16logo-s.png') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.easing.1.3.js') }}"></script>

<!--==== Slider and Card style plugin ====-->
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.baraja.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.vegas.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.bxslider.min.js') }}"></script>

<!--==== MailChimp Widget plugin ====-->
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.ajaxchimp.min.js') }}"></script>

<!--==== Scroll and navigation plugins ====-->
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.fitvids.js') }}"></script>

<!--==== Custom Script files ====-->
<script type="text/javascript" src="{{ asset('pitstop_asset/js/_pitstop.js') }}"></script>


<!--=== Subhaus Asset [START] ===-->
<script type="text/javascript" src="{{ asset('subhaus_asset/js/jquery-1.10.2.min.js') }}"> </script>
<script type="text/javascript" src="{{ asset('subhaus_asset/js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ asset('subhaus_asset/js/jquery.mixitup.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('subhaus_asset/js/main.js') }}" ></script>
<!--=== Subhaus Asset [END] ===-->

</body>
</html>