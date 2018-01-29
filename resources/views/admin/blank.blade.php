@extends('admin.layouts.master')
@section('title')
    <title>Dashboard - Riverstone - Hotel & cottage - Admin Page</title>
@endsection
@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Dashboard
            <small>statistics & charts</small>
        </h1>
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="index.html">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span class="active">Dashboard</span>
            </li>
        </ul>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <small class="font-green-sharp">Rp </small>
                                <span data-counter="counterup" data-value="{{ $n_format }}">{{ $n_format }}</span>
                                <small class="font-green-sharp">{{ $prefix }}</small>
                            </h3>
                            <small>TOTAL REVENUE</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="{{ $booking_count }}">{{ $booking_count }}</span>
                            </h3>
                            <small>TOTAL BOOKING</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-plus-o"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="{{ $completed_booking }}">{{ $completed_booking }}</span>
                            </h3>
                            <small>COMPLETED BOOKING</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-check-o"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="{{ $canceled_booking }}">{{ $canceled_booking }}</span>
                            </h3>
                            <small>CANCELED BOOKING</small>
                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-times-o"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase font-dark">Last 12 Month Revenue</span>

                        </div>

                    </div>
                    <div class="portlet-body">
                        <div id="dashboard_monthly_revenue" class="CSSAnimationChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption ">
                            <span class="caption-subject font-dark bold uppercase">Completed Booking</span>

                        </div>

                    </div>
                    <div class="portlet-body">
                        <div id="dashboard_monthly_book" class="CSSAnimationChart"></div>
                    </div>
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
<script src="{{ asset('admin-assets/plugins/amcharts/amcharts/themes/light.js.js') }}" type="text/javascript"></script>
<script>
    
    var chart = AmCharts.makeChart("dashboard_monthly_revenue", {
        "type": "serial",
        "theme": "light",
        "marginLeft": 100,
        "autoMarginOffset": 20,
        "mouseWheelZoomEnabled":true,
        "dataDateFormat": "YYYY-MM-DD",
        "valueAxes": [{
            "id": "v1",
            "axisAlpha": 0,
            "position": "left",
            "ignoreAxisWidth":true,
            "title": 'Revenue(Rp.)'
        }],
        "balloon": {
            "borderThickness": 1,
            "shadowAlpha": 0
        },
        "graphs": [{
            "id": "g1",
            "balloon":{
                "drop":true,
                "adjustBorderColor":false,
                "color":"#ffffff"
            },
            "bullet": "round",
            "bulletBorderAlpha": 1,
            "bulletColor": "#FFFFFF",
            "bulletSize": 5,
            "hideBulletsCount": 50,
            "lineThickness": 2,
            "title": "red line",
            "useLineColorForBulletBorder": true,
            "valueField": "value",
            "balloonText": "<span style='font-size:18px;'>Rp. [[value]]</span>"
        }],
        "chartScrollbar": {
            "graph": "g1",
            "oppositeAxis":false,
            "offset":30,
            "scrollbarHeight": 80,
            "backgroundAlpha": 0,
            "selectedBackgroundAlpha": 0.1,
            "selectedBackgroundColor": "#888888",
            "graphFillAlpha": 0,
            "graphLineAlpha": 0.5,
            "selectedGraphFillAlpha": 0,
            "selectedGraphLineAlpha": 1,
            "autoGridCount":true,
            "color":"#AAAAAA"
        },
        "chartCursor": {
            "pan": true,
            "valueLineEnabled": true,
            "valueLineBalloonEnabled": true,
            "cursorAlpha":1,
            "cursorColor":"#258cbb",
            "limitToGraph":"g1",
            "valueLineAlpha":0.2,
            "valueZoomable":true
        },
        "valueScrollbar":{
            "oppositeAxis":false,
            "offset":50,
            "scrollbarHeight":10
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "dashLength": 1,
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true
        },
        "dataProvider": {!! json_encode($chart_monthly_revenue) !!}
    });

    chart.addListener("rendered", zoomChart);

    zoomChart();

    function zoomChart() {
        chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
    }

    var chart2 = AmCharts.makeChart( "dashboard_monthly_book", {
        "type": "serial",
        "theme": "light",
        "dataProvider":  {!! json_encode($chart_monthly_book) !!}  ,
        "valueAxes": [ {
            "gridColor": "#FFFFFF",
            "gridAlpha": 0.2,
            "dashLength": 0,
            "title": "Number of completed booking"
        } ],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [ {
            "balloonText": "Completed booking in [[category]]: <b>[[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "Total"
        } ],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "Month",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "tickPosition": "start",
            "tickLength": 20,
            "title": "Month"
        },
        "export": {
            "enabled": true
        }

    } );
</script>
@endsection