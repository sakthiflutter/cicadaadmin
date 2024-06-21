<div class="card-header">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/most-popular-product.png')); ?>" alt="">
        <?php echo e(translate('most_Popular_Products')); ?>

    </h4>
</div>

<div class="card-body">
    <?php if($mostRatedProducts): ?>
        <div class="row">
            <div class="col-12">
                <div class="grid-card-wrap">
                    <?php $__currentLoopData = $mostRatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($product['id'])): ?>
                            <div class="cursor-pointer grid-card basic-box-shadow get-view-by-onclick"
                                 data-link="<?php echo e(route('admin.products.view',['addedBy'=>$product['added_by'],'id'=>$product['id']])); ?>">
                                <div>
                                    <img class="avatar avatar-bordered border-gold avatar-60 rounded"
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'backend-product')); ?>"
                                         alt="<?php echo e($product->name); ?><?php echo e(translate('image')); ?>">
                                </div>
                                <div class="fz-12 title-color text-center">
                                    <?php echo e(isset($product['name']) ? substr($product->name, 0, 30) . (strlen($product->name)>20?'...':''):'not exists'); ?>

                                </div>
                                <div class="d-flex align-items-center gap-1 fz-10">
                                    <span class="rating-color d-flex align-items-center font-weight-bold gap-1">
                                        <i class="tio-star"></i>
                                        <?php echo e(round($product['ratings_average'],2)); ?>

                                    </span>
                                    <span class="d-flex align-items-center gap-10">
                                        (<?php echo e($product['reviews_count']); ?> <?php echo e(translate('reviews')); ?>)
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center">
            <p class="text-muted"><?php echo e(translate('no_Top_Selling_Products')); ?></p>
            <img class="w-75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/no-data.png')); ?>" alt="">
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_most-rated-products.blade.php ENDPATH**/ ?>