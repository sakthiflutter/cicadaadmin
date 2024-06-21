<?php
    use App\Enums\ViewPaths\Admin\BusinessSettings;
    use App\Enums\ViewPaths\Admin\PaymentMethod;
?>
<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/web-config') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.web-config.index')); ?>"><?php echo e(translate('general')); ?></a></li>
        <li class="text-capitalize <?php echo e(Request::is('admin/business-settings/payment-method/'.PaymentMethod::PAYMENT_OPTION[URI]) ?'active':''); ?>">
            <a
                href="<?php echo e(route('admin.business-settings.payment-method.payment-option')); ?>"><?php echo e(translate('payment_options')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/product-settings') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.product-settings.index')); ?>"><?php echo e(translate('products')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/order-settings/'.BusinessSettings::ORDER_VIEW[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.order-settings.index')); ?>"><?php echo e(translate('orders')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/seller-settings') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.seller-settings.index')); ?>"><?php echo e(translate('vendors')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/customer/customer-settings') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.customer.customer-settings')); ?>"><?php echo e(translate('customers')); ?></a></li>
        <li class="text-capitalize <?php echo e(Request::is('admin/business-settings/delivery-man-settings') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.delivery-man-settings.index')); ?>"><?php echo e(translate('delivery_men')); ?></a>
        </li>
        <li class="text-capitalize <?php echo e(Request::is('admin/business-settings/shipping-method/index') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.shipping-method.index')); ?>"><?php echo e(translate('shipping_Method')); ?></a>
        </li>
        <li class="text-capitalize <?php echo e(Request::is('admin/business-settings/delivery-restriction') ? 'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.delivery-restriction.index')); ?>"><?php echo e(translate('delivery_restriction')); ?></a>
        </li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/business-setup-inline-menu.blade.php ENDPATH**/ ?>