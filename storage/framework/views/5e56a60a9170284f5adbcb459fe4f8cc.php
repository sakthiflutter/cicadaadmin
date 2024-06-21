<?php $__env->startSection('title', translate('theme_setup')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_setup')); ?>

            </h2>
            <div class="text-primary d-flex align-items-center gap-3 font-weight-bolder text-capitalize">
                <?php echo e(translate('how_the_setting_works')); ?>

                <div class="ripple-animation" data-toggle="modal" data-target="#setting-modal">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/info.svg')); ?>" class="svg" alt="">
                </div>
            </div>
            <div class="modal fade" id="setting-modal" tabindex="-1" aria-labelledby="settingModal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                            <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close">
                                <i class="tio-clear"></i>
                            </button>
                        </div>
                        <div class="modal-body px-4 px-sm-5 pt-0 text-center">
                            <div class="row g-2 g-sm-3 mt-lg-0">
                                <div class="col-12">
                                    <div class="swiper mySwiper pb-3">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide mb-2">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/slider-1.png')); ?>" loading="lazy"
                                                     alt="" class="dark-support rounded">
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex flex-column align-items-center mx-w450 mx-auto">
                                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/slider-2.png')); ?>" loading="lazy"
                                                         alt="" class="dark-support rounded mb-4">
                                                    <p>
                                                        <?php echo e(translate('get_your_zip_file_from_the_purchased_theme_and_upload_it_and_activate_theme_with_your_Codecanyon_username_and_purchase_code').'.'); ?>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex flex-column align-items-center mx-w450 mx-auto">
                                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/slider-3.png')); ?>" loading="lazy"
                                                         alt="" class="dark-support rounded mb-4">
                                                    <p>
                                                        <?php echo e(translate('now_you’ll_be_successfully_able_to_use_the_theme_for_your').' '.(getWebConfig('company_name') ??'').' '. translate('website')); ?>

                                                    </p>
                                                    <p>
                                                        <?php echo e(translate('N:B you_can_upload_only').' '.(getWebConfig('company_name')??'').' '.translate('theme_templates')); ?>.
                                                    </p>
                                                    <button class="btn btn-primary px-10 mt-3 text-capitalize" data-dismiss="modal"><?php echo e(translate('got_it')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('admin-views.business-settings.theme-and-addon-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mb-5">
            <div class="card-body pl-md-10">
                <h4 class="mb-3 text-capitalize d-flex align-items-center mt-xl-2"><?php echo e(translate('upload_theme')); ?></h4>
                <form enctype="multipart/form-data" id="theme-form">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3">
                        <div class="col-sm-6 col-lg-5 col-xl-5 col-xxl-5">
                            <div class="uploadDnD">
                                <div class="form-group inputDnD input_image input_image_edit"  data-title="<?php echo e(translate('drag_&_drop_file_or_browse_file')); ?>">
                                    <input type="file" name="theme_upload" class="form-control-file text--primary font-weight-bold image-input" id="input-file" accept=".zip">
                                </div>
                            </div>

                            <div class="mt-5 card px-3 py-2 d--none" id="progress-bar">
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <div class="">
                                        <img width="24" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/zip.png')); ?>" alt="">
                                    </div>
                                    <div class="flex-grow-1 text-start">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                                            <span id="name_of_file" class="text-truncate fz-12"></span>
                                            <span class="text-muted fz-12" id="progress-label"><?php echo e(translate('0').'%'); ?></span>
                                        </div>
                                        <progress id="upload-progress" class="w-100" value="0" max="100"></progress>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php ($condition_one=str_replace('MB','',ini_get('upload_max_filesize'))>=20 && str_replace('MB','',ini_get('upload_max_filesize'))>=20); ?>
                        <?php ($condition_two=str_replace('MB','',ini_get('post_max_size'))>=20 && str_replace('MB','',ini_get('post_max_size'))>=20); ?>
                        <div class="col-sm-6 col-lg-5 col-xl-5 col-xxl-7">
                            <div class="pl-sm-5">
                                <h5 class="mb-3 d-flex"><?php echo e(translate('instructions')); ?></h5>
                                <ul class="pl-3 d-flex flex-column gap-2 instructions-list">
                                    <li><?php echo e(translate('maximum_file_size')); ?> 50 MB</li>
                                    <li><?php echo e(translate('have_to_upload_zip_file')); ?></li>
                                </ul>
                            </div>
                        </div>
                        <?php if($condition_one && $condition_two): ?>
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                        onclick="<?php echo e(env('APP_MODE')!='demo'?'':'call_demo()'); ?>"
                                        class="btn btn--primary px-5"
                                        id="upload-theme"><?php echo e(translate('upload')); ?>

                                </button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <!-- <div class="card mb-5 p-xl-4">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-4">
                    <div class="text-primary d-flex align-items-end gap-3 font-weight-bolder">
                        <?php echo e(translate('read_Before_Change_Theme')); ?>

                        <div class="ripple-animation" data-toggle="modal" data-target="#read_Before_Change_ThemeModal">
                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/info.svg')); ?>" class="svg" alt="">
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="read_Before_Change_ThemeModal" tabindex="-1" aria-labelledby="read_Before_Change_ThemeModal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                            <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i
                                    class="tio-clear"></i></button>
                        </div>
                        <div class="modal-body px-5 px-sm-5 pt-0 text-center">
                            <div class="row g-2 g-sm-3 mt-lg-0">
                                <div class="col-12">
                                    <div class="swiper mySwiper pb-3">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">

                                                <div class="mb-3 text-center">
                                                    <img width="75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shift.png')); ?>" alt="">
                                                </div>

                                                <h3>
                                                    <?php echo e(translate('if_you_change_from_on_theme_to_another_there_are_certain_changes_that_you_need_to_maintain_and_setup_data.')); ?>

                                                </h3>
                                                <ol class="my-5 text-start">
                                                    <li class="mb-3"><?php echo e(translate('all_the_promotional_banners_from_the_website_and_user_app_will_be_clear_once_the_theme_is_changed.')); ?><?php echo e(translate('you_have_to_input_all_the_banners_again_for_each_section')); ?></li>

                                                    <li class="mb-3"><?php echo e(translate('there_may_be_some_features_that_are_not_available_in_other_themes.')); ?><?php echo e(translate('in_these_cases_you_have_to_setup_data_for_those_features_after_changing_the_theme.')); ?></li>

                                                    <li class="mb-3"><?php echo e(translate('after_changing_any_theme_in_the_you_will_a_menu_option_with_the_menu_name.')); ?> <?php echo e(translate('Under_this_menu_you_can_setup_all_the_new_features_option_that_are_only_available_for_that_specific_theme.')); ?><?php echo e(translate('you_setup_those_data_from_there.')); ?></li>
                                                </ol>

                                            </div>
                                            <div class="swiper-slide">
                                                <div class="mb-3 text-center">
                                                    <img width="75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shift.png')); ?>" alt="">
                                                </div>

                                                <h3>
                                                    <?php echo e(translate('after_switching_the_theme_a_menu_will_appear_in_the_side_bar_with_the_theme_name_on_it')); ?>

                                                </h3>
                                                <p class="mb-5">
                                                    <?php echo e(translate('you_can_setup_theme_wise_required_data_from_there.')); ?>

                                                </p>

                                                <div class="d-flex justify-content-center align-items-center">
                                                    <img width="100"
                                                        src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/arrow-right-for-frame.png')); ?>"
                                                        alt="">
                                                    <img class="w-60"
                                                        src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/theme-dummy-frame.png')); ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
                <div class="row g-1 g-sm-2">
                    <?php $__currentLoopData = $themes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-xxl-4">
                            <div class="card theme-card h-100 <?php echo e(theme_root_path() == $key ? 'theme-active':''); ?>">
                                <!-- <div class="card-header">
                                    <h3 class="card-title">
                                        <?php echo e(ucwords(str_replace('_', ' ', $key=='default' ? 'default_theme' : $theme['name']))); ?>

                                    </h3>

                                    <div class="d-flex gap-2 gap-sm-3 align-items-center">
                                        <?php if($key!='default' && theme_root_path() != $key): ?>
                                            <button class="text-danger bg-transparent p-0 border-0" data-toggle="modal"
                                                    data-target="#deleteThemeModal_<?php echo e($key); ?>"><img
                                                    src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/delete.svg')); ?>" class="svg"
                                                    alt=""></button>
                                            <div class="modal fade" id="deleteThemeModal_<?php echo e($key); ?>" tabindex="-1"
                                                 aria-labelledby="deleteThemeModal_<?php echo e($key); ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                                                            <button
                                                                type="button"
                                                                class="btn-close border-0"
                                                                data-dismiss="modal"
                                                                aria-label="Close"
                                                            ><i class="tio-clear"></i></button>
                                                        </div>
                                                        <div class="modal-body px-4 px-sm-5 text-center">
                                                            <div class="mb-3 text-center">
                                                                <img width="75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/delete.png')); ?>" alt="">
                                                            </div>
                                                            <h3><?php echo e(translate('are_you_sure_you_want_to_delete_the_theme').'?'); ?></h3>
                                                            <p class="mb-5"><?php echo e(translate('once_you_delete').','.translate('you_will_lost_the_this_theme')); ?></p>
                                                            <div class="d-flex justify-content-center gap-3 mb-3">
                                                                <button type="button" class="fs-16 btn btn-secondary px-sm-5"
                                                                        data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                                                                <button type="submit" class="fs-16 btn btn-danger px-sm-5 theme-delete" data-dismiss="modal"
                                                                        data-key="<?php echo e($key); ?>"><?php echo e(translate('delete')); ?></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(theme_root_path() == $key): ?>
                                            <button class="c1 bg-transparent p-0 border-0">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/check.svg')); ?>" class="svg"
                                                     alt="">
                                            </button>

                                        <?php else: ?>
                                            <button class="text-muted bg-transparent p-0 border-0" data-toggle="modal"
                                                    data-target="#shiftThemeModal_<?php echo e($key); ?>">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/check.svg')); ?>" class="svg"
                                                     alt="">
                                            </button>
                                            <div class="modal fade" id="shiftThemeModal_<?php echo e($key); ?>" tabindex="-1"
                                                 aria-labelledby="shiftThemeModalLabel_<?php echo e($key); ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                                                            <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close">
                                                                <i class="tio-clear"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body px-4 px-sm-5 text-center">
                                                            <div class="mb-3 text-center">
                                                                <img width="75" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shift.png')); ?>" alt="">
                                                            </div>

                                                            <h3><?php echo e(translate('do_you_want_to_shift_in_another_theme')); ?></h3>
                                                            <p class="mb-5"><?php echo e(translate('if_you_shift_in_another_theme').','. translate('everything_will_be_rearranged')); ?>

                                                                <br class="d-none d-sm-inline"> <?php echo e(translate('according_to_theme')); ?>

                                                            </p>
                                                            <div class="d-flex justify-content-center gap-3 mb-3">
                                                                <button type="button" class="fs-16 btn btn-secondary px-sm-5"
                                                                        data-dismiss="modal"><?php echo e(translate('no')); ?>

                                                                </button>
                                                                <button type="button" class="fs-16 btn btn--primary px-sm-5 theme-publish"
                                                                        data-dismiss="modal" data-key="<?php echo e($key); ?>"><?php echo e(translate('yes')); ?>

                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div> -->

                                <div class="mt-auto p-2 p-sm-3">
                                    <!-- <div class="aspect-ration-3:2 border border-color-primary-light radius-10">
                                        <img class="img-fit radius-10" alt=""
                                             src="<?php echo e(getValidImage(path: 'resources/themes/'.$key.'/public/addon/'.$theme['image'] , type: 'backend-basic')); ?>">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="modal fade" id="InformationThemeModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
                         aria-labelledby="InformationThemeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content" id="informationModalContent">
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('admin-views.business-settings.partials.theme-activate-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    <span id="get-theme-install-route" data-action="<?php echo e(route('admin.business-settings.web-config.theme.install')); ?>"></span>
    <span id="get-theme-publish-route" data-action="<?php echo e(route('admin.business-settings.web-config.theme.publish')); ?>"></span>
    <span id="get-theme-delete-route" data-action="<?php echo e(route('admin.business-settings.web-config.theme.delete')); ?>"></span>
    <span id="get-notify-all-vendor-route-and-img-src"
          data-csrf = "<?php echo e(csrf_token()); ?>"
          data-src = "<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/notify_success.png')); ?>"
          data-action="<?php echo e(route('admin.business-settings.web-config.theme.notify-all-the-sellers')); ?>">
    </span>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/theme-setup.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/theme-setup.blade.php ENDPATH**/ ?>