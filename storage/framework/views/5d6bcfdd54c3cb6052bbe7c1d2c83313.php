<?php $__env->startSection('title', translate('react_site_setup')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/brands/react.svg')); ?>" width="25" alt="react">
                <?php echo e(translate('react_site_setup')); ?>

            </h2>
        </div>
        <form action="<?php echo e(route('admin.react.activation')); ?>" method="post"
              enctype="multipart/form-data" id="update-settings">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="maximum_otp_hit"><?php echo e(translate('react_license_code')); ?></label>
                                <input type="text" value="<?php echo e($reactData ? $reactData['react_license_code'] : ''); ?>" name="react_license_code" class="form-control"  placeholder="<?php echo e(translate('react_license_code')); ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label class="input-label" for="otp_resend_time"><?php echo e(translate('react_domain')); ?></label>
                                <input type="text" min="0" value="<?php echo e($reactData ? $reactData['react_domain'] : ''); ?>" name="react_domain" class="form-control"  placeholder="<?php echo e(translate('react_domain')); ?>" required>
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/react-settings/index.blade.php ENDPATH**/ ?>