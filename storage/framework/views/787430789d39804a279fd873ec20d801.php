<?php $__env->startSection('title', __('Not Found')); ?>

<?php $__env->startSection('message'); ?>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12">
                <div class="text-primary text-center">
                    <img src="<?php echo e(dynamicAsset(path: "public/assets/front-end/png/500.png")); ?>" alt="" class="img-fluid">
                </div>

                <p class="text-center h4 lead py-2">
                <h2><?php echo e($exception->getMessage()); ?></h2>
                    <br>
                    <?php echo e(translate('Try_after_sometime')); ?>

                </p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/errors/500.blade.php ENDPATH**/ ?>