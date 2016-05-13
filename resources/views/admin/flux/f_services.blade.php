@extends('layouts.mainapp')

@section('content')
    {{-- service table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Services & Price</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="servicesTable" class="table table-hover table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Price S</th>
                        <th>Price M</th>
                        <th>Price L</th>
                        <th>Price XL</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($services) || is_object($services))
                            @foreach($services as $service)
                                <tr>
                                    <td><input type="hidden" class="service_id" value="{{ $service->id }}" />{{ $service->name  }}</td>
                                    <td>{{ $service->image }}</td>
                                    <td><input type="hidden" class="service_desc" value="{{ $service->description }}" />{{ substr($service->description, 0, 30).'...' }}</td>
                                    <td>{{ $service->price_S }}</td>
                                    <td>{{ $service->price_M }}</td>
                                    <td>{{ $service->price_L }}</td>
                                    <td>{{ $service->price_XL }}</td>
                                    <td>{{ $service->created_by }}</td>
                                    <td>{{ $service->created_at }}</td>
                                    <td>{{ $service->updated_at }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>|
                                        <form action="{{ url('f_services/'.$service->id) }}" method="POST">
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
    {{-- service table [END] --}}

    {{-- service form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Services</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'serviceForm', 'name'=>'serviceForm', 'url'=>'/f_doaddservice','class'=>'form-horizontal','files'=>'true')) !!}
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

                {{-- Desc --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtDesc">Description</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtDesc', null, array('id'=>'txtDesc', 'class'=>'form-control', 'style' => 'height: 80px')) !!}
                    </div>
                </div>

                {{-- Price --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtName">Price</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>L</th>
                                    <th>XL</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{!! Form::text('txtPrice_S', null, array('id'=>'txtPrice_S', 'class'=>'form-control')) !!}</td>
                                        <td>{!! Form::text('txtPrice_M', null, array('id'=>'txtPrice_M', 'class'=>'form-control')) !!}</td>
                                        <td>{!! Form::text('txtPrice_L', null, array('id'=>'txtPrice_L', 'class'=>'form-control')) !!}</td>
                                        <td>{!! Form::text('txtPrice_XL', null, array('id'=>'txtPrice_XL', 'class'=>'form-control')) !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                    <input value="Submit" type="submit" id="btnAddService" name="btnAddService" class="btn btn-success" />
                    <input value="Update" type="button" id="btnUpdateService" name="btnUpdateService" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- service form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();
            onClickBtnCancel();
            onClickBtnCancelUpdate();
            onClickBtnEditProduct();
            onClickBtnUpdate();
        });

        function init(){
            $('#servicesTable').dataTable();
            $('.preview').hide();

            if($('#btnUpdateService').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateService').hide();
                $('#btnCancelUpdate').hide();
            }

            clearAll();
        }

        function onClickBtnEditProduct(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.service_id').val();//dapetin id per cell

                var name = cells.eq(0).text();
                var image = cells.eq(1).text();
                var desc = cells.eq(2).find('.service_desc').val();
                var price_s = cells.eq(3).text();
                var price_m = cells.eq(4).text();
                var price_l = cells.eq(5).text();
                var price_xl = cells.eq(6).text();
                var created_by = cells.eq(7).text();

                $('#txtId').val(id);
                $('#txtName').val(name);
                $('#txtDesc').val(desc);
                $('#txtPrice_S').val(price_s);
                $('#txtPrice_M').val(price_m);
                $('#txtPrice_L').val(price_l);
                $('#txtPrice_XL').val(price_xl);
                $('#txtCreatedby').val(created_by);
                $('#imgPreview').attr('src', '{{ asset('flux_asset/images/services') }}'+'/'+image);

                $('.preview').show();

                //if add btn and cancel btn is visible
                if($('#btnAddService').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddService').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdateService').show(500);
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

                if($('#btnUpdateService').is(':visible') && $(this).is(':visible') && $('.preview').is(':visible')){
                    $('#btnUpdateService').hide();
                    $(this).hide();
                    $('.preview').hide();

                    $('#btnAddService').show(500);
                    $('#btnCancel').show(500);
                }

                clearAll();
            });
        }

        function onClickBtnUpdate(){
            $('#btnUpdateService').click(function(e){
                e.preventDefault();

                var form = document.forms.namedItem("serviceForm");
                var formdata = new FormData(form);

                //ajax call
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    url: 'f_doupdateservice', // you need change it.
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

        function clearAll(){
            $('#serviceForm textarea').val('');
            $('[type="text"]').not('#txtCreatedby').val('');
            $('[name="image"]').val('');
        }
    </script>
@endsection