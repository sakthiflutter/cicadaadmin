<?php use Illuminate\Support\Str; ?>

<?php $__env->startSection('title',translate('refund_requests')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/refund-request.png')); ?>" alt="">
                <?php echo e(translate($status.'_'.'refund_Requests')); ?>

                <span class="badge badge-soft-dark radius-50"><?php echo e($refundList->total()); ?></span>
            </h2>
        </div>
        <div class="card">
            <div class="p-3">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-4">
                        <form action="<?php echo e(url()->current()); ?>" method="GET">
                            <div class="input-group input-group-merge input-group-custom">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="searchValue" class="form-control"
                                       placeholder="<?php echo e(translate('search_by_order_id_or_refund_id')); ?>"
                                       aria-label="Search orders" value="<?php echo e(request('searchValue')); ?>">
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 mt-3 col-md-8">
                        <div class="d-flex gap-3 justify-content-md-end">
                            <div class="dropdown text-nowrap">
                                <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a type="submit" class="dropdown-item d-flex align-items-center gap-2 "
                                           href="<?php echo e(route('admin.refund-section.refund.export',['status'=>request('status'),'searchValue'=>request('searchValue'), 'type'=>request('type')])); ?>">
                                            <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>"
                                                 alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <select name="" id="" class="form-control w-auto"
                                    onchange="location.href='<?php echo e(url()->current()); ?>?type='+this.value">
                                <option
                                    value="all" <?php echo e(request('type') == 'all' ?'selected':''); ?>><?php echo e(translate('all')); ?></option>
                                <option
                                    value="admin" <?php echo e(request('type')== 'admin' ? 'selected':''); ?>><?php echo e(translate('inhouse_Requests')); ?></option>
                                <option
                                    value="seller" <?php echo e(request('type') == 'seller' ? 'selected':''); ?>><?php echo e(translate('vendor_Requests')); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive datatable-custom">
                <table
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100"
                    style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th class="text-center"><?php echo e(translate('refund_ID')); ?></th>
                        <th><?php echo e(translate('order_id')); ?> </th>
                        <th><?php echo e(translate('product_info')); ?></th>
                        <th><?php echo e(translate('customer_info')); ?></th>
                        <th class="text-end"><?php echo e(translate('total_amount')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $refundList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($refundList->firstItem()+$key); ?></td>
                            <td class="text-center"><?php echo e($refund['id']); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.orders.details',['id'=>$refund->order_id])); ?>"
                                   class="title-color hover-c1">
                                    <?php echo e($refund->order_id); ?>

                                </a>
                            </td>
                            <td>
                                <?php if($refund->product !=null): ?>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="<?php echo e(route('admin.products.view',['addedBy'=>$refund->product->added_by,'id'=>$refund->product->id])); ?>">
                                            <img
                                                src="<?php echo e(getValidImage(path:'storage/app/public/product/thumbnail/'.$refund->product->thumbnail,type: 'backend-product')); ?>"
                                                class="avatar border" alt="">
                                        </a>
                                        <div class="d-flex flex-column gap-1">
                                            <a href="<?php echo e(route('admin.products.view',['addedBy'=>$refund->product->added_by,'id'=>$refund->product->id])); ?>"
                                               class="title-color font-weight-bold hover-c1">
                                                <?php echo e(Str::limit($refund->product->name,35)); ?>

                                            </a>
                                            <span
                                                class="fz-12"><?php echo e(translate('QTY')); ?> : <?php echo e($refund->orderDetails->qty); ?></span>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php echo e(translate('product_name_not_found')); ?>

                                <?php endif; ?>

                            </td>
                            <td>
                                <?php if($refund->customer !=null): ?>
                                    <div class="d-flex flex-column gap-1">
                                        <a href="<?php echo e(route('admin.customer.view',[$refund->customer->id])); ?>"
                                           class="title-color font-weight-bold hover-c1">
                                            <?php echo e($refund->customer->f_name. ' '.$refund->customer->l_name); ?>

                                        </a>
                                        <?php if($refund->customer->phone): ?>
                                            <a href="tel:<?php echo e($refund->customer->phone); ?>"
                                               class="title-color hover-c1 fz-12"><?php echo e($refund->customer->phone); ?></a>
                                        <?php else: ?>
                                            <a href="mailto:<?php echo e($refund->customer['email']); ?>"
                                               class="title-color hover-c1 fz-12"><?php echo e($refund->customer['email']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <a href="javascript:" class="title-color hover-c1">
                                        <?php echo e(translate('customer_not_found')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-1 text-end">
                                    <div>
                                        <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refund->amount), currencyCode: getCurrencyCode())); ?>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-outline--primary btn-sm"
                                       title="<?php echo e(translate('view')); ?>"
                                       href="<?php echo e(route('admin.refund-section.refund.details',['id'=>$refund['id']])); ?>">
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

            <?php if(count($refundList) == 0): ?>
                <div class="text-center p-4">
                    <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                         alt="Image Description">
                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/refund/list.blade.php ENDPATH**/ ?>