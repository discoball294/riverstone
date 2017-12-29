
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Riverstone Hotel Admin Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Login Admin Riverstone " name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin-assets/plugins/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin-assets/plugins/simple-line-icons/simple-line-icons.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin-assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("admin-assets/plugins/bootstrap-switch/css/bootstrap-switch.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset("admin-assets/global/components-md.min.css") }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset("admin-assets/global/plugins-md.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('admin-assets/pages/login-5.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN : LOGIN PAGE 5-2 -->
<div class="user-login-5">
    <div class="row bs-reset">
        <div class="col-md-6 login-container bs-reset">
            <img class="login-logo login-6" src="{{ asset('img/hotel-logo.png') }}" />
            <div class="login-content">
                <h1>Riverstone Hotel & cottage Admin Login</h1>
                <p> Lorem ipsum dolor sit amet, coectetuer adipiscing elit sed diam nonummy et nibh euismod aliquam erat volutpat. Lorem ipsum dolor sit amet, coectetuer adipiscing. </p>
                <form action="{{ route('post.login') }}" class="login-form" method="post">
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span>Enter your email and password. </span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" required/> </div>
                        <div class="col-xs-6">
                            <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/>
                        <input type="hidden" value="{{ Session::token() }}" name="_token"> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" name="remember" value="1" /> Remember me
                                <span></span>
                            </label>
                        </div>
                        <div class="col-sm-8 text-right">
                            <div class="forgot-password">
                                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                            </div>
                            <button class="btn blue" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
                <!-- BEGIN FORGOT PASSWORD FORM -->
                <form class="forget-form" action="" method="post">
                    <h3>Forgot Password ?</h3>
                    <p> Enter your e-mail address below to reset your password. </p>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                    <div class="form-actions">
                        <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
                        <button type="submit" class="btn blue uppercase pull-right">Submit</button>
                    </div>
                </form>
                <!-- END FORGOT PASSWORD FORM -->
            </div>
            <div class="login-footer">
                <div class="row bs-reset">
                    <div class="col-xs-5 bs-reset">
                        <ul class="login-social">
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-social-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-7 bs-reset">
                        <div class="login-copyright text-right">
                            <p>Copyright &copy; Keenthemes 2015</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bs-reset">
            <div class="login-bg"> </div>
        </div>
    </div>
</div>
<!-- END : LOGIN PAGE 5-2 -->
<!--[if lt IE 9]>
<script src="{{ asset('admin-assets/plugins/respond.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('admin-assets/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets//plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('admin-assets/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('admin-assets/layouts/layout2/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/layouts/layout2/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin-assets/pages/login-5.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>