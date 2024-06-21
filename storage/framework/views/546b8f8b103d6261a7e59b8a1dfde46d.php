<?php if(count($products) > 0): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="select-product-item media gap-3 border-bottom py-2 cursor-pointer action-select-product"
             data-id="<?php echo e($product['id']); ?>">
            <img class="avatar avatar-xl border" width="75"
                 src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'] , type: 'backend-basic')); ?>" alt="">
            <div class="media-body d-flex flex-column gap-1">
                <h6 class="product-id" hidden><?php echo e($product['id']); ?></h6>
                <h6 class="fz-13 mb-1 text-truncate custom-width product-name"><?php echo e($product['name']); ?></h6>
                <div
                    class="fz-10"><?php echo e(translate('category').' '.':'.' '); ?><?php echo e(isset($product->category) ? $product->category->name : translate('category_not_found')); ?></div>
                <div
                    class="fz-10"><?php echo e(translate('brand').' '.':'.' '); ?><?php echo e(isset($product->brand) ? $product->brand->name : translate('brands_not_found')); ?></div>
                <?php if($product->added_by == "seller"): ?>
                    <div
                        class="fz-10"><?php echo e(translate('shop').' '.':'.' '); ?><?php echo e(isset($product->seller) ? $product->seller->shop->name : translate('shop_not_found')); ?></div>
                <?php else: ?>
                    <div class="fz-10"><?php echo e(translate('shop').' '.':'.' '); ?><?php echo e($web_config['name']->value); ?></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div>
        <h5 class="m-0 text-muted"><?php echo e(translate('No_Product_Found')); ?></h5>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_search-product.blade.php ENDPATH**/ ?>