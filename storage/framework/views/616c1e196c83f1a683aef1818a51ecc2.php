<?php $__env->startSection('title', translate('customer_Details')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="d-print-none pb-2">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <div class="mb-3">
                        <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/customer.png')); ?>" alt="">
                            <?php echo e(translate('customer_details')); ?>

                        </h2>
                    </div>
                    <div class="d-sm-flex align-items-sm-center">
                        <h3 class="page-header-title"><?php echo e(translate('customer_ID')); ?> #<?php echo e($customer['id']); ?></h3>
                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2 mr-sm-3' : 'ml-2 ml-sm-3'); ?>">
                        <i class="tio-date-range">
                        </i> <?php echo e(translate('joined_At').':'.date('d M Y H:i:s',strtotime($customer['created_at']))); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="printableArea">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="card">
                    <div class="p-3">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="searchValue"
                                               class="form-control"
                                               placeholder="<?php echo e(translate('search_orders')); ?>" aria-label="Search orders"
                                               value="<?php echo e(request('searchValue')); ?>"
                                               required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive datatable-custom">
                        <table
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('sl')); ?></th>
                                <th><?php echo e(translate('order_ID')); ?></th>
                                <th><?php echo e(translate('total')); ?></th>
                                <th><?php echo e(translate('order_Status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($orders->firstItem()+$key); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>"
                                           class="title-color hover-c1"><?php echo e($order['id']); ?></a>
                                    </td>
                                    <td> <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order['order_amount']))); ?></td>
                                    <td>
                                        <?php if($order['order_status']=='pending'): ?>
                                            <span class="badge badge-soft-info fz-12">
                                                    <?php echo e(translate($order['order_status'])); ?>

                                                </span>

                                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                            <span class="badge badge-soft-warning fz-12">
                                                    <?php echo e(str_replace('_',' ',$order['order_status'] == 'processing' ? translate('packaging'):translate($order['order_status']))); ?>

                                                </span>
                                        <?php elseif($order['order_status']=='confirmed'): ?>
                                            <span class="badge badge-soft-success fz-12">
                                                    <?php echo e(translate($order['order_status'])); ?>

                                                </span>
                                        <?php elseif($order['order_status']=='failed'): ?>
                                            <span class="badge badge-soft-danger fz-12">
                                                    <?php echo e(translate('failed_to_deliver')); ?>

                                                </span>
                                        <?php elseif($order['order_status']=='delivered'): ?>
                                            <span class="badge badge-soft-success fz-12">
                                                    <?php echo e(translate($order['order_status'])); ?>

                                                </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger fz-12">
                                                    <?php echo e(translate($order['order_status'])); ?>

                                                </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-10">
                                            <a class="btn btn-outline--primary btn-sm edit square-btn"
                                               title="<?php echo e(translate('view')); ?>"
                                               href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>"><i
                                                    class="tio-invisible"></i> </a>
                                            <a class="btn btn-outline-info btn-sm square-btn"
                                               title="<?php echo e(translate('invoice')); ?>"
                                               target="_blank"
                                               href="<?php echo e(route('admin.orders.generate-invoice',[$order['id']])); ?>"><i
                                                    class="tio-download"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if(count($orders)==0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-160"
                                     src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                     alt="<?php echo e(translate('image_description')); ?>">
                                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="card-footer">
                            <?php echo $orders->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <?php if($customer): ?>
                        <div class="card-body">
                            <h4 class="mb-4 d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/vendor-information.png')); ?>" alt="">
                                <?php echo e(translate('customer')); ?>

                            </h4>

                            <div class="media">
                                <div class="mr-3">
                                    <img class="avatar rounded-circle avatar-70" src="<?php echo e(getValidImage(path: 'storage/app/public/profile/'. $customer['image'] , type: 'backend-profile')); ?>"
                                        alt="<?php echo e(translate('image')); ?>">
                                </div>
                                <div class="media-body d-flex flex-column gap-1">
                                    <span class="title-color hover-c1"><strong><?php echo e($customer['f_name'].' '.$customer['l_name']); ?></strong></span>
                                    <span class="title-color">
                                        <strong><?php echo e(count($customer['orders'])); ?> </strong><?php echo e(translate('orders')); ?>

                                    </span>
                                    <span class="title-color"><strong><?php echo e($customer['phone']); ?></strong></span>
                                    <span class="title-color"><?php echo e($customer['email']); ?></span>
                                </div>
                                <div class="media-body text-right">
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/customer/customer-view.blade.php ENDPATH**/ ?>