<header id="header" class=" header-full-width ">

    <div class="header-sticky light-header ">

        <div class="container">
            <div id="massive-menu" class="menuzord">

                <!--logo start-->
                <a href="{{ route('index') }}" class="logo-brand">
                    <img src="{{ asset('img/hotel-logo.png') }}" alt="">
                </a>
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu pull-right">
                    <li><a href="#" data-scroll>Home</a></li>
                    <li><a href="#room-cottages" data-scroll>Rooms & Cottages</a></li>
                    {{--<li><a href="#">Restaurant</a></li>
                    <li><a href="#">Meeting Rooms & Hall</a></li>--}}
                    <li><a href="#">About Us</a></li>
                    <li><a href="#contact" data-scroll>Contact Us</a></li>
                    <li class="nav-icon nav-divider">
                        <a href="javascript:void(0)">|</a>
                    </li>
                    <li><a href="{{ route('index') }}#reservation"><b>Reservation</b></a></li>
                    <li class="scrollable-fix"></li>
                </ul>
                <!--mega menu end-->

            </div>
        </div>
    </div>

</header>