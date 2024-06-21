<?php $__env->startSection('title', translate('SMS_Module_Setup')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row gy-3" id="sms-gateway-cards">
            <div class="col-12">
                <div class="mt-2 valley-alert">
                    <img width="16" class="mt-1" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                         alt="">
                    <p class="mb-0">
                        <strong><?php echo e(translate('NB').':'); ?></strong>
                        <?php echo e(translate('Please_re-check_if_you’ve_put_all_the_data_correctly_or_contact_your_SMS_gateway_provider_for_assistance').'.'); ?>

                    </p>
                </div>
            </div>
            <?php if($paymentGatewayPublishedStatus): ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-around align-items-center">
                            <h4 class="text-danger bg-transparent m-0">
                                <i class="tio-info-outined"></i>
                                <?php echo e(translate('your_current_SMS_settings_are_disabled_because_you_have_enabled_sms_gateway_addon_To_visit_your_currently_active_sms_gateway_settings_please_follow_the_link')); ?>

                            </h4>
                            <span>
                            <a href="<?php echo e(!empty($paymentUrl) ? $paymentUrl : ''); ?>" class="btn btn-outline-primary"><i class="tio-settings mr-1"></i><?php echo e(translate('settings')); ?></a>
                        </span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php $__currentLoopData = $smsGateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $smsConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="card h-100">
                        <form action="<?php echo e(route('admin.business-settings.addon-sms-set')); ?>" method="POST"
                              id="<?php echo e($smsConfig['key_name']); ?>-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                            <div class="card-header d-flex flex-wrap align-content-around">
                                <h5>
                                    <span class="text-uppercase"><?php echo e(str_replace('_', ' ', $smsConfig['key_name'])); ?></span>
                                </h5>

                                <?php
                                    $imgPath = 'sms/'.$smsConfig['key_name'].'.png';
                                ?>
                                <label class="switcher show-status-text">
                                    <input class="switcher_input toggle-switch-message" type="checkbox" name="status" value="1"
                                           id="<?php echo e($smsConfig['key_name']); ?>" <?php echo e($smsConfig['is_active']==1?'checked':''); ?>

                                           data-modal-id = "toggle-status-modal"
                                           data-toggle-id = "<?php echo e($smsConfig['key_name']); ?>"
                                           data-on-image = "<?php echo e($imgPath); ?>"
                                           data-off-image = "<?php echo e($imgPath); ?>"
                                           data-on-title = "<?php echo e(translate('want_to_Turn_ON_').' '.ucwords(str_replace('_',' ',$smsConfig['key_name'])).' '.translate('_as_the_SMS_Gateway').'?'); ?>"
                                           data-off-title = "<?php echo e(translate('want_to_Turn_OFF_').' '.ucwords(str_replace('_',' ',$smsConfig['key_name'])).' '.translate('_as_the_SMS_Gateway').'?'); ?>"
                                           data-on-message = "<p><?php echo e(translate('if_enabled_system_can_use_this_SMS_Gateway')); ?></p>"
                                           data-off-message = "<p><?php echo e(translate('if_disabled_system_cannot_use_this_SMS_Gateway')); ?></p>">
                                    <span class="switcher_control" data-ontitle="<?php echo e(translate('on')); ?>" data-offtitle="<?php echo e(translate('off')); ?>"></span>
                                </label>
                            </div>
                            <div class="card-body">
                                <input name="gateway" value="<?php echo e($smsConfig['key_name']); ?>" class="d-none">
                                <input name="mode" value="live" class="d-none">
                                <?php ($skip=['gateway','mode','status']); ?>
                                <?php $__currentLoopData = $smsConfig['live_values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyName => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!in_array($keyName, $skip)): ?>
                                        <div class="form-group mb-10px mt-20px">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label"><?php echo e(ucwords(str_replace('_',' ',$keyName))); ?>

                                                   <span class="text-danger">*</span>
                                                </label>
                                            <input type="text" class="form-control"
                                                   name="<?php echo e($keyName); ?>"
                                                   placeholder="<?php echo e(ucwords(str_replace('_',' ',$keyName))); ?>"
                                                   value="<?php echo e(env('APP_ENV')=='demo'?'':$value); ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="text-right mt-20px">
                                    <button type="submit" class="btn btn-primary px-5"><?php echo e(translate('save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        <?php if($paymentGatewayPublishedStatus == 1): ?>
            let smsGatewayCards = $('#sms-gateway-cards');
            smsGatewayCards.find('input').each(function () {
                $(this).attr('disabled', true);
            });
            smsGatewayCards.find('select').each(function () {
                $(this).attr('disabled', true);
            });
            smsGatewayCards.find('.switcher_input').each(function () {
                $(this).removeAttr('checked', true);
            });
            smsGatewayCards.find('button').each(function () {
                $(this).attr('disabled', true);
            });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/sms-index.blade.php ENDPATH**/ ?>