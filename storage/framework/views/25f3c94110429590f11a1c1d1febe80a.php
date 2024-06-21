<?php
    use App\Enums\ViewPaths\Admin\BusinessSettings;
?>
<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/'.BusinessSettings::OTP_SETUP[URI]) ? 'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.otp-setup')); ?>"><?php echo e(translate('OTP_&_Login_Attempts')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/web-config/'.BusinessSettings::LOGIN_URL_SETUP[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.web-config.login-url-setup')); ?>"><?php echo e(translate('login_Url')); ?></a>
        </li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/login-settings-menu.blade.php ENDPATH**/ ?>