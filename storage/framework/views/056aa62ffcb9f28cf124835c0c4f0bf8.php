<?php $__env->startSection('title',translate('order_Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/css/intlTelInput.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php ($shippingAddress = $order['shipping_address_data'] ?? null); ?>
    <div class="content container-fluid">
        <div class="mb-4">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/all-orders.png')); ?>" alt="">
                <?php echo e(translate('order_details')); ?>

            </h2>
        </div>

        <div class="row gy-3" id="printableArea">
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-10 flex-md-nowrap justify-content-between mb-4">
                            <div class="d-flex flex-column gap-10">
                                <h4 class="text-capitalize"><?php echo e(translate('Order_ID')); ?> #<?php echo e($order['id']); ?></h4>
                                <div class="">
                                    <?php echo e(date('d M, Y , h:i A',strtotime($order['created_at']))); ?>

                                </div>
                            </div>
                            <div class="text-sm-right flex-grow-1">
                                <div class="d-flex flex-wrap gap-10 justify-content-end">
                                    <?php if(isset($order->verificationImages) && $order->verification_status ==1): ?>
                                        <div>
                                            <button class="btn btn--primary px-4" data-toggle="modal"
                                                    data-target="#order_verification_modal"><i
                                                    class="tio-verified"></i> <?php echo e(translate('order_verification')); ?>

                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($shippingAddress->latitude) && isset($shippingAddress->longitude)): ?>
                                        <div class="">
                                            <button class="btn btn--primary px-4" data-toggle="modal"
                                                    data-target="#locationModal"><i
                                                    class="tio-map"></i> <?php echo e(translate('show_locations_on_map')); ?>

                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <a class="btn btn--primary px-4" target="_blank"
                                       href="<?php echo e(route('vendor.orders.generate-invoice',[$order['id']])); ?>">
                                        <i class="tio-print mr-1"></i> <?php echo e(translate('print__Invoice')); ?>

                                    </a>
                                </div>
                                <div class="d-flex flex-column gap-2 mt-3">
                                    <div class="order-status d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color"><?php echo e(translate('status')); ?>: </span>
                                        <?php if($order['order_status']=='pending'): ?>
                                            <span
                                                class="badge color-caribbean-green-soft font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(str_replace('_',' ', translate($order['order_status']) )); ?></span>
                                        <?php elseif($order['order_status']=='failed'): ?>
                                            <span
                                                class="badge badge-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(str_replace('_',' ', translate('failed_To_Deliver'))); ?></span>
                                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                            <span
                                                class="badge badge-soft-warning font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(str_replace('_',' ', $order['order_status'] == 'processing' ? translate('Packaging') : translate($order['order_status']))); ?></span>

                                        <?php elseif($order['order_status']=='delivered' || $order['order_status']=='confirmed'): ?>
                                            <span
                                                class="badge badge-soft-success font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?></span>
                                        <?php else: ?>
                                            <span
                                                class="badge badge-soft-danger font-weight-bold radius-50 d-flex align-items-center py-1 px-2"><?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="payment-method d-flex justify-content-sm-end gap-10 text-capitalize">
                                        <span class="title-color"><?php echo e(translate('payment_Method')); ?> :</span>
                                        <strong><?php echo e(str_replace('_',' ', translate($order['payment_method']))); ?></strong>
                                    </div>
                                    <?php if(isset($order['transaction_ref']) && $order->payment_method != 'cash_on_delivery' && $order->payment_method != 'pay_by_wallet' && !isset($order->offlinePayments)): ?>
                                        <div
                                            class="reference-code d-flex justify-content-sm-end gap-10 text-capitalize">
                                            <span class="title-color"><?php echo e(translate('reference_Code')); ?> :</span>
                                            <strong><?php echo e(translate(str_replace('_',' ',$order['transaction_ref']))); ?> <?php echo e($order->payment_method == 'offline_payment' ? '('.$order->payment_by.')':''); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                    <div class="payment-status d-flex justify-content-sm-end gap-10">
                                        <span class="title-color"><?php echo e(translate('payment_Status')); ?>:</span>
                                        <?php if($order['payment_status']=='paid'): ?>
                                            <span class="text-success payment-status-span font-weight-bold">
                                                <?php echo e(translate('paid')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="text-danger payment-status-span font-weight-bold">
                                                <?php echo e(translate('unpaid')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <?php if(getWebConfig(name: 'order_verification')): ?>
                                        <span>
                                            <?php echo e(translate('order_verification_code')); ?> : <strong><?php echo e($order['verification_code']); ?></strong>
                                        </span>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <?php if($order->order_note !=null): ?>
                                <div class="mt-2 mb-5 w-100 d-block">
                                    <div class="gap-10">
                                        <h4><?php echo e(translate('order_Note')); ?>:</h4>
                                        <div class="text-justify"><?php echo e($order->order_note); ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="table-responsive datatable-custom">
                            <table
                                class="table fz-12 table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('item_details')); ?></th>
                                    <th><?php echo e(translate('item_price')); ?></th>
                                    <th><?php echo e(translate('tax')); ?></th>
                                    <th><?php echo e(translate('item_discount')); ?></th>
                                    <th><?php echo e(translate('total_price')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php ($item_price=0); ?>
                                <?php ($total_price=0); ?>
                                <?php ($subtotal=0); ?>
                                <?php ($total=0); ?>
                                <?php ($shipping=0); ?>
                                <?php ($discount=0); ?>
                                <?php ($tax=0); ?>
                                <?php ($row=0); ?>

                                <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        if($detail->product) {
                                            $productDetails = $detail->product;
                                        }else {
                                            $productDetails = json_decode($detail->product_details);
                                        }
                                    ?>
                                    <?php if($productDetails): ?>
                                        <tr>
                                            <td><?php echo e(++$row); ?></td>
                                            <td>
                                                <div class="media align-items-center gap-10">
                                                    <img class="avatar avatar-60 rounded" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'. $productDetails->thumbnail, type: 'backend-product')); ?>">
                                                    <div>
                                                        <h6 class="title-color"><?php echo e(substr($productDetails->name, 0, 30)); ?><?php echo e(strlen($productDetails->name)>10?'...':''); ?></h6>
                                                        <div><strong><?php echo e(translate('qty')); ?> :</strong> <?php echo e($detail['qty']); ?>

                                                        </div>
                                                        <div>
                                                            <strong><?php echo e(translate('unit_price')); ?> :</strong>
                                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $detail->price+( $detail->tax_model =='include' ? $detail->tax : 0)), currencyCode: getCurrencyCode())); ?>

                                                            <?php if($detail->tax_model =='include'): ?>
                                                                (<?php echo e(translate('tax_incl.')); ?>)
                                                            <?php else: ?>
                                                                (<?php echo e(translate('tax').":".($productDetails->tax)); ?><?php echo e($productDetails->tax_type ==="percent" ? '%' :''); ?>)
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if($detail->variant): ?>
                                                            <div><strong><?php echo e(translate('variation')); ?>

                                                                    :</strong> <?php echo e($detail['variant']); ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php if(isset($productDetails->digital_product_type) && $productDetails->digital_product_type == 'ready_after_sell'): ?>
                                                    <button type="button" class="btn btn-sm btn--primary mt-2"
                                                            title="File Upload" data-toggle="modal"
                                                            data-target="#fileUploadModal-<?php echo e($detail->id); ?>"
                                                    >
                                                        <i class="tio-file-outlined"></i> <?php echo e(translate('file')); ?>

                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $detail['price']*$detail['qty']), currencyCode: getCurrencyCode())); ?></td>
                                            <td>
                                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $detail['tax']), currencyCode: getCurrencyCode())); ?>

                                            </td>
                                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $detail['discount']), currencyCode: getCurrencyCode())); ?></td>

                                            <?php ($subtotal=$detail['price']*$detail['qty']+$detail['tax']-$detail['discount']); ?>
                                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $subtotal), currencyCode: getCurrencyCode())); ?></td>
                                        </tr>
                                        <?php ($item_price+=$detail['price']*$detail['qty']); ?>
                                        <?php ($discount+=$detail['discount']); ?>
                                        <?php ($tax+=$detail['tax']); ?>
                                        <?php ($total+=$subtotal); ?>
                                    <?php endif; ?>
                                    <?php ($sellerId=$detail->seller_id); ?>
                                    <?php if(isset($productDetails->digital_product_type) && $productDetails->digital_product_type == 'ready_after_sell'): ?>
                                        <div class="modal fade" id="fileUploadModal-<?php echo e($detail->id); ?>" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form
                                                        action="<?php echo e(route('vendor.orders.digital-file-upload-after-sell')); ?>"
                                                        method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="modal-body">
                                                            <?php if($detail->digital_file_after_sell): ?>
                                                                <div class="mb-4">
                                                                    <?php echo e(translate('uploaded_file')); ?> :
                                                                    <a href="<?php echo e(dynamicStorage(path: 'storage/app/public/product/digital-product/'.$detail->digital_file_after_sell)); ?>"
                                                                       class="btn btn-success btn-sm" title=" <?php echo e(translate('download')); ?>">
                                                                        <i class="tio-download"></i> <?php echo e(translate('download')); ?>

                                                                    </a>
                                                                </div>
                                                            <?php else: ?>
                                                                <h4 class="text-center"><?php echo e(translate('file_not_found').'!'); ?></h4>
                                                            <?php endif; ?>
                                                            <div class="inputDnD form-group input_image"
                                                                 data-title="<?php echo e(translate('drag_and_drop_file_or_Browse_file')); ?>">
                                                                <input type="file" name="digital_file_after_sell"
                                                                       class="form-control-file text--primary font-weight-bold readUrl"
                                                                       id="inputFile"
                                                                       accept=".jpg, .jpeg, .png, .gif, .zip, .pdf"
                                                                       data-title="<?php echo e(translate('drag_&_drop_file_or_browse_file')); ?>">
                                                            </div>
                                                            <div class="mt-1 text-info"><?php echo e(translate('file_type').':'.'jpg, jpeg, png, gif, zip, pdf'); ?>

                                                            </div>
                                                            <input type="hidden" value="<?php echo e($detail->id); ?>"
                                                                   name="order_id">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                                            <button type="submit"
                                                                    class="btn btn--primary"><?php echo e(translate('upload')); ?></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <?php ($shipping=$order['shipping_cost']); ?>
                        <?php ($coupon_discount=$order['discount_amount']); ?>
                        <hr/>
                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-9 col-lg-8">
                                <dl class="row gy-1 text-sm-right">
                                    <dt class="col-5"><?php echo e(translate('item_price')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $item_price), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-capitalize"><?php echo e(translate('item_discount')); ?></dt>
                                    <dd class="col-6 title-color">
                                        -
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $discount), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-capitalize"><?php echo e(translate('sub_total')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $item_price-$discount), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>
                                    <dt class="col-5">
                                        <?php echo e(translate('coupon_discount')); ?>

                                        <br>
                                        <?php echo e((!in_array($order['coupon_code'], [0, NULL]) ? '('.translate('expense_bearer_').($order['coupon_discount_bearer']=='inhouse' ? 'admin' : $order['coupon_discount_bearer']).')': '' )); ?>

                                    </dt>
                                    <dd class="col-6 title-color">
                                        -
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $coupon_discount), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-uppercase"><?php echo e(translate('vat')); ?>/<?php echo e(translate('tax')); ?></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $tax), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>
                                    <dt class="col-5 text-capitalize">
                                        <?php echo e(translate('delivery_fee')); ?>

                                        <br>
                                        <?php echo e(($order['is_shipping_free'] ? '('.translate('expense_bearer_').($order['free_delivery_bearer']).')': '' )); ?>

                                    </dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $shipping), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>

                                    <?php ($delivery_fee_discount = 0); ?>
                                    <?php if($order['is_shipping_free']): ?>
                                        <?php ($delivery_fee_discount = $shipping); ?>
                                    <?php endif; ?>
                                    <dt class="col-5"><strong><?php echo e(translate('total')); ?></strong></dt>
                                    <dd class="col-6 title-color">
                                        <strong><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $total+$shipping-$coupon_discount -$delivery_fee_discount), currencyCode: getCurrencyCode())); ?></strong>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex flex-column gap-3">
                <?php if($order->payment_method == 'offline_payment' && isset($order->offlinePayments)): ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                                <h4 class="d-flex gap-2">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/product_setup.png')); ?>" alt="" width="20">
                                    <?php echo e(translate('Payment_Information')); ?>

                                </h4>
                            </div>
                            <div>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td><?php echo e(translate('payment_Method')); ?></td>
                                        <td class="py-1 px-2">:</td>
                                        <td><strong><?php echo e(translate($order['payment_method'])); ?></strong></td>
                                    </tr>
                                    <?php $__currentLoopData = $order->offlinePayments->payment_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($item) && $key != 'method_id'): ?>
                                            <tr>
                                                <td><?php echo e(translate($key)); ?></td>
                                                <td class="py-1 px-2">:</td>
                                                <td><strong><?php echo e($item); ?></strong></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php if(isset($order->payment_note) && $order->payment_method == 'offline_payment'): ?>
                                <div class="payment-status mt-3">
                                    <h4><?php echo e(translate('payment_Note')); ?>:</h4>
                                    <p class="text-justify">
                                        <?php echo e($order->payment_note); ?>

                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body text-capitalize d-flex flex-column gap-4">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <h4 class="mb-0 text-center"><?php echo e(translate('order_&_Shipping_Info')); ?></h4>
                        </div>
                        <div>
                            <label
                                class="font-weight-bold title-color fz-14"><?php echo e(translate('change_order_status')); ?></label>
                            <select name="order_status" id="order_status" class="status form-control"
                                    data-id="<?php echo e($order['id']); ?>">
                                <option
                                    value="pending" <?php echo e($order->order_status == 'pending'?'selected':''); ?> > <?php echo e(translate('pending')); ?></option>
                                <option
                                    value="confirmed" <?php echo e($order->order_status == 'confirmed'?'selected':''); ?> > <?php echo e(translate('confirmed')); ?></option>
                                <option
                                    value="processing" <?php echo e($order->order_status == 'processing'?'selected':''); ?> ><?php echo e(translate('packaging')); ?> </option>

                                <?php ($shippingMethod=getWebConfig(name: 'shipping_method')); ?>
                                <?php if( $shippingMethod=='sellerwise_shipping'): ?>
                                    <option
                                        value="out_for_delivery" <?php echo e($order->order_status == 'out_for_delivery'?'selected':''); ?> ><?php echo e(translate('out_for_delivery')); ?> </option>
                                    <option
                                        value="delivered" <?php echo e($order->order_status == 'delivered'?'selected':''); ?> ><?php echo e(translate('delivered')); ?> </option>
                                    <option
                                        value="returned" <?php echo e($order->order_status == 'returned'?'selected':''); ?> > <?php echo e(translate('returned')); ?></option>
                                    <option
                                        value="failed" <?php echo e($order->order_status == 'failed'?'selected':''); ?> ><?php echo e(translate('failed_to_deliver')); ?> </option>
                                    <option
                                        value="canceled" <?php echo e($order->order_status == 'canceled'?'selected':''); ?> ><?php echo e(translate('canceled')); ?> </option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control flex-wrap h-100">
                            <span class="title-color">
                                <?php echo e(translate('payment_status')); ?>

                            </span>
                            <div class="d-flex justify-content-end min-w-100 align-items-center gap-2">
                                <span
                                    class="text--primary font-weight-bold"><?php echo e($order->payment_status=='paid' ? translate('paid'):translate('unpaid')); ?></span>
                                <label class="switcher payment-status-text <?php echo e($order->payment_method == 'cash_on_delivery' && $order['order_status'] != 'delivered' ? 'payment-status-alert' : ($order['payment_status'] == 'paid' ? 'payment-status-alert' : '')); ?>">
                                    <input class="switcher_input payment-status" type="checkbox" name="status"
                                           data-id="<?php echo e($order->id); ?>"
                                           value="<?php echo e($order->payment_status); ?>"
                                        <?php echo e($order->payment_method == 'cash_on_delivery'&& $order->order_status != 'delivered' ? 'disabled' : ($order->payment_status=='paid' ? 'disabled' : '')); ?>

                                        <?php echo e($order->payment_status=='paid' ? 'checked':''); ?> >
                                    <span class="switcher_control switcher_control_add
                                        <?php echo e($order->payment_status=='paid' ? 'checked':'unchecked'); ?>"></span>
                                </label>
                            </div>
                        </div>
                        <?php if($physicalProduct): ?>
                            <ul class="list-unstyled">
                                <?php if($order->shipping_type == 'order_wise'): ?>
                                    <li>
                                        <label class="font-weight-bold title-color fz-14">
                                            <?php echo e(translate('shipping_method')); ?>

                                            (<?php echo e($order->shipping ? $order->shipping->title : translate('no_shipping_method_selected')); ?>

                                            )
                                        </label>
                                    </li>
                                <?php endif; ?>
                                <?php if($shippingMethod=='sellerwise_shipping'): ?>
                                    <li>
                                        <select class="form-control text-capitalize" name="delivery_type"
                                                id="choose_delivery_type">
                                            <option value="0">
                                                <?php echo e(translate('choose_delivery_type')); ?>

                                            </option>

                                            <option
                                                value="self_delivery" <?php echo e($order->delivery_type=='self_delivery'?'selected':''); ?>>
                                                <?php echo e(translate('by_self_delivery_man')); ?>

                                            </option>
                                            <option
                                                value="third_party_delivery" <?php echo e($order->delivery_type=='third_party_delivery'?'selected':''); ?> >
                                                <?php echo e(translate('by_third_party_delivery_service')); ?>

                                            </option>
                                        </select>
                                    </li>
                                    <li id="choose_delivery_man" class="mt-3 choose_delivery_man">
                                        <label for="" class="font-weight-bold title-color fz-14">
                                            <?php echo e(translate('delivery_man')); ?>

                                        </label>
                                        <select class="form-control text-capitalize js-select2-custom"
                                                name="delivery_man_id" id="addDeliveryMan"
                                                data-order-id="<?php echo e($order['id']); ?>">
                                            <option
                                                value="0"><?php echo e(translate('select')); ?></option>
                                            <?php $__currentLoopData = $deliveryMen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryMan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    value="<?php echo e($deliveryMan['id']); ?>" <?php echo e($order['delivery_man_id']==$deliveryMan['id']?'selected':''); ?>>
                                                    <?php echo e($deliveryMan['f_name'].' '.$deliveryMan['l_name'].' ('.$deliveryMan['phone'].' )'); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if(isset($order->deliveryMan)): ?>
                                            <div class="p-2 bg-light rounded mt-4">
                                                <div class="media m-1 gap-3">
                                                    <img class="avatar rounded-circle"
                                                         src="<?php echo e(getvalidImage(path:'storage/app/public/delivery-man/'.$order?->deliveryMan->image ?? '',type: 'backend-profile')); ?>"
                                                         alt="Image">
                                                    <div class="media-body">
                                                        <h5 class="mb-1"><?php echo e($order->deliveryMan?->f_name.' '.$order->deliveryMan?->l_name); ?></h5>
                                                        <a href="tel:<?php echo e($order->deliveryMan?->phone); ?>"
                                                           class="fz-12 title-color"><?php echo e($order->deliveryMan?->phone); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="p-2 bg-light rounded mt-4">
                                                <div class="media m-1 gap-3">
                                                    <img class="avatar rounded-circle" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/delivery-man.png')); ?>" alt="<?php echo e(translate('image')); ?>">
                                                    <div class="media-body">
                                                        <h5 class="mt-3"><?php echo e(translate('no_delivery_man_assigned')); ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                    <?php if(isset($order->deliveryMan)): ?>
                                        <li class="choose_delivery_man mt-3">
                                            <label class="font-weight-bold title-color d-flex fz-14">
                                                <?php echo e(translate('delivery_man_incentive')); ?> (<?php echo e(session('currency_symbol')); ?>)
                                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('encourage_your_deliveryman_by_giving_him_incentive').' '.translate('this_amount_will_be_count_as_vendor_expense').'.'); ?>">
                                                    <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                                </span>
                                            </label>
                                            <div class="d-flex gap-2 align-items-center">
                                                <input type="number" value="<?php echo e(usdToDefaultCurrency(amount: $order->deliveryman_charge)); ?>"
                                                       name="deliveryman_charge" data-order-id="<?php echo e($order['id']); ?>"
                                                       class="form-control" placeholder="<?php echo e(translate('ex').': 20'); ?>" <?php echo e($order['order_status']=='delivered' ? 'readonly':''); ?> required>
                                                <button class="btn btn--primary <?php echo e($order['order_status']=='delivered' ? 'disabled deliveryman-charge-alert':'deliveryman-charge'); ?>"><?php echo e(translate('update')); ?></button>
                                            </div>
                                        </li>
                                        <li class="choose_delivery_man mt-3">
                                            <label class="font-weight-bold title-color fz-14">
                                                <?php echo e(translate('expected_delivery_date')); ?>

                                            </label>
                                            <input type="date"
                                                   value="<?php echo e($order->expected_delivery_date); ?>"
                                                   data-order-id="<?php echo e($order['id']); ?>"
                                                   name="expected_delivery_date"
                                                   id="expected_delivery_date"
                                                   class="form-control deliveryDateUpdate" required>
                                        </li>
                                    <?php endif; ?>

                                <?php endif; ?>
                                <li class=" mt-3" id="by_third_party_delivery_service_info">
                                    <div class="p-2 bg-light rounded mt-4">
                                        <div class="media m-1 gap-3">
                                            <img class="avatar rounded-circle" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/third-party-delivery.png')); ?>"
                                                 alt="<?php echo e(translate('image')); ?>">
                                            <div class="media-body">
                                                <h5 class=""><?php echo e($order->delivery_service_name ?? translate('not_assign_yet')); ?></h5>
                                                <span
                                                    class="fz-12 title-color"><?php echo e(translate('track_ID')); ?> :  <?php echo e($order->third_party_delivery_tracking_id); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(!$order->is_guest && $order->customer): ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                                <h4 class="d-flex gap-2">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/vendor-information.png')); ?>" alt="">
                                    <?php echo e(translate('customer_information')); ?>

                                </h4>
                            </div>
                            <div class="media">
                                <div class="mr-3">
                                    <img class="avatar rounded-circle avatar-70"
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/profile/'.$order->customer->image,type: 'backend-profile')); ?>"
                                         alt="<?php echo e(translate('image')); ?>">
                                </div>
                                <div class="media-body d-flex flex-column gap-1">
                                    <span class="title-color"><strong><?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?></strong></span>
                                    <span class="title-color">
                                    <strong><?php echo e($orderCount); ?> </strong>
                                    <?php echo e(translate('orders')); ?>

                                </span>
                                    <span class="title-color break-all"><strong><?php echo e($order->customer['phone']); ?></strong></span>
                                    <span class="title-color break-all"><?php echo e($order->customer['email']); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($physicalProduct): ?>
                    <div class="card">
                        <?php if($shippingAddress): ?>
                            <div class="card-body">
                                <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                                    <h4 class="d-flex gap-2">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/vendor-information.png')); ?>" alt="">
                                        <?php echo e(translate('shipping_address')); ?>

                                    </h4>
                                    <?php if($order['order_status'] != 'delivered'): ?>
                                        <button class="btn btn-outline-primary btn-sm square-btn" title="<?php echo e(translate('edit')); ?>"
                                                data-toggle="modal" data-target="#shippingAddressUpdateModal">
                                            <i class="tio-edit"></i>
                                        </button>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <div>
                                        <span><?php echo e(translate('name')); ?> :</span>
                                        <strong><?php echo e($shippingAddress->contact_person_name); ?></strong> <?php echo e($order->is_guest ? '('. translate('guest_customer') .')':''); ?>

                                    </div>
                                    <div>
                                        <span><?php echo e(translate('contact')); ?> :</span>
                                        <strong><?php echo e($shippingAddress->phone); ?></strong>
                                    </div>
                                    <?php if($order->is_guest && $shippingAddress->email): ?>
                                        <div>
                                            <span><?php echo e(translate('email')); ?> :</span>
                                            <strong><?php echo e($shippingAddress->email); ?></strong>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <span><?php echo e(translate('country')); ?> :</span>
                                        <strong><?php echo e($shippingAddress->country); ?></strong>
                                    </div>
                                    <div>
                                        <span><?php echo e(translate('city')); ?> :</span>
                                        <strong><?php echo e($shippingAddress->city); ?></strong>
                                    </div>
                                    <div>
                                        <span><?php echo e(translate('zip_code')); ?> :</span>
                                        <strong><?php echo e($shippingAddress->zip); ?></strong>
                                    </div>
                                    <div class="d-flex align-items-start gap-2">
                                        <img src="<?php echo e(asset('public/assets/back-end/img/location.png')); ?>" alt="">
                                        <?php echo e($shippingAddress->address); ?>

                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span><?php echo e(translate('no_customer_found')); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <?php ($billing=$order['billing_address_data']); ?>
                    <?php if($billing): ?>
                        <div class="card-body">
                            <div class="d-flex gap-2 align-items-center justify-content-between mb-4">
                                <h4 class="d-flex gap-2">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/vendor-information.png')); ?>" alt="">
                                    <?php echo e(translate('billing_address')); ?>

                                </h4>
                                <?php if($order['order_status'] !== 'delivered'): ?>
                                    <button class="btn btn-outline-primary btn-sm square-btn" title="Edit"
                                            data-toggle="modal" data-target="#billingAddressUpdateModal">
                                        <i class="tio-edit"></i>
                                    </button>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <span><?php echo e(translate('name')); ?> :</span>
                                    <strong><?php echo e($billing->contact_person_name); ?></strong> <?php echo e($order->is_guest ? '('. translate('guest_customer') .')':''); ?>

                                </div>
                                <div>
                                    <span><?php echo e(translate('contact')); ?> :</span>
                                    <strong><?php echo e($billing->phone); ?></strong>
                                </div>
                                <?php if($order->is_guest && $billing->email): ?>
                                    <div>
                                        <span><?php echo e(translate('email')); ?> :</span>
                                        <strong><?php echo e($billing->email); ?></strong>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span><?php echo e(translate('country')); ?> :</span>
                                    <strong><?php echo e($billing->country); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(translate('city')); ?> :</span>
                                    <strong><?php echo e($billing->city); ?></strong>
                                </div>
                                <div>
                                    <span><?php echo e(translate('zip_code')); ?> :</span>
                                    <strong><?php echo e($billing->zip); ?></strong>
                                </div>
                                <div class="d-flex align-items-start gap-2">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/location.png')); ?>" alt="">
                                    <?php echo e($billing->address); ?>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <span><?php echo e(translate('no_billing_address_found')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4 d-flex gap-2">
                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/shop-information.png')); ?>" alt="">
                            <?php echo e(translate('shop_Information')); ?>

                        </h4>
                        <div class="media">
                            <?php if(!empty($order->seller->shop)): ?>
                                <div class="mr-3">
                                    <img class="avatar rounded avatar-70"
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$order->seller->shop['image'],type: 'backend-basic')); ?>"
                                         alt="">
                                </div>
                                <div class="media-body d-flex flex-column gap-2">
                                    <h5><?php echo e($order->seller->shop->name); ?></h5>
                                    <span class="title-color"><strong><?php echo e($totalDelivered); ?></strong> <?php echo e(translate('orders_Served')); ?></span>
                                    <span
                                        class="title-color"> <strong><?php echo e($order->seller->shop->contact); ?></strong></span>
                                    <div class="d-flex align-items-start gap-2">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/location.png')); ?>" class="mt-1"
                                             alt="">
                                        <?php echo e($order->seller->shop->address); ?>

                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span><?php echo e(translate('no_data_found').'!'); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($order->verificationImages)): ?>
        <div class="modal fade" id="order_verification_modal" tabindex="-1" aria-labelledby="order_verification_modal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header pb-4">
                        <h3 class="mb-0"><?php echo e(translate('order_verification_images')); ?></h3>
                        <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i
                                class="tio-clear"></i></button>
                    </div>
                    <div class="modal-body px-4 px-sm-5 pt-0">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <div class="row gx-2">
                                <?php $__currentLoopData = $order->verificationImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-4 col-sm-6 ">
                                        <div class="mb-2 mt-2 border-1">
                                            <img src="<?php echo e(getValidImage(path:'storage/app/public/delivery-man/verification-image/'.$image->image,type: 'backend-basic')); ?>"
                                                class="w-100" alt="" >
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12">
                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-secondary px-5"
                                                data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($order['order_status'] != 'delivered'): ?>
        <div class="modal fade" id="shippingAddressUpdateModal" tabindex="-1" aria-labelledby="shippingAddressUpdateModal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header pb-4">
                        <h3 class="mb-0 text-center w-100"><?php echo e(translate('shipping_address')); ?></h3>
                        <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i
                                class="tio-clear"></i></button>
                    </div>
                    <div class="modal-body px-4 px-sm-5 pt-0">
                        <form action="<?php echo e(route('vendor.orders.address-update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex flex-column align-items-center gap-2">
                                <input name="address_type" value="shipping" hidden>
                                <input name="order_id" value="<?php echo e($order->id); ?>" hidden>
                                <div class="row gx-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"
                                                   class="title-color"><?php echo e(translate('contact_person_name')); ?></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                   value="<?php echo e($shippingAddress? $shippingAddress->contact_person_name : ''); ?>"
                                                   placeholder="<?php echo e(translate('ex').' '.':'.' '.translate('john_doe')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number"
                                                   class="title-color"><?php echo e(translate('phone_number')); ?></label>
                                            <input class="form-control form-control-user phone-input-with-country-picker"
                                                   type="tel"  value="<?php echo e($shippingAddress ? $shippingAddress->phone  : ''); ?>"
                                                   placeholder="<?php echo e(translate('ex').': 017xxxxxxxx'); ?>" required>
                                            <div class="">
                                                <input type="text" class="country-picker-phone-number w-50" value="<?php echo e($shippingAddress ? $shippingAddress->phone  : ''); ?>" name="phone_number" hidden readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country" class="title-color"><?php echo e(translate('country')); ?></label>
                                            <select name="country" id="country" class="form-control">
                                                <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <option
                                                        value="<?php echo e($country['name']); ?>" <?php echo e(isset($shippingAddress) && $country['name'] == $shippingAddress->country ? 'selected'  : ''); ?>><?php echo e($country['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <option value=""><?php echo e(translate('No_country_to_deliver')); ?></option>
                                                <?php endif; ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city" class="title-color"><?php echo e(translate('city')); ?></label>
                                            <input type="text" name="city" id="city"
                                                   value="<?php echo e($shippingAddress ? $shippingAddress->city : ''); ?>"
                                                   class="form-control"
                                                   placeholder="<?php echo e(translate('ex').' '.':'.' '.translate('dhaka')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="zip_code" class="title-color"><?php echo e(translate('zip')); ?></label>
                                            <?php if($zipRestrictStatus == 1): ?>
                                                <select name="zip" class="form-control" data-live-search="true" required>
                                                    <?php $__empty_1 = true; $__currentLoopData = $zipCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <option
                                                            value="<?php echo e($code->zipcode); ?>"<?php echo e(isset($shippingAddress) && $code->zipcode == $shippingAddress->zip ? 'selected'  : ''); ?>><?php echo e($code->zipcode); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <option value=""><?php echo e(translate('No_zip_to_deliver')); ?></option>
                                                    <?php endif; ?>
                                                </select>
                                            <?php else: ?>
                                                <input type="text" class="form-control"
                                                       value="<?php echo e($shippingAddress ? $shippingAddress->zip  : ''); ?>" id="zip"
                                                       name="zip"
                                                       placeholder="<?php echo e(translate('ex').' '.':'.' '.'1216'); ?>" <?php echo e($shippingAddress?'required':''); ?>>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address" class="title-color"><?php echo e(translate('address')); ?></label>
                                            <textarea name="address" id="address" name="address" rows="3"
                                                      class="form-control"
                                                      placeholder="<?php echo e(translate('ex').' '.':'.' '.translate('street_1,_street_2,_street_3,_street_4')); ?>"><?php echo e($shippingAddress ? $shippingAddress->address : ''); ?></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="latitude"
                                           name="latitude" class="form-control d-inline"
                                           placeholder="<?php echo e(translate('ex').' '.':'.' '.'-94.22213'); ?>"
                                           value="<?php echo e($shippingAddress->latitude ?? 0); ?>" required readonly>
                                    <input type="hidden"
                                           name="longitude" class="form-control"
                                           placeholder="<?php echo e(translate('ex').' '.':'.' '. '103.344322'); ?>" id="longitude"
                                           value="<?php echo e($shippingAddress->longitude??0); ?>" required readonly>
                                    <div class="col-12 ">
                                        <input id="pac-input" class="form-control rounded __map-input mt-1"
                                               title="<?php echo e(translate('search_your_location_here')); ?>" type="text"
                                               placeholder="<?php echo e(translate('search_here')); ?>"/>
                                        <div class="dark-support rounded w-100 __h-200px mb-5"
                                             id="location_map_canvas_shipping"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end gap-3">
                                            <button type="button" class="btn btn-secondary px-5"
                                                    data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                                            <button type="submit"
                                                    class="btn btn--primary px-5"><?php echo e(translate('update')); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if($billing): ?>
            <div class="modal fade" id="billingAddressUpdateModal" tabindex="-1" aria-labelledby="billingAddressUpdateModal"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header pb-4">
                            <h3 class="mb-0 text-center w-100"><?php echo e(translate('billing_address')); ?></h3>
                            <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i
                                    class="tio-clear"></i></button>
                        </div>
                        <div class="modal-body px-4 px-sm-5 pt-0">
                            <div class="d-flex flex-column align-items-center gap-2">
                                <form action="<?php echo e(route('vendor.orders.address-update')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <div class="d-flex flex-column align-items-center gap-2">
                                        <input name="address_type" value="billing" hidden>
                                        <input name="order_id" value="<?php echo e($order->id); ?>" hidden>
                                        <div class="row gx-2">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name"
                                                           class="title-color"><?php echo e(translate('contact_person_name')); ?></label>
                                                    <input type="text" name="name" id="name" class="form-control"
                                                           value="<?php echo e($billing? $billing->contact_person_name : ''); ?>"
                                                           placeholder="<?php echo e(translate('ex')); ?>: <?php echo e(translate('john_doe')); ?>"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone_number"
                                                           class="title-color"><?php echo e(translate('phone_number')); ?></label>
                                                    <input class="form-control form-control-user phone-input-with-country-picker-2"
                                                           type="tel" value="<?php echo e($billing ? $billing->phone  : ''); ?>"
                                                           placeholder="<?php echo e(translate('ex').': 017xxxxxxxx'); ?>" required>
                                                    <div class="">
                                                        <input type="text" class="country-picker-phone-number-2 w-50" value="<?php echo e($billing ? $billing->phone  : ''); ?>" name="phone_number" hidden readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country"
                                                           class="title-color"><?php echo e(translate('country')); ?></label>
                                                    <select name="country" id="country" class="form-control">
                                                        <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <option
                                                                value="<?php echo e($country['name']); ?>" <?php echo e(isset($billing) && $country['name'] == $billing->country ? 'selected'  : ''); ?>><?php echo e($country['name']); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <option
                                                                value=""><?php echo e(translate('No_country_to_deliver')); ?></option>
                                                        <?php endif; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="city" class="title-color"><?php echo e(translate('city')); ?></label>
                                                    <input type="text" name="city" id="city"
                                                           value="<?php echo e($billing ? $billing->city : ''); ?>" class="form-control"
                                                           placeholder="<?php echo e(translate('ex') .' '.':'.' '.translate('dhaka')); ?>"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="zip_code" class="title-color"><?php echo e(translate('zip')); ?></label>
                                                    <?php if($zipRestrictStatus == 1): ?>
                                                        <select name="zip" class="form-control" data-live-search="true"
                                                                required>
                                                            <?php $__empty_1 = true; $__currentLoopData = $zipCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <option
                                                                    value="<?php echo e($code->zipcode); ?>"<?php echo e(isset($billing) && $code->zipcode == $billing->zip ? 'selected'  : ''); ?>><?php echo e($code->zipcode); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <option
                                                                    value=""><?php echo e(translate('no_zip_to_deliver')); ?></option>
                                                            <?php endif; ?>
                                                        </select>
                                                    <?php else: ?>
                                                        <input type="text" class="form-control"
                                                               value="<?php echo e($billing ? $billing->zip  : ''); ?>" id="zip"
                                                               name="zip"
                                                               placeholder="<?php echo e(translate('ex').' '.':'.' '.'1216'); ?>" <?php echo e($billing?'required':''); ?>>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="address"
                                                           class="title-color"><?php echo e(translate('address')); ?></label>
                                                    <textarea name="address" id="billing_address" rows="3"
                                                              class="form-control"
                                                              placeholder="<?php echo e(translate('ex') .' '.':'.' '.translate('street_1,_street_2,_street_3,_street_4')); ?>"><?php echo e($billing ? $billing->address : ''); ?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="billing_latitude"
                                                   name="latitude" class="form-control d-inline"
                                                   placeholder="<?php echo e(translate('ex').' '.':'.' '.'-94.22213'); ?>"
                                                   value="<?php echo e($billing->latitude ?? 0); ?>" required readonly>
                                            <input type="hidden"
                                                   name="longitude" class="form-control"
                                                   placeholder="<?php echo e(translate('ex').' '.':'.' '. '103.344322'); ?>" id="billing_longitude"
                                                   value="<?php echo e($billing->longitude ?? 0); ?>" required readonly>
                                            <div class="col-12 ">
                                                <input id="billing-pac-input" class="form-control rounded __map-input mt-1"
                                                       title="<?php echo e(translate('search_your_location_here')); ?>" type="text"
                                                       placeholder="<?php echo e(translate('search_here')); ?>"/>
                                                <div class="rounded w-100 __h-200px mb-5"
                                                     id="location_map_canvas_billing"></div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex justify-content-end gap-3">
                                                    <button type="button" class="btn btn-secondary px-5"
                                                            data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                                                    <button type="submit"
                                                            class="btn btn--primary px-5"><?php echo e(translate('update')); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="locationModalLabel"><?php echo e(translate('location_data')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 modal_body_map">
                            <div class="location-map" id="location-map">
                                <div class="w-100 h-400" id="location_map_canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="third_party_delivery_service_modal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(translate('update_third_party_delivery_info')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo e(route('vendor.orders.update-deliver-info')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="order_id" value="<?php echo e($order['id']); ?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for=""><?php echo e(translate('delivery_service_name')); ?></label>
                                        <input class="form-control" type="text" name="delivery_service_name"
                                               value="<?php echo e($order['delivery_service_name']); ?>" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><?php echo e(translate('tracking_id')); ?> (<?php echo e(translate('optional')); ?>)</label>
                                        <input class="form-control" type="text" name="third_party_delivery_tracking_id"
                                               value="<?php echo e($order['third_party_delivery_tracking_id']); ?>" id="">
                                    </div>
                                    <button class="btn btn--primary" type="submit"><?php echo e(translate('update')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="payment-status-message" data-title="<?php echo e(translate('confirm_payments_before_change_the_status').'.'); ?>" data-message="<?php echo e(translate('change_the_status_paid_only_when_you_received_the_payment_from_customer').translate('_once_you_change_the_status_to_paid').','.translate('_you_cannot_change_the_status_again').'!'); ?>"></span>

    <span id="message-status-title-text" data-text="<?php echo e(translate("are_you_sure_change_this")); ?>"></span>
    <span id="message-status-subtitle-text" data-text="<?php echo e(translate("you_will_not_be_able_to_revert_this")); ?>!"></span>
    <span id="message-status-confirm-text" data-text="<?php echo e(translate("yes_change_it")); ?>!"></span>
    <span id="message-status-cancel-text" data-text="<?php echo e(translate("cancel")); ?>"></span>
    <span id="message-status-success-text" data-text="<?php echo e(translate("status_change_successfully")); ?>"></span>
    <span id="message-status-warning-text"
          data-text="<?php echo e(translate("account_has_been_deleted_you_can_not_change_the_status")); ?>"></span>

    <span id="message-order-status-delivered-text"
          data-text="<?php echo e(translate("order_is_already_delivered_you_can_not_change_it")); ?>!"></span>
    <span id="message-order-status-paid-first-text"
          data-text="<?php echo e(translate("before_delivered_you_need_to_make_payment_status_paid")); ?>!"></span>
    <span id="order-status-url" data-url="<?php echo e(route('vendor.orders.status')); ?>"></span>
    <span id="payment-status-url" data-url="<?php echo e(route('vendor.orders.payment-status')); ?>"></span>

    <span id="message-deliveryman-add-success-text"
          data-text="<?php echo e(translate("delivery_man_successfully_assigned/changed")); ?>"></span>
    <span id="message-deliveryman-add-error-text"
          data-text="<?php echo e(translate("deliveryman_man_can_not_assign_or_change_in_that_status")); ?>"></span>
    <span id="message-deliveryman-add-invalid-text" data-text="<?php echo e(translate("deliveryman_man_can_not_assign_or_change_in_that_status")); ?>"></span>
    <span id="delivery-type" data-type="<?php echo e($order->delivery_type); ?>"></span>
    <span id="add-delivery-man-url" data-url="<?php echo e(url('/vendor/orders/add-delivery-man/'.$order['id'])); ?>/"></span>

    <span id="message-deliveryman-charge-success-text"
          data-text="<?php echo e(translate("deliveryman_charge_add_successfully")); ?>"></span>
    <span id="message-deliveryman-charge-error-text"
          data-text="<?php echo e(translate("failed_to_add_deliveryman_charge")); ?>"></span>
    <span id="message-deliveryman-charge-invalid-text" data-text="<?php echo e(translate("add_valid_data")); ?>"></span>
    <span id="add-date-update-url" data-url="<?php echo e(route('vendor.orders.amount-date-update')); ?>"></span>

    <span id="customer-name" data-text="<?php echo e($order->customer['f_name']??""); ?> <?php echo e($order->customer['l_name']??""); ?>}"></span>
    <span id="is-shipping-exist" data-status="<?php echo e($shippingAddress ? 'true':'false'); ?>"></span>
    <span id="shipping-address" data-text="<?php echo e($shippingAddress->address??''); ?>"></span>
    <span id="shipping-latitude" data-latitude="<?php echo e($shippingAddress->latitude??'-33.8688'); ?>"></span>
    <span id="shipping-longitude" data-longitude="<?php echo e($shippingAddress->longitude??'151.2195'); ?>"></span>
    <span id="billing-latitude" data-latitude="<?php echo e($billing->latitude??'-33.8688'); ?>"></span>
    <span id="billing-longitude" data-longitude="<?php echo e($billing->longitude??'151.2195'); ?>"></span>
    <span id="location-icon" data-path="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/customer_location.png')); ?>"></span>
    <span id="customer-image" data-path="<?php echo e(dynamicStorage(path: 'storage/app/public/profile/')); ?><?php echo e($order->customer->image??""); ?>"></span>
    <span id="deliveryman-charge-alert-message" data-message="<?php echo e(translate('when_order_status_delivered_you_can`t_update_the_delivery_man_incentive').'.'); ?>"></span>
    <span id="payment-status-alert-message" data-message="<?php echo e($order->payment_method == 'cash_on_delivery' && $order->order_status != 'delivered' && $order->payment_status == 'unpaid' ? translate('when_payment_method_cash_on_delivery_and_order_status_not_delivered_then_you_can`t_change_payment_status_unpaid_to_paid').'.': translate('when_payment_status_paid_then_you_can`t_change_payment_status_paid_to_unpaid').'.'); ?>"></span>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(getWebConfig(name: 'map_api_key')); ?>&callback=map_callback_fucntion&libraries=places&v=3.49" defer></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/intl-tel-input/js/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/country-picker-init.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/vendor/order.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/order/order-details.blade.php ENDPATH**/ ?>