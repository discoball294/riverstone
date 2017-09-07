@extends('front.layouts.master')
@section('title')
    <title>Riverstone - Hotel & cottage - Batu</title>
@endsection
@section('hero')

    <div class="banner-state vertical-align text-center" style="background-image: url({{ asset($banner->gambar) }})">
        <div class="container-mid">
            <div class="container">
                <div class="banner-title light-txt m-top-0">
                    <div>
                        <h1 class="text-uppercase">{{ $banner->text }}</h1>
                        <h3 class="text-uppercase m-top-10 semi-transparent theme-bg-space">{{ $banner->text }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!--book form-->
    <div class="gray-bg p-tb-10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="full-width promo-box gray-bg m-bot-10">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="promo-info">
                                    <h4>new <span class="theme-color">offer</span> for this <span class="theme-color">summer</span>
                                    </h4>
                                    <span>Nullam ut consectetur dolor. Sed sit amet iaculis nisi. Mauris ridiculus elementum non felis etewe blandit. </span>
                                </div>
                                <div class="promo-btn">
                                    <a href="#reservation" class="btn btn-medium btn-rounded btn-dark-solid  text-uppercase" data-scroll>Reservasi
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--book form-->
    <!--intro post-->
    <div class="page-content" id="layanan">
        <div class="container">
            <div class="row">

                <div class="heading-title border-short-bottom text-center ">
                    <div class="m-bot-30">
                        <img class="retina" src="img/hotel/obj-1@2x.png" alt="" style="height: 81px; width: auto;">
                    </div>
                    <h3 class="text-uppercase">welcome to our resort &amp; spa</h3>

                </div>

                <!--post style 2 start-->
                <div class="post-list catering-list text-center hotel-intro-box-resize">
                    @foreach($layanan as $item_layanan)
                        <div class="col-md-4">
                            <div class="post-single">
                                <div class="post-img">
                                    <img class="circle" src="{{ asset($item_layanan->gambar) }}" alt="">
                                </div>
                                <div class="post-desk">
                                    <h4 class="text-uppercase">
                                        <a href="#">{{ $item_layanan->nama }}</a>
                                    </h4>
                                    <p>
                                        {{ $item_layanan->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--post style 2 end-->
            </div>
        </div>
    </div>
    <!--intro post-->
    <!--room post-->
    <div class="gray-bg p-top-30 p-bot-30" id="room-cottages">
        <div class="heading-title border-short-bottom text-center" style="margin-bottom: 10px">
            <h3 class="text-uppercase">rooms &amp; cottages</h3>

        </div>
        @foreach($tipe_kamar as $item)
            @php($fasilitas = $item->fasilitas)

            @if($loop->iteration % 2 != 0)
                <div class="page-content p-bot-0" style="padding: 50px 0">
                    <div class="container">
                        <div class="row">
                            <!--post style 5 start-->
                            <div class="post-list-aside">
                                <div class="post-single">
                                    <div class="col-md-6">
                                        <div class="post-img">
                                            <img src="{{ asset($item->gambar) }}" alt="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="post-desk">
                                            <h2 class="text-uppercase m-bot-0 inline-block">
                                                {{ $item->nama }}
                                            </h2>
                                            <p>
                                                {{ $item->deskripsi }}
                                            </p>
                                                <ul>
                                                    @foreach($fasilitas as $f)
                                                        <li>{{ $f->fasilitas }}</li>
                                                    @endforeach
                                                </ul>


                                            <p class="theme-color txt-xl">Max Guest: {{ $item->max_person }}</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!--post style 5 end-->
                        </div>

                    </div>
                </div>
                    <div class="divider d-solid d-single text-center">
                        <span class="dot"> </span>
                    </div>
            @else
                <div class="page-content p-bot-0" style="padding: 50px 0">
                    <div class="container">
                        <div class="row">
                            <!--post style 5 start-->
                            <div class="post-list-aside">
                                <div class="post-single">

                                    <div class="col-md-6">
                                        <div class="post-desk">
                                            <h2 class="text-uppercase m-bot-0 inline-block">
                                                {{ $item->nama }}
                                            </h2>
                                            <p>
                                                {{ $item->deskripsi }}
                                            </p>
                                            <ul>
                                                @foreach($fasilitas as $f)
                                                    <li>{{ $f->fasilitas }}</li>
                                                @endforeach
                                            </ul>


                                            <p class="theme-color txt-xl">Max Guest: {{ $item->max_person }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="post-img">
                                            <img src="{{ asset($item->gambar) }}" alt="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--post style 5 end-->
                        </div>
                    </div>
                </div>
                    <div class="divider d-solid d-single text-center">
                        <span class="dot"> </span>
                    </div>
            @endif
        @endforeach
    </div>
    <!--room post-->
    <div class="post-list-aside right-side fast-food" style="background: url({{ $restaurant->gambar }}) right 30px no-repeat!important;" id="restaurant">
        <div class="post-single">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="post-desk">
                            <div class="m-bot-30">
                                <span class="post-sub-title text-uppercase">{{ $restaurant->nama }}</span>
                                <h4 class="text-uppercase">
                                    THE BEST THEME WITH QUALITY SERVICE
                                </h4>
                            </div>

                            <p>
                                {{ $restaurant->deskripsi }}
                            </p>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--tabs-->
    <div class="page-content tab-parallax" id="news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="heading-title border-short-bottom text-center ">
                        <h3 class="text-uppercase">Upcoming Events</h3>

                        <p class="half-txt p-top-20">Nam libero tempore, cum soluta nobis est eligendi optio cumque
                            nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore, cum
                            soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat
                            facere possimus.</p>
                    </div>

                    <!--tabs square start-->
                    <section class="icon-box-tabs ">
                        <ul class="nav nav-pills">
                            @foreach($news as $item)
                                <li class="@if($loop->iteration == 1){{ 'active' }}@endif">
                                    <a data-toggle="tab" href="#tab-{{ $loop->iteration }}">
                                        <i class="icon-documents"> </i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="panel-body">
                            <div class="tab-content">
                                @foreach($news as $item)
                                    <div id="tab-{{ $loop->iteration }}"
                                         class="tab-pane @if($loop->iteration == 1){{ 'active' }}@endif">
                                        <div class="heading-title-alt">
                                            <span class="heading-sub-title-alt text-uppercase theme-color-">{{ $item->tanggal }}</span>
                                            <h2 class="text-uppercase">{{ $item->judul }}</h2>
                                        </div>
                                        {{ $item->pengumuman }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <!--tabs square end-->

                </div>

            </div>
        </div>
    </div>
    <!--tabs-->
    <!--reservation-->
    <div class="page-content gray-bg" id="reservation">
        <div class="container">
            <div class="row">
                <!--post style 6 start-->
                <div class="post-list-aside">
                    <div class="post-single">
                        <div class="col-md-6">
                            <div class="post-img">
                                <img src="{{ asset('img/write.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="post-desk">
                                <div class="heading-title-alt text-left">
                                    <span class="heading-sub-title text-uppercase theme-color">Reservation</span>
                                    <h3 class="text-uppercase">Cari Kamar</h3>
                                </div>
                                <p>
                                    Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores
                                    nemis omnis fugats minima rerums unsers sadips amets.
                                </p>

                                <form class="magazine-grid login m-top-30 " action="{{ route('search-room') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <select class="form-control" name="jumlah_ruang" required>
                                                <option disabled selected>Jumlah Ruangan</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="6">4-6</option>
                                                <option value="8">6-8</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <select class="form-control" name="jumlah_orang" required>
                                                <option disabled selected>Jumlah Orang per Kamar</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="6">4-6</option>
                                                <option value="8">6-8</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="checkin" class="form-control pickdate"
                                                   placeholder="Check In" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="checkout" class="form-control pickdate"
                                                   placeholder="Check Out" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <button class="btn btn-small btn-dark-solid full-width btn-rounded"
                                                    value="Cari kamar" type="submit">Cari Kamar
                                            </button>
                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!--post style 6 end-->
            </div>
        </div>
    </div>
    <!--reservation-->
    <!--contact-->
    <div class="page-content" id="contact">

        <div class="container">

            <div class="heading-title-alt border-short-bottom text-center ">
                <h3 class="text-uppercase">contact us</h3>
                <div class="half-txt">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                    minus id quod maxime placeat facere possimus. Nam libero tempore
                </div>
            </div>

            <div class="row page-content">
                <div class="col-md-4">
                    <div class="featured-item text-center">
                        <div class="icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="title text-uppercase">
                            <h4>location</h4>
                        </div>
                        <div class="desc">
                            Upper Level, Overseas Passenger <br>
                            Terminal, The Rocks, Sydney 2000
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="featured-item text-center">
                        <div class="icon">
                            <i class="icon-mobile"></i>
                        </div>
                        <div class="title text-uppercase">
                            <h4>call us</h4>
                        </div>
                        <div class="desc">
                            Any time. We are open 24/7 <br>
                            +1 2345-67-89000
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="featured-item text-center">
                        <div class="icon">
                            <i class="icon-envelope"></i>
                        </div>
                        <div class="title text-uppercase">
                            <h4>mail us</h4>
                        </div>
                        <div class="desc">
                            get support via email <br>
                            mail@massivetheme.com
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--contact-->
    <div id="grey-map" class="height-450" style="position: relative; overflow: hidden;">
        <iframe width="100%" height="100%" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=Hotel%20RiverStone&key=AIzaSyBPJJfVu15V7HogRaQIqg46GsqX6nYSoBs"
                allowfullscreen></iframe>
    </div>

@endsection
