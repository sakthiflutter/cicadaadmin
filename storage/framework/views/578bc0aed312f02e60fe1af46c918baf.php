<html>
    <table>
        <thead>
            <tr>
                <th style="font-size: 18px"><?php echo e(translate('employee_List')); ?></th>
            </tr>
            <tr>

                <th><?php echo e(translate('employee_Analytics') .' '.'-'); ?></th>
                <th></th>
                <th>
                        <?php echo e(translate('filter_By').' '.'-'.' '.ucwords($data['filter'])); ?>

                    <br>
                        <?php echo e(translate('total_Employee').' '.'-'.' '.count($data['employees'])); ?>

                    <br>
                        <?php echo e(translate('active_Employee').' '.'-'.' '.$data['active']); ?>

                    <br>
                        <?php echo e(translate('inactive_Employee').' '.'-'.' '.$data['inactive']); ?>

                </th>
            </tr>
            <tr>
                <th><?php echo e(translate('search_Criteria')); ?>-</th>
                <th></th>
                <th>  <?php echo e(translate('search_Bar_Content').' '.'-'.' '.$data['search'] ?? 'N/A'); ?></th>
            </tr>
            <tr>
                <td> <?php echo e(translate('SL')); ?>	</td>
                <td> <?php echo e(translate('employee_Image')); ?></td>
                <td> <?php echo e(translate('Name')); ?></td>
                <td> <?php echo e(translate('phone')); ?>	</td>
                <td> <?php echo e(translate('email')); ?>	</td>
                <td> <?php echo e(translate('role')); ?>	</td>
                <td> <?php echo e(translate('accesses')); ?> </td>
                <td> <?php echo e(translate('date_of_Joining')); ?> </td>
                <td> <?php echo e(translate('status')); ?></td>
            </tr>
            <?php $__currentLoopData = $data['employees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> <?php echo e(++$key); ?>	</td>
                    <td style="height: 70px"></td>
                    <td> <?php echo e(ucwords($item->name)); ?></td>
                    <td> <?php echo e($item->phone); ?></td>
                    <td> <?php echo e(ucwords($item->email)); ?></td>
                    <td> <?php echo e(ucwords($item?->role?->name)); ?></td>
                    <td>
                        <?php if(!empty($item->role->module_access)): ?>
                            <?php $__currentLoopData = json_decode($item?->role->module_access); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($value)): ?>
                                    <?php echo e(ucwords(str_replace('_',' ',$value))); ?>

                                    <br>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </td>
                    <td> <?php echo e(date('d M, Y h:i A',strtotime($item->created_at))); ?></td>
                    <td> <?php echo e(translate($item->status == 1 ? 'active' : 'inactive')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </thead>
    </table>
</html>
<?php /**PATH /var/www/html/moores/resources/views/file-exports/employee-list.blade.php ENDPATH**/ ?>