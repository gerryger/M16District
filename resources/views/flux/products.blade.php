@extends('flux.layout')

@section('content')
    <div class="wrap">
        <div class="main">
            <div class="content products">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 homePage">
                        <h2>Our Products</h2>
                    </div>
                </div>
                @if(is_array($products) || is_object($products))
                    @foreach($products as $product)
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <img src="{{ asset('flux_asset/images/ourproducts/'.$product->image) }}" />
                            </div>

                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                <h3 class="productsTitle">{{ $product->name }}</h3>
                                <div class="productsText">
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $product->youtubelink }}" />
                            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <iframe height="254px" style="min-width: 100%;" src="{{ $product->youtubelink }}" frameborder="0" allowfullscreen></iframe>
                                {{--<iframe height="254px" style="min-width: 100%;" src="https://www.youtube.com/watch?v=Ev4XCdQS4Ss" frameborder="0" allowfullscreen></iframe>--}}
                            </div>
                        </div>
                        <hr />
                    @endforeach
                @endif

            </div>
        </div>
    </div>

@endsection