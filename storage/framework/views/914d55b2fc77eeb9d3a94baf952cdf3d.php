<?php $__env->startSection('title', translate('order_Details')); ?>

<?php $__env->startSection('content'); ?>

    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47 text-start">
        <div class="row g-3">
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <section class="col-lg-9">

                <?php echo $__env->make('web-views.users-profile.account-details.partial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="bg-sm-white mt-3">
                    <div class="p-sm-3 d-flex flex-column gap-3 pb-md-5">
                        <?php ($review_count = 0); ?>
                        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($order_details->reviewData)): ?>
                                <?php ($review_count++); ?>
                                <div class="border rounded bg-white p-3">
                                    <div class="media gap-3">
                                        <div class="position-relative">
                                            <img class="d-block review-item-img get-view-by-onclick"
                                                 data-link="<?php echo e(route('product',$order_details->product['slug'])); ?>"
                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$order_details->product['thumbnail'], type: 'product')); ?>"
                                                 alt="<?php echo e(translate('product')); ?>" width="100">

                                            <?php if($order_details->product->discount > 0): ?>
                                                <span class="price-discount badge badge-primary position-absolute top-1 left-1">
                                                        <?php if($order_details->product->discount_type == 'percent'): ?>
                                                        <?php echo e(round($order_details->product->discount)); ?>%
                                                    <?php elseif($order_details->product->discount_type =='flat'): ?>
                                                        <?php echo e(webCurrencyConverter(amount: $order_details->product->discount)); ?>

                                                    <?php endif; ?>
                                                    </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="media-body">
                                            <a href="<?php echo e(route('product',[$order_details->product['slug']])); ?>">
                                                <h6 class="mb-1 review-item-title">
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
                                            <br>
                                            <div class="d-flex justify-content-end justify-content-sm-start">
                                                <button type="button" class="btn btn-sm rounded btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#submitReviewModal<?php echo e($order_details->id); ?>">
                                                    <i class="tio-star-half"></i>
                                                    <?php echo e(translate('update_review')); ?>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <?php echo $__env->make('layouts.front-end.partials.modal._review',['id'=>$order_details->id,'order_details'=>$order_details], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <div class="mt-4">
                                        <div class="d-flex justify-content-between gap-2 mb-3">
                                            <h6 class="d-flex gap-2 mb-0 review-item-title">
                                                    <span>
                                                        <?php echo e(number_format($order_details->reviewData->rating ,1)); ?>

                                                        <i class="tio-star-half text-warning text-capitalize"></i>
                                                    </span>
                                                <?php echo e(translate('my_review')); ?>

                                            </h6>
                                            <div class="text-muted fs-12">
                                                <?php echo e(date('M d , Y h:i A',strtotime($order_details->reviewData?->updated_at))); ?>

                                            </div>
                                        </div>
                                        <p class="fs-12"><?php echo e($order_details->reviewData?->comment ?? ''); ?></p>
                                        <?php if($order_details->reviewData && isset($order_details->reviewData->attachment) && $order_details->reviewData->attachment != []): ?>
                                            <?php if($order_details->reviewData->attachment != []): ?>
                                                <div class="mt-3">
                                                    <div class="d-flex gap-2 flex-wrap">
                                                        <?php $__currentLoopData = $order_details->reviewData->attachment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a data-lightbox="mygallery"
                                                               href="<?php echo e(theme_asset(path: 'storage/app/public/review')); ?>/<?php echo e($photo); ?>">
                                                                <img class="border rounded border-primary-light"
                                                                     src="<?php echo e(getValidImage(path: 'storage/app/public/review/'.$photo, type: 'product')); ?>"
                                                                     alt="<?php echo e(translate('product')); ?>" width="60">
                                                            </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($review_count == 0): ?>
                            <div class="text-center pt-5 text-capitalize">
                                <img class="mb-3" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/empty-review.svg')); ?>"
                                     alt="">
                                <p class="opacity-60 mt-3 text-capitalize"><?php echo e(translate('no_review_found')); ?>!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">

        let reviewSelectedFiles = [];
        $(document).on('ready', () => {
            $(".reviewFilesValue").on('change', function () {
                for (let i = 0; i < this.files.length; ++i) {
                    reviewSelectedFiles.push(this.files[i]);
                }
                let pre_container = $(this).closest('.upload_images_area');
                reviewFilesValueDisplaySelectedFiles(pre_container);
            });

            function reviewFilesValueDisplaySelectedFiles(pre_container = null) {
                let container;
                if (pre_container == null) {
                    container = document.getElementsByClassName("selected-files-container");
                } else {
                    container = pre_container.find('.selected-files-container');
                }
                container.innerHTML = "";
                reviewSelectedFiles.forEach((file, index) => {
                    const input = document.createElement("input");
                    input.type = "file";
                    input.name = `fileUpload[${index}]`;
                    input.classList.add(`image_index${index}`);
                    input.hidden = true;
                    container.append(input);
                    const blob = new Blob([file], {type: file.type});
                    const file_obj = new File([file], file.name);
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file_obj);
                    input.files = dataTransfer.files;
                });

                pre_container.find(".filearray").empty();
                for (let i = 0; i < reviewSelectedFiles.length; ++i) {
                    let fileReader = new FileReader();
                    let uploadDiv = jQuery.parseHTML("<div class='upload_img_box'><span class='img-clear'><i class='tio-clear'></i></span><img src='' alt=''></div>");

                    fileReader.onload = function () {
                        let imageData = this.result;
                        $(uploadDiv).find('img').attr('src', imageData);
                    };

                    fileReader.readAsDataURL(reviewSelectedFiles[i]);
                    pre_container.find(".filearray").append(uploadDiv);
                    $(uploadDiv).find('.img-clear').on('click', function () {
                        $(this).closest('.upload_img_box').remove();
                        reviewSelectedFiles.splice(i, 1);
                        $('.image_index' + i).remove();
                    });
                }
            }
        });
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/account-details/reviews.blade.php ENDPATH**/ ?>