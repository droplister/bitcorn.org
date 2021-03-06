<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto+Slab:400,700" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/xsIcon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/isotope.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors/color-4.css') }}">
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
        </div>

        <header class="xs-header header-transparent">
            <div class="container">
                <nav class="xs-menus">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper row">
                        <div class="xs-logo-wraper col-lg-2 xs-padding-0">
                            <a class="nav-brand" href="{{ route('home.index') }}">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-7">
                            <ul class="nav-menu">
                                <li>
                                    <a href="{{ route('home.index') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about.index') }}">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('causes.index') }}">Causes</a>
                                </li>
                                <li>
                                    <a href="{{ route('events.index') }}">Events</a>
                                </li>
                                <li>
                                    <a href="{{ route('elections.index') }}">Elections</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact.create') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="xs-navs-button d-flex-center-end col-lg-3">
                            <a href="{{ route('donate.index') }}" class="btn btn-primary">
                                <span class="badge"><i class="fa fa-heart"></i></span> Donate Now
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        @yield('content')

        <footer class="xs-footer-section">
            <div class="container">
                <div class="xs-copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="xs-copyright-text">
                                <p>
                                    <a href="https://github.com/droplister/bitcorn.org" target="_blank">GitHub</a>
                                    <a href="{{ route('pages.terms') }}" class="ml-3">Terms</a>
                                    <a href="{{ route('pages.privacy') }}" class="ml-3">Privacy</a>
                                    <a href="{{ route('pages.disclaimer') }}" class="ml-3">Disclaimer</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <nav class="xs-footer-menu">
                                <ul>
                                    <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li><a href="https://t.me/bitcorns" target="_blank">Community</a></li>
                                    <li><a href="{{ route('contact.create') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xs-back-to-top-wraper d-none d-sm-inline-block">
                <a href="#" class="xs-back-to-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>       

        <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('assets/js/spectragram.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCy7becgYuLwns3uumNm6WdBYkBpLfy44k"></script>

        <script src="{{ asset('assets/js/main.js') }}"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112477384-9"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-112477384-9');
        </script>

    </body>
</html>