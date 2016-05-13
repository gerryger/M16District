@extends('layouts.mainapp')

@section('content')
    {{-- promo event table [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Promo & Events</strong></div>
        <div class="panel-body">
            <div class="table-responsive" style="overflow-y: auto">
                <table id="eventPromoTable" class="table table-hover table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(is_array($eventpromos) || is_object($eventpromos))
                            @foreach($eventpromos as $eventpromo)
                                <tr>
                                    <td><input type="hidden" class="eventpromo_id" value="{{ $eventpromo->id }}" />{{ $eventpromo->name }}</td>
                                    <td>{{ $eventpromo->start }}</td>
                                    <td>{{ $eventpromo->end }}</td>
                                    <td>{{ $eventpromo->image }}</td>
                                    <td>{{ $eventpromo->description }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btnEdit"><i class="fa fa-btn fa-pencil"></i></button>|
                                        <form action="{{ url('f_eventpromo/'.$eventpromo->id) }}" method="POST">
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
    {{-- promo event table [END] --}}

    {{-- Event & promo Form [START] --}}
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add/Edit Events & Promos</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            {!! Form::open(array('id'=>'eventPromoForm', 'name'=>'eventPromoForm', 'url'=>'/f_doaddeventpromo','class'=>'form-horizontal','files'=>'true')) !!}
                <input type="hidden" id="txtId" name="txtId" value="" />

                {{-- Name --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtName">Name</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::text('txtName', null, array('id'=>'txtName', 'class'=>'form-control')) !!}
                    </div>
                </div>

                {{-- Start --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtStart">Start</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="input-group date">
                            {!! Form::text('txtStart', null, array('id'=>'txtStart', 'class'=>'form-control')) !!}
                            <span class="input-group-addon">
                                <span id="startDateIcon" class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- End --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtEnd">End</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <div class="input-group date">
                            {!! Form::text('txtEnd', null, array('id'=>'txtEnd', 'class'=>'form-control')) !!}
                            <span class="input-group-addon">
                                <span id="endDateIcon" class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        <label class="control-label" for="image">Image</label>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image', null) !!}
                    </div>
                </div>

                {{-- Desc --}}
                <div class="form-group">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="txtDesc">Description</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        {!! Form::textarea('txtDesc', null, array('id'=>'txtDesc', 'class'=>'form-control', 'style' => 'height: 80px')) !!}
                    </div>
                </div>

                {{-- Preview Image --}}
                <div class="form-group preview">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <label class="control-label" for="imgPreview">Preview Image</label>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                        <img id="imgPreview" src="" />
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Submit" type="submit" id="btnAddEventPromo" name="btnAddEventPromo" class="btn btn-success" />
                    <input value="Update" type="button" id="btnUpdateEventPromo" name="btnEditEventPromo" class="btn btn-primary" />
                    <input value="Cancel" type="button" id="btnCancel" name="btnCancel" class="btn btn-warning" />
                    <input value="Cancel Update" type="button" id="btnCancelUpdate" name="btnCancelUpdate" class="btn btn-warning" />
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    {{-- Event & promo Form [END] --}}

    <script type="text/javascript">
        $(document).ready(function(e){
            init();

            onClickBtnEditEventPromo();

            onClickBtnCancel();

            onClickBtnCancelUpdate();

            onClickBtnUpdate();
        });

        function init(){
            clearAll();

            $('#eventPromoTable').dataTable();
            $('.date').datetimepicker();

            $('.preview').hide();

            if($('#btnUpdateEventPromo').is(':visible') && $('#btnCancelUpdate').is(':visible')){
                $('#btnUpdateEventPromo').hide();
                $('#btnCancelUpdate').hide();
            }
        }

        function onClickBtnEditEventPromo(){
            $('.btnEdit').click(function(e){
                e.preventDefault();

                var row = $(this).closest('tr');
                var cells = row.find('td');//dapetin text per cell
                var id = cells.eq(0).find('.eventpromo_id').val();//dapetin id per cell

                var name = cells.eq(0).text();
                var start = cells.eq(1).text();
                var end = cells.eq(2).text();
                var image = cells.eq(3).text();
                var desc = cells.eq(4).text();

                $('#txtId').val(id);
                $('#txtName').val(name);
                $('#txtStart').val(start);
                $('#txtEnd').val(end);
                $('#imgPreview').attr('src', '{{ asset('flux_asset/images/eventpromo') }}'+'/'+image);
                $('#txtDesc').val(desc);

                $('.preview').show();

                //if add btn and cancel btn is visible
                if($('#btnAddEventPromo').is(':visible') && $('#btnCancel').is(':visible')){
                    //hide add btn and cancel btn
                    $('#btnAddEventPromo').hide();
                    $('#btnCancel').hide();

                    //show update btn and cancel update btn
                    $('#btnUpdateEventPromo').show(500);
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

        function onClickBtnCancelUpdate(){
            $('#btnCancelUpdate').click(function(e){
                e.preventDefault();

                if($('#btnUpdateEventPromo').is(':visible') && $(this).is(':visible') && $('.preview').is(':visible')){
                    $('#btnUpdateEventPromo').hide();
                    $(this).hide();
                    $('.preview').hide();

                    $('#btnAddEventPromo').show(500);
                    $('#btnCancel').show(500);
                }

                clearAll();
            });
        }

        function onClickBtnUpdate(){
            $('#btnUpdateEventPromo').click(function(e){
                e.preventDefault();

                var form = document.forms.namedItem("eventPromoForm");
                var formdata = new FormData(form);

                //ajax call
                $.ajax({
                    async: true,
                    type: "POST",
                    dataType: "json", // or html if you want...
                    contentType: false, // high importance!
                    url: 'f_updateeventpromo', // you need change it.
                    data: formdata, // high importance!
                    processData: false, // high importance!
                    success: function (res) {
                        if(res.status){
                            window.location.reload();
                        }else{
                            alert(res.msg);
                        }
                    },
                    timeout: 3000
                });
            });
        }

        function clearAll(){
            $('#txtId').val('');
            $('#txtName').val('');
            $('#txtStart').val('');
            $('#txtEnd').val('');
            $('#txtDesc').val('');
            $('[name="image"]').val('');
        }
    </script>
@endsection