@extends('front.layouts.masterpage')
@section('title')
    <title>Booking Summary - Riverstone - Hotel & cottage - Batu</title>
@endsection
@section('content')
    <section class="body-content ">

        <!--error-->
        <div class="page-content p-bot-0 p-top-0" >
            <div class="container">
                <div class="row page-content">
                    <div class="col-md-5 text-center">
                        <div class="error-avatar">
                            <img src="{{ asset('img/error-avatar.png') }}" alt="">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="error-info">
                            <div class="">
                                <h1 class="text-uppercase ">Completed Your Payment?</h1>
                            </div>
                            <div class="error-txt">
                                Once Your payment is confirmed <br>
                                we will send your hotel voucher to your email address.
                            </div>
                            <a href="{{ route('index') }}" class="btn btn-medium  btn-theme-color "> Take Me Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--error-->


    </section>
@endsection
@section('script')
    <script>
        $('.ajax-popup-link').magnificPopup({
            type: 'ajax'
        });
    </script>
@endsection