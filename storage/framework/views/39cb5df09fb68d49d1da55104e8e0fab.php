<?php $__currentLoopData = $productReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productReview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="p-2 mb-2">
        <div class="row product-review d-flex ">
            <div class="col-md-4 d-flex mb-3">
                <div class="media media-ie-fix me-4">
                    <img class="rounded-circle __img-64 object-cover"
                         src="<?php echo e(isset($productReview->user) ? getValidImage(path: 'storage/app/public/profile/'.$productReview->user->image, type: 'avatar') : theme_asset(path: 'public/assets/front-end/img/image-place-holder.png')); ?>"
                         alt="<?php echo e(isset($productReview->user)?$productReview->user->f_name : translate('not exist')); ?>"/>
                    <div
                        class="media-body <?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?> text-body">
                        <span class="mb-0 text-body font-semi-bold fs-13"><?php echo e(isset($productReview->user)?$productReview->user->f_name.' '.$productReview->user->l_name : translate('not exist')); ?></span>
                        <div class="d-flex ">
                            <div class="me-2">
                                <i class="sr-star czi-star-filled active"></i>
                            </div>
                            <div class="text-body text-nowrap">
                                <?php echo e(isset($productReview->rating) ? $productReview->rating : 0); ?> / 5
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <p class="mb-3 text-body __text-sm text-break"><?php echo e(isset($productReview->comment) ? $productReview->comment : ''); ?></p>
                <?php if(isset($productReview->attachment) && !empty(json_decode($productReview->attachment))): ?>
                    <?php $__currentLoopData = json_decode($productReview->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img data-link="<?php echo e(getValidImage(path: 'storage/app/public/review/'.$photo, type: 'product')); ?>"
                             class="cz-image-zoom __img-70 rounded border show-instant-image"
                             src="<?php echo e(getValidImage(path: 'storage/app/public/review/'.$photo, type: 'product')); ?>"
                             alt="<?php echo e(translate('product')); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="col-md-2 text-body">
                <span class="float-end font-semi-bold fs-13"><?php echo e(isset($productReview->updated_at) ? $productReview->updated_at->format('M-d-Y') : ''); ?></span>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_product-reviews.blade.php ENDPATH**/ ?>