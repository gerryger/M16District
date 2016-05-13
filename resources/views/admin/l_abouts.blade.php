@extends('layouts.mainapp')

@section('content')
    <!-- Table [START] -->
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Current Displayed About Us</strong></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="currentAboutTable" class="table table-hover table-striped" style="width: 100%">
                    <thead>
                        <th>Page</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>About</th>
                        <th>URL</th>
                        <th>href</th>
                        <th>Font Family</th>
                        <th>Color</th>
                        <th>Font Size</th>
                        <th>Instagram</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($abouts) || is_object($abouts))
                            @foreach($abouts as $about)
                                <tr>
                                    <td><input type="hidden" class="about_id" value="{{ $about->id }}" /> {{ $about->page }}</td>
                                    <td>{{ $about->img }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td>{{ $about->about }}</td>
                                    <td>{{ $about->url }}</td>
                                    <td>{{ $about->href }}</td>
                                    <td>{{ $about->fontfamily }}</td>
                                    <td>{{ $about->color }}</td>
                                    <td>{{ $about->fontsize }}</td>
                                    <td>{{ $about->instagram }}</td>
                                    <td>
                                        <form action="/deleteabout/{{$about->id}}" method="POST">
                                            {!! csrf_field() !!}
                                            {!! method_field('DELETE') !!}
                                            <button type="button" id="edit-{{ $about->id }}" class="btn btn-primary btnedit">
                                                <i class="fa fa-btn fa-pencil"></i>Edit
                                            </button>
                                            |
                                            <button type="submit" id="delete-{{ $about->id }}" class="btn btn-danger btndelete">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
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
    <!-- Table [END] -->

    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add New Abouts</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Abouts Form [START] -->
            {!! Form::open(array('url'=>'/doaddaboutus', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>'true')) !!}
                {{-- Page --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label">Page</label>
                    </div>
                    <?php
                    $sessPage = session('page');

                    if($sessPage == 'l')
                        $pages = array('l'=>'Landing Page');
                    else if($sessPage == 's')
                        $pages = array('s'=>'Subhaus');
                    else if($sessPage == 'm')
                        $pages = array('m'=>'Monroe');
                    else if($sessPage == 'f')
                        $pages = array('f'=>'Flux');
                    else if($sessPage == 'p')
                        $pages = array('p'=>'Pitstop');
                    else
                        $pages = array('l'=>'Landing Page', 's'=>'Subhaus', 'm'=>'Monroe', 'f'=>'Flux', 'p'=>'Pitstop');
                    ?>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::select('page', $pages, key($pages), array('class' => 'form-control', 'id' => 'page') ) !!}
                    </div>
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label">Image</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::file('image', null) !!}
                    </div>
                </div>

                {{-- Title --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label">Title</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtTitle', null, array('class'=>'form-control', 'id'=>'txtTitle')) !!}
                    </div>
                </div>


                {{-- About --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label">About</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtAbout', null, array('class'=>'form-control','style' => 'height: 80px', 'id'=>'txtAbout')) !!}
                    </div>
                </div>


                {{-- URL --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label">URL</label>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtUrl', null, array('class'=>'form-control', 'id'=>'txtUrl')) !!}
                    </div>
                </div>

                {{-- href --}}
                <div class="form-group">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label">Href</label>
                    </div>
                    <?php $href = array('m16district'=>'m16district', 'subhaus'=>'subhaus', 'flux'=>'flux', 'pitstop'=>'pitstop', 'monroe'=>'monroe'); ?>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        {!! Form::select('href', $href, 'm16district', array('class'=>'form-control', 'id'=>'href')) !!}
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

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Submit" type="submit" id="btnInsertAboutUs" name="btnInsertAboutUs" class="btn btn-success" />
                </div>

            {!! Form::close() !!}
            <!-- New Abouts Form [END] -->
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(e){
            //init tinyMCE
            tinymce.init({
                selector:'textarea',
                max_width: 700
            });

            //init colorpicker
            $('.color1').colorpicker();

            //init datatable
            $('table#currentAboutTable').dataTable({
                'pageLength':10
            });
        });
    </script>
@endsection