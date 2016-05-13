@extends('flux.layout')

@section('content')
   <div class="wrap">
   	 <div class="main">
	    <div class="content">
	    	<h2 style="padding-left: 0px">Services</h2>
			@if(is_array($services) || is_object($services))
				@foreach($services as $service)
					<div class="row item_service">
						{{-- hidden fields [START] --}}
						<input type="hidden" class="service_desc" value="{{ $service->description }}" />
						<input type="hidden" class="service_price_S" value="{{ $service->price_S }}" />
						<input type="hidden" class="service_price_M" value="{{ $service->price_M }}" />
						<input type="hidden" class="service_price_L" value="{{ $service->price_L }}" />
						<input type="hidden" class="service_price_XL" value="{{ $service->price_XL }}" />
						{{-- hidden fields [END] --}}

						<div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
							<h3 style="color: #FFFFFF">{{ $service->name }}</h3>
							<p style="color: #787878">{{ substr($service->description, 0, 420) }}</p>
							<a href="#" class="button button-icon button-icon-demo">More Info</a>
						</div>
						<div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
							<img src="{{ asset('flux_asset/images/services/'.$service->image) }}"  alt="Image" />
						</div>
					</div>
					<br/>
				@endforeach
			@endif
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="paging-services" style="float: left">

					</div>
				</div>
			</div>

			<hr/>
			<h2 style="padding-left: 0px">Price List</h2>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<img src="{{ asset('flux_asset/images/FluxGallery/IMG_7965.JPG') }}"  style="min-height: 100%;min-width: 100%"/>
				</div>
			</div>
		</div>
	 </div>
   </div>

   @include('flux.servicesModal')
   <script type="text/javascript">
		$(document).ready(function(e){
			pagingForServices();
			onClickItemService();
		});

		function pagingForServices(){
			var items = $('.item_service');
			var numItems = items.length;
			var perPage = 3;

			items.slice(perPage).hide();

			$('.paging-services').pagination({
				items: numItems,
				itemsOnPage: perPage,
				cssStyle: 'dark-theme',
				onPageClick: function(pageNum){
					var start = perPage * (pageNum-1);
					var end = start + perPage;

					items.hide().slice(start,end).show();
				}
			});
		}

	   function onClickItemService(){
		   $('.item_service a').click(function(e){
//			   alert($(this).closest('.item_service').find('.service_price_S').val());
			   var desc = $(this).closest('.item_service').find('.service_desc').val();
			   var name = $(this).closest('.item_service').find('h3').text();
			   var price_S = $(this).closest('.item_service').find('.service_price_S').val();
			   var price_M = $(this).closest('.item_service').find('.service_price_M').val();
			   var price_L = $(this).closest('.item_service').find('.service_price_L').val();
			   var price_XL = $(this).closest('.item_service').find('.service_price_XL').val();
			   var img =  $(this).closest('.item_service').find('img').attr('src');

			   $('#servicesModal .modal-body').empty();
			   $('#myModalLabel').empty();

			   $('#myModalLabel').append('<strong>'+name+'</strong>');

			   var modalBody = 	'<div class="row">'+
					   				'<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">'+
					   					'<img src="'+img+'"  />'+
					   				'</div>'+
					   			'</div>'+
					   			'<hr />'+
					   			'<div class="row">'+
					   				'<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">'+
					   					'<label class="control-label">Price</label>'+
					   				'</div>'+
					   				'<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive">'+
//					   					'<div class="table-responsive">'+
							   				'<table id="modelPriceTable" class="table table-hover table-striped">'+
							   					'<thead>'+
							   						'<th>S</th>'+
											   		'<th>M</th>'+
											   		'<th>L</th>'+
											   		'<th>XL</th>'+
							   					'</thead>'+
							   					'<tbody>'+
							   						'<tr>'+
							   							'<td>'+price_S+'</td>'+
													   	'<td>'+price_M+'</td>'+
													   	'<td>'+price_L+'</td>'+
													   	'<td>'+price_XL+'</td>'+
							   						'</tr>'+
					   							'</tbody>'+
					   						'</table>'+
//					   					'</div>'+
					   				'</div>'+
					   			'</div>'+
							   	'<div class="row">'+
									'<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">'+
										'<label class="control-label">Description</label>'+
									'</div>'+
									'<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">'+
					   					'<textarea class="form-control" style="height: 100px" readonly="true">'+desc+'</textarea>'+
									'</div>'+
							   	'</div>';

			   $('#servicesModal .modal-body').append(modalBody);
			   $('#servicesModal').modal('show');
		   });
	   }
	</script>
@endsection