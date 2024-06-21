<div class="position-relative z-index-99 rtl w-100 text-align-direction <?php echo e($displayClass); ?>">
    <div class="__rounded-10 bg-white position-relative">
        <div class="d-flex flex-wrap justify-content-between seller-details">
            <div class="d-flex align-items-center p-2 flex-grow-1">
                <div class="">
                    <?php if($shop['id'] != 0): ?>
                        <div class="position-relative">
                            <?php if($seller_temporary_close || $inhouse_temporary_close): ?>
                                <span class="temporary-closed-details p-1">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                            <?php elseif(($seller_id==0 && $inHouseVacationStatus && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date) ||
                            $seller_id!=0 && $seller_vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date): ?>
                                <span class="temporary-closed-details p-1">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                            <?php endif; ?>
                            <img class="w-90px rounded" alt=""
                                 src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$shop->image, type: 'shop')); ?>">
                        </div>
                    <?php else: ?>
                        <div class="position-relative">
                            <?php if($seller_temporary_close || $inhouse_temporary_close): ?>
                                <span class="temporary-closed-details">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                            <?php elseif(($seller_id==0 && $inHouseVacationStatus && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date) ||
                            $seller_id!=0 && $seller_vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date): ?>
                                <span class="temporary-closed-details">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                            <?php endif; ?>
                            <img class="w-90px rounded" alt=""
                                 src="<?php echo e(getValidImage(path: 'storage/app/public/company/'.$web_config['fav_icon']->value, type: 'shop')); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="__w-100px flex-grow-1 <?php echo e(Session::get('direction') === "rtl" ? ' pr-2 pr-sm-4' : ' pl-2 pl-sm-4'); ?>">
                    <div class="font-weight-bolder mb-2">
                        <?php if($shop['id'] != 0): ?>
                            <?php echo e($shop->name); ?>

                        <?php else: ?>
                            <?php echo e($web_config['name']->value); ?>

                        <?php endif; ?>
                    </div>
                    <div class="d-flex flex-column gap-1">
                        <div class="fs-12">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <?php if($i <=$avg_rating): ?>
                                    <i class="tio-star text-warning"></i>
                                <?php elseif($avg_rating != 0 && $i <= (int)$avg_rating + 1 && $avg_rating>=((int)$avg_rating+.30)): ?>
                                    <i class="tio-star-half text-warning"></i>
                                <?php else: ?>
                                    <i class="tio-star-outlined text-warning"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <span class="ml-1">(<?php echo e(round($avg_rating,1)); ?>)</span>
                            <span class="__inline-69"></span>
                            <span class="text-nowrap fs-13 font-semibold text-base">
                                <?php echo e($total_review); ?> <?php echo e(translate('reviews')); ?>

                            </span>
                        </div>

                        <div class="d-flex flex-wrap py-1 fs-12 web-text-primary">

                            <span class="text-nowrap"><?php echo e($total_order); ?> <?php echo e(translate('orders')); ?></span>
                            <?php ($minimum_order_amount_status=getWebConfig(name: 'minimum_order_amount_status')); ?>
                            <?php ($minimum_order_amount_by_seller=getWebConfig(name: 'minimum_order_amount_by_seller')); ?>
                            <?php if($minimum_order_amount_status ==1 && $minimum_order_amount_by_seller ==1): ?>
                                <span class="__inline-69"></span>
                                <?php if($shop['id'] == 0): ?>
                                    <?php ($minimum_order_amount=getWebConfig(name: 'minimum_order_amount')); ?>
                                    <span><?php echo e(webCurrencyConverter(amount: $minimum_order_amount)); ?> <?php echo e(translate('minimum_order_amount')); ?></span>
                                <?php else: ?>
                                    <span><?php echo e(webCurrencyConverter(amount: $shop->seller->minimum_order_amount)); ?> <?php echo e(translate('minimum_order_amount')); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-sm-4' : 'mr-sm-4'); ?>">
                    <?php if(auth('customer')->check()): ?>
                        <div class="d-flex">
                            <?php if($seller_id == 0): ?>
                                <button class="btn btn--primary __inline-70 rounded-10 btn-sm text-capitalize chat-with-seller-button d-none d-sm-inline-block" data-toggle="modal"
                                        data-target="#exampleModal"
                                        <?php if(($seller_id == 0 && $inHouseVacationStatus && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date) ||
                            $seller_id!=0 && $seller_vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date): ?>
                                            disabled
                                    <?php endif; ?>
                                >
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/shopview-chat.png')); ?>" loading="eager" class="" alt="">
                                    <span class="d-none d-sm-inline-block">
                                        <?php echo e(translate('chat')); ?>

                                    </span>
                                </button>

                                <button class="btn bg-transparent border-0 __inline-70 rounded-10  text-capitalize chat-with-seller-button d-sm-inline-block d-md-none" data-toggle="modal"
                                        data-target="#exampleModal"
                                        <?php if(($seller_id == 0 && $inHouseVacationStatus && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date) || $seller_id!=0 && $seller_vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date): ?> disabled <?php endif; ?> >
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/shopview-chat-blue.svg')); ?>" loading="eager" class="" alt="">
                                </button>

                            <?php else: ?>
                                <button class="btn btn--primary __inline-70 rounded-10 btn-sm text-capitalize chat-with-seller-button d-none d-sm-inline-block" data-toggle="modal"
                                        data-target="#exampleModal" <?php echo e(($shop->temporary_close || ($shop->vacation_status && date('Y-m-d') >= date('Y-m-d', strtotime($shop->vacation_start_date)) && date('Y-m-d') <= date('Y-m-d', strtotime($shop->vacation_end_date)))) ? 'disabled' : ''); ?>>
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/shopview-chat.png')); ?>" loading="eager" class="" alt="">
                                    <span class="d-none d-sm-inline-block">
                                        <?php echo e(translate('chat')); ?>

                                    </span>
                                </button>

                                <button class="btn bg-transparent border-0 __inline-70 rounded-10  text-capitalize chat-with-seller-button d-sm-inline-block d-md-none" data-toggle="modal"
                                        data-target="#exampleModal" <?php echo e(($shop->temporary_close || ($shop->vacation_status && date('Y-m-d') >= date('Y-m-d', strtotime($shop->vacation_start_date)) && date('Y-m-d') <= date('Y-m-d', strtotime($shop->vacation_end_date)))) ? 'disabled' : ''); ?>>
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/shopview-chat-blue.svg')); ?>" loading="eager" class="" alt="">
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="d-flex">
                            <a href="<?php echo e(route('customer.auth.login')); ?>"
                               class="btn btn--primary __inline-70 rounded-10 btn-sm text-capitalize chat-with-seller-button">
                                <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/shopview-chat.png')); ?>" loading="eager" class="" alt="">
                                <span class="d-none d-sm-inline-block">
                                    <?php echo e(translate('chat')); ?>

                                </span>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/seller-view/shop-info-card.blade.php ENDPATH**/ ?>