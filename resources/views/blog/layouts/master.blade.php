<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Bootstrap 4 Blog Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('front_css/css/theme-1.css')}}">

</head> 

<body>
    @include('blog.layouts.header')
    @yield('content')
    @include('blog.layouts.footer')
    </div><!--//main-wrapper-->
     <!-- *****CONFIGURE STYLE (REMOVE ON YOUR PRODUCTION SITE)****** -->  
    <div id="config-panel" class="config-panel d-none d-lg-block">
        <div class="panel-inner">
            <a id="config-trigger" class="config-trigger config-panel-hide text-center" href="#"><i class="fas fa-cog fa-spin mx-auto" data-fa-transform="down-6" ></i></a>
            <h5 class="panel-title">Choose Colour</h5>
            <ul id="color-options" class="list-inline mb-0">
                <li class="theme-1 active list-inline-item"><a data-style="asset/front_css/css/theme-1.css" href="#"></a></li>
                <li class="theme-2  list-inline-item"><a data-style="asset/front_css/css/theme-2.css" href="#"></a></li>
                <li class="theme-3  list-inline-item"><a data-style="asset/front_css/css/theme-3.css" href="#"></a></li>
                <li class="theme-4  list-inline-item"><a data-style="asset/front_css/css/theme-4.css" href="#"></a></li>
                <li class="theme-5  list-inline-item"><a data-style="asset/front_css/css/theme-5.css" href="#"></a></li>
                <li class="theme-6  list-inline-item"><a data-style="asset/front_/css/theme-6.css" href="#"></a></li>
                <li class="theme-7  list-inline-item"><a data-style="asset/front_css/css/theme-7.css" href="#"></a></li>
                <li class="theme-8  list-inline-item"><a data-style="asset/front_css/css/theme-8.css" href="#"></a></li>
            </ul>
            <a id="config-close" class="close" href="#"><i class="fa fa-times-circle"></i></a>
        </div><!--//panel-inner-->
    </div><!--//configure-panel-->

    
       
    <!-- Javascript -->          
    <script src="{{asset('front_css/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('front_css/plugins/popper.min.js')}}"></script> 
    <script src="{{asset('front_css/plugins/bootstrap/js/bootstrap.min.js')}}"></script> 

    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="{{asset('front_css/js/demo/style-switcher.js')}}"></script>     
    

</body>
</html> 

