<?php $__env->startSection('title', translate('shop_view')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shop-info.png')); ?>" alt="">
                <?php echo e(translate('shop_info')); ?>

            </h2>
        </div>
        <?php echo $__env->make('vendor-views.shop.inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mb-3">
            <div class="card-body">
                <form action="<?php echo e(route('vendor.shop.close-shop-temporary',[$shop['id']])); ?>" method="POST"  id="temporary-close-form" data-from="shop">
                    <?php echo csrf_field(); ?>
                    <div class="border rounded border-color-c1 px-4 py-3 d-flex justify-content-between mb-1">
                        <h5 class="mb-0 d-flex gap-1 c1">
                            <?php echo e(translate('temporary_close')); ?>

                        </h5>
                        <input type="hidden" name="id" value="<?php echo e($shop->id); ?>">
                        <div class="position-relative">
                            <label class="switcher">
                                <input type="checkbox" class="switcher_input toggle-switch-message" name="status" value="1" id="temporary-close"
                                       <?php echo e(isset($shop->temporary_close) && $shop->temporary_close == 1 ? 'checked':''); ?>

                                       data-modal-id="toggle-status-modal"
                                       data-toggle-id="temporary-close"
                                       data-on-image="maintenance_mode-on.png"
                                       data-off-image="maintenance_mode-off.png"
                                       data-on-title="<?php echo e(translate('want_to_enable_the_Temporary_Close').'?'); ?>"
                                       data-off-title="<?php echo e(translate('want_to_disable_the_Temporary_Close').'?'); ?>"
                                       data-on-message="<p><?php echo e(translate('if_you_enable_this_option_your_shop_will_be_shown_as_temporarily_closed_in_the_user_app_and_website_and_customers_cannot_add_products_from_your_shop')); ?></p>"
                                       data-off-message="<p><?php echo e(translate('if_you_disable_this_option_your_shop_will_be_open_in_the_user_app_and_website_and_customers_can_add_products_from_your_shop')); ?></p>">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>
                </form>
                <p><?php echo e('*'.translate('by_turning_on_temporary_close_mode_your_shop_will_be_shown_as_temporary_off_in_the_website_and_app_for_the_customers._they_cannot_purchase_or_place_order_from_your_shop')); ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4 class="mb-0 text-capitalize"><?php echo e(translate('my_shop_info')); ?> </h4>
                        </div>
                        <div class="d-inline-flex gap-2">
                            <button class="btn btn-block __inline-70 text-capitalize" data-toggle="modal" data-target="#vacation-mode-modal">
                                <?php echo e(translate('go_to_vacation_mode')); ?>

                            </button>

                            <a class="btn btn--primary __inline-70 px-4 text-white" href="<?php echo e(route('vendor.shop.update',[$shop->id])); ?>">
                                <?php echo e(translate('edit')); ?>

                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center flex-wrap gap-5">
                            <?php if($shop->image=='def.png'): ?>
                                <div class="text-start">
                                    <img height="200" width="200" class="rounded-circle border"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shop.png')); ?>" alt="">
                                </div>
                            <?php else: ?>
                                <div class="text-start">
                                    <img src="<?php echo e(getValidImage(path:'storage/app/public/shop/'.$shop->image,type: 'backend-basic')); ?>"
                                         class="rounded-circle border"
                                         height="200" width="200" alt="">
                                </div>
                            <?php endif; ?>
                            <div class="">
                                <div class="flex-start">
                                    <h4><?php echo e(translate('name').' '.':'); ?> </h4>
                                    <h4 class="mx-1"><?php echo e($shop->name); ?></h4>
                                </div>
                                <div class="flex-start">
                                    <h6><?php echo e(translate('phone').' '.':'); ?></h6>
                                    <h6 class="mx-1"><?php echo e($shop->contact); ?></h6>
                                </div>
                                <div class="flex-start">
                                    <h6><?php echo e(translate('address').' '.':'); ?></h6>
                                    <h6 class="mx-1"><?php echo e($shop->address); ?></h6>
                                </div>
                            </div>
                            <div class=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="vacation-mode-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-start">
                    <form action="<?php echo e(route('vendor.shop.update-vacation', [$shop['id']])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-header border-bottom pb-2">
                            <div>
                                <h5 class="modal-title text-capitalize" id="exampleModalLabel"><?php echo e(translate('vacation_mode')); ?></h5>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="switcher">
                                        <input type="checkbox" name="vacation_status" class="switcher_input" id="vacation_close" <?php echo e($shop->vacation_status == 1?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="close pt-0" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-5">*<?php echo e(translate('set_vacation_mode_for_shop_means_you_will_be_not_available_receive_order_and_provider_products_for_placed_order_at_that_time')); ?></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="text-capitalize"><?php echo e(translate('vacation_start')); ?></label>
                                    <input type="date" name="vacation_start_date" value="<?php echo e($shop->vacation_start_date); ?>" id="start-date-time" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-capitalize"><?php echo e(translate('vacation_end')); ?></label>
                                    <input type="date" name="vacation_end_date" value="<?php echo e($shop->vacation_end_date); ?>" id="end-date-time" class="form-control" required>
                                </div>
                                <div class="col-md-12 mt-2 ">
                                    <label class="text-capitalize"><?php echo e(translate('vacation_note')); ?></label>
                                    <textarea class="form-control" name="vacation_note" id="vacation_note"><?php echo e($shop->vacation_note); ?></textarea>
                                </div>
                            </div>
                            <div class="text-end gap-5 mt-2">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/shop/index.blade.php ENDPATH**/ ?>