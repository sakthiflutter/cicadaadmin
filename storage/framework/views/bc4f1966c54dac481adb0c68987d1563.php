<?php $__env->startSection('title', translate('subscriber_list')); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/subscribers.png')); ?>" width="20" alt="">
            <?php echo e(translate('subscriber_list')); ?>

            <span class="badge badge-soft-dark radius-50 fz-14 ml-1"><?php echo e($subscription_list->total()); ?></span>
        </h2>
    </div>
    <div class="row mt-20">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch_" type="search" name="searchValue" class="form-control"
                                placeholder="<?php echo e(translate('search_by_email')); ?>"  aria-label="Search orders" value="<?php echo e(request('searchValue')); ?>">
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                    </form>
                    <button type="button" class="btn btn-outline--primary text-nowrap" data-toggle="dropdown">
                        <i class="tio-download-to"></i>
                        <?php echo e(translate('export')); ?>

                        <i class="tio-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('admin.customer.subscriber-list.export',['searchValue'=>request('searchValue')])); ?>">
                                <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                <?php echo e(translate('excel')); ?>

                            </a>
                        </li>
                    </ul>
                </div>

                <div class="table-responsive">
                    <table style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                        class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                        <tr>
                            <th><?php echo e(translate('SL')); ?></th>
                            <th scope="col">
                                <?php echo e(translate('email')); ?>

                            </th>
                            <th><?php echo e(translate('subscription_date')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $subscription_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($subscription_list->firstItem()+$key); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td>
                                        <?php echo e(date('d M Y, h:i A',strtotime($item->created_at))); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>

                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-lg-end">
                        <?php echo e($subscription_list->links()); ?>

                    </div>
                </div>
                <?php if(count($subscription_list)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>" alt="Image Description">
                        <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/customer/subscriber-list.blade.php ENDPATH**/ ?>