@extends('front.layouts.masterpage')
@section('title')
    <title>Booking Summary - Riverstone - Hotel & cottage - Batu</title>
@endsection
@section('content')
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Booking Summary</h4>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Booking Summary</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="body-content ">

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 m-bot-0">
                        <div class="table-responsive">
                            <dl class="accordion">
                                <dt>
                                    <a href="" class="active">Contact Info</a>
                                </dt>
                                <dd style="display: block;">
                                    <ul class="portfolio-meta m-bot-30">
                                        <li><span> Nama </span> {{ $summary->nama }}</li>
                                        <li><span> Email	 </span> {{ $summary->email }}</li>
                                        <li><span> No. Telepon </span> {{ $summary->no_telp }}</li>
                                    </ul>
                                </dd>
                            </dl>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                <tr>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Max Guest /Room</th>
                                    <th>Duration Of Stay</th>
                                    <th>Price /Night</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($summary->roomReservation as $item)
                                    @php
                                        $checkin = \Carbon\Carbon::createFromFormat('Y-m-d',$item->pivot->check_in);
                                        $checkout = \Carbon\Carbon::createFromFormat('Y-m-d',$item->pivot->check_out);
                                    @endphp
                                    <tr>
                                        <td><a href="#">{{ $item->id }}</a></td>
                                        <td>
                                            <a class="ajax-popup-link" style="color: red; text-decoration: underline"
                                               href="{{ route('room',['room_id' => $item->roomType->id]) }}">{{ $item->roomType->nama }}</a>
                                        </td>
                                        <td>{{ $item->roomType->max_person }}</td>
                                        <td>{{ $checkin->diffInDays($checkout) }}</td>
                                        <td>Rp. {{ number_format($item->pivot->harga,0,'.','.') }}</td>
                                        <td>Rp. {{ number_format($item->pivot->subtotal,0,'.','.') }}</td>
                                        @php($total += $item->pivot->subtotal)
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- accordion 2 start-->
                        <dl class="accordion">
                            <dt>
                                <a href="" class="active">Payment</a>
                            </dt>
                            <dd style="display: block;">
                                <ul class="portfolio-meta m-bot-30">
                                    <li><span> Sub Total </span> Rp. {{ number_format($total,0,'.','.') }}</li>
                                    <li><span> Unique Number	 </span> {{ $unik }}</li>
                                    <li><span><strong class="cart-total"> Total </strong></span> <strong
                                                class="cart-total">Rp.
                                            {{ number_format($total+$unik,0,'.','.') }} </strong></li>
                                    <li class="text-danger">Pembayaran Anda otomatis terkonfirmasi apabila mentransfer
                                        sesuai jumlah diatas
                                    </li>
                                </ul>
                                <section class="border-tabs">
                                    <form>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a id="bca" data-toggle="tab" href="#tab-01-alt">
                                                    <img class="img-thumbnail"
                                                         src="{{ asset('img/bank-logo/bca.png') }}">


                                                </a>
                                            </li>
                                            <li class="">
                                                <a id="mandiri" data-toggle="tab" href="#tab-02-alt">
                                                    <img class="img-thumbnail"
                                                         src="{{ asset('img/bank-logo/mandiri.png') }}">

                                                </a>
                                            </li>
                                            <li class="">
                                                <a id="bni" data-toggle="tab" href="#tab-03-alt">
                                                    <img class="img-thumbnail"
                                                         src="{{ asset('img/bank-logo/bni.png') }}">
                                                </a>
                                            </li>
                                            <li class="">
                                                <a id="bri" data-toggle="tab" href="#tab-04-alt">
                                                    <img class="img-thumbnail"
                                                         src="{{ asset('img/bank-logo/bri.png') }}">
                                                </a>
                                            </li>
                                        </ul>
                                    </form>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="tab-01-alt" class="tab-pane active">
                                                <h5 class="text-uppercase">Please Transfer To :</h5>
                                                <h3>Bank Central Asia (BCA)</h3>
                                                <ul class="portfolio-meta">
                                                    <li><span>No Rekening</span> 084 000 1911</li>
                                                    <li><span>Atas Nama</span> Riverstone</li>
                                                </ul>
                                            </div>
                                            <div id="tab-02-alt" class="tab-pane">
                                                <h5 class="text-uppercase">Please Transfer To :</h5>
                                                <h3>Mandiri</h3>
                                                <ul class="portfolio-meta">
                                                    <li><span>No Rekening</span> 1650070070017</li>
                                                    <li><span>Atas Nama</span> Riverstone</li>
                                                </ul>
                                            </div>
                                            <div id="tab-03-alt" class="tab-pane">
                                                <h5 class="text-uppercase">Please Transfer To :</h5>
                                                <h3>BNI</h3>
                                                <ul class="portfolio-meta">
                                                    <li><span>No Rekening</span> 800 600 6009</li>
                                                    <li><span>Atas Nama</span> Riverstone</li>
                                                </ul>
                                            </div>
                                            <div id="tab-04-alt" class="tab-pane">
                                                <h5 class="text-uppercase">Please Transfer To :</h5>
                                                <h3>BRI</h3>
                                                <ul class="portfolio-meta">
                                                    <li><span>No Rekening</span> 037 701 000 435 301</li>
                                                    <li><span>Atas Nama</span> Riverstone</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </dd>
                        </dl>
                        <!-- accordion 2 end-->


                        <div class="cart-btn-row inline-block">
                            <form method="post" action="{{ route('send-confirmation') }}">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $summary->id }}" name="id">
                                <input type="hidden" value="{{ $unik }}" name="unik">
                                <input type="hidden" id="bank" name="bank">
                                <button type="submit" class="btn btn-medium btn-dark-solid pull-right "> I Have
                                    Completed
                                    Payment
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function (e) {

            $('#bca').click(function () {
                $('#bank').val('bca');
            });
            $('#bni').click(function () {
                $('#bank').val('bni');
            });
            $('#mandiri').click(function () {
                $('#bank').val('mandiri');
            });
            $('#bri').click(function () {
                $('#bank').val('bri');
            });
        });
        $('.ajax-popup-link').magnificPopup({
            type: 'ajax'
        });
    </script>
@endsection