<?php $__env->startSection('title', translate('POS')); ?>

<?php $__env->startSection('content'); ?>

<section class="section-content pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card">

                    <h5 class="p-3 m-0 bg-light">
                        <?php echo e(translate('product_Section')); ?>

                    </h5>

                    <div class="px-3 py-4">
                        <div class="row gy-1">
                            <div class="col-sm-6">
                                <div class="input-group d-flex justify-content-end">
                                    <select name="category" id="category" class="form-control js-select2-custom w-100 action-category-filter" title="select category">
                                        <option value=""><?php echo e(translate('all_categories')); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($categoryId==$item->id?'selected':''); ?>>
                                                <?php echo e($item->defaultName); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <form class="">
                                    <div class="input-group-overlay input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="search" autocomplete="off" type="text"
                                               value="<?php echo e($searchValue); ?>"
                                               name="searchValue" class="form-control search-bar-input"
                                               placeholder="<?php echo e(translate('search_by_name_or_sku')); ?>"
                                               aria-label="Search here">
                                        <diV class="card pos-search-card w-4 position-absolute z-index-1 w-100">
                                            <div id="pos-search-box"
                                                 class="card-body search-result-box d--none"></div>
                                        </diV>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-2" id="items">
                        <div class="pos-item-wrap">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('admin-views.pos.partials._single-product',['product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <?php echo $products->withQueryString()->links(); ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mb-5">
                <div class="card billing-section-wrap">
                    <h5 class="p-3 m-0 bg-light"><?php echo e(translate('billing_Section')); ?></h5>
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <button type="button" class="btn btn-outline--primary d-flex align-items-center gap-2 action-view-all-hold-orders"
                            data-toggle="tooltip" data-placement="top"
                                    title="<?php echo e(translate('please_resume_the_order_from_here')); ?>">
                                <?php echo e(translate('view_All_Hold_Orders')); ?>

                                <span class="total_hold_orders">
                                    <?php echo e($totalHoldOrder); ?>

                                </span>
                            </button>
                        </div>

                        <div class="form-group d-flex gap-2">
                            <?php
                            $userId = 0;
                            if (Illuminate\Support\Str::contains(session('current_user'), 'saved-customer')) {
                                $userId = explode('-', session('current_user'))[2];
                            }
                            ?>
                            <select id='customer' name="customer_id" data-placeholder="Walking Customer" class="js-example-matcher form-control form-ellipsis action-customer-change">
                                <option value="0" <?php echo e($userId == 0 ? 'selected':''); ?>><?php echo e(translate('walking_customer')); ?></option>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($customer->id); ?>" <?php echo e($userId == $customer->id ? 'selected':''); ?>><?php echo e($customer->f_name); ?> <?php echo e($customer->l_name); ?>

                                        (<?php echo e($customer->phone); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <button class="btn btn-success rounded text-nowrap" id="add_new_customer" type="button"
                                    data-toggle="modal" data-target="#add-customer" title="<?php echo e(translate('add_new_customer')); ?>">
                                <?php echo e(translate('add_New_Customer')); ?>

                            </button>
                        </div>

                        <div id="cart-summary">
                            <?php echo $__env->make('admin-views.pos.partials._cart-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade pt-5" id="quick-view" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" id="quick-view-modal"></div>
    </div>
</div>

<button class="d-none" id="hold-orders-modal-btn" type="button" data-toggle="modal" data-target="#hold-orders-modal">
</button>

<?php if($order): ?>
<?php echo $__env->make('admin-views.pos.partials.modals._print-invoice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php echo $__env->make('admin-views.pos.partials.modals._add-customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin-views.pos.partials.modals._hold-orders-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin-views.pos.partials.modals._add-coupon-discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin-views.pos.partials.modals._add-discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin-views.pos.partials.modals._short-cut-keys', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<span id="route-admin-pos-get-cart-ids" data-url="<?php echo e(route('admin.pos.get-cart-ids')); ?>"></span>
<span id="route-admin-pos-new-cart-id" data-url="<?php echo e(route('admin.pos.new-cart-id')); ?>"></span>
<span id="route-admin-pos-clear-cart-ids" data-url="<?php echo e(route('admin.pos.clear-cart-ids')); ?>"></span>
<span id="route-admin-pos-view-hold-orders" data-url="<?php echo e(route('admin.pos.view-hold-orders')); ?>"></span>
<span id="route-admin-products-search-product" data-url="<?php echo e(route('admin.pos.search-product')); ?>"></span>
<span id="route-admin-pos-change-customer" data-url="<?php echo e(route('admin.pos.change-customer')); ?>"></span>
<span id="route-admin-pos-update-discount" data-url="<?php echo e(route('admin.pos.update-discount')); ?>"></span>
<span id="route-admin-pos-coupon-discount" data-url="<?php echo e(route('admin.pos.coupon-discount')); ?>"></span>
<span id="route-admin-pos-cancel-order" data-url="<?php echo e(route('admin.pos.cancel-order')); ?>"></span>
<span id="route-admin-pos-quick-view" data-url="<?php echo e(route('admin.pos.quick-view')); ?>"></span>
<span id="route-admin-pos-add-to-cart" data-url="<?php echo e(route('admin.pos.add-to-cart')); ?>"></span>
<span id="route-admin-pos-remove-cart" data-url="<?php echo e(route('admin.pos.remove-cart')); ?>"></span>
<span id="route-admin-pos-empty-cart" data-url="<?php echo e(route('admin.pos.empty-cart')); ?>"></span>
<span id="route-admin-pos-update-quantity" data-url="<?php echo e(route('admin.pos.update-quantity')); ?>"></span>
<span id="route-admin-pos-get-variant-price" data-url="<?php echo e(route('admin.pos.get-variant-price')); ?>"></span>
<span id="route-admin-pos-change-cart-editable" data-url="<?php echo e(route('admin.pos.change-cart').'/?cart_id=:value'); ?>"></span>

<span id="message-cart-word" data-text="<?php echo e(translate('cart')); ?>"></span>
<span id="message-stock-out" data-text="<?php echo e(translate('stock_out')); ?>"></span>
<span id="message-stock-id" data-text="<?php echo e(translate('in_stock')); ?>"></span>
<span id="message-add-to-cart" data-text="<?php echo e(translate('add_to_cart')); ?>"></span>
<span id="message-cart-updated" data-text="<?php echo e(translate('cart_updated')); ?>"></span>
<span id="message-update-to-cart" data-text="<?php echo e(translate('update_to_cart')); ?>"></span>
<span id="message-cart-is-empty" data-text="<?php echo e(translate('cart_is_empty')); ?>"></span>
<span id="message-coupon-is-invalid" data-text="<?php echo e(translate('coupon_is_invalid')); ?>"></span>
<span id="message-product-quantity-updated" data-text="<?php echo e(translate('product_quantity_updated')); ?>"></span>
<span id="message-coupon-added-successfully" data-text="<?php echo e(translate('coupon_added_successfully')); ?>"></span>
<span id="message-sorry-stock-limit-exceeded" data-text="<?php echo e(translate('sorry_stock_limit_exceeded')); ?>"></span>
<span id="message-please-choose-all-the-options" data-text="<?php echo e(translate('please_choose_all_the_options')); ?>"></span>
<span id="message-item-has-been-removed-from-cart" data-text="<?php echo e(translate('item_has_been_removed_from_cart')); ?>"></span>
<span id="message-you-want-to-remove-all-items-from-cart" data-text="<?php echo e(translate('you_want_to_remove_all_items_from_cart')); ?>"></span>
<span id="message-product-quantity-is-not-enough" data-text="<?php echo e(translate('product_quantity_is_not_enough')); ?>"></span>
<span id="message-sorry-product-is-out-of-stock" data-text="<?php echo e(translate('sorry_product_is_out_of_stock')); ?>"></span>
<span id="message-item-has-been-added-in-your-cart" data-text="<?php echo e(translate('item_has_been_added_in_your_cart')); ?>"></span>
<span id="message-extra-discount-added-successfully" data-text="<?php echo e(translate('extra_discount_added_successfully')); ?>"></span>
<span id="message-amount-can-not-be-negative-or-zero" data-text="<?php echo e(translate('amount_can_not_be_negative_or_zero')); ?>"></span>
<span id="message-sorry-the-minimum-value-was-reached" data-text="<?php echo e(translate('sorry_the_minimum_value_was_reached')); ?>"></span>
<span id="message-this-discount-is-not-applied-for-this-amount" data-text="<?php echo e(translate('this_discount_is_not_applied_for_this_amount')); ?>"></span>
<span id="message-product-quantity-cannot-be-zero-in-cart" data-text="<?php echo e(translate('product_quantity_can_not_be_zero_or_less_than_zero_in_cart')); ?>"></span>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/pos-script.js')); ?>"></script>

    <script>
        "use strict";
        $(document).on('ready', function () {
            <?php if($order): ?>
            $('#print-invoice').modal('show');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/pos/index.blade.php ENDPATH**/ ?>