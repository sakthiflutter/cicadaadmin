<div class="footer">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <p class="font-size-sm mb-0 title-color text-center text-lg-left">
                &copy; <?php echo e(getWebConfig(name: 'company_name').'.'); ?> <span
                        class="d-none d-sm-inline-block"><?php echo e(getWebConfig('company_copyright_text')); ?></span>
            </p>
        </div>
        <div class="col-lg-8">
            <div class="d-flex justify-content-center justify-content-lg-end">
                <ul class="list-inline list-footer-icon justify-content-center justify-content-lg-start mb-0">
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.business-settings.web-config.index')); ?>">
                            <i class="tio-settings"></i>
                            <?php echo e(translate('business_Setup')); ?>

                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="list-separator-link"
                           href="<?php echo e(route('admin.profile.update',auth('admin')->user()->id)); ?>">
                            <i class="tio-user"></i>
                            <?php echo e(translate('profile')); ?>

                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="list-separator-link" href="<?php echo e(route('admin.dashboard.index')); ?>">
                            <i class="tio-home-outlined"></i>
                            <?php echo e(translate('home')); ?>

                        </a>
                    </li>
                    <li class="list-inline-item">
                        <label class="badge badge-soft-version text-capitalize">
                            <?php echo e(translate('software_version').' '.env('SOFTWARE_VERSION')); ?>

                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/partials/_footer.blade.php ENDPATH**/ ?>