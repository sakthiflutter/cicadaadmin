<?php use Carbon\Carbon; ?>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <i class="tio-clear"></i>
</button>
<div class="coupon__details">
    <div class="coupon__details-left">
        <div class="text-center">
            <h6 class="title" id="title"><?php echo e($coupon->title); ?></h6>
            <h6 class="subtitle"><?php echo e(translate('code')); ?> : <span id="coupon_code"><?php echo e($coupon->code); ?></span></h6>
            <div class="text-capitalize">
                <span><?php echo e(translate(str_replace('_',' ',$coupon->coupon_type))); ?></span>
            </div>
        </div>
        <div class="coupon-info">
            <div class="coupon-info-item">
                <span><?php echo e(translate('minimum_purchase')); ?> :</span>
                <strong
                    id="min_purchase"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $coupon->min_purchase), currencyCode: getCurrencyCode(type: 'default'))); ?></strong>
            </div>
            <?php if($coupon->coupon_type != 'free_delivery' && $coupon->discount_type == 'percentage'): ?>
                <div class="coupon-info-item" id="max_discount_modal_div">
                    <span><?php echo e(translate('maximum_discount')); ?> : </span>
                    <strong
                        id="max_discount"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:$coupon->max_discount), currencyCode: getCurrencyCode(type: 'default'))); ?></strong>
                </div>
            <?php endif; ?>
            <div class="coupon-info-item">
                <span><?php echo e(translate('start_date')); ?> : </span>
                <span id="start_date"><?php echo e(Carbon::parse($coupon->start_date)->format('dS M Y')); ?></span>
            </div>
            <div class="coupon-info-item">
                <span><?php echo e(translate('expire_date')); ?> : </span>
                <span id="expire_date"><?php echo e(Carbon::parse($coupon->expire_date)->format('dS M Y')); ?></span>
            </div>
            <div class="coupon-info-item">
                <span><?php echo e(translate('discount_bearer')); ?> : </span>
                <span id="expire_date">
                    <?php if($coupon->coupon_bearer == 'inhouse'): ?>
                        <?php echo e(translate('admin')); ?>

                    <?php elseif($coupon->coupon_bearer == 'seller'): ?>
                        <?php echo e(translate('vendor')); ?>

                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
    <div class="coupon__details-right">
        <div class="coupon">
            <?php if($coupon->coupon_type == 'free_delivery'): ?>
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/free-delivery.png')); ?>"
                     alt="<?php echo e(translate('free_delivery')); ?>" width="100">
            <?php else: ?>
                <div class="d-flex">
                    <h4 id="discount">
                        <?php echo e($coupon->discount_type=='amount'?setCurrencySymbol(amount: usdToDefaultCurrency(amount:$coupon->discount), currencyCode: getCurrencyCode(type: 'default')):$coupon->discount.'%'); ?>

                    </h4>
                </div>

                <span><?php echo e(translate('off')); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/vendor-views/coupon/quick-view.blade.php ENDPATH**/ ?>