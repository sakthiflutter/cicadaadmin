<?php $__env->startSection('title', translate('deal_Of_The_Day')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/deal_of_the_day.png')); ?>" alt="">
                <?php echo e(translate('deal_of_the_day')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.deal.day')); ?>"
                              class="text-start onsubmit-disable-action-button"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php ($language = getWebConfig(name:'pnc_language')); ?>
                            <?php ($defaultLanguage = 'en'); ?>
                            <?php ($defaultLanguage = $language[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link lang-link <?php echo e($lang == $defaultLanguage? 'active':''); ?>"
                                           href="javascript:"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="form-group">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> lang-form"
                                         id="<?php echo e($lang); ?>-form">
                                        <div class="col-md-12">
                                            <label for="name"><?php echo e(translate('title')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="title[]" class="form-control" id="title"
                                                   placeholder="<?php echo e(translate('ex').' '.':'.' '.translate('LUX')); ?>"
                                                <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                        </div>
                                    </div>
                                    <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <label for="name" class="title-color"><?php echo e(translate('products')); ?></label>
                                        <input type="text" class="product_id" name="product_id" hidden>
                                        <div class="dropdown select-product-search w-100">
                                            <button class="form-control text-start dropdown-toggle text-capitalize select-product-button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo e(translate('select_product')); ?>

                                            </button>
                                            <div class="dropdown-menu w-100 px-2">
                                                <div class="search-form mb-3">
                                                    <button type="button" class="btn"><i class="tio-search"></i>
                                                    </button>
                                                    <input type="text"
                                                           class="js-form-search form-control search-bar-input search-product"
                                                           placeholder="<?php echo e(translate('search menu').'...'); ?>">
                                                </div>
                                                <div
                                                    class="d-flex flex-column gap-3 max-h-40vh overflow-y-auto overflow-x-hidden search-result-box">
                                                    <?php echo $__env->make('admin-views.partials._search-product',['products'=>$products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary px-5 reset-button"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary px-5"><?php echo e(translate('submit')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="d-flex align-items-center gap-2">
                                    <?php echo e(translate('deal_of_the_day')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($deals->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="searchValue"
                                               class="form-control"
                                               placeholder="<?php echo e(translate('search_by_Title')); ?>" aria-label="Search orders"
                                               value="<?php echo e(request('searchValue')); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-start">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('title')); ?></th>
                                <th><?php echo e(translate('product_info')); ?></th>
                                <th><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($deals->firstItem()+ $k); ?></th>
                                    <td>
                                        <a href="javascript:" target="_blank"
                                           class="font-weight-semibold title-color hover-c1"><?php echo e($deal['title']); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e(isset($deal->product) ? $deal->product->name : translate("not_selected" )); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.deal.day-status-update')); ?>" method="post"
                                              id="deal-of-the-day<?php echo e($deal['id']); ?>-form" data-from="deal">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($deal['id']); ?>">
                                            <label class="switcher">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       id="deal-of-the-day<?php echo e($deal['id']); ?>" name="status" value="1"
                                                       <?php echo e($deal['status'] == 1 ? 'checked':''); ?>

                                                       data-modal-id = "toggle-status-modal"
                                                       data-toggle-id = "deal-of-the-day<?php echo e($deal['id']); ?>"
                                                       data-on-image = "deal-of-the-day-status-on.png"
                                                       data-off-image = "deal-of-the-day-status-off.png"
                                                       data-on-title = "<?php echo e(translate('want_to_Turn_ON_Deal_of_the_Day_Status').'?'); ?>"
                                                       data-off-title = "<?php echo e(translate('want_to_Turn_OFF_Deal_of_the_Day_Status').'?'); ?>"
                                                       data-on-message = "<p><?php echo e(translate('if_enabled_this_deal_of_the_day_will_be_available_on_the_website_and_customer_app')); ?></p>"
                                                       data-off-message = "<p><?php echo e(translate('if_disabled_this_deal_of_the_day_will_be_hidden_from_the_website_and_customer_app')); ?></p>">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-10">
                                            <a title="<?php echo e(trans ('edit')); ?>"
                                               href="<?php echo e(route('admin.deal.day-update',[$deal['id']])); ?>"
                                               class="btn btn-outline--primary btn-sm edit">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a title="<?php echo e(trans ('delete')); ?>"
                                               class="btn btn-outline-danger btn-sm delete-data-without-form"
                                               data-action="<?php echo e(route('admin.deal.day-delete')); ?>"
                                               data-id="<?php echo e($deal['id']); ?>">
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
                        <div class="px-4 d-flex justify-content-lg-end">
                            <?php echo e($deals->links()); ?>

                        </div>
                    </div>
                    <?php if(count($deals)==0): ?>
                        <div class="text-center p-4">
                            <img class="mb-3 w-160"
                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                 alt="<?php echo e(translate('image_description')); ?>">
                            <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/search-product.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/deal.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/deal/day-index.blade.php ENDPATH**/ ?>