<?php
    use App\Enums\ViewPaths\Admin\Recaptcha;
    use App\Enums\ViewPaths\Admin\SMSModule;
    use App\Enums\ViewPaths\Admin\SocialMediaChat;
    use App\Enums\ViewPaths\Admin\SocialLoginSettings;
    use App\Enums\ViewPaths\Admin\BusinessSettings;
?>
<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/social-media-chat/'.SocialMediaChat::VIEW[URI]) ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.social-media-chat.view')); ?>"><?php echo e(translate('social_media_chat')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/social-login/'.SocialLoginSettings::VIEW[URI]) ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.social-login.view')); ?>"><?php echo e(translate('social_media_login')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/mail') ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.business-settings.mail.index')); ?>"><?php echo e(translate('mail_config')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.SMSModule::VIEW[URI]) ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.business-settings.sms-module')); ?>"><?php echo e(translate('SMS_config')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.Recaptcha::VIEW[URI]) ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.business-settings.captcha')); ?>"><?php echo e(translate('recaptcha')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/map-api') ?'active':''); ?>"><a class="text-capitalize" href="<?php echo e(route('admin.business-settings.map-api')); ?>"><?php echo e(translate('google_map_APIs')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.BusinessSettings::ANALYTICS_INDEX[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.analytics-index')); ?>"><?php echo e(translate('Analytic_Scripts')); ?></a>
        </li>
    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/third-party-inline-menu.blade.php ENDPATH**/ ?>