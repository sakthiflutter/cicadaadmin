<div class="col-lg-6 px-max-md-0">
    <div class="card card __shadow h-100">
        <div class="card-body p-xl-35">
            <div class="row d-flex justify-content-between mx-1 mb-3">
                <div>
                    <img class="size-30" src="<?php echo e(theme_asset(path: "public/assets/front-end/png/best-sellings.png")); ?>"
                         alt="">
                    <span class="font-bold pl-1"><?php echo e(translate('best_sellings')); ?></span>
                </div>
                <div>
                    <a class="text-capitalize view-all-text web-text-primary"
                       href="<?php echo e(route('products',['data_from'=>'best-selling','page'=>1])); ?>"><?php echo e(translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
                </div>
            </div>
            <div class="row g-3">
                <?php $__currentLoopData = $bestSellProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$bestSell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($bestSell->product && $key<6): ?>
                        <div class="col-sm-6">
                            <a class="__best-selling" href="<?php echo e(route('product',$bestSell->product->slug)); ?>">
                                <?php if($bestSell->product->discount > 0): ?>
                                    <div class="d-flex">
                                        <span class="for-discount-value p-1 pl-2 pr-2 font-bold fs-13">
                                            <span class="direction-ltr d-block">
                                                <?php if($bestSell->product->discount_type == 'percent'): ?>
                                                    -<?php echo e(round($bestSell->product->discount)); ?>%
                                                <?php elseif($bestSell->product->discount_type =='flat'): ?>
                                                    -<?php echo e(webCurrencyConverter(amount: $bestSell->product->discount)); ?>

                                                <?php endif; ?>
                                            </span>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <div class="d-flex flex-wrap">
                                    <div class="best-selleing-image">
                                        <img class="rounded"
                                             src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$bestSell->product['thumbnail'], type: 'product')); ?>"
                                             alt="<?php echo e(translate('product')); ?>"/>
                                    </div>
                                    <div class="best-selling-details">
                                        <h6 class="widget-product-title">
                                        <span class="ptr fw-semibold">
                                            <?php echo e(Str::limit($bestSell->product['name'],100)); ?>

                                        </span>
                                        </h6>
                                        <?php ($overallRating = getOverallRating($bestSell->product['reviews'])); ?>
                                        <?php if($overallRating[0] != 0 ): ?>
                                            <div class="rating-show">
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
                                                <label class="badge-style">( <?php echo e(count($bestSell->product['reviews'])); ?> )</label>
                                            </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="widget-product-meta d-flex flex-wrap gap-8 align-items-center row-gap-0">
                                            <span>
                                                <?php if($bestSell->product->discount > 0): ?>
                                                    <del class="__color-9B9B9B __text-12px">
                                                        <?php echo e(webCurrencyConverter(amount: $bestSell->product->unit_price)); ?>

                                                    </del>
                                                <?php endif; ?>
                                            </span>
                                            <span class="text-accent text-dark">
                                                <?php echo e(webCurrencyConverter(amount:
                                                $bestSell->product->unit_price-(getProductDiscount(product: $bestSell->product, price: $bestSell->product->unit_price))
                                                )); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_best-selling.blade.php ENDPATH**/ ?>