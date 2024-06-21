<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/payment-method') ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>"><?php echo e(translate('digital_payment_methods')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/offline-payment-method/*') ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.business-settings.offline-payment-method.index')); ?>"><?php echo e(translate('offline_payment_methods')); ?></a></li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/third-party-payment-method-menu.blade.php ENDPATH**/ ?>