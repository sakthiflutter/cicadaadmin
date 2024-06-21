<?php use App\Utils\Helpers; ?>


<?php $__env->startSection('title', translate('push_Notification')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/push-notification.png')); ?>" alt="">
                <?php echo e(translate('push_notification_setup')); ?>

            </h2>
        </div>
        <div class="d-flex flex-wrap justify-content-between gap-3 mb-4">
            <?php echo $__env->make('admin-views.push-notification._push-notification-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="text-primary d-flex align-items-center gap-3 font-weight-bolder text-capitalize">
                <?php echo e(translate('read_documentation')); ?>

                <div class="ripple-animation" data-toggle="modal" data-target="#docsModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"
                         class="svg replaced-svg">
                        <path
                            d="M9.00033 9.83268C9.23644 9.83268 9.43449 9.75268 9.59449 9.59268C9.75449 9.43268 9.83421 9.2349 9.83366 8.99935V5.64518C9.83366 5.40907 9.75366 5.21463 9.59366 5.06185C9.43366 4.90907 9.23588 4.83268 9.00033 4.83268C8.76421 4.83268 8.56616 4.91268 8.40616 5.07268C8.24616 5.23268 8.16644 5.43046 8.16699 5.66602V9.02018C8.16699 9.25629 8.24699 9.45074 8.40699 9.60352C8.56699 9.75629 8.76477 9.83268 9.00033 9.83268ZM9.00033 13.166C9.23644 13.166 9.43449 13.086 9.59449 12.926C9.75449 12.766 9.83421 12.5682 9.83366 12.3327C9.83366 12.0966 9.75366 11.8985 9.59366 11.7385C9.43366 11.5785 9.23588 11.4988 9.00033 11.4993C8.76421 11.4993 8.56616 11.5793 8.40616 11.7393C8.24616 11.8993 8.16644 12.0971 8.16699 12.3327C8.16699 12.5688 8.24699 12.7668 8.40699 12.9268C8.56699 13.0868 8.76477 13.1666 9.00033 13.166ZM9.00033 17.3327C7.84755 17.3327 6.76421 17.1138 5.75033 16.676C4.73644 16.2382 3.85449 15.6446 3.10449 14.8952C2.35449 14.1452 1.76088 13.2632 1.32366 12.2493C0.886437 11.2355 0.667548 10.1521 0.666992 8.99935C0.666992 7.84657 0.885881 6.76324 1.32366 5.74935C1.76144 4.73546 2.35505 3.85352 3.10449 3.10352C3.85449 2.35352 4.73644 1.7599 5.75033 1.32268C6.76421 0.88546 7.84755 0.666571 9.00033 0.666016C10.1531 0.666016 11.2364 0.884905 12.2503 1.32268C13.2642 1.76046 14.1462 2.35407 14.8962 3.10352C15.6462 3.85352 16.24 4.73546 16.6778 5.74935C17.1156 6.76324 17.3342 7.84657 17.3337 8.99935C17.3337 10.1521 17.1148 11.2355 16.677 12.2493C16.2392 13.2632 15.6456 14.1452 14.8962 14.8952C14.1462 15.6452 13.2642 16.2391 12.2503 16.6768C11.2364 17.1146 10.1531 17.3332 9.00033 17.3327ZM9.00033 15.666C10.8475 15.666 12.4206 15.0168 13.7195 13.7185C15.0184 12.4202 15.6675 10.8471 15.667 8.99935C15.667 7.15213 15.0178 5.57907 13.7195 4.28018C12.4212 2.98129 10.8481 2.33213 9.00033 2.33268C7.1531 2.33268 5.58005 2.98185 4.28116 4.28018C2.98227 5.57852 2.3331 7.15157 2.33366 8.99935C2.33366 10.8466 2.98283 12.4196 4.28116 13.7185C5.57949 15.0174 7.15255 15.6666 9.00033 15.666Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="row gx-2 gx-lg-3">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body py-5">
                        <div class="d-flex justify-content-between gap-3 flex-wrap mb-5">
                            <div class="table-responsive w-auto ovy-hidden">
                                <?php ($language = $language->value ?? null); ?>
                                <?php ($default_lang = 'en'); ?>
                                <?php ($default_lang = json_decode($language)[0]); ?>
                                <ul class="nav nav-tabs w-fit-content flex-nowrap  border-0">
                                    <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item text-capitalize">
                                            <a class="nav-link lang-link <?php echo e($lang == $default_lang ? 'active' : ''); ?>" href="javascript:" id="<?php echo e($lang); ?>-link">
                                                <?php echo e(Helpers::get_language_name($lang) . '(' . strtoupper($lang) . ')'); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div>
                                <select name="for_customer" id="for_customer"
                                        class="form-control min-w-200 text-capitalize select-user-type">
                                    <option value="customer"><?php echo e(translate('for_customer')); ?></option>
                                    <option value="seller"><?php echo e(translate('for_Vendor')); ?></option>
                                    <option value="delivery_man"><?php echo e(translate('for_delivery_man')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="customer_view">
                            <form action="<?php echo e(route('admin.push-notification.update',['type'=>'customer'])); ?>"
                                  class="text-start" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <?php $__currentLoopData = $customerMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div
                                                    class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-10">
                                                    <label for="customer<?php echo e($value['key']); ?>" class="switcher_content">
                                                        <?php echo e(translate($value['key'] == 'out_for_delivery_message' ? 'order_out_for_delivery_message' : ($value['key'] == 'order_canceled' ? 'order_canceled_message' : $value['key']))); ?>

                                                    </label>
                                                    <label class="switcher" for="customer<?php echo e($value['key']); ?>">
                                                        <input type="checkbox" class="switcher_input toggle-switch-message"
                                                               name="status<?php echo e($value['id']); ?>"
                                                               id="customer<?php echo e($value['key']); ?>" value="1"
                                                               <?php echo e($value['status']==1?'checked':''); ?>

                                                               data-modal-id = "toggle-modal"
                                                               data-toggle-id = "customer<?php echo e($value['key']); ?>"
                                                               data-on-image = "notification-on.png"
                                                               data-off-image = "notification-off.png"
                                                               data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Push_Notification')); ?>"
                                                               data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Push_Notification')); ?>"
                                                               data-on-message = "<p><?php echo e(translate('if_enabled_customers_will_receive_notifications_on_their_devices')); ?></p>"
                                                               data-off-message = "<p><?php echo e(translate('if_disabled_customers_will_not_receive_notifications_on_their_devices')); ?></p>">
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        if (count($value['translations'])) {
                                                            $translate = [];
                                                            foreach ($value['translations'] as $t) {
                                                                if ($t->locale == $lang && $t->key == $value['key']) {
                                                                    $translate[$lang][$value['key']] = $t->value;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    <input type="hidden" name="lang<?php echo e($value['id']); ?>[]"
                                                           value="<?php echo e($lang); ?>">
                                                    <textarea name="message<?php echo e($value['id']); ?>[]"
                                                              class="form-control text-area-max-min <?php echo e($lang != $default_lang ? 'd-none' : ''); ?> lang-form <?php echo e($lang); ?>-form"><?php echo e($translate[$lang][$value['key']]??$value['message']); ?></textarea>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="d-flex gap-3 justify-content-end">
                                    <button type="reset"
                                            class="btn btn-secondary px-4 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('reset')); ?>

                                    </button>
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            class="btn btn--primary px-4 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('submit')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="seller_view d-none">
                            <form action="<?php echo e(route('admin.push-notification.update',['type'=>'seller'])); ?>"
                                  class="text-start" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <?php $__currentLoopData = $vendorMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div
                                                    class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-10">
                                                    <label for="seller<?php echo e($value['key']); ?>"
                                                           class="switcher_content"><?php echo e(translate($value['key'])); ?></label>
                                                    <label class="switcher" for="seller<?php echo e($value['key']); ?>">
                                                        <input type="checkbox" class="switcher_input toggle-switch-message"
                                                               name="status<?php echo e($value['id']); ?>"
                                                               id="seller<?php echo e($value['key']); ?>" value="1"
                                                               <?php echo e($value['status']==1?'checked':''); ?>

                                                               data-modal-id = "toggle-modal"
                                                               data-toggle-id = "seller<?php echo e($value['key']); ?>"
                                                               data-on-image = "notification-on.png"
                                                               data-off-image = "notification-off.png"
                                                               data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Push_Notification')); ?>"
                                                               data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Push_Notification')); ?>"
                                                               data-on-message = "<p><?php echo e(translate('if_enabled_customers_will_receive_notifications_on_their_devices')); ?></p>"
                                                               data-off-message = "<p><?php echo e(translate('if_disabled_customers_will_not_receive_notifications_on_their_devices')); ?></p>">
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        if (count($value['translations'])) {
                                                            $translate = [];
                                                            foreach ($value['translations'] as $t) {
                                                                if ($t->locale == $lang && $t->key == $value['key']) {
                                                                    $translate[$lang][$value['key']] = $t->value;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    <input type="hidden" name="lang<?php echo e($value['id']); ?>[]"
                                                           value="<?php echo e($lang); ?>">
                                                    <textarea name="message<?php echo e($value['id']); ?>[]"
                                                              class="form-control text-area-max-min <?php echo e($lang != $default_lang ? 'd-none' : ''); ?> lang-form <?php echo e($lang); ?>-form"><?php echo e($translate[$lang][$value['key']]??$value['message']); ?></textarea>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="d-flex gap-3 justify-content-end">
                                    <button type="reset"
                                            class="btn btn-secondary px-4 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('reset')); ?>

                                    </button>
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                            class="btn btn--primary px-4 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('submit')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="delivery_man_view d-none">
                            <form action="<?php echo e(route('admin.push-notification.update',['type'=>'delivery_man'])); ?>"
                                class="text-start" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <?php $__currentLoopData = $deliveryManMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <div
                                                    class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-10">
                                                    <label for="delivery_man<?php echo e($value['key']); ?>"
                                                           class="switcher_content"><?php echo e(translate($value['key'])); ?></label>
                                                    <label class="switcher" for="delivery-man<?php echo e($value['key']); ?>">
                                                        <input type="checkbox" class="switcher_input toggle-switch-message"
                                                               name="status<?php echo e($value['id']); ?>"
                                                               id="delivery-man<?php echo e($value['key']); ?>" value="1"
                                                               <?php echo e($value['status']==1?'checked':''); ?>

                                                               data-modal-id = "toggle-modal"
                                                               data-toggle-id = "delivery-man<?php echo e($value['key']); ?>"
                                                               data-on-image = "notification-on.png"
                                                               data-off-image = "notification-off.png"
                                                               data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Push_Notification')); ?>"
                                                               data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Push_Notification')); ?>"
                                                               data-on-message = "<p><?php echo e(translate('if_enabled_customers_will_receive_notifications_on_their_devices')); ?></p>"
                                                               data-off-message = "<p><?php echo e(translate('if_disabled_customers_will_not_receive_notifications_on_their_devices')); ?></p>">
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </div>
                                                <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                        if (count($value['translations'])) {
                                                            $translate = [];
                                                            foreach ($value['translations'] as $t) {
                                                                if ($t->locale == $lang && $t->key == $value['key']) {
                                                                    $translate[$lang][$value['key']] = $t->value;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    <input type="hidden" name="lang<?php echo e($value['id']); ?>[]"
                                                           value="<?php echo e($lang); ?>">
                                                    <textarea name="message<?php echo e($value['id']); ?>[]"
                                                              class="form-control text-area-max-min <?php echo e($lang != $default_lang ? 'd-none' : ''); ?> lang-form <?php echo e($lang); ?>-form"><?php echo e($translate[$lang][$value['key']]??$value['message']); ?></textarea>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="d-flex gap-3 justify-content-end">
                                    <button type="reset" class="btn btn-secondary px-4 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>">
                                        <?php echo e(translate('reset')); ?>

                                    </button>
                                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" class="btn btn--primary px-4 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>">
                                        <?php echo e(translate('submit')); ?>

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="docsModal" tabindex="-1" aria-labelledby="docsModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                    <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i
                            class="tio-clear"></i></button>
                </div>
                <div class="modal-body px-4 px-sm-5 pt-0">
                    <div class="d-flex flex-column gap-2">
                        <div class="text-center mb-1">
                            <img width="80" class="mb-4" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/notice.png')); ?>"
                                 loading="lazy" alt="">
                            <h4 class="lh-md text-capitalize"><?php echo e(translate('important_notice')); ?>!</h4>
                        </div>
                        <p class="mb-5"><?php echo e(translate('to_include_specific_details_in_your_push_notification_message,you_can_use_the_following_placeholders')); ?>

                            :</p>

                        <ul class="d-flex flex-column px-4 gap-2 mb-4">
                            <li><strong><?= '{deliveryManName}' .' '.':'.' '?></strong> <?php echo e(translate('the_name_of_the_delivery_person').'.'); ?>

                            </li>
                            <li><strong><?= '{orderId}'.' '.':'.' ' ?></strong> <?php echo e(translate('the_unique_ID_of_the_order').'.'); ?></li>
                            <li><strong><?= '{time}'.' '.':'.' ' ?></strong> <?php echo e(translate('the_expected_delivery_time').'.'); ?></li>
                            <li><strong><?= '{userName}'.' '.':'.' ' ?></strong> <?php echo e(translate('the_name_of_the_user_who_placed_the_order').'.'); ?>

                            </li>
                        </ul>

                        <div class="mx-auto w-100 max-w-300">
                            <button class="btn btn--primary btn-block"
                                    data-dismiss="modal"><?php echo e(translate('got_it')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/notification.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/push-notification/index.blade.php ENDPATH**/ ?>