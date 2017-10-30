@extends('admin.layouts.master')
@section('title')
    <title>Detail Reservasi - Riverstone - Hotel & cottage - Admin Page</title>
@endsection
@section('plugins_css')
    <link href="{{ asset('admin-assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"
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
        <h1 class="page-title"> Reservation Detail View
            <small>view reservation details</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Reservation Details</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase"> Booking ID #{{ $reservasi->id }}
                                <span class="hidden-xs">|
                                    @php
                                        $created = new \Carbon\Carbon($reservasi->created_at);
    $now = \Carbon\Carbon::now();
    $difference = ($created->diff($now)->days < 1) ? 'today' : $created->diffForHumans($now);
                                    @endphp
                                    {{ $difference }}
                                    </span>
                                        </span>
                        </div>
                        <div class="actions">

                            <form method="post" action="{{ route('payment-confirmation') }}">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $reservasi->id }}" name="id">
                                <input type="hidden" value="{{ $unik }}" name="unik">
                                <input type="submit" name="btn"
                                       class="btn btn-transparent yellow btn-outline btn-lg active"
                                       value="Change Booking Date">

                                <input type="submit" name="btn"
                                       class="btn btn-transparent red btn-outline btn-lg active" value="Cancel Booking"
                                       @if($reservasi->status==1 || $reservasi->status==2) disabled @endif>

                                <input type="submit" name="btn"
                                       class="btn btn-transparent green btn-outline btn-lg active"
                                       value="Confirm Payment"
                                       @if($reservasi->status==1 || $reservasi->status==2) disabled @endif>
                            </form>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs nav-tabs-lg">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab"> Details </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="portlet yellow-crusta box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Booking Details
                                                    </div>
                                                    <div class="actions">
                                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Booking ID #:</div>
                                                        <div class="col-md-7 value"> {{ $reservasi->id }}
                                                            @if($reservasi->status==1 || $reservasi->status==2)
                                                                <span class="label label-info label-sm"> Email confirmation was sent </span>
                                                            @else
                                                                <span class="label label-danger"> Email confirmation wasn't sent </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Booking Date &amp; Time:</div>
                                                        <div class="col-md-7 value"> {{ $reservasi->created_at }} </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Payment Status:</div>
                                                        <div class="col-md-7 value">
                                                            @if($reservasi->status==0)
                                                                <span class="label label-warning"> Not Confirmed </span>
                                                            @elseif($reservasi->status==1)
                                                                <span class="label label-success"> Confirmed </span>
                                                            @else
                                                                <span class="label label-danger"> Canceled </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        @php($total=0)
                                                        @foreach($reservasi->roomReservation as $item)
                                                            @php($total += $item->pivot->subtotal)
                                                        @endforeach
                                                        <div class="col-md-5 name"> Grand Total:</div>
                                                        <div class="col-md-7 value">
                                                            Rp. {{ number_format($total,0,'.','.') }} </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Payment Information:</div>
                                                        <div class="col-md-7 value"> Bank Transfer
                                                            (to {{ strtoupper($reservasi->transfer_to) }})
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="portlet blue-hoki box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Guest Information
                                                    </div>
                                                    <div class="actions">
                                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Guest Name:</div>
                                                        <div class="col-md-7 value"> {{ $reservasi->nama }} </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Email:</div>
                                                        <div class="col-md-7 value"> {{ $reservasi->email }} </div>
                                                    </div>
                                                    <div class="row static-info">
                                                        <div class="col-md-5 name"> Phone Number:</div>
                                                        <div class="col-md-7 value"> {{ $reservasi->no_telp }} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="portlet grey-cascade box">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i>Room List
                                                    </div>
                                                    <div class="actions">
                                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                                            <i class="fa fa-pencil"></i> Edit </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th> Room Number</th>
                                                                <th> Room Type</th>
                                                                <th> Max Guest/Room</th>
                                                                <th> Check in / Check out</th>
                                                                <th> Duration Of Stay</th>
                                                                <th> Price /Night</th>
                                                                <th> Subtotal</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($reservasi->roomReservation as $item)

                                                                @php
                                                                    $checkin = \Carbon\Carbon::createFromFormat('Y-m-d',$item->pivot->check_in);
                                                                    $checkout = \Carbon\Carbon::createFromFormat('Y-m-d',$item->pivot->check_out);
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        {{ $item->id }}
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:;"> {{ $item->roomType->nama }} </a>
                                                                    </td>
                                                                    <td> {{ $item->roomType->max_person }} </td>
                                                                    <td> {{ $checkin->toFormattedDateString() }} / {{ $checkout->toFormattedDateString() }} </td>
                                                                    <td> {{ $checkin->diffInDays($checkout) }} </td>
                                                                    <td>
                                                                        Rp. {{ number_format($item->pivot->harga,0,'.','.') }}</td>
                                                                    <td>
                                                                        Rp. {{ number_format($item->pivot->subtotal,0,'.','.') }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <div class="well">
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name"> Sub Total:</div>
                                                    <div class="col-md-3 value">
                                                        Rp. {{ number_format($total,0,'.','.') }} </div>
                                                </div>
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name"> Unique Number:</div>
                                                    <div class="col-md-3 value"> {{ $unik }} </div>
                                                </div>
                                                <div class="row static-info align-reverse">
                                                    <div class="col-md-8 name"> Total Paid:</div>
                                                    @if($reservasi->status==1)
                                                        <div class="col-md-3 value">
                                                            Rp. {{ number_format($total+$unik,0,'.','.') }} </div>
                                                    @else
                                                        <div class="col-md-3 value"> Rp. 0</div>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
    </div>

@endsection
@section('plugins_js')
    <script src="{{ asset('admin-assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"
            type="text/javascript"></script>

@endsection