@extends('layouts.mainapp')

@section('content')
    {{-- About us table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>About Us</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="aboutusTable" class="table table-hover table-striped">
                    <thead>
                        <th>About</th>
                        <th>Font Family</th>
                        <th>Color</th>
                        <th>Font Size</th>
                        <th>Instagram</th>
                        <th>Image 1</th>
                        <th>Caption Image 1</th>
                        <th>Image 2</th>
                        <th>Caption Image 2</th>
                        <th>Image 3</th>
                        <th>Caption Image 3</th>
                        <th>Image 4</th>
                        <th>Caption Image 4</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </thead>
                    <tbody>
                        @if(is_array($abouts) || is_object($abouts))
                            @foreach($abouts as $about)
                                <tr>
                                    <td><input type="hidden" class="about_id" value="{{ $about->id }}" />{{$about->about}}</td>
                                    <td>{{$about->fontFamily}}</td>
                                    <td>{{$about->color}}</td>
                                    <td>{{$about->fontSize}}</td>
                                    <td>{{$about->instagram}}</td>
                                    <td>{{$about->image1}}</td>
                                    <td>{{$about->caption_image1}}</td>
                                    <td>{{$about->image2}}</td>
                                    <td>{{$about->caption_image2}}</td>
                                    <td>{{$about->image3}}</td>
                                    <td>{{$about->caption_image3}}</td>
                                    <td>{{$about->image4}}</td>
                                    <td>{{$about->caption_image4}}</td>
                                    <td>{{substr($about->created_at,0,10)}}</td>
                                    <td>{{substr($about->updated_at,0,10)}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- About us table [END] --}}

    {{-- About us Form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit About Us</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'aboutusForm', 'url'=>'/doaddaboutus','class'=>'form-horizontal','files'=>'true')) !!}
                {{--About--}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtAbout">About</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtAbout', null, array('id'=>'txtAbout', 'class'=>'form-control', 'style'=>'height: 80px')) !!}
                    </div>
                </div>

                {{-- Font Family --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblFontFamily', 'Font Family', array('class'=>'control-label')) !!}
                    </div>
                    <?php
                    $fontFamily = array('default'=>'Default','monospace'=>'Monospace', 'helvetica'=>'Helvetica', 'courier'=>'Courier');
                    ?>
                    <div class="col-md-5 col-lg-5">
                        {!! Form::select('fontFamily', $fontFamily, 'helvetica', array('class' => 'form-control', 'id' => 'fontFamily') ) !!}
                    </div>
                </div>

                {{-- Color --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblColor', 'Color', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        <div class="input-group color1">
                            {!! Form::text('txtColor','#0f0606', array('class' => 'form-control', 'id' => 'txtColor')) !!}
                            <span class="input-group-addon"><i></i></span>
                            {{--{{ Form::input('color', 'color', null, array('class' => 'input-big')) }}--}}
                        </div>
                    </div>
                </div>

                {{-- Font Size --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblFontsize', 'Font Size', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        {!! Form::text('txtFontSize',null, array('class' => 'form-control', 'id' => 'txtFontSize')) !!}
                    </div>
                </div>

                {{-- Instagram --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblInstagram', 'Instagram URL', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        {!! Form::text('txtInstagram',null, array('class' => 'form-control', 'id' => 'txtInstagram')) !!}
                    </div>
                </div>

                {{-- Image 1 --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="image1">Image 1</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::file('image1', array('class'=>'dropify', 'data-height'=>'300', 'data-max-file-size'=>'3M')) !!}
                    </div>
                </div>

                {{-- Caption Image 1 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblCaptionImage1', 'Caption Image 1', array('class'=>'control-label', 'for'=>'txtCaptionImage1')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        {!! Form::text('txtCaptionImage1',null, array('class' => 'form-control', 'id' => 'txtCaptionImage1')) !!}
                    </div>
                </div>

                {{-- Image 2 --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="image2">Image 2</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::file('image2', array('class'=>'dropify', 'data-height'=>'300', 'data-max-file-size'=>'3M')) !!}
                    </div>
                </div>

                {{-- Caption Image 2 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblCaptionImage2', 'Caption Image 2', array('class'=>'control-label', 'for'=>'txtCaptionImage2')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        {!! Form::text('txtCaptionImage2',null, array('class' => 'form-control', 'id' => 'txtCaptionImage2')) !!}
                    </div>
                </div>

                {{-- Image 3 --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="image3">Image 3</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::file('image3', array('class'=>'dropify', 'data-height'=>'300', 'data-max-file-size'=>'3M')) !!}
                    </div>
                </div>

                {{-- Caption Image 3 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblCaptionImage3', 'Caption Image 3', array('class'=>'control-label', 'for'=>'txtCaptionImage3')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        {!! Form::text('txtCaptionImage3',null, array('class' => 'form-control', 'id' => 'txtCaptionImage3')) !!}
                    </div>
                </div>

                {{-- Image 4 --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="image4">Image 4</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::file('image4', array('class'=>'dropify', 'data-height'=>'300', 'data-max-file-size'=>'3M')) !!}
                    </div>
                </div>

                {{-- Caption Image 4 --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblCaptionImage4', 'Caption Image 4', array('class'=>'control-label', 'for'=>'txtCaptionImage4')) !!}
                    </div>

                    <div class="col-md-5 col-lg-5">
                        {!! Form::text('txtCaptionImage4',null, array('class' => 'form-control', 'id' => 'txtCaptionImage4')) !!}
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Add" type="submit" id="btnAddAbout" name="btnAddAbout" class="btn btn-success" />
                    <input value="Update" type="button" id="btnUpdateAbout" name="btnUpdateAbout" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- About us Form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();
        });

        function init(){
            //init colorpicker
            $('.color1').colorpicker();

            //init datatable
            $('#aboutusTable').dataTable({
                'pageLength':10
            });

            //init dropify
            $('.dropify').dropify();

            if($('#btnUpdateAbout').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateAbout').hide();
                $('#btnCancelUpdate').hide();
            }
        }
    </script>
@endsection