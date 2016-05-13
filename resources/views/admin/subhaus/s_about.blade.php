@extends('layouts.mainapp')

@section('content')
    {{-- about table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>About Us</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="aboutUsTable" class="table table-hover table-striped">
                    <thead>
                        <th>About</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Image 4</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    @if(is_array($abouts) || is_object($abouts))
                        @foreach($abouts as $about)
                            <tr>
                                <td><input type="hidden" class="about_id" value="{{$about->id}}" /><input type="hidden" class="about" value="{{$about->about}}" />{{substr($about->about, 0, 50)}}</td>
                                <td>{{$about->image1}}</td>
                                <td>{{$about->image2}}</td>
                                <td>{{$about->image3}}</td>
                                <td>{{$about->image4}}</td>
                                <td>{{$about->created_by}}</td>
                                <td>{{$about->created_at}}</td>
                                <td>{{$about->updated_at}}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>
                                    <form action="{{ url('s_about/'.$about->id) }}" method="POST">
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
    {{-- about table [END] --}}

    {{-- about form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit About</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'aboutForm', 'name'=>'aboutForm', 'url'=>'/s_doaddabout','class'=>'form-horizontal','files'=>'true')) !!}
                <input type="hidden" id="txtId" name="txtId" value="" />

                {{-- About --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtAbout">About</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtAbout', null, array('id'=>'txtAbout', 'style' => 'height: 80px', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Image 1 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image1">Image</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image1', null) !!}
                    </div>
                </div>

                {{-- Image 2 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image">Image 2</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image2', null) !!}
                    </div>
                </div>

                {{-- Image 3 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image">Image 3</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image3', null) !!}
                    </div>
                </div>

                {{-- Image 4 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image">Image 4</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image4', null) !!}
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
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                        <div class="img-section">
                            <img id="imgPreview1" src="" />
                            <img id="imgPreview2" src="" />
                            <div style="margin-top: 5px;"></div>
                            <img id="imgPreview3" src="" />
                            <img id="imgPreview4" src="" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Submit" type="submit" id="btnAddAbout" name="btnAddAbout" class="btn btn-success" />
                    <input value="Update" type="button" id="btnUpdateAbout" name="btnUpdateAbout" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- about form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();
            onClickBtnCancel();
            onClickBtnEditAbout();
            onClickBtnCancelUpdate();
            onClickBtnUpdate();
        });

        function init(){
            $('#aboutUsTable').dataTable();
            $('.preview').hide();

            if($('#btnUpdateAbout').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateAbout').hide();
                $('#btnCancelUpdate').hide();
            }

            clearAll();
        }

        function onClickBtnUpdate(){
            $('#btnUpdateAbout').click(function(e){
                e.preventDefault();

                var form = document.forms.namedItem("aboutForm");
                var formdata = new FormData(form);

                //ajax call
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    url: 's_doupdateabout', // you need change it.
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

                if($('#btnUpdateAbout').is(':visible') && $(this).is(':visible') && $('.preview').is(':visible')){
                    $('#btnUpdateAbout').hide();
                    $(this).hide();
                    $('.preview').hide();

                    $('#btnAddAbout').show(500);
                    $('#btnCancel').show(500);
                }

                clearAll();
            });
        }

        function onClickBtnEditAbout(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.about_id').val();//dapetin id per cell

                var about = cells.eq(0).find('.about').val();
                var image1 = cells.eq(1).text();
                var image2 = cells.eq(2).text();
                var image3 = cells.eq(3).text();
                var image4 = cells.eq(4).text();
                var created_by = cells.eq(5).text();

                $('#txtId').val(id);
                $('#txtAbout').val(about);
                $('#txtCreatedby').val(created_by);
                $('#imgPreview1').attr('src', '{{ asset('subhaus_asset/images/about') }}'+'/'+image1);
                $('#imgPreview2').attr('src', '{{ asset('subhaus_asset/images/about') }}'+'/'+image2);
                $('#imgPreview3').attr('src', '{{ asset('subhaus_asset/images/about') }}'+'/'+image3);
                $('#imgPreview4').attr('src', '{{ asset('subhaus_asset/images/about') }}'+'/'+image4);

                $('.preview').show();

                //if add btn and cancel btn is visible
                if($('#btnAddAbout').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddAbout').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdateAbout').show(500);
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

        function clearAll(){
            $('#aboutForm input[name="image"]').val('');
            $('#aboutForm textarea').val('');
        }
    </script>
@endsection