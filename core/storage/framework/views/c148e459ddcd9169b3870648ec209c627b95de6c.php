<?php $__env->startSection('panel'); ?>

    <div class="signin-section pt-5" >
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-4 col-md-6 col-sm-8">
                    <div class="login-area">
                        <div class="login-header-wrapper text-center">
                           <a href="<?php echo e(url('/')); ?>"> <img class="logo" src="<?php echo e(get_image(config('constants.logoIcon.path') .'/logo.png')); ?>" alt="image"> </a>
                            <p class="text-center admin-brand-text"><?php echo app('translator')->get('User Sign In'); ?></p>
                        </div>
                        <form action="<?php echo e(route('user.login')); ?>" method="POST" class="login-form" id="recaptchaForm">
                            <?php echo csrf_field(); ?>
                            <div class="login-inner-block">
                                <div class="frm-grp">
                                    <label><?php echo app('translator')->get('Username'); ?></label>
                                    <input type="text" name="username" @keyup="checkPassword"  value="<?php echo e(old('username')); ?>" placeholder="<?php echo app('translator')->get('Enter your username'); ?>">
                                </div>
                                <div class="frm-grp">
                                    <label><?php echo app('translator')->get('Password'); ?></label>
                                    <input type="password" name="password" @keyup="checkPassword" placeholder="<?php echo app('translator')->get('Enter your password'); ?>">
                                </div>
                            </div>
                            <div class="d-flex mt-3 justify-content-between">
                                <div class="frm-group">
                                    <input type="checkbox" name="remember" id="checkbox">
                                    <label for="checkbox"><?php echo app('translator')->get('Remember me'); ?></label>
                                </div>
                            </div>
                            <div class="btn-area text-center">
                                <button type="submit" id="recaptcha" class="submit-btn"><?php echo app('translator')->get('Sign In'); ?></button>
                            </div>
                            <br>

                            <div class="d-flex mt-3 justify-content-between">
                                <a href="<?php echo e(route('user.password.request')); ?>" class="forget-pass"><?php echo app('translator')->get('Forget password?'); ?></a>
                                <a href="<?php echo e(route('user.register')); ?>" class="forget-pass"><?php echo app('translator')->get('Sign Up'); ?></a>
                            </div>


                        </form>
                        <script src="//code.jquery.com/jquery-3.4.1.min.js"></script>
                        <?php echo recaptcha() ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'users/css/signin.css')); ?>">
<?php $__env->stopPush(); ?>

<?php echo $__env->make(activeTemplate().'layouts.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/user/auth/login.blade.php ENDPATH**/ ?>