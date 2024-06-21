<?php $__env->startSection('title', translate('offline_Payment_Method')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.third-party-payment-method-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <nav>
            <div class="nav nav-tabs mb-3 border-0" role="tablist">
              <a class="nav-link <?php echo e(!request()->has('status') ? 'active':''); ?>" href="<?php echo e(route('admin.business-settings.offline-payment-method.index')); ?>"><?php echo e(translate('all')); ?></a>
              <a class="nav-link <?php echo e(request('status') == 'active' ? 'active':''); ?>" href="<?php echo e(route('admin.business-settings.offline-payment-method.index')); ?>?status=active"><?php echo e(translate('active')); ?></a>
              <a class="nav-link <?php echo e(request('status') == 'inactive' ? 'active':''); ?>" href="<?php echo e(route('admin.business-settings.offline-payment-method.index')); ?>?status=inactive"><?php echo e(translate('inactive')); ?></a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row g-2 flex-grow-1">
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <form action="<?php echo e(route('admin.business-settings.offline-payment-method.index')); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="searchValue" class="form-control" placeholder="<?php echo e(translate('search_by_name')); ?>" value="<?php echo e(request('searchValue')); ?>" required="">
                                        <button type="submit" class="btn btn--primary input-group-text"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 col-md-6 col-lg-8 d-flex justify-content-end">
                                <a href="<?php echo e(route('admin.business-settings.offline-payment-method.add')); ?>" class="btn btn--primary"><i class="tio-add"></i> <?php echo e(translate('add_New_Method')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(translate('SL')); ?></th>
                                        <th><?php echo e(translate('payment_Method_Name')); ?></th>
                                        <th><?php echo e(translate('payment_Info')); ?></th>
                                        <th><?php echo e(translate('required_Info_From_Customer')); ?></th>
                                        <th class="text-center"><?php echo e(translate('status')); ?></th>
                                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$key); ?></td>
                                            <td><?php echo e($method->method_name); ?></td>
                                            <td>
                                                <div class="d-flex flex-column gap-1">
                                                    <?php $__currentLoopData = $method->method_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div><?php echo e(ucwords(str_replace('_',' ',$item['input_name']))); ?> : <?php echo e($item['input_data']); ?></div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column gap-1">
                                                    <?php $__currentLoopData = $method->method_informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <?php echo e(ucwords(str_replace('_',' ',$item['customer_input']))); ?>

                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('admin.business-settings.offline-payment-method.update-status')); ?>" method="post" id="method-status<?php echo e($method['id']); ?>-form" class="method-status-form">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?php echo e($method['id']); ?>">
                                                    <label class="switcher mx-auto">
                                                        <input type="checkbox" class="switcher_input toggle-switch-message" id="method-status<?php echo e($method['id']); ?>" name="status" <?php echo e($method->status == 1 ? 'checked':''); ?>

                                                               data-modal-id = "toggle-status-modal"
                                                               data-toggle-id = "method-status<?php echo e($method['id']); ?>"
                                                               data-on-image = "offline-payment-on.png"
                                                               data-off-image = "offline-payment-off.png"
                                                               data-on-title = "<?php echo e(translate('want_to_Turn_ON_Offline_Payment_Methods').'?'); ?>"
                                                               data-off-title = "<?php echo e(translate('want_to_Turn_OFF_Offline_Payment_Methods').'?'); ?>"
                                                               data-on-message = "<p><?php echo e(translate('if_enabled_customers_can_pay_through_different_payment_methods_outside_your_system')); ?></p>"
                                                               data-off-message = "<p><?php echo e(translate('if_disabled_customers_can_only_pay_through_the_system_supported_payment_methods')); ?></p>">
                                                        <span class="switcher_control"></span>
                                                    </label>
                                                </form>

                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a class="btn btn-outline-info btn-sm square-btn" title="Edit" href="<?php echo e(route('admin.business-settings.offline-payment-method.update', ['id'=>$method->id])); ?>">
                                                        <i class="tio-edit"></i>
                                                    </a>
                                                    <button class="btn btn-outline-danger btn-sm delete square-btn delete-data" title="<?php echo e(translate('delete')); ?>" data-id="delete-method-name-<?php echo e($method->id); ?>">
                                                        <i class="tio-delete"></i>
                                                    </button>

                                                    <form action="<?php echo e(route('admin.business-settings.offline-payment-method.delete')); ?>" method="post" id="delete-method-name-<?php echo e($method->id); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" value="<?php echo e($method->id); ?>" name="id" required>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if($methods->count() > 0): ?>
                                <div class="p-3 d-flex justify-content-end">
                                    <?php
                                        if (request()->has('status')) {
                                            $paginationLinks = $methods->links();
                                            $modifiedLinks = preg_replace('/href="([^"]*)"/', 'href="$1&status='.request('status').'"', $paginationLinks);
                                        } else {
                                            $modifiedLinks = $methods->links();
                                        }
                                    ?>

                                    <?php echo $modifiedLinks; ?>

                                </div>
                            <?php else: ?>
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end/svg/illustrations/sorry.svg')); ?>" alt="<?php echo e(translate('image_description')); ?>">
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
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end/js/admin/business-setting/offline-payment.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/offline-payment-method/index.blade.php ENDPATH**/ ?>