<?php $__env->startSection('title', translate('currency')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_Setup')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 d-flex align-items-center gap-2">
                    <img width="20 " src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/currency-1.png')); ?>" alt="">
                    <?php echo e(translate('default-currency_setup')); ?>

                </h5>
            </div>
            <div class="card-body">
                <form class="form-inline_ text-start" action="<?php echo e(route('admin.currency.system-currency-update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="currency_id" class="title-color"><?php echo e(translate('currency')); ?></label>
                        <select class="form-control js-select2-custom" name="currency_id">
                            <?php $__currentLoopData = $currencies->where('status', 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($currency->id); ?>" <?php echo e($default['value'] == $currency->id?'selected':''); ?> >
                                    <?php echo e($currency->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end flex-wrap mt-3">
                        <button type="submit" class="btn btn--primary px-5"><?php echo e(translate('save')); ?></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0 d-flex align-items-center gap-2">
                    <img width="18" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/currency-1.png')); ?>" alt="">
                    <?php echo e(translate('add_currency')); ?>

                </h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.currency.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <label for="name"
                                               class="title-color mb-0"><?php echo e(translate('currency_name')); ?></label>
                                        <i class="tio-info-outined" data-toggle="tooltip"
                                           title="<?php echo e(translate('add_the_name_of_the_currency_you_want_to_add')); ?>"></i>
                                    </div>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="<?php echo e(translate('ex'.':'.translate('United_States_Dollar'))); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <label for="symbol"
                                               class="title-color mb-0"><?php echo e(translate('currency_symbol')); ?></label>
                                        <i class="tio-info-outined" data-toggle="tooltip"
                                           title="<?php echo e(translate('add_the_symbol_of_the_currency_you_want_to_add')); ?>"></i>
                                    </div>
                                    <input type="text" name="symbol" class="form-control" id="symbol"
                                           placeholder="<?php echo e(translate('ex').':'.'$'); ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <label for="symbol"
                                               class="title-color mb-0"><?php echo e(translate('currency_code')); ?></label>
                                        <i class="tio-info-outined" data-toggle="tooltip"
                                           title="<?php echo e(translate('add_the_code_of_the_currency_you_want_to_add')); ?>"></i>
                                    </div>
                                    <input type="text" name="code" class="form-control" id="code"
                                           placeholder="<?php echo e(translate('ex').':'.'USD'); ?>" required>
                                </div>
                            </div>
                            <?php if($currencyModel['value']=='multi_currency'): ?>
                                <div class="col-sm-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <label for="exchange_rate"
                                                   class="title-color mb-0"><?php echo e(translate('exchange_rate')); ?></label>
                                            <i class="tio-info-outined" data-toggle="tooltip"
                                               title="<?php echo e(translate('based_on_your_region_set_the_exchange_rate_of_the_currency_you_want_to_add')); ?>"></i>
                                        </div>
                                        <input type="number" min="0" max="1000000" name="exchange_rate"
                                               step="0.00000001" class="form-control" id="exchange_rate"
                                               placeholder="<?php echo e(translate('ex').':'.'120'); ?>" required>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-secondary px-5"><?php echo e(translate('reset')); ?></button>
                                    <button type="submit" id="add"
                                            class="btn btn--primary px-5"><?php echo e(translate('submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="mt-4">
                    <div class="table-responsive">
                        <table
                                class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table text-start">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('currency_name')); ?></th>
                                <th><?php echo e(translate('currency_symbol')); ?></th>
                                <th><?php echo e(translate('currency_code')); ?></th>
                                <?php if($currencyModel['value']=='multi_currency'): ?>
                                    <th><?php echo e(translate('exchange_rate')); ?>

                                        (<?php echo e('1'.' '. getCurrencyCode(type: 'default').' '.'='.'?'); ?>)
                                    </th>
                                <?php endif; ?>
                                <th><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($currencies->firstitem()+ $key); ?></td>
                                    <td><?php echo e($currency->name); ?></td>
                                    <td><?php echo e($currency->symbol); ?></td>
                                    <td><?php echo e($currency->code); ?></td>
                                    <?php if($currencyModel['value']=='multi_currency'): ?>
                                        <td><?php echo e($currency->exchange_rate); ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if($default['value'] != $currency->id): ?>
                                            <form action="<?php echo e(route('admin.currency.status')); ?>" method="post"
                                                  id="currency-status<?php echo e($currency['id']); ?>-form" class="currency_status_form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($currency['id']); ?>">
                                                <label class="switcher" for="currency-status<?php echo e($currency['id']); ?>">
                                                    <input type="checkbox" class="switcher_input toggle-switch-message"
                                                           id="currency-status<?php echo e($currency['id']); ?>" name="status" value="1"
                                                           <?php echo e($currency->status?'checked':''); ?>

                                                           data-modal-id = "toggle-status-modal"
                                                           data-toggle-id = "currency-status<?php echo e($currency['id']); ?>"
                                                           data-on-image = "currency-on.png"
                                                           data-off-image = "currency-off.png"
                                                           data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Currency_Status').'?'); ?>"
                                                           data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Currency_Status').'?'); ?>"
                                                           data-on-message = "<p><?php echo e(translate('if_enabled_this_currency_will_be_available_throughout_the_entire_system')); ?></p>"
                                                           data-off-message = "<p><?php echo e(translate('if_disabled_this_currency_will_be_hidden_from_the_entire_system')); ?></p>">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </form>
                                        <?php else: ?>
                                            <label class="badge badge-primary-light"><?php echo e(translate('default')); ?></label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <?php if($currency->code != 'USD'): ?>
                                                <a title="<?php echo e(translate('edit')); ?>"
                                                   type="button" class="btn btn-outline--primary btn-sm btn-xs edit"
                                                   href="<?php echo e(route('admin.currency.update',[$currency->id])); ?>">
                                                    <i class="tio-edit"></i>
                                                </a>
                                                <a title="<?php echo e(translate('delete')); ?>"
                                                   type="button" class="btn btn-outline-danger btn-sm btn-xs <?php echo e($default['value'] == $currency['id'] ? 'default-currency-delete-alert' : 'delete-data-without-form'); ?>"
                                                   data-action="<?php echo e(route('admin.currency.delete')); ?>"
                                                   data-id="<?php echo e($currency->id); ?>"
                                                   data-from = "currency"
                                                >
                                                    <i class="tio-delete"></i>
                                                </a>
                                            <?php else: ?>
                                                <button title="<?php echo e(translate('edit')); ?>"
                                                        class="btn btn-outline--primary btn-sm btn-xs edit" disabled>
                                                    <i class="tio-edit"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <?php echo e($currencies->links()); ?>

                        </div>
                    </div>
                    <?php if(count($currencies)==0): ?>
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
    <span id="get-currency-warning-message" data-warning="<?php echo e(translate('default_currency_can_not_be_deleted').'!'.translate('to_delete_change_the_default_currency_first').'.!'); ?>"></span>
    <span id="get-delete-currency-message" data-success="<?php echo e(translate('currency_removed_successfully').'!'); ?>" data-warning="<?php echo e(translate('this_Currency_cannot_be_removed_due_to_payment_gateway_dependency').'!'); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        $('.default-currency-delete-alert').on('click',function (){
            toastr.warning($('#get-currency-warning-message').data('warning'));
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/currency/view.blade.php ENDPATH**/ ?>