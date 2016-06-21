@extends('layouts.mainapp')

@section('content')
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add Instagram Account</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('url'=>'/doAddInstagram', 'class'=>'form-horizontal')) !!}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtInstagramID">Instagram ID</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtInstagramID', null, array('id'=>'txtInstagramID', 'class'=>'form-control')) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtInstagramPass">Instagram Password</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::password('txtInstagramPass', array('id'=>'txtInstagramPass', 'class'=>'form-control')) !!}
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 text-right">
                    <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection