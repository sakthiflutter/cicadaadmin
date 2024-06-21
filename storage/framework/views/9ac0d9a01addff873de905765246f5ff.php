<?php
    use Illuminate\Support\Facades\Session;
?>

<?php $__env->startSection('title', translate('social_media')); ?>
<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/social media.png')); ?>" width="20" alt="">
                <?php echo e(translate('social_media')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(translate('social_media_form')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.social-media-store')); ?>" method="post" style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;" id="social-media-links">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name" class="title-color"><?php echo e(translate('name')); ?></label>
                                        <select class="form-control w-100" name="name" id="name" required>
                                            <option value=""><?php echo e('---'.translate('select').'---'); ?></option>
                                            <option value="instagram"><?php echo e(translate('instagram')); ?></option>
                                            <option value="facebook"><?php echo e(translate('facebook')); ?></option>
                                            <option value="twitter"><?php echo e(translate('twitter')); ?></option>
                                            <option value="linkedin"><?php echo e(translate('linkedIn')); ?></option>
                                            <option value="pinterest"><?php echo e(translate('pinterest')); ?></option>
                                            <option value="google-plus"><?php echo e(translate('google_plus')); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <input type="hidden" id="id" name="id">
                                        <label for="link" class="title-color"><?php echo e(translate('social_media_link')); ?></label>
                                        <input type="url" name="link" class="form-control" id="link"
                                               placeholder="<?php echo e(translate('enter_Social_Media_Link')); ?>" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="id">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-10 justify-content-end flex-wrap">
                                <button type="submit" id="actionBtn" class="btn btn--primary px-4"><?php echo e(translate('save')); ?></button>
                                <a id="update" class="btn btn--primary px-4 d--none"><?php echo e(translate('update')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <h5 class="mb-0 d-flex"><?php echo e(translate('social_media_table')); ?></h5>
                    </div>
                    <div class="pb-3">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100" id="dataTable"
                                   style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;">
                                <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(translate('sl')); ?></th>
                                        <th><?php echo e(translate('name')); ?></th>
                                        <th><?php echo e(translate('link')); ?></th>
                                        <th class="text-center"><?php echo e(translate('status')); ?></th>
                                        <th><?php echo e(translate('action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="get-update" data-text="<?php echo e(translate('update')); ?>" data-action="<?php echo e(route('admin.business-settings.social-media-update')); ?>"></span>
    <span id="get-update-view" data-text="<?php echo e(translate('edit')); ?>" data-action="<?php echo e(route('admin.business-settings.social-media-edit')); ?>"></span>
    <span id="get-delete"
          data-confirm="<?php echo e(translate('are_you_sure_delete_this_social_media').'?'); ?>"
          data-success="<?php echo e(translate('social_media_deleted_successfully').'.'); ?>"
          data-action="<?php echo e(route('admin.business-settings.social-media-delete')); ?>">
    </span>
    <span id="get-social-media-links-data"
        data-success = "<?php echo e(translate('social_Media_inserted_Successfully')); ?>"
        data-info = "<?php echo e(translate('social_info_updated_successfully')); ?>"
        data-save = "<?php echo e(translate('save')); ?>"
        data-action="<?php echo e(route('admin.business-settings.social-media-store')); ?>">
    </span>
    <span id="get-fetch-route" data-action="<?php echo e(route('admin.business-settings.fetch')); ?>"></span>
    <span id="get-toggle-status-text"
          data-action="<?php echo e(route('admin.business-settings.social-media-status-update')); ?>"
          data-turn-on-text="<?php echo e(translate('Want_to_Turn_ON').'?'); ?>"
          data-turn-off-text="<?php echo e(translate('Want_to_Turn_OFF').'?'); ?>"
          data-status="<?php echo e(translate('status')); ?>"
          data-on-message="<?php echo e(translate('if_enabled_this_icon_will_be_available_on_the_website_and_customer_app').'.'); ?>"
          data-off-message="<?php echo e(translate('if_disabled_this_icon_will_be_hidden_from_the_website_and_customer_app').'.'); ?>">
    </span>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/social-media.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/social-media.blade.php ENDPATH**/ ?>