<?php $__env->startSection('title', translate('software_update')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_setup')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="border-bottom px-4 py-3">
                        <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/environment.png')); ?>" alt="">
                            <?php echo e(translate('upload_the_updated_file')); ?>

                            <span class="ml-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(translate('this_module_will_run_for_updates_after_version_13.1')); ?>">
                                <img class="info-img w-200" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                            </span>
                        </h5>
                    </div>

                    <div class="card-body">
                        <form action="<?php echo e(route('admin.system-settings.software-update')); ?>" method="post"
                              enctype="multipart/form-data" id="software-update-form_">
                            <?php echo csrf_field(); ?>
                            <div class="progress mb-5 d-none height-30px">
                                <div class="progress-bar progress-bar-animated"><?php echo e(translate('0').'%'); ?></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="purchase_code"><?php echo e(translate('codecanyon_username')); ?></label>
                                        <input type="text" class="form-control" id="username" value="<?php echo e(env('BUYER_USERNAME')); ?>"
                                               name="username" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="purchase_code"><?php echo e(translate('purchase_code')); ?></label>
                                        <input type="text" class="form-control" id="purchase_key"
                                               value="<?php echo e(env('PURCHASE_CODE')); ?>" name="purchase_key" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="custom-file text-left">
                                        <input type="file" name="update_file" class="custom-file-input form-control"
                                               accept=".zip" required>
                                        <label class="custom-file-label"
                                               for="customFileUpload"><?php echo e(translate('choose_updated_file')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php ($conditionOne=str_replace('M','',ini_get('upload_max_filesize'))>=180 && str_replace('M','',ini_get('upload_max_filesize'))>=180); ?>
                            <?php ($conditionTwo=str_replace('M','',ini_get('post_max_size'))>=200 && str_replace('M','',ini_get('post_max_size'))>=200); ?>
                            <?php if($conditionOne && $conditionTwo): ?>
                                <div class="d-flex align-items-center justify-content-end flex-wrap gap-10">
                                    <button type="submit" class="btn btn--primary px-4">
                                        <?php echo e(translate('upload_&_update')); ?>

                                    </button>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-soft-<?php echo e(($conditionOne)?'success':'danger'); ?>" role="alert">
                                            <?php echo e('1.'.' '.translate('please_make_sure').' '.','.' '.translate('your_server_php').' '.','.' '.'"'.translate('upload_max_filesize').'"'.' '.translate('value_is_greater_or_equal_to').' '.'180M'.'.'.translate('current_value_is').'-'.ini_get('upload_max_filesize')); ?>

                                        </div>
                                        <div class="alert alert-soft-<?php echo e(($conditionTwo)?'success':'danger'); ?>" role="alert">
                                            <?php echo e('2.'.' '.translate('please_make_sure').' '.','.' '.translate('your_server_php').' '.','.' '.'"'.translate('post_max_size').'"'.' '.translate('value_is_greater_or_equal_to').' '.'200M'.'.'.translate('current_value_is').'-'.ini_get('post_max_size')); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="get-software-update-route" data-action="<?php echo e(route('admin.system-settings.software-update')); ?>" data-redirect-route="<?php echo e(route('home')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/business-setting.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/system-settings/software-update.blade.php ENDPATH**/ ?>