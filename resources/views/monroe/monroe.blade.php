<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>M16 District - Home</title>
	
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
	<link rel="stylesheet" href="{{ asset('monroe_asset/monroe-engine-slider1/style.css') }}" />
	
	<!--=== Main Stylesheets ===-->
	<link rel="stylesheet" href="{{ asset('pitstop_asset/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('pitstop_asset/css/responsive.css') }}" />
	<link rel="stylesheet" href="{{ asset('monroe_asset/css/_monroe.css') }}" />
	
	<!--=== Color Scheme, three colors are available red.css, orange.css and gray.css ===-->
	<link rel="stylesheet" href="{{ asset('monroe_asset/css/schemes/gray.css') }}" />

	<!-- Wow Slider Script-->
	<link rel="stylesheet" href="{{ asset('monroe_asset/monroe-engine-slider1/jquery.js') }}" />
	
	<!--=== Internet explorer fix ===-->
	<!-- [if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif] -->
		
</head>
<body class="monroe-bg">
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
										<img src="{{ asset('pitstop_asset/images/m16logo.png') }}">
									</span>
								</a>
							</div>
						</div>
						
						<!-- Main Navigation menu Starts -->
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="current"><a href="#section-home">Monroe</a></li>	
								<li><a href="#section-events">What's On!</a></li>
								<li><a href="#section-location">Location</a></li>
							</ul>
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
			<div class="container home">
				<div class="row main-container">
					<div class="monroe-main">
						<div class="row monroe-logo">
							<div class="col-md-12 center">
								<img src="{{asset('monroe_asset/images/_monroePageLogo.png')}}">
							</div>
						</div>

						<div class="row">
						<div class="col-md-8 col-md-offset-2 monroe-about center">
						<p class="monroe-about-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="col-sm-9 col-md-9">						
									<div id="wowslider-container1">
									<div class="ws_images"><ul>
											<li><img src="{{asset('monroe_asset/monroe-engine-slider1/images/slide1.jpg')}}" alt="slide1" title="slide1" id="wows1_0"/></li>
											<li><img src="{{asset('monroe_asset/monroe-engine-slider1/images/slide2.jpg')}}" alt="slide2" title="slide2" id="wows1_1"/></li>
											<li><img src="{{asset('monroe_asset/monroe-engine-slider1/images/slide3.jpg')}}" alt="slide3" title="slide3" id="wows1_2"/></li>
											<li><img src="{{asset('monroe_asset/monroe-engine-slider1/images/slide4.jpg')}}" alt="slide4" title="slide4" id="wows1_3"/></li>
										</ul></div>
									</div>	
								</div>
								<div class="col-sm-3 col-md-3">
									<h5><b>Opening Time</b></h5>
									<br>
									<p><b>Sunday</b></p>
									<p>10.00 AM - 5.00 PM</p>
									<br>
									<p><b>Monday&nbsp-&nbspSaturday</b></p>
									<p>9.00 AM - 9.00 PM</p>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 barber-grid">
								<div class="col-md-6 barber-img">

								</div>
								<div class="col-md-6 barber-price left">
									<h5> <b>Our Services</b></h5>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 shop-grid">
								<div class="col-md-6 shop-price left">
									<h5> <b>Our Products</b></h5>
								</div>
								<div class="col-md-6 shop-img">
								
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 monroe-desc">
								<div class="col-md-3">
									<h5><b>Monroe</b></h5>
									<h6>Berberia</h6>		
								</div>
								<div class="col-md-3">
									<img src="{{asset('monroe_asset/images/barber-lamp.jpg')}}"/>
								</div>
								<div class="col-md-3">
									<h5><b>Visit Us</b></h5>
								</div>
								<div class="col-md-3">
									<img src="{{asset('monroe_asset/images/scissors-combscrop.jpg')}}"/>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12 contact-grid">
								<div class="col-md-6 contact-desc left">
									<h5> <b>Contact Us</b></h5>
								</div>
								<div class="col-md-6 contact-img">
								
								</div>
							</div>
						</div>

					</div>
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
	</div>
		
	<!--=== Footer section Starts ===-->
	<div id="section-footer" class="footer-wrap">
		<div class="container footer center">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="footer-title"><!-- Footer Title -->
						<a class="site-name"><img src="{{ asset('pitstop_asset/images/m16logo.png') }}"></a>
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
<script type="text/javascript" src="{{ asset('monroe_asset/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/modernizr.js') }}"></script>
		<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.easing.1.3.js') }}"></script>

<!--==== Slider and Card style plugin ====-->
{{--<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.baraja.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.vegas.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.bxslider.min.js') }}"></script>

<!--==== MailChimp Widget plugin ====-->
{{--<script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>--}}

<!--==== Scroll and navigation plugins ====-->
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.fitvids.js') }}"></script>

<!--==== Custom Script files ====-->
<script type="text/javascript" src="{{ asset('monroe_asset/js/_monroe.js') }}"></script>
<script type="text/javascript" src="{{ asset('monroe_asset/monroe-engine-slider1/wowslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('monroe_asset/monroe-engine-slider1/script.js') }}"></script>

</body>
</html>