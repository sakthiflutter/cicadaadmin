<?php $__env->startSection('title', translate('category')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/brand-setup.png')); ?>" class="mb-1 mr-1" alt="">
                <?php if($category['position'] == 1): ?>
                    <?php echo e(translate('sub')); ?>

                <?php elseif($category['position'] == 2): ?>
                    <?php echo e(translate('sub_Sub')); ?>

                <?php endif; ?>
                <?php echo e(translate('category')); ?>

                <?php echo e(translate('update')); ?>

            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body text-start">
                        <form action="<?php echo e(route('admin.category.update', [$category['id']])); ?>" method="POST"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <span
                                            class="nav-link form-system-language-tab cursor-pointer <?php echo e($lang == $defaultLanguage? 'active':''); ?>"
                                            id="<?php echo e($lang); ?>-link">
                                            <?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div
                                    class="<?php echo e($category['parent_id']==0 || $category['position'] == 1 ? 'col-lg-6':'col-12'); ?>">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                                <?php
                                                if (count($category['translations'])) {
                                                    $translate = [];
                                                    foreach ($category['translations'] as $t) {
                                                        if ($t->locale == $lang && $t->key == "name") {
                                                            $translate[$lang]['name'] = $t->value;
                                                        }
                                                    }
                                                }
                                                ?>
                                            <div class="form-group <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> form-system-language-form"
                                                id="<?php echo e($lang); ?>-form">
                                                <label class="title-color">
                                                    <?php echo e(translate('category_Name')); ?> (<?php echo e(strtoupper($lang)); ?>)
                                                </label>
                                                <input type="text" name="name[]"
                                                       value="<?php echo e($lang==$defaultLanguage?$category['name']:($translate[$lang]['name']??'')); ?>"
                                                       class="form-control"
                                                       placeholder="<?php echo e(translate('new_Category')); ?>" <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                            </div>
                                            <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                            <input type="hidden" name="id" value="<?php echo e($category['id']); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-group">
                                        <label class="title-color" for="priority"><?php echo e(translate('priority')); ?></label>
                                        <select class="form-control" name="priority" id="" required>
                                            <?php for($index = 0; $index <= 10; $index++): ?>
                                                <option
                                                    value="<?php echo e($index); ?>" <?php echo e($category['priority']==$index?'selected':''); ?>><?php echo e($index); ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <?php if($category['parent_id']==0 || ($category['position'] == 1 && theme_root_path() == 'theme_aster')): ?>
                                        <div class="from_part_2">
                                            <label class="title-color"><?php echo e(translate('category_Logo')); ?></label>
                                            <span class="text-info">(<?php echo e(translate('ratio')); ?> 1:1)</span>
                                            <div class="custom-file text-left">
                                                <input type="file" name="image" id="category-image"
                                                       class="custom-file-input image-preview-before-upload"
                                                       data-preview="#viewer"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label"
                                                       for="category-image"><?php echo e(translate('choose_File')); ?></label>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-lg-6 mt-5 mt-lg-0 from_part_2">
                                    <div class="form-group">
                                        <div class="text-center mx-auto">
                                            <img class="upload-img-view"
                                                 id="viewer"
                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/category/'. $category['icon'] , type: 'backend-basic')); ?>"
                                                 alt=""/>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($category['position'] == 2 || ($category['position'] == 1 && theme_root_path() != 'theme_aster')): ?>
                                    <div class="d-flex justify-content-end gap-3">
                                        <button type="reset" id="reset" class="btn btn-secondary px-4">
                                            <?php echo e(translate('reset')); ?>

                                        </button>
                                        <button type="submit" class="btn btn--primary px-4">
                                            <?php echo e(translate('update')); ?>

                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if($category['parent_id']==0 || ($category['position'] == 1 && theme_root_path() == 'theme_aster')): ?>
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="reset" id="reset"
                                            class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                    <button type="submit"
                                            class="btn btn--primary px-4"><?php echo e(translate('update')); ?></button>
                                </div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/products-management.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/category/category-edit.blade.php ENDPATH**/ ?>