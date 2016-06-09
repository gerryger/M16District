<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>M16 District - Home</title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/bootstrap.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/font-awesome.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/linea-icon.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/fancy-buttons.css') }}" />
	
	<!--=== Google Fonts ===-->
	<link href='http://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:600,400,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<!--=== Other CSS files ===-->
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/animate.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/jquery.vegas.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/jquery.bxslider.css') }}" />
	
	<!--=== Main Stylesheets ===-->
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/responsive.css') }}" />
	
	<!--=== Color Scheme, three colors are available red.css, orange.css and gray.css ===-->
	<link rel="stylesheet" id="scheme-source" href="{{ asset('landingpage_asset/css/schemes/gray.css') }}" />

	<!--=== Fullpage js ===-->
	<link rel="stylesheet" href="{{ asset('landingpage_asset/js/bower_components/fullpage.js/dist/jquery.fullpage.min.css') }}" />
	<script type="text/javascript" src="{{ asset('landingpage_asset/js/bower_components/fullpage.js/dist/jquery.fullpage.min.js') }}"></script>
	{{--<script type="text/javascript" src="{{ asset('landingpage_asset/js/bower_components/fullpage.js/vendors/jquery.easings.min.js') }}"></script>--}}

	<!--=== lightbox ===-->
	<link rel="stylesheet" href="{{ asset('landingpage_asset/bower_components/lightbox2/dist/css/lightbox.min.css') }}" />

	<!--=== Internet explorer fix ===-->
	<!-- [if lt IE 9]>
		<script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif] -->

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
						</div>
						
						<!-- Main Navigation menu Starts -->
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="current"><a href="#header">M16</a></li>
								<li><a href="#section-aboutus">About Us</a></li>	
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

		<div id="fullPage">

		<!--=== Home Section Starts ===-->
		<div id="section-home" class="home-section-wrap center section">
			{{--<div class="section-overlay"></div>--}}
			<div class="container home">
				<div class="row">
					<h1 class="well-come"><img src="{{ asset('landingpage_asset/images/_m16logo.png') }}"></h1>
					
					<div class="col-md-12">
						<p class="intro-message">
							One Stop Entertainment, <i>where all your needs will be fulfilled</i>
						</p>
						
						<div class="col-md-12">					
							<a href="{{ url('/subhaus') }}">
								<img src="{{ asset('landingpage_asset/images/_subhausLogo.png') }}">
							</a>
							<a href="{{ url('/flux') }}">
								<img src="{{ asset('landingpage_asset/images/_fluxLogo.png') }}">
							</a>		
							<a href="#">		
								<img src="{{ asset('landingpage_asset/images/_monroeLogo.png') }}">
							</a>
							<br><br>
							<a href="{{ url('/pitstop') }}">
								<img src="{{ asset('landingpage_asset/images/_pitstopLogo.png') }}">
							</a>
							
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--=== Home Section Ends ===-->
	</div>

	<div class="spaceBetweenSect"></div>
	<div class="spaceBetweenSect"></div>

	<!--=== aboutus section Starts ===-->
	<div id="section-aboutus" class="aboutus-wrap section">
		<div class="container aboutus center">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h1>About Us</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lorem elit, aliquet quis tempor a,
						eleifend eu erat. Cras condimentum mattis lectus, id bibendum dui.
						Donec sit amet euismod nibh. Morbi mattis ut est vel dictum.
						Fusce suscipit ut velit eget luctus. Nullam leo elit, mattis et tristique ac, pulvinar non massa.
						Sed accumsan sed ante sed dapibus.
						Donec at tellus in dolor fermentum finibus elementum sit amet orci.
						Curabitur imperdiet facilisis posuere. Vivamus malesuada tortor ut tellus tempus tincidunt. </p>

					<div class="row">
						<div class="col-sm-3 ">
							<a class="lightbox-image-link" href="{{ asset('landingpage_asset/images/client_1.jpg') }}" data-lightbox="lightbox-image-set">
								<img src="{{ asset('landingpage_asset/images/client_1.jpg') }}" class="lightbox-image" alt="image-1" />
							</a>
						</div>

						<div class="col-sm-3 ">
							<a class="lightbox-image-link" href="{{ asset('landingpage_asset/images/client_2.jpg') }}" data-lightbox="lightbox-image-set">
								<img src="{{ asset('landingpage_asset/images/client_2.jpg') }}" class="lightbox-image" alt="image-2" />
							</a>
						</div>

						<div class="col-sm-3 imageBox">
							asd
						</div>

						<div class="col-sm-3 imageBox">
							asd
						</div>
					</div>
					<br/>
					@if(is_array($abouts) || is_object($abouts))
						@foreach($abouts as $about)
							{{--<p style="font-family: '{{$about->fontfamily}}'; color: {{$about->color}}; font-size: {{$about->fontsize}}">--}}
								{{--{{ $about->about }}--}}
							{{--</p>--}}

							<div class="social-icons">
								<ul>
									<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
									@if($about->instagram != null || $about->instagram != '')
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									@endif
								</ul>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--=== aboutus section Ends ===-->

	<div class="spaceBetweenSect"></div>
		
	<!--=== events section Starts ===-->

	<!--=== events section Ends ===-->

	<div class="spaceBetweenSect text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<h1>Our Location</h1>
				</div>
			</div>
		</div>
	</div>

	<!--=== location section Starts ===-->
	<section id="section-location" class="section">
		{{--<div class="container location center">--}}
			{{--<div class="row">--}}
				{{--<div class="col-lg-12">--}}
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8537289079104!2d106.71108281517294!3d-6.282951463250014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69faa297972ad7%3A0xa1980a9bf9be5cef!2sSUBHAUS!5e0!3m2!1sen!2sid!4v1455852049541" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	</section>
	<!--=== location section Ends ===-->
		
	<!--=== Footer section Starts ===-->
	<div id="section-footer" class="footer-wrap section">
		<div class="container footer center">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="footer-title"><!-- Footer Title -->
						<a class="site-name" href="#"><img src="{{ asset('landingpage_asset/images/_m16logo-s.png') }}"></a>
					</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center footer-content">
					<ul>
						<li><i class="fa fa-home"><span> 12 Segun Bagicha, 10th Floor </span></i> </li>
						<li><i class="fa fa-phone"><span>  +880-12345678</span></i> </li>
						<li><i class="fa fa-envelope"><span>  tes@m16district.com</span></i> </li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
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

	</div><!--=== fullPage Ends ===-->


	
<!--==== Js files ====-->
<!--==== Essential files ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.easing.1.3.js') }}"></script>

<!--==== Slider and Card style plugin ====-->
{{--<script type="text/javascript" src="js/jquery.baraja.js"></script>--}}
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.vegas.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.bxslider.min.js') }}"></script>

<!--==== MailChimp Widget plugin ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.ajaxchimp.min.js') }}"></script>

<!--==== Scroll and navigation plugins ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.fitvids.js') }}"></script>

<!--==== Lightbox ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/bower_components/lightbox2/dist/js/lightbox.min.js') }}"></script>

<!--==== Custom Script files ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/custom.js') }}"></script>

<script type="text/javascript">

</script>

</body>
</html>