<?php $__env->startSection('title', translate('cookie_settings')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_setup')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('admin.business-settings.cookie-settings')); ?>" method="post"
              enctype="multipart/form-data" id="update-settings">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="border-bottom py-3 px-4">
                    <div class="d-flex justify-content-between align-items-center gap-10">
                        <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/cookie.png')); ?>" alt="">
                            <?php echo e(translate('cookie_settings').':'); ?>

                        </h5>
                        <label class="switcher" for="cookie-setting-status">
                            <input type="checkbox" class="switcher_input toggle-switch-message"  value="1" name="status"
                                   id="cookie-setting-status" <?php echo e(isset($cookieSetting) && $cookieSetting['status']==1?'checked':''); ?>

                                   data-modal-id = "toggle-modal"
                                   data-toggle-id = "cookie-setting-status"
                                   data-on-image = "cookie-on.png"
                                   data-off-image = "cookie-off.png"
                                   data-on-title = "<?php echo e(translate('by_Turning_OFF_Cookie_Settings')); ?>"
                                   data-off-title = "<?php echo e(translate('by_Turning_ON_Cookie_Settings')); ?>"
                                   data-on-message = "<p><?php echo e(translate('if_you_disable_it_customers_cannot_see_Cookie_Settings_in_frontend')); ?></p>"
                                   data-off-message = "<p><?php echo e(translate('if_you_enable_it_customers_will_see_Cookie_Settings_in_frontend')); ?></p>">
                            <span class="switcher_control"></span>
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="loyalty-point-section" id="cookie_setting_status_section">
                        <div class="form-group">
                            <label class="title-color d-flex"
                                    for="loyalty_point_exchange_rate"><?php echo e(translate('cookie_text')); ?></label>
                            <textarea name="cookie_text" id="" cols="30" rows="6" class="form-control"><?php echo e(isset($cookieSetting) ? $cookieSetting['cookie_text'] : ''); ?></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="submit" class="btn px-5 btn--primary"><?php echo e(translate('save')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/cookie-settings.blade.php ENDPATH**/ ?>