<div class="table-responsive">
    <table id="datatable"
           style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
           class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
        <thead class="thead-light thead-50 text-capitalize">
        <tr>
            <th><?php echo e(translate('SL')); ?></th>
            <th><?php echo e(translate('amount')); ?></th>
            <th><?php echo e(translate('request_time')); ?></th>
            <th><?php echo e(translate('status')); ?></th>
            <th class="text-center"><?php echo e(translate('action')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if($withdrawRequests->count() > 0): ?>
            <?php $__currentLoopData = $withdrawRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$withdrawRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($withdrawRequests->firstitem()+$key); ?></td>
                    <td><?php echo e(currencyConverter($withdrawRequest['amount'])); ?></td>
                    <td><?php echo e(date("F jS, Y", strtotime($withdrawRequest->created_at))); ?></td>
                    <td>
                        <?php if($withdrawRequest->approved==0): ?>
                            <label class="badge badge-soft--primary"><?php echo e(translate('pending')); ?></label>
                        <?php elseif($withdrawRequest->approved==1): ?>
                            <label class="badge badge-soft-success"><?php echo e(translate('approved')); ?></label>
                        <?php else: ?>
                            <label class="badge badge-soft-danger"><?php echo e(translate('denied')); ?></label>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <?php if($withdrawRequest->approved==0): ?>
                            <button id="<?php echo e(route('vendor.business-settings.withdraw.close', [$withdrawRequest['id']])); ?>"
                                    data-action="<?php echo e(route('vendor.business-settings.withdraw.close', [$withdrawRequest['id']])); ?>"
                                    class="btn btn--primary btn-sm close-request">
                                <?php echo e(translate('close')); ?>

                            </button>
                        <?php else: ?>
                            <span class="btn btn--primary btn-sm disabled">
                                <?php echo e(translate('close')); ?>

                            </span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <td colspan="5" class="text-center">
                <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>" alt="<?php echo e(translate('image_description')); ?>">
                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
            </td>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="table-responsive mt-4">
    <div class="px-4 d-flex justify-content-lg-end">
        <?php echo e($withdrawRequests->links()); ?>

    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/vendor-views/withdraw/_table.blade.php ENDPATH**/ ?>