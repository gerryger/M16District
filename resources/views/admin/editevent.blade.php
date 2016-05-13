{{-- resources/views/editevent.blade.php --}}

@extends('layouts.mainapp')

@section('content')
        <script type="text/javascript" src="{{ asset('sbadmin/js/editevent_js_own.js') }}"></script>
        <!-- Events table [START] -->

        <div class="panel panel-default" style="margin-top: 20px">
            <div class="panel-heading"><strong>Current Events</strong></div>
            <div class="panel-body">
                <table id="editEventsTable" class="table table-hover table-striped" width="100%">
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
                            <td><input type="hidden" class="event_id" value="{{ $event->id }}" /> {{ $event->ev_name }}</td>
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
                            <td>{{ $event->ev_desc  }}</td>
                            <td>
                                <button type="submit" id="edit-event-{{ $event->id }}" class="btn btn-primary btnedit">
                                    <i class="fa fa-btn fa-pencil"></i>Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Events table [END] -->


        {{-- Update Event Form [START] --}}
        <div id="editEventForm" class="panel panel-default" style="margin-top: 20px">
            <div class="panel-heading"><strong>Edit Event</strong></div>
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')
                <!-- New Event Form -->
                {!! Form::open(array('id' => 'editEventForm','url'=>'/doeditevent', 'method'=>'post', 'class'=>'form-horizontal', 'role' => 'form')) !!}

                {{-- Page --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3">
                        {!! Form::label('page', 'Page', array('class'=>'control-label')) !!}
                    </div>
                    <?php
                    $pages = array('l' => 'Landing Page', 's' => 'Subhaus', 'm' => 'Monroe', 'p' => 'Pitstop', 'f' => 'Flux');
                    ?>
                    <div class="col-md-3 col-lg-3">
                        {{-- ID (Hidden field) [START] --}}
                        {!! Form::hidden('eventID',null, array('id' => 'eventID')) !!}
                        {{-- ID (Hidden field) [END] --}}

                        {!! Form::select('page', $pages, 'l', array('class' => 'form-control', 'id' => 'page') ) !!}
                    </div>
                </div>

                {{-- Event Name --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('eventname', 'Event Name', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtEventName', null, array('class' => 'form-control', 'id' => 'txtEventName')) !!}
                    </div>
                </div>

                {{-- Event Place --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('eventplace', 'Event Place', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::text('txtEventPlace', null, array('class' => 'form-control', 'id' => 'txtEventPlace')) !!}
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
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('image', 'Image', array('class'=>'control-label')) !!}
                    </div>
                    <div class="col-md-3 col-lg-3">
                        {!! Form::file('image', null, array('class'=>'txtEventImage')) !!}
                    </div>
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::label('description', 'Description', array('class' => 'control-label')) !!}

                    </div>
                    <div class="col-md-3 col-lg-3 ">
                        {!! Form::textarea('txtDescription',null, array('class' => 'form-control', 'style' => 'height: 80px', 'id' => 'txtDescription')) !!}
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
        {{-- Update Event Form [END] --}}
@endsection