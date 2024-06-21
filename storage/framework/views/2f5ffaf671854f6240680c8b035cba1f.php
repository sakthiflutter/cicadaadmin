<?php if($category->childes->count()>0): ?>
    <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 mt-4">
            <label class="text-center get-view-by-onclick category-list-in-header"
                   data-link="<?php echo e(route('products',['id'=> $categoryChild['id'], 'data_from'=>'category','page'=>1])); ?>">
                <?php echo e($categoryChild['name']); ?>

            </label>
            <ul class="list-group">
                <?php $__currentLoopData = $categoryChild->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item cursor-pointer get-view-by-onclick"
                        data-link="<?php echo e(route('products',['id'=> $child['id'], 'data_from'=>'category','page'=>1])); ?>">
                        <?php echo e($child['name']); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="col-md-12 text-center mt-5">
        <a href="<?php echo e(route('products',['id'=> $category['id'], 'data_from'=>'category','page'=>1])); ?>"
           class="btn btn--primary"><?php echo e(translate('view_Products')); ?></a>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_category-list-ajax.blade.php ENDPATH**/ ?>