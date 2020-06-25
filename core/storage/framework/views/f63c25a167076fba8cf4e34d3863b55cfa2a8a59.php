<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" href="<?php echo e(get_image(config('constants.logoIcon.path') .'/favicon.png')); ?>"
          type="image/x-icon">

    <title><?php echo e($general->sitename(__($page_title))); ?> </title>


    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/lightcase.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/odometer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/nice-select.css')); ?>">
    <link href="asset/static/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/static/plugin/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="asset/static/plugin/et-line/style.css" rel="stylesheet">
    <link href="asset/static/plugin/themify-icons/themify-icons.css" rel="stylesheet">
    <link href="asset/static/plugin/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="asset/static/plugin/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
    <link href="asset/static/plugin/magnific/magnific-popup.css" rel="stylesheet">
    <link href="asset/static/style/master.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/static/style/sweetalert.css" type="text/css">


    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/iziToast.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'front/css/main.css')); ?>">


    <?php echo $__env->yieldContent('style'); ?>

    <?php echo $__env->make('partials.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('css'); ?>

    <?php echo $general->chat_script; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>

    <link rel="stylesheet"
          href='<?php echo e(asset(activeTemplate(true) . "front/css/color.php?color=$general->bclr&color2=$general->sclr")); ?>'>


</head>


<body>

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<div class="overlay"></div>
<a href="#0" class="scrollToTop">
    <i class="fas fa-angle-up"></i>
</a>

<header>
    <div class="header-section">
        <div class="container">
            <div class="header-area">
                <div class="logo">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(get_image(config('constants.logoIcon.path') .'/logo.png')); ?>"
                                                alt="logo"></a>
                </div>
                <ul class="menu">

                    <li>
                        <a href="<?php echo e(url('/')); ?>"><?php echo app('translator')->get('Home'); ?></a>
                    </li>


                    <li>
                        <a href="<?php echo e(route('faq')); ?>"><?php echo app('translator')->get('Faq'); ?></a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('News'); ?></a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->get('Contact'); ?></a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.register')); ?>" class="header-button custom-button blue"><?php echo app('translator')->get('register'); ?></a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('user.login')); ?>" class="header-button custom-button white"><?php echo app('translator')->get('Sign In'); ?></a>
                    </li>
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <form class="search-form">
                    <div class="form-group m-0">
                        <input type="text" placeholder="Search Here">
                        <button type="submit">
                            <i class="flaticon-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="header-fix w-100"></div>

</header>


<?php echo $__env->yieldContent('content'); ?>


<footer class="dark-bg bg_img" data-paroller-factor="0.5" data-paroller-type="background"
        data-paroller-direction="vertical" data-background="./assets/images/shape/shape04.png">
    <div class="footer-top padding-top padding-bottom">
        <div class="container">
            <div class="row mb-50-none justify-content-center">
                <div class="col-sm-6 col-lg-8 ">
                    <div class="footer-widget widget-about ">
                        <div class="logo">
                            <a href="<?php echo e(url('/')); ?>"><img
                                        src="<?php echo e(get_image(config('constants.logoIcon.path') .'/logo.png')); ?>" alt="logo">
                            </a>
                        </div>
                        <div class="content text-center">
                            <p><?php echo e(__($footer->subtitle)); ?></p>
                            <ul class="social-icons-area">
                                <?php $__currentLoopData = $social; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($item->value->url); ?>"
                                           title="<?php echo e($item->value->title); ?>"><?php echo $item->value->icon; ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <div class="container">
            <p class="m-0"> <?php echo e(__($footer->title)); ?></p>
        </div>
    </div>
    <div class="right banner-shape shape04"></div>
</footer>


<script src="<?php echo e(asset(activeTemplate(true) .'front/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/modernizr-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/lightcase.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/odometer.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/viewport.jquery.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/nice-select.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/paroller.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/js/main.js')); ?>"></script>


<script src="<?php echo e(asset(activeTemplate(true) .'front/js/iziToast.min.js')); ?>"></script>


<script src="<?php echo e(asset(activeTemplate(true) .'front/vue/vue-handle-error.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/vue/vue.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'front/vue/axios.js')); ?>"></script>
<script src="asset/static/js/sweetalert.js"></script>
<script src="asset/static/js/jquery-3.2.1.min.js"></script>
<script src="asset/static/js/jquery-migrate-3.0.0.min.js"></script>
<script src="asset/static/plugin/appear/jquery.appear.js"></script>
<script src="asset/static/plugin/bootstrap/js/popper.min.js"></script>
<script src="asset/static/plugin/bootstrap/js/bootstrap.js"></script>
<script src="asset/static/js/custom.js"></script>


<?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('js'); ?>

<?php echo $__env->yieldPushContent('js'); ?>

<?php echo $__env->yieldContent('script'); ?>

<script>
    $(document).on('change', '#langSel', function () {
        var code = $(this).val();
        window.location.href = "<?php echo e(url('/')); ?>/change-lang/" + code;
    });
</script>

<!--Start of Tawk.to Script
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5ece2a29c75cbf1769efd0c5/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>


<?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/layouts/master.blade.php ENDPATH**/ ?>