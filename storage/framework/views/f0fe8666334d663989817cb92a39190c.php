<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/report/admin-earning') ?'active':''); ?>"><a href="<?php echo e(route('admin.report.admin-earning', ['date_type' => 'this_year'])); ?>"><?php echo e(translate('admin_Earning')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/report/seller-earning') ?'active':''); ?>"><a href="<?php echo e(route('admin.report.seller-earning', ['date_type' => 'this_year'])); ?>"><?php echo e(translate('vendor_Earning')); ?></a></li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/report/earning-report-inline-menu.blade.php ENDPATH**/ ?>