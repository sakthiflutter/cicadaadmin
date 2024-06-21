<?php use Illuminate\Support\Facades\Session; ?>

<?php $__env->startSection('title', translate('payment_options')); ?>
<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction') === "rtl" ? 'right' : 'left'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(translate('business_Setup')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo e(route('admin.business-settings.payment-method.payment-option')); ?>"
                      style="text-align: <?php echo e($direction); ?>;"
                      method="post">
                    <?php echo csrf_field(); ?>
                    <h5 class="mb-4 text-uppercase d-flex text-capitalize"><?php echo e(translate('payment_methods')); ?></h5>
                    <div class="row">
                        <?php if(isset($cashOnDelivery)): ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('cash_on_delivery')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              data-placement="top"
                                              title="<?php echo e(translate('if_enabled,_the_cash_on_delivery_option_will_be_available_on_the_system._Customers_can_use_COD_as_a_payment_option').'deep-copy'); ?>">
                                            <img width="16"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                                 alt="">
                                        </span>
                                    </span>
                                        <label class="switcher" for="cash-on-delivery">
                                            <input type="checkbox" class="switcher_input toggle-switch-message"
                                                   name="cash_on_delivery"
                                                   id="cash-on-delivery" value="1"
                                                   <?php echo e($cashOnDelivery['status'] == 1 ? 'checked' : ''); ?>

                                                   data-modal-id="toggle-modal"
                                                   data-toggle-id="cash-on-delivery"
                                                   data-on-image="cod-on.png"
                                                   data-off-image="cod-off.png"
                                                   data-on-title="<?php echo e(translate('want_to_Turn_ON_the_Cash_On_Delivery_option')); ?>"
                                                   data-off-title="<?php echo e(translate('want_to_Turn_OFF_the_Cash_On_Delivery_option')); ?>"
                                                   data-on-message="<p><?php echo e(translate('if_enabled_customers_can_select_Cash_on_Delivery_as_a_payment_method_during_checkout')); ?></p>"
                                                   data-off-message="<p><?php echo e(translate('if_disabled_the_Cash_on_Delivery_payment_method_will_be_hidden_from_the_checkout_page')); ?></p>">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($digitalPayment)): ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('digital_payment')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              data-placement="top"
                                              title="<?php echo e(translate('if_enabled,_customers_can_choose_digital_payment_options_during_the_checkout_process')); ?>">
                                            <img width="16"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                                 alt="">
                                        </span>
                                    </span>

                                        <label class="switcher" for="digital-payment">
                                            <input type="checkbox" class="switcher_input toggle-switch-message"
                                                   name="digital_payment"
                                                   id="digital-payment" value="1"
                                                   <?php echo e($digitalPayment['status']==1?'checked':''); ?>

                                                   data-modal-id="toggle-modal"
                                                   data-toggle-id="digital-payment"
                                                   data-on-image="digital-payment-on.png"
                                                   data-off-image="digital-payment-off.png"
                                                   data-on-title="<?php echo e(translate('want_to_Turn_ON_the_Digital_Payment_option')); ?>"
                                                   data-off-title="<?php echo e(translate('want_to_Turn_OFF_the_Digital_Payment_option')); ?>"
                                                   data-on-message="<p><?php echo e(translate('if_enabled_customers_can_select_Digital_Payment_during_checkout')); ?></p>"
                                                   data-off-message="<p><?php echo e(translate('if_disabled_Digital_Payment_options_will_be_hidden_from_the_checkout_page')); ?></p>">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($offlinePayment)): ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                        <span class="title-color">
                                            <?php echo e(translate('offline_payment')); ?>

                                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                                  data-placement="top" title="<?php echo e(translate('offline_Payment_allows_customers_to_use_external_payment_methods._They_must_share_payment_details_with_the_vendor_afterward._Admin_can_set_whether_customers_can_make_offline_payments_by_enabling/disabling_this_button.
                                            ')); ?>">
                                                <img width="16"
                                                     src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                                     alt="">
                                            </span>
                                        </span>

                                        <label class="switcher" for="offline-payment">
                                            <input type="checkbox" class="switcher_input toggle-switch-message"
                                                   name="offline_payment"
                                                   id="offline-payment" value="1"
                                                   <?php echo e($offlinePayment['status']== 1 ? 'checked' : ''); ?>

                                                   data-modal-id="toggle-modal"
                                                   data-toggle-id="offline-payment"
                                                   data-on-image="digital-payment-on.png"
                                                   data-off-image="digital-payment-off.png"
                                                   data-on-title="<?php echo e(translate('want_to_Turn_ON_the_Offline_Payment_option')); ?>"
                                                   data-off-title="<?php echo e(translate('want_to_Turn_OFF_the_Offline_Payment_option')); ?>"
                                                   data-on-message="<p><?php echo e(translate('if_enabled_customers_can_pay_through_external_payment_methods')); ?></p>"
                                                   data-off-message="<p><?php echo e(translate('if_disabled_customers_have_to_use_the_system_added_payment_gateways')); ?></p>">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit"
                                        class="btn btn--primary px-5 text-uppercase"><?php echo e(translate('save')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/payment-method/payment-option.blade.php ENDPATH**/ ?>