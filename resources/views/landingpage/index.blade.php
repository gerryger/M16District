<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>M16 - landing page</title>
	
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
	{{--<link rel="stylesheet" href="{{ asset('landingpage_asset/css/jquery.vegas.css') }}" />--}}
	<link rel="stylesheet" href="{{ asset('landingpage_asset/js/vegas/vegas.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/baraja.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/jquery.bxslider.css') }}" />
	
	<!--=== Main Stylesheets ===-->
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('landingpage_asset/css/responsive.css') }}" />
	
	<!--=== Color Scheme, three colors are available red.css, orange.css and gray.css ===-->
	<link rel="stylesheet" id="scheme-source" href="{{ asset('landingpage_asset/css/schemes/gray.css') }}" />


	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

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
								<li><a href="#section-home">Home</a></li>
								<li><a href="#section-subhaus">Subhaus</a></li>
								<li><a href="#section-pitstop">Pitstop</a></li>
								<li><a href="#section-flux">Flux</a></li>
								<li><a href="#section-monroe">Monroe</a></li>
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
			<div class="section-overlay"></div>
			<div class="container home">
				<div class="row">
					<h1 class="well-come"><img src="{{ asset('landingpage_asset/images/_m16logo.png') }}" width="570px" height="300px"></h1>
					
					<div class="col-md-8 col-md-offset-2">
						<p class="intro-message animated2">One Stop Entertainment, <i>where all your needs will be fulfilled</i></p>
						
						<div class="col-md-10 col-md-offset-1">
							<a>
								<img src="{{ asset('landingpage_asset/images/_subhausLogo.png') }}">
							</a>							
							<a>
								<img src="{{ asset('landingpage_asset/images/_pitstopLogo.png') }}">
							</a>
							<a>		
								<img src="{{ asset('landingpage_asset/images/_fluxLogo.png') }}">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--=== Home Section Ends ===-->
	</div>
	
	
	<!--=== subhaus section Starts ===-->
	<section id="section-subhaus" class="subhaus-wrap">
		<div class="container subhaus center">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h1>Subhaus Gallery</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In enim ante, eleifend vel nisi vel,
						pellentesque consectetur nunc. Curabitur elementum viverra bibendum. Donec ut magna neque.
						Cras velit magna, luctus eget odio eu, posuere efficitur est.
						Vestibulum euismod risus quis ex dapibus, id consequat turpis aliquet. Donec lobortis euismod enim at
						placerat. Suspendisse maximus sit amet tortor eu sollicitudin. Sed at tristique orci,
						id laoreet elit. Nam ut velit dolor. Fusce orci libero, vehicula a ante quis, ultricies mollis eros.
						In placerat, urna eget feugiat viverra,
						tellus tellus venenatis nisl, nec eleifend metus dui fringilla massa. </p>
				</div>
				<div class="col-lg-6 col-md-6">
					{{-- Slider --}}
					<div id="carousel-example-generic"  class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img src="{{ asset('landingpage_asset/images/1.jpg') }}" style="width: 500px;height: 300px;" alt="image1">
								<div class="carousel-caption">
									Test
								</div>
							</div>
							<div class="item">
								<img src="{{ asset('landingpage_asset/images/2.jpg') }}" style="width: 500px;height: 300px;" alt="image2">
								<div class="carousel-caption">
									Test
								</div>
							</div>
						</div>

						<!-- Controls -->
						{{--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">--}}
							{{--<span class="fa fa-arrow-circle-left" aria-hidden="true"></span>--}}
							{{--<span class="sr-only">Previous</span>--}}
						{{--</a>--}}
						{{--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">--}}
							{{--<span class="fa fa-arrow-circle-right" aria-hidden="true"></span>--}}
							{{--<span class="sr-only">Next</span>--}}
						{{--</a>--}}

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--=== subhaus section Ends ===-->
	
	<!--=== pitstop section Starts ===-->
	<section id="section-pitstop" class="pitstop-wrap">
		<div class="container pitstop center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Pitstop Gallery</h1>	
				</div>
			</div>
		</div>
	</section>
	<!--=== pitstop section Ends ===-->

	<!--=== flux section Starts ===-->
	<section id="section-flux" class="section-wrap">
		<div class="container big-flux center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Flux Gallery</h1>	
				</div>
			</div>
		</div>
	</section>
	<!--=== flux section Ends ===-->

	<!--=== monroe section Starts ===-->
	<section id="section-monroe" class="monroe-wrap">
		<div class="container monroe center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Monroe Gallery</h1>	
				</div>
			</div>
		</div>
	</section>
	<!--=== monroe section Ends ===-->
	
	<!--=== events section Starts ===-->
	<section id="section-events" class="events-wrap">
		<div class="container events center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Events</h1>
					<table id="eventsTable" class="table table-bordered">
						<thead>
							<th class="text-center">Event</th>
							<th class="text-center">Starts</th>
							<th class="text-center">Ends</th>
							<th class="text-center">Description</th>
						</thead>
						<tbody>
						@foreach($events as $event)
							<tr>
								<td>{{ $event->ev_name }}</td>
								<td>{{ $event->ev_start }}</td>
								<td>{{ $event->ev_end }}</td>
								<td>{{ $event->ev_desc }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--=== events section Ends ===-->
	
	
	<!--=== team section Starts ===-->
	<section id="section-team" class="team-wrap">
		<div class="container team center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Our Team</h1>	
				</div>
			</div>
		</div>
	</section>
	<!--=== team section Ends ===-->
	
	<!--=== location section Starts ===-->
	<section id="section-location" class="location-wrap">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8529017981023!2d106.71109931515323!3d-6.283059995452488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69faa297972ad7%3A0xa1980a9bf9be5cef!2sSUBHAUS!5e0!3m2!1sen!2sid!4v1456967087204" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
	<!--=== location section Ends ===-->
		
	<!--=== Footer section Starts ===-->
	<div id="section-footer" class="footer-wrap">
		<div class="container footer center">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="footer-title"><!-- Footer Title -->
						<a class="site-name" href="#"><img src="{{ asset('landingpage_asset/images/_m16logo-s.png') }}"></a>
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
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.easing.1.3.js') }}"></script>

<!--==== Slider and Card style plugin ====-->
<script type="text/javascript" src="js/jquery.baraja.js"></script>
{{--<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.vegas.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('landingpage_asset/js/vegas/vegas.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.bxslider.min.js') }}"></script>

<!--==== MailChimp Widget plugin ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.ajaxchimp.min.js') }}"></script>

<!--==== Scroll and navigation plugins ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.nav.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.appear.js') }}"></script>
<script type="text/javascript" src="{{ asset('landingpage_asset/js/jquery.fitvids.js') }}"></script>

<!--==== Custom Script files ====-->
<script type="text/javascript" src="{{ asset('landingpage_asset/js/custom.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#eventsTable').DataTable();
	});
</script>

</body>
</html>