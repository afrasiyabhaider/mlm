<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($general->sitename(__($page_title) ?? '')); ?></title>
    <link rel="shortcut icon" type="image/png"
          href="<?php echo e(get_image(config('constants.logoIcon.path') .'/favicon.png')); ?>"/>
    <?php echo $__env->yieldPushContent('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'users/css/dashboard.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'users/css/custom.css')); ?>">
    <?php echo $__env->yieldPushContent('style'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>
    <link rel="stylesheet"
          href='<?php echo e(asset(activeTemplate(true) . "users/css/color.php?color=$general->bclr&color2=$general->sclr")); ?>'>
</head>
<body>
<?php echo $__env->yieldContent('panel'); ?>

<script src="<?php echo e(asset(activeTemplate(true) .'users/js/dashboard.min.js')); ?>"></script>
<script src="<?php echo e(asset(activeTemplate(true) .'users/js/main.js')); ?>"></script>

<?php echo $__env->yieldPushContent('script-lib'); ?>

<!-- Load toast -->
<?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="<?php echo e(asset(activeTemplate(true) .'users/js/nicEdit.js')); ?>"></script>

<script type="text/javascript">
    bkLib.onDomLoaded(function () {
        $(".nicEdit").each(function (index) {
            $(this).attr("id", "nicEditor" + index);
            new nicEditor({fullPanel: true}).panelInstance('nicEditor' + index, {hasPanel: true});
        });
    });
</script>

<script>$('[data-toggle=tooltip]').tooltip();</script>
<?php echo $__env->yieldPushContent('script'); ?>
<?php echo $__env->yieldPushContent('js'); ?>
</body>
</html>
<?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/layouts/user-master.blade.php ENDPATH**/ ?>