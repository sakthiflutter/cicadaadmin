<?php ($overallRating = getOverallRating($product->reviews)); ?>
<div class="product-single-hover shadow-none rtl">
    <div class="overflow-hidden position-relative">
        <div class="inline_product clickable">
            <?php if($product->discount > 0): ?>
                <span class="for-discount-value p-1 pl-2 pr-2 font-bold fs-13">
                    <span class="direction-ltr d-block">
                        <?php if($product->discount_type == 'percent'): ?>
                            -<?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                        <?php elseif($product->discount_type =='flat'): ?>
                            -<?php echo e(webCurrencyConverter(amount: $product->discount)); ?>

                        <?php endif; ?>
                    </span>
                </span>
            <?php else: ?>
                <span class="for-discount-value-null"></span>
            <?php endif; ?>
            <a href="<?php echo e(route('product',$product->slug)); ?>">
                <img src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'product')); ?>" alt="">
            </a>

            <div class="quick-view">
                <a class="btn-circle stopPropagation action-product-quick-view" href="javascript:" data-product-id="<?php echo e($product->id); ?>">
                    <i class="czi-eye align-middle"></i>
                </a>
            </div>
            <?php if($product->product_type == 'physical' && $product->current_stock <= 0): ?>
                <span class="out_fo_stock"><?php echo e(translate('out_of_stock')); ?></span>
            <?php endif; ?>
        </div>
        <div class="single-product-details">
            <?php if($overallRating[0] != 0 ): ?>
                <div class="rating-show justify-content-between">
                    <span class="d-inline-block font-size-sm text-body">
                        <?php for($inc=1;$inc<=5;$inc++): ?>
                            <?php if($inc <= (int)$overallRating[0]): ?>
                                <i class="tio-star text-warning"></i>
                            <?php elseif($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                                <i class="tio-star-half text-warning"></i>
                            <?php else: ?>
                                <i class="tio-star-outlined text-warning"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <label class="badge-style">( <?php echo e(count($product->reviews)); ?> )</label>
                    </span>
                </div>
            <?php endif; ?>
            <div>
                <a href="<?php echo e(route('product',$product->slug)); ?>" class="text-capitalize fw-semibold">
                    <?php echo e(Str::limit($product['name'], 23)); ?>

                </a>
            </div>
            <div class="justify-content-between">
                <div class="product-price">
                    <?php if($product->discount > 0): ?>
                        <del class="category-single-product-price">
                            <?php echo e(webCurrencyConverter(amount: $product->unit_price)); ?>

                        </del>
                    <?php endif; ?>
                    <span class="text-accent text-dark">
                        <?php echo e(webCurrencyConverter(amount:
                            $product->unit_price-(getProductDiscount(product: $product, price: $product->unit_price))
                        )); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_feature-product.blade.php ENDPATH**/ ?>