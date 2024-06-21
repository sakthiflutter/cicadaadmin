<?php $__env->startSection('title', translate('order_Details')); ?>

<?php $__env->startSection('content'); ?>

    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47 text-start">
        <div class="row g-3">
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <?php if($order->seller_is =='seller'): ?>
                            <div class="media flex-wrap gap-2 gap-sm-3 border rounded p-3">
                                <img class="rounded border seller-info-img" alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$order->seller->shop->image, type: 'shop')); ?>">
                                <div class="media-body">
                                    <div class="d-flex gap-2 gap-sm-3 align-items-sm-center justify-content-between">
                                        <div class="">
                                            <h6 class="text-capitalize seller-info-title mb-1 mb-sm-2"><?php echo e($order->seller->shop->name); ?></h6>
                                            <div class="rating-show justify-content-between">
                                                <span class="d-inline-block font-size-sm text-body">
                                                    <?php for($inc=1;$inc<=5;$inc++): ?>
                                                        <?php if($inc <= (int)$avg_rating): ?>
                                                            <i class="tio-star text-warning"></i>
                                                        <?php elseif($avg_rating != 0 && $inc <= (int)$avg_rating + 1.1 && $avg_rating > ((int)$avg_rating)): ?>
                                                            <i class="tio-star-half text-warning"></i>
                                                        <?php else: ?>
                                                            <i class="tio-star-outlined text-warning"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <label class="badge-style">
                                                        ( <?php echo e(number_format($avg_rating,1)); ?> )
                                                    </label>
                                                </span>
                                            </div>
                                            <ul class="list-unstyled list-inline-dot fs-12 mb-0">
                                                <li class="mb-0"><?php echo e($rating_count); ?> <?php echo e(('reviews')); ?> </li>
                                            </ul>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-soft-info text-capitalize px-2 px-sm-4"
                                                    data-toggle="modal"
                                                    data-target="#chatting_modal" <?php echo e(($order->seller->shop->temporary_close || ($order->seller->shop->vacation_status && date('Y-m-d') >= date('Y-m-d', strtotime($order->seller->shop->vacation_start_date)) && date('Y-m-d') <= date('Y-m-d', strtotime($order->seller->shop->vacation_end_date)))) ? 'disabled' : ''); ?>>
                                                <img alt="" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/seller-info-chat.png')); ?>">
                                                <span class="d-none d-sm-inline-block">
                                                    <?php echo e(translate('chat_with_vendor')); ?>

                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="media flex-wrap gap-3 border rounded p-3">
                                <img class="rounded border" width="77" alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'.$web_config['fav_icon']->value, type: 'logo')); ?>">
                                <div class="media-body">
                                    <div class="d-flex flex-wrap gap-3 align-items-center justify-content-between">
                                        <div>
                                            <h6 class="text-capitalize"><?php echo e($web_config['name']->value); ?></h6>
                                            <div class="rating-show justify-content-between">
                                                <span class="d-inline-block font-size-sm text-body">
                                                    <?php for($inc=1;$inc<=5;$inc++): ?>
                                                        <?php if($inc <= (int)$avg_rating): ?>
                                                            <i class="tio-star text-warning"></i>
                                                        <?php elseif($avg_rating != 0 && $inc <= (int)$avg_rating + 1.1 && $avg_rating > ((int)$avg_rating)): ?>
                                                            <i class="tio-star-half text-warning"></i>
                                                        <?php else: ?>
                                                            <i class="tio-star-outlined text-warning"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <label class="badge-style">
                                                        ( <?php echo e(number_format($avg_rating,1)); ?> )
                                                    </label>
                                                </span>
                                            </div>
                                            <ul class="list-unstyled list-inline-dot fs-12 mb-0">
                                                <li class="mb-0"><?php echo e($rating_count); ?> <?php echo e(('reviews')); ?> </li>
                                            </ul>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-soft-info text-capitalize px-2 px-sm-4"
                                                    data-toggle="modal"
                                                    data-target="#chatting_modal">
                                                <img alt="" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/seller-info-chat.png')); ?>">
                                                <span class="d-none d-sm-inline-block">
                                                    <?php echo e(translate('chat_with_vendor')); ?>

                                                </span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php echo $__env->make('layouts.front-end.partials.modal._chatting',['seller'=>$order->seller, 'user_type'=>$order->seller_is], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/account-details/seller-info.blade.php ENDPATH**/ ?>