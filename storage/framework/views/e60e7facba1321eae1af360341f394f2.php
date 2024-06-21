<?php $__env->startSection('title', translate('flash_Deal_Update')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/flash_deal.png')); ?>" alt="">
                <?php echo e(translate('flash_deals_update')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.deal.update',[$deal['id']])); ?>" method="post"
                              class="text-start onsubmit-disable-action-button"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php ($language = getWebConfig(name:'pnc_language')); ?>
                            <?php ($defaultLanguage = 'en'); ?>
                            <?php ($defaultLanguage = $language[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link lang-link <?php echo e($lang == $defaultLanguage ? 'active':''); ?>"
                                           href="javascript:"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            if (count($deal['translations'])) {
                                                $translate = [];
                                                foreach ($deal['translations'] as $t) {
                                                    if ($t->locale == $lang && $t->key == "title") {
                                                        $translate[$lang]['title'] = $t->value;
                                                    }
                                                }
                                            }
                                            ?>
                                        <div class="form-group <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> lang-form"
                                             id="<?php echo e($lang); ?>-form">
                                            <input type="text" name="deal_type" value="flash_deal" class="d-none">
                                            <label for="name" class="title-color"><?php echo e(translate('title')); ?>

                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="title[]" class="form-control" id="title"
                                                   value="<?php echo e($lang==$defaultLanguage?$deal['title']:($translate[$lang]['title']??'')); ?>"
                                                   placeholder="<?php echo e(translate('ex').':'.' '.translate('LUX')); ?>"
                                                    <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                        <label for="name" class="title-color"><?php echo e(translate('start_date')); ?></label>
                                        <input type="date" value="<?php echo e(date('Y-m-d',strtotime($deal['start_date']))); ?>"
                                               name="start_date" id="start-date-time" required
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="title-color"><?php echo e(translate('end_date')); ?></label>
                                        <input type="date" value="<?php echo e(date('Y-m-d', strtotime($deal['end_date']))); ?>"
                                               name="end_date" id="end-date-time" required
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center">
                                                <img class="border radius-10 ratio-4:1 max-w-655px img-fit" id="viewer"
                                                     src="<?php echo e(getValidImage(path: 'storage/app/public/deal/'. $deal['banner'] , type: 'backend-basic')); ?>"
                                                     alt="<?php echo e(translate('banner_image')); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="title-color"><?php echo e(translate('upload_Image')); ?></label>
                                            <span class="text-info ml-0">( <?php echo e(translate('ratio').' '.'5:1'); ?>)</span>
                                            <div class="custom-file text-left">
                                                <input type="file" name="image" id="custom-file-upload"
                                                       class="custom-file-input image-input" data-image-id="viewer"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label"
                                                       for="custom-file-upload"><?php echo e(translate('choose_File')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/deal.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/deal/flash-update.blade.php ENDPATH**/ ?>