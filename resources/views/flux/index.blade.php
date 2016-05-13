@extends('flux.layout')

@section('content')
    <div class="wrap">
        <div class="main">
            <div class="content homePage">
                <div class="section group">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8">
                            <h2>Recent Blog</h2>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                @if(is_array($blogs) || is_object($blogs))
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
                            </div>
                            <div class="paging" style="float: left">

                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <h2>Our Products</h2>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a href="http://www.meguiars.com/international" target="_blank"><img src="{{ asset('flux_asset/images/product/meguiars-logo.png') }}" style="min-height: 100%;min-width: 100%;margin-top: 20px" /></a>
                                <a href="http://www.3m.com" target="_blank"><img src="{{ asset('flux_asset/images/product/3m-logo.png') }}" style="min-height: 100%;min-width: 100%;margin-top: 20px" /></a>
                                <a href="http://www.chemicalguys.com" target="_blank"><img src="{{ asset('flux_asset/images/product/chemical-guys-logo.png') }}" style="min-height: 100%;min-width: 100%;margin-top: 20px" /></a>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a href="http://www.gyeonquartz.com" target="_blank"><img src="{{ asset('flux_asset/images/product/gyeon-logo.png') }}" style="min-height: 100%;min-width: 100%;margin-top: 20px" /></a>
                                <a href="http://www.soft99.co.jp/english/" target="_blank"><img src="{{ asset('flux_asset/images/product/soft99-logo.png') }}" style="min-height: 100%;min-width: 100%;margin-top: 20px" /></a>
                                <a href="http://https://www.turtlewax.com/" target="_blank"><img src="{{ asset('flux_asset/images/product/turtle-wax-logo.png') }}" style="min-height: 100%;min-width: 100%;margin-top: 20px" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h2>Promo & Events</h2>
                            <table id="eventPromoTable" class="eventPromoTable">
                                <tbody>
                                    @if(is_array($eventpromos) || is_object($eventpromos))
                                        @foreach($eventpromos as $eventpromo)
                                            <tr>
                                                <td><input type="hidden" class="eventpromo_id" value="{{ $eventpromo->id }}" />{{ $eventpromo->name }}</td>
                                                <td style="float: right">{{ $eventpromo->start }}~{{ $eventpromo->end }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="paging-eventpromo" style="float: left">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('flux.eventPromoModal')

    <script type="text/javascript">
        $(document).ready(function(e){
            /*recent blog paging [START]*/
            pagingForRecentBlogs();
            /*recent blog paging [END]*/

            /*event promo table paging [START]*/
            pagingForEventPromoTable();
            /*event promo table paging [END]*/

            /*event promo table click event [START]*/
            $('.eventPromoTable tr').click(function(e){
                $('#eventPromoModal .modal-body').empty();

                var eventpromo_id = $(this).find('td').eq(0).find('.eventpromo_id').val();
//                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                //alert(eventpromo_id);

                //run ajax
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: 'f_geteventpromobyid',
                    data: {eventpromo_id: eventpromo_id},
                    success: function(res){
                        if(res.status){
                            $('#myModalLabel').append('<strong>'+res.msg.name+'</strong>');
                            var modalBody = '<div class="row">'+
                                                '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="align: center">'+
                                                    '<img src="{{ asset('flux_asset/images/eventpromo') }}/'+res.msg.image+'" style="margin-left: 50px"/>'+
                                                '</div>'+
                                            '</div>'+
                                            '<hr />'+
                                            '<div class="row">'+
                                                '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">'+
                                                    '<label class="control-label">Start</label>'+
                                                '</div>'+
                                                '<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">'+
                                                    '<input type="text" class="form-control" value="'+res.msg.start+'" readonly/>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="row">'+
                                                '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">'+
                                                    '<label class="control-label">End</label>'+
                                                '</div>'+
                                                '<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">'+
                                                    '<input type="text" class="form-control" value="'+res.msg.end+'" readonly/>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="row">'+
                                                '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">'+
                                                    '<label class="control-label">Description</label>'+
                                                '</div>'+
                                                '<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">'+
                                                    '<textarea class="form-control" style="height: 80px" readonly="true">'+res.msg.description+'</textarea>'+
                                                '</div>'+
                                            '</div>';
                            $('#eventPromoModal .modal-body').append(modalBody);
                            $('#eventPromoModal').modal('show');
                        }else{
                            alert(res.msg);
                        }
                    }
                });

            });
            /*event promo table click event [END]*/
        });

        function pagingForRecentBlogs(){
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
        }

        function pagingForEventPromoTable(){
            var items = $('#eventPromoTable tr');
            var numItems = items.length;
            var perPage = 2;

            items.slice(perPage).hide();

            $('.paging-eventpromo').pagination({
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
    </script>
@endsection