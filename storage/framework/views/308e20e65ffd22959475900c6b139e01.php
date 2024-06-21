<div class="card-header gap-10">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/top-selling-product-icon.png')); ?>" alt="">
        <?php echo e(translate('top_selling_products')); ?>

    </h4>
</div>

<div class="card-body">
    <div class="grid-item-wrap">
        <?php if(isset($topSellProduct)): ?>
            <?php $__currentLoopData = $topSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($product['id'])): ?>
                    <div class="cursor-pointer get-view-by-onclick"
                         data-link="<?php echo e(route('admin.products.view',['addedBy'=>$product['added_by'],'id'=>$product['id']])); ?>">
                        <div class="grid-item bg-transparent basic-box-shadow">
                            <div class="d-flex gap-10 align-items-center">
                                <img
                                    src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'. $product['thumbnail'], type: 'backend-product')); ?>"
                                     class="avatar avatar-lg rounded avatar-bordered"
                                     alt="<?php echo e($product['name'].'_'.translate('image')); ?>">
                                <div
                                    class="title-color"><?php echo e(substr($product['name'],0,20)); ?> <?php echo e(strlen($product['name'])>20?'...':''); ?></div>
                            </div>

                            <div class="orders-count py-2 px-3 d-flex gap-1">
                                <div><?php echo e(translate('sold')); ?> :</div>
                                <div class="sold-count"><?php echo e($product['order_details_count']); ?></div>
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
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_top-selling-products.blade.php ENDPATH**/ ?>