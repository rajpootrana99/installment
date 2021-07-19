<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Metorik - Responsive Bootstrap 4 Admin Dashboard Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
</head>
<body class="header-top-bg">
<!-- loader Start -->
<div id="loading">

</div>

<div class="wrapper">
    @include('layout.partials.sidebar')
    @yield('section')
</div>
@include('layout.partials.footer')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Appear JavaScript -->
<script src="{{ asset('js/jquery.appear.js') }}"></script>
<!-- Countdown JavaScript -->
<script src="{{ asset('js/countdown.min.js') }}"></script>
<!-- Counterup JavaScript -->
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<!-- Wow JavaScript -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<!-- Apexcharts JavaScript -->
<script src="{{ asset('js/apexcharts.js') }}"></script>
<!-- Slick JavaScript -->
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('js/select2.min.js') }}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
<!-- lottie JavaScript -->
<script src="{{ asset('js/lottie.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('js/chart-custom.js') }}"></script>
<!-- Custom JavaScript -->
<script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
