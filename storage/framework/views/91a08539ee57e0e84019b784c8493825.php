<?php $__env->startSection('title', translate('generate_Sitemap')); ?>

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
        <div class="col-md-12">
            <div class="card">
                <div class="border-bottom px-4 py-3">
                    <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/sitemap.png')); ?>" alt="">
                        <?php echo e(translate('generate_sitemap')); ?>

                    </h5>
                </div>
                <div class="card-body text-center">
                    <a href="<?php echo e(route('admin.business-settings.web-config.mysitemap-download')); ?>" class="btn btn--primary text-capitalize px-4">
                        <?php echo e(translate('download_generate_sitemap')); ?>

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/site-map/view.blade.php ENDPATH**/ ?>