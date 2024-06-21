<?php $__env->startSection('title', translate('refund_details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/refund_transaction.png')); ?>" alt="">
                <?php echo e(translate('refund_details')); ?>

            </h2>
        </div>
        <div class="refund-details-card--2 p-4">
            <div class="row gy-2">
            <div class="col-lg-4">
                <div class="card h-100 refund-details-card">
                    <div class="card-body">
                        <h4 class="mb-3"><?php echo e(translate('refund_summary')); ?></h4>
                        <ul class="dm-info p-0 m-0">
                            <li class="align-items-center">
                                <span class="left"><?php echo e(translate('refund_id')); ?> </span> <span>:</span> <span class="right"><?php echo e($refund->id); ?></span>
                            </li>
                            <li class="align-items-center">
                                <span class="left text-capitalize"><?php echo e(translate('refund_requested_date')); ?></span>
                                <span>:</span>
                                <span class="right"><?php echo e(date('d M Y, h:s:A',strtotime($refund['created_at']))); ?></span>
                            </li>
                            <li class="align-items-center">
                                <span class="left"><?php echo e(translate('refund_status')); ?></span> <span>:</span> <span class="right">
                                    <?php if($refund['status'] == 'pending'): ?>
                                        <span class="badge badge-secondary-2"> <?php echo e(translate($refund['status'])); ?></span>
                                    <?php elseif($refund['status'] == 'approved'): ?>
                                        <span class="badge badge--primary-2"> <?php echo e(translate($refund['status'])); ?></span>
                                    <?php elseif($refund['status'] == 'refunded'): ?>
                                        <span class="badge badge-success-2"> <?php echo e(translate($refund['status'])); ?></span>
                                    <?php elseif($refund['status'] == 'rejected'): ?>
                                        <span class="badge badge--danger-2"> <?php echo e(translate($refund['status'])); ?></span>
                                    <?php endif; ?>
                                </span>
                            </li>
                            <li class="align-items-center">
                                <span class="left"><?php echo e(translate('payment_method')); ?> </span> <span>:</span> <span class="right"><?php echo e(str_replace('_',' ',$order->payment_method)); ?></span>
                            </li>
                            <li class="align-items-center">
                                <span class="left"><?php echo e(translate('order_details')); ?> </span> <span>:</span> <span class="right"><a class="badge py-2 badge-soft-primary border border-primary px-2" href="<?php echo e(route('admin.orders.details',['id'=>$order->id])); ?>"><?php echo e(translate('view_details')); ?></a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100 refund-details-card">
                    <div class="card-body">
                        <div class="gap-3 mb-4 d-flex justify-content-between flex-wrap align-items-center">
                            <h4 class=""><?php echo e(translate('product_details')); ?></h4>
                            <div class="d-flex flex-wrap gap-3">
                                <?php if($refund['status'] != 'refunded'): ?>
                                    <?php if($refund['status'] != 'rejected'): ?>
                                        <button class="btn btn-soft-danger p-2 px-3" data-toggle="modal" data-target="#rejectModal">
                                            <?php echo e(translate('reject')); ?>

                                        </button>
                                    <?php endif; ?>
                                    <?php if($refund['status'] != 'approved'): ?>
                                        <button class="btn btn-soft-primary p-2 px-3" data-toggle="modal" data-target="#approveModal">
                                            <?php echo e(translate('approve')); ?>

                                        </button>
                                    <?php endif; ?>
                                    <button class="btn btn-soft-success p-2 px-3" data-toggle="modal" data-target="#refundModal">
                                        <?php echo e(translate('refund')); ?>

                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="refund-details">
                            <div class="img">
                                <div class="onerror-image border rounded">
                                    <img src="<?php echo e(getValidImage(path:  'storage/app/public/product/thumbnail/'.($refund->product ? $refund->product->thumbnail:''),type: 'backend-product')); ?>" alt="">
                                </div>
                            </div>
                            <div class="--content flex-grow-1">
                                <h4>
                                    <?php if($refund->product!=null): ?>
                                        <a href="<?php echo e(route('admin.products.view',['addedBy'=>$refund->product->added_by,'id'=>$refund->product->id])); ?>">
                                            <?php echo e($refund->product->name); ?>

                                        </a>
                                    <?php else: ?>
                                        <?php echo e(translate('product_name_not_found')); ?>

                                    <?php endif; ?>
                                </h4>
                                <?php if($refund->orderDetails->variant): ?>
                                    <div class="font-size-sm text-body">
                                        <strong><u><?php echo e(translate('variation')); ?></u></strong>
                                        <span>:</span>
                                        <span class="font-weight-bold"><?php echo e($refund->orderDetails->variant); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if($refund->orderDetails->digital_file_after_sell): ?>
                                    <a href="<?php echo e(dynamicStorage(path: 'storage/app/public/product/digital-product/'.$refund->orderDetails->digital_file_after_sell)); ?>" class="btn btn-outline--primary btn-sm mt-3" title="<?php echo e(translate('download')); ?>">
                                        <?php echo e(translate('download')); ?> <i class="tio-download"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <ul class="dm-info p-0 m-0 w-l-115">
                                <li>
                                    <span class="left"><?php echo e(translate('QTY')); ?></span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e($refund->orderDetails->qty); ?>

                                        </strong>
                                    </span>
                                </li>
                                <li>
                                    <span class="left"><?php echo e(translate('total_price')); ?> </span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refund->orderDetails->price*$refund->orderDetails->qty), currencyCode: getCurrencyCode())); ?>

                                        </strong>
                                    </span>
                                </li>
                                <li>
                                    <span class="left"><?php echo e(translate('total_discount')); ?> </span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refund->orderDetails->discount), currencyCode: getCurrencyCode())); ?>

                                        </strong>
                                    </span>
                                </li>
                                <li>
                                    <span class="left"><?php echo e(translate('coupon_discount')); ?> </span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $couponDiscount), currencyCode: getCurrencyCode())); ?>

                                        </strong>
                                    </span>
                                </li>

                                <li>
                                    <span class="left"><?php echo e(translate('total_tax')); ?> </span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refund->orderDetails->tax), currencyCode: getCurrencyCode())); ?>

                                        </strong>
                                    </span>
                                </li>

                                <li>
                                    <span class="left"><?php echo e(translate('subtotal')); ?> </span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $subtotal), currencyCode: getCurrencyCode())); ?>

                                        </strong>
                                    </span>
                                </li>

                                <li>
                                    <span class="left"><?php echo e(translate('refundable_amount')); ?> </span>
                                    <span>:</span>
                                    <span class="right">
                                        <strong>
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refundAmount), currencyCode: getCurrencyCode())); ?>

                                        </strong>
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="<?php echo e($order?->seller ? 'col-sm-4' : 'col-sm-6'); ?>">
                <div class="card h-100 refund-details-card--2">
                    <div class="card-body">
                        <h4 class="mb-3 text-capitalize"><?php echo e(translate('refund_reason_by_customer')); ?></h4>
                        <p>
                            <?php echo e($refund->refund_reason); ?>

                        </p>
                        <?php if($refund->images): ?>
                            <div class="gallery grid-gallery">
                                <?php $__currentLoopData = json_decode($refund->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(getValidImage(path: 'storage/app/public/refund/'.$photo,type:'backend-basic')); ?>"
                                       data-lightbox="mygallery" class="d-flex">
                                        <img src="<?php echo e(getValidImage(path: 'storage/app/public/refund/'.$photo,type:'backend-basic')); ?>" width="65" alt="">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($order?->seller): ?>
                <div class="col-sm-4">
                    <div class="card h-100 refund-details-card--2">
                        <div class="card-body">
                            <h4 class="mb-3 text-capitalize"><?php echo e(translate('vendor_info')); ?></h4>
                            <div class="key-val-list d-flex flex-column gap-2 min-width--60px">
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('shop_name')); ?></span>:
                                    <span><?php echo e($order->seller?->shop->name ?? translate('no_data_found')); ?></span>
                                </div>
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('email_address')); ?></span>:
                                    <span>
                                        <a class="text-dark"
                                              href="mailto:<?php echo e($order->seller->email); ?>"><?php echo e($order->seller?->email ?? translate('no_data_found')); ?>

                                        </a>
                                    </span>
                                </div>
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('phone_number')); ?> </span>:
                                    <span>
                                        <a class="text-dark"
                                           href="tel:<?php echo e($order->seller->phone); ?>"><?php echo e($order->seller?->phone ?? translate('no_data_found')); ?>

                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="<?php echo e($order?->seller ? 'col-sm-4' : 'col-sm-6'); ?>">
                <div class="card h-100 refund-details-card--2">
                    <div class="card-body">
                        <h4 class="mb-3 text-capitalize"><?php echo e(translate('deliveryman_info')); ?></h4>
                        <div class="key-val-list d-flex flex-column gap-2 min-width--60px">
                            <?php if($order->deliveryMan): ?>
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('name')); ?></span>:
                                    <span><?php echo e($order->deliveryMan->f_name . ' ' .$order->deliveryMan->l_name); ?></span>
                                </div>
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('email_address')); ?></span>:
                                    <span>
                                        <a class="text-dark"
                                           href="mailto:<?php echo e($order->deliveryMan->email); ?>"><?php echo e($order->deliveryMan?->email); ?>

                                        </a>
                                    </span>
                                </div>
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('phone_number')); ?> </span>:
                                    <span>
                                        <a class="text-dark"
                                           href="tel:<?php echo e($order->deliveryMan->phone); ?>"><?php echo e($order->deliveryMan?->phone); ?>

                                        </a>
                                    </span>
                                </div>
                            <?php else: ?>
                                <div class="key-val-list-item d-flex gap-3">
                                    <span class="text-capitalize"><?php echo e(translate('Info')); ?></span>:
                                    <strong class="right text-capitalize"><?php echo e(translate('delivery_man_not_assigned').'.'); ?></strong>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card refund-details-card--2">
                    <div class="card-body ">
                        <h4 class="mb-3"><?php echo e(translate('refund_status_changed_log')); ?></h4>
                        <div class="table-responsive datatable-custom">
                            <table
                                class="table table-hover text-center table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('changed_by')); ?></th>
                                    <th><?php echo e(translate('Date')); ?></th>
                                    <th><?php echo e(translate('status')); ?></th>
                                    <th><?php echo e(translate('approved_/_rejected_note')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $refund->refundStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($key+1); ?>

                                        </td>
                                        <td class="text-capitalize">
                                            <?php echo e($status->change_by == 'seller' ? 'vendor' : $status->change_by); ?>

                                        </td>
                                        <td><?php echo e(date('d M Y, h:s:A',strtotime($refund['created_at']))); ?></td>
                                        <td class="text-capitalize">
                                            <?php echo e(translate($status->status)); ?>

                                        </td>
                                        <td class="text-break">
                                            <div class="word-break max-w-360px mx-auto">
                                                <?php echo e($status->message); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if(count($refund->refundStatus)==0): ?>
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                         alt="<?php echo e(translate('image_description')); ?>">
                                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="rejectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.refund-section.refund.refund-status-update')); ?>" method="post" id="submit-rejected-form">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo e($refund->id); ?>">
                        <input type="hidden" name="refund_status" value="rejected">
                        <div class="text-center">
                            <img class="mb-3" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/refund-reject.png')); ?>" alt="<?php echo e(translate('refund_reject')); ?>">
                            <h4 class="mb-4 mx-auto max-w-283 text-capitalize">
                                <?php echo e(translate('rejection_note')); ?>

                            </h4>
                        </div>
                        <textarea class="form-control text-area-max-min" placeholder="<?php echo e(translate('please_write_the_reject_reason').'...'); ?>" name="rejected_note" rows="3"></textarea>
                        <div class="d-flex flex-wrap justify-content-end gap-3 mt-3">
                            <button type="button" class="btn btn-secondary px-3" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                            <button type="button" class="btn btn--primary form-submit" data-form-id="submit-rejected-form" data-message="<?php echo e(translate('want_to_reject_this_refund_request').'?'); ?>"  data-redirect-route="<?php echo e(route('admin.refund-section.refund.list',['status'=>$refund['status']])); ?>"><?php echo e(translate('submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="approveModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.refund-section.refund.refund-status-update')); ?>" method="post" id="submit-approve-form">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo e($refund->id); ?>">
                        <input type="hidden" name="refund_status" value="approved">
                        <div class="text-center ">
                            <img class="mb-3" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/refund-approve.png')); ?>" alt="<?php echo e(translate('refund_approve')); ?>">
                            <h4 class="mb-4 mx-auto max-w-283 text-capitalize">
                                <?php echo e(translate('approval_note')); ?>

                            </h4>
                        </div>
                        <textarea class="form-control text-area-max-min" placeholder="<?php echo e(translate('please_write_the_approve_reason').'...'); ?>" name="approved_note" rows="3"></textarea>
                        <div class="d-flex flex-wrap justify-content-end gap-3 mt-3">
                            <button type="button" class="btn btn-secondary px-3" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                            <button type="button" class="btn btn--primary form-submit" data-form-id="submit-approve-form" data-message="<?php echo e(translate('want_to_approve_this_refund_request').'?'); ?>" data-redirect-route="<?php echo e(route('admin.refund-section.refund.list',['status'=>$refund['status']])); ?>"><?php echo e(translate('submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="refundModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo e(route('admin.refund-section.refund.refund-status-update')); ?>" method="post" id="submit-refund-form">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo e($refund->id); ?>">
                        <input type="hidden" name="refund_status" value="refunded">
                        <div class="text-center">
                            <img class="mb-3" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/refund-approve.png')); ?>" alt="<?php echo e(translate('refund_approve')); ?>">
                            <h4 class="mb-4 mx-auto max-w-283">
                                <?php echo e(translate('once_you_refund_that_refund_request').','.translate('then_you_won’t_able_change_any_status')); ?>

                            </h4>
                        </div>
                        <div class="form-group">
                            <label class="input-label" for=""><?php echo e(translate('payment_method')); ?></label>
                            <select class="form-control" name="payment_method">
                                <option value="cash"><?php echo e(translate('cash')); ?></option>
                                <option value="digitally_paid"><?php echo e(translate('digitally_paid')); ?></option>
                                <?php if($walletStatus == 1 && $walletAddRefund == 1): ?>
                                    <option value="customer_wallet"><?php echo e(translate('customer_wallet')); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="input-label d-flex" for=""><?php echo e(translate('payment_info')); ?>

                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                      data-placement="right"
                                      title="<?php echo e(translate('please_enter_the_payment_information_according_to_your_chosen_payment_method').'.'.translate('without_a_proper_payment_info,you_cannot_change_the_Refund_Status').'.'); ?>">
                                    <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                         alt="">
                                </span>
                            </label>
                            <input type="text" class="form-control" name="payment_info" placeholder="<?php echo e(translate('ex').' : '.'Paypal'); ?>">
                        </div>
                        <div class="d-flex flex-wrap justify-content-end gap-3 mt-3">
                            <button type="button" class="btn btn-secondary px-3" data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                            <button type="button" class="btn btn--primary form-submit" data-form-id="submit-refund-form" data-message="<?php echo e(translate('want_to_refund_this_refund_request').'?'); ?>" data-redirect-route="<?php echo e(route('admin.refund-section.refund.list',['status'=>$refund['status']])); ?>"><?php echo e(translate('submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/refund.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/refund/details.blade.php ENDPATH**/ ?>