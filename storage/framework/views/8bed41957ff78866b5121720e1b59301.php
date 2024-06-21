<?php
    use App\Enums\ViewPaths\Admin\BusinessSettings;
    use App\Enums\ViewPaths\Admin\Currency;
    use App\Enums\ViewPaths\Admin\DatabaseSetting;
    use App\Enums\ViewPaths\Admin\EnvironmentSettings;
    use App\Enums\ViewPaths\Admin\SiteMap;
    use App\Enums\ViewPaths\Admin\SoftwareUpdate;
?>
<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/'.EnvironmentSettings::VIEW[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.web-config.environment-setup')); ?>"><?php echo e(translate('Environment_Settings')); ?></a>
        </li>

        <li class="<?php echo e(Request::is('admin/business-settings/web-config/'.BusinessSettings::APP_SETTINGS[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.web-config.app-settings')); ?>"><?php echo e(translate('app_Settings')); ?></a>
        </li>

        <li class="<?php echo e(Request::is('admin/system-settings/'.SoftwareUpdate::VIEW[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.system-settings.software-update')); ?>"><?php echo e(translate('software_Update')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/language') ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.language.index')); ?>"><?php echo e(translate('language')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/currency/'.Currency::LIST[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.currency.view')); ?>"><?php echo e(translate('Currency')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.BusinessSettings::COOKIE_SETTINGS[URI]) ? 'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.cookie-settings')); ?>"><?php echo e(translate('cookies')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/'.DatabaseSetting::VIEW[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.web-config.db-index')); ?>"><?php echo e(translate('Clean_Database')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/'.SiteMap::VIEW[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.web-config.mysitemap')); ?>"><?php echo e(translate('site_Map')); ?></a>
        </li>

    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/system-settings-inline-menu.blade.php ENDPATH**/ ?>