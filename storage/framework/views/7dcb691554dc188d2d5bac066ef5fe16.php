<?php $__env->startSection('title',$seller?->shop->name ?? translate("shop_name_not_found")); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(translate('vendor_details')); ?>

            </h2>
        </div>
        <div class="flex-between d-sm-flex row align-items-center justify-content-between mb-2 mx-1">
            <div>
                <?php if($seller['status']=="pending"): ?>
                    <div class="mt-4 pr-2">
                        <div class="flex-start">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><?php echo e(translate('vendor_request_for_open_a_shop')); ?></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller['id']); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit"
                                        class="btn btn--primary btn-sm"><?php echo e(translate('approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller['id']); ?>">
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
                    <h1 class="page-header-title"><?php echo e($seller?->shop->name ?? translate("shop_Name")." : ".translate("update_Please")); ?></h1>
                </div>
            </div>
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <ul class="nav nav-tabs flex-wrap page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(translate('shop')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
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
                        <a class="nav-link active"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'transaction'])); ?>"><?php echo e(translate('transaction')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(translate('review')); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content container-fluid p-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="px-3 py-4">
                            <div class="row align-items-center">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h5 class="mb-0 text-capitalize d-flex gap-1 align-items-center"><?php echo e(translate('transaction_table')); ?>

                                        <span class="badge badge-soft-dark fz-12"><?php echo e($transactions->total()); ?></span>
                                    </h5>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-3 mb-md-0">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <div class="input-group input-group-merge input-group-custom">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="datatableSearch_" type="search" name="searchValue"
                                                   class="form-control"
                                                   placeholder="<?php echo e(translate('search_by_orders_id_or_transaction_id')); ?>"
                                                   aria-label="Search orders" value="<?php echo e(request('searchValue')); ?>">
                                            <button type="submit"
                                                    class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <div class="d-flex justify-content-end align-items-center gap-10">
                                            <select class="form-control" name="status">
                                                <option value="0" selected disabled><?php echo e('---'.translate('select_status').'---'); ?></option>
                                                <option class="text-capitalize"
                                                        value="all" <?php echo e(request('status') == 'all'? 'selected' : ''); ?> ><?php echo e(translate('all')); ?> </option>
                                                <option class="text-capitalize"
                                                        value="disburse" <?php echo e(request('status') == 'disburse'? 'selected' : ''); ?> ><?php echo e(translate('disburse')); ?> </option>
                                                <option class="text-capitalize"
                                                        value="hold" <?php echo e(request('status') == 'hold'? 'selected' : ''); ?>><?php echo e(translate('hold')); ?></option>
                                            </select>
                                            <button type="submit" class="btn btn-success">
                                                <?php echo e(translate('filter')); ?>

                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatable"
                               style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('vendor_name')); ?></th>
                                <th><?php echo e(translate('customer_name')); ?></th>
                                <th><?php echo e(translate('order_id')); ?></th>
                                <th><?php echo e(translate('transaction_id')); ?></th>
                                <th><?php echo e(translate('order_amount')); ?></th>
                                <th><?php echo e(translate('vendor_amount')); ?></th>
                                <th><?php echo e(translate('admin_commission')); ?></th>
                                <th><?php echo e(translate('received_by')); ?></th>
                                <th><?php echo e(translate('delivered_by')); ?></th>
                                <th><?php echo e(translate('delivery_charge')); ?></th>
                                <th><?php echo e(translate('payment_method')); ?></th>
                                <th><?php echo e(translate('tax')); ?></th>
                                <th class="text-center"><?php echo e(translate('status')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php ($companyName = getWebConfig('company_name')); ?>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($transactions->firstItem()+$key); ?></td>
                                    <td>
                                        <?php if($transaction['seller_is'] == 'admin'): ?>
                                            <?php echo e($companyName); ?>

                                        <?php else: ?>
                                            <?php echo e($transaction?->seller->f_name .' '.$transaction?->seller->l_name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e($transaction->order->is_guest ? translate('guest_customer'):($transaction->order->customer ? $transaction->order->customer->f_name.' '.$transaction->order->customer->l_name : translate('customer_not_found'))); ?>

                                    </td>
                                    <td><?php echo e($transaction['order_id']); ?></td>
                                    <td><?php echo e($transaction['transaction_id']); ?></td>
                                    <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $transaction['order_amount']))); ?></td>
                                    <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $transaction['seller_amount']))); ?></td>
                                    <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $transaction['admin_commission']))); ?></td>
                                    <td><?php echo e($transaction['received_by']); ?></td>
                                    <td><?php echo e($transaction['delivered_by']); ?></td>
                                    <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $transaction['delivery_charge']))); ?></td>
                                    <td><?php echo e(str_replace('_',' ',$transaction['payment_method'])); ?></td>
                                    <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $transaction['tax']))); ?></td>
                                    <td class="text-center">
                                        <?php if($transaction['status'] == 'disburse'): ?>
                                            <span class="badge badge-soft-success">
                                                <?php echo e(translate($transaction['status'])); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-warning ">
                                                <?php echo e(translate($transaction['status'])); ?>

                                            </span>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if(count($transactions)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-160"
                                     src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                     alt="<?php echo e(translate('image_description')); ?>">
                                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <?php echo e($transactions->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/seller/view/transaction.blade.php ENDPATH**/ ?>