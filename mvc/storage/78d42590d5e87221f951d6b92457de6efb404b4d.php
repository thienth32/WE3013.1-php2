<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from massive.markup.themebucket.net/shop-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:55:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="<?php echo e(PUBLIC_PATH); ?>assets/img/favicon.png">

    <title><?php echo $__env->yieldContent('title', 'WEB3013.1 - PHP2'); ?></title>

    <?php echo $__env->make('clients.layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

    <!--  preloader start -->
    <div id="tb-preloader">
        <div class="tb-preloader-wave"></div>
    </div>
    <!-- preloader end -->


    <div class="wrapper">

        <!--header start-->
        <?php echo $__env->make('clients.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--header end-->

        <!--body content start-->
        <section class="body-content ">

            <?php echo $__env->yieldContent('content'); ?>


        </section>
        <!--body content end-->

        <!--footer start 1-->
        <?php echo $__env->make('clients.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--footer 1 end-->

    </div>

    <?php echo $__env->make('clients.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</body>


<!-- Mirrored from massive.markup.themebucket.net/shop-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Sep 2017 04:55:09 GMT -->
</html>
<?php /**PATH /Library/WebServer/Documents/WE3013.1-php2/mvc/app/views/clients/layouts/main.blade.php ENDPATH**/ ?>