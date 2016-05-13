<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>M16 District - Pitstop</title>
	
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
										<img src="{{ asset('pitstop_asset/images/m16logo.png') }}">
									</span>
								</a>
							</div>
						</div>
						
						<!-- Main Navigation menu Starts -->
						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="current"><a href="#section-home">Pitstop</a></li>	
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
			<div class="container">
				<div class="row main-container">
					<div class="pitstop-main">
						<div class="row">
							<div class="col-lg-12 center">
								<img src="{{ asset('pitstop_asset/images/_pitstopLogo.png') }}">
							</div>
						</div>
						<div class="row">
							<div class="col-ms-12 center">
								<div id="bx-pager" class="pitstop-menu">
									<a data-slide-index="0" href="" class="pitstop-hold">
										<i class="fa fa-hand-peace-o"></i>&nbsp&nbsp&nbsp<b>About</b>
									</a>
									<a data-slide-index="1" href="" class="pitstop-hold">
										<i class="fa fa-cutlery"></i>&nbsp&nbsp&nbsp<b>Meals</b>
									</a>
									<a data-slide-index="2" href="" class="pitstop-hold">
										<i class="fa fa-beer"></i>&nbsp&nbsp&nbsp<b>Beverages</b>
									</a>
									<a data-slide-index="3" href="" class="pitstop-hold">
										<i class="fa fa-phone"></i>&nbsp&nbsp&nbsp<b>Contacts</b>
									</a>
									<a data-slide-index="4" href="" class="pitstop-hold">
										<i class="fa fa-newspaper-o"></i>&nbsp&nbsp&nbsp<b>News</b>
									</a>
									<a data-slide-index="5" href="" class="pitstop-hold">
										<i class="fa fa-instagram"></i>&nbsp&nbsp&nbsp<b>Follow Us</b>
									</a>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="pitstop-slider">

									<div class="pitstop-item">
										<div class="row">
											<div class="col-lg-12">
												<i class="fa fa-bookmark-o pitstop-logo"></i><br><i>est.</i> 2011
												<p class="pitstop-about">
												<br>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.
												<br>
												<br>
												<br>
												</p>

												<div class="client-photos">
													<a data-slide-index="0" class="photo-hold">
														<span class="photo-bg">
															<img src="{{ asset('pitstop_asset/images/pitstopAssets/client_1.jpg') }}" alt="" /> <!-- Client photo 1 -->
														</span>
													</a>
													<a data-slide-index="1" class="photo-hold">
														<span class="photo-bg">
															<img src="{{ asset('pitstop_asset/images/pitstopAssets/client_2.jpg') }}" alt="" /> <!-- Client photo 2 -->
														</span>
													</a>
													<a data-slide-index="2" class="photo-hold">
														<span class="photo-bg">
															<img src="{{ asset('pitstop_asset/images/pitstopAssets/client_3.jpg') }}" alt="" /> <!-- Client photo 3 -->
														</span>
													</a>
												</div>

											</div>
										</div>
									</div>

									<div class="pitstop-item">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
													<h4>Waffle</h4>
													<div class="table-responsive left">
													  	<table class="table">
													      	<tr>
														        <td>Plain Waffle</td>
														        <td>10K</td>
													      	</tr>
													      	<tr>
													      		<td>Salted Waffle<br>
													      			(Waffle with egg, smoked beef, mayonnaise, french fries)
													      		</td>
													      		<td>20K</td>
													      	</tr>
													      	<tr>
													      		<td>Extra :</td>
													      	</tr>
													      	<tr>
													      		<td>Sugar</td>
													      		<td>+3K</td>
													      	</tr>
													      	<tr>
													      		<td>Nutella</td>
													      		<td>+5K</td>
													      	</tr>
													      	<tr>
													      		<td>Ovomaltine</td>
													      		<td>+5K</td>
													      	</tr>
													      	<tr>
													      		<td>Rice</td>
													      		<td>+3K</td>
													      	</tr>
													      	<tr>
													      		<td>Full Cream Milk</td>
													      		<td>+3K</td>
													      	</tr>
													      	<tr>
													      		<td>Cheese</td>
													      		<td>+3K</td>
													      	</tr>
													      	<tr>
													      		<td>Oreo</td>
													      		<td>+2K</td>
													      	</tr>
													      	<tr>
													      		<td>Regal</td>
													      		<td>+2K</td>
													      	</tr>
													      	<tr>
													      		<td>Banana</td>
													      		<td>+5K</td>
													      	</tr>
													      	<tr>
													      		<td>Strawberry</td>
													      		<td>+5K</td>
													      	</tr>
													      	<tr>
													      		<td>Coco Crunch</td>
													      		<td>+3K</td>
													      	</tr>
													      	<tr>
													      		<td>Marsmellow</td>
													      		<td>+5K</td>
													      	</tr>
													      	<tr>
													      		<td>Fruit Loops</td>
													      		<td>+3K</td>
													      	</tr>
													      	<tr>
													      		<td>Ice Cream</td>
													      		<td>+5K</td>
													      	</tr>
													  	</table>
													</div>
												</div>
												<div class="col-md-4">
													<h4>Dimsum</h4>
													<div class="table-responsive left">
														<table class="table">
															<tr>
																<td>Kukus<br>
																-Ceker ayam<br>
																-Hakau tim<br>
																-Cikau tim	
																</td>
																<td>20K</td>
															</tr>
															<tr>
													      		<td>Pau<br>
													      		-Ayam<br>
													      		-Coklat<br>
													      		-Custraid<br>
													      		-Durian<br>
													      		-Kacang merah<br>
													      		-Pandan
													      		</td>
													      		<td>20K</td>
													      	</tr>
													      	<tr>
													      		<td>Siomay<br>
													      		-Ayam<br>
													      		-Udang<br>
													      		-Kepiting<br>
													      		-Kerang<br>
													      		-Jamur<br>
													      		-Kucai<br>
													      		</td>
													      		<td>20K</td>
													      	</tr>
													      	<tr>
													      		<td>Gorengan<br>
													      		-Lumpia kulit tahu<br>
													      		-Pangsit Udang Mayonnaise<br>
													      		-Pangsit Wongton Udang<br>
													      		</td>
													      		<td>20K</td>
													      	</tr>
														</table>
													</div>
												</div>
												<div class="col-md-4">
													<h4>Meals</h4>
													<div class="table-responsive left">
														<table class="table">
															<tr>
																<td>Mie Susu</td>
																<td>15K</td>
															</tr>
															<tr>
																<td>Frenchfries<br>
																-BBQ<br>
																-Cheese
																</td>
																<td>13K</td>
															</tr>
															<tr>
																<td>Cream Soup</td>
																<td>13K</td>
															</tr>
															<tr>
																<td>Chicken Wings</td>
																<td>20K</td>
															</tr>
															<tr>
																<td>Nasi Goreng Keju</td>
																<td>25K</td>
															</tr>
															<tr>
																<td>Satay<br>
																(Chicken satay with mashed potato)
																</td>
																<td>15K</td>
															</tr>
															<tr>
																<td>Satay Sauce :</td>
															</tr>
															<tr>
																<td>BBQ</td>
																<td>+6K</td>
															</tr>
															<tr>
																<td>Cheese</td>
																<td>+6K</td>
															</tr>
															<tr>
																<td>Mushroom</td>
																<td>+6K</td>
															</tr>
															<tr>
																<td>Blackpepper</td>
																<td>+6K</td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="pitstop-item">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
													<h4>Tea and Coffee Club</h4>
													<div class="table-responsive left">
														<table class="table">
															<tr>
																<td>Tea (hot/cold)</td>
																<td>8K</td>
															</tr>
															<tr>
																<td>Passion Tea :<br>
																-Strawberry<br>
																-Peach<br>
																-Blackcurrant<br>
																-Mint
																</td>
																<td>12K</td>
															</tr>
															<tr>
																<td>Lychee Tea</td>
																<td>12K</td>
															</tr>
															<tr>
																<td>Lemon Tea</td>
																<td>12K</td>
															</tr>
															<tr>
																<td>Thai Tea</td>
																<td>15K</td>
															</tr>
															<tr>
																<td>Tarik Tea</td>
																<td>12K</td>
															</tr>
															<tr>
																<td>Milk Coffee</td>
																<td>10K</td>
															</tr>
															<tr>
																<td>Aceh Traditional Coffee</td>
																<td>10K</td>
															</tr>
															<tr>
																<td>Black Coffee</td>
																<td>10K</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="col-md-4">
													<h4>Milk Club</h4>
													<div class="table-responsive left">
														<table class="table">
															<tr>
																<td>Chocolate (hot/cold)</td>
																<td>15K</td>
															</tr>
															<tr>
																<td>Ovaltine (hot/cold)</td>
																<td>12K</td>
															</tr>
															<tr>
																<td>Milkshake :<br>
																-Vanilla<br>
																-Strawberry<br>
																-Chocolate 
																</td>
																<td>20K</td>
															</tr>
														</table>
													</div>
												</div>
												<div class="col-md-4">
													<h4>Water and Soda Club</h4>
													<div class="table-responsive left">
														<table class="table">
															<tr>
																<td>Mineral Water</td>
																<td>8K</td>
															</tr>
															<tr>
																<td>Soft Drink</td>
																<td>8K</td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="pitstop-item">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
													<h4><i class="fa fa-clock-o">&nbsp&nbsp</i>Hours</h4>
													<p class="pitstop-contacts">
													BREAKFAST :<br>
													Mon to Fri: 7:30 AM - 11:30 AM<br>
													Sat & Sun: 8:00 AM - 9:00 AM<br><br>
													BRUNCH :<br>
													Sat & Sun: 9:00 AM - 4:00 PM<br><br>
													LUNCH :<br>
													Mon to Fri: 12:00 PM - 5:00 PM<br><br>
													DINNER :<br>
													Mon to Thu: 6:00 PM - 12:00 AM<br>
													Fri & Sat: 6:00 PM - 1:00 AM<br>
													Sun: 5:30 PM - 12:00 AM
													</p>
												<br>
												</div>
												<div class="col-md-4">
													<h4><i class="fa fa-map-marker">&nbsp&nbsp</i>Directions</h4>
													<p class="pitstop-contacts">
													M16 DISTRICT <br> Jl. Maleo Raya No.16 Sector 9, Bintaro, South Tangerang City, Banten 15413, Indonesia
													</p><br>
													<h4><i class="fa fa-phone">&nbsp&nbsp</i>Phone</h4>
													<p class="pitstop-contacts">+62 821 10761208</p>
												<br>
												</div>
												<div class="col-md-4">
													<h4><i class="fa fa-envelope-o">&nbsp&nbsp</i>Messages</h4>
													<p class="pitstop-contacts">
														<div class="form-group">
															<input type="text" class="form-control contact-form" id="inputDefault" placeholder="Subject">
															<input type="text" class="form-control contact-form" id="inputEmail" placeholder="Email">
															<textarea class="form-control" rows="6" id="textArea" placeholder="Comments"></textarea>
														</div>
													</p>
													<a href="#" class="btn btn-default btn-block">Submit</a>
												</div>
											</div>
										</div>
									</div>

									<div class="pitstop-item">
									test5
									</div>

									<div class="pitstop-item">
									test6
									</div>

								</div>
							</div>
						</div>
						<div class="row">

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
<script type="text/javascript" src="{{asset('pitstop_asset/js/jquery-1.11.1.min.js')}}"></script>

<!--==== Essential files ====-->
{{--<script type="text/javascript" src="{{ asset('pitstop_asset/images/_m16logo-s.png') }}"></script>--}}
<script type="text/javascript" src="{{ asset('pitstop_asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/bootstrapValidator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.easing.1.3.js') }}"></script>

<!--==== Slider and Card style plugin ====-->
{{--<script type="text/javascript" src="{{ asset('pitstop_asset/js/jquery.baraja.js') }}"></script>--}}
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

</body>
</html>