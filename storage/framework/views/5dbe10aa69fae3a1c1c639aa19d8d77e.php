<?php $__env->startSection('title', translate('employee Add')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/css/intlTelInput.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-new-employee.png')); ?>" alt="">
                <?php echo e(translate('add_new_employee')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo e(route('admin.employee.add-new')); ?>" method="post" enctype="multipart/form-data" class="text-start">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-0 page-header-title text-capitalize d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                                <i class="tio-user"></i>
                                <?php echo e(translate('general_information')); ?>

                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"
                                               class="title-color"><?php echo e(translate('full_name')); ?></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="<?php echo e(translate('ex'). ':'. translate('John_Doe')); ?>"
                                               value="<?php echo e(old('name')); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="title-color"><?php echo e(translate('phone')); ?></label>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user phone-input-with-country-picker"
                                                   type="tel" id="exampleInputPhone" value="<?php echo e(old('phone')); ?>"
                                                   placeholder="<?php echo e(translate('enter_phone_number')); ?>" required>
                                            <div class="">
                                                <input type="text" class="country-picker-phone-number w-50" value="<?php echo e(old('phone')); ?>" name="phone" hidden  readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="role_id" class="title-color"><?php echo e(translate('role')); ?></label>
                                        <select class="form-control" name="role_id" id="role_id">
                                            <option value="0" selected disabled><?php echo e(translate('select')); ?>

                                            </option>
                                            <?php $__currentLoopData = $employee_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($role->id); ?>" <?php echo e(old('role_id')==$role->id?'selected':''); ?>><?php echo e(ucfirst($role->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="identify_type" class="title-color"><?php echo e(translate('identify_type')); ?></label>
                                        <select class="form-control" name="identify_type" id="identify_type">
                                            <option value="" selected disabled><?php echo e(translate('select_identify_type')); ?></option>
                                            <option value="nid"><?php echo e(translate('NID')); ?></option>
                                            <option value="passport"><?php echo e(translate('passport')); ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="identify_number" class="title-color"><?php echo e(translate('identify_number')); ?></label>
                                        <input type="number" name="identify_number" value="<?php echo e(old('identity_number')); ?>" class="form-control"
                                            placeholder="<?php echo e(translate('ex').':'.'9876123123'); ?>" id="identify_number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="text-center mb-3">
                                            <img class="upload-img-view" id="viewer"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/400x400/img2.jpg')); ?>"
                                                 alt=""/>
                                        </div>
                                        <label for="customFileUpload" class="title-color"><?php echo e(translate('employee_image')); ?></label>
                                        <span class="text-info">( <?php echo e(translate('ratio').' '.'1:1'); ?> )</span>
                                        <div class="form-group">
                                            <div class="custom-file text-left">
                                                <input type="file" name="image" id="custom-file-upload" class="custom-file-input image-input"
                                                       data-image-id="viewer"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                                <label class="custom-file-label" for="custom-file-upload"><?php echo e(translate('choose_file')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="title-color" for="exampleFormControlInput1"><?php echo e(translate('identity_image')); ?></label>
                                        <div>
                                            <div class="row select-multiple-image"></div>
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
                                        <label for="email" class="title-color"><?php echo e(translate('email')); ?></label>
                                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                                               id="email"
                                               placeholder="<?php echo e(translate('ex').':'.'ex@gmail.com'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="user_password" class="title-color d-flex align-items-center">
                                            <?php echo e(translate('password')); ?>

                                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(translate('The_password_must_be_at_least_8_characters_long_and_contain_at_least_one_uppercase_letter').','.translate('_one_lowercase_letter').','.translate('_one_digit_').','.translate('_one_special_character').','.translate('_and_no_spaces').'.'); ?>">
                                                <img alt="" width="16" src=<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?> alt="" class="m-1">
                                            </span>
                                        </label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="js-toggle-password form-control password-check"
                                                   name="password" required id="user_password"
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
                                        <label for="confirm_password" class="title-color">
                                            <?php echo e(translate('confirm_password')); ?>

                                        </label>

                                        <div class="input-group input-group-merge">
                                            <input type="password" class="js-toggle-password form-control"
                                                   name="confirm_password" required id="confirm_password"
                                                   placeholder="<?php echo e(translate('confirm_password')); ?>"
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

                            <div class="d-flex justify-content-end gap-3">
                                <button type="reset" id="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <span id="get-multiple-image-data"
          data-image="<?php echo e(dynamicAsset(path: "public/assets/back-end/img/400x400/img2.jpg")); ?>"
          data-width="100%"
          data-group-class="col-6 col-lg-4"
          data-row-height="auto"
          data-max-count="5"
          data-field="identity_image[]">
</span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/select-multiple-image.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/js/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/country-picker-init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/employee/add-new.blade.php ENDPATH**/ ?>