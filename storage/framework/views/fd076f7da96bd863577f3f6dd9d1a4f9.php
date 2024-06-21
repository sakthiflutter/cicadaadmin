<div class="card-header gap-10">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shop-info.png')); ?>" alt="">
        <?php echo e(translate('top_selling_store')); ?>

    </h4>
</div>

<div class="card-body">
    <div class="grid-item-wrap">
        <?php if($topVendorByEarning): ?>
            <?php $__currentLoopData = $topVendorByEarning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($vendor->seller->shop)): ?>
                    <div class="cursor-pointer get-view-by-onclick"
                         data-link="<?php echo e(route('admin.sellers.view', $vendor['seller_id'])); ?>">
                        <div class="grid-item basic-box-shadow">
                            <div class="d-flex align-items-center gap-10">
                                <img class="avatar rounded-circle avatar-sm" alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$vendor->seller->shop['image'] ?? '',type:'backend-basic')); ?>">

                                <h5 class="shop-name"><?php echo e($vendor->seller->shop['name'] ?? 'Not exist'); ?></h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="shop-sell">
                                    <?php echo e(setCurrencySymbol(amount: currencyConverter(amount: $vendor['total_earning']))); ?>

                                </h5>
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/cart2.png')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="text-center">
                <p class="text-muted"><?php echo e(translate('no_Top_Selling_Products')); ?></p>
                <img class="w-75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/no-data.png')); ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_top-selling-store.blade.php ENDPATH**/ ?>