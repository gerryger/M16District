{{-- resources/views/newtask.blade.php --}}

@extends('layouts.mainapp')

@section('content')
    <!-- Events table [START] -->
    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Current Events</strong></div>
        <div class="panel-body table-responsive">
            <table id="eventsTable" class="table table-hover table-striped" width="100%">
                <thead>
                    <th>Event Name</th>
                    <th>Page</th>
                    <th>Place</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->ev_name }}</td>
                            @if($event->ev_page == 'l')
                                <td>Landing Page</td>
                            @elseif($event->ev_page == 's')
                                <td>Subhaus</td>
                            @elseif($event->ev_page == 'm')
                                <td>Monroe</td>
                            @elseif($event->ev_page == 'p')
                                <td>Pitstop</td>
                            @elseif($event->ev_page == 'f')
                                <td>Flux</td>
                            @else
                                <td>{{ $event->ev_page }}</td>
                            @endif
                            <td>{{ $event->ev_place }}</td>
                            <td>{{ $event->ev_start }}</td>
                            <td>{{ $event->ev_end }}</td>
                            <td>{{ $event->ev_img }}</td>
                            <td>{{ substr($event->ev_desc,0,20).'...'  }}</td>
                            <td>
                                <form action="{{ url('/deleteevent/'.$event->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" id="delete-event-{{ $event->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                    |
                                    <button type="button" class="btn btn-primary viewEventBtn">
                                        <a href="#" style="text-decoration: none;color: white">View</a>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Events table [END] -->

    <div class="panel panel-primary" style="margin-top: 20px">
        <div class="panel-heading"><strong>Add New Events</strong></div>
        <div class="panel-body">
            <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Event Form -->
            {!! Form::open(array('url'=>'/doinsertevent', 'method'=>'post', 'class'=>'form-horizontal', 'files'=>'true')) !!}

                {{-- Page --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('page', 'Page', array('class'=>'control-label')) !!}
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
                    <div class="col-md-3 col-lg-3">
                        {!! Form::select('page', $pages, key($pages), array('class' => 'form-control') ) !!}
                    </div>
                </div>

                {{-- Event Name --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('eventname', 'Event Name', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtEventName', null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                {{-- Event Place --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('eventplace', 'Place', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtEventPlace', null, array('class' => 'form-control')) !!}
                    </div>
                </div>

                {{-- Start Date --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('startdate', 'Start', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="input-group date">
                            {!! Form::text('txtStartDate', null, array('class' => 'form-control', 'id'=>'txtStartDate')) !!}
                            <span class="input-group-addon">
                                <span id="startDateIcon" class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>

                {{-- End Date --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('enddate', 'End', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <div class="input-group date">
                            {!! Form::text('txtEndDate', null, array('class' => 'form-control', 'id'=>'txtEndDate')) !!}
                            <span class="input-group-addon">
                                    <span id="endDateIcon" class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                    </div>
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('imageLabel', 'Image', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image', null) !!}
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('description', 'Description', array('class' => 'control-label')) !!}

                    </div>
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::textarea('txtDescription',null, array('class' => 'form-control', 'style' => 'height: 80px')) !!}
                    </div>
                </div>

                <hr/>

                <div class="col-md-12 col-lg-12 text-right">
                    <input value="Add Event" type="submit" id="btnAddEvent" name="btnAddEvent" class="btn btn-success" />
                </div>

            <script type="text/javascript">
               $(function(){
                   $('.date').datetimepicker();
               });
            </script>
            {!! Form::close() !!}
        </div>
    </div>


    {{-- Modal view event [START] --}}
    <div class="modal fade" id="viewEventmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">

                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal view event [END] --}}


    <script type="text/javascript">
        $('.viewEventBtn').click(function(e){
            e.preventDefault();

            $('#viewEventmodal .modal-body').empty();

            //set up row and cells
            var row = $(this).closest('tr');
            var cells = row.find('td');//dapetin text per cell

            //get value per cell
            var eventName = cells.eq(0).text();
            var eventPage = cells.eq(1).text();
            var eventPlace = cells.eq(2).text();
            var eventStart = cells.eq(3).text();
            var eventEnd = cells.eq(4).text();
            var eventImg = cells.eq(5).text();
            var eventDesc = cells.eq(6).text();

            $('#myModalLabel').text(eventName);

            var modalBody = '<div class="row">'+
                                '<div class="col-sm-3 col-md-3 col-lg-3">'+
                                    '<img src="{{ asset('sbadmin/eventImages') }}/' + eventImg + ' " />'+
                                '</div>'+
                            '</div>'+
                            '<br/>'+
                            '<div class="row">'+
                                '<div class="col-sm-3 col-md-3 col-lg-3">'+
                                    '<label>Place</label>'+
                                '</div>'+
                                '<div class="col-sm-3 col-md-3 col-lg-3">'+
                                    '<input type="text" class="form-control" value="'+eventPlace+'" readonly/>'+
                                '</div>'+
                            '</div>'+
                            '<br/>'+
                            '<div class="row">'+
                                '<div class="col-sm-3 col-md-3 col-lg-3">'+
                                    '<label class="control-label">Period</label>'+
                                '</div>'+
                                '<div class="col-sm-7 col-md-7 col-lg-7">'+
                                    '<input type="text" class="form-control" value="'+eventStart+' ~ '+eventEnd+'" readonly/>'+
                                '</div>'+
                            '</div>'+
                            '<br/>'+
                            '<div class="row">'+
                                '<div class="col-sm-3 col-md-3 col-lg-3">'+
                                    '<label class="control-label">Description</label>'+
                                '</div>'+
                                '<div class="col-sm-3 col-md-3 col-lg-3">'+
                                    '<textarea class="form-control" style="width: 321px; height: 75px;" readonly="true">'+eventDesc+'</textarea>'+
                                '</div>'+
                            '</div>';

            $('#viewEventmodal .modal-body').append(modalBody);

            //show modal
            $('#viewEventmodal').modal('show');
        });
    </script>
@endsection