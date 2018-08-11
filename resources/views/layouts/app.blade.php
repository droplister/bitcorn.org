
<!-- get_header('Page Name','Title')-->
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Charity Press - Home One</title>
        <meta name="description" content="">
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
        <!-- <link rel='stylesheet' type='text/css' href='assets/css/colors/color-1.css' > -->
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
                <div class="xs-footer-top-layer">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 footer-widget xs-pr-20">
                            <a href="index.html" class="xs-footer-logo">
                                <img src="assets/images/footer_logo.png" alt="">
                            </a>
                            <p>CharityPress online and raise money for charity and causes you’re passionate about. CharityPress is an innovative, cost-effective online.</p>
                            <ul class="xs-social-list-v2">
                                <li><a href="" class="color-facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="" class="color-twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="" class="color-dribbble"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="" class="color-pinterest"><i class="fa fa-pinterest"></i></a></li>
                            </ul><!-- .xs-social-list END -->
                        </div>
                        <div class="col-lg-2 col-md-6 footer-widget">
                            <h3 class="widget-title">About Us</h3>
                            <ul class="xs-footer-list">
                                <li><a href="index.html">About employee</a></li>
                                <li><a href="#">How it works</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-widget">
                            <div class="widget recent-posts">
                                <h3 class="widget-title">Trending Post</h3>
                                <ul class="xs-recent-post-widget">
                                    <li>
                                        <div class="posts-thumb float-left"> 
                                            <a href="#">
                                                <img alt="img" class="img-responsive" src="assets/images/news_feeds_1.jpg">
                                                <div class="xs-entry-date">
                                                    <span class="entry-date d-block">21</span>
                                                    <span class="entry-month d-block">dec</span>
                                                </div>
                                                <div class="xs-black-overlay bg-aqua"></div>
                                            </a>
                                        </div><!-- .posts-thumb END -->
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a href="#">Child Care Centers</a>
                                            </h4>
                                            <div class="post-meta">
                                                <span class="comments-link">
                                                    <i class="fa fa-comments-o"></i>
                                                    <a href="">300 Comments</a>
                                                </span><!-- .comments-link -->
                                            </div>
                                        </div><!-- .post-info END -->
                                        <div class="clearfix"></div>
                                    </li><!-- 1st post end-->
                                    <li>
                                        <div class="posts-thumb float-left"> 
                                            <a href="#">
                                                <img alt="img" class="img-responsive" src="assets/images/news_feeds_2.jpg">
                                                <div class="xs-entry-date">
                                                    <span class="entry-date d-block">23</span>
                                                    <span class="entry-month d-block">sep</span>
                                                </div>
                                                <div class="xs-black-overlay bg-aqua"></div>
                                            </a>
                                        </div><!-- .posts-thumb END -->
                                        <div class="post-info">
                                            <h4 class="entry-title">
                                                <a href="#">Disaster Relief</a>
                                            </h4>
                                            <div class="post-meta">
                                                <span class="comments-link">
                                                    <i class="fa fa-comments-o"></i>
                                                    <a href="">35 Comments</a>
                                                </span><!-- .comments-link -->
                                            </div>
                                        </div><!-- .post-info END -->
                                        <div class="clearfix"></div>
                                    </li><!-- 2nd post end-->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 footer-widget">
                            <h3 class="widget-title">Contact Us</h3>
                            <ul class="xs-info-list">
                                <li><i class="fa fa-home"></i>Sector # 48, 123 Street, miosya road VIC 28, Australia.</li>
                                <li><i class="fa fa-phone"></i>(800) 123.456.7890 (800) 123.456.7890 +00 99 88 5647</li>
                                <li><i class="fa fa-envelope-o"></i><a href="mailto:yourname@domain.com">yourname@domain.com</a></li>
                            </ul><!-- .xs-list-with-icon END -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="xs-copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="xs-copyright-text">
                                <p>&copy; Copyright 2018 <a href="https://themeforest.net/user/xpeedstudio/portfolio">XpeedStudio.</a> - All Right's Reserved</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <nav class="xs-footer-menu">
                                <ul>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Help Desk</a></li>
                                    <li><a href="#">Support</a></li>
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