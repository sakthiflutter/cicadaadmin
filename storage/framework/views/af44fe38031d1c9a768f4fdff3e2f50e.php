<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/top-customers.png')); ?>" alt="">
        <?php echo e(translate('top_Delivery_Man')); ?>

    </h4>
</div>

<div class="card-body">
    <?php if($topRatedDeliveryMan): ?>
        <div class="grid-card-wrap">
            <?php $__currentLoopData = $topRatedDeliveryMan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $deliveryMan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($deliveryMan['id'])): ?>
                    <div class="cursor-pointer get-view-by-onclick" data-link="<?php echo e(route('admin.delivery-man.earning-statement-overview',[$deliveryMan['id']])); ?>">
                        <div class="grid-card basic-box-shadow">
                            <div class="text-center">
                                <img class="avatar rounded-circle avatar-lg get-view-by-onclick" alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/delivery-man/'.$deliveryMan['image']??'',type:'backend-profile')); ?>"
                                     data-link="<?php echo e(route('admin.delivery-man.earning-statement-overview',[$deliveryMan['id']])); ?>">
                            </div>
                            <h5 class="mb-0 get-view-by-onclick" data-link="<?php echo e(route('admin.delivery-man.earning-statement-overview',[$deliveryMan['id']])); ?>">
                                <?php echo e(Str::limit($deliveryMan['f_name'].' '.$deliveryMan['l_name'], 25)); ?>

                            </h5>
                            <div class="orders-count d-flex gap-1">
                                <div><?php echo e(translate('order_delivered')); ?> :</div>
                                <div><?php echo e($deliveryMan['delivered_orders_count']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center">
            <p class="text-muted"><?php echo e(translate('no_data_found').'!'); ?></p>
            <img class="w-75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/no-data.png')); ?>" alt="">
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_top-delivery-man.blade.php ENDPATH**/ ?>