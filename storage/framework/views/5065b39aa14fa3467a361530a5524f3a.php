<?php $__env->startSection('title', translate('order_Details')); ?>

<?php $__env->startSection('content'); ?>

    <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl __inline-47 text-align-direction">
        <div class="row g-3">
            <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <section class="col-lg-9">
                <?php echo $__env->make('web-views.users-profile.account-details.partial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="bg-white border-lg rounded mobile-full">
                    <div class="p-lg-3 p-0">
                        <div class="d-flex justify-content-between gap-2 flex-wrap mb-3">
                            <?php if($order->order_type == 'default_type' && getWebConfig(name: 'order_verification')): ?>
                                <div class="d-flex gap-3 flex-wrap">
                                    <div class="bg-light rounded py-2 px-3 d-flex align-items-center">
                                        <div class="fs-14 text-capitalize">
                                            <?php echo e(translate('order_verification_code')); ?> : <strong
                                                class="text-base"><?php echo e($order['verification_code']); ?></strong>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($order->order_type == 'POS'): ?>
                                <div>
                                    <span class="pos-btn hover-none"><?php echo e(translate('POS_Order')); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="d-flex align-items-start gap-2">
                                <button type="button" class="btn btn-square d-none d-md-block get-view-by-onclick"
                                        data-link="<?php echo e(route('generate-invoice',[$order->id])); ?>">
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/downloads.png')); ?>" alt="">
                                </button>
                                <?php if($order->order_status=='delivered'): ?>
                                    <button
                                        class="btn btn--primary btn-sm h-40px rounded text_capitalize d-none d-md-block get-order-again-function"
                                        data-id="<?php echo e($order->id); ?>">
                                        <?php echo e(translate('reorder')); ?>

                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card border-sm">
                            <div class="p-lg-3">
                                <div class="border-lg rounded payment mb-lg-3 table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <thead>
                                        <tr class="order_table_tr">
                                            <td class="order_table_td">
                                                <div class="">
                                                    <div
                                                        class="_1 py-2 d-flex justify-content-between align-items-center">
                                                        <h6 class="fs-13 font-bold text-capitalize"><?php echo e(translate('payment_info')); ?></h6>
                                                        <button type="button" class="btn btn-square d-sm-none get-view-by-onclick"
                                                                data-link="<?php echo e(route('generate-invoice',[$order->id])); ?>">
                                                            <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/downloads.png')); ?>" alt="">
                                                        </button>
                                                    </div>
                                                    <div class="fs-12">
                                                        <span
                                                            class="text-muted text-capitalize"><?php echo e(translate('payment_status')); ?></span>
                                                        :
                                                        <span
                                                            class="text-<?php echo e($order['payment_status'] == 'paid' ? 'success' : 'danger'); ?> text-capitalize"><?php echo e($order['payment_status']); ?></span>
                                                    </div>
                                                    <div class="mt-2 fs-12">
                                                        <span
                                                            class="text-muted text-capitalize"><?php echo e(translate('payment_method')); ?></span>
                                                        :
                                                        <span
                                                            class="text-primary text-capitalize"><?php echo e(translate($order['payment_method'])); ?></span>
                                                    </div>
                                                    <?php if($order->payment_method == 'offline_payment' && isset($order->offlinePayments)): ?>
                                                        <button type="button"
                                                                class="btn bg-light border border-primary-light mt-3 rounded-pill btn-sm text-capitalize"
                                                                data-toggle="modal"
                                                                data-target="#verifyViewModal"><?php echo e(translate('see_payment_details')); ?></button>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <?php if( $order->order_type == 'default_type'): ?>

                                                <?php ($shippingAddressShow = 0); ?>
                                                <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($details->product_details) && json_decode($details->product_details)->product_type == "physical"): ?>
                                                        <?php ($shippingAddressShow = 1); ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php ($shipping=$order['shipping_address_data']); ?>
                                                <?php if($shipping && $shippingAddressShow): ?>
                                                    <td class="order_table_td">
                                                        <div class="">
                                                            <div class=" py-2">
                                                                <h6 class="fs-13 font-bold text-capitalize">
                                                                    <?php echo e(translate('shipping_address')); ?>:
                                                                </h6>
                                                            </div>
                                                            <div class="">
                                                                <span class="text-capitalize fs-12">
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"><?php echo e(translate('name')); ?></span> :&nbsp; <?php echo e($shipping->contact_person_name); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"><?php echo e(translate('phone')); ?></span> :&nbsp; <?php echo e($shipping->phone); ?>,
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px">
                                                                            <?php echo e(translate('city')); ?> / <?php echo e(translate('zip')); ?>

                                                                        </span> :&nbsp; <?php echo e($shipping->city); ?>, <?php echo e($shipping->zip); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px">
                                                                            <?php echo e(translate('address')); ?>

                                                                        </span> : <?php echo e($shipping->address); ?>

                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                                <td class="order_table_td">
                                                    <div class="">
                                                        <div class="py-2">
                                                            <h6 class="fs-13 font-bold text-capitalize">
                                                                <?php echo e(translate('billing_address')); ?>:
                                                            </h6>
                                                        </div>
                                                        <div class="">
                                                            <?php ($billing=$order['billing_address_data']); ?>
                                                            <span class="text-capitalize fs-12">
                                                                <?php if($billing): ?>
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"><?php echo e(translate('name')); ?></span> : &nbsp;<?php echo e($billing->contact_person_name); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"><?php echo e(translate('phone')); ?></span> : &nbsp;<?php echo e($billing->phone); ?>,
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px">
                                                                            <?php echo e(translate('city')); ?> / <?php echo e(translate('zip')); ?>

                                                                        </span> :&nbsp; <?php echo e($billing->city); ?>, <?php echo e($billing->zip); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span class="min-w-60px">
                                                                            <?php echo e(translate('address')); ?>

                                                                        </span> :&nbsp; <?php echo e($billing->address); ?>

                                                                    </span>
                                                                <?php else: ?>
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"><?php echo e(translate('name')); ?></span> : &nbsp;<?php echo e($shipping->contact_person_name); ?>

                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"><?php echo e(translate('phone')); ?></span> :&nbsp; <?php echo e($shipping->phone); ?>,
                                                                    </span>
                                                                    <br>
                                                                    <span class="text-capitalize">
                                                                        <span
                                                                            class="min-w-60px"> <?php echo e(translate('address')); ?></span> :&nbsp;
                                                                        <?php echo e($shipping->address); ?>,
                                                                        <?php echo e($shipping->city); ?>

                                                                        , <?php echo e($shipping->zip); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="payment mb-3 table-responsive d-none d-lg-block">
                                    <table class="table table-borderless min-width-600px">
                                        <thead class="thead-light text-capitalize">
                                        <tr class="fs-13 font-semibold">
                                            <th><?php echo e(translate('order_details')); ?></th>
                                            <th><?php echo e(translate('qty')); ?></th>
                                            <th class="text-right"><?php echo e(translate('price')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php ($product=json_decode($detail->product_details,true)); ?>
                                            <?php if($product): ?>
                                                <tr>
                                                    <td class="for-tab-img">
                                                        <div class="media gap-3 align-items-center">
                                                            <div class="position-relative border rounded overflow-hidden">
                                                                <?php if($product['discount'] > 0): ?>
                                                                    <span class="for-discount-value px-1 direction-ltr">
                                                                            <?php if($product['discount_type'] == 'percent'): ?>
                                                                            -<?php echo e(round($product['discount'],(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>

                                                                            %
                                                                        <?php elseif($product['discount_type'] =='flat'): ?>
                                                                            -<?php echo e(webCurrencyConverter(amount: $product['discount'])); ?>

                                                                        <?php endif; ?>
                                                                        </span>
                                                                <?php endif; ?>

                                                                <?php if($detail->productAllStatus): ?>
                                                                    <img class="d-block get-view-by-onclick"
                                                                         data-link="<?php echo e(route('product',$product['slug'])); ?>"
                                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$detail->productAllStatus['thumbnail'], type: 'product')); ?>"
                                                                         alt="<?php echo e(translate('product')); ?>" width="100">
                                                                <?php else: ?>
                                                                    <img class="d-block get-view-by-onclick"
                                                                         data-link="<?php echo e(route('product',$product['slug'])); ?>"
                                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'product')); ?>"
                                                                         alt="<?php echo e(translate('product')); ?>" width="100">
                                                                <?php endif; ?>
                                                            </div>

                                                            <div class="media-body">
                                                                <a href="<?php echo e(route('product',[$product['slug']])); ?>" class="fs-14 font-semibold">
                                                                    <?php echo e(isset($product['name']) ? Str::limit($product['name'], 60) : ''); ?>

                                                                </a>
                                                                <?php if($detail->refund_request == 1): ?>
                                                                    <small> (<?php echo e(translate('refund_pending')); ?>) </small>
                                                                    <br>
                                                                <?php elseif($detail->refund_request == 2): ?>
                                                                    <small> (<?php echo e(translate('refund_approved')); ?>) </small>
                                                                    <br>
                                                                <?php elseif($detail->refund_request == 3): ?>
                                                                    <small> (<?php echo e(translate('refund_rejected')); ?>) </small>
                                                                    <br>
                                                                <?php elseif($detail->refund_request == 4): ?>
                                                                    <small> (<?php echo e(translate('refund_refunded')); ?>) </small>
                                                                    <br>
                                                                <?php endif; ?>

                                                                <?php if($detail->variant): ?>
                                                                    <br>
                                                                    <small class="fs-12 text-secondary-50">
                                                                        <span class="font-bold"><?php echo e(translate('variant')); ?> : </span>
                                                                        <span class="font-semibold"><?php echo e($detail->variant); ?></span>
                                                                    </small>
                                                                <?php endif; ?>

                                                                <div class="d-flex flex-wrap gap-2 mt-2">
                                                                    <?php if($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_product'): ?>
                                                                        <a class="btn btn-sm rounded btn--primary action-digital-product-download"
                                                                           data-link="<?php echo e(route('digital-product-download', $detail->id)); ?>"
                                                                           href="javascript:"><?php echo e(translate('download')); ?>

                                                                            <i class="tio-download-from-cloud"></i></a>
                                                                    <?php elseif($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_after_sell'): ?>
                                                                        <?php if($detail->digital_file_after_sell): ?>
                                                                            <a class="btn btn-sm rounded btn--primary action-digital-product-download"
                                                                               data-link="<?php echo e(route('digital-product-download', $detail->id)); ?>"
                                                                               href="javascript:"><?php echo e(translate('download')); ?>

                                                                                <i class="tio-download-from-cloud"></i></a>
                                                                        <?php else: ?>

                                                                            <span class="" data-toggle="tooltip"
                                                                                  data-placement="top"
                                                                                  title="<?php echo e(translate('product_not_uploaded_yet')); ?>">
                                                                                    <a class="btn btn-sm rounded btn--primary disabled"><?php echo e(translate('download')); ?> <i
                                                                                            class="tio-download-from-cloud"></i></a>
                                                                                </span>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                        <?php
                                                                        $refund_day_limit = getWebConfig(name: 'refund_day_limit');
                                                                        $order_details_date = $detail->created_at;
                                                                        $current = \Carbon\Carbon::now();
                                                                        $length = $order_details_date->diffInDays($current);
                                                                        ?>

                                                                    <?php if($order->order_type == 'default_type'): ?>
                                                                        <?php if($order->order_status=='delivered'): ?>
                                                                            <?php if(isset($detail->product)): ?>
                                                                                <button type="button"
                                                                                        class="btn btn-sm rounded btn-warning"
                                                                                        data-toggle="modal"
                                                                                        data-target="#submitReviewModal<?php echo e($detail->id); ?>">
                                                                                    <?php if(isset($detail->reviewData)): ?>
                                                                                        <i class="tio-star-half"></i><?php echo e(translate('Update_Review')); ?>

                                                                                    <?php else: ?>
                                                                                        <i class="tio-star-half"></i><?php echo e(translate('review')); ?>

                                                                                    <?php endif; ?>
                                                                                </button>
                                                                            <?php endif; ?>

                                                                            <?php if($detail->refund_request !=0): ?>
                                                                                <button type="button"
                                                                                        class="btn btn-sm rounded btn--primary action-get-refund-details"
                                                                                        data-route="<?php echo e(route('refund-details', ['id'=>$detail->id])); ?>">
                                                                                        <?php echo e(translate('refund_details')); ?>

                                                                                    </button>
                                                                            <?php endif; ?>
                                                                            <?php if( $length <= $refund_day_limit && $detail->refund_request == 0): ?>
                                                                                <button
                                                                                    class="btn btn-sm rounded btn--primary"
                                                                                    data-toggle="modal"
                                                                                    data-target="#refundModal<?php echo e($detail->id); ?>"><?php echo e(translate('refund')); ?></button>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="pl-2">
                                                            <span class="word-nobreak font-weight-bold">
                                                                <?php echo e($detail->qty); ?>

                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td class="text-right align-middle">
                                                        <span class="font-weight-bold amount">
                                                            <?php echo e(webCurrencyConverter(amount: $detail->price)); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="pt-2 d-flex flex-column gap-2 d-lg-none">
                            <hr>
                            <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php ($product=json_decode($detail->product_details,true)); ?>
                                <?php if($product): ?>
                                    <div class="bg-white border rounded p-3">
                                        <div class="d-flex justify-content-between gap-3">
                                            <div class="for-tab-img">
                                                <div class="media flex-wrap gap-2">
                                                    <div class="position-relative border rounded overflow-hidden">
                                                        <?php if($product['discount'] > 0): ?>
                                                            <span class="for-discount-value px-1 direction-ltr">
                                                                <?php if($product['discount_type'] == 'percent'): ?>
                                                                    -<?php echo e(round($product['discount'],(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>

                                                                    %
                                                                <?php elseif($product['discount_type'] =='flat'): ?>
                                                                    -<?php echo e(webCurrencyConverter(amount: $product['discount'])); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        <?php endif; ?>
                                                        <img class="d-block get-view-by-onclick"
                                                             data-link="<?php echo e(route('product',$product['slug'])); ?>"
                                                             src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'product')); ?>"
                                                             alt="<?php echo e(translate('product')); ?>" width="80">
                                                    </div>

                                                    <div class="media-body">
                                                        <a href="<?php echo e(route('product',[$product['slug']])); ?>" class="fs-14">
                                                            <?php echo e(isset($product['name']) ? Str::limit($product['name'],40) : ''); ?>

                                                        </a>
                                                        <?php if($detail->refund_request == 1): ?>
                                                            <small> (<?php echo e(translate('refund_pending')); ?>) </small>
                                                        <?php elseif($detail->refund_request == 2): ?>
                                                            <small> (<?php echo e(translate('refund_approved')); ?>) </small>
                                                        <?php elseif($detail->refund_request == 3): ?>
                                                            <small> (<?php echo e(translate('refund_rejected')); ?>) </small>
                                                        <?php elseif($detail->refund_request == 4): ?>
                                                            <small> (<?php echo e(translate('refund_refunded')); ?>) </small>
                                                        <?php endif; ?><br>
                                                        <span class="d-flex justify-content-between">
                                                            <?php if($detail->variant): ?>
                                                                <small>
                                                                    <span
                                                                        class="text-muted"><?php echo e(translate('variant')); ?> : </span>
                                                                    <?php echo e($detail->variant); ?>

                                                                </small>
                                                            <?php endif; ?>
                                                            <small>
                                                                <span class="text-muted"><?php echo e(translate('qty')); ?> : </span>
                                                                <?php echo e($detail->qty); ?>

                                                            </small>
                                                        </span>

                                                        <small class="d-flex align-items-center gap-2">
                                                            <span class="text-nowrap text-muted">
                                                                <?php echo e(translate('price')); ?> :
                                                            </span>
                                                            <span class="font-weight-bold amount">
                                                                <?php echo e(webCurrencyConverter(amount: $detail->price)); ?>

                                                            </span>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end flex-wrap gap-2 mt-2">
                                            <?php if($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_product'): ?>
                                                <a class="btn btn-sm rounded btn--primary action-digital-product-download"
                                                   data-link="<?php echo e(route('digital-product-download', $detail->id)); ?>"
                                                   href="javascript:"><?php echo e(translate('download')); ?> <i
                                                        class="tio-download-from-cloud"></i></a>
                                            <?php elseif($detail->product && $order->payment_status == 'paid' && $detail->product->digital_product_type == 'ready_after_sell'): ?>
                                                <?php if($detail->digital_file_after_sell): ?>
                                                    <a class="btn btn-sm rounded btn--primary action-digital-product-download"
                                                       data-link="<?php echo e(route('digital-product-download', $detail->id)); ?>"
                                                       href="javascript:"><?php echo e(translate('download')); ?> <i
                                                            class="tio-download-from-cloud"></i></a>
                                                <?php else: ?>

                                                    <span class="" data-toggle="tooltip" data-placement="top"
                                                          title="<?php echo e(translate('product_not_uploaded_yet')); ?>">
                                                        <a class="btn btn-sm rounded btn--primary disabled"><?php echo e(translate('download')); ?> <i
                                                                class="tio-download-from-cloud"></i></a>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                                <?php
                                                $refund_day_limit = getWebConfig(name: 'refund_day_limit');
                                                $order_details_date = $detail->created_at;
                                                $current = \Carbon\Carbon::now();
                                                $length = $order_details_date->diffInDays($current);
                                                ?>

                                            <?php if($order->order_type == 'default_type'): ?>
                                                <?php if($order->order_status=='delivered'): ?>
                                                    <?php if(isset($detail->product)): ?>
                                                        <button type="button" class="btn btn-sm rounded btn-warning"
                                                                data-toggle="modal"
                                                                data-target="#submitReviewModal<?php echo e($detail->id); ?>">
                                                            <?php if(isset($detail->reviewData)): ?>
                                                                <i class="tio-star-half"></i><?php echo e(translate('Update_Review')); ?>

                                                            <?php else: ?>
                                                                <i class="tio-star-half"></i><?php echo e(translate('review')); ?>

                                                            <?php endif; ?>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if($detail->refund_request !=0): ?>
                                                        <button type="button" class="btn btn-sm rounded btn--primary action-get-refund-details"
                                                                data-route="<?php echo e(route('refund-details',['id'=>$detail->id])); ?>">
                                                                <?php echo e(translate('refund_details')); ?>

                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if( $length <= $refund_day_limit && $detail->refund_request == 0): ?>
                                                        <button class="btn btn-sm rounded btn--primary"
                                                            data-toggle="modal" data-target="#refundModal<?php echo e($detail->id); ?>">
                                                            <?php echo e(translate('refund')); ?>

                                                        </button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <hr>
                        </div>

                        <?php ($summary = getOrderSummary(order: $order)); ?>
                        <?php
                        if ($order['extra_discount_type'] == 'percent') {
                            $extra_discount = ($summary['subtotal'] / 100) * $order['extra_discount'];
                        } else {
                            $extra_discount = $order['extra_discount'];
                        }
                        ?>
                        <div class="row d-flex justify-content-end mt-2">
                            <div class="col-md-8 col-lg-5">
                                <div class="bg-white border-sm rounded">
                                    <div class="card-body ">
                                        <table class="calculation-table table table-borderless mb-0">
                                            <tbody class="totals">
                                            <tr>
                                                <td>
                                                    <div class="text-start">
                                                        <span class="product-qty "><?php echo e(translate('item')); ?></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <span class="fs-15 font-semibold"><?php echo e($order->total_qty); ?></span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="text-start">
                                                        <span class="product-qty"><?php echo e(translate('subtotal')); ?></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <span class="fs-15 font-semibold"><?php echo e(webCurrencyConverter(amount: $summary['subtotal'])); ?></span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="text-start">
                                                        <span class="product-qty">
                                                            <?php echo e(translate('tax_fee')); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <span class="fs-15 font-semibold">
                                                            <?php echo e(webCurrencyConverter(amount: $summary['total_tax'])); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php if($order->order_type == 'default_type'): ?>
                                                <tr>
                                                    <td>
                                                        <div class="text-start">
                                                            <span class="product-qty">
                                                                <?php echo e(translate('shipping_Fee')); ?>

                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-end">
                                                            <span class="fs-15 font-semibold">
                                                                <?php echo e(webCurrencyConverter(amount: $summary['total_shipping_cost'] - ($order['is_shipping_free'] ? $order['extra_discount'] : 0))); ?>

                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>

                                            <tr>
                                                <td>
                                                    <div class="text-start">
                                                        <span class="product-qty">
                                                            <?php echo e(translate('discount_on_product')); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <span class="fs-15 font-semibold">
                                                            - <?php echo e(webCurrencyConverter(amount: $summary['total_discount_on_product'])); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="text-start">
                                                        <span class="product-qty">
                                                            <?php echo e(translate('coupon_discount')); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <span class="fs-15 font-semibold">
                                                            - <?php echo e(webCurrencyConverter(amount: $order->discount_amount)); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php if($order->order_type != 'default_type'): ?>
                                                <tr>
                                                    <td>
                                                        <div class="text-start">
                                                            <span class="product-qty">
                                                                <?php echo e(translate('extra_discount')); ?>

                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-end">
                                                            <span class="fs-15 font-semibold">
                                                                - <?php echo e(webCurrencyConverter(amount: $extra_discount)); ?>

                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>

                                            <tr class="border-top">
                                                <td>
                                                    <div class="text-start">
                                                        <span class="font-weight-bold">
                                                            <strong><?php echo e(translate('total')); ?></strong>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-end">
                                                        <span class="font-weight-bold amount">
                                                            <?php echo e(webCurrencyConverter(amount: $order->order_amount)); ?>

                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <?php if($order['order_status']=='pending'): ?>
                                            <button class="btn btn-soft-danger btn-soft-border w-100 btn-sm text-danger font-semibold text-capitalize mt-3 call-route-alert"
                                                data-route="<?php echo e(route('order-cancel',[$order->id])); ?>"
                                                data-message="<?php echo e(translate('want_to_cancel_this_order?')); ?>">
                                                <?php echo e(translate('cancel_order')); ?>

                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($product=json_decode($detail->product_details,true)); ?>
        <?php if($product): ?>
            <?php echo $__env->make('layouts.front-end.partials.modal._review',['id'=>$detail->id,'order_details'=>$detail], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.front-end.partials.modal._refund',['id'=>$detail->id,'order_details'=>$detail,'order'=>$order,'product'=>$product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($order->order_status=='delivered'): ?>
        <div class="bottom-sticky_offset"></div>
        <div class="bottom-sticky_ele bg-white d-md-none p-3 ">
            <button class="btn btn--primary w-100 text_capitalize get-order-again-function" data-id="<?php echo e($order->id); ?>">
                <?php echo e(translate('reorder')); ?>

            </button>
        </div>
    <?php endif; ?>

    <?php if($order->payment_method == 'offline_payment' && isset($order->offlinePayments)): ?>
        <div class="modal fade" id="verifyViewModal" tabindex="-1" aria-labelledby="verifyViewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content rtl">
                    <div class="modal-header d-flex justify-content-end  border-0 pb-0">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" class="tio-clear"></span>
                        </button>
                    </div>

                    <div class="modal-body pt-0">
                        <h5 class="mb-3 text-center text-capitalize"><?php echo e(translate('payment_verification')); ?></h5>

                        <div class="shadow-sm rounded p-3">
                            <h6 class="mb-3 text-capitalize"><?php echo e(translate('customer_information')); ?></h6>

                            <div class="d-flex flex-column gap-2 fs-12">
                                <div class="d-flex align-items-center gap-2">
                                    <span><?php echo e(translate('name')); ?></span>:
                                    <span class="text-dark"> <a class="text-body text-capitalize" href="Javascript:"> <?php echo e($order->customer->f_name ?? transalte('name_not_found')); ?>&nbsp;<?php echo e($order->customer->l_name ?? ''); ?>  </a>  </span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span><?php echo e(translate('phone')); ?></span>:
                                    <span
                                        class="text-dark"><?php echo e($order->customer->phone ?? translate('number_not_found')); ?></span>
                                </div>
                            </div>

                            <div class="mt-5">
                                <h6 class="mb-3 text-capitalize"><?php echo e(translate('payment_information')); ?></h6>

                                <div class="d-flex flex-column gap-2 fs-12">

                                    <?php $__currentLoopData = $order->offlinePayments->payment_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key != 'method_id'): ?>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="text-capitalize"><?php echo e(translate($key)); ?></span>:
                                                <span class="text-dark"> <a class="text-body text-capitalize"
                                                                            href="#"> <?php echo e($value); ?>  </a>  </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($order->payment_note): ?>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-capitalize"><?php echo e(translate('payment_none')); ?></span>:
                                        <span class="text-dark"> <?php echo e($order->payment_note); ?>  </span>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="modal fade" id="refund_details_modal" tabindex="-1" aria-labelledby="refundRequestModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h6 class="text-center text-capitalize m-0 flex-grow-1"><?php echo e(translate('refund_details')); ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body d-flex flex-column gap-3" id="refund_details_field">

                </div>
            </div>
        </div>
    </div>

    <span id="message-ratingContent"
          data-poor="<?php echo e(translate('poor')); ?>"
          data-average="<?php echo e(translate('average')); ?>"
          data-good="<?php echo e(translate('good')); ?>"
          data-good-message="<?php echo e(translate('the_delivery_service_is_good')); ?>"
          data-good2="<?php echo e(translate('very_Good')); ?>"
          data-good2-message="<?php echo e(translate('this_delivery_service_is_very_good_I_am_highly_impressed')); ?>"
          data-excellent="<?php echo e(translate('excellent')); ?>"
          data-excellent-message="<?php echo e(translate('best_delivery_service_highly_recommended')); ?>"
    ></span>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/account-order-details.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/account-order-details.blade.php ENDPATH**/ ?>