<?php $__env->startSection('title', translate('choose_Payment_Method')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/payment.css')); ?>">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container pb-5 mb-2 mb-md-4 rtl px-0 px-md-3 text-align-direction">
        <div class="row mx-max-md-0">
            <div class="col-md-12 mb-3 pt-3 px-max-md-0">
                <div class="feature_header px-3 px-md-0">
                    <span><?php echo e(translate('payment_method')); ?></span>
                </div>
            </div>
            <section class="col-lg-8 px-max-md-0">
                <div class="checkout_details">
                    <div class="px-3 px-md-0">
                        <?php echo $__env->make('web-views.partials._checkout-steps',['step'=>3], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">

                            <div class="gap-2 mb-4">
                                <div class="d-flex justify-content-between">
                                    <h4 class="mb-2 text-nowrap"><?php echo e(translate('payment_method')); ?></h4>
                                    <a href="<?php echo e(route('checkout-details')); ?>" class="d-flex align-items-center gap-2 text-primary font-weight-bold text-nowrap">
                                        <i class="tio-back-ui fs-12 text-capitalize"></i>
                                        <?php echo e(translate('go_back')); ?>

                                    </a>
                                </div>
                                <p class="text-capitalize mt-2"><?php echo e(translate('select_a_payment_method_to_proceed')); ?></p>
                            </div>
                            <?php if($cashOnDeliveryBtnShow && $cash_on_delivery['status'] || $digital_payment['status']==1): ?>
                                <div class="d-flex flex-wrap gap-3 mb-5">
                                    <?php if($cashOnDeliveryBtnShow && $cash_on_delivery['status']): ?>
                                        <div id="cod-for-cart">
                                            <div class="card cursor-pointer">
                                                <form action="<?php echo e(route('checkout-complete')); ?>" method="get" class="needs-validation" id="cash_on_delivery_form">
                                                    <label class="m-0">
                                                        <input type="hidden" name="payment_method" value="cash_on_delivery">
                                                        <span class="btn btn-block click-if-alone d-flex gap-2 align-items-center cursor-pointer">
                                                            <input type="radio" id="cash_on_delivery" class="custom-radio">
                                                            <img width="20" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/money.png')); ?>" alt="">
                                                            <span class="fs-12"><?php echo e(translate('cash_on_Delivery')); ?></span>
                                                        </span>
                                                    </label>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($digital_payment['status']==1): ?>
                                        <?php if(auth('customer')->check() && $wallet_status==1): ?>
                                            <div>
                                                <div class="card cursor-pointer">
                                                    <button class="btn btn-block click-if-alone d-flex gap-2 align-items-center" type="submit"
                                                        data-toggle="modal" data-target="#wallet_submit_button">
                                                        <img width="20" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/wallet-sm.png')); ?>" alt=""/>
                                                        <span class="fs-12"><?php echo e(translate('pay_via_Wallet')); ?></span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="d-flex flex-wrap gap-2 align-items-center mb-4 ">
                                <h5 class="mb-0 text-capitalize"><?php echo e(translate('pay_via_online')); ?></h5>
                                <span class="fs-10 text-capitalize mt-1">(<?php echo e(translate('faster_&_secure_way_to_pay')); ?>)</span>
                            </div>

                            <?php if($digital_payment['status']==1): ?>
                                <div class="row gx-4 mb-4">
                                <?php $__currentLoopData = $payment_gateways_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment_gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6">
                                        <form method="post" class="digital_payment" id="<?php echo e(($payment_gateway->key_name)); ?>_form" action="<?php echo e(route('customer.web-payment-request')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="user_id" value="<?php echo e(auth('customer')->check() ? auth('customer')->user()->id : session('guest_id')); ?>">
                                            <input type="hidden" name="customer_id" value="<?php echo e(auth('customer')->check() ? auth('customer')->user()->id : session('guest_id')); ?>">
                                            <input type="hidden" name="payment_method" value="<?php echo e($payment_gateway->key_name); ?>">
                                            <input type="hidden" name="payment_platform" value="web">

                                            <?php if($payment_gateway->mode == 'live' && isset($payment_gateway->live_values['callback_url'])): ?>
                                                <input type="hidden" name="callback" value="<?php echo e($payment_gateway->live_values['callback_url']); ?>">
                                            <?php elseif($payment_gateway->mode == 'test' && isset($payment_gateway->test_values['callback_url'])): ?>
                                                <input type="hidden" name="callback" value="<?php echo e($payment_gateway->test_values['callback_url']); ?>">
                                            <?php else: ?>
                                                <input type="hidden" name="callback" value="">
                                            <?php endif; ?>

                                            <input type="hidden" name="external_redirect_link" value="<?php echo e(url('/').'/web-payment'); ?>">
                                            <label class="d-flex align-items-center gap-2 mb-0 form-check py-2 cursor-pointer">
                                                <input type="radio" id="<?php echo e(($payment_gateway->key_name)); ?>" name="online_payment" class="form-check-input custom-radio" value="<?php echo e(($payment_gateway->key_name)); ?>">
                                                <img width="30"
                                                src="<?php echo e(dynamicStorage(path: 'storage/app/public/payment_modules/gateway_image')); ?>/<?php echo e($payment_gateway->additional_data && (json_decode($payment_gateway->additional_data)->gateway_image) != null ? (json_decode($payment_gateway->additional_data)->gateway_image) : ''); ?>" alt="">
                                                <span class="text-capitalize form-check-label">
                                                    <?php if($payment_gateway->additional_data && json_decode($payment_gateway->additional_data)->gateway_title != null): ?>
                                                        <?php echo e(json_decode($payment_gateway->additional_data)->gateway_title); ?>

                                                    <?php else: ?>
                                                        <?php echo e(str_replace('_', ' ',$payment_gateway->key_name)); ?>

                                                    <?php endif; ?>

                                                </span>
                                            </label>
                                        </form>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if(isset($offline_payment) && $offline_payment['status'] && count($offline_payment_methods)>0): ?>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="bg-primary-light rounded p-4">
                                        <div class="d-flex justify-content-between align-items-center gap-2 position-relative">
                                            <span class="d-flex align-items-center gap-3">
                                                <input type="radio" id="pay_offline" name="online_payment" class="custom-radio" value="pay_offline">
                                                <label for="pay_offline" class="cursor-pointer d-flex align-items-center gap-2 mb-0 text-capitalize"><?php echo e(translate('pay_offline')); ?></label>
                                            </span>

                                            <div data-toggle="tooltip" title="<?php echo e(translate('for_offline_payment_options,_please_follow_the_steps_below')); ?>">
                                                <i class="tio-info text-primary"></i>
                                            </div>
                                        </div>

                                        <div class="mt-4 pay_offline_card d-none">
                                            <div class="d-flex flex-wrap gap-3">
                                                <?php $__currentLoopData = $offline_payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <button type="button" class="btn btn-light offline_payment_button text-capitalize" id="<?php echo e($method->id); ?>"><?php echo e($method->method_name); ?></button>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php if(isset($offline_payment) && $offline_payment['status']): ?>
        <div class="modal fade" id="selectPaymentMethod" tabindex="-1" aria-labelledby="selectPaymentMethodLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('offline-payment-checkout-complete')); ?>" method="post" class="needs-validation">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex justify-content-center mb-4">
                                <img width="52" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/select-payment-method.png')); ?>" alt="">
                            </div>
                            <p class="fs-14 text-center"><?php echo e(translate('pay_your_bill_using_any_of_the_payment_method_below_and_input_the_required_information_in_the_form')); ?></p>

                            <select class="form-control mx-xl-5 max-width-661" id="pay_offline_method" name="payment_by" required>
                                <option value="" disabled><?php echo e(translate('select_Payment_Method')); ?></option>
                                <?php $__currentLoopData = $offline_payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($method->id); ?>"><?php echo e(translate('payment_Method')); ?> : <?php echo e($method->method_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="" id="payment_method_field">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(auth('customer')->check() && $wallet_status==1): ?>
      <div class="modal fade" id="wallet_submit_button" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(translate('wallet_payment')); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php ($customer_balance = auth('customer')->user()->wallet_balance); ?>
            <?php ($remain_balance = $customer_balance - $amount); ?>
            <form action="<?php echo e(route('checkout-complete-wallet')); ?>" method="get" class="needs-validation">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for=""><?php echo e(translate('your_current_balance')); ?></label>
                            <input class="form-control" type="text" value="<?php echo e(webCurrencyConverter(amount: $customer_balance ?? 0)); ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for=""><?php echo e(translate('order_amount')); ?></label>
                            <input class="form-control" type="text" value="<?php echo e(webCurrencyConverter(amount: $amount ?? 0)); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for=""><?php echo e(translate('remaining_balance')); ?></label>
                            <input class="form-control" type="text" value="<?php echo e(webCurrencyConverter(amount: $remain_balance ?? 0)); ?>" readonly>
                            <?php if($remain_balance<0): ?>
                            <label class="__color-crimson mt-1"><?php echo e(translate('you_do_not_have_sufficient_balance_for_pay_this_order!!')); ?></label>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                <button type="submit" class="btn btn--primary" <?php echo e($remain_balance>0? '':'disabled'); ?>><?php echo e(translate('submit')); ?></button>
                </div>
            </form>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <span id="route-action-checkout-function" data-route="checkout-payment"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/payment.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/checkout/payment.blade.php ENDPATH**/ ?>