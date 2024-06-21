<?php $__env->startSection('title', translate('company_Reliability')); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img width="20" src="<?php echo e(dynamicAsset(path: '/public/assets/back-end/img/Pages.png')); ?>" alt="">
            <?php echo e(translate('pages')); ?>

        </h2>
    </div>
    <?php echo $__env->make('admin-views.business-settings.pages-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-4">
                        <?php $__currentLoopData = json_decode($companyReliabilityData->value); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                            <div class="card">
                                <form action="<?php echo e(route('admin.business-settings.company-reliability')); ?>" method="POST"   enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-header align-items-center justify-content-between">
                                        <span class="title-color">
                                            <?php echo e(translate($value->item)); ?>

                                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('if_enabled,_the_'.$value->item.'_will_be_available_on_the_system.')); ?>.">
                                                <img width="16" src="<?php echo e(dynamicAsset(path: '/public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                            </span>
                                        </span>
                                        <input type="hidden" name="item" value="<?php echo e($value->item); ?>">
                                        <label class="switcher" for="<?php echo e($value->item); ?>">
                                            <input type="checkbox" class="switcher_input toggle-switch-message" name="status"
                                                   id="<?php echo e($value->item); ?>" value="1" <?php echo e($value->status ==1 ? 'checked' : ''); ?>

                                                   data-modal-id = "toggle-modal"
                                                   data-toggle-id = "<?php echo e($value->item); ?>"
                                                   data-on-image = ""
                                                   data-off-image = ""
                                                   data-on-title = "<?php echo e(translate('want_to_Turn_ON_the_'.$value->item.'_option').'?'); ?>"
                                                   data-off-title = "<?php echo e(translate('want_to_Turn_OFF_the_'.$value->item.'_option').'?'); ?>"
                                                   data-on-message = "<p><?php echo e(translate('if_enabled_customers_can_see_'.$value->item)); ?></p>"
                                                   data-off-message = "<p><?php echo e(translate('if_disabled_the_'.$value->item.'_will_be_hidden_from_customer')); ?></p>">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="title"><?php echo e(translate('title')); ?></label>
                                            <input type="text" class="form-control" name="title" value="<?php echo e($value->title); ?>"
                                            placeholder="<?php echo e(translate('type_your_title_text')); ?>">
                                        </div>
                                        <div class="custom_upload_input">
                                            <input type="file" name="image" class="custom-upload-input-file aspect-ratio-3-15 upload-color-image" data-imgpreview="pre_img_header_logo<?php echo e($key); ?>" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <span class="delete_file_input btn btn-outline-danger btn-sm square-btn d-none">
                                                <i class="tio-delete"></i>
                                            </span>

                                            <div class="img_area_with_preview position-absolute z-index-2">
                                                <img id="pre_img_header_logo<?php echo e($key); ?>" class="h-auto aspect-ratio-3-15 bg-white" onerror="this.classList.add('d-none')"
                                                     src="<?php echo e(dynamicStorage(path: 'storage/app/public/company-reliability').'/'.$value->image); ?>"
                                                     alt="">
                                            </div>
                                            <div class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                <div class="d-flex flex-column justify-content-center align-items-center">
                                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>" class="w-50" alt="">
                                                    <h3 class="text-muted text-capitalize"><?php echo e(translate('upload_icon')); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn--primary mb-3 mx-4 px-3 text-uppercase"><?php echo e(translate('save')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/features-and-company-reliability-section.js')); ?>"></script>
    <script>
        onErrorImage()
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/company-reliability/index.blade.php ENDPATH**/ ?>