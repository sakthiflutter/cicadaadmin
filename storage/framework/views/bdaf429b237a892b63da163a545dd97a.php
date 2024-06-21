<?php $__env->startSection('title', translate(str_replace('-',' ',$page))); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/Pages.png')); ?>" alt="">
                <?php echo e(translate('pages')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.pages-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php ( $page_data= json_decode($data->value, true)); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="<?php echo e(route('admin.business-settings.page-update', [$page])); ?>" method="post">
                        <?php echo csrf_field(); ?>

                        <div class="card-header">
                            <h5 class="mb-0"><?php echo e(translate(str_replace('-',' ',$page))); ?></h5>

                            <label class="switcher show-status-text justify-content-end" for="page-status">
                                <input type="checkbox" class="switcher_input toggle-switch-message" value="1" name="status"
                                   id="page-status"  <?php echo e($page_data['status'] == 1 ? 'checked':''); ?>

                                   data-modal-id = "toggle-modal"
                                   data-toggle-id = "page-status"
                                   data-on-image = ""
                                   data-off-image = ""
                                   data-on-title = "<?php echo e(translate('want_to_Turn_ON').' '.translate(str_replace('-','_',$page)).' '.translate('status')); ?>"
                                   data-off-title = "<?php echo e(translate('want_to_Turn_OFF').' '.translate(str_replace('-','_',$page)) .' '. translate('status')); ?>"
                                   data-on-message = "<p><?php echo e(translate('if_you_enable_this_option_'.str_replace('-','_',$page).'_page_will_be_shown_in_the_user_app_and_website')); ?></p>"
                                   data-off-message = "<p><?php echo e(translate('if_you_disable_this_option_'.str_replace('-','_',$page).'_page_will_not_be_shown_in_the_user_app_and_website')); ?></p>">
                                <span class="switcher_control" data-ontitle="<?php echo e(translate('on')); ?>" data-offtitle="<?php echo e(translate('off')); ?>"></span>
                            </label>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control summernote" id="editor"
                                    name="value"><?php echo e($page_data['content']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control btn--primary" type="submit" value="<?php echo e(translate('submit')); ?>" name="btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.js')); ?>"></script>
    <script>
        'use strict';
        $(document).on('ready', function () {
            $('.summernote').summernote({
                'height': 150,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                ]
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/page/page.blade.php ENDPATH**/ ?>