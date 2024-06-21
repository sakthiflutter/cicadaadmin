<?php $__env->startSection('title',translate('add_new_delivery_man')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-new-delivery-man.png')); ?>" alt="">
                <?php echo e(translate('add_new_delivery_man')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="<?php echo e(route('admin.delivery-man.add')); ?>" method="post" enctype="multipart/form-data" id="add-delivery-man-form">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                <?php echo e(translate('general_Information')); ?>

                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="f_name"><?php echo e(translate('first_Name')); ?></label>
                                        <input type="text" name="f_name" value="<?php echo e(old('f_name')); ?>" class="form-control" placeholder="<?php echo e(translate('first_Name')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('last_Name')); ?></label>
                                        <input value="<?php echo e(old('l_name')); ?>"  type="text" name="l_name" class="form-control" placeholder="<?php echo e(translate('last_Name')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('phone')); ?></label>
                                        <div class="input-group mb-3">
                                            <div>
                                                <select class="js-example-basic-multiple js-states js-example-responsive form-control"
                                                    name="country_code">
                                                    <?php $__currentLoopData = $telephoneCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($code['code']); ?>" <?php echo e(old($code['code']) == $code['code']? 'selected' : ''); ?>><?php echo e($code['name']); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <input value="<?php echo e(old('phone')); ?>" type="text" name="phone" class="form-control" placeholder="<?php echo e(translate('ex').':'.'017********'); ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('identity_Type')); ?></label>
                                        <select name="identity_type" class="form-control">
                                            <option value="passport"><?php echo e(translate('passport')); ?></option>
                                            <option value="driving_license"><?php echo e(translate('driving_License')); ?></option>
                                            <option value="nid"><?php echo e(translate('nid')); ?></option>
                                            <option value="company_id"><?php echo e(translate('company_ID')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('identity_Number')); ?></label>
                                        <input value="<?php echo e(old('identity_number')); ?>"  type="text" name="identity_number" class="form-control"
                                               placeholder="<?php echo e(translate('ex').':'.'DH-23434-LS'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('address')); ?></label>
                                        <div class="input-group mb-3">
                                            <textarea name="address" class="form-control" id="address" rows="1" placeholder="<?php echo e(translate('address')); ?>"><?php echo e(old('address')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color"><?php echo e(translate('deliveryman_image')); ?></label>
                                        <span class="text-info">* ( <?php echo e(translate('ratio')); ?> 1:1 )</span>
                                        <div class="custom-file">
                                            <input value="<?php echo e(old('image')); ?>" type="file" name="image" id="customFileEg1" class="custom-file-input"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff,.webp|image/*">
                                            <label class="custom-file-label" for="customFileEg1"><?php echo e(translate('choose_File')); ?></label>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <img class="upload-img-view" id="viewer"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/400x400/img2.jpg')); ?>" alt="<?php echo e(translate('delivery_man_image')); ?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="title-color" for="exampleFormControlInput1"><?php echo e(translate('identity_image')); ?></label>
                                        <div>
                                            <div class="row" id="coba"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                <?php echo e(translate('account_Information')); ?>

                            </h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color d-flex" for="exampleFormControlInput1"><?php echo e(translate('email')); ?></label>
                                            <input value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control" placeholder="<?php echo e(translate('ex').':'.'ex@example.com'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color d-flex align-items-center" for="user_password">
                                                <?php echo e(translate('password')); ?>

                                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(translate('The_password_must_be_at_least_8_characters_long_and_contain_at_least_one_uppercase_letter').','.translate('_one_lowercase_letter').','.translate('_one_digit_').','.translate('_one_special_character').','.translate('_and_no_spaces').'.'); ?>">
                                                    <img alt="" width="16" src=<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?> alt="" class="m-1">
                                                </span>
                                            </label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" class="js-toggle-password form-control password-check"
                                                       name="password" id="user_password"
                                                       placeholder="<?php echo e(translate('password_minimum_8_characters')); ?>"
                                                       data-hs-toggle-password-options='{
                                                         "target": "#changePassTarget",
                                                        "defaultClass": "tio-hidden-outlined",
                                                        "showClass": "tio-visible-outlined",
                                                        "classChangeTarget": "#changePassIcon"
                                                }'>
                                                <div id="changePassTarget" class="input-group-append">
                                                    <a class="input-group-text" href="javascript:">
                                                        <i id="changePassIcon" class="tio-visible-outlined"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <span class="text-danger mx-1 password-error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="title-color d-flex" for="confirm_password">
                                                <?php echo e(translate('confirm_password')); ?>

                                            </label>

                                            <div class="input-group input-group-merge">
                                                <input type="password" class="js-toggle-password form-control"
                                                       name="confirm_password" id="confirm_password"
                                                       placeholder="<?php echo e(translate('password_minimum_8_characters')); ?>"
                                                       data-hs-toggle-password-options='{
                                                         "target": "#changeConfirmPassTarget",
                                                        "defaultClass": "tio-hidden-outlined",
                                                        "showClass": "tio-visible-outlined",
                                                        "classChangeTarget": "#changeConfirmPassIcon"
                                                }'>
                                                <div id="changeConfirmPassTarget" class="input-group-append">
                                                    <a class="input-group-text" href="javascript:">
                                                        <i id="changeConfirmPassIcon" class="tio-visible-outlined"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex gap-3 justify-content-end">
                                    <button type="reset" id="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                    <button type="button" class="btn btn--primary px-4 form-submit" data-form-id="add-delivery-man-form" data-redirect-route="<?php echo e(route('admin.delivery-man.list')); ?>"
                                            data-message="<?php echo e(translate('want_to_add_this_delivery_man').'?'); ?>"><?php echo e(translate('submit')); ?></button>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <span id="coba-image" data-url="<?php echo e(dynamicAsset(path: "public/assets/back-end/img/400x400/img2.jpg")); ?>"></span>
    <span id="extension-error" data-text="<?php echo e(translate("please_only_input_png_or_jpg_type_file")); ?>"></span>
    <span id="size-error" data-text="<?php echo e(translate("file_size_too_big")); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/deliveryman.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/delivery-man/index.blade.php ENDPATH**/ ?>