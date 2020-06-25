<?php $__env->startSection('content'); ?>

<style>
.alert {
  padding: 20px;
  background-color: #de561f;
  color: white;
}
.alert1 {
  padding: 20px;
  background-color: #1f920a;
  color: white;
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
  <?php if(auth()->user()->plan_id == 0): ?>
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Congratulations For Signing up!</strong><hr> Deposit your $50 to Buy your Membership Slot and get activated.  <a href="referrals"  class="btn btn-sm btn-neutral">See Referrals Details Here</a> 
</div>
<?php endif; ?>

 <?php if(auth()->user()->plan_id = 1): ?>
<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Yeah! You Did it!</strong><hr> You have Just activate the 50dollar Plan. The Next Task is to refer 3 people. <a href="referrals"  class="btn btn-sm btn-neutral">Click Here To See Referral Details</a> 
</div>
    <?php endif; ?>
    

    <div class="row">
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice border-radius-5"  data-bg="2ecc71" data-before="27ae60"
                 style="background: #2ecc71; --before-bg-color:#27ae60;">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money(Auth::user()->balance)); ?> </h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Current Balance'); ?></h4>
                    <a href="<?php echo e(route('user.deposit.history')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-primary border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($total_deposit)); ?> </h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total Deposit'); ?></h4>
                    <a href="<?php echo e(route('user.deposit.history')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($total_withdraw)); ?> </h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total Withdraw'); ?></h4>
                    <a href="<?php echo e(route('user.withdraw')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-warning border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($ref_com)); ?></h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total Referral Commission'); ?></h4>
                    <a href="<?php echo e(route('user.level.com')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-info border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($level_com)); ?></h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total Level Commission'); ?></h4>
                    <a href="<?php echo e(route('user.level.com')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-dark border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($total_epin_recharge)); ?></h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total E-Pin Recharged'); ?></h4>
                    <a href="<?php echo e(route('user.e_pin.recharge')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus"></i>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-default border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($total_epin_generate)); ?></h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total E-Pin Generated'); ?></h4>
                    <a href="<?php echo e(route('user.e_pin.generated')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-plus-circle"></i>
                </div>
            </div>
        </div>



        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-blue border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($general->cur_sym); ?><?php echo e(formatter_money($total_bal_transfer)); ?></h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total Transferred Balance'); ?></h4>
                    <a href="<?php echo e(route('user.balance.tf.log')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-random"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="dashboard-w2 slice bg-red border-radius-5">
                <div class="details">
                    <h2 class="amount mb-2 font-weight-bold"><?php echo e($total_direct_ref); ?></h2>
                    <h4 class="mb-3"><?php echo app('translator')->get('Total My Direct Referral'); ?></h4>
                    <a href="<?php echo e(route('user.ref.index')); ?>" class="btn btn-sm btn-neutral"><?php echo app('translator')->get('View all'); ?></a>
                </div>
                <div class="icon">
                    <i class="fa fa-sitemap"></i>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make(activeTemplate() .'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/user/dashboard.blade.php ENDPATH**/ ?>