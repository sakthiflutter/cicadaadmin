<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e('Invoice'); ?></title>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/invoice.css')); ?>">
</head>

<body>
<div class="first">
    <table class="content-position mb-30">
        <tr>
            <th class="p-0 text-left fz-26">
                <?php echo e('Order Invoice'); ?>

            </th>
            <th>
                <img height="40" src="<?php echo e(dynamicStorage(path: "storage/app/public/company/$companyWebLogo")); ?>" alt="">
            </th>
        </tr>
    </table>
    <table class="bs-0 mb-30 px-10">
        <tr>
            <th class="content-position-y text-left">
                <h4 class="text-uppercase mb-1 fz-14">
                    <?php echo e('Invoice'); ?> #<?php echo e($order->id); ?> <?php echo e(($order->order_type == 'POS' ? '(POS Order)' : '' )); ?>

                </h4><br>
                <h4 class="text-uppercase mb-1 fz-14">
                    <?php echo e('Shop Name'); ?>

                    : <?php echo e($order->seller_is == 'admin' ? $companyName : (isset($order->seller->shop) ? $order->seller->shop->name : 'Not Found')); ?>

                </h4>
                <?php if($order['seller_is']!='admin' && isset($order['seller']) && $order['seller']->gst != null): ?>
                    <h4 class="text-capitalize fz-12">GST
                        : <?php echo e($order['seller']->gst); ?></h4>
                <?php endif; ?>
            </th>
            <th class="content-position-y text-right">
                <h4 class="fz-14"><?php echo e('Date'); ?> : <?php echo e(date('d-m-Y h:i:s a',strtotime($order['created_at']))); ?></h4>
            </th>
        </tr>
    </table>
</div>
<div class="">
    <section>
        <table class="content-position-y fz-12">
            <tr>
                <td class="font-weight-bold p-1">
                    <table>
                        <tr>
                            <td>
                                <?php if($order->shipping_address_data): ?>
                                    <?php
                                        $shipping_address = $order->shipping_address_data
                                    ?>
                                    <span class="h2 mt-0"><?php echo e('Shipping to'); ?> </span>
                                    <div class="h4 montserrat-normal-600">
                                        <p class="mt-6 mb-0"><?php echo e($shipping_address->contact_person_name); ?></p>
                                        <?php if($order->is_guest && isset($shipping_address->email)): ?>
                                            <p class="mt-6 mb-0"><?php echo e($shipping_address->email); ?></p>
                                        <?php endif; ?>
                                        <p class="mt-6 mb-0"><?php echo e($shipping_address->phone); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($shipping_address->address); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($shipping_address->city); ?> <?php echo e($shipping_address->zip); ?> </p>
                                    </div>
                                <?php else: ?>
                                    <span class="h2 m-0"><?php echo e('Customer Info'); ?></span>
                                    <div class="h4 montserrat-normal-600">
                                        <?php if($order->is_guest): ?>
                                            <p class="mt-6 mb-0"><?php echo e('Guest User'); ?></p>
                                        <?php else: ?>
                                            <p class="mt-6 mb-0"><?php echo e($order->customer !=null? $order->customer['f_name'].' '.$order->customer['l_name']:'Name not found'); ?></p>
                                        <?php endif; ?>

                                        <?php if(isset($order->customer) && $order->customer['id']!=0): ?>
                                            <p class="mt-6 mb-0"><?php echo e($order->customer !=null? $order->customer['email']: 'Email not found'); ?></p>
                                            <p class="mt-6 mb-0"><?php echo e($order->customer !=null? $order->customer['phone']: 'Phone not found'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <table>
                        <tr>
                            <td class="text-right">
                                <?php if($order->billing_address_data): ?>
                                    <?php
                                        $billingAddress = $order->billing_address_data
                                    ?>
                                    <span class="h2"><?php echo e('Billing Address'); ?> </span>
                                    <div class="h4 montserrat-normal-600">
                                        <p class="mt-6 mb-0"><?php echo e($billingAddress->contact_person_name); ?></p>
                                        <?php if($order->is_guest && isset($billingAddress->email)): ?>
                                            <p class="mt-6 mb-0"><?php echo e($billingAddress->email); ?></p>
                                        <?php endif; ?>
                                        <p class="mt-6 mb-0"><?php echo e($billingAddress->phone); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($billingAddress->address); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($billingAddress->city); ?> <?php echo e($billingAddress->zip); ?></p>
                                    </div>
                                <?php elseif($order->billingAddress): ?>
                                    <span class="h2"><?php echo e('Billing Address'); ?> </span>
                                    <div class="h4 montserrat-normal-600">
                                        <p class="mt-6 mb-0"><?php echo e($order->billingAddress ? $order->billingAddress['contact_person_name'] : ""); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($order->billingAddress ? $order->billingAddress['phone'] : ""); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($order->billingAddress ? $order->billingAddress['address'] : ""); ?></p>
                                        <p class="mt-6 mb-0"><?php echo e($order->billingAddress ? $order->billingAddress['city'] : ""); ?> <?php echo e($order->billingAddress ? $order->billingAddress['zip'] : ""); ?></p>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    </section>
</div>

<br>

<div class="">
    <div class="content-position-y">
        <table class="customers bs-0">
            <thead>
            <tr>
                <th><?php echo e('SL'); ?></th>
                <th><?php echo e('Item Description'); ?></th>
                <th><?php echo e('Unit Price'); ?></th>
                <th><?php echo e(' Qty'); ?></th>
                <th class="text-right"><?php echo e('Total'); ?></th>
            </tr>
            </thead>
            <?php
                $subtotal=0;
                $total=0;
                $sub_total=0;
                $total_tax=0;
                $total_shipping_cost=0;
                $total_discount_on_product=0;
                $ext_discount=0;
            ?>
            <tbody>
            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $subtotal=($details['price'])*$details->qty ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td>
                        <?php echo e($details['product']?$details['product']->name:''); ?>

                        <?php if($details['variant']): ?>
                            <br>
                            <?php echo e('Variation'); ?> : <?php echo e($details['variant']); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $details['price']), currencyCode: getCurrencyCode(type: 'default'))); ?></td>
                    <td><?php echo e($details->qty); ?></td>
                    <td class="text-right"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $subtotal), currencyCode: getCurrencyCode(type: 'default'))); ?></td>
                </tr>

                <?php
                    $sub_total+=$details['price']*$details['qty'];
                    $total_tax+=$details['tax'];
                    $total_shipping_cost+=$details->shipping ? $details->shipping->cost :0;
                    $total_discount_on_product+=$details['discount'];
                    $total+=$subtotal;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if ($order['extra_discount_type'] == 'percent') {
    $ext_discount = ($sub_total / 100) * $order['extra_discount'];
} else {
    $ext_discount = $order['extra_discount'];
}
?>
<?php ($shipping=$order['shipping_cost']); ?>
<div class="content-position-y">
    <table class="fz-12">
        <tr>
            <th class="text-left">
                <h4 class="fz-12 mb-1"><?php echo e('Payment Details'); ?></h4>
                <p class="fz-12 font-normal">
                    <?php echo e($order->payment_status); ?>

                    , <?php echo e(date('y-m-d',strtotime($order['created_at']))); ?>

                </p>

                <?php if($order->delivery_type !=null): ?>
                    <h4 class="fz-12 mb-1"><?php echo e('Delivery Info'); ?> </h4>
                    <?php if($order->delivery_type == 'self_delivery'): ?>
                        <p class="fz-12 font-normal">
                            <span>
                                <?php echo e('Self Delivery'); ?>

                            </span>
                            <?php if($order->deliveryMan): ?>
                                <br>
                                <span>
                                    <?php echo e('Delivery Man Name'); ?> : <?php echo e($order->deliveryMan['f_name'].' '.$order->deliveryMan['l_name']); ?>

                                </span>
                                <br>
                                <span>
                                    <?php echo e('Delivery Man Phone'); ?> : <?php echo e($order->deliveryMan['phone']); ?>

                                </span>
                            <?php else: ?>
                                <?php echo e('Delivery Man not found!'); ?>

                            <?php endif; ?>
                        </p>
                    <?php else: ?>
                        <p>
                        <span>
                            <?php echo e($order->delivery_service_name); ?>

                        </span>
                            <br>
                            <span>
                            Tracking Id : <?php echo e($order->third_party_delivery_tracking_id); ?>

                        </span>
                        </p>
                    <?php endif; ?>
                <?php endif; ?>

            </th>

            <th>
                <table class="calc-table">
                    <tbody>
                    <tr>
                        <td class="p-1 text-left"><?php echo e('Sub Total'); ?></td>
                        <td class="p-1"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $sub_total), currencyCode: getCurrencyCode(type: 'default'))); ?></td>
                    </tr>
                    <tr>
                        <td class="p-1 text-left"><?php echo e('Tax'); ?></td>
                        <td class="p-1"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $total_tax), currencyCode: getCurrencyCode(type: 'default'))); ?></td>
                    </tr>
                    <?php if($order->order_type=='default_type'): ?>
                        <tr>
                            <td class="p-1 text-left"><?php echo e('Shipping'); ?></td>
                            <td class="p-1"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $shipping - ($order['is_shipping_free'] ? $order['extra_discount'] : 0)), currencyCode: getCurrencyCode(type: 'default'))); ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="p-1 text-left"><?php echo e('Promotion Discount'); ?></td>
                        <td class="p-1">
                            - <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->discount_amount), currencyCode: getCurrencyCode(type: 'default'))); ?> </td>
                    </tr>
                    <?php if($order->order_type=='POS'): ?>
                        <tr>
                            <td class="p-1 text-left"><?php echo e('Extra Discount'); ?></td>
                            <td class="p-1">
                                - <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $ext_discount), currencyCode: getCurrencyCode(type: 'default'))); ?> </td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td class="p-1 text-left"><?php echo e('Discount On Product'); ?></td>
                        <td class="p-1">
                            - <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $total_discount_on_product), currencyCode: getCurrencyCode(type: 'default'))); ?></td>
                    </tr>
                    <tr>
                        <td class="border-dashed-top font-weight-bold text-left"><b><?php echo e('Total'); ?></b></td>
                        <td class="border-dashed-top font-weight-bold">
                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->order_amount), currencyCode: getCurrencyCode(type: 'default'))); ?>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </th>
        </tr>
    </table>
</div>
<br>
<br><br><br>

<div class="row">
    <section>
        <table class="">
            <tr>
                <th class="fz-12 font-normal pb-3">
                    <?php echo e('If you require any assistance or have feedback or suggestions about our site you can email us at'); ?> <a
                            href="mailto:<?php echo e($companyEmail); ?>">(<?php echo e($companyEmail); ?>)</a>
                </th>
            </tr>
            <tr>
                <th class="content-position-y bg-light py-4">
                    <div class="d-flex justify-content-center gap-2">
                        <div class="mb-2">
                            <i class="fa fa-phone"></i>
                            <?php echo e('Phone'); ?> : <?php echo e($companyPhone); ?>

                        </div>
                        <div class="mb-2">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <?php echo e('Email'); ?> : <?php echo e($companyEmail); ?>

                        </div>
                    </div>
                    <div class="mb-2">
                        <?php echo e(url('/')); ?>

                    </div>
                    <div>
                        <?php echo e('All Copyright Reserved ©'); ?> <?php echo e(date('Y')); ?> <?php echo e($companyName); ?>

                    </div>
                </th>
            </tr>
        </table>
    </section>
</div>

</body>
</html>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/order/invoice.blade.php ENDPATH**/ ?>