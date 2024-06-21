<div class="checkout-steps steps steps-light pt-2 pb-2">
    <a class="step-item <?php echo e($step >= 1?'active':''); ?> <?php echo e($step == 1?'current':''); ?>" href="<?php echo e(route('shop-cart')); ?>">
        <div class="step-progress">
            <span class="step-count">
                <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/cart-icon.png')); ?>" class="mb-1" alt="">
            </span>
        </div>
        <div class="step-label">
            <?php echo e(translate('cart')); ?>

        </div>
    </a>
    <a class="step-item <?php echo e($step >= 2?'active':''); ?> <?php echo e($step == 2?'current':''); ?>" href="<?php echo e(route('checkout-details')); ?>">
        <div class="step-progress">
            <span class="step-count"><i class="czi-package"></i></span>
        </div>
        <?php ($billingInputByCustomer = getWebConfig(name: 'billing_input_by_customer')); ?>
        <div class="step-label">
            <?php echo e(translate('shipping')); ?> <?php echo e($billingInputByCustomer == 1? translate('and_billing'):' '); ?>

        </div>
    </a>
    <a class="step-item <?php echo e($step >= 3?'active':''); ?> <?php echo e($step == 3?'current':''); ?>"
       href="<?php echo e($step >= 3 ? route('checkout-payment') : 'javascript:'); ?>">
        <div class="step-progress">
            <span class="step-count"><i class="czi-card"></i></span>
        </div>
        <div class="step-label">
            <?php echo e(translate('payment')); ?>

        </div>
    </a>
</div>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_checkout-steps.blade.php ENDPATH**/ ?>