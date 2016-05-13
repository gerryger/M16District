@extends('layouts.mainapp')

@section('content')
    {{-- products table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Products</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="productsTable" class="table table-hover table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Image</th>
                        <th>YoutubeLink</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($products) || is_object($products))
                            @foreach($products as $product)
                                <tr>
                                    <td><input type="hidden" class="product_id" value="{{ $product->id }}" />{{ $product->name }}</td>
                                    <td>{{ $product->image }}</td>
                                    <td>{{ $product->youtubelink }}</td>
                                    <td><input type="hidden" class="product_desc" value="{{ $product->description }}" />{{ substr($product->description, 0, 30).'...' }}</td>
                                    <td>{{ $product->created_by }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>|
                                        <form action="{{ url('f_products/'.$product->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btnDelete"><i class="fa fa-btn fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- products table [END] --}}

    {{-- products form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Products</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'productForm', 'name'=>'productForm', 'url'=>'/f_doaddproduct','class'=>'form-horizontal','files'=>'true')) !!}
                <input type="hidden" id="txtId" name="txtId" value="" />

                {{-- Name --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtName">Name</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtName', null, array('id'=>'txtName', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image">Image</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image', null) !!}
                    </div>
                </div>

                {{-- Youtube link --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtYoutube">Youtube Link</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtYoutube', null, array('id'=>'txtYoutube', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Desc --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtDesc">Description</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtDesc', null, array('id'=>'txtDesc', 'class'=>'form-control', 'style' => 'height: 80px')) !!}
                    </div>
                </div>

                {{-- Created By --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtCreatedby">Created By</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtCreatedby', session('login'), array('id'=>'txtCreatedby', 'class'=>'form-control', 'readonly'=>'true')) !!}
                    </div>
                </div>

                {{-- Preview Image --}}
                <div class="form-group preview">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="imgPreview">Preview Image</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <img id="imgPreview" src="" />
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Submit" type="submit" id="btnAddProduct" name="btnAddProduct" class="btn btn-success" />
                    <input value="Update" type="button" id="btnUpdateProduct" name="btnUpdateProduct" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- products form [END] --}}
    <script type="text/javascript">
        $(document).ready(function(e){
            init();

            onClickBtnEditProduct();

            onClickBtnUpdate();

            onClickBtnCancelUpdate();

            onBlurYoutubeLink();

            onClickBtnCancel();
        });

        function init(){
            clearAll();
            $('#productsTable').dataTable();
            $('.preview').hide();

            if($('#btnUpdateProduct').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateProduct').hide();
                $('#btnCancelUpdate').hide();
            }
        }

        function onClickBtnEditProduct(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.product_id').val();//dapetin id per cell

                var name = cells.eq(0).text();
                var image = cells.eq(1).text();
                var youtubelink = cells.eq(2).text();
                var desc = cells.eq(3).find('.product_desc').val();
                var createdby = cells.eq(4).text();

                $('#txtId').val(id);
                $('#txtName').val(name);
                $('#txtYoutube').val(youtubelink);
                $('#txtDesc').val(desc);
                $('#txtCreatedby').val(createdby);
                $('#imgPreview').attr('src', '{{ asset('flux_asset/images/ourproducts') }}'+'/'+image);

                $('.preview').show();

                //if add btn and cancel btn is visible
                if($('#btnAddProduct').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddProduct').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdateProduct').show(500);
                    $('#btnCancelUpdate').show(500);
                }
            });
        }

        function onClickBtnCancel(){
            $('#btnCancel').click(function(e){
                e.preventDefault();

                clearAll();
            });
        }

        function onClickBtnCancelUpdate(){
            $('#btnCancelUpdate').click(function(e){
                e.preventDefault();

                if($('#btnUpdateProduct').is(':visible') && $(this).is(':visible') && $('.preview').is(':visible')){
                    $('#btnUpdateProduct').hide();
                    $(this).hide();
                    $('.preview').hide();

                    $('#btnAddProduct').show(500);
                    $('#btnCancel').show(500);
                }

                clearAll();
            });
        }

        function onClickBtnUpdate(){
            $('#btnUpdateProduct').click(function(e){
                e.preventDefault();

                var form = document.forms.namedItem("productForm");
                var formdata = new FormData(form);

                //ajax call
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    url: 'f_doupdateproduct', // you need change it.
                    data: formdata, // high importance!
                    processData: false, // high importance!
                    success: function (res) {
                        if(res.status){
                            window.location.reload();
                        }else{
                            alert(res.msg);
                        }
                    }
                });
            });
        }

        function onBlurYoutubeLink(){
            $('#txtYoutube').on('blur', function(e){
                var link = $(this).val();

                if(link.search('embed') == -1) {
                    var str1 = link.substring(0, 24);
                    var str2 = 'embed/';
                    var str3 = link.substring(33, (link.length - 1));
                    var strResult = str1.concat(str2).concat(str3);

                    $(this).val(strResult);
                }
            });
        }

        function clearAll(){
            $('#txtId').val('');
            $('#txtName').val('');
            $('#txtYoutube').val('');
            $('#txtDesc').val('');
            $('[name="image"]').val('');
        }
    </script>
@endsection