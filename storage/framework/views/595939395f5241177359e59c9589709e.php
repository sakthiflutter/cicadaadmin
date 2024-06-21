<?php $__env->startSection('title', translate('shop_Edit')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/css/intlTelInput.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shop-info.png')); ?>" alt="">
            <?php echo e(translate('edit_shop_info')); ?>

        </h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize"><?php echo e(translate('edit_shop_info')); ?></h5>
                    <a href="<?php echo e(route('vendor.shop.index')); ?>" class="btn btn--primary __inline-70 px-4 text-white"><?php echo e(translate('back')); ?></a>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('vendor.shop.update',[$shop->id])); ?>" method="post" class="text-start"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="title-color text-capitalize"><?php echo e(translate('shop_name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="<?php echo e($shop->name); ?>" class="form-control" id="name"
                                            required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title-color"><?php echo e(translate('contact')); ?></label>
                                    <div class="mb-3">
                                        <input class="form-control form-control-user phone-input-with-country-picker"
                                               type="tel" id="exampleInputPhone" value="<?php echo e($shop->contact ?? old('phone')); ?>"
                                               placeholder="<?php echo e(translate('enter_phone_number')); ?>" required>
                                        <div class="">
                                            <input type="text" class="country-picker-phone-number w-50" value="<?php echo e($shop->contact); ?>" name="contact" hidden  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="title-color"><?php echo e(translate('address')); ?> <span class="text-danger">*</span></label>
                                    <textarea type="text" rows="4" name="address" class="form-control" id="address"
                                            required><?php echo e($shop->address); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="title-color text-capitalize"><?php echo e(translate('upload_image')); ?></label>
                                    <div class="custom-file text-left">
                                        <input type="file" name="image" id="custom-file-upload" class="custom-file-input image-input"
                                               data-image-id="viewer"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label text-capitalize" for="custom-file-upload"><?php echo e(translate('choose_file')); ?></label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <img class="upload-img-view" id="viewer"
                                    src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$shop->image,type: 'backend-basic')); ?>" alt="<?php echo e(translate('image')); ?>"/>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 mt-2">
                                <div class="form-group">
                                    <div class="flex-start">
                                        <label for="name" class="title-color text-capitalize"><?php echo e(translate('upload_banner')); ?> </label>
                                        <div class="mx-1">
                                            <span class="text-info"><?php echo e(THEME_RATIO[theme_root_path()]['Store cover Image']); ?></span>
                                        </div>
                                    </div>
                                    <div class="custom-file text-left">
                                        <input type="file" name="banner" id="banner-upload" class="custom-file-input image-input"
                                               data-image-id="viewer-banner"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label text-capitalize" for="banner-upload"><?php echo e(translate('choose_file')); ?></label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <img class="upload-img-view upload-img-view__banner" id="viewer-banner"
                                             src="<?php echo e(getValidImage(path: 'storage/app/public/shop/banner/'.$shop->banner,type: 'backend-banner')); ?>" alt="<?php echo e(translate('banner_image')); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <?php if(theme_root_path() == "theme_aster"): ?>
                            <div class="col-md-6 mb-4 mt-2">
                                <div class="form-group">
                                    <div class="flex-start">
                                        <label for="name" class="title-color text-capitalize"><?php echo e(translate('upload_secondary_banner')); ?></label>
                                        <div class="mx-1">
                                            <span class="text-info"><?php echo e(translate('ratio').' '.'( 6:1 )'); ?></span>
                                        </div>
                                    </div>
                                    <div class="custom-file text-left">
                                        <input type="file" name="bottom_banner" id="bottom-banner-upload" class="custom-file-input image-input"
                                               data-image-id="viewer-bottom-banner"
                                               accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="bottom-banner-upload"><?php echo e(translate('choose_file')); ?></label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <img class="upload-img-view upload-img-view__banner" id="viewer-bottom-banner" src="<?php echo e(getValidImage(path: 'storage/app/public/shop/banner/'.$shop->bottom_banner, type: 'backend-banner')); ?>" alt="<?php echo e(translate('banner_image')); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(theme_root_path() == "theme_fashion"): ?>
                                <div class="col-md-6 mb-4 mt-2">
                                    <div class="form-group">
                                        <div class="flex-start">
                                            <label for="name" class="title-color text-capitalize"><?php echo e(translate('upload_offer_banner')); ?></label>
                                            <div class="mx-1">
                                                <span class="text-info"><?php echo e(translate('ratio').' '.'( 7:1 )'); ?></span>
                                            </div>
                                        </div>
                                        <div class="custom-file text-left">
                                            <input type="file" name="offer_banner" id="offer-banner-upload" class="custom-file-input image-input"
                                                data-image-id="viewer-offer-banner"
                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label text-capitalize" for="offer-banner-upload"><?php echo e(translate('choose_file')); ?></label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="d-flex">
                                            <img class="upload-img-view upload-img-view__banner" id="viewer-offer-banner"
                                                src="<?php echo e(getValidImage(path: 'storage/app/public/shop/banner/'.$shop->offer_banner,type: 'backend-banner')); ?>" alt="<?php echo e(translate('banner_image')); ?>"/>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a class="btn btn-danger" href="<?php echo e(route('vendor.shop.index')); ?>"><?php echo e(translate('cancel')); ?></a>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/js/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/country-picker-init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/shop/update-view.blade.php ENDPATH**/ ?>