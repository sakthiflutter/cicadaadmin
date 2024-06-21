<?php use Illuminate\Support\Facades\Session; ?>

<?php $__env->startSection('title', translate('payment_Method')); ?>
<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction') === "rtl" ? 'right' : 'left'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.third-party-payment-method-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($paymentGatewayPublishedStatus): ?>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-around  align-items-center">
                        <h4 class="text-danger bg-transparent m-0">
                            <i class="tio-info-outined"></i>
                            <?php echo e(translate('your_current_payment_settings_are_disabled,because_you_have_enabled_payment_gateway_addon').' '.translate('To_visit_your_currently_active_payment_gateway_settings_please_follow_the_link').'.'); ?>

                        </h4>
                        <span>
                            <a href="<?php echo e(!empty($paymentUrl) ? $paymentUrl : ''); ?>" class="btn btn-outline-primary"><i class="tio-settings mr-1"></i><?php echo e(translate('settings')); ?></a>
                        </span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row gy-3" id="payment-gateway-cards">
            <?php $__currentLoopData = $paymentGatewaysList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="card">
                        <form action="<?php echo e(route('admin.business-settings.payment-method.addon-payment-set')); ?>" method="POST"
                              id="<?php echo e($gateway->key_name); ?>-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                            <div class="card-header d-flex flex-wrap align-content-around">
                                <h5>
                                    <span class="text-uppercase"><?php echo e(str_replace('_',' ',$gateway->key_name)); ?></span>
                                </h5>
                                <?php ($additional_data = $gateway['additional_data'] != null ? json_decode($gateway['additional_data']) : []); ?>
                                <?php
                                    if ($additional_data != null){
                                        $img_path = $additional_data->gateway_image ? dynamicStorage(path: 'storage/app/public/payment_modules/gateway_image/'.$additional_data->gateway_image) : '';
                                    }else{
                                        $img_path = dynamicAsset(path: 'public/assets/back-end/img/modal/payment-methods/'.$gateway->key_name.'.png');
                                    }
                                ?>
                                <label class="switcher show-status-text">
                                    <input class="switcher_input toggle-switch-dynamic-image" type="checkbox" name="status" value="1"
                                           id="<?php echo e($gateway->key_name); ?>" <?php echo e($gateway['is_active'] == 1?'checked':''); ?>

                                           data-modal-id = "toggle-modal"
                                           data-toggle-id = "<?php echo e($gateway->key_name); ?>"
                                           data-on-image = "<?php echo e($img_path); ?>"
                                           data-off-image = "<?php echo e($img_path); ?>"
                                           data-on-title = "<?php echo e(translate('want_to_Turn_ON_')); ?><?php echo e(str_replace('_',' ',strtoupper($gateway->key_name))); ?><?php echo e(translate('_as_the_Digital_Payment_method').'?'); ?>"
                                           data-off-title = "<?php echo e(translate('want_to_Turn_OFF_')); ?><?php echo e(str_replace('_',' ',strtoupper($gateway->key_name))); ?><?php echo e(translate('_as_the_Digital_Payment_method').'?'); ?>"
                                           data-on-message = "<p><?php echo e(translate('if_enabled_customers_can_use_this_payment_method')); ?></p>"
                                           data-off-message = "<p><?php echo e(translate('if_disabled_this_payment_method_will_be_hidden_from_the_checkout_page')); ?></p>">
                                    <span class="switcher_control" data-ontitle="<?php echo e(translate('on')); ?>" data-offtitle="<?php echo e(translate('off')); ?>"></span>
                                </label>
                            </div>
                            <div class="card-body">
                                <div class="payment--gateway-img">
                                    <img class="height-80px" id="gateway-image-<?php echo e($gateway->key_name); ?>"
                                         src="<?php echo e(getValidImage(path:'storage/app/public/payment_modules/gateway_image/'.($additional_data->gateway_image ?? ''), type: 'backend-payment' )); ?>"
                                         alt="<?php echo e(translate('public')); ?>">
                                </div>
                                <input name="gateway" value="<?php echo e($gateway->key_name); ?>" class="d-none">
                                <?php ($mode = $gateway->live_values['mode']); ?>
                                <div class="form-group mb-10px" >
                                    <select class="js-example-responsive form-control" name="mode">
                                        <option value="live" <?php echo e($mode=='live'?'selected':''); ?>><?php echo e(translate('live')); ?></option>
                                        <option value="test" <?php echo e($mode=='test'?'selected':''); ?>><?php echo e(translate('test')); ?></option>
                                    </select>
                                </div>
                                <?php if($gateway->key_name === 'paystack'): ?>
                                    <?php ($skip=['gateway','mode','status','callback_url']); ?>
                                <?php else: ?>
                                    <?php ($skip=['gateway','mode','status']); ?>
                                <?php endif; ?>
                                <?php $__currentLoopData = $gateway->live_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gatewayKey => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!in_array($gatewayKey , $skip)): ?>
                                        <div class="form-group mb-10px">
                                            <label for="exampleFormControlInput1"
                                                   class="form-label"><?php echo e(ucwords(str_replace('_',' ',$gatewayKey))); ?>

                                                   <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control"
                                                   name="<?php echo e($gatewayKey); ?>"
                                                   placeholder="<?php echo e(ucwords(str_replace('_',' ',$gatewayKey))); ?> *"
                                                   value="<?php echo e(env('APP_ENV')=='demo'?'':$value); ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group mb-10px" >
                                    <label for="exampleFormControlInput1"
                                           class="form-label"><?php echo e(translate('payment_gateway_title')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"
                                           name="gateway_title"
                                           placeholder="<?php echo e(translate('payment_gateway_title')); ?>"
                                           value="<?php echo e($additional_data != null ? $additional_data->gateway_title : ''); ?>" required>
                                </div>

                                <div class="form-group mb-10px" >
                                    <label for="exampleFormControlInput1"
                                           class="form-label text-capitalize"><?php echo e(translate('choose_logo')); ?> </label>
                                    <input type="file" class="form-control image-input" name="gateway_image" accept=".jpg, .png, .jpeg|image/*" data-image-id="gateway-image-<?php echo e($gateway->key_name); ?>" >
                                </div>
                                <div class="text-right mb-20px">
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
        <?php if($paymentGatewayPublishedStatus): ?>
            let paymentGatewayCards = $('#payment-gateway-cards');
            paymentGatewayCards.find('input').each(function () {
                $(this).attr('disabled', true);
            });
            paymentGatewayCards.find('select').each(function () {
                $(this).attr('disabled', true);
            });
            paymentGatewayCards.find('.switcher_input').each(function () {
                $(this).removeAttr('checked', true);
            });
            paymentGatewayCards.find('button').each(function () {
                $(this).attr('disabled', true);
            });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/payment-method/index.blade.php ENDPATH**/ ?>