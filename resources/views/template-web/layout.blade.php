<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Klinik AL Mafaz</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="manifest" href="site.webmanifest"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web') }}/assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/gijgo.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/css/animated-headline.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/themify-icons.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/slick.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/nice-select.css">
	<link rel="stylesheet" href="{{ asset('web') }}/assets/css/style.css">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('web') }}/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
    @include('template-web.navbar')

    <!-- Header End -->
</header>
<main>
  
    @yield('content')

    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <h1 class="text-light">Al Mafaz</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p class="info1">Klinik Al Mafaz berdiri pada tahun 2017, yang didirikan oleh dr. Sabwan Yulio. Klinik Al Mafaz terletak di Jalan Soekarno Hatta, Kecamatan Benai Kabupaten Kuantan Singingi. Dengan berdirinya Klinik Al Mafaz Benai akan memberikan kemudahan terhadap masyarakat dalam akses terhadap pelayanan kesehatan dan medis yang ada di Kecamatan Benai. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-number mb-50">
                                    <h4><span>+628 </span>2283651914</h4>
                                    <p>Jl. Soekarno Hatta, Benai, Kec. Benai, Kabupaten Kuantan Singingi, Riau</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                    Send
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{ asset('web') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('web') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('web') }}/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('web') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('web') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/animated.headline.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="{{ asset('web') }}/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('web') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="{{ asset('web') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/waypoints.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="{{ asset('web') }}/assets/js/contact.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.form.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.validate.min.js"></script>
    <script src="{{ asset('web') }}/assets/js/mail-script.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('web') }}/assets/js/plugins.js"></script>
    <script src="{{ asset('web') }}/assets/js/main.js"></script>
    
    </body>
</html>