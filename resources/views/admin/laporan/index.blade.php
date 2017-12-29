@extends('admin.layouts.master')
@section('title')
    <title>Laporan - Riverstone - Hotel & cottage - Admin Page</title>
@endsection
@section('plugins_css')
    <link href="{{ asset('admin-assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('admin-assets/pages/invoice.min.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <style>
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endsection
@section('content')
    <div class="page-content" style="min-height: 1434px;">
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Laporan
            <small>Bulanan</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Laporan</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <div id="reportrange" class="btn red btn-fit-height">
                        <i class="fa fa-calendar"></i> &nbsp;
                        <span>November 19, 2017 - December 18, 2017</span>
                        <b class="fa fa-angle-down"></b>
                    </div>
                    <form id="date-range" role="form" method="post" action="{{ route('laporan') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="start" id="start">
                        <input type="hidden" name="end" id="end">
                    </form>
                </div>
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <div class="invoice">
            <div class="row invoice-logo">
                <div class="col-xs-6 invoice-logo-space">
                    <img src="{{ asset('img/hotel-logo.png') }}" class="img-responsive" alt=""></div>
                <div class="col-xs-6">
                    <p>
                        @if(is_null($request->start))
                            Bulan Ini
                        @else
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d',$request->start)->toFormattedDateString() }}
                            - {{ \Carbon\Carbon::createFromFormat('Y-m-d',$request->end)->toFormattedDateString() }}
                        @endif
                        <span class="muted"> </span>
                    </p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-4">
                    <h3>About:</h3>
                    <ul class="list-unstyled">
                        <li> Hotel Riverstone</li>
                        <li> Jl. Agus Salim No.97,</li>
                        <li> Temas, Kec. Batu,</li>
                        <li> Kota Batu, Jawa Timur</li>
                        <li> 65316</li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th> Booking ID#</th>
                            <th> Guest</th>
                            <th> Room No</th>
                            <th> Room Type</th>
                            <th class="hidden-xs"> Checkin/Checkout</th>
                            <th> Tanggal Booking</th>
                            <th> Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($grandtotal = 0)
                        @if($reservasi->count() == 0)
                            <tr>
                                <td colspan="6">Tidak ada Data!</td>
                            </tr>
                        @endif
                        @foreach($reservasi as $item)
                            @foreach($item->roomReservation as $value)
                                <tr class="clickable" data-toggle="">
                                    <td>{{ $item->id }}</td>
                                    <td> {{ $item->nama }}</td>
                                    <td>
                                        {{ $value->pivot->room_id }}
                                    </td>
                                    <td>
                                        {{ $value->roomType->nama }}
                                    </td>
                                    <td class="hidden-xs">
                                        {{ Carbon\Carbon::createFromFormat('Y-m-d',$value->pivot->check_in)->toFormattedDateString() }} / {{ \Carbon\Carbon::createFromFormat('Y-m-d',$value->pivot->check_out)->toFormattedDateString() }}
                                    </td>
                                    <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->toFormattedDateString() }}</td>
                                    <td>Rp. {{ number_format($value->pivot->subtotal,0,'.','.') }}</td>
                                    @php($grandtotal += $value->pivot->subtotal )
                                </tr>
                            @endforeach

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">

                </div>
                <div class="col-xs-8 invoice-block">
                    <ul class="list-unstyled amounts">
                        <li>
                            <strong>Total amount:</strong> Rp. {{ number_format($grandtotal ,0,'.','.') }}
                        </li>
                    </ul>
                    <br>
                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                        <i class="fa fa-print"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('plugins_js')
    <script src="{{ asset('admin-assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
            type="text/javascript"></script>
    <script>
        $(function () {
            var start = moment().subtract(29, 'days');
            var end = moment();
            var reportrange = $('#reportrange');

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            reportrange.daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);
            reportrange.on('apply.daterangepicker', function (ev, picker) {
                $('#start').val(picker.startDate.format('YYYY-MM-DD'));
                $('#end').val(picker.endDate.format('YYYY-MM-DD'));
                $('#date-range').submit();
            })

        })
    </script>

@endsection