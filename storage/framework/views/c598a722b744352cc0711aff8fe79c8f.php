<html>
<table>
    <thead>
    <tr>
        <th style="font-size: 18px"><?php echo e(translate($data['title'].'_'.'List')); ?></th>
    </tr>
    <tr>

        <th><?php echo e(translate($data['title'].'_'.'Analytics').' '.'-'); ?></th>
        <th></th>
        <th>
            <?php echo e(translate('total'.'_'.$data['title']).' '.'-'.' '.count($data['categories'])); ?>

            <?php if($data['title'] == 'category'): ?>
                <br>
                <?php echo e(translate('inactive'.'_'.$data['title']).' '.'-'.' '.$data['active']); ?>

                <br>
                <?php echo e(translate('active'.'_'.$data['title']).' '.'-'.' '.$data['inactive']); ?>

            <?php endif; ?>
        </th>
    </tr>
    <tr>
        <th><?php echo e(translate('search_Criteria')); ?>-</th>
        <th></th>
        <th>  <?php echo e(translate('search_Bar_Content').' '.'-'.' '.$data['search'] ?? 'N/A'); ?></th>
    </tr>
    <tr>
        <td> <?php echo e(translate('ID')); ?></td>
        <?php if($data['title'] == 'category'): ?>
            <td> <?php echo e(translate('category_Image')); ?></td>
        <?php endif; ?>
        <td> <?php echo e(translate($data['title'].'_'.'Name')); ?></td>
        <?php if($data['title'] == 'sub_sub_category'): ?>
            <td> <?php echo e(translate('sub_Category_Name')); ?></td>
        <?php endif; ?>
        <?php if($data['title'] == 'sub_category' || $data['title'] == 'sub_sub_category'): ?>
            <td> <?php echo e(translate('category_Name')); ?></td>
        <?php endif; ?>
        <td> <?php echo e(translate('priority')); ?>	</td>
        <?php if($data['title'] == 'category'): ?>
            <td> <?php echo e(translate('home_category_status')); ?></td>
        <?php endif; ?>
    </tr>
    <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($item['id']); ?>	</td>
            <?php if($data['title'] == 'category'): ?>
                <td style="height: 70px"></td>
            <?php endif; ?>
            <td> <?php echo e($item['defaultName']); ?></td>
            <?php if($data['title'] == 'sub_sub_category'): ?>
                <td> <?php echo e($item?->parent?->parent->defaultName ??translate('sub_category_not_found')); ?></td>
            <?php endif; ?>
            <?php if($data['title'] == 'sub_category' || $data['title'] == 'sub_sub_category'): ?>
                <td> <?php echo e($item?->parent?->defaultName ?? translate('category_not_found')); ?></td>
            <?php endif; ?>
            <td> <?php echo e($item->priority); ?></td>
            <?php if($data['title'] == 'category'): ?>
                <td> <?php echo e(translate($item->home_status == 1 ? 'active' : 'inactive')); ?></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </thead>
</table>
</html>
<?php /**PATH /var/www/html/moores/resources/views/file-exports/category-list.blade.php ENDPATH**/ ?>