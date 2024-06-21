<html>
    <table>
        <thead>
            <tr>
                <th style="font-size: 18px"><?php echo e(translate('vendor_List')); ?></th>
            </tr>
            <tr>

                <th><?php echo e(translate('vendor_Analytics')); ?> -</th>
                <th></th>
                <th>
                        <?php echo e(translate('total_Vendor')); ?> - <?php echo e(count($data['sellers'])); ?>

                    <br>
                        <?php echo e(translate('active_Vendors ')); ?> - <?php echo e($data['active']); ?>

                    <br>
                        <?php echo e(translate('inactive_Vendors ')); ?> - <?php echo e($data['inactive']); ?>

                </th>
            </tr>
            <tr>
                <th><?php echo e(translate('search_Criteria')); ?>-</th>
                <th></th>
                <th>  <?php echo e(translate('search_Bar_Content')); ?> - <?php echo e(!empty($data['search']) ? $data['search'] : 'N/A'); ?></th>
            </tr>
            <tr>
                <td> <?php echo e(translate('SL')); ?></td>
                <td> <?php echo e(translate('store_Logo')); ?></td>
                <td> <?php echo e(translate('store_Name')); ?></td>
                <td> <?php echo e(translate('vendor_Name')); ?></td>
                <td> <?php echo e(translate('phone')); ?>	</td>
                <td> <?php echo e(translate('email')); ?>	</td>
                <td> <?php echo e(translate('joined_At')); ?>	</td>
                <td> <?php echo e(translate('total_Products')); ?>	</td>
                <td> <?php echo e(translate('total_Order')); ?> </td>
                <td> <?php echo e(translate('status')); ?></td>
            </tr>
            <?php $__currentLoopData = $data['sellers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e(++$key); ?>	</td>
                    <td style="height: 70px"></td>
                    <td> <?php echo e(ucwords($item?->shop->name)); ?></td>
                    <td> <?php echo e(ucwords($item->f_name.' '.$item->l_name)); ?></td>
                    <td> <?php echo e($item?->phone ?? translate('not_found')); ?></td>
                    <td> <?php echo e(ucwords($item->email)); ?></td>
                    <td> <?php echo e(date('d M, Y h:i A',strtotime($item->created_at))); ?></td>
                    <td> <?php echo e($item->product_count); ?></td>
                    <td> <?php echo e($item->orders_count); ?></td>
                    <td> <?php echo e(translate($item->status == 'approved' ? 'active' : 'inactive')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </thead>
    </table>
</html>
<?php /**PATH /var/www/html/moores/resources/views/file-exports/seller-list.blade.php ENDPATH**/ ?>