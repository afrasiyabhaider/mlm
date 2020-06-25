<?php $__env->startSection('content'); ?>



    <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="table-responsive table-responsive-xl">
                    <table class="table align-items-center table-light">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Pin'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                        </tr>
                        </thead>


                        <tbody class="list">
                        <?php $__empty_1 = true; $__currentLoopData = $epin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($general->cur_sym); ?><?php echo e($data->amount); ?></td>
                                <td><?php echo e($data->pin); ?></td>

                                <td><?php if($data->status == 1): ?> <span class="badge badge-success"><?php echo app('translator')->get('Not Used'); ?></span> <?php else: ?> <span class="badge badge-warning"><?php echo app('translator')->get('Used'); ?></span> <?php endif; ?></td>
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

                        <?php echo e($epin->links()); ?>

                    </nav>

                </div>
            </div>
        </div>
    </div>






    <div class="modal fade" id="createEpinModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> <?php echo app('translator')->get('Create New Pin'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form  method="post" action="<?php echo e(route('user.pin.generate')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body text-center">

                        <strong class="text-center"><?php echo app('translator')->get('Amount'); ?></strong>
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="amount">
                            <div class="input-group-append">
                            <span class="input-group-text">
                                <?php echo e(__($general->cur_sym)); ?>

                            </span>
                            </div>

                        </div>
                        <small class="text-center text-danger"><?php echo app('translator')->get('This amount will subtract from your wallet and generate new pin.'); ?></small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> <?php echo app('translator')->get('Generate'); ?></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> <?php echo app('translator')->get('Close'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $('#code').on('keypress change', function () {
            var xx = document.getElementById('code').value;
            if (xx.length < 32) {
                $(this).val(function (index, value) {
                    return value.replace(/\W/gi, '').replace(/(.{8})/g, '$1-');
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make(activeTemplate() .'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Wamps\wamp64\www\freelance\mlm\core\resources\views/templates/tmp2//user/my_pin.blade.php ENDPATH**/ ?>