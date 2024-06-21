<?php $__env->startSection('title', translate('employee_list')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/employee.png')); ?>" width="20" alt="">
                <?php echo e(translate('employee_list')); ?>

            </h2>
        </div>
        <div class="card">
            <div class="card-header flex-wrap gap-10">
                <div class="px-sm-3 py-4 flex-grow-1">
                    <div class="d-flex justify-content-between gap-3 flex-wrap align-items-center">
                        <div class="">
                            <h5 class="mb-0 text-capitalize gap-2">
                                <?php echo e(translate('employee_table')); ?>

                                <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($employees->total()); ?></span>
                            </h5>
                        </div>
                        <div class="align-items-center d-flex gap-3 justify-content-lg-end flex-wrap flex-lg-nowrap flex-grow-1">
                            <div class="">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input type="search" name="searchValue" class="form-control"
                                                placeholder="<?php echo e(translate('search_by_name_or_email_or_phone')); ?>"
                                                value="<?php echo e(request('searchValue')); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="d-flex gap-2 align-items-center text-left">
                                        <div class="">
                                            <select class="form-control text-ellipsis min-w-200" name="admin_role_id">
                                                <option value="all" <?php echo e(request('employee_role') == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all')); ?></option>
                                                <?php $__currentLoopData = $employee_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employee_role['id']); ?>" <?php echo e(request('admin_role_id') == $employee_role['id'] ? 'selected' : ''); ?>>
                                                            <?php echo e(ucfirst($employee_role['name'])); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn--primary px-4 w-100 text-nowrap">
                                                <?php echo e(translate('filter')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-outline--primary text-nowrap" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.employee.export',['role'=>request('admin_role_id'),'searchValue'=>request('searchValue')])); ?>">
                                            <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="">
                                <a href="<?php echo e(route('admin.employee.add-new')); ?>" class="btn btn--primary text-nowrap">
                                    <i class="tio-add"></i>
                                    <span class="text "><?php echo e(translate('add_new')); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="datatable"
                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                            class="table table-hover table-borderless table-thead-bordered table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize table-nowrap">
                        <tr>
                            <th><?php echo e(translate('SL')); ?></th>
                            <th><?php echo e(translate('name')); ?></th>
                            <th><?php echo e(translate('email')); ?></th>
                            <th><?php echo e(translate('phone')); ?></th>
                            <th><?php echo e(translate('role')); ?></th>
                            <th><?php echo e(translate('status')); ?></th>
                            <th class="text-center"><?php echo e(translate('action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key+1); ?></td>
                                <td class="text-capitalize">
                                    <div class="media align-items-center gap-10">
                                        <img class="rounded-circle avatar avatar-lg" alt=""
                                             src="<?php echo e(getValidImage(path: 'storage/app/public/admin/'.$employee['image'],type:'backend-profile')); ?>">
                                        <div class="media-body">
                                            <?php echo e($employee['name']); ?>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo e($employee['email']); ?>

                                </td>
                                <td><?php echo e($employee['phone']); ?></td>
                                <td><?php echo e($employee?->role['name'] ?? translate('role_not_found')); ?></td>
                                <td>
                                    <?php if($employee['id'] == 1): ?>
                                        <label class="badge badge-primary-light"><?php echo e(translate('admin')); ?></label>
                                    <?php else: ?>
                                        <form action="<?php echo e(route('admin.employee.status')); ?>" method="post" id="employee-id-<?php echo e($employee['id']); ?>-form" class="employee_id_form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($employee['id']); ?>">
                                            <label class="switcher">
                                                <input type="checkbox" class="switcher_input toggle-switch-message" value="1" id="employee-id-<?php echo e($employee['id']); ?>" name="status"
                                                       <?php echo e($employee->status?'checked':''); ?>

                                                       data-modal-id = "toggle-status-modal"
                                                       data-toggle-id = "employee-id-<?php echo e($employee['id']); ?>"
                                                       data-on-image = "employee-on.png"
                                                       data-off-image = "employee-off.png"
                                                       data-on-title = "<?php echo e(translate('want_to_Turn_ON_Employee_Status').'?'); ?>"
                                                       data-off-title = "<?php echo e(translate('want_to_Turn_OFF_Employee_Status').'?'); ?>"
                                                       data-on-message = "<p><?php echo e(translate('if_enabled_this_employee_can_log_in_to_the_system_and_perform_his_role')); ?></p>"
                                                       data-off-message = "<p><?php echo e(translate('if_disabled_this_employee_can_not_log_in_to_the_system_and_perform_his_role')); ?></p>">`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($employee['id'] == 1): ?>
                                        <label class="badge badge-primary-light"><?php echo e(translate('default')); ?></label>
                                    <?php else: ?>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <a href="<?php echo e(route('admin.employee.update',[$employee['id']])); ?>"
                                               class="btn btn-outline--primary btn-sm square-btn"
                                               title="<?php echo e(translate('edit')); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-info btn-sm square-btn" title="View" href="<?php echo e(route('admin.employee.view',['id'=>$employee['id']])); ?>">
                                                <i class="tio-invisible"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-lg-end">
                        <?php echo e($employees->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/employee/list.blade.php ENDPATH**/ ?>