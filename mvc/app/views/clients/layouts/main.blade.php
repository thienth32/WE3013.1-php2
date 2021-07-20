<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from massive.markup.themebucket.net/shop-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:55:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{PUBLIC_PATH}}assets/img/favicon.png">

    <title>@yield('title', 'WEB3013.1 - PHP2')</title>

    @include('clients.layouts.style')
</head>

<body>

    <!--  preloader start -->
    <div id="tb-preloader">
        <div class="tb-preloader-wave"></div>
    </div>
    <!-- preloader end -->


    <div class="wrapper">

        <!--header start-->
        @include('clients.layouts.header')
        <!--header end-->

        <!--body content start-->
        <section class="body-content ">

            @yield('content')


        </section>
        <!--body content end-->

        <!--footer start 1-->
        @include('clients.layouts.footer')
        <!--footer 1 end-->

    </div>

    @include('clients.layouts.script')
    
</body>


<!-- Mirrored from massive.markup.themebucket.net/shop-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:55:09 GMT -->
</html>
