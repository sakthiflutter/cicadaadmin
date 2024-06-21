<?php $__env->startSection('title', translate('terms_and_condition')); ?>

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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(translate('terms_and_condition')); ?></h5>
                    </div>
                    <form action="<?php echo e(route('admin.business-settings.update-terms')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <textarea class="form-control summernote" id="editor"
                                    name="value"><?php echo e($terms_condition->value); ?></textarea>
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/page/terms-condition.blade.php ENDPATH**/ ?>