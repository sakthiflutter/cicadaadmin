<?php ($decimal_point_settings = getWebConfig(name: 'decimal_point_settings')); ?>

<?php if($wishlists->count()>0): ?>
    <div class="d-flex flex-column gap-10px">
        <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($product = $wishlist->productFullInfo); ?>
            <?php if( $wishlist->productFullInfo): ?>
                <div class="wishlist-item" id="row_id<?php echo e($product->id); ?>">
                    <div class="wishlist-img position-relative">
                        <a href="<?php echo e(route('product',$product->slug)); ?>" class="d-block h-100">
                            <img class="__img-full"
                                 src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'product')); ?>"
                                 alt="<?php echo e(translate('wishlist')); ?>">
                        </a>

                        <?php if($product->discount > 0): ?>
                            <span class="for-discount-value px-1 font-bold fs-13 direction-ltr">
                                <?php if($product->discount_type == 'percent'): ?>
                                    -<?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                                <?php elseif($product->discount_type =='flat'): ?>
                                    -<?php echo e(webCurrencyConverter(amount: $product->discount)); ?>

                                <?php endif; ?>
                            </span>
                        <?php endif; ?>

                    </div>
                    <div class="wishlist-cont align-items-end align-items-sm-center">
                        <div class="wishlist-text">
                            <div class="font-name">
                                <a class="fs-12 font-semibold line-height-16" href="<?php echo e(route('product',$product['slug'])); ?>"><?php echo e($product['name']); ?></a>
                            </div>
                            <?php if($brand_setting): ?>
                                <span class="sellerName fs-12"> <?php echo e(translate('brand')); ?> : <span
                                        class="text-base"><?php echo e($product->brand?$product->brand['name']:''); ?></span> </span>
                            <?php endif; ?>

                            <div class=" mt-sm-1">
                                <span class="font-weight-bold amount text-dark price-range d-flex align-items-center gap-2"><?php echo getPriceRangeWithDiscount(product: $product); ?></span>
                            </div>
                        </div>
                        <a href="javascript:" class="remove--icon function-remove-wishList" data-id="<?php echo e($product['id']); ?>"
                           data-modal="remove-wishlist-modal">
                            <i class="fa fa-heart web-text-primary"></i>
                        </a>

                    </div>
                </div>
            <?php else: ?>
                <span class="badge badge-danger"><?php echo e(translate('item_removed')); ?></span>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <div class="login-card">
        <div class="text-center py-3 text-capitalize">
            <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/wishlist.png')); ?>" alt="" class="mb-4" width="70">
            <h5 class="fs-14"><?php echo e(translate('no_product_found_in_wishlist')); ?>!</h5>
        </div>
    </div>
<?php endif; ?>

<div class="card-footer border-0"><?php echo e($wishlists->links()); ?></div>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_wish-list-data.blade.php ENDPATH**/ ?>