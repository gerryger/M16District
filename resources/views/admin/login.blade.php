

{{-- resources/views/login.blade.php --}}

@extends('layouts.app')

@section('content')
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <h1>Welcome to M16 Admin Page</h1>
        <div class="panel panel-info" >
            <div class="panel-heading">

                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a></div>

            </div>

            <div style="padding-top:30px" class="panel-body" >

                <!-- Display Validation Errors -->
                @include('common.errors')

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                {!! Form::open(array('url'=>'/login')) !!}

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        {{--<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">--}}

                        {!! Form::text('email',null, ['class'=>'form-control', 'id'=>'login-email', 'placeholder'=>'Email']) !!}
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        {{--<input id="login-password" type="password" class="form-control" name="password" placeholder="password">--}}

                        {!! Form::password('password', ['class'=>'form-control', 'id'=>'login-password', 'placeholder'=>'Password']) !!}
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            {{--<input id="btn-login" type="submit" class="btn btn-success" value="Login"/>--}}

                            {!! Form::submit('Login', ['class'=>'btn btn-success', 'id'=>'btn-login']) !!}

                                    <!--                                <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                        </div>
                    </div>

                    {{-- add new admin --}}

                    {{--<div class="form-group">--}}
                        {{--<div class="col-md-12 control">--}}
                            {{--<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >--}}
                                {{--Don't have an account!--}}
                                {{--<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">--}}
                                    {{--Sign Up Here--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {!! Form::close() !!}

            </div>

        </div>

    </div>

    {{--<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">--}}

        {{--<div class="panel panel-info">--}}

            {{--<div class="panel-heading">--}}
                {{--<div class="panel-title">Sign Up</div>--}}
                {{--<div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>--}}
            {{--</div>--}}

            {{--<div class="panel-body" >--}}
                {{----}}
                {{----}}
                {{----}}
            {{--</div>--}}
            {{----}}
        {{--</div>--}}
        {{----}}
    {{--</div>--}}

    {{-- forgotPasswordModal [START] --}}
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control" id="txtEmail" placeholder="Input Your Email Here">
                            <p class="help-block">Temporary Password Will be Sent to Your Email</p>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="btnForgotPassword" class="btn btn-primary">Save changes</button>
                    <img src="{{ asset('landingpage_asset/images/loading.gif') }}" id="imgLoading" style="display:none" />
                </div>
            </div>
        </div>
    </div>
    {{-- forgotPasswordModal [END] --}}

    <script type="text/javascript">
        $(document).ready(function(){
            $('#txtEmail').val('');

            $('#btnForgotPassword').click(function(e){
                e.preventDefault();

                $('#imgLoading').show();
                $(this).hide();

                $.ajax({
                    type:'post',
                    url: 'doforgotpassword',
                    dataType: 'json',
                    data: {email: $('#txtEmail').val().trim(), _token: $('input[name=_token]').val()},
                    success: function(res){
                        $('#imgLoading').hide();
                        $(this).show();
                        if(res){
                            window.location.reload();
                            //alert(res.msg);
                        }else{

                            alert(res.msg);
                        }
                    }
                });
            });
        });
    </script>
@endsection
