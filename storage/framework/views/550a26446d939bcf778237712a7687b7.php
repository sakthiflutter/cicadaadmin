<div class="card-header gap-10">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/most-popular-store-icon.png')); ?>" alt="">
        <?php echo e(translate('most_Popular_Stores')); ?>

    </h4>
</div>
<div class="card-body">
    <?php if($top_store_by_order_received): ?>
        <div class="grid-item-wrap">
            <?php $__currentLoopData = $top_store_by_order_received; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->seller->shop)): ?>
                    <?php ($shop=$item->seller->shop); ?>
                    <a href="<?php echo e(route('admin.sellers.view',$item['seller_id'])); ?>" class="grid-item basic-box-shadow">
                        <div class="d-flex align-items-center gap-10">
                            <img src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$shop->image ?? '',type:'backend-basic')); ?>" class="avatar rounded-circle avatar-sm" alt="">

                            <h5 class="shop-name"><?php echo e($shop['name']??'Not exist'); ?></h5>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <h5 class="shop-sell c2"><?php echo e($item['count']); ?></h5>
                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/love.png')); ?>" alt="">
                        </div>
                    </a>
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
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_top-store-by-order.blade.php ENDPATH**/ ?>