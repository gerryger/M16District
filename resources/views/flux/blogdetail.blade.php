@extends('flux.layout')

@section('content')
    <div class="wrap">
        <div class="main">
            <div class="content">

                @if(is_array($blogs) || is_object($blogs) && count($blogs) == 1)
                    <h2 style="padding-left: 0px">{{ $blogs->title }}</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <img src="{{ asset('flux_asset/images/blog/'.$blogs->image) }}" alt="" style="height: 500px;width: 1280px"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="blog-desc" style="width: 100%">
                                <p>{{ strip_tags($blogs->description) }}</p>
                            </div>
                          </div>
                    </div>
                @endif
                    <hr/>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                            <div class="fb-comments" data-href="" data-width="100%" data-numposts="10" data-colorscheme="dark"></div>
                            {{--<h3 style="color: #A8A8A8">LEAVE A REPLY</h3>--}}
                            {{--<p class="help-block">Email will not be published</p>--}}

                            {{--<form id="commentForm" action="#" method="POST" >--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="commentTxt" class="control-label"><b>Comment</b></label>--}}
                                    {{--<textarea id="commentTxt" class="form-control" cols="6"  rows="3"></textarea>--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="nameTxt" class="control-label"><b>Name*</b></label>--}}
                                    {{--<input type="text" id="nameTxt" class="form-control" />--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label for="emailTxt" class="control-label"><b>Email*</b></label>--}}
                                    {{--<input type="text" id="emailTxt" class="form-control" />--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<button type="submit" class="btn btn-default">Post Comment</button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.fb-comments').attr('data-href', window.location.href);
    </script>
@endsection