<?php $__env->startSection('panel'); ?>
<div class="main-container">
    <div class="container-fluid main-body-wrapper">
        <?php echo $__env->make(activeTemplate().'partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel-wrapper">
          <?php echo $__env->make(activeTemplate().'partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php echo $__env->make(activeTemplate().'partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="content-wrapper">
            <div class="container-fluid p-0">
              <?php echo $__env->yieldContent('content'); ?>
            </div>
          </div>
          <footer class="footer"></footer>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(activeTemplate().'layouts.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2/layouts/app.blade.php ENDPATH**/ ?>