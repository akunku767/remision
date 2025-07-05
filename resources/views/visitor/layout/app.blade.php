<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}" />
    <!-- SITE TITLE -->
    <title>@yield('title') | Remision</title>
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font -->
    <link href="{{ asset('assets/fonts/Urbanist.css') }}" rel="stylesheet">
    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/themify-icons.css') }}">
    <link href='{{ asset('assets/css/boxicons.min.css') }}' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/fontawesome.css') }}">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owlcarousel/css/owl.theme.default.min.css') }}">
    <!--Preloader Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">
    <!--jquery-simple-mobilemenu Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-simple-mobilemenu.css') }}">
    <!--magnific-popup Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--animate Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--YouTubePopUp Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/YouTubePopUp.css') }}">
    <!--Slick Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <!--slick theme Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Latest jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
</head>

<body>
    <script>
        function success(text) {
            let timerInterval;
            Swal.fire({
                icon: "success",
                title: "Success!",
                html: text,
                timer: 2000,
                timerProgressBar: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            });
        }

        function fail(text) {
            let timerInterval;
            Swal.fire({
                icon: "error",
                title: "I'm Sorry!",
                html: text,
                timer: 2000,
                timerProgressBar: false,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            });
        }
    </script>

    @if (session()->has('success'))
        <script>
            success("{{ session('success') }}");
        </script>
    @endif

    @if (session()->has('fail'))
        <script>
            fail("{{ session('fail') }}");
        </script>
    @endif

    <!-- Start Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/img/preloader.gif') }}" alt="Loading...">
    </div>
    <!-- End Preloader -->

    <!-- Start Header -->
    @include('visitor.layout.partials.header')
    <!-- End Header -->

    @yield('content')

    <!-- Start Footer -->
    @include('visitor.layout.partials.footer')
    <!-- End Footer -->

    @yield('js')

    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery-simple-mobilemenu.min -->
    <script src="{{ asset('assets/js/jquery-simple-mobilemenu.js') }}"></script>
    <!-- imagesloaded.pkgd -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- masonry -->
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <!-- modernizer JS -->
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{ asset('assets/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- counterup -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <!-- jquery appear js -->
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    <!-- magnific-popup js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- YouTubePopUp js -->
    <script src="{{ asset('assets/js/YouTubePopUp.jquery.js') }}"></script>
    <!-- yvpopup-active js -->
    <script src="{{ asset('assets/js/yvpopup-active.js') }}"></script>
    <!-- scrolltopcontrol js -->
    <script src="{{ asset('assets/js/scrolltopcontrol.js') }}"></script>
    <!-- Wow js -->
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- scripts js -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
