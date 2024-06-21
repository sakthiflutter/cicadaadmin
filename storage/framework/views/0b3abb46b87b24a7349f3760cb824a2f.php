<form action="<?php echo e(route('admin.pos.place-order')); ?>" id='order_place' method="post" >
    <?php echo csrf_field(); ?>
<div id="cart">
    <div class="table-responsive pos-cart-table border">
        <table class="table table-align-middle m-0">
            <thead class="text-capitalize bg-light">
                <tr>
                    <th class="border-0 min-w-120"><?php echo e(translate('item')); ?></th>
                    <th class="border-0"><?php echo e(translate('qty')); ?></th>
                    <th class="border-0"><?php echo e(translate('price')); ?></th>
                    <th class="border-0 text-center"><?php echo e(translate('delete')); ?></th>
                </tr>
            </thead>
            <tbody>
               <?php $__currentLoopData = $cartItems['cartItemValue']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($item)): ?>
                        <tr>
                        <td>
                            <div class="media align-items-center gap-10">
                                <img class="avatar avatar-sm"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$item['image'], type: 'backend-product')); ?>"
                                     alt="<?php echo e($item['name'].translate('image')); ?> ">
                                <div class="media-body">
                                    <h5 class="text-hover-primary mb-0">
                                        <?php echo e(Str::limit($item['name'], 12)); ?>

                                        <?php if($item['tax_model'] == 'include'): ?>
                                            <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('tax_included')); ?>">
                                                <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                                            </span>
                                        <?php endif; ?>
                                    </h5>
                                    <small><?php echo e(Str::limit($item['variant'], 20)); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="number" data-key="<?php echo e($key); ?>" class="form-control qty action-pos-update-quantity" value="<?php echo e($item['quantity']); ?>" min="1"
                                   data-product-key="<?php echo e($item['id']); ?>"
                                   data-product-variant="<?php echo e($item['variant']); ?>">
                        </td>
                        <td>
                            <div>
                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:$item['productSubtotal']), currencyCode: getCurrencyCode())); ?>

                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:" data-id="<?php echo e($item['id']); ?>" data-variant ="<?php echo e($item['variant']); ?>" class="btn btn-sm rounded-circle remove-from-cart">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/pos-delete-icon.svg')); ?>" alt="">
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="pt-4">
        <dl>
            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('sub_total')); ?> : </dt>
                <dd><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:$cartItems['subtotal']+$cartItems['discountOnProduct']), currencyCode: getCurrencyCode())); ?></dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('product_Discount')); ?> :</dt>
                <dd><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($cartItems['discountOnProduct'],2)), currencyCode: getCurrencyCode())); ?></dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('extra_Discount')); ?> :</dt>
                <dd>
                    <button id="extra_discount" class="btn btn-sm p-0" type="button" data-toggle="modal" data-target="#add-discount">
                        <i class="tio-edit"></i>
                    </button>
                    <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:$cartItems['extraDiscount']), currencyCode: getCurrencyCode())); ?>

                </dd>
            </div>

            <div class="d-flex justify-content-between">
                <dt class="title-color gap-2 text-capitalize font-weight-normal"><?php echo e(translate('coupon_Discount')); ?> :</dt>
                <dd>
                    <button id="coupon_discount" class="btn btn-sm p-0" type="button" data-toggle="modal" data-target="#add-coupon-discount">
                        <i class="tio-edit"></i>
                    </button>
                    <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:$cartItems['couponDiscount']), currencyCode: getCurrencyCode())); ?>

                </dd>
            </div>

            <div class="d-flex gap-2 justify-content-between">
                <dt class="title-color text-capitalize font-weight-normal"><?php echo e(translate('tax')); ?> : </dt>
                <dd><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($cartItems['totalTax'],2)), currencyCode: getCurrencyCode())); ?></dd>
            </div>

            <div class="d-flex gap-2 border-top justify-content-between pt-2">
                <dt class="title-color text-capitalize font-weight-bold title-color"><?php echo e(translate('total')); ?> : </dt>
                <dd class="font-weight-bold title-color"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($cartItems['total']+$cartItems['totalTax']-$cartItems['couponDiscount'], 2)), currencyCode: getCurrencyCode())); ?></dd>
            </div>
        </dl>

        <div class="form-group col-12">
            <input type="hidden" class="form-control" name="amount" min="0" step="0.01"
                    value="<?php echo e(usdToDefaultCurrency(amount: $cartItems['total']+$cartItems['totalTax']-$cartItems['couponDiscount'])); ?>"
                    readonly>
        </div>
        <div class="pt-4 mb-4">
            <div class="title-color d-flex mb-2"><?php echo e(translate('paid_By')); ?>:</div>
            <ul class="list-unstyled option-buttons">
                <li>
                    <input type="radio" id="cash" value="cash" name="type" hidden checked>
                    <label for="cash" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(translate('cash')); ?></label>
                </li>
                <li>
                    <input type="radio" value="card" id="card" name="type" hidden>
                    <label for="card" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(translate('card')); ?></label>
                </li>
                <?php ( $walletStatus = getWebConfig('wallet_status') ?? 0); ?>
                <?php if($walletStatus): ?>
                <li class="<?php echo e((str_contains(session('current_user'), 'walking-customer')) ? 'd-none':''); ?>">
                    <input type="radio" value="wallet" id="wallet" name="type" hidden>
                    <label for="wallet" class="btn btn--bordered btn--bordered-black px-4 mb-0"><?php echo e(translate('wallet')); ?></label>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="d-flex gap-2 justify-content-between align-items-center pt-3 bottom-sticky-buttons">

        <?php if($cartItems['countItem']): ?>
            <span class="btn btn-danger btn-block action-empty-cart">
                <i class="fa fa-times-circle"></i>
                <?php echo e(translate('cancel_Order')); ?>

            </span>

            <button id="submit_order" type="button" class="btn btn--primary btn-block m-0 action-form-submit" data-toggle="modal" data-target="#paymentModal">
                <i class="fa fa-shopping-bag"></i>
                <?php echo e(translate('place_Order')); ?>

            </button>
        <?php else: ?>
            <span class="btn btn-danger btn-block action-empty-alert-show">
                <i class="fa fa-times-circle"></i>
                <?php echo e(translate('cancel_Order')); ?>

            </span>
            <button type="button" class="btn btn--primary btn-block m-0 action-empty-alert-show">
                <i class="fa fa-shopping-bag"></i>
                <?php echo e(translate('place_Order')); ?>

            </button>
        <?php endif; ?>

    </div>
</div>

</form>

<?php $__env->startPush('script_2'); ?>
<script>
    'use strict';
    $('#type_ext_dis').on('change', function (){
        let type = $('#type_ext_dis').val();
        if(type === 'amount'){
            $('#dis_amount').attr('placeholder', 'Ex: 500');
        }else if(type === 'percent'){
            $('#dis_amount').attr('placeholder', 'Ex: 10%');
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/pos/partials/_cart.blade.php ENDPATH**/ ?>