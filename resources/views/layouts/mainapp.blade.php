<!--/**
 * Created by PhpStorm.
 * User: user
 * Date: 2016-02-29
* Time: 1:42 PM
*/-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}" />--}}

    <title>M16 Admin - Main Page</title>

    <!-- Bootstrap Core CSS -->
    <!--<link rel="stylesheet" href="../resources/assets/sbadmin/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('sbadmin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- MetisMenu CSS -->
    <!-- <link href="../resources/assets/sbadmin//bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->
    <link href="{{ asset('sbadmin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="../resources/assets/sbadmin/dist/css/sb-admin-2.css" rel="stylesheet"> -->
    <link href="{{ asset('sbadmin/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="../resources/assets/sbadmin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('sbadmin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Datatable css -->
    <link href="{{ asset('sbadmin/bower_components/datatables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin/bower_components/datatables/media/css/dataTables.foundation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin/bower_components/datatables/media/css/dataTables.jqueryui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sbadmin/bower_components/datatables/media/css/jquery.dataTables_themeroller.css') }}" rel="stylesheet">

    <!-- Bootstrap Validator -->
    <link rel="stylesheet" href="{{ asset('sbadmin/bootstrap-validator/bootstrapValidator.min.css') }}">

    <!-- jQuery -->
    <!-- <script src="../resources/assets/sbadmin/bower_components/jquery/dist/jquery.min.js"></script> -->
    <script src="{{ asset('sbadmin/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- BS Datepicker [START] -->
    <script src="{{ asset('sbadmin/bower_components/moment/min/moment.min.js') }}"></script>
    <link href="{{ asset('sbadmin/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('sbadmin/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <!-- BS Datepicker [END] -->


    <!-- Mjolnic bootstrap colorpicker [START] -->
    <link rel="stylesheet" href="{{ asset('sbadmin/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" />
    <script type="text/javascript" src="{{ asset('sbadmin/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Mjolnic bootstrap colorpicker [END] -->

    <!-- Trumbowyg[START] -->
    <link rel="stylesheet" href="{{asset('flux_asset/js/bower_components/trumbowyg/dist/ui/trumbowyg.min.css')}}" />
    <script type="text/javascript" src="{{asset('flux_asset/js/bower_components/trumbowyg/dist/trumbowyg.min.js')}}"></script>
    <!-- Trumbowyg[END] -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="../resources/assets/sbadmin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <script src="{{ asset('sbadmin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <!-- <script src="../resources/assets/sbadmin/bower_components/metisMenu/dist/metisMenu.min.js"></script> -->
    <script src="{{ asset('sbadmin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    {{--<script src="../resources/assets/sbadmin/dist/js/sb-admin-2.js"></script>--}}
    <script src="{{ asset('sbadmin/dist/js/sb-admin-2.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    {{--<script src="../resources/assets/sbadmin/bower_components"></script>--}}
    <script src="{{ asset('sbadmin/bower_components') }}"></script>

    <!-- Data Table js -->
    <script src="{{ asset('sbadmin/bower_components/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('sbadmin/bower_components/datatables/media/js/dataTables.foundation.min.js') }}"></script>
    <script src="{{ asset('sbadmin/bower_components/datatables/media/js/dataTables.jqueryui.min.js') }}"></script>
    <script src="{{ asset('sbadmin/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

    <!-- Jquery-notebook -->
    <link rel="stylesheet" href="{{ asset('sbadmin/bower_components/jquery-notebook/build/jquery.notebook.min.css') }}" />
    <script type="text/javascript" src="{{ asset('sbadmin/bower_components/jquery-notebook/build/jquery.notebook.min.js') }}"></script>

    <!-- Dropify -->
    <link rel="stylesheet" href="{{ asset('landingpage_asset/bower_components/dropify/dist/css/dropify.min.css') }}" />
    <script type="text/javascript" src="{{ asset('landingpage_asset/bower_components/dropify/dist/js/dropify.min.js') }}"></script>

</head>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">M16 Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        @if(Session::has('login'))
                            {{ Session::get('login') }}
                        @endif
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"></li>--}}
                        <li>
                            <a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <?php $page = Session::get('page') ?>
                        @if($page == 'l' || $page == '*')
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Landing Page<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/aboutus') }}">About Us</a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Events<span class="fa arrow"></span></a>--}}
                                    {{--<ul class="nav nav-second-level">--}}
                                        {{--<li>--}}
                                            {{--<a href="{{ url('/newevent') }}">Add Event</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="{{ url('/editevent') }}">Edit Event</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                    {{--<!-- /.nav-second-level -->--}}
                                {{--</li>--}}
                            </ul>
                        </li>
                        @endif
                        @if($page == 's' || $page == '*')
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Subhaus<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/s_slider') }}">Slider</a>
                                </li>
                                <li>
                                    <a href="{{ url('/s_about') }}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{ url('/s_pricing') }}">Pricing</a>
                                </li>
                                <li>
                                    <a href="{{ url('/s_featureddish') }}">Featured Dish</a>
                                </li>
                                <li>
                                    <a href="{{ url('/m16_instagram') }}">Add Instagram Account</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if($page == 'p' || $page == '*')
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Pitstop<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Test 1</a>
                                </li>
                                <li>
                                    <a href="#">Test 2</a>
                                </li>
                                <li>
                                    <a href="{{ url('/m16_instagram') }}">Add Instagram Account</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if($page == 'm' || $page == '*')
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Monroe<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Test 1</a>
                                </li>
                                <li>
                                    <a href="#">Test 2</a>
                                </li>
                                <li>
                                    <a href="{{ url('/m16_instagram') }}">Add Instagram Account</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if($page == 'f' || $page == '*')
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Flux<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/f_slider') }}">Slider</a>
                                </li>
                                <li>
                                    <a href="{{ url('/f_products') }}">Products</a>
                                </li>
                                <li>
                                    <a href="{{ url('/f_services') }}">Services</a>
                                </li>
                                <li>
                                    <a href="{{ url('/f_blogs') }}">Blogs</a>
                                </li>
                                <li>
                                    <a href="{{ url('/f_promoevent') }}">Promo & Event</a>
                                </li>
                                <li>
                                    <a href="{{ url('/m16_instagram') }}">Add Instagram Account</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        @if($page == '*')
                             <li>
                                <a href="{{ url('/manageadmin') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Manage Admin</a>
                             </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <div id="footer" align="center" style="background-color:#cccccc;">
        <strong>Test &copy; 2016</strong>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#eventsTable').dataTable();
        });
    </script>
</body>
</html>