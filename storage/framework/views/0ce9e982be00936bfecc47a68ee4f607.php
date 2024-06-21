<?php
use Illuminate\Support\Facades\Session;
?>


<?php $__env->startSection('title',$seller?->shop->name ?? translate("shop_name_not_found")); ?>

<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(translate('vendor_Details')); ?>

            </h2>
        </div>
        <div class="flex-between d-sm-flex row align-items-center justify-content-between mb-2 mx-1">
            <div>
                <?php if($seller->status=="pending"): ?>
                    <div class="mt-4 pr-2 float-<?php echo e($direction === "rtl" ? 'left' : 'right'); ?>">
                        <div class="flex-start">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><?php echo e(translate('vendor_request_for_open_a_shop.')); ?></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn--primary btn-sm"><?php echo e(translate('approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit"
                                        class="btn btn-danger btn-sm"><?php echo e(translate('reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="page-header">
            <div class="flex-between row mx-1">
                <div>
                    <h1 class="page-header-title"><?php echo e($seller?->shop->name ?? translate("Shop_Name").' : '. translate("Update_Please")); ?></h1>
                </div>
            </div>
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <ul class="nav nav-tabs flex-wrap page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(translate('shop')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'order'])); ?>"><?php echo e(translate('order')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'product'])); ?>"><?php echo e(translate('product')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'setting'])); ?>"><?php echo e(translate('setting')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'transaction'])); ?>"><?php echo e(translate('transaction')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(translate('review')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="order">
                <div class="row pt-2">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <div class="card-header">
                                <h5 class="mb-0"><?php echo e(translate('order_info')); ?></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="order-stats order-stats_pending">
                                            <div class="order-stats__content"
                                                 style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;">
                                                <i class="tio-airdrop"></i>
                                                <h6 class="order-stats__subtitle"><?php echo e(translate('pending')); ?></h6>
                                            </div>
                                            <div class="order-stats__title">
                                                <?php echo e($pendingOrder); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="order-stats order-stats_delivered">
                                            <div class="order-stats__content"
                                                 style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;">
                                                <i class="tio-checkmark-circle"></i>
                                                <h6 class="order-stats__subtitle"><?php echo e(translate('delivered')); ?></h6>
                                            </div>
                                            <div class="order-stats__title">
                                                <?php echo e($deliveredOrder); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="order-stats order-stats_all">
                                            <div class="order-stats__content"
                                                 style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;">
                                                <i class="tio-table"></i>
                                                <h6 class="order-stats__subtitle"><?php echo e(translate('all')); ?></h6>
                                            </div>
                                            <div class="order-stats__title">
                                                <?php echo e($orders->total()); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive datatable-custom">
                                <table id="datatable"
                                       style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;"
                                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                    <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(translate('SL')); ?></th>
                                        <th><?php echo e(translate('order')); ?></th>
                                        <th><?php echo e(translate('date')); ?></th>
                                        <th><?php echo e(translate('customer')); ?></th>
                                        <th><?php echo e(translate('payment_status')); ?></th>
                                        <th><?php echo e(translate('total')); ?></th>
                                        <th><?php echo e(translate('order_status')); ?></th>
                                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody id="set-rows">
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="status class-all">
                                            <td>
                                                <?php echo e($orders->firstItem()+$key); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('admin.sellers.order-details',['order_id'=>$order['id'],'seller_id'=>$order['seller_id']])); ?>"
                                                   class="title-color hover-c1"><?php echo e($order['id']); ?></a>
                                            </td>
                                            <td><?php echo e(date('d M Y',strtotime($order['created_at']))); ?></td>
                                            <td>
                                                <?php if($order->is_guest): ?>
                                                    <?php echo e(translate('guest_customer')); ?>

                                                <?php else: ?>
                                                    <?php if($order->customer): ?>
                                                        <a class="text-body text-capitalize"
                                                           href="<?php echo e(route('admin.customer.view',['user_id'=>$order->customer['id']])); ?>">
                                                            <?php echo e($order?->customer['f_name'] ?? ''); ?> <?php echo e($order?->customer['l_name']??''); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <label
                                                                class="badge badge-soft-danger fz-12"><?php echo e(translate('removed')); ?></label>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($order->payment_status=='paid'): ?>
                                                    <span
                                                            class="badge badge-soft-info fz-12"><?php echo e(translate('paid')); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-soft-danger fz-12"><?php echo e(translate('unpaid')); ?>

                                                </span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order['order_amount']))); ?></td>
                                            <td class="text-capitalize">
                                                <?php if($order['order_status']=='pending'): ?>
                                                    <span
                                                            class="badge badge-soft-info fz-12"><?php echo e(translate('pending')); ?></span>
                                                <?php elseif($order['order_status']=='confirmed'): ?>
                                                    <span
                                                            class="badge badge-soft-info fz-12"><?php echo e(translate('confirmed')); ?></span>
                                                <?php elseif($order['order_status']=='processing'): ?>
                                                    <span
                                                            class="badge badge-soft-warning fz-12"><?php echo e(translate('processing')); ?></span>
                                                <?php elseif($order['order_status']=='out_for_delivery'): ?>
                                                    <span
                                                            class="badge badge-soft-warning fz-12"><?php echo e(translate('out_for_delivery')); ?></span>
                                                <?php elseif($order['order_status']=='delivered'): ?>
                                                    <span
                                                            class="badge badge-soft-success fz-12"><?php echo e(translate('delivered')); ?></span>
                                                <?php else: ?>
                                                    <span
                                                            class="badge badge-soft-danger fz-12"><?php echo e(translate(str_replace('_',' ',$order['order_status']))); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a title="<?php echo e(translate('view')); ?>"
                                                       class="btn btn-outline-info btn-sm square-btn"
                                                       href="<?php echo e(route('admin.sellers.order-details',['order_id'=>$order['id'],'seller_id'=>$order['seller_id']])); ?>"><i
                                                                class="tio-invisible"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive mt-4">
                                <div class="px-4 d-flex justify-content-lg-end">
                                    <?php echo $orders->links(); ?>

                                </div>
                            </div>

                            <?php if(count($orders)==0): ?>
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/seller/view/order.blade.php ENDPATH**/ ?>