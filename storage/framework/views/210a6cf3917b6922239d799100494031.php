<?php $__env->startSection('title', translate('order_Complete')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5 mb-5 rtl __inline-53 text-align-direction">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="card">
                    <?php if(auth('customer')->check() || session('guest_id')): ?>
                        <div class="card-body">
                            <div class="mb-3 text-center">
                                <i class="fa fa-check-circle __text-60px __color-0f9d58"></i>
                            </div>

                            <h6 class="font-black fw-bold text-center">
                                <?php echo e(translate('order_Placed_Successfully')); ?>!
                            </h6>

                            <?php if(isset($order_ids) && count($order_ids) > 0): ?>
                                <p class="text-center fs-12">
                                    <?php echo e(translate('your_payment_has_been_successfully_processed_and_your_order')); ?> -
                                    <span class="fw-bold text-primary">
                                        <?php $__currentLoopData = $order_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($order); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span>
                                    <?php echo e(translate('has_been_placed.')); ?>

                                </p>
                            <?php else: ?>
                                <p class="text-center fs-12">
                                    <?php echo e(translate('your_order_is_being_processed_and_will_be_completed.')); ?>

                                    <?php echo e(translate('You_will_receive_an_email_confirmation_when_your_order_is_placed.')); ?>

                                </p>
                            <?php endif; ?>

                            <div class="row mt-4">
                                <div class="col-12 text-center">
                                    <a href="<?php echo e(route('track-order.index')); ?>"
                                       class="btn btn--primary mb-3 text-center">
                                        <?php echo e(translate('track_Order')); ?>

                                    </a>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="<?php echo e(route('home')); ?>" class="text-center">
                                        <?php echo e(translate('Continue_Shopping')); ?>

                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/checkout/complete.blade.php ENDPATH**/ ?>