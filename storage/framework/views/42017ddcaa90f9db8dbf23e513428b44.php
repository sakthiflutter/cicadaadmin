<?php
    use Illuminate\Support\Facades\Session;
?>


<?php $__env->startSection('title', translate('login_Url_Setup')); ?>

<?php $__env->startSection('content'); ?>
<?php ($direction = Session::get('direction')); ?>
<div class="content container-fluid">
    <div class="mb-4 pb-2">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2 text-capitalize">
            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
            <?php echo e(translate('system_settings')); ?>

        </h2>
    </div>
    <?php echo $__env->make('admin-views.business-settings.login-settings-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row my-3 gy-3">
        <div class="col-md-12">
            <form action="<?php echo e(route('admin.business-settings.web-config.login-url-setup')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-capitalize mb-0">
                            <?php echo e(translate('admin_Login_Page')); ?>

                        </h5>
                    </div>
                    <div class="card-body"
                        style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="mb-3">
                            <label class="form-label">
                                <?php echo e(translate('admin_login_url')); ?>

                                <span class="input-label-secondary text--title" data-toggle="tooltip"
                                    data-placement="right"
                                    data-original-title="<?php echo e(translate('add_dynamic_url_to_secure_admin_login_access').'.'); ?>">
                                    <i class="tio-info-outined"></i>
                                </span>
                            </label>
                            <?php ($adminLoginUrl = getWebConfig('admin_login_url')); ?>
                            <div class="input-group mb-3">
                                <span class="input-group-text radius-0 border-right-0"><?php echo e(url('/').'/login/'); ?></span>
                                <input type="text" class="form-control" name="url" value="<?php echo e($adminLoginUrl); ?>">
                                <input type="hidden" class="form-control" name="type" value="admin_login_url">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="submit"
                                class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <form action="<?php echo e(route('admin.business-settings.web-config.login-url-setup')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="text-capitalize mb-0">
                            <?php echo e(translate('employee_Login_Page')); ?>

                        </h5>
                    </div>
                    <div class="card-body"
                        style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="mb-3">
                            <label class="form-label">
                                <?php echo e(translate('employee_login_url')); ?>

                                <span class="input-label-secondary text--title" data-toggle="tooltip"
                                    data-placement="right"
                                    data-original-title="<?php echo e(translate('Add_dynamic_url_to_secure_employee_login_access').'.'); ?>">
                                    <i class="tio-info-outined"></i>
                                </span>
                            </label>
                            <?php ($employeeLoginUrl = getWebConfig('employee_login_url')); ?>
                            <div class="input-group mb-3">
                                <span class="input-group-text radius-0 border-right-0"><?php echo e(url('/').'/login/'); ?></span>
                                <input type="text" class="form-control" name="url" value="<?php echo e($employeeLoginUrl); ?>">
                                <input type="hidden" class="form-control" name="type" value="employee_login_url">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="submit"
                                class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/login-url-setup.blade.php ENDPATH**/ ?>