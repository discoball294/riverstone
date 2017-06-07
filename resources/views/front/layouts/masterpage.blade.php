
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="img/favicon.png">
    @yield('title')


    <!--common style-->


    <link href='http://fonts.googleapis.com/css?family=Abel|Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700,700italic,900,900italic,200italic,200' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shortcodes/shortcodes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/green-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('pickadate/themes/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('pickadate/themes/classic.date.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/plugins/bootstrap-sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!--  preloader start -->
<div id="tb-preloader">
    <div class="tb-preloader-wave"></div>
</div>
<!-- preloader end -->


<div class="wrapper">

    <!--header start-->
@include('front.includes.pagenav')
    <!--header end-->

    <!--page title start-->

    <!--page title end-->

    <!--body content start-->
    @yield('content')

    <!--body content end-->

    <!--footer start 1-->
    @include('front.includes.footer')
    <!--footer 1 end-->

</div>


<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/menuzord.js') }}"></script>
<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.isotope.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.countTo.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.js') }}"></script>
<script src="{{ asset('js/visible.js') }}"></script>
<script src="{{ asset('js/smooth.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.js') }}"></script>
<script src="{{ asset('pickadate/picker.js') }}"></script>
<script src="{{ asset('pickadate/picker.date.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/bootstrap-sweetalert/sweetalert.js') }}"
        type="text/javascript"></script>
<!--common scripts-->
<script src="{{ asset('js/scripts.js?6') }}"></script>

<script>
    $(document).ready(function (e) {
        $('.pickdate').pickadate({
            format: 'd mmmm, yyyy',
            formatSubmit: 'yyyy-mm-dd',
            hiddenPrefix: 'hidden_',
            min: true
        });
    })
</script>
@yield('script')

</body>
</html>
