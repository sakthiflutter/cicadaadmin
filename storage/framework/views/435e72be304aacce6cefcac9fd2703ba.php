<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/report/all-product') ?'active':''); ?>"><a href="<?php echo e(route('admin.report.all-product')); ?>"><?php echo e(translate('all_Products')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/stock/product-stock') ?'active':''); ?>"><a href="<?php echo e(route('admin.stock.product-stock')); ?>"><?php echo e(translate('product_Stock')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/stock/product-in-wishlist') ?'active':''); ?>"><a href="<?php echo e(route('admin.stock.product-in-wishlist')); ?>"><?php echo e(translate('wish_Listed_Products')); ?></a></li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/report/product-report-inline-menu.blade.php ENDPATH**/ ?>