<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta >
    <title>Saudagar Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/slicknav.min.css') }}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <style>
        body {
            overflow-x: hidden:
        }
    </style>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include('Template.Dashboard.sidebar')

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2024. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @yield('script')
    <!-- jquery latest version -->
    {{-- <script src="{{ asset('assets/assets/js/vendor/jquery-2.2.4.min.js') }}"></script> --}}
    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- all line chart activation -->
    <script src="{{ asset('assets/assets/js/line-chart.js') }}"></script>
    <!-- all bar chart activation -->
    <script src="{{ asset('assets/assets/js/bar-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/assets/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/assets/js/scripts.js') }}"></script>
</body>

</html>
