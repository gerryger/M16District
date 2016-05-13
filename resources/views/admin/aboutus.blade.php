
@extends('layouts.mainapp')

@section('content')
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Current Displayed About Us</strong></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="currentAboutTable" class="table table-hover table-striped" width="100%">
                    <thead>
                        <th>Page</th>
                        <th>About</th>
                        <th>Font Family</th>
                        <th>Color</th>
                        <th>Font Size</th>
                    </thead>
                    <tbody>
                        @if(is_array($abouts) || is_object($abouts))
                            @foreach($abouts as $about)
                                <tr>
                                    @if($about->page == 'l')
                                        <td>Landing Page</td>
                                    @elseif($about->page == 's')
                                        <td>Subhaus</td>
                                    @elseif($about->page == 'm')
                                        <td>Monroe</td>
                                    @elseif($about->page == 'p')
                                        <td>Pitstop</td>
                                    @elseif($about->page == 'f')
                                        <td>Flux</td>
                                    @else
                                        <td>{{$about->page}}</td>
                                    @endif
                                    <td>{{$about->about}}</td>
                                    <td>{{$about->fontfamily}}</td>
                                    <td>{{$about->color }}</td>
                                    <td>{{$about->fontsize }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add About Us</strong></div>
        <div class="panel-body">
            {{--Display Validation Errors--}}
            @include('common.errors')

            {{-- Add About Us Form --}}
            {!! Form::open(array('id'=>'aboutUsForm', 'url'=>'/doaddaboutus', 'class'=>'form-horizontal', 'role'=>'form')) !!}

                {{-- Page --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblPage','Page', array('class'=>'control-label')) !!}
                    </div>

                    <?php
                        if(session('page') == 'l'){
                            $pages = array('l' => 'Landing Page');
                        }else if(session('page') == 's'){
                            $pages = array('s' => 'Subhaus');
                        }else if(session('page') == 'm'){
                            $pages = array('m' => 'Monroe');
                        }else if(session('page') == 'p'){
                            $pages = array('p' => 'Pitstop');
                        }else if(session('page') == 'f'){
                            $pages = array('f' => 'Flux');
                        }else{
                            // page == '*', superadmin

                            $pages = array('l' => 'Landing Page', 's' => 'Subhaus', 'm' => 'Monroe', 'p' => 'Pitstop', 'f' => 'Flux');
                        }
                    ?>

                    <div class="col-md-3 col-lg-3">
                        {!! Form::select('page', $pages, '0', array('class' => 'form-control', 'id' => 'page') ) !!}
                        <input type="hidden" name="txtPage" id="txtPage" value="" />
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
                    <div class="col-md-3 col-lg-3">
                        {!! Form::select('fontFamily', $fontFamily, 'helvetica', array('class' => 'form-control', 'id' => 'fontFamily') ) !!}
                    </div>
                </div>

                {{-- Color --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblColor', 'Color', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-3 col-lg-3">
                        <div class="input-group color1">
                            {!! Form::text('txtColor','#0f0606', array('class' => 'form-control', 'id' => 'txtColor')) !!}
                            <span class="input-group-addon"><i></i></span>
                            {{--{{ Form::input('color', 'color', null, array('class' => 'input-big')) }}--}}
                        </div>
                    </div>
                </div>

                {{-- Color --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblFontsize', 'Font Size', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtFontSize',null, array('class' => 'form-control', 'id' => 'txtFontSize')) !!}
                    </div>
                </div>

                {{-- Instagram --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblInstagram', 'Instagram', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtInstagram',null, array('class' => 'form-control', 'id' => 'txtInstagram')) !!}
                    </div>
                </div>

                {{-- About Us --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('lblAboutUs', 'About Us', array('class'=>'control-label')) !!}
                    </div>

                    <div class="col-md-3 col-lg-3">
                        {!! Form::textarea('txtAboutUs',null, array('class' => 'form-control', 'style' => 'height: 80px', 'id' => 'txtAboutUs')) !!}
                    </div>
                </div>

                <hr/>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Submit" type="submit" id="btnUpdateAboutUs" name="btnUpdateAboutUs" class="btn btn-success" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(e){

            $('.color1').colorpicker();

            var page = $('#page').val();
            $('#txtPage').val(page);

            $('#page').on('change', function(e){
                var page = $(this).val();

                $('#txtPage').val(page);
            });
        });
    </script>
@endsection