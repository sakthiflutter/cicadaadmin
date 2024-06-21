<?php $__env->startSection('title', translate('withdraw_Request')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/withdraw-icon.png')); ?>" alt="">
                <?php echo e(translate('withdraw')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header flex-wrap gap-2">
                        <h5 class="mb-0 text-capitalize"><?php echo e(translate('withdraw_Request_Table')); ?>

                            <span class="badge badge-soft-dark radius-50 fz-12 ml-1" id="withdraw-requests-count"><?php echo e($withdrawRequests->total()); ?></span>
                        </h5>
                        <select name="status" class="custom-select max-w-200 status-filter" >
                            <option value="all"><?php echo e(translate('all')); ?></option>
                            <option value="approved"><?php echo e(translate('approved')); ?></option>
                            <option value="denied"><?php echo e(translate('denied')); ?></option>
                            <option value="pending"><?php echo e(translate('pending')); ?></option>
                        </select>
                    </div>
                    <div id="status-wise-view">
                        <?php echo $__env->make('vendor-views.withdraw._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="get-status-filter-route" data-action="<?php echo e(route('vendor.business-settings.withdraw.index')); ?>"></span>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/vendor/withdraw.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/withdraw/index.blade.php ENDPATH**/ ?>