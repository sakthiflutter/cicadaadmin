<?php
    use Illuminate\Support\Facades\Session;
?>


<?php $__env->startSection('title', translate('FAQ')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/Pages.png')); ?>" width="20" alt="">
                <?php echo e(translate('pages')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.pages-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize"><?php echo e(translate('help_topic_table')); ?> </h5>
                        <button class="btn btn--primary btn-icon-split for-addFaq" data-toggle="modal"
                                data-target="#addModal">
                            <i class="tio-add"></i>
                            <span class="text"><?php echo e(translate('add_FAQ')); ?>  </span>
                        </button>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table
                                class="table table-hover table-borderless table-thead-bordered table-align-middle card-table w-100 text-start"
                                id="dataTable">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('question')); ?></th>
                                    <th class="min-w-200"><?php echo e(translate('answer')); ?></th>
                                    <th class="text-center"><?php echo e(translate('ranking')); ?></th>
                                    <th class="text-center"><?php echo e(translate('status')); ?> </th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $helps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $help): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="data-<?php echo e($help->id); ?>">
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($help['question']); ?></td>
                                        <td><?php echo e($help['answer']); ?></td>
                                        <td class="text-center"><?php echo e($help['ranking']); ?></td>

                                        <td>
                                            <form action="<?php echo e(route('admin.helpTopic.status', ['id'=>$help['id']])); ?>"
                                                  method="get" id="help-topic-status<?php echo e($help['id']); ?>-form"
                                                  class="helpTopic_status_form">
                                                <label class="switcher mx-auto" for="help-topic-status<?php echo e($help['id']); ?>">
                                                    <input type="checkbox" class="switcher_input toggle-switch-message" value="1"
                                                           id="help-topic-status<?php echo e($help['id']); ?>" <?php echo e($help['status'] == 1 ? 'checked':''); ?>

                                                           data-modal-id = "toggle-status-modal"
                                                           data-toggle-id = "help-topic-status<?php echo e($help['id']); ?>"
                                                           data-on-image = "category-status-on.png"
                                                           data-off-image = "category-status-off.png"
                                                           data-on-title = "<?php echo e(translate('want_to_Turn_ON_This_FAQ').'?'); ?>"
                                                           data-off-title = "<?php echo e(translate('want_to_Turn_OFF_This_FAQ').'?'); ?>"
                                                           data-on-message = "<p><?php echo e(translate('if_you_enable_this_FAQ_will_be_shown_in_the_user_app_and_website')); ?></p>"
                                                           data-off-message = "<p><?php echo e(translate('if_you_disable_this_FAQ_will_not_be_shown_in_the_user_app_and_website')); ?></p>">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-10">
                                                <a class="btn btn-outline--primary btn-sm edit"
                                                   data-toggle="modal" data-target="#editModal"
                                                   title="<?php echo e(translate('edit')); ?>"
                                                   data-id="<?php echo e(route('admin.helpTopic.update', ['id'=>$help['id']])); ?>">
                                                    <i class="tio-edit"></i>
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm delete-data-without-form"
                                                   title="<?php echo e(translate('delete')); ?>"
                                                   data-action="<?php echo e(route('admin.helpTopic.delete')); ?>"
                                                   data-id="<?php echo e($help['id']); ?>">
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
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(translate('add_Help_Topic')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                                aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.helpTopic.add-new')); ?>" method="post" id="addForm">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body text-start">
                            <div class="form-group">
                                <label><?php echo e(translate('question')); ?></label>
                                <input type="text" class="form-control" name="question"
                                       placeholder="<?php echo e(translate('type_Question')); ?>">
                            </div>


                            <div class="form-group">
                                <label><?php echo e(translate('answer')); ?></label>
                                <textarea class="form-control" name="answer" cols="5"
                                          rows="5" placeholder="<?php echo e(translate('type_Answer')); ?>"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="control-label"><?php echo e(translate('status')); ?></div>
                                        <label class="mt-2">
                                            <input type="checkbox" name="status" id="e_status" value="1"
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span
                                                class="custom-switch-description"><?php echo e(translate('active')); ?></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="ranking"><?php echo e(translate('ranking')); ?></label>
                                    <input type="number" name="ranking" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                            <button class="btn btn--primary"><?php echo e(translate('save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize"><?php echo e(translate('edit_modal_help_topic')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="update-form-submit" class="text-start">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">

                        <div class="form-group">
                            <label><?php echo e(translate('question')); ?></label>
                            <input type="text" class="form-control e_name" name="question"
                                   placeholder="<?php echo e(translate('type_Question')); ?>"
                                   id="question-filed">
                        </div>


                        <div class="form-group">
                            <label><?php echo e(translate('answer')); ?></label>
                            <textarea class="form-control" name="answer" cols="5"
                                      rows="5" placeholder="<?php echo e(translate('type_Answer')); ?>"
                                      id="answer-field"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="ranking"><?php echo e(translate('ranking')); ?></label>
                                <input type="number" name="ranking" class="form-control" id="ranking-field" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                        <button class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/business-setting.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/help-topics/list.blade.php ENDPATH**/ ?>