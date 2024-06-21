<?php if(isset($product)): ?>
    <?php ($overallRating = getOverallRating($product->reviews)); ?>
    <div class="flash_deal_product get-view-by-onclick" data-link="<?php echo e(route('product',$product->slug)); ?>">
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
        <?php endif; ?>
        <div class=" d-flex">
            <div class="d-flex align-items-center justify-content-center p-12px">
                <div class="flash-deals-background-image">
                    <img class="__img-125px" alt="" src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'product')); ?>">
                </div>
            </div>
            <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                <div>
                    <div>
                        <a href="<?php echo e(route('product',$product->slug)); ?>"
                           class="flash-product-title text-capitalize fw-semibold">
                            <?php echo e(Str::limit($product['name'], 80)); ?>

                        </a>
                    </div>
                    <?php if($overallRating[0] != 0 ): ?>
                        <div class="flash-product-review">
                            <?php for($inc=1;$inc<=5;$inc++): ?>
                                <?php if($inc <= (int)$overallRating[0]): ?>
                                    <i class="tio-star text-warning"></i>
                                <?php elseif($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                                    <i class="tio-star-half text-warning"></i>
                                <?php else: ?>
                                    <i class="tio-star-outlined text-warning"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <label class="badge-style2">
                                ( <?php echo e(count($product->reviews)); ?> )
                            </label>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                        <?php if($product->discount > 0): ?>
                            <del class="category-single-product-price">
                                <?php echo e(webCurrencyConverter(amount: $product->unit_price)); ?>

                            </del>
                        <?php endif; ?>
                        <span class="flash-product-price text-dark fw-semibold">
                            <?php echo e(webCurrencyConverter(amount: $product->unit_price - getProductDiscount(product: $product, price: $product->unit_price))); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_product-card-2.blade.php ENDPATH**/ ?>