<?php $__env->startSection('title', translate('banner')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <div class="d-flex justify-content-between mb-3">
            <div>
                <h2 class="h1 mb-1 text-capitalize d-flex align-items-center gap-2">
                    <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/banner.png')); ?>" alt="">
                    <?php echo e(translate('banner_update_form')); ?>

                </h2>
            </div>
            <div>
                <a class="btn btn--primary text-white" href="<?php echo e(route('admin.banner.list')); ?>">
                    <i class="tio-chevron-left"></i> <?php echo e(translate('back')); ?></a>
            </div>
        </div>

        <div class="row text-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.banner.update', [$banner['id']])); ?>" method="post" enctype="multipart/form-data"
                              class="banner_form">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" id="id" name="id">
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="title-color text-capitalize"><?php echo e(translate('banner_type')); ?></label>
                                        <select class="js-example-responsive form-control w-100" name="banner_type" required id="banner_type_select">
                                            <?php $__currentLoopData = $bannerTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $singleBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php echo e($banner['banner_type'] == $key ? 'selected':''); ?>><?php echo e($singleBanner); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="name" class="title-color text-capitalize"><?php echo e(translate('banner_URL')); ?></label>
                                        <input type="url" name="url" class="form-control" id="url" required placeholder="<?php echo e(translate('enter_url')); ?>" value="<?php echo e($banner['url']); ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="resource_id" class="title-color text-capitalize"><?php echo e(translate('resource_type')); ?></label>
                                        <select class="js-example-responsive form-control w-100 action-display-data" name="resource_type" required>
                                            <option value="product" <?php echo e($banner['resource_type']=='product'?'selected':''); ?>><?php echo e(translate('product')); ?></option>
                                            <option value="category" <?php echo e($banner['resource_type']=='category'?'selected':''); ?>><?php echo e(translate('category')); ?></option>
                                            <option value="shop" <?php echo e($banner['resource_type']=='shop'?'selected':''); ?>><?php echo e(translate('shop')); ?></option>
                                            <option value="brand" <?php echo e($banner['resource_type']=='brand'?'selected':''); ?>><?php echo e(translate('brand')); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 <?php echo e($banner['resource_type']=='product'?'d--block':'d--none'); ?>" id="resource-product">
                                        <label for="product_id" class="title-color text-capitalize"><?php echo e(translate('product')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="product_id">
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($product['id']); ?>" <?php echo e($banner['resource_id']==$product['id']?'selected':''); ?>><?php echo e($product['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 <?php echo e($banner['resource_type']=='category'?'d--block':'d--none'); ?>" id="resource-category">
                                        <label for="name" class="title-color text-capitalize"><?php echo e(translate('category')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="category_id">
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category['id']); ?>" <?php echo e($banner['resource_id']==$category['id']?'selected':''); ?>><?php echo e($category['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 <?php echo e($banner['resource_type']=='shop'?'d--block':'d--none'); ?>" id="resource-shop">
                                        <label for="shop_id" class="title-color text-capitalize"><?php echo e(translate('shop')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="shop_id">
                                            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($shop['id']); ?>" <?php echo e($banner['resource_id']==$shop['id']?'selected':''); ?>><?php echo e($shop['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-0 <?php echo e($banner['resource_type']=='brand'?'d--block':'d--none'); ?>" id="resource-brand">
                                        <label for="brand_id" class="title-color text-capitalize"><?php echo e(translate('brand')); ?></label>
                                        <select class="js-example-responsive form-control w-100"
                                                name="brand_id">
                                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($brand['id']); ?>" <?php echo e($banner['resource_id']==$brand['id']?'selected':''); ?>><?php echo e($brand['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <?php if(theme_root_path() == 'theme_fashion'): ?>
                                    <div class="form-group mt-4 input-field-for-main-banner <?php echo e($banner['banner_type'] !='Main Banner'?'d-none':''); ?>">
                                        <label for="button_text" class="title-color text-capitalize"><?php echo e(translate('Button_Text')); ?></label>
                                        <input type="text" name="button_text" class="form-control" id="button_text" placeholder="<?php echo e(translate('Enter_button_text')); ?>" value="<?php echo e($banner['button_text']); ?>">
                                    </div>
                                    <div class="form-group mt-4 mb-0 input-field-for-main-banner <?php echo e($banner['banner_type'] !='Main Banner'?'d-none':''); ?>">
                                        <label for="background_color" class="title-color text-capitalize"><?php echo e(translate('background_color')); ?></label>
                                        <input type="color" name="background_color" class="form-control form-control_color w-100" id="background_color" value="<?php echo e($banner['background_color']); ?>">
                                    </div>
                                    <?php endif; ?>

                                </div>
                                <div class="col-md-6 d-flex flex-column justify-content-center">
                                    <div>
                                        <div class="mx-auto text-center">
                                            <div class="uploadDnD">
                                                <div class="form-group inputDnD input_image input_image_edit"
                                                     data-bg-img="<?php echo e(dynamicStorage(path: 'storage/app/public/banner')); ?>/<?php echo e($banner['photo']); ?>"
                                                     data-title="<?php echo e(file_exists('storage/app/public/banner/'.$banner['photo']) ? '': 'Drag and drop file or Browse file'); ?>">
                                                    <input type="file" name="image" class="form-control-file text--primary font-weight-bold" onchange="readUrl(this)"  accept=".jpg, .png, .jpeg, .gif, .bmp, .webp |image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <label for="name" class="title-color text-capitalize">
                                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo e(translate('banner_image_ratio_is_not_same_for_all_sections_in_website').' '.translate('Please_review_the_ratio_before_upload')); ?>">
                                                <img alt="" width="16" src=<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?> alt="" class="m-1">
                                            </span>
                                            <?php echo e(translate('banner_image')); ?>

                                        </label>
                                        <span class="text-info" id="theme_ratio">( <?php echo e(translate('ratio')); ?> <?php echo e("4:1"); ?> )</span>
                                        <p><?php echo e(translate('banner_Image_ratio_is_not_same_for_all_sections_in_website')); ?>. <?php echo e(translate('please_review_the_ratio_before_upload')); ?></p>

                                         <?php if(theme_root_path() == 'theme_fashion'): ?>
                                         <div class="form-group mt-4 input-field-for-main-banner <?php echo e($banner['banner_type'] !='Main Banner'?'d-none':''); ?>">
                                             <label for="title" class="title-color text-capitalize"><?php echo e(translate('Title')); ?></label>
                                             <input type="text" name="title" class="form-control" id="title" placeholder="<?php echo e(translate('Enter_banner_title')); ?>" value="<?php echo e($banner['title']); ?>">
                                         </div>
                                         <div class="form-group mb-0 input-field-for-main-banner <?php echo e($banner['banner_type'] !='Main Banner'?'d-none':''); ?>">
                                             <label for="sub_title" class="title-color text-capitalize"><?php echo e(translate('Sub_Title')); ?></label>
                                             <input type="text" name="sub_title" class="form-control" id="sub_title" placeholder="<?php echo e(translate('Enter_banner_sub_title')); ?>" value="<?php echo e($banner['sub_title']); ?>">
                                         </div>
                                         <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                    <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('update')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/banner.js')); ?>"></script>
    <script>
        "use strict";
        $(document).on('ready', function () {
            getThemeWiseRatio();
        });
        let elementBannerTypeSelect = $('#banner_type_select');
        elementBannerTypeSelect.on('change',function(){
            getThemeWiseRatio();
        });
        function getThemeWiseRatio(){
            let bannerType = elementBannerTypeSelect.val();
            let theme = '<?php echo e(theme_root_path()); ?>';
            let themeRatio = <?php echo json_encode(THEME_RATIO); ?>;
            let getRatio = themeRatio[theme][bannerType];
            $('#theme_ratio').text(getRatio);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/banner/edit.blade.php ENDPATH**/ ?>