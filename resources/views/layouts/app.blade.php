<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>@yield('title','A default title')</title>
    <meta name="keywords" content="@yield('meta_keywords','some default keywords')">
    <meta name="description" content="@yield('meta_description','default description')">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    
    <!-- StyleSheet -->
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    
    <!-- TravelTrek StyleSheet -->
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

    
</head>
<body class="js">
    
    <!-- Preloader -->
    
    <!-- End Preloader -->

    <!-- Header Area -->
    <header id="site-header" class="site-header">
        <!-- Start Topbar -->
        
        <!--/ End Topbar -->
        <!-- Middle Header -->
        <div class="middle-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index4.html"><h1>Logo</h1></a>
                        </div>
                        <!--/ End Logo -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-12">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <!-- Single Widget -->
                            <div class="single-widget">
                                <img src="{{asset('frontend/images/location-icon.png')}}" alt="#">
                                <h4>{{$setting->name}}</h4>
                                <p>{{$setting->address}}</p>
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <div class="single-widget">
                                <img src="{{asset('frontend/images/call-icon.png')}}" alt="#">
                                <h4>+{{$setting->toll_free}}</h4>
                                <p>Troll Free </p>
                            </div>
                            <!--/ End Single Widget -->
                            <!-- Single Widget -->
                            <div class="single-widget">
                                @php
                                 $dates = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                                @endphp
                                <img src="{{asset('frontend/images/clock-icon.png')}}" alt="#">
                                <h4>
                                    @for($i=0; $i<=6; $i++)
                                        @if($dates[$i] == $setting->close_day)
                                            @if($i==6)
                                             {{$dates[0]}} - {{$dates[5]}}
                                            @else
                                            {{$dates[$i+1]}} - {{$dates[$i-1]}}
                                            @endif
                                        @endif
                                    @endfor
                                    {{$setting->open_time}} {{$setting->close_time}}
                                </h4>
                                <p>
                                    @for($i=0; $i<=6; $i++)
                                        @if($dates[$i] == $setting->close_day) {{$setting->close_day}} Closed @endif
                                    @endfor
                                </p>
                            </div>
                            <!--/ End Single Widget -->
                        </div>
                        <!--/ End Header Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Middle Header -->
        <!-- Header Bottom -->
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
                                    <li class="@if(isset($page) && $page=='home') active @endif"><a href="{{route('index')}}">Home</a></li>
                                    <li class="@if(isset($page) && $page=='blog') active @endif"><a href="{{route('getBlog')}}">Blog</a></li>
                                    <li><a href="#">Destinations <i class="fa fa-angle-down"></i></a>
                                        @if(count($navCategories)>0)
                                        <ul class="dropdown">
                                            @foreach($navCategories as $category)
                                            <li><a href="destinations.html">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    <li class="@if(isset($page) && $page=='about') active @endif"><a href="{{route('getAbout')}}">About</a></li>
                                    <li class="@if(isset($page) && $page=='booking') active @endif"><a href="#">Booking</a></li>
                                    <li class="@if(isset($page) && $page=='contact') active @endif"><a href="{{route('getContact')}}">Contact Us</a></li>
                                    <li class="@if(isset($page) && $page=='faq') active @endif"><a href="{{route('getFAQ')}}">Faq</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Bottom -->
    </header>
    <!--/ End Header Area -->
    
    <!-- Hero Area -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-widget">
                            <h2>Contact Us</h2>
                            <ul>
                                <li><a href="#">Address : {{$setting->address}}</a></li>
                                <li><a href="#"> Phone : {{$setting->contact_no}} </a></li>
                                <li><a href="#"> Email : {{$setting->email}} </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-widget">
                            <h2>Quick Menu</h2>
                            <ul>
                                <li><a href="{{route('getAbout')}}">About Us</a></li>
                                <li><a href="{{route('getContact')}}">Contact</a></li>
                                <li><a href="{{route('getBlog')}}">Blog</a></li>
                                <li><a href="">Booking</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-widget">
                            <h2>Categories</h2>
                            <ul>
                                @foreach($footerCategories as $category)
                                <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-widget about">
                            <h2>Location</h2>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1765.6153270902448!2d85.32912848901375!3d27.741030883383342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19f82fb3fd73%3A0x989586b29a39a2e6!2sOnvirotech%20pvt.%20ltd%2C!5e0!3m2!1sen!2snp!4v1631084723027!5m2!1sen!2snp" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-inner">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="copyright"> 
                                        <p>Copyright &#9400; {{date('Y')}} by <a href="{{route('index')}}">{{$setting->name}}</a> All Right Reserved</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> 
    <!--/ End footer -->
 
    <!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="{{asset('frontend/js/bootstrap-datepicker.js')}}"></script>
    <!-- Steller JS -->
    <script src="{{asset('frontend/js/steller.js')}}"></script>
    <!-- Fancybox JS -->
    <script src="{{asset('frontend/js/facnybox.min.js')}}"></script>
    <!-- Circle Progress JS -->
    <script src="{{asset('frontend/js/circle-progress.min.js')}}"></script>
    <!-- Slicknav JS -->
    <script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
    <!-- Niceselect JS -->
    <script src="{{asset('frontend/js/niceselect.js')}}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
    <!-- Waypoints JS -->
    <script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
    <!-- Wow Min JS -->
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <!-- Jquery Counterup JS -->
    <script src="{{asset('frontend/js/jquery-counterup.min.js')}}"></script>
    <!-- Ytplayer JS -->
    <script src="{{asset('frontend/js/ytplayer.min.js')}}"></script>
    <!-- ScrollUp JS -->
    <script src="{{asset('frontend/js/scrollup.js')}}"></script>
    <!-- Easing JS -->
    <script src="{{asset('frontend/js/easing.js')}}"></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script> 
    <script src="{{asset('frontend/js/gmap.min.js')}}"></script>
    <!-- Active JS -->
    <script src="{{asset('frontend/js/active.js')}}"></script>
</body>

<!-- Mirrored from themelamp.com/themes/traveltrek-demo/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Sep 2021 05:00:00 GMT -->
</html>