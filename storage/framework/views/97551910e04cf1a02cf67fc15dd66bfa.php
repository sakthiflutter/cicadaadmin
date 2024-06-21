<?php $__env->startSection('title', translate('category')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-10">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/brand-setup.png')); ?>" alt="">
                <?php echo e(translate('category_Setup')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-start">
                        <form action="<?php echo e(route('admin.category.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <span
                                            class="nav-link form-system-language-tab cursor-pointer <?php echo e($lang == $defaultLanguage? 'active':''); ?>"
                                            id="<?php echo e($lang); ?>-link">
                                            <?php echo e(ucfirst(getLanguageName($lang)).'('.strtoupper($lang).')'); ?>

                                        </span>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div
                                                class="form-group <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> form-system-language-form"
                                                id="<?php echo e($lang); ?>-form">
                                                <label class="title-color"><?php echo e(translate('category_Name')); ?><span
                                                        class="text-danger">*</span> (<?php echo e(strtoupper($lang)); ?>)</label>
                                                <input type="text" name="name[]" class="form-control"
                                                       placeholder="<?php echo e(translate('new_Category')); ?>" <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                            </div>
                                            <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <input name="position" value="0" class="d-none">
                                    </div>
                                    <div class="form-group">
                                        <label class="title-color" for="priority"><?php echo e(translate('priority')); ?>

                                            <span>
                                            <i class="tio-info-outined" data-toggle="tooltip" data-placement="top"
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
                                    <div class="from_part_2">
                                        <label class="title-color"><?php echo e(translate('category_Logo')); ?></label>
                                        <span class="text-info"><span class="text-danger">*</span> <?php echo e(THEME_RATIO[theme_root_path()]['Category Image']); ?></span>
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" id="category-image"
                                                   class="custom-file-input image-preview-before-upload"
                                                   data-preview="#viewer"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                                   required>
                                            <label class="custom-file-label"
                                                   for="category-image"><?php echo e(translate('choose_File')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4 mt-lg-0 from_part_2">
                                    <div class="form-group">
                                        <div class="text-center mx-auto">
                                            <img class="upload-img-view" id="viewer" alt=""
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/image-place-holder.png')); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
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
                                    <?php echo e(translate('category_list')); ?>

                                    <span
                                        class="badge badge-soft-dark radius-50 fz-12"><?php echo e($categories->total()); ?></span>
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
                                               placeholder="<?php echo e(translate('search_by_category_name')); ?>"
                                               value="<?php echo e(request('searchValue')); ?>">
                                        <button type="submit"
                                                class="btn btn--primary"><?php echo e(translate('search')); ?></button>
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
                                               href="<?php echo e(route('admin.category.export',['searchValue'=>request('searchValue')])); ?>">
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
                                <th class="text-center"><?php echo e(translate('category_Image')); ?></th>
                                <th><?php echo e(translate('name')); ?></th>
                                <th class="text-center"><?php echo e(translate('priority')); ?></th>
                                <th class="text-center"><?php echo e(translate('home_category_status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category['id']); ?></td>
                                    <td class="d-flex justify-content-center">
                                        <div class="avatar-60 d-flex align-items-center rounded">
                                            <img class="img-fluid" alt=""
                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/category/'.$category['icon'], type: 'backend-category')); ?>">
                                        </div>
                                    </td>
                                    <td><?php echo e($category['defaultname']); ?></td>
                                    <td class="text-center">
                                        <?php echo e($category['priority']); ?>

                                    </td>
                                    <td class="text-center">

                                        <form action="<?php echo e(route('admin.category.status')); ?>" method="post"
                                              id="category-status<?php echo e($category['id']); ?>-form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($category['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       name="home_status"
                                                       id="category-status<?php echo e($category['id']); ?>" value="1"
                                                       <?php echo e($category['home_status'] == 1 ? 'checked' : ''); ?>

                                                       data-modal-id="toggle-status-modal"
                                                       data-toggle-id="category-status<?php echo e($category['id']); ?>"
                                                       data-on-image="category-status-on.png"
                                                       data-off-image="category-status-off.png"
                                                       data-on-title="<?php echo e(translate('Want_to_Turn_ON').' '.$category['defaultname'].' '. translate('status')); ?>"
                                                       data-off-title="<?php echo e(translate('Want_to_Turn_OFF').' '.$category['defaultname'].' '.translate('status')); ?>"
                                                       data-on-message="<p><?php echo e(translate('if_enabled_this_category_it_will_be_visible_from_the_category_wise_product_section_in_the_website_and_customer_app_in_the_homepage')); ?></p>"
                                                       data-off-message="<p><?php echo e(translate('if_disabled_this_category_it_will_be_hidden_from_the_category_wise_product_section_in_the_website_and_customer_app_in_the_homepage')); ?></p>">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-10">
                                            <a class="btn btn-outline-info btn-sm square-btn "
                                               title="<?php echo e(translate('edit')); ?>"
                                               href="<?php echo e(route('admin.category.update',[$category['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm square-btn delete-category"
                                               title="<?php echo e(translate('delete')); ?>"
                                               data-product-count = "<?php echo e(count($category?->product)); ?>"
                                               data-text="<?php echo e(translate('there_were_').count($category?->product).translate('_products_under_this_category').'.'.translate('please_update_their_category_from_the_below_list_before_deleting_this_one').'.'); ?>"
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
                    <?php if(count($categories) == 0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160"
                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                 alt="<?php echo e(translate('image_description')); ?>">
                            <p class="mb-0"><?php echo e(translate('no_data_found')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <span id="route-admin-category-delete" data-url="<?php echo e(route('admin.category.delete')); ?>"></span>
    <span id="get-categories" data-categories="<?php echo e(json_encode($categories)); ?>"></span>
    <div class="modal fade" id="select-category-modal" tabindex="-1" aria-labelledby="toggle-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                            class="tio-clear"></i></button>
                </div>
                <div class="modal-body px-4 px-sm-5 pt-0 pb-sm-5">
                    <div class="d-flex flex-column align-items-center text-center gap-2 mb-2">
                        <div
                            class="toggle-modal-img-box d-flex flex-column justify-content-center align-items-center mb-3 position-relative">
                            <img src="<?php echo e(dynamicAsset('public/assets/back-end/img/icons/info.svg')); ?>" alt="" width="90"/>
                        </div>
                        <h5 class="modal-title mb-2 category-title-message category-title-message"></h5>
                    </div>
                    <form action="<?php echo e(route('admin.category.delete')); ?>" method="post" class="product-category-update-form-submit">
                        <?php echo csrf_field(); ?>
                        <input name="id" hidden="">
                        <div class="gap-2 mb-3">
                            <label class="title-color"
                                   for="exampleFormControlSelect1"><?php echo e(translate('select_Category')); ?>

                                <span class="text-danger">*</span>
                            </label>
                            <select name="category_id" class="form-control js-select2-custom category-option" required>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" class="btn btn--primary min-w-120"><?php echo e(translate('update')); ?></button>
                            <button type="button" class="btn btn-danger-light min-w-120"
                                    data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/products-management.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/category/view.blade.php ENDPATH**/ ?>