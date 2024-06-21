<?php $__env->startSection('title', translate('OTP_setup')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_setup')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.login-settings-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('admin.business-settings.otp-setup')); ?>" method="post"
              enctype="multipart/form-data" id="update-settings">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center gap-2">
                        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/otp.png')); ?>" alt="">
                        <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2"><?php echo e(translate('OTP_&_login_settings')); ?></h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="maximum_otp_hit"><?php echo e(translate('maximum_OTP_hit')); ?>

                                    <i class="tio-info-outined" data-toggle="tooltip" data-placement="top"
                                       title="<?php echo e(translate('set_how_many_times_a_user_can_hit_the_wrong_OTPs.').'.'.translate('after_reaching_this_limit_the_user_will_be_blocked_for_a_time')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" value="<?php echo e($maximumOtpHit); ?>" name="maximum_otp_hit" class="form-control"  placeholder="<?php echo e(translate('ex').':'.'5'); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="otp_resend_time"><?php echo e(translate('OTP_resend_time_')); ?>

                                    <small>(<?php echo e(translate('sec')); ?>)</small>
                                    <i class="tio-info-outined"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="<?php echo e(translate('set_the_time_for_requesting_a_new_OTP')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" step="0.01" value="<?php echo e($otpResendTime); ?>"
                                       name="otp_resend_time" class="form-control"  placeholder="<?php echo e(translate('ex: 30 ')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="temporary_block_time"><?php echo e(translate('temporary_block_time')); ?>

                                    <small>(<?php echo e(translate('sec')); ?>)</small>
                                    <i class="tio-info-outined" data-toggle="tooltip" data-placement="top"
                                       title="<?php echo e(translate('Within_this_time_users_can_not_make_OTP_requests_again')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" value="<?php echo e($temporaryBlockTime); ?>" step="0.01"
                                       name="temporary_block_time" class="form-control"  placeholder="<?php echo e(translate('ex: 120')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="maximum_otp_hit"><?php echo e(translate('maximum Login hit')); ?>

                                    <i class="tio-info-outined" data-toggle="tooltip" data-placement="top"
                                       title="<?php echo e(translate('set_the_maximum_unsuccessful_login_attempts_users_can_make_using_wrong_passwords.')); ?> <?php echo e(translate('after_reaching_this_limit_they_will_be_blocked_for_a_time')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" value="<?php echo e($maximumLoginHit); ?>" placeholder="<?php echo e(translate('ex: 5')); ?>"
                                       name="maximum_login_hit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="temporary_block_time"><?php echo e(translate('temporary_login_block_time')); ?>

                                    <small>(<?php echo e(translate('sec')); ?>)</small>
                                    <i class="tio-info-outined" data-toggle="tooltip" data-placement="top"
                                       title="<?php echo e(translate('set_a_time_duration_during_which_users_cannot_log_in_after_reaching_the_Maximum_Login_Hit_limit')); ?>">
                                    </i>
                                </label>
                                <input type="number" min="0" step="0.01" value="<?php echo e($temporaryLoginBlockTime); ?>" placeholder="<?php echo e(translate('ex').':'.'1210'); ?>"
                                       name="temporary_login_block_time" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <button type="reset" class="btn btn-secondary px-5"><?php echo e(translate('reset')); ?></button>
                        <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" class="btn btn--primary px-5 <?php echo e(env('APP_MODE') != 'demo'?'':'call-demo'); ?>">
                            <?php echo e(translate('save')); ?>

                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/otp-setup.blade.php ENDPATH**/ ?>