@extends('layouts.mainapp')

@section('content')
    {{-- featured dish table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Featured Dishes</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="featuredDishTable" class="table table-hover table-striped">
                    <thead>
                        <th>Heading 1</th>
                        <th>Heading 2</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image 1</th>
                        <th>Image 2</th>
                        <th>Image 3</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($dishes) || is_object($dishes))
                            @foreach($dishes as $dish)
                                <tr>
                                    <td><input type="hidden" class="dish_id" value="{{ $dish->id }}"/>{{$dish->heading1}}</td>
                                    <td>{{$dish->heading2}}</td>
                                    <td>{{$dish->category}}</td>
                                    <td><input type="hidden" class="dish_description" value="{{ $dish->description }}"/>{{substr($dish->description,0,30).'...'}}</td>
                                    <td>{{$dish->image1}}</td>
                                    <td>{{$dish->image2}}</td>
                                    <td>{{$dish->image3}}</td>
                                    <td>{{$dish->created_by}}</td>
                                    <td>{{$dish->created_at}}</td>
                                    <td>{{$dish->updated_at}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>
                                        <form action="{{ url('s_featureddish/'.$dish->id) }}" method="POST">
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
    {{--featured dish table [END] --}}

    {{-- featured dish form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Featured Dish</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'featuredDishForm', 'name'=>'featuredDishForm', 'url'=>'/s_doaddorupdatefeatureddish','class'=>'form-horizontal','files'=>'true')) !!}
                <input type="hidden" id="txtId" name="txtId" value="" />

                {{-- Heading 1 --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtHeading1">Heading 1</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtHeading1', null, array('id'=>'txtHeading1', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Heading 2 --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtHeading2">Heading 2</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtHeading2', null, array('id'=>'txtHeading2', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Category --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtCategory">Category</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <?php $category = ['food1'=>'food1', 'food2'=>'food2', 'drinks'=>'drinks'] ?>
                        {!! Form::select('txtCategory', $category, null, array('id'=>'txtCategory', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtDescription">Description</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtDescription', null, array('id'=>'txtDescription', 'style' => 'height: 80px', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Image1 --}}
                <div class="form-group image1">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image1">Image 1</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image1', null) !!}
                    </div>
                </div>

                {{-- Image2 --}}
                <div class="form-group image2">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image2">Image 2</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image2', null) !!}
                    </div>
                </div>

                {{-- Image3 --}}
                <div class="form-group image3">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image3">Image 3</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image3', null) !!}
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

                {{-- Preview Image 1--}}
                <div class="form-group preview1">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="imgPreview1">Preview Image 1</label>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <img id="imgPreview1" src=""  />
                    </div>
                </div>

                {{-- Preview Image 2--}}
                <div class="form-group preview2">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="imgPreview2">Preview Image 2</label>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <img id="imgPreview2" src=""  />
                    </div>
                </div>

                {{-- Preview Image 3--}}
                <div class="form-group preview3">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="imgPreview3">Preview Image 3</label>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                        <img id="imgPreview3" src=""  />
                    </div>
                </div>

            <div class="col-md-12 col-lg-12 text-right">
                <input value="Submit" type="submit" id="btnAddFeatureddish" name="btnAddFeatureddish" class="btn btn-success" />
                <input value="Update" type="submit" id="btnUpdateFeatureddish" name="btnUpdateFeatureddish" class="btn btn-primary" />
                <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- featured dish form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();
            onChangeTxtCategory();
            onClickBtnEditFeatureddish();
            onClickBtnCancelUpdate();
        });

        function init(){
            $('#featuredDishTable').dataTable({
                'pageLength': 5
            });

            $('[class*="preview"]').hide();

            if($('#btnUpdateFeatureddish').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateFeatureddish').hide();
                $('#btnCancelUpdate').hide();
            }

            if($('#txtCategory').val() == 'food1'){
                if(!$('.image1').is(':visible')){
                    $('.image1').show(500);
                }
                $('.image2').hide();
                $('.image3').hide();
            }else if($('#txtCategory').val() == 'food2'){
                if(!$('.image2').is(':visible') || !$('.image1').is(':visible')){
                    $('.image1').show(500);
                    $('.image2').show(500);
                }
                $('.image3').hide();
            }else{
                if(!$('.image3').is(':visible') || !$('.image2').is(':visible') || !$('.image2').is(':visible')) {
                    $('.image1').show(500);
                    $('.image2').show(500);
                    $('.image3').show(500);
                }
            }

            clearAll();
        }

        function onChangeTxtCategory(){
            $('#txtCategory').on('blur', function(e){
                if($('#txtCategory').val() == 'food1'){
                    if(!$('.image1').is(':visible')){
                        $('.image1').show(500);
                    }
                    $('.image2').hide();
                    $('.image3').hide();
                }else if($('#txtCategory').val() == 'food2'){
                    if(!$('.image2').is(':visible') || !$('.image1').is(':visible')){
                        $('.image1').show(500);
                        $('.image2').show(500);
                    }
                    $('.image3').hide();
                }else{
                    $('.image1').show(500);
                    $('.image2').show(500);
                    $('.image3').show(500);
                }
            });
        }

        function onClickBtnEditFeatureddish(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell

                var id = cells.eq(0).find('.dish_id').val();//dapetin id per cell
                var heading1 = cells.eq(0).text();
                var heading2 = cells.eq(1).text();
                var category = cells.eq(2).text();
                var description = cells.eq(3).find('.dish_description').val();
                var image1 = cells.eq(4).text();
                var image2 = cells.eq(5).text();
                var image3 = cells.eq(6).text();
                var created_by = cells.eq(7).text();

                $('#txtId').val(id);
                $('#txtHeading1').val(heading1);
                $('#txtHeading2').val(heading2);
                $('#txtCategory').val(category);
                $('#txtDescription').val(description);
                $('#txtCreatedby').val(created_by);

                if(category == 'food1') {
                    $('#imgPreview1').attr('src', '{{ asset('subhaus_asset/images/featured_dishes') }}' + '/' + image1);
                    $('.preview1').show(500);
                }

                if(category == 'food2') {
                    $('#imgPreview1').attr('src', '{{ asset('subhaus_asset/images/featured_dishes') }}' + '/' + image1);
                    $('#imgPreview2').attr('src', '{{ asset('subhaus_asset/images/featured_dishes') }}' + '/' + image2);
                    $('.preview1').show(500);
                    $('.preview2').show(500);
                }

                if(category == 'drinks') {
                    $('#imgPreview1').attr('src', '{{ asset('subhaus_asset/images/featured_dishes') }}' + '/' + image1);
                    $('#imgPreview2').attr('src', '{{ asset('subhaus_asset/images/featured_dishes') }}' + '/' + image2);
                    $('#imgPreview3').attr('src', '{{ asset('subhaus_asset/images/featured_dishes') }}' + '/' + image3);
                    $('.preview1').show(500);
                    $('.preview2').show(500);
                    $('.preview3').show(500);
                }

                //if add btn and cancel btn is visible
                if($('#btnAddFeatureddish').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddFeatureddish').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdateFeatureddish').show(500);
                    $('#btnCancelUpdate').show(500);
                }
            });
        }

        function onClickBtnCancelUpdate(){
            $('#btnCancelUpdate').click(function(e){
                e.preventDefault();

                if($('#btnUpdateFeatureddish').is(':visible') && $(this).is(':visible') && $('[class*="preview"]').is(':visible')){
                    $('#btnUpdateFeatureddish').hide();
                    $(this).hide();
                    $('[class*="preview"]').hide();

                    $('#btnAddFeatureddish').show(500);
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
            $('[name="image1"]').val('');
            $('[name="image2"]').val('');
            $('[name="image3"]').val('');
            //$('#featuredDishForm input[type="text"]').not('#txtCreatedby').val('');
        }
    </script>
@endsection