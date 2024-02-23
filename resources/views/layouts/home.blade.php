<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web-report/assets/img/logo/logo.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web-report/assets/css/responsive.css') }}">

    <script src="https://kit.fontawesome.com/319489147f.js" crossorigin="anonymous"></script>

</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    .lapor {
        background-color: #009695;
    }

    .btn {
        color: #fff;
    }

    .btn::before {
        background: #BB0207;
    }

    .preloader-circle {
        border-top-color: #BB0207;
    }

    .preloader-circle2 {
        border-top-color: #BB0207;
    }

    a:hover {}
</style>

<body>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('web-report/assets/img/logo/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    @include('layouts.navbar')

    <main class="py-4">
        @yield('konten')
    </main>
    <footer>

        <!-- Footer Start-->
        <div class="footer-main" data-background="{{ asset('web-report/assets/img/shape/footer_bg.png') }}">
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->

    </footer>

    @include('sweetalert::alert')
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('web-report/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('web-report/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('web-report/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('web-report/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('web-report/assets/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('web-report/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('web-report/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('web-report/assets/js/contact.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('web-report/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('web-report/assets/js/main.js') }}"></script>
</body>

</html>
