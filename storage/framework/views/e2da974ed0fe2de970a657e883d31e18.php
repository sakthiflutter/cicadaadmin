<?php
    use Illuminate\Support\Facades\Session;
?>

<?php $__env->startSection('title', translate('create_Role')); ?>
<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2 text-capitalize">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(translate('employee_role_setup')); ?>

            </h2>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="submit-create-role" method="post" action="<?php echo e(route('admin.custom-role.store')); ?>" class="text-start">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mb-4">
                                <label for="name" class="title-color"><?php echo e(translate('role_name')); ?></label>
                                <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="emailHelp"
                                    placeholder="<?php echo e(translate('ex').':'.translate('store')); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-4 flex-wrap">
                        <label for="name" class="title-color font-weight-bold mb-0"><?php echo e(translate('module_permission')); ?> </label>
                        <div class="form-group d-flex gap-2">
                            <input type="checkbox" id="select-all" class="cursor-pointer">
                            <label class="title-color mb-0 cursor-pointer text-capitalize" for="select-all"><?php echo e(translate('select_all')); ?></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="dashboard" class="module-permission" id="dashboard">
                                <label class="title-color mb-0" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="dashboard"><?php echo e(translate('dashboard')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" value="pos_management" class="module-permission" id="pos_management">
                                <label class="title-color mb-0" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                       for="pos_management"><?php echo e(translate('pos_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="order_management" id="order">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;" for="order"><?php echo e(translate('order_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="product_management" id="product">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="product"><?php echo e(translate('product_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="promotion_management" id="promotion_management">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="promotion_management"><?php echo e(translate('promotion_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" name="modules[]" class="module-permission" value="support_section" id="support_section">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="support_section"><?php echo e(translate('help_&_support_section')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="report" id="report">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="report"><?php echo e(translate('reports_&_analytics')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="user_section" id="user_section">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="user_section"><?php echo e(translate('user_management')); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group d-flex gap-2">
                                <input type="checkbox" class="module-permission" name="modules[]" value="system_settings" id="system_settings">
                                <label class="title-color mb-0 text-capitalize" style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                        for="system_settings"><?php echo e(translate('system_settings')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="px-3 py-4">
                <div class="row justify-content-between align-items-center flex-grow-1">
                    <div class="col-md-4 col-lg-6 mb-2 mb-sm-0">
                        <h5 class="d-flex align-items-center gap-2">
                            <?php echo e(translate('employee_Roles')); ?>

                            <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e(count($roles)); ?></span>
                        </h5>
                    </div>
                    <div class="col-md-8 col-lg-6 d-flex flex-wrap flex-sm-nowrap justify-content-sm-end gap-3">
                        <form action="<?php echo e(url()->current()); ?>?search=<?php echo e(request('searchValue')); ?>" method="GET">
                            <div class="input-group input-group-merge input-group-custom">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch_" type="search" name="searchValue" class="form-control" placeholder="<?php echo e(translate('search_role')); ?>"
                                        value="<?php echo e(request('searchValue')); ?>">
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                            </div>
                        </form>
                        <div class="">
                            <button type="button" class="btn btn-outline--primary text-nowrap" data-toggle="dropdown">
                                <i class="tio-download-to"></i>
                                <?php echo e(translate('export')); ?>

                                <i class="tio-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.custom-role.export',['searchValue'=>request('searchValue')])); ?>">
                                        <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                        <?php echo e(translate('excel')); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-3">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless table-thead-bordered table-align-middle card-table text-start">
                        <thead class="thead-light thead-50 text-capitalize table-nowrap">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('role_name')); ?></th>
                                <th><?php echo e(translate('modules')); ?></th>
                                <th><?php echo e(translate('created_at')); ?></th>
                                <th><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e($role['name']); ?></td>
                                <td class="text-capitalize">
                                    <?php if($role['module_access'] != null): ?>
                                        <?php $__currentLoopData = (array)json_decode($role['module_access']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($module == 'report'): ?>
                                                <?php echo e(translate('reports_and_analytics').(!$loop->last ? ',': '')); ?> <br>
                                            <?php elseif($module == 'user_section'): ?>
                                                <?php echo e(translate('user_management').(!$loop->last ? ',': '')); ?> <br>
                                            <?php elseif($module == 'support_section'): ?>
                                                <?php echo e(translate('Help_&_Support_Section').(!$loop->last ? ',': '')); ?> <br>
                                            <?php else: ?>
                                                <?php echo e(translate(str_replace('_',' ', $module)).(!$loop->last ? ',': '')); ?> <br>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(date('d-M-y',strtotime($role['created_at']))); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.custom-role.employee-role-status')); ?>" method="post" id="employee-role-status<?php echo e($role['id']); ?>-form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($role['id']); ?>">
                                        <label class="switcher" for="employee-role-status<?php echo e($role['id']); ?>">
                                            <input type="checkbox" class="switcher_input toggle-switch-message" id="employee-role-status<?php echo e($role['id']); ?>" name="status" value="1" <?php echo e($role['status'] == 1?'checked':''); ?>

                                                   data-modal-id = "toggle-status-modal"
                                                   data-toggle-id = "employee-role-status<?php echo e($role['id']); ?>"
                                                   data-on-image = "employee-on.png"
                                                   data-off-image = "employee-off.png"
                                                   data-on-title = "<?php echo e(translate('want_to_Turn_ON_Employee_Status').'?'); ?>"
                                                   data-off-title = "<?php echo e(translate('want_to_Turn_OFF_Employee_Status').'?'); ?>"
                                                   data-on-message = "<p><?php echo e(translate('when_the_status_is_enabled_employees_can_access_the_system_to_perform_their_responsibilities')); ?></p>"
                                                   data-off-message = "<p><?php echo e(translate('when_the_status_is_disabled_employees_cannot_access_the_system_to_perform_their_responsibilities')); ?></p>">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="<?php echo e(route('admin.custom-role.update',[$role['id']])); ?>"
                                            class="btn btn-outline--primary btn-sm square-btn"
                                            title="<?php echo e(translate('edit')); ?>">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a href="javascript:"
                                            class="btn btn-outline-danger btn-sm delete-data-without-form"
                                           data-action="<?php echo e(route('admin.custom-role.delete')); ?>"
                                            title="<?php echo e(translate('delete')); ?>" data-id="<?php echo e($role['id']); ?>">
                                            <i class="tio-delete"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/custom-role.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/custom-role/create.blade.php ENDPATH**/ ?>