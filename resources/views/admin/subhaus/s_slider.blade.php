@extends('layouts.mainapp')

@section('content')
    <!-- Slides image table [START] -->
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Slider Item</strong></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="sliderItemTable" class="table table-striped table-hover" width="100%">
                    <thead>
                        <th>Image</th>
                        <th>Image 2</th>
                        <th>Heading</th>
                        <th>Heading Color</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($sliders) || is_object($sliders))
                            @foreach($sliders as $slider)
                                <tr>
                                    <td><input type="hidden" class="s_slider_id" value="{{$slider->id}}" />{{$slider->image}}</td>
                                    <td>{{$slider->image2}}</td>
                                    <td>{{$slider->heading}}</td>
                                    <td>{{$slider->headingColor}}</td>
                                    <td>{{$slider->created_by}}</td>
                                    <td>{{$slider->created_at}}</td>
                                    <td>{{$slider->updated_at}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>
                                        <form action="{{ url('s_slider/'.$slider->id) }}" method="POST">
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
    <!-- Slides image table [END] -->

    {{-- slider form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Slider Image</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'sliderForm', 'name'=>'sliderForm', 'url'=>'/s_doaddslider','class'=>'form-horizontal','files'=>'true')) !!}
            <input type="hidden" id="txtId" name="txtId" value="" />

            {{-- Image --}}
            <div class="form-group">
                <div class="col-md-3 col-lg-3">
                    <label class="control-label" for="image">Image</label>
                </div>
                <div class="col-md-3 col-lg-3">
                    {!! Form::file('image', null) !!}
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

            {{-- Heading --}}
            <div class="form-group">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label" for="txtHeading">Heading</label>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    {!! Form::text('txtHeading', null, array('id'=>'txtHeading', 'class'=>'form-control')) !!}
                </div>
            </div>

            {{-- Heading Color --}}
            <div class="form-group">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label" for="txtHeadingColor">Heading Color</label>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="input-group headingColor">
                        {!! Form::text('txtHeadingColor', '#0f0606', array('id'=>'txtHeadingColor', 'class'=>'form-control')) !!}
                        <span class="input-group-addon"><i></i></span>
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
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <img id="imgPreview" src=""  />
                </div>
            </div>

            {{-- Preview Image 2 --}}
            <div class="form-group preview">
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <label class="control-label" for="imgPreview">Preview Image 2</label>
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <img id="imgPreview2" src=""  />
                </div>
            </div>

            <div class="col-md-12 col-lg-12 text-right">
                <input value="Submit" type="submit" id="btnAddSlider" name="btnAddService" class="btn btn-success" />
                <input value="Update" type="button" id="btnUpdateSlider" name="btnUpdateService" class="btn btn-primary" />
                <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- slider form [END] --}}
    <script type="text/javascript">
        $(document).ready(function(e){
            init();
            onClickBtnEditSlider();
            onClickBtnCancelUpdate();
            onClickBtnCancel();
            onClickBtnUpdate();
        });

        function init(){
            $('#sliderItemTable').dataTable({
                'pageLength': 5
            });

            $('.headingColor').colorpicker();

            $('.preview').hide();

            if($('#btnUpdateSlider').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateSlider').hide();
                $('#btnCancelUpdate').hide();
            }

            clearAll();
        }

        function onClickBtnUpdate(){
            $('#btnUpdateSlider').click(function(e){
                e.preventDefault();

                var form = document.forms.namedItem("sliderForm");
                var formdata = new FormData(form);

                //ajax call
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    url: 's_doupdateslider', // you need change it.
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

                if($('#btnUpdateSlider').is(':visible') && $(this).is(':visible') && $('.preview').is(':visible')){
                    $('#btnUpdateSlider').hide();
                    $(this).hide();
                    $('.preview').hide();

                    $('#btnAddSlider').show(500);
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

        function onClickBtnEditSlider(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.s_slider_id').val();//dapetin id per cell

                var image = cells.eq(0).text();
                var image2 = cells.eq(1).text();

                $('#txtId').val(id);
                $('#imgPreview').attr('src', '{{ asset('subhaus_asset/images/slider') }}'+'/'+image);
                $('#imgPreview').attr('style', 'width: 687px;height: 464px');
                $('#imgPreview2').attr('src', '{{ asset('subhaus_asset/images/slider') }}'+'/'+image2);
                $('#imgPreview2').attr('style', 'width: 687px;height: 464px');
                $('.preview').show();

                //if add btn and cancel btn is visible
                if($('#btnAddSlider').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddSlider').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdateSlider').show(500);
                    $('#btnCancelUpdate').show(500);
                }
            });
        }

        function clearAll(){
            $('[name="image"]').val('');
            $('[name="image2"]').val('');
            $('#sliderForm input[type="text"]').not('#txtCreatedby').val('');
        }
    </script>
@endsection