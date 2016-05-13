@extends('layouts.mainapp')

@section('content')
    {{-- pricing table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Menu & Pricing</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="pricingTable" class="table table-hover table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($pricings) || is_object($pricings))
                            @foreach($pricings as $pricing)
                                <tr>
                                    <td><input type="hidden" class="pricing_id" value="{{$pricing->id}}" />{{$pricing->name}}</td>
                                    <td>{{$pricing->price}}</td>
                                    <td>{{$pricing->category}}</td>
                                    <td>{{$pricing->image}}</td>
                                    <td>{{$pricing->created_by}}</td>
                                    <td>{{$pricing->created_at}}</td>
                                    <td>{{$pricing->updated_at}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>|
                                        <form action="{{ url('s_pricing/'.$pricing->id) }}" method="POST">
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
    {{-- pricing table [END] --}}

    {{-- pricing form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Pricing</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'pricingForm', 'name'=>'pricingForm', 'url'=>'/s_doaddpricing','class'=>'form-horizontal','files'=>'true')) !!}
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

                {{-- Price --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtPrice">Price</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="input-group">
                            <span class="input-group-addon">IDR</span>
                            {!! Form::text('txtPrice', null, array('id'=>'txtPrice', 'class'=>'form-control')) !!}
                            <span class="input-group-addon">K</span>
                        </div>
                    </div>
                </div>

                {{-- Category --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtCategory">Category</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <?php $category = ['food'=>'food', 'beverages'=>'beverages'] ?>
                        {!! Form::select('txtCategory', $category, null, array('id'=>'txtCategory', 'class'=>'form-control')) !!}
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
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <img id="imgPreview" src=""  />
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Submit" type="submit" id="btnAddPricing" name="btnAddPricing" class="btn btn-success" />
                    <input value="Update" type="button" id="btnUpdatePricing" name="btnUpdatePricing" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- pricing form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();
            onClickBtnEditPricing();
            onClickBtnCancelUpdate();
            onClickBtnCancel();
            onClickBtnUpdate();
        });

        function init(){
            $('#pricingTable').dataTable({
                'pageLength': 5
            });

            $('.preview').hide();

            if($('#btnUpdatePricing').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdatePricing').hide();
                $('#btnCancelUpdate').hide();
            }

            clearAll();
        }

        function onClickBtnEditPricing(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.pricing_id').val();//dapetin id per cell

                var name = cells.eq(0).text();
                var price = cells.eq(1).text();
                var category = cells.eq(2).text();
                var image = cells.eq(3).text();
                var createdby = cells.eq(4).text();

                $('#txtId').val(id);
                $('#txtName').val(name);
                $('#txtPrice').val(price);
                $('#txtCategory').val(category);
                $('#imgPreview').attr('src', '{{asset('subhaus_asset/images/pricing')}}'+'/'+image);
                $('#txtCreatedby').val(createdby);
                $('.preview').show();

                //if add btn and cancel btn is visible
                if($('#btnAddPricing').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddPricing').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdatePricing').show(500);
                    $('#btnCancelUpdate').show(500);
                }
            });
        }

        function onClickBtnUpdate(){
            $('#btnUpdatePricing').click(function(e){
                e.preventDefault();

                var form = document.forms.namedItem("pricingForm");
                var formdata = new FormData(form);

                //ajax call
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    url: 's_doupdatepricing', // you need change it.
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

        function onClickBtnCancelUpdate(){
            $('#btnCancelUpdate').click(function(e){
                e.preventDefault();

                if($('#btnUpdatePricing').is(':visible') && $(this).is(':visible') && $('.preview').is(':visible')){
                    $('#btnUpdatePricing').hide();
                    $(this).hide();
                    $('.preview').hide();

                    $('#btnAddPricing').show(500);
                    $('#btnCancel').show(500);
                }

                clearAll();
            });
        }

        function onClickBtnCancel(){
            $('#btnCancel').click(function(e){
                e.preventDefault();

                clearAll();
            });
        }

        function clearAll(){
            $('[name="image"]').val('');
            $('#pricingForm input[type="text"]').not('#txtCreatedby').val('');
        }
    </script>
@endsection