<?php $__env->startSection('title', translate('withdraw_request')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/withdraw-icon.png')); ?>" alt="">
                <?php echo e(translate('withdraw')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="p-3">
                        <div class="row gy-1 align-items-center justify-content-between">
                            <div class="col-auto">
                                <h5 class="text-capitalize">
                                <?php echo e(translate('withdraw_request_table')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($withdrawRequests->total()); ?></span>
                                </h5>
                            </div>
                            <div class="d-flex col-auto gap-3">
                                <select name="withdraw_status_filter" data-action="<?php echo e(url()->current()); ?>"
                                        class="custom-select min-w-120 withdraw-status-filter">
                                    <option value="all" <?php echo e(request('approved') == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all')); ?></option>
                                    <option value="approved" <?php echo e(request('approved') == 'approved' ? 'selected' : ''); ?>><?php echo e(translate('approved')); ?></option>
                                    <option value="denied" <?php echo e(request('approved') == 'denied' ? 'selected' : ''); ?>><?php echo e(translate('denied')); ?></option>
                                    <option value="pending" <?php echo e(request('approved') == 'pending' ? 'selected' : ''); ?>><?php echo e(translate('pending')); ?></option>
                                </select>
                                <div>
                                    <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                            data-toggle="dropdown">
                                        <i class="tio-download-to"></i>
                                        <?php echo e(translate('export')); ?>

                                        <i class="tio-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('admin.sellers.withdraw-list-export-excel')); ?>?approved=<?php echo e(request('approved')); ?>">
                                                <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
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
                                <th><?php echo e(translate('amount')); ?></th>
                                <th><?php echo e(translate('name')); ?></th>
                                <th><?php echo e(translate('request_time')); ?></th>
                                <th class="text-center"><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $withdrawRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $withdrawRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($withdrawRequests->firstItem() + $key); ?></td>
                                    <td><?php echo e(setCurrencySymbol(currencyConverter($withdrawRequest['amount']), currencyCode: getCurrencyCode(type: 'default'))); ?></td>

                                    <td>
                                        <?php if(isset($withdrawRequest->seller)): ?>
                                            <a href="<?php echo e(route('admin.sellers.view', $withdrawRequest->seller_id)); ?>" class="title-color hover-c1"><?php echo e($withdrawRequest->seller->f_name . ' ' . $withdrawRequest->seller->l_name); ?></a>
                                        <?php else: ?>
                                            <span><?php echo e(translate('not_found')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($withdrawRequest->created_at); ?></td>
                                    <td class="text-center">
                                        <?php if($withdrawRequest->approved == 0): ?>
                                            <label class="badge badge-soft-primary"><?php echo e(translate('pending')); ?></label>
                                        <?php elseif($withdrawRequest->approved == 1): ?>
                                            <label class="badge badge-soft-success"><?php echo e(translate('approved')); ?></label>
                                        <?php elseif($withdrawRequest->approved == 2): ?>
                                            <label class="badge badge-soft-danger"><?php echo e(translate('denied')); ?></label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <?php if(isset($withdrawRequest->seller)): ?>
                                            <a href="<?php echo e(route('admin.sellers.withdraw_view', ['withdraw_id'=>$withdrawRequest['id'], 'seller_id'=>$withdrawRequest->seller['id']])); ?>"
                                                class="btn btn-outline-info btn-sm square-btn"
                                                title="<?php echo e(translate('view')); ?>">
                                                <i class="tio-invisible"></i>
                                                </a>
                                            <?php else: ?>
                                            <a href="javascript:">
                                                <?php echo e(translate('action_disabled')); ?>

                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php if(count($withdrawRequests) == 0): ?>
                            <div class="text-center p-4">
                                <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                        alt="<?php echo e(translate('image_description')); ?>">
                                <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                            </div>
                    <?php endif; ?>
                    </div>
                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-center justify-content-md-end">
                            <?php echo e($withdrawRequests->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/seller/withdraw.blade.php ENDPATH**/ ?>