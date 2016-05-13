{{-- resources/views/admin/addadmin.blade.php --}}

  {{--Created by PhpStorm.--}}
  {{--User: user--}}
  {{--Date: 2016-03-07--}}
  {{--Time: 7:36 AM--}}

@extends('layouts.mainapp')

@section('content')
    {{-- Admin Table [START]--}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Admins</strong></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="adminTable" class="table table-hover table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Page</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td><input type="hidden" class="admin_id" value="{{ $admin->id }}" /> {{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->password }}</td>
                                @if($admin->page == 'l')
                                    <td>Landing Page</td>
                                @elseif($admin->page == 's')
                                    <td>Subhaus</td>
                                @elseif($admin->page == 'm')
                                    <td>Monroe</td>
                                @elseif($admin->page == 'f')
                                    <td>Flux</td>
                                @elseif($admin->page == 'p')
                                    <td>Pitstop</td>
                                @endif
                                <td>{{ $admin->created_at }}</td>
                                <td>{{ $admin->updated_at }}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i>Edit</button>
                                    |
                                    <button type="submit" class="btn btn-danger btnDelete"><i class="fa fa-btn fa-trash"></i>Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Admin Table [END] --}}


    {{-- Add Admin Form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Admin</strong></div>
        <div class="panel-body">
            {!! Form::open(array('id'=>'addAdminForm', 'url'=>'/doaddadmin', 'role'=>'form', 'class'=>'form-horizontal', 'method'=>'post')) !!}
                <div class="form-group" id="grpAdminName">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('adminName', 'Name', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtAdminName', null, array('id'=>'txtAdminName', 'class'=>'form-control')) !!}
                        {{--<input type="text" id="txtAdminName" class="form-control" />--}}
                    </div>
                </div>
                <div class="form-group" id="grpAdminEmail">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('adminEmail', 'Email', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtAdminEmail', null, array('id'=>'txtAdminEmail', 'class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="form-group" id="grpAdminPass">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('adminPass', 'Password', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::password('txtAdminPassword', array('id'=>'txtAdminPassword', 'class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="form-group" id="grpAdminPage">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('adminPage', 'Page', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <?php
                            $pages = array('l' => 'Landing Page', 's' => 'Subhaus', 'm' => 'Monroe', 'p' => 'Pitstop', 'f' => 'Flux');
                        ?>
                        {!! Form::select('page', $pages, 'l', array('class' => 'form-control', 'id' => 'txtPage') ) !!}
                    </div>
                </div>

                <hr/>

                <div class="col-md-12 col-lg-12 text-right">
                    <input type="hidden" id="txtAdminID_hidden"/>
                    <input value="Add Admin" type="submit" id="btnAddAdmin" name="btnAddAdmin" class="btn btn-success" />
                    <input value="Update Admin" type="button" id="btnUpdateAdmin" name="btnUpdateAdmin" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- Add Admin Form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();

            onClickBtnDeleteAdmin();

            onClickBtnAddAdmin();

            onClickBtnEditAdmin();

            onClickBtnCancel();

            onClickBtnUpdateAdmin();
        });

        function init() {
            $('#adminTable').dataTable({
                'pageLength': 5
            });

            $('#txtAdminName').val('');
            $('#txtAdminEmail').val('');
            $('#txtAdminPassword').val('');

            if ($('#btnUpdateAdmin').is(':visible') && $('#btnCancel').is(':visible')) {
                $('#btnUpdateAdmin').hide();
                $('#btnCancel').hide();
            }
        }



        function onClickBtnAddAdmin(){
            $('#btnAddAdmin').click(function(e){
                e.preventDefault();

                var emailRegex = '.+\@.+\..+';

                //$('#addAdminForm').bootstrapValidator('validate');
                var name = $('#txtAdminName').val();
                var email = $('#txtAdminEmail').val();
                var pass = $('#txtAdminPassword').val();
                var page = $('#txtPage').val();
                var _token = $('input[name=_token]').val();

                if(name == ''){
                    alert('Admin name required!');
                    //$('#grpAdminName').addClass('has-error');
                } else if(email == '' ){
                    alert('Email required!');
                    //$('#grpAdminEmail').addClass('has-error');
                }else if(!email.match(emailRegex)){
                    alert('Invalid email format!');
                    //$('#grpAdminEmail').addClass('has-error');

                }else if(pass == ''){
                    alert('Pasword required!');
                    //$('#grpAdminPass').addClass('has-error');
                }else if(page == ''){
                    alert('Page required!');
                    //$('#grpAdminPage').addClass('has-error');
                }
                else {

                    $.ajax({
                        type: 'POST',
                        url: 'doaddadmin',
                        dataType: 'json',
                        data: {name: name, email: email, pass: pass, page: page, _token: _token},
                        success: function (res) {
                            if (res) {
                                window.location.reload();
                            } else {
                                alert(res.msg);
                            }
                        }
                    });
                }
            });
        }

        function onClickBtnDeleteAdmin(){
            $('.btnDelete').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.admin_id').val();//dapetin id per cell

                var admin_id = id;
                var _token = $('input[name=_token]').val();

                $.ajax({
                    type: 'POST',
                    url: 'dodeleteadmin',
                    dataType: 'json',
                    data: {admin_id: admin_id, _token: _token},
                    success: function(res){
                        if(res){
                            window.location.reload();
                        } else {
                            alert(res.msg);
                        }
                    }
                });
            });
        }

        function onClickBtnEditAdmin(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.admin_id').val();//dapetin id per cell

                var admin_id = id;
                var admin_name = cells.eq(0).text();
                var admin_email = cells.eq(1).text();
                var admin_password = cells.eq(2).text();

                $('#txtAdminID_hidden').val(admin_id);
                $('#txtAdminName').val(admin_name);
                $('#txtAdminEmail').val(admin_email);
                $('#txtAdminPassword').val(admin_password);

                if($('#btnAddAdmin').is(':visible')) {
                    $('#btnAddAdmin').hide();

                    $('#btnUpdateAdmin').show(500);
                    $('#btnCancel').show(500);
                }
            });
        }

        function onClickBtnCancel(){
            $('#btnCancel').click(function(e) {
                e.preventDefault();

                if ($('#btnUpdateAdmin').is(':visible') && $('#btnCancel').is(':visible')) {
                    $('#btnUpdateAdmin').hide();
                    $('#btnCancel').hide();

                    $('#btnAddAdmin').show(500);
                }
                clearAll();
            });
        }

        function onClickBtnUpdateAdmin(){
            $('#btnUpdateAdmin').click(function(e){
                e.preventDefault();

                var id = $('#txtAdminID_hidden').val();
                var name = $('#txtAdminName').val();
                var email = $('#txtAdminEmail').val();
                var pass = $('#txtAdminPassword').val();
                var _token = $('input[name=_token]').val();

                $.ajax({
                    type: 'POST',
                    url: 'doeditadmin',
                    dataType: 'json',
                    data: {id: id, name: name, email: email, pass: pass, _token: _token},
                    success: function(res){
                        if(res){
                            window.location.reload();
                        }else{
                            alert(res.msg);
                        }
                    }
                });
            });
        }




        function clearAll(){
            $('#txtAdminID_hidden').val('');
            $('#txtAdminName').val('');
            $('#txtAdminEmail').val('');
            $('#txtAdminPassword').val('');
        }
    </script>
@endsection
