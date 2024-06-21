<div class="container rtl pb-4 pt-3 px-0 px-md-3">
    <div class="shipping-policy-web">
        <div class="row g-3 justify-content-center mx-max-md-0">
            <?php $__currentLoopData = $companyReliability; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($value['status'] == 1 && !empty($value['title'])): ?>
                    <div class="col-md-3 px-max-md-0">
                        <div class="d-flex justify-content-center">
                            <div class="shipping-method-system">
                                <div class="w-100 d-flex justify-content-center mb-1">
                                    <img alt="" class="size-60"
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/company-reliability/'.$value['image'], type: 'source', source: theme_asset(path: 'public/assets/front-end/img').'/'.$value['item'].'.png')); ?>"
                                    >
                                </div>
                                <div class="w-100 text-center">
                                    <p class="m-0"><?php echo e($value['title']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_company-reliability.blade.php ENDPATH**/ ?>