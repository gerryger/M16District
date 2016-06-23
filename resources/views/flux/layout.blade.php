<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>.:Flux Garage:.</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('flux_asset/css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="{{ asset('flux_asset/css/slider.css') }}" type="text/css" media="screen" />
<link href="{{ asset('subhaus_asset/css/font-awesome.min.css') }}" rel="stylesheet">

<script type="text/javascript" src="{{ asset('flux_asset/js/jquery-1.9.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('flux_asset/js/jquery.nivo.slider.js') }}"></script>

{{-- jQuery poptrox --}}
<script type="text/javascript" src="{{ asset('flux_asset/js/bower_components/jquery.poptrox/jquery.poptrox.min.js') }}"></script>

{{-- Bootstrap CSS --}}
<link rel="stylesheet" href="{{ asset('flux_asset/css/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('flux_asset/css/bootstrap.css.map') }}" />
<script type="text/javascript" src="{{ asset('flux_asset/js/bootstrap.min.js') }}"></script>

{{-- simplePagination --}}
<link type="text/css" rel="stylesheet" href="{{ asset('flux_asset/js/simplePagination/simplePagination.css') }}"/>
<script type="text/javascript" src="{{ asset('flux_asset/js/simplePagination/jquery.simplePagination.js') }}"></script>


{{-- responsify --}}
<script type="text/javascript" src="{{asset('flux_asset/js/responsify/responsify.min.js')}}"></script>

{{-- lightbox --}}
<link rel="stylesheet" href="{{ asset('landingpage_asset/bower_components/lightbox2/dist/css/lightbox.min.css') }}" />

	<!----- Scroll top --------->
<script type="text/javascript" src="{{ asset('flux_asset/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('flux_asset/js/easing.js') }}"></script>
<!-----End  Scroll top --------->
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
  {{-- Facebook Comment API [START]--}}
  <script>
	  window.fbAsyncInit = function() {
		  FB.init({
			  appId      : '1587597141555729',
			  xfbml      : true,
			  version    : 'v2.5'
		  });
	  };

	  (function(d, s, id){
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) {return;}
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js";
		  fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
  </script>
  {{-- Facebook Comment API [END] --}}

  <div class="wrap">
  	 <div class="header">  	
		 		<!--- Slider --->				
				     <div class="slider">
				      <div class="slider-wrapper theme-default">
				            <div id="slider" class="nivoSlider">
								@if(is_array($sliders) || is_object($sliders))
									@foreach($sliders as $slider)
										<img src="{{ asset('flux_asset/images/sliders/'.$slider->image) }}" data-thumb="{{ asset('flux_asset/images/sliders/'.$slider->image) }}"
											 alt="" data-focus-left="0.00" data-focus-top="0.01" data-focus-right="1.00" data-focus-bottom="1.00" />
									@endforeach
								@endif
				                {{--<img src="{{ asset('flux_asset/images/FluxGallery/slider/logo.png') }}" data-thumb="{{ asset('flux_asset/images/FluxGallery/slider/logo.png') }}" alt="" />--}}
				                {{--<img src="{{ asset('flux_asset/images/FluxGallery/slider/pic_1.png') }}" data-thumb="{{ asset('flux_asset/images/FluxGallery/slider/pic_1.png') }}" alt="" />--}}
				                {{--<img src="{{ asset('flux_asset/images/FluxGallery/slider/pic_3.png') }}" data-thumb="{{ asset('flux_asset/images/FluxGallery/slider/pic_3.png') }}" alt="" />--}}
				                {{--<img src="{{ asset('flux_asset/images/FluxGallery/slider/pic_4.png') }}" data-thumb="{{ asset('flux_asset/images/FluxGallery/slider/pic_4.png') }}" alt="" />--}}
							</div>
				        </div>
				          {{--<div class="header_desc">--}}
				 			 {{--<div class="logo">--}}
				 				{{--<a href="{{ url('/flux') }}"><img src="{{ asset('flux_asset/images/_fluxLogo.png') }}" alt="" /></a>--}}
							 {{--</div>							--}}
		     		    {{--</div>--}}
				   </div>
			     <!--- End Slider --->
		   <div class="header-bottom">
		      <div class="menu">
					    <ul>
							<li ><a href="{{ url('/flux') }}">Home</a></li>
							{{--<li><a href="{{ url('/flux/about') }}">About</a></li>--}}
							<li><a href="{{ url('/flux/services') }}">Services & Price</a></li>
							<li><a href="{{ url('/flux/products') }}">Our Product</a></li>
							<li><a href="{{ url('/flux/blog') }}">Blog</a></li>
							<li><a href="{{ url('/flux/contact') }}">Contact</a></li>
							<div class="clear"></div>
						</ul>
					</div>
		        <div class="social-icons">						
		                <ul>
		                    <li><a class="facebook" href="#" target="_blank"> </a></li>
		                    <li><a class="twitter" href="#" target="_blank"></a></li>
		                    <li><a class="googleplus" href="#" target="_blank"></a></li>
		                    <li><a class="rss" href="#" target="_blank"></a></li>
		                    <div class="clear"></div>
		                </ul>
		 		    </div>
		 		    <div class="clear"></div>
               </div>
		 </div>
	</div>

  {{-- Content [START] --}}
  @yield('content')
  {{-- Content [END] --}}

  <div class="wrap">
   <div class="footer">
   	 <div class="footer_grides">
	     <div class="section group">
			 <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 span_1_of_4">
				 <h3 class="text-center">About Us</h3>
				 <img src="{{ asset('flux_asset/images/FluxGallery/slider/logo.png') }}" alt="flux_logo.png" />
				 <p style="color: #777">
					 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
				 </p>
				 {{--<div class="contact_info">--}}
					 {{--<div class="map">--}}
						 {{--<iframe width="100%" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#777;text-align:left;font-size:0.85em">View Larger Map</a></small>--}}
					 {{--</div>--}}
				 {{--</div>--}}
				 {{--<div class="flux_footer_contact">--}}
					 {{--<ul>--}}
						 {{--<li>--}}
							 {{--<span><i class="fa fa-home"></i> Jl. Maleo Raya JC1/16 Bintaro Jaya Sektor IX</span>--}}
						 {{--</li>--}}
						 {{--<li>--}}
							 {{--<i class="fa fa-globe"></i>--}}
							 {{--<span> m16district@gmail.com</span>--}}
						 {{--</li>--}}
						 {{--<li>--}}
							 {{--<i class="fa fa-phone"></i>--}}
							 {{--<span> 08111160333</span>--}}
						 {{--</li>--}}
						 {{--<li>--}}
							 {{--<i class="fa fa-clock-o"></i>--}}
							 {{--<span> 10.00 - 22.00</span>--}}
						 {{--</li>--}}
					 {{--</ul>--}}
				 {{--</div>--}}
			 </div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 span_1_of_4">
					<h3 class="text-center"><a style="text-decoration: none;color: #949494;" href="https://www.instagram.com/fluxgarage/" target="_blank"><i class="fa fa-instagram"></i></a></h3>
					<!-- SnapWidget -->
					<!-- SnapWidget -->
					<script src="http://snapwidget.com/js/snapwidget.js"></script>
					<iframe src="http://snapwidget.com/in/?h=Zmx1eGdhcmFnZXxpbnw1MHwyfDJ8fHllc3wwfG5vbmV8b25TdGFydHx5ZXN8eWVz&ve=050416" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 span_1_of_4 timmings">
					<h3 class="text-center">Member Of</h3>
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
     </div>
		 <div class="copy_right">
		 	 <div class="wrap">
				<p>Flux Garage © All Rights Reseverd | Design by  <a href="#">Telematic Research Group</a></p>
			 </div>
		</div>	
		<!------------ scroll Top ------------>
	 <script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });

			menu();
		});

		//add active class to li when clicked
		function menu(){
			//clear all active class
			$('.menu ul li').removeClass('active');

			var pathArray = window.location.pathname; //.split('/');
			//alert(pathArray[5]);
			if(pathArray.indexOf('about') > 0 ){
				$('.menu ul li').eq(1).addClass('active');
			}
			else if(pathArray.indexOf('services') > 0 ){
				$('.menu ul li').eq(2).addClass('active');
			}
			else if(pathArray.indexOf('products') > 0){
				$('.menu ul li').eq(3).addClass('active');
			}
			else if(pathArray.indexOf('blog') > 0){
				$('.menu ul li').eq(4).addClass('active');
			}
			else if(pathArray.indexOf('contact') > 0){
				$('.menu ul li').eq(5).addClass('active');
			}
			else{
				$('.menu ul li').eq(0).addClass('active');
			}
		}
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
	<!------------ End scroll Top ------------>
  </div>

	<script type="text/javascript" src="{{asset('flux_asset/ModalWindowEffects/js/classie.js')}}"></script>
  	<script type="text/javascript" src="{{asset('flux_asset/ModalWindowEffects/js/modalEffects.js')}}"></script>

	  <!-- for the blur effect -->
	  <!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
	  <script type="text/javascript">
		  // this is important for IEs
		  var polyfilter_scriptpath = '/js/';

	  </script>
  	<script type="text/javascript" src="{{asset('flux_asset/ModalWindowEffects/js/cssParser.js')}}"></script>
  	<script type="text/javascript" src="{{asset('flux_asset/ModalWindowEffects/js/css-filters-polyfill.js')}}"></script>

  <!--==== Lightbox ====-->
  <script type="text/javascript" src="{{ asset('landingpage_asset/bower_components/lightbox2/dist/js/lightbox.min.js') }}"></script>

</body>
</html>

