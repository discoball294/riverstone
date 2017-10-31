@extends('front.layouts.masterpage')
@section('title')
    <title>Hasil Pencarian Kamar - Riverstone - Hotel & cottage - Batu</title>
@endsection
@section('content')
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">Available Rooms from
                        <strong>{{ date("j F, Y", strtotime($send_checkin)) }}</strong> to
                        <strong>{{ date("j F, Y", strtotime($send_checkout)) }}</strong></h4>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Search Available Rooms</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="body-content ">

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                            <form class="coupon-form" action="{{ route('reservation') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="tanggal_check_in" value="{{ $send_checkin }}">
                                <input type="hidden" name="tanggal_check_out" value="{{ $send_checkout }}">
                                <div class="table-responsive">
                                    <table class="table table-striped cart-table">
                                        <thead>
                                        <tr>
                                            <th>Book</th>
                                            <th>Room Number</th>
                                            <th>Room Type</th>
                                            <th>Max Guest /Room</th>
                                            <th>Price /Night</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($available_rooms->count() < $jumlah_ruang)
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <i class="fa fa-lg fa-times-circle"></i> <strong>Maaf, tidak ada cukup kamar untuk kebutuhan anda</strong> || Anda tetap bisa memesan kamar yang tersedia
                                            </div>

                                        @endif

                                        @foreach($available_rooms as $item)
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input class="limit-check" type="checkbox"
                                                                   value="{{ $item->id }}" id="" name="book[]">
                                                            <input type="hidden" id="hidden_price"
                                                                   value="{{ $item->roomType->harga }}">
                                                        </label>

                                                    </div>
                                                </td>
                                                <td><a href="#">{{ $item->id }}</a></td>
                                                <td><a class="ajax-popup-link"
                                                       style="color: red; text-decoration: underline"
                                                       href="{{ route('room',['room_id' => $item->roomType->id]) }}">{{ $item->roomType->nama }}</a>
                                                </td>
                                                <td>
                                                    {{ $item->roomType->max_person }}
                                                </td>
                                                <td><b>Rp. {{ number_format($item->roomType->harga,0,'.','.') }}</b>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- accordion 2 start-->
                                <dl class="accordion">
                                    <dt>
                                        <a href="">User Information</a>
                                    </dt>
                                    <dd style="display: none;">

                                        @foreach ($errors->all() as $message)
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <i class="fa fa-lg fa-times-circle"></i> <strong>Oh
                                                    snap!</strong> {{ $message }}
                                            </div>
                                        @endforeach
                                        <div class="form-group">
                                            <label>Nama *</label>
                                            <input type="text" name="nama" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email *</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon *</label>
                                            <input type="tel" name="telepon" class="form-control" required>
                                        </div>
                                        <div class="form-group ">
                                            {!! NoCaptcha::display() !!}
                                        </div>


                                    </dd>
                                </dl>
                                <!-- accordion 2 end-->

                                <div class="cart-btn-row inline-block">
                                    <button type="submit" class="btn btn-medium btn-dark-solid pull-right "><i
                                                class="fa fa-floppy-o"></i> Reservasi Sekarang
                                    </button>
                                    <button class="btn btn-medium btn-dark-solid btn-transparent  pull-right"> Batalkan
                                    </button>
                                </div>
                            </form>

                    </div>
                    <div class="col-md-4">

                            <div class="table-responsive">

                                <dl class="accordion">
                                    <dt>
                                        <a href="">Cari Lagi</a>
                                    </dt>
                                    <dd style="display: none;">
                                        <form class="coupon-form" action="{{ route('search-room') }}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label>Jumlah Ruang</label>
                                                <select class="form-control" name="jumlah_ruang">
                                                    <option>Jumlah Ruangan</option>
                                                    <option value="1" @if($jumlah_ruang==1){{ 'selected' }}@endif>1
                                                    </option>
                                                    <option value="2" @if($jumlah_ruang==2){{ 'selected' }}@endif>2
                                                    </option>
                                                    <option value="3" @if($jumlah_ruang==3){{ 'selected' }}@endif>3
                                                    </option>
                                                    <option value="6" @if($jumlah_ruang==6){{ 'selected' }}@endif>4-6
                                                    </option>
                                                    <option value="8" @if($jumlah_ruang==8){{ 'selected' }}@endif>7-8
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Orang</label>
                                                <select class="form-control" name="jumlah_orang">
                                                    <option>Jumlah Orang per Kamar</option>
                                                    <option value="1" @if($jumlah_orang==1){{ 'selected' }}@endif>1
                                                    </option>
                                                    <option value="2" @if($jumlah_orang==2){{ 'selected' }}@endif>2
                                                    </option>
                                                    <option value="3" @if($jumlah_orang==3){{ 'selected' }}@endif>3
                                                    </option>
                                                    <option value="4" @if($jumlah_orang==4){{ 'selected' }}@endif>4-6
                                                    </option>
                                                    <option value="6" @if($jumlah_orang==6){{ 'selected' }}@endif>6-8
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Check In</label>
                                                <input type="text" name="checkin" class="form-control pickdate"
                                                       placeholder="Check In"
                                                       value="{{ date("j F, Y", strtotime($send_checkin)) }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Check Out</label>
                                                <input type="text" name="checkout" class="form-control pickdate"
                                                       placeholder="Check Out"
                                                       value="{{ date("j F, Y", strtotime($send_checkout)) }}">
                                            </div>
                                            <button type="submit" class="btn btn-small btn-rounded btn-dark-solid">
                                                Refine
                                                Search
                                            </button>
                                        </form>
                                    </dd>
                                </dl>

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
            var limit = {{ $jumlah_ruang }};
            $("input[name='book[]']").on('change', function (evt) {
                if ($("input[name='book[]']:checked").length > limit) {
                    this.checked = false;
                    swal("Sorry!", "Anda tidak bisa memesan lebih dari {{ $jumlah_ruang }} kamar!", "warning")
                }
                var ischecked = $(this).is(':checked');
                if (!ischecked) {
                    $(this).closest('label').find('#hidden_price').removeAttr('name');
                } else if (ischecked) {
                    var harga = $(this).closest('label').find('#hidden_price_set').val();
                    $(this).closest('label').find('#hidden_price').attr('name', 'hidden_price[]');
                    console.log(harga)
                }

            });
        });

        $('.ajax-popup-link').magnificPopup({
            type: 'ajax'
        });

    </script>
@endsection