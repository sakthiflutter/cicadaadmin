<div class="inline-page-menu">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/push-notification/index') ?'active':''); ?>">
            <a href="<?php echo e(route('admin.push-notification.index')); ?>" class="text-capitalize">
                <i class="tio-notifications-on-outlined"></i>
                <?php echo e(translate('push_notification')); ?>

            </a>
        </li>
        <li class="<?php echo e(Request::is('admin/push-notification/firebase-configuration') ?'active':''); ?>">
            <a href="<?php echo e(route('admin.push-notification.firebase-configuration')); ?>" class="text-capitalize">
                <i class="tio-cloud-outlined"></i>
                <?php echo e(translate('firebase_configuration')); ?>

            </a>
        </li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/push-notification/_push-notification-inline-menu.blade.php ENDPATH**/ ?>