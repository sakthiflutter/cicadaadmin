<?php $__env->startSection('title', translate('coupon_Add')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/coupon_setup.png')); ?>" alt="">
                <?php echo e(translate('coupon_setup')); ?>

            </h2>
        </div>

        <div class="row">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.coupon.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('coupon_type')); ?></label>
                                    <select class="form-control" id="coupon_type" name="coupon_type" required>
                                        <option disabled selected><?php echo e(translate('select_coupon_type')); ?></option>
                                        <option
                                            value="discount_on_purchase"><?php echo e(translate('discount_on_Purchase')); ?></option>
                                        <option value="free_delivery"><?php echo e(translate('free_Delivery')); ?></option>
                                        <option value="first_order"><?php echo e(translate('first_Order')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('coupon_title')); ?></label>
                                    <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>"
                                           id="title"
                                           placeholder="<?php echo e(translate('title')); ?>" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="name"
                                               class="title-color font-weight-medium text-capitalize"><?php echo e(translate('coupon_code')); ?></label>
                                        <a href="javascript:void(0)" class="float-right c1 fz-12" id="generateCode"><?php echo e(translate('generate_code')); ?></a>
                                    </div>
                                    <input type="text" name="code" value=""
                                           class="form-control" id="code"
                                           placeholder="<?php echo e(translate('ex')); ?>: EID100" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group first_order">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('coupon_bearer')); ?></label>
                                    <select class="form-control" name="coupon_bearer" id="coupon_bearer">
                                        <option disabled selected><?php echo e(translate('select_coupon_bearer')); ?></option>
                                        <option value="seller"><?php echo e(translate('vendor')); ?></option>
                                        <option value="inhouse"><?php echo e(translate('admin')); ?></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group coupon_by first_order">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('vendor')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="seller_id" id="vendor_wise_coupon">
                                        <option disabled selected><?php echo e(translate('select_vendor')); ?></option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-4 form-group coupon_type first_order">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('customer')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="customer_id">
                                        <option disabled selected><?php echo e(translate('select_customer')); ?></option>
                                        <option value="0"><?php echo e(translate('all_customer')); ?></option>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($customer->id); ?>"><?php echo e($customer->f_name. ' '. $customer->l_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group first_order">
                                    <label
                                        for="exampleFormControlInput1"
                                        class="title-color font-weight-medium d-flex"><?php echo e(translate('limit_for_same_user')); ?></label>
                                    <input type="number" name="limit" value="<?php echo e(old('limit')); ?>" min="0"
                                           id="coupon_limit" class="form-control"
                                           placeholder="<?php echo e(translate('ex')); ?>: 10">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group free_delivery">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('discount_type')); ?></label>
                                    <select id="discount_type" class="form-control w-100" name="discount_type">
                                        <option value="amount"><?php echo e(translate('amount')); ?></option>
                                        <option value="percentage"><?php echo e(translate('percentage')); ?> (%)</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group free_delivery">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('discount_Amount')); ?>

                                        <span id="discount_percent"> (%)</span></label>
                                    <input type="number" min="1" max="1000000" name="discount"
                                           value="<?php echo e(old('discount')); ?>" class="form-control"
                                           id="discount"
                                           placeholder="<?php echo e(translate('ex')); ?> : 500">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('minimum_purchase')); ?>

                                        ($)</label>
                                    <input type="number" min="1" max="1000000" name="min_purchase"
                                           value="<?php echo e(old('min_purchase')); ?>" class="form-control"
                                           id="minimum purchase"
                                           placeholder="<?php echo e(translate('ex')); ?> : 100">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group free_delivery" id="max-discount">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('maximum_discount')); ?>

                                        ($)</label>
                                    <input type="number" min="1" max="1000000" name="max_discount"
                                           value="<?php echo e(old('max_discount')); ?>"
                                           class="form-control" id="maximum discount"
                                           placeholder="<?php echo e(translate('ex')); ?> : 5000">
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('start_date')); ?></label>
                                    <input id="start_date" type="date" name="start_date" value="<?php echo e(old('start_date')); ?>"
                                           class="form-control"
                                           placeholder="<?php echo e(translate('start_date')); ?>" required>
                                </div>
                                <div class="col-md-6 col-lg-4 form-group">
                                    <label for="name"
                                           class="title-color font-weight-medium d-flex"><?php echo e(translate('expire_date')); ?></label>
                                    <input id="expire_date" type="date" name="expire_date"
                                           value="<?php echo e(old('expire_date')); ?>" class="form-control"
                                           placeholder="<?php echo e(translate('expire_date')); ?>" required>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-end flex-wrap gap-10">
                                <button type="reset" class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="d-flex flex-wrap  gap-3 align-items-center">
                            <h5 class="mb-0 text-capitalize d-flex gap-2 mr-auto">
                                <?php echo e(translate('coupon_list')); ?>

                                <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($coupons->total()); ?></span>
                            </h5>
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-merge input-group-custom">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="searchValue" class="form-control"
                                           placeholder="<?php echo e(translate('search_by_Title_or_Code_or_Discount_Type')); ?>"
                                           value="<?php echo e(request('searchValue')); ?>" aria-label="Search orders" required>
                                    <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                </div>
                            </form>
                            <div>
                                <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                        data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item"
                                           href="<?php echo e(route('admin.coupon.export',['searchValue'=>request('searchValue')])); ?>">
                                            <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>"
                                                 alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table <?php echo e(Session::get('direction') === 'rtl' ? 'text-right' : 'text-left'); ?>">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('coupon')); ?></th>
                                <th><?php echo e(translate('coupon_type')); ?></th>
                                <th><?php echo e(translate('duration')); ?></th>
                                <th><?php echo e(translate('user_limit')); ?></th>
                                <th><?php echo e(translate('discount_bearer')); ?></th>
                                <th><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($coupons->firstItem() + $key); ?></td>
                                    <td>
                                        <div><?php echo e(substr($coupon['title'],0,20)); ?></div>
                                        <strong><?php echo e(translate('code')); ?>: <?php echo e($coupon['code']); ?></strong>
                                    </td>
                                    <td class="text-capitalize"><?php echo e(translate(str_replace('_',' ',$coupon['coupon_type']))); ?></td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            <span><?php echo e(date('d M, y',strtotime($coupon['start_date']))); ?> - </span>
                                            <span><?php echo e(date('d M, y',strtotime($coupon['expire_date']))); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span><?php echo e(translate('limit')); ?>:
                                            <strong><?php echo e($coupon['limit']); ?>,</strong>
                                        </span>

                                        <span class="ml-1"><?php echo e(translate('used')); ?>:
                                            <strong><?php echo e($coupon['order_count']); ?></strong>
                                        </span>
                                    </td>
                                    <td><?php echo e($coupon['coupon_bearer'] == 'inhouse' ? 'admin':$coupon['coupon_bearer']); ?></td>
                                    <td>
                                        <form
                                            action="<?php echo e(route('admin.coupon.status',[$coupon['id'],$coupon['status']?0:1])); ?>"
                                            method="GET" id="coupon_status<?php echo e($coupon['id']); ?>-form"
                                            class="coupon_status_form">
                                            <label class="switcher">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       id="coupon_status<?php echo e($coupon['id']); ?>" name="status" value="1"
                                                       <?php echo e($coupon['status'] == 1 ? 'checked':''); ?>

                                                       data-modal-id="toggle-status-modal"
                                                       data-toggle-id="coupon_status<?php echo e($coupon['id']); ?>"
                                                       data-on-image="coupon-status-on.png"
                                                       data-off-image="coupon-status-off.png"
                                                       data-on-title="<?php echo e(translate('Want_to_Turn_ON_Coupon_Status').'?'); ?>"
                                                       data-off-title="<?php echo e(translate('Want_to_Turn_OFF_Coupon_Status').'?'); ?>"
                                                       data-on-message="<p><?php echo e(translate('if_enabled_this_coupon_will_be_available_on_the_website_and_customer_app')); ?></p>"
                                                       data-off-message="<p><?php echo e(translate('if_disabled_this_coupon_will_be_hidden_from_the_website_and_customer_app')); ?></p>"
                                                >
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <button class="btn btn-outline--primary square-btn btn-sm mr-1 get-quick-view" data-id="<?php echo e($coupon['id']); ?>">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/eye.svg')); ?>" class="svg" alt="">
                                            </button>
                                            <a class="btn btn-outline--primary btn-sm edit"
                                               href="<?php echo e(route('admin.coupon.update',[$coupon['id']])); ?>"
                                               title="<?php echo e(translate('edit')); ?>"
                                            >
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete delete-data"
                                               href="javascript:"
                                               data-id="coupon-<?php echo e($coupon['id']); ?>"
                                               title="<?php echo e(translate('delete')); ?>"
                                            >
                                                <i class="tio-delete"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.coupon.delete',[$coupon['id']])); ?>"
                                                  method="post" id="coupon-<?php echo e($coupon['id']); ?>">
                                                <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="modal fade" id="quick-view" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered coupon-details" role="document">
                                <div class="modal-content" id="quick-view-modal">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <?php echo e($coupons->links()); ?>

                        </div>
                    </div>

                    <?php if(count($coupons)==0): ?>
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

    <span id="coupon-bearer-url" data-url="<?php echo e(route('admin.coupon.ajax-get-seller')); ?>"></span>
    <span id="get-detail-url" data-url="<?php echo e(route('admin.coupon.quick-view-details')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/coupon.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/coupon/add-new.blade.php ENDPATH**/ ?>