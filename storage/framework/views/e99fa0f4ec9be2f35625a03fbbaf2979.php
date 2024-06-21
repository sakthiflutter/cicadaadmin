<link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/pos-invoice.css')); ?>">
<div class="width-363px">
    <div class="text-center pt-4 mb-3">
        <h2 class="line-height-1"><?php echo e(getWebConfig('company_name')); ?></h2>
        <h5 class="line-height-1 font-size-16px font-weight-lighter">
            <?php echo e(ucfirst('phone')); ?> : <?php echo e(getWebConfig('company_phone')); ?>

        </h5>
    </div>

    <span class="dashed-hr"></span>
    <div class="row mt-3">
        <div class="col-6">
            <h5><?php echo e(ucfirst('order ID')); ?> : <?php echo e($order['id']); ?></h5>
        </div>
        <div class="col-6">
            <h5 class="font-weight-lighter">
                <?php echo e(date('d/M/Y h:i a', strtotime($order['created_at']))); ?>

            </h5>
        </div>
        <?php if($order->customer): ?>
            <div class="col-12">
                <h5><?php echo e(ucfirst('customer Name')); ?> : <?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?></h5>
                <?php if($order->customer->id !=0): ?>
                    <h5><?php echo e(ucfirst('phone')); ?> : <?php echo e($order->customer['phone']); ?></h5>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
    <h5 class="text-uppercase"></h5>
    <span class="dashed-hr"></span>
    <table class="table table-bordered mt-3 text-left width-99">
        <thead>
        <tr>
            <th class="text-center"><?php echo e(ucfirst('QTY')); ?></th>
            <th class="text-left"><?php echo e(ucfirst('DESC')); ?></th>
            <th class="text-center"><?php echo e(ucfirst('price')); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php ($sub_total=0); ?>
        <?php ($total_tax=0); ?>
        <?php ($total_dis_on_pro=0); ?>
        <?php ($product_price=0); ?>
        <?php ($total_product_price=0); ?>
        <?php ($ext_discount=0); ?>
        <?php ($coupon_discount=0); ?>
        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($detail->product): ?>

                <tr>
                    <td class="text-left">
                        <?php echo e($detail['qty']); ?>

                    </td>
                    <td class="text-left">
                        <span> <?php echo e(Str::limit($detail->product['name'], 200)); ?></span><br>
                        <?php if(count(json_decode($detail['variation'],true))>0): ?>
                            <strong><u><?php echo e(ucfirst('variation')); ?> : </u></strong>
                            <?php $__currentLoopData = json_decode($detail['variation'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="font-size-sm text-body color-black">
                                    <span><?php echo e(ucfirst($key1)); ?> :  </span>
                                    <span
                                        class="font-weight-bold"><?php echo e($variation); ?> </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php echo e(ucfirst('discount')); ?>

                        : <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($detail['discount'],2)), currencyCode: getCurrencyCode())); ?>

                    </td>
                    <td class="text-right">
                        <?php ($amount=($detail['price']*$detail['qty'])-$detail['discount']); ?>
                        <?php ($product_price = $detail['price']*$detail['qty']); ?>
                        <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($amount,2)), currencyCode: getCurrencyCode())); ?>

                    </td>
                </tr>
                <?php ($sub_total+=$amount); ?>
                <?php ($total_product_price+=$product_price); ?>
                <?php ($total_tax+=$detail['tax']); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <span class="dashed-hr"></span>
    <?php


    if ($order['extra_discount_type'] == 'percent') {
        $ext_discount = ($total_product_price / 100) * $order['extra_discount'];
    } else {
        $ext_discount = $order['extra_discount'];
    }
    if (isset($order['discount_amount'])) {
        $coupon_discount = $order['discount_amount'];
    }
    ?>
    <table class="w-100 color-black">
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('items Price')); ?>:</td>
            <td class="text-right"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($sub_total,2)), currencyCode: getCurrencyCode())); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('tax')); ?> / <?php echo e(ucfirst('VAT')); ?>:</td>
            <td class="text-right"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($total_tax,2)), currencyCode: getCurrencyCode())); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('subtotal')); ?>:</td>
            <td class="text-right"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($sub_total+$total_tax,2)), currencyCode: getCurrencyCode())); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('extr discount')); ?>:</td>
            <td class="text-right"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($ext_discount,2)), currencyCode: getCurrencyCode())); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right"><?php echo e(ucfirst('coupon discount')); ?>:</td>
            <td class="text-right"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($coupon_discount,2)), currencyCode: getCurrencyCode())); ?></td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td class="text-right font-size-20px">
                <?php echo e(ucfirst('total')); ?>:
            </td>
            <td class="text-right font-size-20px">
                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount:round($order->order_amount,2)), currencyCode: getCurrencyCode())); ?>

            </td>
        </tr>
    </table>


    <div class="d-flex flex-row justify-content-between border-top">
        <span><?php echo e(ucfirst('paid by')); ?>: <?php echo e(ucfirst($order->payment_method)); ?></span>
    </div>
    <span class="dashed-hr"></span>
    <h5 class="text-center pt-3">
        """<?php echo e(ucfirst('THANK YOU')); ?>"""
    </h5>
    <span class="dashed-hr"></span>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/pos/order/invoice.blade.php ENDPATH**/ ?>