<?php $__env->startPush('style-lib'); ?>
<link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'build/css/intlTelInput.css')); ?>">
<style>
    .intl-tel-input {
        width: 100%;
    }

</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('panel'); ?>

    <div class="signin-section pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 ">
                    <div class="login-area registration-form-area">
                        <div class="login-header-wrapper text-center">
                            <a href="<?php echo e(url('/')); ?>" > <img class="logo" src="<?php echo e(get_image(config('constants.logoIcon.path') .'/logo.png')); ?>"
                                                          alt="image"> </a>
                            <p class="text-center admin-brand-text"><?php echo app('translator')->get('User Sign Up'); ?></p>
                        </div>
                        <form action="<?php echo e(route('user.register')); ?>" method="POST" class="login-form" id="recaptchaForm">
                            <?php echo csrf_field(); ?>
                            <div class="login-inner-block">

                                <div class="form-row">
                                    <div class="frm-grp form-group col-md-6">

                                        <label><?php echo app('translator')->get('Full name'); ?>*</label>
                                        <input type="text" value="<?php echo e(old('firstname')); ?>"
                                               placeholder="<?php echo app('translator')->get('Enter your Full name'); ?>"
                                               name="firstname">
                                    </div>

                                    <!--<div class="frm-grp form-group col-md-6">

                                        <label><?php echo app('translator')->get('Surname'); ?></label>
                                        <input type="text" value="<?php echo e(old('surname')); ?>"
                                               placeholder="<?php echo app('translator')->get('Enter your Surname'); ?>"
                                               name="surname">
                                    </div>-->
                                    <?php if(isset($ref_user)): ?>

                                        <div class="frm-grp form-group col-md-6">

                                            <label><?php echo app('translator')->get('Sponsor'); ?></label>
                                            <input  type="text" value="<?php echo e($ref_user->username); ?>" name="ref_user" class="ref_user" disabled readonly>
                                            <input  type="hidden" value="<?php echo e($ref_user->id); ?>" class="ref_user_id" name="ref_id">

                                        </div>

                                    <?php else: ?>
                                        <div class="frm-grp form-group col-md-6">

                                            <label><?php echo app('translator')->get('Sponsor Email'); ?> (optional)</label>
                                            <input  type="text"  placeholder="<?php echo app('translator')->get('Enter Sponsor email'); ?>" value="<?php echo e(old('ref_user')); ?>" name="ref_user" class="ref_user" >
                                            <input type="hidden"  value="<?php echo e(old('ref_id')); ?>" class="ref_user_id" name="ref_id">

                                        </div>
                                    <?php endif; ?>


                                    <div class="frm-grp form-group col-md-6">
                                        <label><?php echo app('translator')->get('Email'); ?>*</label>
                                        <input type="text" value="<?php echo e(old('email')); ?>"
                                               placeholder="<?php echo app('translator')->get('Enter your email'); ?>"
                                               name="email">
                                    </div>

                                    <div class="frm-grp form-group col-md-6">
                                        <label><?php echo app('translator')->get('Mobile'); ?>*</label>
                                        <input type="text" value="<?php echo e(old('mobile')); ?>"
                                               placeholder="<?php echo app('translator')->get('Enter your mobile number'); ?>"
                                               name="mobile">
                                    </div>
                                    <div class="frm-grp form-group col-md-6">
                                        <label><?php echo app('translator')->get('Country'); ?>*</label>

                                        <select class="frm-grp" name="country">
                                            <option selected="selected">Spain</option>
                                            <?php echo $__env->make('partials.country', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <option>Spain</option>

                                        </select>
                                    </div>

                                    <div class="frm-grp form-group col-md-6">
                                        <label><?php echo app('translator')->get('Username'); ?>*</label>
                                        <input type="text" name="username"
                                               value="<?php echo e(old('username')); ?>" placeholder="<?php echo app('translator')->get('Enter your username'); ?>">
                                    </div>

                                    <div class="frm-grp form-group col-md-6">
                                        <label><?php echo app('translator')->get('Password'); ?>*</label>
                                        <input type="password" name="password"
                                               placeholder="<?php echo app('translator')->get('Enter your password'); ?>">
                                    </div>
                                    <div class="frm-grp form-group col-md-6">
                                        <label><?php echo app('translator')->get('Confirm Password'); ?>*</label>
                                        <input type="password" name="password_confirmation"
                                               placeholder="<?php echo app('translator')->get('Confirm your password'); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="btn-area text-center">
                                <button type="submit" id="recaptcha" class="submit-btn"><?php echo app('translator')->get('Sign Up'); ?></button>
                            </div>
                            <br>

                            <div class="d-flex mt-3 justify-content-between">
                                <a href="<?php echo e(route('user.password.request')); ?>" class="forget-pass"><?php echo app('translator')->get('Forget password?'); ?></a>
                                <a href="<?php echo e(route('user.login')); ?>"
                                   class="forget-pass"><?php echo app('translator')->get('Sign In'); ?></a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link rel="stylesheet" href="<?php echo e(asset(activeTemplate(true) .'users/css/signin.css')); ?>">
<style>
    .registration-form-area .frm-grp+.frm-grp {
        margin-top: 0;
    }
    .registration-form-area .frm-grp label {
        color: #98a6ad!important;
        font-weight: 400;
    }
    .registration-form-area select {
        border: 1px solid #5220c5;
        width: 100%;
        padding: 12px 20px;
        color: #ffffff;;
        z-index: 9;
        background-color: #3c139c;
        border-radius: 3px;
    }
    .registration-form-area select option {
        color: #ffffff;
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        });
        $( ".ref_user" ).autocomplete({
            source: function( request, response ) {
                // Fetch data
                $.ajax({
                    url:  "<?php echo e(route('user.search_ref')); ?>",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: $('[name="_token"]').val(),
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },

            select: function (event, ui) {
                console.log(ui)
                $(this).parent().find(".ref_user_id").val(ui.item.value);
                $(this).val(ui.item.label);
                $(this).unbind("change");
                return false;
            }
        });
    });

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make(activeTemplate().'layouts.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2//user/auth/register.blade.php ENDPATH**/ ?>