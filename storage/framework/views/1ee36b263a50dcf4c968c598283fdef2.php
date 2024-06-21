<div class="modal fade" id="submitReviewModal<?php echo e($id); ?>" tabindex="-1" aria-labelledby="submitReviewModalLabel"
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
                <form action="<?php echo e(route('review.store')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="border rounded bg-white">
                        <div class="p-3">
                            <?php if(isset($order_details->product)): ?>
                                <div class="media gap-3">
                                    <div class="position-relative">
                                        <img class="d-block get-view-by-onclick"
                                             data-link="<?php echo e(route('product',$order_details->product['slug'])); ?>"
                                             src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$order_details->product['thumbnail'], type: 'product')); ?>"
                                             alt="<?php echo e(translate('product')); ?>" width="100">

                                        <?php if($order_details->product->discount > 0): ?>
                                            <span
                                                class="price-discount badge badge-primary position-absolute top-1 left-1">
                                            <?php if($order_details->product->discount_type == 'percent'): ?>
                                                    -<?php echo e(round($order_details->product->discount)); ?>%
                                                <?php elseif($order_details->product->discount_type =='flat'): ?>
                                                    -<?php echo e(webCurrencyConverter(amount: $order_details->product->discount)); ?>

                                                <?php endif; ?>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="media-body">

                                        <a href="<?php echo e(route('product',[$order_details->product['slug']])); ?>">
                                            <h6 class="mb-1">
                                                <?php echo e(Str::limit($order_details->product['name'],40)); ?>

                                            </h6>
                                        </a>
                                        <?php if($order_details->variant): ?>
                                            <div>
                                                <small class="text-muted">
                                                    <?php echo e(translate('variant')); ?> : <?php echo e($order_details->variant); ?>

                                                </small>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <small class="text-muted">
                                                <?php echo e(translate('qty')); ?>

                                                : <?php echo e($order_details->qty); ?>

                                            </small>
                                        </div>
                                        <div>
                                            <small class="text-muted">
                                                <?php echo e(translate('price')); ?> :
                                                <span class="text-primary">
                                                    <?php echo e(webCurrencyConverter(amount: $order_details->price)); ?>

                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="text-center text-capitalize">
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/nodata.svg')); ?>"
                                         alt=""
                                         width="100">
                                    <h5><?php echo e(translate('no_product_found')); ?>!</h5>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if(isset($order_details->reviewData)): ?>
                        <?php
                            $rating = $order_details->reviewData->rating;
                            $sessionDirection = session()->get('direction') ?? 'ltr';
                            $style = match ($rating) {
                                1 => 'inset-inline-start:14px',
                                2 => 'inset-inline-start:62',
                                3 => 'inset-inline-start:130px',
                                4 => 'inset-inline-start:190px',
                                default => 'inset-inline-start:142px',
                            };

                            $ratingStatus = match ($rating) {
                                1 => translate('poor'),
                                2 => translate('average'),
                                3 => translate('good'),
                                4 => translate('very_good'),
                                default => translate('excellent'),
                            };
                        ?>
                    <?php endif; ?>
                    <div class="mb-5 mt-3">
                        <div class="star-rating-form">
                            <div class="star-wrap">
                                <h3 class="text-capitalize text-center mb-3"><?php echo e(translate('rate_the_quality')); ?></h3>
                                <input class="rating" name="rating" value="<?php echo e($order_details->reviewData?->rating); ?>" hidden>

                                <input class="star" checked type="radio" value="-1" id="skip-star" name="star-radio"
                                       autocomplete="off"/>
                                <label class="star-label hidden"></label>
                                <?php for($index =1 ;$index<=5; $index++): ?>
                                    <input class="star" type="radio" id="st-<?php echo e($index); ?>" value="<?php echo e($index); ?>"
                                           name="star-radio"
                                           autocomplete="off" <?php echo e(isset($rating) && $rating == $index ? 'checked': ''); ?>>
                                    <label class="star-label" for="st-<?php echo e($index); ?>">
                                        <div class="star-shape"></div>
                                    </label>
                                <?php endfor; ?>
                                <div id="result"
                                     style="<?php echo e($style ?? ''); ?>"><?php echo e($ratingStatus ?? ''); ?></div>
                            </div>
                        </div>
                    </div>
                    <h6 class="cursor-pointer"><?php echo e(translate('have_thoughts_to_share')); ?>?</h6>
                    <div class="">
                        <input name="product_id" value="<?php echo e($order_details->product_id); ?>" hidden>
                        <input name="order_id" value="<?php echo e($order_details->order_id); ?>" hidden>
                        <input name="review_id" value="<?php echo e($order_details->reviewData?->id); ?>" hidden>
                        <textarea rows="4" class="form-control text-area-class" name="comment"
                                  placeholder="<?php echo e(translate('best_product,_highly_recommended')); ?>."><?php echo e($order_details->reviewData?->comment ?? ''); ?></textarea>
                    </div>

                    <div class="mt-3">
                        <h6 class="mb-4 text-capitalize"><?php echo e(translate('upload_images')); ?></h6>
                        <div class="mt-2">
                            <div class="d-flex gap-2 flex-wrap">
                                <div class="d-flex gap-4 flex-wrap coba_review">
                                    <?php if($order_details->reviewData && isset($order_details->reviewData->attachment) && $order_details->reviewData->attachment != []): ?>
                                        <?php $__currentLoopData = $order_details->reviewData->attachment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div
                                                class="position-relative img_row<?php echo e($key); ?> border rounded border-primary-light">
                                                <span class="img_remove_icon remove-img-row-by-key cursor-pointer"
                                                      data-key="<?php echo e($key); ?>"
                                                      data-review-id="<?php echo e($order_details->reviewData->id); ?>"
                                                      data-photo="<?php echo e($photo); ?>"
                                                      data-route="<?php echo e(route('delete-review-image')); ?>">
                                                    <i class="czi-close"></i>
                                                </span>
                                                <div class="overflow-hidden upload_img_box_img rounded">
                                                    <img class="h-auto"
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/review/'.$photo, type: 'product')); ?>"
                                                         alt="<?php echo e(translate('review')); ?>">
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap upload_images_area pt-3">

                                <div class="d-flex flex-wrap filearray"></div>
                                <div class="selected-files-container"></div>

                                <label class="py-0 d-flex align-items-center m-0 cursor-pointer">
                                        <span class="position-relative">
                                            <img class="border rounded border-primary-light h-70px"
                                                 src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/image-place-holder.png')); ?>"
                                                 alt="">
                                        </span>
                                    <input type="file" class="reviewFilesValue h-100 position-absolute w-100 " hidden
                                           multiple accept=".jpg, .png, .jpeg, .gif, .bmp, .webp |image/*">
                                </label>

                            </div>

                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn--primary"><?php echo e(('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<span id="get-status-text" data-poor="<?php echo e(translate('poor')); ?>" data-average="<?php echo e(translate('average')); ?>" data-good="<?php echo e(translate('good')); ?>"
      data-great="<?php echo e(translate('great')); ?>" data-excellent="<?php echo e(translate('excellent')); ?>"></span>
<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        $(".star-rating-form input[name='star-radio']").on("change", () => {
            let result = $("#result");
            let getStatusText = $('#get-status-text');
            let starVal = $(".star-rating-form input[name='star-radio']:checked").val();
            $('input[name=rating]').val(starVal);
            if ((starVal == 1)) {
                result.text(getStatusText.data('poor'));
                result.css("inset-inline-start", "14px");
            } else if ((starVal == 2)) {
                result.text(getStatusText.data('average'));
                result.css("inset-inline-start", "62px");
            } else if ((starVal == 3)) {
                result.text(getStatusText.data('good'));
                result.css("inset-inline-start", "130px");
            } else if ((starVal == 4)) {
                result.text(getStatusText.data('great'));
                result.css("inset-inline-start", "190px");
            } else if ((starVal == 5)) {
                result.text(getStatusText.data('excellent'));
                result.css("inset-inline-start", "242px");
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/moores/resources/themes/default/layouts/front-end/partials/modal/_review.blade.php ENDPATH**/ ?>