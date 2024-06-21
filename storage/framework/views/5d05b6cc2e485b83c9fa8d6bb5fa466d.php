<?php $__env->startSection('title', translate('analytics_script')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: '/public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row gy-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <?php ($pixel_analytics = getWebConfig(name: 'pixel_analytics')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.analytics-update'):'javascript:'); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('pixel_analytics_your_pixel_id')); ?></label>
                                <input type="hidden" name="type" value="pixel_analytics">
                                <textarea type="text" placeholder="<?php echo e(translate('pixel_analytics_your_pixel_id_from_facebook')); ?>" class="form-control" name="value" ><?php echo e(env('APP_MODE')!='demo'?$pixel_analytics??'':''); ?></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" class="btn btn--primary px-5 <?php echo e(env('APP_MODE') !='demo'?'' : 'call-demo'); ?>"><?php echo e(translate('save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <?php ($google_tag_manager_id = getWebConfig(name: 'google_tag_manager_id')); ?>
                        <form action="<?php echo e(env('APP_MODE')!='demo'?route('admin.business-settings.analytics-update'):'javascript:'); ?>" method="post"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('google_tag_manager_id')); ?></label>
                                <input type="hidden" name="type" value="google_tag_manager_id">
                                <textarea type="text" placeholder="<?php echo e(translate('google_tag_manager_script_id_from_google')); ?>" class="form-control" name="value" ><?php echo e(env('APP_MODE')!='demo'?$google_tag_manager_id??'':''); ?></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"  class="btn btn--primary px-5 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/analytics/index.blade.php ENDPATH**/ ?>