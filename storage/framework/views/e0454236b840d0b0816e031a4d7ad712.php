<?php use App\Enums\ViewPaths\Admin\FeaturesSection;use App\Enums\ViewPaths\Admin\Pages; ?>
<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="<?php echo e(Request::is('admin/business-settings/'.Pages::TERMS_CONDITION[URI]) ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.terms-condition')); ?>"><?php echo e(translate('terms_&_Conditions')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.Pages::PRIVACY_POLICY[URI]) ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.privacy-policy')); ?>"><?php echo e(translate('privacy_Policy')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.Pages::VIEW[URI].'/refund-policy') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.page',['refund-policy'])); ?>"><?php echo e(translate('refund_Policy')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.Pages::VIEW[URI].'/return-policy') ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.page',['return-policy'])); ?>"><?php echo e(translate('return_Policy')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.Pages::VIEW[URI].'/cancellation-policy') ?'active':''); ?>">
            <a href="<?php echo e(route('admin.business-settings.page',['cancellation-policy'])); ?>"><?php echo e(translate('cancellation_Policy')); ?></a>
        </li>
        <li class="<?php echo e(Request::is('admin/business-settings/'.Pages::ABOUT_US[URI]) ?'active':''); ?>"><a
                href="<?php echo e(route('admin.business-settings.about-us')); ?>"><?php echo e(translate('about_Us')); ?></a></li>
        <li class="<?php echo e(Request::is('admin/helpTopic/'.\App\Enums\ViewPaths\Admin\HelpTopic::LIST[URI]) ?'active':''); ?>">
            <a href="<?php echo e(route('admin.helpTopic.list')); ?>"><?php echo e(translate('FAQ')); ?></a></li>

        <?php if(getWebConfig(name: 'react_setup')['status'] || theme_root_path() == 'theme_fashion'): ?>
            <li class="<?php echo e(Request::is('admin/business-settings/'.FeaturesSection::VIEW[URI]) ?'active':''); ?>">
                <a href="<?php echo e(route('admin.business-settings.features-section')); ?>"><?php echo e(translate('features_Section')); ?></a>
            </li>
        <?php endif; ?>

        <?php if(theme_root_path() == 'default'): ?>
            <li class="<?php echo e(Request::is('admin/business-settings/'.FeaturesSection::COMPANY_RELIABILITY[URI]) ?'active':''); ?>">
                <a href="<?php echo e(route('admin.business-settings.company-reliability')); ?>"
                   class="text-capitalize"><?php echo e(translate('company_reliability')); ?></a></li>
        <?php endif; ?>

    </ul>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/pages-inline-menu.blade.php ENDPATH**/ ?>