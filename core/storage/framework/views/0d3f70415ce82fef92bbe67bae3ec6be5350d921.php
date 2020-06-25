<?php $__env->startSection('panel'); ?>

    <div class="signin-section pt-5" style="background-image: url('./assets/images/login.png');">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-4 col-md-6 col-sm-8">
                    <div class="login-area">
                        <div class="login-header-wrapper text-center">
                            <a href="<?php echo e(url('/')); ?>">

                                <img class="logo" src="<?php echo e(get_image(config('constants.logoIcon.path') .'/logo.png')); ?>" alt="image">  </a><p class="text-center admin-brand-text"><?php echo e($page_title); ?></p>
                        </div>
                        <form action="<?php echo e(route('user.password.email')); ?>" method="POST" class="login-form">
                            <?php echo csrf_field(); ?>
                            <div class="login-inner-block">
                                <div class="frm-grp">
                                    <label><?php echo app('translator')->get('Enter Your Email'); ?></label>
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email address" required>
                                </div>
                            </div>


                            <div class="btn-area text-center">
                                <button type="submit" class="submit-btn"><?php echo app('translator')->get('Send Reset Code'); ?></button>
                            </div>
                            <div class="d-flex mt-5 justify-content-center">
                                <a href="<?php echo e(route('user.login')); ?>" class="forget-pass"><?php echo app('translator')->get('Login Here'); ?></a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'users/css/signin.css')); ?>">
<?php $__env->stopPush(); ?>


<?php echo $__env->make(activeTemplate().'layouts.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/user/auth/passwords/email.blade.php ENDPATH**/ ?>