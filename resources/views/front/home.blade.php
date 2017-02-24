@extends('front.layouts.master')
@section('title')
    <title>Riverstone - Hotel & cottage - Batu</title>
@endsection
@section('hero')

    <div class="banner-state vertical-align text-center banner-hotel">
        <div class="container-mid">
            <div class="container">
                <div class="banner-title light-txt m-top-0">
                    <div>
                        <h1 class="text-uppercase">think Relaxed</h1>
                        <h3 class="text-uppercase m-top-10 semi-transparent theme-bg-space">Welcome to Massive</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!--book form-->
    <div class="gray-bg p-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form class="form-inline text-center ticket-register">
                        <div class="form-group">
                            <input type="text" class="form-control" id="checkin" placeholder="Check In">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="checkout" placeholder="Check Out">
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option>Select Room Type</option>
                                <option>Premium Room</option>
                                <option>Business Room</option>
                                <option>Economy Room</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option>Adult Nos</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="form-control">
                                <option>Child Nos</option>
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-small  btn-theme-color btn-rounded">Book now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--book form-->
    <!--intro post-->
    <div class="page-content">
        <div class="container">
            <div class="row">

                <div class="heading-title border-short-bottom text-center ">
                    <div class="m-bot-30">
                        <img class="retina" src="img/hotel/obj-1@2x.png" alt="" style="height: 81px; width: auto;">
                    </div>
                    <h3 class="text-uppercase">welcome to our resort &amp; spa</h3>
                    <p class="half-txt p-top-20">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                        impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore, cum soluta nobis
                        est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.</p>
                </div>

                <!--post style 2 start-->
                <div class="post-list catering-list text-center hotel-intro-box-resize">
                    <div class="col-md-4">
                        <div class="post-single">
                            <div class="post-img">
                                <img class="circle" src="img/hotel/hotcircle1.jpg" alt="">
                            </div>
                            <div class="post-desk">
                                <h4 class="text-uppercase">
                                    <a href="#">luxury living</a>
                                </h4>
                                <p>
                                    Order for more than 10$ and get 15% discount
                                    through ModestMenu
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post-single">
                            <div class="post-img">
                                <img class="circle" src="img/hotel/hotcircle2.jpg" alt="">
                            </div>
                            <div class="post-desk">
                                <h4 class="text-uppercase">
                                    <a href="#">delicious food</a>
                                </h4>
                                <p>
                                    Order for more than 10$ and get 15% discount
                                    through ModestMenu
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="post-single">
                            <div class="post-img">
                                <img class="circle" src="img/hotel/hotcircle3.jpg" alt="">
                            </div>
                            <div class="post-desk">
                                <h4 class="text-uppercase">
                                    <a href="#">spa &amp; beauty care</a>
                                </h4>
                                <p>
                                    Order for more than 10$ and get 15% discount
                                    through ModestMenu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--post style 2 end-->
            </div>
        </div>
    </div>
    <!--intro post-->
    <!--room post-->
    <div class="gray-bg p-bot-100 m-bot-100">
        <div class="post-list-aside left-side post-p9-alt">

            <div class="post-single">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="post-desk">
                                <div class="m-bot-30">

                                    <h4 class="text-uppercase">
                                        cottage
                                    </h4>
                                </div>

                                <p>
                                    Cottage kami merupakan studio cottage dengan udara terbuka dan dilengkapi dengan
                                    teras dan tempat parkir pribadi. Fasilitasnya antara lain:
                                </p>
                                <p>
                                <ul>
                                    <li>King Size Bed / Twin Double Bed</li>
                                    <li>Air Conditioner</li>
                                    <li>32" LED TV dengan 29 TV Channels</li>
                                    <li>Free Wifi</li>
                                    <li>Water Heater</li>
                                    <li>Wardrobe</li>
                                    <li>Private Parking Lot</li>
                                </ul>
                                </p>
                                <div>
                                    <a href="#" class="btn btn-small btn-rounded btn-dark-solid  "> Details </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="divider d-solid d-single text-center">
            <span class="dot"> </span>
        </div>
        <div class="post-list-aside right-side post-p8 ">
            <div class="post-single">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-desk">
                                <div class="m-bot-30">
                                    <span class="post-sub-title text-uppercase">room</span>
                                    <h4 class="text-uppercase">
                                        Superior Deluxe
                                    </h4>
                                </div>

                                <p>
                                    Superior Deluxe merupakan bagian dari Hotel kami dan Superior Deluxe merupakan kamar
                                    dengan view yang bagus dari dalam kamarnya. Fasilitasnya antara lain:
                                </p>
                                <ul>
                                    <li>King Size Bed</li>
                                    <li>Air Conditioner</li>
                                    <li>32" LED TV dengan 29 TV Channels</li>
                                    <li>Free Wifi</li>
                                    <li>Water Heater</li>
                                    <li>Wardrobe</li>
                                    <li>Free Minibar</li>
                                </ul>
                                <div>
                                    <a href="#" class="btn btn-small btn-rounded btn-dark-solid  "> Details </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--room post-->
    <!--amenities-->
    <div class="page-content gray-bg m-top-35">
        <div class="container">
            <div class="row">

                <div class="heading-title border-short-bottom text-center ">
                    <h3 class="text-uppercase">Hotel Amenities</h3>

                    <p class="half-txt p-top-20">Nam libero tempore, cum soluta nobis est eligendi optio cumque
                        nihil impedit quo minus id quod maxime placeat facere possimus. Nam libero tempore, cum
                        soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat
                        facere possimus.</p>
                </div>
                <div class="col-md-3">
                    <ul class="icon-list amenities-list">
                        <li><i class="fa fa-check"></i> Luxury Swimming Pool</li>
                        <li><i class="fa fa-check"></i> 24/7 Laundry Service</li>
                        <li><i class="fa fa-check"></i> Central Air Condition</li>
                    </ul>
                </div>
                <div class="col-md-3 amenities-list">
                    <ul class="icon-list">
                        <li><i class="fa fa-check"></i> Guest Car Parking</li>
                        <li><i class="fa fa-check"></i> Luxury Swimming Pool</li>
                        <li><i class="fa fa-check"></i> Safari and Surfing</li>
                    </ul>
                </div>
                <div class="col-md-3 amenities-list">
                    <ul class="icon-list">
                        <li><i class="fa fa-check"></i> Gym and Beauty Care</li>
                        <li><i class="fa fa-check"></i> Conference Center</li>
                        <li><i class="fa fa-check"></i> Bar &amp; Restaurant</li>
                    </ul>
                </div>
                <div class="col-md-3 amenities-list">
                    <ul class="icon-list">
                        <li><i class="fa fa-check"></i> Gym and Beauty Care</li>
                        <li><i class="fa fa-check"></i> Conference Center</li>
                        <li><i class="fa fa-check"></i> Bar &amp; Restaurant</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--amenities-->
    <!--tabs-->
    <div class="page-content tab-parallax">
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
                            <li class="active">
                                <a data-toggle="tab" href="#tab-15">
                                    <i class="icon-wine"> </i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab-16">
                                    <i class="icon-documents"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab-17">
                                    <i class="icon-lightbulb"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#tab-18">
                                    <i class="icon-circle-compass"></i>
                                </a>
                            </li>

                            <li class="">
                                <a data-toggle="tab" href="#tab-19">
                                    <i class="icon-telescope"></i>
                                </a>
                            </li>

                        </ul>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-15" class="tab-pane active">
                                    <div class="heading-title-alt">
                                        <span class="heading-sub-title-alt text-uppercase theme-color-">12 July 2015</span>
                                        <h2 class="text-uppercase">fashion show and star night</h2>
                                    </div>
                                    In quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent
                                    elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent
                                    pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit
                                    metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque
                                    neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi
                                    id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam
                                    aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam.
                                </div>
                                <div id="tab-16" class="tab-pane">
                                    <div class="heading-title-alt">
                                        <span class="heading-sub-title-alt text-uppercase theme-color-">work for fun</span>
                                        <h2 class="text-uppercase">Massive UI collection</h2>
                                    </div>
                                    Leo quam aliquet diam, congue laoreet elit metus eget diam. Proin ac metus diam. In
                                    quis scelerisque velit. Proin pellentesque neque ut scelerisque dapibus. Praesent
                                    elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis. Praesent
                                    pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit
                                    metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque
                                    neque ut scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi
                                    id nisi interdum mollis.
                                </div>
                                <div id="tab-17" class="tab-pane">
                                    <div class="heading-title-alt">
                                        <span class="heading-sub-title-alt text-uppercase theme-color-">Multipurpose</span>
                                        <h2 class="text-uppercase">Huge possibilities</h2>
                                    </div>
                                    congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit.
                                    Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat
                                    dignissim. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                    scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget diam.
                                    Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut
                                    scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi
                                    interdum mollis.
                                </div>
                                <div id="tab-18" class="tab-pane">
                                    <div class="heading-title-alt">
                                        <span class="heading-sub-title-alt text-uppercase theme-color-">sky is the limit</span>
                                        <h2 class="text-uppercase">we work together for fun</h2>
                                    </div>
                                    Proin ac metus diam. In quis scelerisque velit. Leo quam aliquet diam, congue
                                    laoreet elit metus eget diam. Proin pellentesque neque ut scelerisque dapibus.
                                    Praesent elementum feugiat dignissim. Nunc placerat mi id nisi interdum mollis.
                                    Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam, congue
                                    laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque velit. Proin
                                    pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat dignissim.
                                    Nunc placerat mi id nisi interdum mollis.
                                </div>
                                <div id="tab-19" class="tab-pane">
                                    <div class="heading-title-alt">
                                        <span class="heading-sub-title-alt text-uppercase theme-color-">responsive</span>
                                        <h2 class="text-uppercase">Unlimited shortcode</h2>
                                    </div>
                                    Kusto ut scelerisque mattis, leo quam aliquet diam, congue laoreet elit metus eget
                                    diam. Proin ac metus diam. In quis scelerisque velit. Proin pellentesque neque ut
                                    scelerisque dapibus. Praesent elementum feugiat dignissim. Nunc placerat mi id nisi
                                    interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet
                                    diam, congue laoreet elit metus eget diam. Proin ac metus diam. In quis scelerisque
                                    velit. Proin pellentesque neque ut scelerisque dapibus. Praesent elementum feugiat
                                    dignissim. Nunc placerat mi id nisi interdum mollis.
                                </div>

                            </div>
                        </div>
                    </section>
                    <!--tabs square end-->

                </div>

            </div>
        </div>
    </div>
    <!--tabs-->
    <!--contact-->
    <div class="page-content">

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

            <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <form method="post" action="#" id="form" role="form" class="contact-comments">

                        <div class="row">

                            <div class="col-md-6 ">

                                <div class="form-group">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" class=" form-control" placeholder="Name *"
                                           maxlength="100" required="">
                                </div>
                                <div class="form-group">
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class=" form-control"
                                           placeholder="Email *" maxlength="100" required="">
                                </div>
                                <div class="form-group">
                                    <!-- phone -->
                                    <input type="text" name="phone" id="phone" class=" form-control" placeholder="Phone"
                                           maxlength="100">
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <div class="form-group">
                                    <!-- Comment -->
                                    <textarea name="text" id="text" class="cmnt-text form-control" placeholder="Comment"
                                              maxlength="400"></textarea>
                                </div>
                                <div class="form-group full-width">
                                    <button type="submit" class="btn btn-small btn-dark-solid ">
                                        Send Message
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--contact-->
    <div id="grey-map" class="height-450" style="position: relative; overflow: hidden;">
        <iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=Hotel%20RiverStone&key=AIzaSyBPJJfVu15V7HogRaQIqg46GsqX6nYSoBs" allowfullscreen></iframe>
    </div>

@endsection