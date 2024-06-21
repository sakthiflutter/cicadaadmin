<?php $__env->startSection('title', translate('order_Details')); ?>

<?php $__env->startSection('content'); ?>

    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47 text-align-direction">
        <div class="row g-3">
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial',['order'=>$orderDetails], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card border-0">
                    <div class="card-body">
                        <div>
                            <?php if($orderDetails->order_type == 'default_type' && getWebConfig(name: 'order_verification')): ?>
                            <div class="d-flex gap-3 flex-wrap mb-4">
                                <div class="bg-light rounded py-2 px-3 d-flex align-items-center">
                                    <div class="fs-14">
                                        <?php echo e(translate('order_verification_code')); ?> :
                                        <strong class="text-base">
                                            <?php echo e($orderDetails['verification_code']); ?>

                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if($orderDetails->order_type == 'POS'): ?>
                                <div class="mb-5">
                                    <span class="pos-btn hover-none"><?php echo e(translate('POS_Order')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <ul class="nav nav-tabs media-tabs nav-justified order-track-info">

                            <li class="nav-item">
                                <div class="nav-link active-status">
                                    <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                        <div class="media-tab-media mx-sm-auto mb-3">
                                            <img
                                                src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/order-placed.png')); ?>"
                                                alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="text-sm-center">
                                                <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14"><?php echo e(translate('order_placed')); ?></h6>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-sm-center gap-1 mt-2">
                                                <img
                                                    src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>"
                                                    width="14" alt="">
                                                <span
                                                    class="text-muted fs-12"><?php echo e(date('h:i A, d M Y',strtotime($orderDetails->created_at))); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>


                            <?php if($orderDetails['order_status']!='returned' && $orderDetails['order_status']!='failed' && $orderDetails['order_status']!='canceled'): ?>
                                <?php if(!$isOrderOnlyDigital): ?>
                                    <li class="nav-item ">
                                        <div
                                            class="nav-link <?php echo e(($orderDetails['order_status']=='confirmed') || ($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                            <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                                <div class="media-tab-media mb-3 mx-sm-auto">
                                                    <img
                                                        src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/order-confirmed.png')); ?>"
                                                        alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-sm-center">
                                                        <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14"><?php echo e(translate('order_confirmed')); ?></h6>
                                                    </div>
                                                    <?php if(($orderDetails['order_status']=='confirmed') || ($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered') && \App\Utils\order_status_history($orderDetails['id'],'confirmed')): ?>
                                                        <div
                                                            class="d-flex align-items-center justify-content-sm-center mt-2 gap-1">
                                                            <img width="14" alt=""
                                                                 src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>">
                                                            <span class="text-muted fs-12">
                                                                <?php echo e(date('h:i A, d M Y',strtotime(\App\Utils\order_status_history($orderDetails['id'],'confirmed')))); ?>

                                                            </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div
                                            class="nav-link <?php echo e(($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                            <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                                <div class="media-tab-media mb-3 mx-sm-auto">
                                                    <img alt=""
                                                         src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/shipment.png')); ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-sm-center">
                                                        <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14">
                                                            <?php echo e(translate('preparing_shipment')); ?>

                                                        </h6>
                                                    </div>
                                                    <?php if( ($orderDetails['order_status']=='processing') || ($orderDetails['order_status']=='processed') || ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')  && \App\Utils\order_status_history($orderDetails['id'],'processing')): ?>
                                                        <div
                                                            class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                            <img width="14" alt=""
                                                                 src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>">
                                                            <span class="text-muted fs-12">
                                                                <?php echo e(date('h:i A, d M Y',strtotime(\App\Utils\order_status_history($orderDetails['id'],'processing')))); ?>

                                                            </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div
                                            class="nav-link <?php echo e(($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                            <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                                <div class="media-tab-media mb-3 mx-sm-auto">
                                                    <img
                                                        src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/on-the-way.png')); ?>"
                                                        alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-sm-center">
                                                        <h6 class="media-tab-title text-nowrap mb-0 fs-14"><?php echo e(translate('order_is_on_the_way')); ?></h6>
                                                    </div>
                                                    <?php if( ($orderDetails['order_status']=='out_for_delivery') || ($orderDetails['order_status']=='delivered') && \App\Utils\order_status_history($orderDetails['id'],'out_for_delivery')): ?>
                                                        <div
                                                            class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                            <img class="mx-1"
                                                                 src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>"
                                                                 width="14" alt="">
                                                            <span class="text-muted fs-12">
                                                                <?php echo e(date('h:i A, d M Y',strtotime(\App\Utils\order_status_history($orderDetails['id'],'out_for_delivery')))); ?>

                                                            </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div
                                            class="nav-link <?php echo e(($orderDetails['order_status']=='delivered')?'active-status' : ''); ?>">
                                            <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                                <div class="media-tab-media mb-3 mx-sm-auto">
                                                    <img
                                                        src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/delivered.png')); ?>"
                                                        alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-sm-center">
                                                        <h6 class="media-tab-title text-nowrap mb-0 fs-14"><?php echo e(translate('order_Shipped')); ?></h6>
                                                    </div>
                                                    <?php if(($orderDetails['order_status']=='delivered') && \App\Utils\order_status_history($orderDetails['id'],'delivered')): ?>
                                                        <div
                                                            class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                            <img
                                                                src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>"
                                                                width="14" alt="">
                                                            <span class="text-muted fs-12">
                                                            <?php echo e(date('h:i A, d M Y',strtotime(\App\Utils\order_status_history($orderDetails['id'],'delivered')))); ?>

                                                        </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php else: ?>

                                        <?php
                                        $digitalProductProcessComplete = true;
                                        foreach ($orderDetails->orderDetails as $detail) {
                                            $productData = json_decode($detail->product_details);
                                            if ($productData->digital_product_type == 'ready_after_sell' && $detail->digital_file_after_sell == null) {
                                                $digitalProductProcessComplete = false;
                                            }
                                        }
                                        ?>

                                    <li class="nav-item">
                                        <div
                                            class="nav-link <?php echo e(($orderDetails['order_status']=='confirmed') ? 'active-status' : ''); ?>">
                                            <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                                <div class="media-tab-media mb-3 mx-sm-auto">
                                                    <img alt=""
                                                         src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/shipment.png')); ?>">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-sm-center">
                                                        <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14">
                                                            <?php echo e(translate('processing')); ?>

                                                        </h6>
                                                    </div>
                                                    <?php if($orderDetails['order_status']=='confirmed' && \App\Utils\order_status_history($orderDetails['id'],'confirmed')): ?>
                                                        <div
                                                            class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                            <img width="14" alt=""
                                                                 src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>">
                                                            <span class="text-muted fs-12">
                                                                <?php echo e(date('h:i A, d M Y',strtotime(\App\Utils\order_status_history($orderDetails['id'],'confirmed')))); ?>

                                                            </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <div
                                            class="nav-link <?php echo e(($orderDetails['order_status']=='confirmed' && $digitalProductProcessComplete)?'active-status' : ''); ?>">
                                            <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                                <div class="media-tab-media mb-3 mx-sm-auto">
                                                    <img
                                                        src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/delivered.png')); ?>"
                                                        alt="">
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-sm-center">
                                                        <h6 class="media-tab-title text-nowrap mb-0 fs-14"><?php echo e(translate('delivery_complete')); ?></h6>
                                                    </div>

                                                    <?php if(($orderDetails['order_status']=='confirmed') && $digitalProductProcessComplete && \App\Utils\order_status_history($orderDetails['id'],'confirmed')): ?>
                                                        <div
                                                            class="d-flex align-items-center justify-content-sm-center mt-2 gap-2">
                                                            <img
                                                                src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>"
                                                                width="14" alt="">
                                                            <span class="text-muted fs-12">
                                                            <?php echo e(date('h:i A, d M Y',strtotime(\App\Utils\order_status_history($orderDetails['id'],'confirmed')))); ?>

                                                        </span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php elseif(in_array($orderDetails['order_status'], ['returned', 'canceled'])): ?>
                                <li class="nav-item">
                                    <div class="nav-link active-status">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mx-sm-auto mb-3">
                                                <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/'.$orderDetails['order_status'].'.png')); ?>" alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14">
                                                        <?php echo e(translate('order')); ?> <?php echo e(translate($orderDetails['order_status'])); ?>

                                                    </h6>
                                                </div>
                                                <?php if(\App\Utils\order_status_history($orderDetails['id'], $orderDetails['order_status'])): ?>
                                                    <div class="d-flex align-items-center justify-content-sm-center gap-1 mt-2">
                                                        <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/clock.png')); ?>"
                                                             width="14" alt="">
                                                        <span class="text-muted fs-12">
                                                        <?php echo e(date('h:i A, d M Y', strtotime(\App\Utils\order_status_history($orderDetails['id'], $orderDetails['order_status'])))); ?>

                                                    </span>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <div class="nav-link active-status">
                                        <div class="d-flex flex-sm-column gap-3 gap-sm-0">
                                            <div class="media-tab-media mx-sm-auto mb-3">
                                                <img
                                                    src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/track-order/order-failed.png')); ?>"
                                                    alt="">
                                            </div>
                                            <div class="media-body">
                                                <div class="text-sm-center">
                                                    <h6 class="media-tab-title text-nowrap mb-0 text-capitalize fs-14"><?php echo e(translate('Failed_to_Deliver')); ?></h6>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-sm-center gap-1 mt-2">
                                                    <span class="text-muted fs-12">
                                                        <?php echo e(translate('sorry_we_can_not_complete_your_order')); ?>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>

                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/account-details/track-order.blade.php ENDPATH**/ ?>