<?php $__env->startSection('title', translate('order_Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/deliveryman-info.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47 text-align-direction deliveryman-info-page">
        <div class="row g-3">
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial',['order'=>$order], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($order->delivery_type == 'self_delivery' && isset($order->deliveryMan)): ?>
                    <div class="bg-sm-white mt-3">
                        <div class="p-sm-3">
                            <div class="delivery-man-info-box bg-white media gap-2 gap-sm-3 shadow-sm rounded p-3">
                                <div class="img-avatar-parent-element">
                                    <img class="rounded-circle" width="77" alt=""
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/delivery-man/'.$order->deliveryMan->image, type: 'avatar')); ?>">
                                </div>
                                <div class="media-body">
                                    <div
                                        class="d-flex gap-2 gap-sm-3 align-items-start align-items-sm-center justify-content-between">
                                        <div class="">
                                            <h6 class="text-capitalize mb-2"><?php echo e($order->deliveryMan->f_name); ?>

                                                &nbsp<?php echo e($order->deliveryMan->l_name); ?></h6>
                                            <div class="rating-show justify-content-between fs-12">
                                                <span class="d-inline-block text-body">
                                                    <?php ($avg_rating = isset($order->deliveryMan->rating[0]->average) ? $order->deliveryMan->rating[0]->average : 0); ?>
                                                    <?php for($inc=1;$inc<=5;$inc++): ?>
                                                        <?php if($inc <= (int)$avg_rating): ?>
                                                            <i class="tio-star text-warning"></i>
                                                        <?php elseif($avg_rating != 0 && $inc <= (int)$avg_rating + 1.1 && $avg_rating > ((int)$avg_rating)): ?>
                                                            <i class="tio-star-half text-warning"></i>
                                                        <?php else: ?>
                                                            <i class="tio-star-outlined text-warning"></i>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                    <label class="badge-style fs-12">( <?php echo e(number_format($avg_rating,1)); ?> )</label>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end flex-wrap gap-3 gap-sm-3">
                                            <button type="button" class="btn btn-soft-info text-capitalize px-2 px-md-4"
                                                    data-toggle="modal"
                                                    data-target="#chatting_modal">
                                                <img
                                                    src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/seller-info-chat.png')); ?>"
                                                    alt="">
                                                <span
                                                    class="d-none d-md-inline-block"><?php echo e(translate('chat_with_delivery_man')); ?></span>
                                            </button>
                                            <?php if($order->payment_status == 'paid' && $order->order_type == 'default_type' && $order->order_status=='delivered' && $order->delivery_man_id): ?>
                                                <button type="button" class="btn btn-sm btn-warning px-2 px-md-4"
                                                        data-toggle="modal"
                                                        data-target="#submitReviewModal">
                                                    <i class="tio-star-half"></i>
                                                    <?php if(isset($order->deliveryManReview->comment) || isset($order->deliveryManReview->rating)): ?>
                                                        <?php echo e(translate('Update_Review')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(translate('review')); ?>

                                                    <?php endif; ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if(isset($order->deliveryManReview)): ?>
                                <div class="shadow-sm bg-white rounded p-3 mt-3">
                                    <div class="d-flex align-items-center flex-wrap justify-content-between gap-2 mb-3">
                                        <h6 class="d-flex gap-2 mb-0 review-item-title"><span><?php echo e(number_format($order->deliveryManReview?->rating ,1)); ?><i
                                                    class="tio-star-half text-warning text-capitalize"></i></span> <?php echo e(translate('delivery_man_review')); ?>

                                        </h6>
                                        <div
                                            class="fs-12 text-muted"><?php echo e(date('M d , Y h:i A', strtotime($order->deliveryManReview->updated_at))); ?></div>
                                    </div>
                                    <p class="fs-12 text-muted"><?php echo e($order->deliveryManReview->comment); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if($order->verificationImages->count()>0): ?>
                                <div class="shadow-sm rounded bg-white p-3 mt-3">
                                    <h6 class="mb-0 fs-12 d-flex align-items-center gap-2 lh-1 mb-3">
                                        <i class="tio-photo-camera fs-16 text-primary text-capitalize"></i>
                                        <?php echo e(translate('picture_upload_by')); ?> <?php echo e($order->deliveryMan->f_name); ?>

                                        &nbsp<?php echo e($order->deliveryMan->l_name); ?>

                                    </h6>
                                    <?php $__currentLoopData = $order->verificationImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img class="rounded" width="100" src="<?php echo e(getValidImage(path: "storage/app/public/delivery-man/verification-image/".$image->image, type: 'product')); ?>" alt="">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php elseif($order->delivery_type == 'third_party_delivery'): ?>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="border rounded bg-white p-2">
                                <div class="row g-2">
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="media gap-3">
                                            <img alt="<?php echo e(translate('deliveryman')); ?>" width="20"
                                                 src="<?php echo e(getValidImage(path: 'public/assets/front-end/img/icons/van.png', type: 'avatar')); ?>">
                                            <div class="media-body">
                                                <div class="text-muted text-capitalize">
                                                    <?php echo e(translate('delivery_service_name')); ?>

                                                </div>
                                                <div class="font-weight-bold"><?php echo e($order->delivery_service_name); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-4">
                                        <div class="media gap-3">
                                            <img alt="<?php echo e(translate('deliveryman')); ?>" width="20"
                                                 src="<?php echo e(getValidImage(path:'public/assets/front-end/img/icons/track_order.png', type: 'product')); ?>">
                                            <div class="media-body">
                                                <div class="text-muted"><?php echo e(translate('tracking_ID')); ?> </div>
                                                <div class="font-weight-bold">
                                                    <?php echo e($order->third_party_delivery_tracking_id ?? ''); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="login-card">
                        <div class="text-center pt-5 text-capitalize">

                            <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/delivery-man.svg')); ?>" alt="">
                            <p class="opacity-60 mt-3">
                                <?php if($order->order_type == "POS"): ?>
                                    <span><?php echo e(translate('this_order_is_a_POS_order.delivery_man_is_not_assigned_to_POS_orders')); ?></span>
                                <?php else: ?>
                                    <?php if($order->product_type_check =='digital'): ?>
                                        <?php echo e(translate('this_order_contains_one_or_more_digital_products.')); ?>

                                        <?php echo e(translate('delivery_man_is_not_assigned_for_digital_products')); ?>!
                                    <?php else: ?>
                                        <?php echo e(translate('no_delivery_man_assigned_yet')); ?>!
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

            </section>
        </div>
    </div>

    <div class="modal fade" id="submitReviewModal" tabindex="-1" aria-labelledby="submitReviewModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="text-center text-capitalize"><?php echo e(translate('submit_a_review')); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body d-flex flex-column gap-3">
                    <form action="<?php echo e(route('submit-deliveryman-review')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input name="order_id" value="<?php echo e($order->id); ?>" hidden>
                        <div class="d-flex flex-column gap-2 align-items-center my-4">
                            <h5 class="text-center text-capitalize"><?php echo e(translate('rate_the_delivery_quality')); ?></h5>
                            <div class="rating-label-wrap position-relative">

                                <?php ($style = ''); ?>
                                <?php if(isset($order->deliveryManReview)): ?>
                                    <?php
                                        $rating = $order->deliveryManReview->rating;
                                        $sessionDirection = session()->get('direction') ?? 'ltr';
                                        if ($sessionDirection == 'ltr') {
                                            $style = match ($rating) {
                                                2 => 'left:36px',
                                                3 => 'left:85px',
                                                4 => 'left:112px',
                                                5 => 'left:155px',
                                                default => 'left:5px',
                                            };
                                        }else{
                                            $style = match ($rating) {
                                                2 => 'right:36px',
                                                3 => 'right:85px',
                                                4 => 'right:112px',
                                                5 => 'right:155px',
                                                default => 'right:5px',
                                            };
                                        }
                                    ?>
                                <?php endif; ?>
                                <label class="rating-label">
                                    <input
                                        name="rating"
                                        class="rating cursor-pointer"
                                        max="5"
                                        min="1"
                                        onchange="this.style.setProperty('--value', `${this.valueAsNumber}`)"
                                        step="1"
                                        style="--value:<?php echo e(isset($order->deliveryManReview) ? $order->deliveryManReview->rating : 1); ?>"
                                        type="range"
                                        value="<?php echo e($rating??1); ?>">
                                </label>
                                <span class="rating_content_delivery_man text-primary fs-12 text-nowrap"
                                      style="<?php echo e($style); ?>">
                                    <?php if(isset($order->deliveryManReview)): ?>
                                            <?php
                                            $rating = $order->deliveryManReview->rating;
                                            $rating_status = match ($rating) {
                                                2 => translate('average'),
                                                3 => translate('good'),
                                                4 => translate('very_good'),
                                                5 => translate('excellent'),
                                                default => translate('poor'),
                                            };
                                            ?>
                                        <?php echo e($rating_status); ?>

                                    <?php else: ?>
                                        <?php echo e(translate('poor')); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>

                        <h6 class="cursor-pointer mb-2"><?php echo e(translate('have_thoughts_to_share')); ?>?</h6>
                        <div class="">
                            <textarea rows="4" name="comment" class="form-control text-area-class"
                                      placeholder="<?php echo e(translate('best_delivery_service,_highly_recommended')); ?>"><?php echo e($order->deliveryManReview->comment ?? ''); ?></textarea>
                        </div>

                        <div class="mt-3 d-flex justify-content-end">
                            <?php if(isset($order->deliveryManReview->comment) || isset($order->deliveryManReview->rating)): ?>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                            <?php else: ?>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($order->deliveryMan->id)): ?>
        <div class="modal fade" id="chatting_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-faded-info">
                        <h5 class="modal-title"
                            id="exampleModalLongTitle"><?php echo e(translate('Send_Message_to_Deliveryman')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('messages_store')); ?>" method="post" id="deliveryman-chat-form">
                            <?php echo csrf_field(); ?>
                            <?php if($order->deliveryMan->id != 0): ?>
                                <input value="<?php echo e($order->deliveryMan->id); ?>" name="delivery_man_id" hidden>
                            <?php endif; ?>

                            <textarea name="message" class="form-control" required
                                      placeholder="<?php echo e(translate('Write_here')); ?>..."></textarea>
                            <br>
                            <div class="justify-content-end gap-2 d-flex flex-wrap">
                                <a href="<?php echo e(route('chat', ['type' => 'delivery-man'])); ?>"
                                   class="btn btn-soft-primary bg--secondary border">
                                    <?php echo e(translate('go_to_chatbox')); ?>

                                </a>

                                <?php if($order->deliveryMan->id != 0): ?>
                                    <button class="btn btn--primary text-white"><?php echo e(translate('send')); ?></button>
                                <?php else: ?>
                                    <button class="btn btn--primary text-white" disabled><?php echo e(translate('send')); ?></button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <span id="message-ratingContent"
          data-poor="<?php echo e(translate('poor')); ?>"
          data-average="<?php echo e(translate('average')); ?>"
          data-good="<?php echo e(translate('good')); ?>"
          data-good-message="<?php echo e(translate('the_delivery_service_is_good')); ?>"
          data-good2="<?php echo e(translate('very_Good')); ?>"
          data-good2-message="<?php echo e(translate('this_delivery_service_is_very_good_I_am_highly_impressed')); ?>"
          data-excellent="<?php echo e(translate('excellent')); ?>"
          data-excellent-message="<?php echo e(translate('best_delivery_service_highly_recommended')); ?>"
    ></span>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/account-details/delivery-man-info.blade.php ENDPATH**/ ?>