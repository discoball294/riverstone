@extends('admin.layouts.master')
@section('title')
    <title>Dashboard - Riverstone - Hotel & cottage - Admin Page</title>
    <link href="{{ asset('admin-assets/pages/error.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="page-content" style="min-height: 1434px;">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <h1 class="page-title"> Error 500
            <small></small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>System</span>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12 page-500">
                <div class=" number font-red"> 500 </div>
                <div class=" details">
                    <h3>Oops! Your internet connection is poor or might be down</h3>
                    <p> We are fixing it! Please come back in a while.
                        <br> </p>
                    <p>
                        <a href="{{ route('admin-index') }}" class="btn red btn-outline"> Return home </a>
                        <br> </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugins_js')
    <script src="{{ asset('admin-assets/plugins/jquery.waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/plugins/jquery.counterup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin-assets/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>

@endsection