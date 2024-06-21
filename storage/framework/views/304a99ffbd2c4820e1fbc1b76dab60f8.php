<?php $__env->startSection('title', translate('profile_Settings')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/css/intlTelInput.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <div class="row gy-2 align-items-center">
                <div class="col-sm">
                    <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/support-ticket.png')); ?>" alt="">
                        <?php echo e(translate('settings')); ?>

                    </h2>
                </div>
                <div class="col-sm-auto">
                    <a class="btn btn--primary" href="<?php echo e(route('vendor.dashboard.index')); ?>">
                        <i class="tio-home mr-1"></i> <?php echo e(translate('dashboard')); ?>

                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="navbar-vertical navbar-expand-lg mb-3 mb-lg-5">
                    <button type="button" class="navbar-toggler btn btn-block btn-white mb-3"
                            aria-label="Toggle navigation" aria-expanded="false" aria-controls="navbarVerticalNavMenu"
                            data-toggle="collapse" data-target="#navbarVerticalNavMenu">
                <span class="d-flex justify-content-between align-items-center">
                  <span class="h5 mb-0"><?php echo e(translate('nav_menu')); ?></span>
                  <span class="navbar-toggle-default">
                    <i class="tio-menu-hamburger"></i>
                  </span>
                  <span class="navbar-toggle-toggled">
                    <i class="tio-clear"></i>
                  </span>
                </span>
                    </button>

                    <div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
                        <ul id="navbarSettings"
                            class="js-sticky-block js-scrollspy navbar-nav navbar-nav-lg nav-tabs card card-navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="javascript:" id="general-section">
                                    <i class="tio-user-outlined nav-icon"></i><?php echo e(translate('basic_Information')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:" id="password-section">
                                    <i class="tio-lock-outlined nav-icon"></i> <?php echo e(translate('password')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <form action="<?php echo e(route('vendor.profile.update',[$vendor->id])); ?>" method="post"
                      enctype="multipart/form-data" id="update-profile-form">
                <?php echo csrf_field(); ?>
                    <div class="card mb-3 mb-lg-5" id="general-div">
                        <div class="profile-cover">
                            <?php ($banner = !empty($shopBanner) ? dynamicStorage(path: 'storage/app/public/shop/banner/'.$shopBanner) : dynamicAsset(path: 'public/assets/back-end/img/1920x400/img2.jpg')); ?>
                            <div class="profile-cover-img-wrapper profile-bg" style="background-image: url(<?php echo e($banner); ?>)"></div>
                        </div>
                        <div
                            class="avatar avatar-xxl avatar-circle avatar-border-lg avatar-uploader profile-cover-avatar"
                            >
                            <img id="viewer"    class="avatar-img"
                                 src="<?php echo e(getValidImage(path:'storage/app/public/seller/'.$vendor->image, type:'backend-profile')); ?>"
                                 alt="<?php echo e(translate('image')); ?>">
                            <label class="change-profile-image-icon" for="custom-file-upload">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-photo.png')); ?>" alt="">
                            </label>
                        </div>
                    </div>
                    <div class="card mb-3 mb-lg-5">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize"><?php echo e(translate('basic_information')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="firstNameLabel"
                                       class="col-sm-3 col-form-label input-label"><?php echo e(translate('full_Name')); ?>

                                    <i
                                        class="tio-help-outlined text-body ml-1" data-toggle="tooltip"
                                        data-placement="right"
                                        title="<?php echo e(ucwords($vendor->f_name.' '.$vendor->l_name)); ?>"></i></label>

                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="title-color"><?php echo e(translate('first_Name')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="f_name" value="<?php echo e($vendor->f_name); ?>" class="form-control"
                                                id="name"
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="title-color"><?php echo e(translate('last_Name')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="l_name" value="<?php echo e($vendor->l_name); ?>" class="form-control"
                                                id="name"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="phoneLabel"
                                       class="col-sm-3 col-form-label input-label"><?php echo e(translate('phone')); ?> </label>
                                <div class="col-sm-9 mb-3">
                                    <input class="form-control form-control-user phone-input-with-country-picker"
                                           type="tel" id="exampleInputPhone" value="<?php echo e($vendor->phone ?? old('phone')); ?>"
                                           placeholder="<?php echo e(translate('enter_phone_number')); ?>" required>
                                    <div class="">
                                        <input type="text" class="country-picker-phone-number w-50" value="<?php echo e($vendor->phone); ?>" name="phone" hidden  readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label for="newEmailLabel"
                                       class="col-sm-3 col-form-label input-label"><?php echo e(translate('email')); ?></label>

                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="newEmailLabel"
                                           value="<?php echo e($vendor->email); ?>"
                                           placeholder="<?php echo e(translate('enter_new_email_address')); ?>" readonly>
                                </div>
                            </div>
                            <div class="d-none" id="select-img">
                                <input type="file" name="image" id="custom-file-upload" class="custom-file-input image-input"
                                       data-image-id="viewer"
                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" data-form-id="update-profile-form" data-message="<?php echo e(translate('want_to_update_vendor_info').'?'); ?>" class="btn btn--primary <?php echo e(env('APP_MODE')!='demo'?'form-submit':'call-demo'); ?>"><?php echo e(translate('save_changes')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="password-div" class="card mb-3 mb-lg-5">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(translate('change_your_password')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form id="update-password-form" action="<?php echo e(route('vendor.profile.update',[auth('seller')->id()])); ?>" method="POST"
                              enctype="multipart/form-data">
                            <?php echo method_field('PATCH'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="row form-group">
                                <label for="newPassword" class="col-sm-3 col-form-label input-label d-flex align-items-center"> <?php echo e(translate('new_Password')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo e(translate('The_password_must_be_at_least_8_characters_long_and_contain_at_least_one_uppercase_letter').','.translate('_one_lowercase_letter').','.translate('_one_digit_').','.translate('_one_special_character').','.translate('_and_no_spaces').'.'); ?>">
                                        <img alt="" width="16" src=<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?> alt="" class="m-1">
                                    </span>
                                </label>

                                <div class="col-sm-9">
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="js-toggle-password form-control password-check" id="newPassword"
                                               autocomplete="off"
                                               name="password" required minlength="8"
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
                            <div class="row form-group">
                                <label for="confirmNewPasswordLabel" class="col-sm-3 col-form-label input-label pt-0"> <?php echo e(translate('confirm_Password')); ?> </label>
                                <div class="col-sm-9">
                                    <div class="mb-3">
                                        <div class="input-group input-group-merge">
                                            <input type="password" class="js-toggle-password form-control"
                                                   name="confirm_password" required id="confirmNewPasswordLabel"
                                                   placeholder="<?php echo e(translate('confirm_password')); ?>"
                                                   autocomplete="off"
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
                            <div class="d-flex justify-content-end">
                                <button type="button" data-form-id="update-password-form" data-message="<?php echo e(translate('want_to_update_vendor_password').'?'); ?>" class="btn btn--primary <?php echo e(env('APP_MODE')!='demo'?'form-submit':'call-demo'); ?>" ><?php echo e(translate('save_changes')); ?></button>
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

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/profile/update-view.blade.php ENDPATH**/ ?>