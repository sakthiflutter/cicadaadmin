<html>
<table>
    <thead>
        <tr>
            <th style="font-size: 18px"><?php echo e(translate('order_List')); ?></th>
        </tr>
        <tr>

            <th><?php echo e(translate('filter_criteria').' '.'-'); ?></th>
            <th></th>
            <th>
                <?php if($data['order_status'] != 'all'): ?>
                    <?php echo e(translate('order_Status').' '.'-'.' '.translate($data['order_status'] != 'failed' ? $data['order_status'] : 'failed_to_deliver')); ?>

                    <br>
                <?php endif; ?>
                <?php echo e(translate('search_Bar_Content').' '.'-'.' '.$data['searchValue'] ?? 'N/A'); ?>

                <br>
                <?php echo e(translate('order_Type').' '.'-'.' '.translate($data['order_type']=='admin' ? 'inhouse' : $data['order_type'] )); ?>

                <br>
                <?php echo e(translate('store').' '.'-'.' '.ucwords($data['seller']?->shop?->name ?? translate('all'))); ?>

                <br>
                <?php echo e(translate('customer_Name').' '.'-'.' '.ucwords(isset($data['customer']->f_name) ? $data['customer']->f_name.' '.$data['customer']->l_name : translate('all_customers') )); ?>

                <br>
                <?php echo e(translate('date_type').' '.'-'.' '.translate(!empty($data['date_type']) ? $data['date_type'] : 'all')); ?>

                <br>
                <?php if($data['date_type'] == 'custom_date'): ?>
                    <?php echo e(translate('from').' '.'-'.' '.$data['from'] ?? date('d M, Y',strtotime($data['from']))); ?>

                    <br>
                    <?php echo e(translate('to').' '.'-'.' '.$data['to'] ?? date('d M, Y',strtotime($data['to']))); ?>

                    <br>
                <?php endif; ?>
            </th>
        </tr>
        <tr>
            <?php if($data['order_status'] == 'all'): ?>
                <th><?php echo e(translate('order_Status')); ?></th>
                <th></th>
                <th>
                    <?php $__currentLoopData = $data['status_array']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(translate($key != 'failed' ? $key : 'failed_to_deliver').' '.'-'.' '.$value); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </th>
            <?php endif; ?>
        </tr>
        <tr>
            <th> <?php echo e(translate('SL')); ?>    </th>
            <th> <?php echo e(translate('Order_ID')); ?>    </th>
            <th> <?php echo e(translate('Order_Date')); ?>    </th>
            <th> <?php echo e(translate('Customer_Name')); ?>    </th>
            <th> <?php echo e(translate('Store_Name')); ?>    </th>
            <th> <?php echo e(translate('Total_Items')); ?>    </th>
            <th> <?php echo e(translate('Item_Price')); ?>    </th>
            <th> <?php echo e(translate('Item_Discount')); ?>    </th>
            <th> <?php echo e(translate('Coupon_Discount')); ?>    </th>
            <th> <?php echo e(translate('extra_Discount')); ?>    </th>
            <th> <?php echo e(translate('Discounted_Amount')); ?>    </th>
            <th> <?php echo e(translate('Vat/Tax')); ?>    </th>
            <th> <?php echo e(translate('shipping')); ?>    </th>
            <th> <?php echo e(translate('Total_Amount')); ?>    </th>
            <th> <?php echo e(translate('Payment_Status')); ?></th>
            <?php if($data['order_status'] == 'all'): ?>
                <th> <?php echo e(translate('Order_Status')); ?></th>
            <?php endif; ?>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $data['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if ($order->extra_discount_type == 'percent') {
                    $extra_discount = $order->total_price*$order->extra_discount /100;
                }else {
                    $extra_discount = $order->extra_discount;
                }
                $extraDiscountFinal = $order->is_shipping_free == 1 ? $extra_discount : 0;
                $totalAmount = ($order?->order_amount ?? 0) + $extraDiscountFinal;
                $defaultCurrencyCode = getCurrencyCode();
            ?>

            <tr>
                <td> <?php echo e(++$key); ?>	</td>
                <td> <?php echo e($order->id); ?>	</td>
                <td> <?php echo e(date('d M, Y h:i A',strtotime($order->created_at))); ?></td>
                <td> <?php echo e(ucwords($order->is_guest == 0 ? (($order?->customer?->f_name ?? translate('not_found')) .' '. $order?->customer?->l_name) : translate('guest_customer'))); ?>	</td>
                <td> <?php echo e(ucwords($order?->seller_is == 'seller' ? ($order?->seller?->shop->name ?? translate('not_found')) : translate('inhouse'))); ?>	</td>
                <td> <?php echo e($order->total_qty); ?> </td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order?->total_price ?? 0), currencyCode: getCurrencyCode())); ?> </td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order?->total_discount ?? 0), currencyCode: getCurrencyCode())); ?> </td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order?->discount_amount ?? 0), currencyCode: getCurrencyCode())); ?></td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $extra_discount), currencyCode: getCurrencyCode())); ?></td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: ($order?->total_price ?? 0) - ($order?->total_discount ?? 0)- ($order?->discount_amount ?? 0) - ($order->is_shipping_free == 0 ? $extra_discount : 0)), currencyCode: getCurrencyCode())); ?>  </td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order?->total_tax ?? 0), currencyCode: getCurrencyCode())); ?>	</td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->is_shipping_free == 0 ? ($order?->shipping_cost ?? 0) : 0), currencyCode: getCurrencyCode())); ?>	</td>
                <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $totalAmount ?? 0), currencyCode: getCurrencyCode())); ?></td>
                <td> <?php echo e(translate($order->payment_status)); ?></td>
                <?php if($data['order_status'] == 'all'): ?>
                    <td> <?php echo e(translate($order->order_status)); ?></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</html>
<?php /**PATH /var/www/html/moores/resources/views/file-exports/order-export.blade.php ENDPATH**/ ?>