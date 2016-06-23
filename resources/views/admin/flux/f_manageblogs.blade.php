@extends('layouts.mainapp')

@section('content')
    {{-- Blog table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Blogs</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="blogsTable" class="table table-hover table-striped">
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($blogs) || is_object($blogs))
                            @foreach($blogs as $blog)
                                <tr>
                                    <td><input type="hidden" class="blog_id" value="{{ $blog->id }}" />{{ $blog->title }}</td>
                                    <td><input type="hidden" class="blog_desc" value="{{$blog->description}}" /> {{ substr($blog->description,0,50).'...' }}</td>
                                    <td>{{ $blog->date }}</td>
                                    <td>{{ $blog->image }}</td>
                                    <td>{{ $blog->created_by }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>{{ $blog->updated_at }}</td>
                                    <td>
                                        <span>
                                            <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>
                                            <form action="{{ url('f_blogs/'.$blog->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btnDelete"><i class="fa fa-btn fa-trash"></i></button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Blog table [END] --}}

    {{-- Blog Form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Blogs</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'blogForm', 'url'=>'/doaddblog','class'=>'form-horizontal','files'=>'true')) !!}
                <input type="hidden" name="txtId" />
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtTitle">Title</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtTitle', null, array('id'=>'txtTitle', 'class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtDesc">Description</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {{--<div class="desc-editor"></div>--}}
                        {{--<input type="hidden" id="txtDesc" name="txtDesc" />--}}
                        {!! Form::textarea('txtDesc', null, array('id'=>'txtDesc', 'class'=>'form-control', 'style'=>'height: 80px')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="image">Image</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::file('image', null, array('id'=>'image','class'=>'dropify', 'data-height'=>'300', 'data-max-file-size'=>'3M', 'data-allowed-file-extensions'=>'png')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtDate">Date</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="input-group date">
                            {!! Form::text('txtDate', null, array('id'=>'txtDate', 'class'=>'form-control','readonly'=>'true')) !!}
                            <span class="input-group-addon">
                                <span id="dateIcon" class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtCreatedby">Created By</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtCreatedby', session('login'), array('id'=>'txtCreatedby', 'class'=>'form-control', 'readonly'=>'true')) !!}
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Add Blog" type="submit" id="btnAddBlog" name="btnAddBlog" class="btn btn-success" />
                    <input value="Update Blog" type="submit" id="btnUpdateBlog" name="btnUpdateBlog" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- Blog Form [END] --}}

    <script type="text/javascript" src="{{ asset('flux_asset/js/admin/f_manageblogs.js') }}"></script>
@endsection