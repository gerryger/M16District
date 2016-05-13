@extends('flux.layout')

@section('content')
   <div class="wrap">
   	 <div class="main">
	        <div class="content">
	    	       <h2>blogs</h2>
							@if(is_array($blogs) || is_object($blogs))
								<input type="hidden" id="txtBlogCount" value="{!! count($blogs) !!}" />
								@foreach($blogs as $blog)
									<div class="blog-leftgrids">
										<div class="image group">
											<div class="grid images_3_of_1">
												<a href="#"><img src="{{ asset('flux_asset/images/blog/'.$blog->image) }}" style="min-height: 100%"  alt="" /></a>
											</div>
												<div class="grid blog-desc">
													<h3><a href="{{ url('/flux/blog/'.$blog->id) }}">{{ $blog->title }} </a></h3>
													<p>{{ strip_tags($blog->description) }}</p>
													<a href="{{ url('/flux/blog/'.$blog->id) }}" class="button">Read More</a>
											   </div>
										 </div>
										 <div class="artical-links">
											<ul>
												<li><a href="#"><img src="{{ asset('flux_asset/images/blog-icon1.png') }}" title="date"><span>{{ $blog->date }}</span></a></li>
												<li><a href="#"><img src="{{ asset('flux_asset/images/blog-icon2.png') }}" title="Admin"><span>{{ $blog->created_by }}</span></a></li>
												{{--<li><a href="#"><img src="{{ asset('flux_asset/images/blog-icon3.png') }}" title="Comments"><span>7 comments</span></a></li>--}}
												<li><a href="{{ url('/flux/blog/'.$blog->id) }}"><img src="{{ asset('flux_asset/images/blog-icon4.png') }}" title="Lables"><span>View post</span></a></li>
												{{--<li><a href="#"><img src="{{ asset('flux_asset/images/blog-icon5.png') }}" title="permalink"><span>permalink</span></a></li>--}}
											</ul>
										 </div>
									</div>
								@endforeach
							@endif

					<div class="paging" style="float: right">

					</div>


					<script type="text/javascript">
						$(document).ready(function(e){
							var items = $('.blog-leftgrids');
							var numItems = items.length;
							var perPage = 2;

							items.slice(perPage).hide();

							$('.paging').pagination({
								items: numItems,
								itemsOnPage: perPage,
								cssStyle: 'dark-theme',
								onPageClick: function(pageNum){
									var start = perPage * (pageNum-1);
									var end = start + perPage;

									items.hide().slice(start,end).show();
								}
							});
						});
					</script>
							{{--<div class="blog-leftgrids">--}}
								{{--<div class="image group">--}}
									{{--<div class="grid images_3_of_1">--}}
										{{--<a href="#"><img src="{{ asset('flux_asset/images/blog-img2.jpg') }}" alt="" /></a>--}}
									{{--</div>--}}
										{{--<div class="grid blog-desc">--}}
											{{--<h3><a href="#">Lorem Ipsum is simply dummy text </a></h3>--}}
											{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
											{{--<a href="#" class="button">Read More</a>--}}
									   {{--</div>--}}
		  						 {{--</div>--}}
		  						 {{--<div class="artical-links">--}}
		  						 	{{--<ul>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon1.png" title="date"><span>june 14, 2013</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon2.png" title="Admin"><span>admin</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon3.png" title="Comments"><span>5 comments</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon4.png" title="Lables"><span>View posts</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon5.png" title="permalink"><span>permalink</span></a></li>--}}
		  						 	{{--</ul>--}}
		  						 {{--</div>--}}
							{{--</div>--}}
							{{--<div class="blog-leftgrids">--}}
								{{--<div class="image group">--}}
									{{--<div class="grid images_3_of_1">--}}
										{{--<a href="#"><img src="web/images/blog-img3.jpg" alt="" /></a>--}}
									{{--</div>--}}
										{{--<div class="grid blog-desc">--}}
											{{--<h3><a href="#">Lorem Ipsum is simply dummy text </a></h3>--}}
											{{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
											{{--<a href="#" class="button">Read More</a>--}}
									   {{--</div>--}}
		  						 {{--</div>--}}
		  						 {{--<div class="artical-links">--}}
		  						 	{{--<ul>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon1.png" title="date"><span>june 14, 2013</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon2.png" title="Admin"><span>admin</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon3.png" title="Comments"><span>2 comments</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon4.png" title="Lables"><span>View posts</span></a></li>--}}
		  						 		{{--<li><a href="#"><img src="web/images/blog-icon5.png" title="permalink"><span>permalink</span></a></li>--}}
		  						 	{{--</ul>--}}
		  						 {{--</div>--}}
							{{--</div>--}}
							{{--<div class="content-pagenation">--}}
						{{--<li><a href="#">Frist</a></li>--}}
						{{--<li class="active"><a href="#">1</a></li>--}}
						{{--<li><a href="#">2</a></li>--}}
						{{--<li><a href="#">3</a></li>--}}
						{{--<li><span>....</span></li>--}}
						{{--<li><a href="#">Last</a></li>--}}
						{{--<div class="clear"> </div>--}}
					{{--</div>	    	 			 	   --}}
		    </div>
	 </div>
   </div>


   @endsection
