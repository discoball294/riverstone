@extends('front.layouts.masterpage')
@section('title')
    <title>Cancel Booking - Riverstone - Hotel & cottage - Batu</title>
@endsection
@section('content')
    <section class="body-content">
        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="text-uppercase">Office Location</h4>
                        <p>Jl. Agus Salim No.97, Temas, Kec. Batu,<br> Kota Batu, Jawa Timur 65316</p>
                        <address>
                            <p>Telp: 0341-01293913 </p>
                            <p>Email: info@riverstone.com</p>
                        </address>
                    </div>

                    <div class="col-md-8">
                        <h4 class="text-uppercase">batalkan pesanan</h4>

                        <form method="post" action="{{ route('cancel-user') }}" id="form" role="form" class="contact-comments m-top-50">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label>Booking ID *</label>
                                    <!-- Name -->
                                    <input type="text" name="id" id="id" class=" form-control" maxlength="100"
                                           required="" placeholder="Tekan Enter setelah memasukkan Booking ID">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <!-- Subject -->
                                    <input type="text" name="name" id="name" class=" form-control"
                                           maxlength="100" readonly>
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Email *</label>
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class=" form-control" maxlength="100"
                                           required="" readonly>
                                </div>


                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <!-- Phone -->
                                    <input type="text" name="phone" id="phone" class=" form-control" maxlength="100" readonly>
                                </div>

                                <!-- Send Button -->
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-small btn-dark-solid ">
                                        Batalkan
                                    </button>
                                </div>


                            </div>

                        </form>
                        <h4 class="text-uppercase">Kamar yang dipesan</h4>
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

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#id').keypress(function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    $.ajax({
                        url: '{{ route('find-reservasi') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: $('#id').val()
                        },
                        dataType: 'json',
                        success: function (result) {
                            console.log(result);
                            $('#name').val(result.nama);
                            $('#email').val(result.email);
                            $('#phone').val(result.no_telp);
                            $.each(result.room_reservation, function (index, element) {
                                var diff = new Date(Date.parse(element.pivot.check_out) - Date.parse(element.pivot.check_in));
                                var days = diff/1000/60/60/24;
                                $('.cart-table tbody > tr').remove();
                                $('.cart-table').append('<tr>' +
                                    '<td>'+element.pivot.room_id+'</td>' +
                                    '<td>'+element.room_type.nama+'</td>' +
                                    '<td>'+element.room_type.max_person+'</td>' +
                                    '<td>'+days+'</td>' +
                                    '<td>'+convertToRupiah(element.room_type.harga)+'</td>' +
                                    '<td>'+convertToRupiah(element.pivot.subtotal)+'</td>' +
                                    '</tr>')
                            })
                        }

                    })

                }
            })
        });
        function convertToRupiah(angka)
        {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        $('.ajax-popup-link').magnificPopup({
            type: 'ajax'
        });
    </script>
@endsection