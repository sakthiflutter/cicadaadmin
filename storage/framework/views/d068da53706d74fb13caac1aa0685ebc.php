<?php use Illuminate\Support\Str; ?>


<?php $__env->startSection('title', translate('refund_list')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
                <div class="">
                    <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/refund-request-list.png')); ?>" alt="">
                        <?php echo e(translate('refund_request_list')); ?>

                        <span class="badge badge-soft-dark radius-50"><?php echo e($refundList->total()); ?></span>
                    </h2>
                </div>
                <div>
                    <i class="tio-shopping-cart title-color fz-30"></i>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="flex-between justify-content-between align-items-center flex-grow-1">
                    <div class="col-12 col-md-4">
                        <form action="<?php echo e(url()->current()); ?>" method="GET">
                            <div class="input-group input-group-merge input-group-custom">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="search" class="form-control"
                                       placeholder="<?php echo e(translate('search_by_order_id_or_refund_id')); ?>"
                                       aria-label="Search orders" value="<?php echo e($searchValue); ?>"
                                       required>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive datatable-custom">
                <table
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table text-start">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th class="text-center"><?php echo e(translate('refund_id')); ?></th>
                        <th><?php echo e(translate('order_ID')); ?> </th>
                        <th><?php echo e(translate('product_Info')); ?></th>
                        <th><?php echo e(translate('customer_Info')); ?></th>
                        <th><?php echo e(translate('total_Amount')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $refundList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($refundList->firstItem()+$key); ?></td>
                            <td class="text-center">

                                <a class="title-color hover-c1"
                                   href="<?php echo e(route('vendor.refund.details',['id'=>$refund['id']])); ?>">
                                    <?php echo e($refund['id']); ?>

                                </a>
                            </td>
                            <td>
                                <a class="title-color hover-c1"
                                   href="<?php echo e(route('vendor.orders.details',[$refund->order_id])); ?>">
                                    <?php echo e($refund->order_id); ?>

                                </a>
                            </td>
                            <td>
                                <?php if($refund->product!=null): ?>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="<?php echo e(route('vendor.products.view',[$refund->product->id])); ?>">
                                            <img src="<?php echo e(getValidImage(path:'storage/app/public/product/thumbnail/'.$refund->product->thumbnail ,type:'backend-product')); ?>"
                                                 class="avatar border" alt="">
                                        </a>
                                        <div class="d-flex flex-column gap-1">
                                            <a href="<?php echo e(route('vendor.products.view',[$refund->product->id])); ?>"
                                               class="title-color font-weight-bold hover-c1">
                                                <?php echo e(Str::limit($refund->product->name,35)); ?>

                                            </a>
                                            <span class="fz-12"><?php echo e(translate('qty')); ?> : <?php echo e($refund->orderDetails->qty); ?></span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php echo e(translate('product_name_not_found')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($refund->customer !=null): ?>
                                    <div class="d-flex flex-column gap-1">
                                        <a href="javascript:void(0)" class="title-color font-weight-bold hover-c1">
                                            <?php echo e($refund->customer->f_name. ' '.$refund->customer->l_name); ?>

                                        </a>
                                        <?php if($refund->customer->phone): ?>
                                            <a href="tel:<?php echo e($refund->customer->phone); ?>" class="title-color hover-c1 fz-12"><?php echo e($refund->customer->phone); ?></a>
                                        <?php else: ?>
                                            <a href="mailto:<?php echo e($refund->customer['email']); ?>" class="title-color hover-c1 fz-12"><?php echo e($refund->customer['email']); ?></a>
                                        <?php endif; ?>

                                    </div>
                                <?php else: ?>
                                    <a href="javascript:" class="title-color hover-c1">
                                        <?php echo e(translate('customer_not_found')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refund->amount), currencyCode: getCurrencyCode())); ?>

                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-outline--primary btn-sm"
                                       title="<?php echo e(translate('view')); ?>"
                                       href="<?php echo e(route('vendor.refund.details',['id'=>$refund['id']])); ?>">
                                        <i class="tio-invisible"></i>
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
                    <?php echo $refundList->links(); ?>

                </div>
            </div>
            <?php if(count($refundList)==0): ?>
                <div class="text-center p-4">
                    <img class="mb-3 __w-7rem" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                         alt="<?php echo e(translate('image_description')); ?>">
                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/refund/index.blade.php ENDPATH**/ ?>