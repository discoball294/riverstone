<header id="header" class="nav-center-align">

    <div class="light-header">

        <div class="container mainmenu" style="display: block;">
            <div id="massive-menu" class="menuzord menuzord-responsive">

                <!--logo start-->
                <a href="index.html" class="logo-brand">
                    <img src="{{ asset('img/hotel-logo.png') }}" alt="">
                </a>
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu border-tb menuzord-indented scrollable" id="menu-list" style="max-height: 400px; display: block;">

                    <li><a href="#" data-scroll>Home</a></li>
                    <li><a href="#room-cottages" data-scroll>Rooms & Cottages</a></li>
                    {{--<li><a href="#">Restaurant</a></li>
                    <li><a href="#">Meeting Rooms & Hall</a></li>--}}
                    <li><a href="#layanan" data-scroll>About Us</a></li>
                    <li><a href="#contact" data-scroll>Contact Us</a></li>
                    <li class="nav-icon nav-divider">
                        <a href="javascript:void(0)">|</a>
                    </li>
                    <li><a href="#reservation" data-scroll><b>Reservation</b></a></li>



                    <li class="scrollable-fix"></li></ul>
                <!--mega menu end-->
            </div>
        </div>

        <!--alternate menu appear start-->
        <div class="menu-appear-alt" style="position: relative; top: 0px; left: 0px; width: 1351px; z-index: 99999; display: none;">
            <div class="container">
                <div id="massive-menu-alt" class="menuzord menuzord-responsive"><a href="javascript:void(0)" class="showhide" style="display: none;"><em></em><em></em><em></em></a><ul class="menuzord-menu menuzord-indented scrollable" style="max-height: 400px; display: block;">

                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Rooms & Cottages</a></li>
                        <li><a href="#">Restaurant</a></li>
                        <li><a href="#">Meeting Rooms & Hall</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>

                        <li class="nav-icon nav-divider">
                            <a href="javascript:void(0)">|</a>
                        </li>

                        <li class="nav-icon">
                            <a href="javascript:void(0)">
                                <i class="fa fa-search"></i> Search
                                <span class="indicator"><i class="fa fa-angle-down"></i></span></a>
                            <div class="megamenu megamenu-quarter-width" style="right: auto;">
                                <div class="megamenu-row">
                                    <div class="col12">
                                        <form role="form">
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="scrollable-fix"></li></ul></div>
            </div>
        </div>
        <!--alternate menu appear end-->

    </div>

</header>