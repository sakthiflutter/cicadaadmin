<?php $__currentLoopData = $choice_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-12 col-lg-6">
        <div class="row">
            <div class="col-md-3">
                <input type="hidden" name="choice_no[]" value="<?php echo e($choice_no[$key]??''); ?>">
                <input type="text" class="form-control" name="choice[]" value="<?php echo e($choice['title']); ?>"
                       placeholder="<?php echo e(translate('choice_Title')); ?>" readonly>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control call-update-sku"
                       name="choice_options_<?php echo e($choice_no[$key]??''); ?>[]"
                       data-role="tagsinput"
                       value="<?php $__currentLoopData = $choice['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($c.','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/product/partials/_choices.blade.php ENDPATH**/ ?>