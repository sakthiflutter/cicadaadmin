<?php $__env->startSection('title', translate('brand_Add')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0 d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/brand.png')); ?>" alt="">
                <?php echo e(translate('brand_Setup')); ?>

            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body text-start">
                        <form action="<?php echo e(route('admin.brand.add-new')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <span class="nav-link form-system-language-tab cursor-pointer <?php echo e($lang == $defaultLanguage ? 'active':''); ?>"
                                           id="<?php echo e($lang); ?>-link">
                                            <?php echo e(ucfirst(getLanguageName($lang)).'('.strtoupper($lang).')'); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="form-group <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> form-system-language-form"
                                            id="<?php echo e($lang); ?>-form">
                                            <label for="name" class="title-color">
                                                <?php echo e(translate('brand_Name')); ?>

                                                <span class="text-danger">*</span>
                                                (<?php echo e(strtoupper($lang)); ?>)
                                            </label>
                                            <input type="text" name="name[]" class="form-control" id="name" value=""
                                                   placeholder="<?php echo e(translate('ex')); ?> : <?php echo e(translate('LUX')); ?>" <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                        <label for="name" class="title-color">
                                            <?php echo e(translate('brand_Logo')); ?><span class="text-danger">*</span>
                                        </label>
                                        <span class="ml-1 text-info">
                                        <?php echo e(THEME_RATIO[theme_root_path()]['Brand Image']); ?>

                                    </span>
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" id="brand-image"
                                                   class="custom-file-input image-preview-before-upload"
                                                   data-preview="#viewer" required
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label" for="brand-image">
                                                <?php echo e(translate('choose_file')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="text-center">
                                        <img class="upload-img-view" id="viewer"
                                             src="<?php echo e(dynamicAsset(path: 'public\assets\back-end\img\400x400\img2.jpg')); ?>" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 justify-content-end">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/products-management.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/brand/add-new.blade.php ENDPATH**/ ?>