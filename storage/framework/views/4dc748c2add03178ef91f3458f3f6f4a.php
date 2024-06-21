<?php $__env->startSection('title', translate('sub_Category')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/brand-setup.png')); ?>" alt="">
                <?php echo e(translate('sub_Category_Setup')); ?>

            </h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-start">
                        <form action="<?php echo e(route('admin.sub-category.store')); ?>" method="POST"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <span
                                            class="nav-link form-system-language-tab cursor-pointer <?php echo e($lang == $defaultLanguage? 'active':''); ?>"
                                            id="<?php echo e($lang); ?>-link">
                                            <?php echo e(ucfirst(getLanguageName($lang)).'('.strtoupper($lang).')'); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="<?php echo e(theme_root_path() == 'theme_aster'?'col-lg-6':'col-lg-12'); ?>">

                                    <div class="<?php echo e(theme_root_path() == 'theme_aster'?'w-100':'row'); ?>">
                                        <div class="<?php echo e(theme_root_path() == 'theme_aster'?'w-100':'col-md-6 col-lg-4'); ?>">
                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div
                                                    class="form-group <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> form-system-language-form"
                                                    id="<?php echo e($lang); ?>-form">
                                                    <label class="title-color" for="exampleFormControlInput1">
                                                        <?php echo e(translate('sub_category_name')); ?>

                                                        <span class="text-danger">*</span>
                                                        (<?php echo e(strtoupper($lang)); ?>)
                                                    </label>
                                                    <input type="text" name="name[]" class="form-control"
                                                           placeholder="<?php echo e(translate('new_Sub_Category')); ?>" <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                                </div>
                                                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <input name="position" value="1" class="d-none">
                                        </div>
                                        <div class="form-group <?php echo e(theme_root_path() == 'theme_aster'?'w-100':'col-md-6 col-lg-4'); ?>">
                                            <label class="title-color"
                                                   for="exampleFormControlSelect1"><?php echo e(translate('main_Category')); ?>

                                                <span class="text-danger">*</span></label>
                                            <select id="exampleFormControlSelect1" name="parent_id"
                                                    class="form-control" required>
                                                <option value="" selected disabled>
                                                    <?php echo e(translate('select_main_category')); ?>

                                                </option>
                                                <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category['id']); ?>">
                                                        <?php echo e($category['defaultname']); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group <?php echo e(theme_root_path() == 'theme_aster'?'w-100':'col-md-6 col-lg-4'); ?>">
                                            <label class="title-color" for="priority"><?php echo e(translate('priority')); ?>

                                                <span>
                                                <i class="tio-info-outined"  data-toggle="tooltip" data-placement="top"
                                                   title="<?php echo e(translate('the_lowest_number_will_get_the_highest_priority')); ?>"></i>
                                            </span>
                                            </label>
                                            <select class="form-control" name="priority" id="" required>
                                                <option disabled selected><?php echo e(translate('set_Priority')); ?></option>
                                                <?php for($i = 0; $i <= 10; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <?php if(theme_root_path() == 'theme_aster'): ?>
                                        <div class="from_part_2">
                                            <label class="title-color"><?php echo e(translate('sub_category_Logo')); ?></label>
                                            <span class="text-info">
                                                <?php echo e(THEME_RATIO[theme_root_path()]['Category Image']); ?>

                                            </span>
                                            <div class="custom-file text-left">
                                                <input type="file" name="image" id="category-image"
                                                       class="custom-file-input image-preview-before-upload"
                                                       data-preview="#viewer"
                                                       accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                                <label class="custom-file-label" for="category-image">
                                                    <?php echo e(translate('choose_File')); ?>

                                                </label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php if(theme_root_path() == 'theme_aster'): ?>
                                    <div class="col-lg-6 mt-4 mt-lg-0 from_part_2">
                                        <div class="form-group">
                                            <div class="mx-auto text-center">
                                                <img class="upload-img-view" id="viewer"
                                                     src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/900x400/img1.jpg')); ?>"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-20" id="cate-table">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="d-flex flex-wrap justify-content-between gap-3 align-items-center">
                            <div class="">
                                <h5 class="text-capitalize d-flex gap-1">
                                    <?php echo e(translate('sub_category_list')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($categories->total()); ?></span>
                                </h5>
                            </div>
                            <div class="d-flex flex-wrap gap-3 align-items-center">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="" type="search" name="searchValue" class="form-control"
                                               placeholder="<?php echo e(translate('search_by_sub_category_name')); ?>"
                                               value="<?php echo e(request('searchValue')); ?>">
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
                                               href="<?php echo e(route('admin.sub-category.export',['searchValue'=>request('searchValue')])); ?>">
                                                <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>"
                                                     alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-start">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('ID')); ?></th>
                                <?php if(theme_root_path() == 'theme_aster'): ?>
                                    <th class="text-center"><?php echo e(translate('sub_category_Image')); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(translate('sub_category_name')); ?></th>
                                <th><?php echo e(translate('category_name')); ?></th>
                                <th class="text-center"><?php echo e(translate('priority')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category['id']); ?></td>
                                    <?php if(theme_root_path() == 'theme_aster'): ?>
                                        <td class="text-center">
                                            <img class="rounded" width="64" alt=""
                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/category/'. $category['icon'] , type: 'backend-basic')); ?>">
                                        </td>
                                    <?php endif; ?>
                                    <td><?php echo e(($category['defaultname'])); ?></td>
                                    <td><?php echo e($category?->parent?->defaultname ?? translate('category_not_found')); ?></td>
                                    <td class="text-center"><?php echo e($category['priority']); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline-info btn-sm square-btn"
                                               title="<?php echo e(translate('edit')); ?>"
                                               href="<?php echo e(route('admin.sub-category.update',[$category['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm square-btn category-delete-button"
                                               title="<?php echo e(translate('delete')); ?>"
                                               id="<?php echo e($category['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <?php echo e($categories->links()); ?>

                        </div>
                    </div>

                    <?php if(count($categories)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" alt=""
                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>">
                            <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <span id="route-admin-category-delete" data-url="<?php echo e(route('admin.sub-category.delete')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/products-management.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/category/sub-category-view.blade.php ENDPATH**/ ?>