<?php $__env->startSection('title', translate('attribute')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 d-flex gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/attribute.png')); ?>" alt="">
                <?php echo e(translate('attribute_Setup')); ?>

            </h2>
        </div>

        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.attribute.store')); ?>" method="post" class="text-start">
                            <?php echo csrf_field(); ?>

                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link form-system-language-tab cursor-pointer <?php echo e($lang == $defaultLanguage? 'active':''); ?>"
                                           id="<?php echo e($lang); ?>-link">
                                            <?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> form-system-language-form"
                                     id="<?php echo e($lang); ?>-form">
                                    <input type="hidden" id="id">
                                    <label class="title-color" for="name"><?php echo e(translate('attribute_Name')); ?><span
                                            class="text-danger">*</span>
                                        (<?php echo e(strtoupper($lang)); ?>)</label>
                                    <input type="text" name="name[]" class="form-control" id="name"
                                           placeholder="<?php echo e(translate('enter_Attribute_Name')); ?>" <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                </div>
                                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <div class="d-flex flex-wrap gap-2 justify-content-end">
                                <button type="reset" class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="mb-0 d-flex align-items-center gap-2"><?php echo e(translate('attribute_list')); ?>

                                    <span
                                        class="badge badge-soft-dark radius-50 fz-12"><?php echo e($attributes->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="searchValue"
                                               class="form-control"
                                               placeholder="<?php echo e(translate('search_by_Attribute_Name')); ?>"
                                               aria-label="Search orders" value="<?php echo e(request('searchValue')); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="text-start">
                        <div class="table-responsive">
                            <table id="datatable"
                                   class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th class="text-center"><?php echo e(translate('attribute_Name')); ?> </th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($attributes->firstItem()+$key); ?></td>
                                        <td class="text-center"><?php echo e(translate($attribute['name'])); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a class="btn btn-outline-info btn-sm square-btn"
                                                   title="<?php echo e(translate('edit')); ?>"
                                                   href="<?php echo e(route('admin.attribute.update',[$attribute['id']])); ?>">
                                                    <i class="tio-edit"></i>
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm attribute-delete-button square-btn"
                                                   title="<?php echo e(translate('delete')); ?>"
                                                   id="<?php echo e($attribute['id']); ?>">
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

                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <?php echo $attributes->links(); ?>

                        </div>
                    </div>

                    <?php if(count($attributes) == 0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                 alt="<?php echo e(translate('image')); ?>">
                            <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <span id="route-admin-attribute-delete" data-url="<?php echo e(route('admin.attribute.delete')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/products-management.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/attribute/view.blade.php ENDPATH**/ ?>