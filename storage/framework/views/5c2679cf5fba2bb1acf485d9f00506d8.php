<?php
    use App\Models\BusinessSetting;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Session;
?>

<?php $__env->startSection('title', translate('language')); ?>
<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction') === "rtl" ? 'right' : 'left'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_setup')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger mb-3" role="alert">
                    <?php echo e(translate('changing_some_settings_will_take_time_to_show_effect_please_clear_session_or_wait_for_60_minutes_else_browse_from_incognito_mode')); ?>

                </div>
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <span class="title-color text-capitalize font-weight-bold">
                                    <?php echo e(translate('language_table')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('after_adding_a_new_language,_you_need_to_translate_the_key_contents_for_users_to_experience_this_feature').' . '.translate('to_translate_a_language_click_the_action_button_from_the_language_table_&_click_translate').'.'.translate('then_change_the_key_language_value_manually_or_click_the_‘Auto_Translate’_button').'.'.translate('Finally,_click_‘Update’_to_save_the_changes').'.'); ?>">
                                        <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </span>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <div class="d-flex gap-10 justify-content-sm-end">
                                    <button class="btn btn--primary btn-icon-split" data-toggle="modal"
                                            data-target="#lang-modal">
                                        <i class="tio-add"></i>
                                        <span class="text"><?php echo e(translate('add_new_language')); ?></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive pb-3">
                        <table
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                            style="text-align: <?php echo e($direction); ?>;">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('ID')); ?></th>
                                <th><?php echo e(translate('name')); ?></th>
                                <th><?php echo e(translate('code')); ?></th>
                                <th class="text-center"><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('default_status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php ($language=BusinessSetting::where('type','language')->first()); ?>
                            <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key++); ?></td>
                                    <td><?php echo e($data['id']); ?></td>
                                    <td><?php echo e($data['name']); ?> (<?php echo e($data['direction']??'ltr'); ?>)
                                    </td>
                                    <td><?php echo e($data['code']); ?></td>
                                    <td>
                                        <?php if(array_key_exists('default', $data) && $data['default']): ?>
                                            <label class="switcher mx-auto" id="default-language-status-alert"
                                                   data-text="<?php echo e(translate('default_language_can_not_be_deactive').'!'); ?>">
                                                <input type="checkbox" class="switcher_input" checked disabled>
                                                <span class="switcher_control"></span>
                                            </label>
                                        <?php else: ?>
                                            <form action="<?php echo e(route('admin.business-settings.language.update-status')); ?>"
                                                  method="post" id="language-id-<?php echo e($data['id']); ?>-form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="code" value="<?php echo e($data['code']); ?>">
                                                <label class="switcher mx-auto">
                                                    <input type="checkbox" class="switcher_input toggle-switch-message"
                                                           <?php echo e($data['status']==1?'checked':''); ?>

                                                           id="language-id-<?php echo e($data['id']); ?>" name="status"
                                                           data-modal-id="toggle-status-modal"
                                                           data-toggle-id="language-id-<?php echo e($data['id']); ?>"
                                                           data-on-image="language-on.png"
                                                           data-off-image="language-off.png"
                                                           data-on-title="<?php echo e(translate('want_to_Turn_ON_Language_Status').'?'); ?>"
                                                           data-off-title="<?php echo e(translate('want_to_Turn_OFF_Language_Status').'?'); ?>"
                                                           data-on-message="<p><?php echo e(translate('if_enabled_this_language_will_be_available_throughout_the_entire_system')); ?></p>"
                                                           data-off-message="<p><?php echo e(translate('if_disabled_this_language_will_be_hidden_from_the_entire_system')); ?></p>">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(array_key_exists('default', $data) && $data['default']===true): ?>
                                            <label class="switcher mx-auto" id="default-language-status-alert">
                                                <input type="checkbox" class="switcher_input" checked disabled>
                                                <span class="switcher_control"></span>
                                            </label>
                                        <?php elseif(array_key_exists('default', $data) && $data['default']===false): ?>
                                            <form
                                                action="<?php echo e(route('admin.business-settings.language.update-default-status', ['code'=>$data['code']])); ?>"
                                                method="get" id="language-default-id-<?php echo e($data['id']); ?>-form" data-from="default-language">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="code" value="<?php echo e($data['code']); ?>">
                                                <label class="switcher mx-auto">
                                                    <input type="checkbox" class="switcher_input toggle-switch-message"
                                                           id="language-default-id-<?php echo e($data['id']); ?>" name="default"
                                                           data-modal-id="toggle-status-modal"
                                                           data-toggle-id="language-default-id-<?php echo e($data['id']); ?>"
                                                           data-on-image="language-on.png"
                                                           data-off-image="language-off.png"
                                                           data-on-title="<?php echo e(translate('want_to_Change_Default_Language_Status').'?'); ?>"
                                                           data-off-title="<?php echo e(translate('want_to_Change_Default_Language_Status').'?'); ?>"
                                                           data-on-message="<p><?php echo e(translate('if_enabled_this_language_will_be_set_as_default_for_the_entire_system')); ?></p>"
                                                           data-off-message="<p><?php echo e(translate('if_disabled_this_language_will_be_unset_as_default_for_the_entire_system')); ?></p>">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-seconary btn-sm dropdown-toggle"
                                                    type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="tio-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php if($data['code']!='en'): ?>
                                                    <a class="dropdown-item" data-toggle="modal"
                                                       data-target="#lang-modal-update-<?php echo e($data['code']); ?>"><?php echo e(translate('update')); ?></a>
                                                    <?php if($data['default'] === true): ?>
                                                        <a class="dropdown-item default-language-delete-alert"
                                                           href="javascript:"
                                                           data-text="<?php echo e(translate('default_language_can_not_be_deleted').'!'.translate('to_delete_change_the_default_language_first').'!'); ?>"
                                                           ><?php echo e(translate('delete')); ?></a>
                                                    <?php else: ?>
                                                        <a class="dropdown-item delete"
                                                           id="<?php echo e(route('admin.business-settings.language.delete',[$data['code']])); ?>"><?php echo e(translate('delete')); ?></a>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <a class="dropdown-item"
                                                   href="<?php echo e(route('admin.business-settings.language.translate',[$data['code']])); ?>"><?php echo e(translate('translate')); ?></a>
                                            </div>
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
        <div class="modal fade" id="lang-modal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('new_language')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.business-settings.language.add-new')); ?>" method="post"
                          style="text-align: <?php echo e($direction); ?>;">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="recipient-name"
                                               class="col-form-label"><?php echo e(translate('language')); ?> </label>
                                        <input type="text" class="form-control" id="recipient-name" name="name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="message-text"
                                               class="col-form-label"><?php echo e(translate('country_code')); ?></label>
                                        <select class="form-control select-country w-100" name="code">
                                            <?php $__currentLoopData = File::files(base_path('public/assets/front-end/img/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(pathinfo($path)['filename'] !='en'): ?>
                                                    <option value="<?php echo e(pathinfo($path)['filename']); ?>"
                                                            title="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/flags/'.pathinfo($path)['filename'].'.png')); ?>">
                                                        <?php echo e(strtoupper(pathinfo($path)['filename'])); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(translate('direction').':'); ?></label>
                                        <select class="form-control" name="direction">
                                            <option value="ltr"><?php echo e(translate('LTR')); ?></option>
                                            <option value="rtl"><?php echo e(translate('RTL')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('add')); ?>

                                <i class="fa fa-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php $__currentLoopData = json_decode($language['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="lang-modal-update-<?php echo e($data['code']); ?>" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('new_language')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('admin.business-settings.language.update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                   class="col-form-label"><?php echo e(translate('language')); ?> </label>
                                            <input type="text" class="form-control" value="<?php echo e($data['name']); ?>"
                                                   name="name">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="message-text"
                                                   class="col-form-label"><?php echo e(translate('country_code')); ?></label>
                                            <select class="form-control select-country w-100" name="code">
                                                <?php $__currentLoopData = File::files(base_path('public/assets/front-end/img/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(pathinfo($path)['filename'] !='en' && $data['code']==pathinfo($path)['filename']): ?>
                                                        <option value="<?php echo e(pathinfo($path)['filename']); ?>"
                                                                title="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/flags/'.pathinfo($path)['filename'].'.png')); ?>">
                                                            <?php echo e(strtoupper(pathinfo($path)['filename'])); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label"><?php echo e(translate('direction')); ?> :</label>
                                            <select class="form-control" name="direction">
                                                <option
                                                    value="ltr" <?php echo e(isset($data['direction'])?$data['direction']=='ltr'?'selected':'':''); ?>>
                                                    <?php echo e(translate('LTR')); ?>

                                                </option>
                                                <option
                                                    value="rtl" <?php echo e(isset($data['direction'])?$data['direction']=='rtl'?'selected':'':''); ?>>
                                                    <?php echo e(translate('RTL')); ?>

                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?> <i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/language.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/language/index.blade.php ENDPATH**/ ?>