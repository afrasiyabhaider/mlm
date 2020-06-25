<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="card-title font-weight-normal"><?php echo app('translator')->get('Referrer Link'); ?></h4>
                </div>

                <div class="card-body">

                    <div class="form-row align-items-center">
                        <div class="frm-grp form-group col-md-6">

                            <b><?php echo app('translator')->get('My Points'); ?></b>:
                            <b><?php echo e(Auth::user()->points); ?> points</b>

                        </div>

                        <div class="frm-grp form-group col-md-6">

                            <b><?php echo app('translator')->get('My Level'); ?></b>:
                            <?php if(Auth::user()->points >= 100 && Auth::user()->points < 300): ?>
                            <b>Level 1</b>
                            <?php elseif(Auth::user()->points >= 300 && Auth::user()->points < 500): ?>
                            <b>Level 2</b>
                            <?php elseif(Auth::user()->points >= 500 && Auth::user()->points < 1000): ?>
                            <b>Level 3</b>
                            <?php elseif(Auth::user()->points > 1000 && Auth::user()->points < 3000): ?>
                            <b>Level 4</b>
                            <?php elseif(Auth::user()->points > 3000): ?>
                            <b>Level 5</b>
                            <?php else: ?>
                            <b>Under Progress</b>
                            <?php endif; ?>

                        </div>
                    </div>
                    <hr>

                <?php if(Auth::user()->plan_id): ?>
                    <form id="copyBoard" >
                        <div class="form-row align-items-center">
                            <div class="col-md-10 my-1">
                                <input value="<?php echo e(url('/')); ?>/user/register/<?php echo e(auth()->user()->username); ?>" type="url" id="ref" class="form-control from-control-lg" readonly>
                            </div>
                            <div class="col-md-2 my-1">
                                <button   type="button" @click="copyBtnClick" data-copytarget="#ref" id="copybtn" class="btn btn-primary btn-block"> <i class="fa fa-copy"></i> Copy</button>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>




                </div>

            </div>
        </div>

        <div class="col-lg-12">

            <div class="card">
                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Username'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Email'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Points'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Plan'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Join date'); ?></th>
                        </tr>
                        </thead>


                        <tbody class="list">
                        <?php $__empty_1 = true; $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($data->fullname); ?></td>
                                <td><?php echo e($data->username); ?></td>
                                <td><?php echo e($data->email); ?></td>
                                <td><?php echo e($data->points); ?> Points</td>
                                <td>
                                    <?php $plan = \App\Plan::find($data->plan_id); ?>
                                    <?php if($plan != NULL): ?>
                                        <?php echo e($plan->name); ?>

                                    <?php else: ?>
                                        <?php echo app('translator')->get('N/A'); ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(show_datetime($data->created_at)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-muted text-center" colspan="100%"><?php echo e(__('NO DATA FOUND')); ?></td>
                            </tr>
                        <?php endif; ?>
                        </tbody>


                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">

                        <?php echo e($referrals->links()); ?>

                    </nav>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        (function() {
            'use strict';
            document.body.addEventListener('click', copy, true);
            function copy(e) {
                var
                    t = e.target,
                    c = t.dataset.copytarget,
                    inp = (c ? document.querySelector(c) : null);
                if (inp && inp.select) {
                    inp.select();
                    try {
                        document.execCommand('copy');
                        inp.blur();
                        t.classList.add('copied');
                        setTimeout(function() { t.classList.remove('copied'); }, 1500);
                    }catch (err) {
                        alert('please press Ctrl/Cmd+C to copy');
                    }
                }
            }
        })();
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make(activeTemplate() .'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2//user/referrer.blade.php ENDPATH**/ ?>