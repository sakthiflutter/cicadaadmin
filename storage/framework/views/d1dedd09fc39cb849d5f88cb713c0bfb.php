<?php $__env->startSection('title', translate('coupons')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-2 py-md-4 p-0 p-md-2 user-profile-container px-5px">
        <div class="row">
        <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="col-lg-9 __customer-profile px-0">

                <div class="card">
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                            <h5 class="font-bold m-0 fs-16"><?php echo e(translate('coupons')); ?></h5>

                            <button class="profile-aside-btn btn btn--primary px-2 rounded px-2 py-1 d-lg-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 9.81219C7 9.41419 6.842 9.03269 6.5605 8.75169C6.2795 8.47019 5.898 8.31219 5.5 8.31219C4.507 8.31219 2.993 8.31219 2 8.31219C1.602 8.31219 1.2205 8.47019 0.939499 8.75169C0.657999 9.03269 0.5 9.41419 0.5 9.81219V13.3122C0.5 13.7102 0.657999 14.0917 0.939499 14.3727C1.2205 14.6542 1.602 14.8122 2 14.8122H5.5C5.898 14.8122 6.2795 14.6542 6.5605 14.3727C6.842 14.0917 7 13.7102 7 13.3122V9.81219ZM14.5 9.81219C14.5 9.41419 14.342 9.03269 14.0605 8.75169C13.7795 8.47019 13.398 8.31219 13 8.31219C12.007 8.31219 10.493 8.31219 9.5 8.31219C9.102 8.31219 8.7205 8.47019 8.4395 8.75169C8.158 9.03269 8 9.41419 8 9.81219V13.3122C8 13.7102 8.158 14.0917 8.4395 14.3727C8.7205 14.6542 9.102 14.8122 9.5 14.8122H13C13.398 14.8122 13.7795 14.6542 14.0605 14.3727C14.342 14.0917 14.5 13.7102 14.5 13.3122V9.81219ZM12.3105 7.20869L14.3965 5.12269C14.982 4.53719 14.982 3.58719 14.3965 3.00169L12.3105 0.915687C11.725 0.330188 10.775 0.330188 10.1895 0.915687L8.1035 3.00169C7.518 3.58719 7.518 4.53719 8.1035 5.12269L10.1895 7.20869C10.775 7.79419 11.725 7.79419 12.3105 7.20869ZM7 2.31219C7 1.91419 6.842 1.53269 6.5605 1.25169C6.2795 0.970186 5.898 0.812187 5.5 0.812187C4.507 0.812187 2.993 0.812187 2 0.812187C1.602 0.812187 1.2205 0.970186 0.939499 1.25169C0.657999 1.53269 0.5 1.91419 0.5 2.31219V5.81219C0.5 6.21019 0.657999 6.59169 0.939499 6.87269C1.2205 7.15419 1.602 7.31219 2 7.31219H5.5C5.898 7.31219 6.2795 7.15419 6.5605 6.87269C6.842 6.59169 7 6.21019 7 5.81219V2.31219Z" fill="white"/>
                                </svg>
                            </button>
                        </div>

                        <div class="row g-3">
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <div class="ticket-box">
                                    <div class="ticket-start">

                                        <?php if($item->coupon_type == "free_delivery"): ?>
                                            <img width="30" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/bike.png')); ?>" alt="">
                                        <?php elseif($item->coupon_type != "free_delivery" && $item->discount_type == "percentage"): ?>
                                            <img width="30" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/fire.png')); ?>" alt="">
                                        <?php elseif($item->coupon_type != "free_delivery" && $item->discount_type == "amount"): ?>
                                            <img width="30" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/dollar.png')); ?>" alt="">
                                        <?php endif; ?>

                                        <h2 class="ticket-amount">
                                        <?php if($item->coupon_type == "free_delivery"): ?>
                                            <?php echo e(translate('free_Delivery')); ?>

                                        <?php else: ?>
                                            <?php echo e(($item->discount_type == 'percentage') ? $item->discount.'%' : webCurrencyConverter(amount: $item->discount)); ?>

                                        <?php endif; ?>
                                        </h2>
                                        <p>
                                            <?php echo e(translate('on')); ?>


                                            <?php if($item->seller_id == '0'): ?>
                                                <?php echo e(translate('All_Shops')); ?>

                                            <?php elseif($item->seller_id == NULL): ?>
                                                <a class="shop-name" href="<?php echo e(route('shopView',['id'=>0])); ?>">
                                                    <?php echo e($web_config['name']->value); ?>

                                                </a>
                                            <?php else: ?>
                                                <a class="shop-name" href="<?php echo e(isset($item->seller->shop) ? route('shopView',['id'=>$item->seller->shop['id']]) : 'javascript:'); ?> ">
                                                    <?php echo e(isset($item->seller->shop) ? $item->seller->shop->name : translate('shop_not_found')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="ticket-border"></div>
                                    <div class="ticket-end">
                                        <button class="ticket-welcome-btn couponid couponid-<?php echo e($item->code); ?> click-to-copy-coupon" data-value="<?php echo e($item->code); ?>"><?php echo e($item->code); ?></button>
                                        <button class="ticket-welcome-btn couponid-hide couponhideid-<?php echo e($item->code); ?> d-none"><?php echo e(translate('copied')); ?></button>
                                        <h6><?php echo e(translate('valid_till')); ?> <?php echo e($item->expire_date->format('d M, Y')); ?></h6>
                                        <p class="m-0"><?php echo e(translate('available_from_minimum_purchase')); ?> <?php echo e(webCurrencyConverter(amount: $item->min_purchase)); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(count($coupons) == 0): ?>
                                <div class="col-12">
                                    <div class="text-center py-5 text-capitalize">
                                        <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/coupon.svg')); ?>" alt="" class="mb-4" width="70">
                                        <h5 class="fs-14"><?php echo e(translate('no_Coupon_Found')); ?>!</h5>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="col-md-12 mt-2 empty">
                                <?php echo e($coupons->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/coupons.blade.php ENDPATH**/ ?>