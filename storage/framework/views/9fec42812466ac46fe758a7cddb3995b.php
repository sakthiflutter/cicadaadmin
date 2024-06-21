<!-- Header -->
<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/top-customers.png')); ?>" alt="">
        <?php echo e(translate('top_customer')); ?>

    </h4>
</div>
<div class="card-body">
    <?php if($top_customer): ?>
        <div class="grid-card-wrap">
            <?php $__currentLoopData = $top_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->customer)): ?>
                    <div class="cursor-pointer"
                         onclick="location.href='<?php echo e(route('admin.customer.view',[$item['customer_id']])); ?>'">
                        <div class="grid-card basic-box-shadow">
                            <div class="text-center">
                                <img class="avatar rounded-circle avatar-lg"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/profile/'.$item->customer->image,type:'backend-profile')); ?>"
                                     alt="">
                            </div>

                            <h5 class="mb-0"><?php echo e($item->customer['f_name']??translate('not_exist')); ?></h5>

                            <div class="orders-count d-flex gap-1">
                                <div><?php echo e(translate('orders')); ?> : </div>
                                <div><?php echo e($item['count']); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center">
            <p class="text-muted"><?php echo e(translate('no_Top_Selling_Products')); ?></p>
            <img class="w-75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/no-data.png')); ?>" alt="">
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_top-customer.blade.php ENDPATH**/ ?>