
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto+Slab:400,700" rel="stylesheet">

        <link rel="icon" type="image/png" href="favicon.ico">
        <!-- Place favicon.ico in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/xsIcon.css">
        <link rel="stylesheet" href="assets/css/isotope.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        

        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />
        
        <!-- use only color version -->
        <link rel="stylesheet" type="text/css" href="assets/css/colors/color-4.css">
    </head>
    <body>
	    <!--[if lt IE 10]>
	        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	    <![endif]-->

	    <div id="preloader">
	        <div class="spinner">
	            <div class="double-bounce1"></div>
	            <div class="double-bounce2"></div>
	        </div>
	    </div><!-- #preloader -->

		<!-- header section -->
		<header class="xs-header header-transparent">
		    <div class="container">
		        <nav class="xs-menus">
		            <div class="nav-header">
		                <div class="nav-toggle"></div>
		                <a href="index.html" class="nav-logo">
		                    <img src="assets/images/logo.png" alt="">
		                </a>
		            </div><!-- .nav-header END -->
		            <div class="nav-menus-wrapper row">
		                <div class="xs-logo-wraper col-lg-2 xs-padding-0">
		                    <a class="nav-brand" href="{{ url('/') }}">
		                        <img src="assets/images/logo.png" alt="">
		                    </a>
		                </div><!-- .xs-logo-wraper END -->
		                <div class="col-lg-7">
		                    <ul class="nav-menu">
		                        <li>
		                            <a href="{{ url('/') }}">Home</a>
		                        </li>
		                        <li>
		                            <a href="{{ url('/about') }}">About</a>
		                        </li>
		                        <li>
		                            <a href="{{ url('/causes') }}">Causes</a>
		                        </li>
		                        <li>
		                            <a href="{{ url('/events') }}">Events</a>
		                        </li>
		                        <li>
		                            <a href="{{ url('/contact') }}">Contact</a>
		                        </li>
		                    </ul><!-- .nav-menu END -->
		                </div>
		                <div class="xs-navs-button d-flex-center-end col-lg-3">
		                    <a href="{{ url('/donate') }}" class="btn btn-primary">
		                        <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
		                    </a>
		                </div><!-- .xs-navs-button END -->
		            </div><!-- .nav-menus-wrapper .row END -->
		        </nav><!-- .xs-menus .fundpress-menu END -->
		    </div><!-- .container end -->
		</header><!-- End header section -->

		@yield('content')

		<!-- footer section start -->
        <footer class="xs-footer-section">
            <div class="container">
                <div class="xs-copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="xs-copyright-text">
                                <p>&copy; Copyright {{ date('Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <nav class="xs-footer-menu">
                                <ul>
                                    <li><a href="https://t.me/bitcorns">Telegram</a></li>
                                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xs-back-to-top-wraper">
                <a href="#" class="xs-back-to-top"><i class="fa fa-angle-up"></i></a>
            </div>
        </footer>       

        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/spectragram.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>

        <script src="assets/js/main.js"></script>
    </body>
</html>