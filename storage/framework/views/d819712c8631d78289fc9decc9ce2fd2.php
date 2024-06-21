<?php
    use App\Enums\ViewPaths\Admin\ThemeSetup;
?>
<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/theme/'.ThemeSetup::VIEW[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.web-config.theme.setup')); ?>"><?php echo e(translate('theme_Setup')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/addon') ?'active':''); ?>">
            <a href="<?php echo e(route('admin.addon.index')); ?>"><?php echo e(translate('system_Addons')); ?></a>
        </li>

    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/theme-and-addon-menu.blade.php ENDPATH**/ ?>