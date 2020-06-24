<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="{{asset('admin_assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <!--preloader-->
    <div id="preloader">
         <div id="status"></div>
      </div>
      <div class="wrapper">
     @include('admin.layouts.sidebar')
    <div id="right-panel" class="right-panel">
    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')

</div>
    

   
    <!-- Right Panel -->
<script src="{{asset('admin_assets/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="assets/js/main.js"></script>

    <!-- Gmaps -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2jlT6C_to6X1mMvR9yRWeRvpIgTXgddM"></script>
    <script src="{{asset('vendors/gmaps/gmaps.min.js')}}"></script>
    <script src="{{asset('assets/js/init-scripts/gmap/gmap.init.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
