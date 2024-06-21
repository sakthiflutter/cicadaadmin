<?php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Session
?>


<?php $__env->startSection('title', translate('flash_Deal')); ?>

<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/flash_deal.png')); ?>" alt="">
                <?php echo e(translate('flash_deals')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.deal.flash')); ?>" method="post"
                              class="text-start onsubmit-disable-action-button"
                              enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <?php ($language = getWebConfig(name:'pnc_language')); ?>
                            <?php ($defaultLanguage = 'en'); ?>
                            <?php ($defaultLanguage = $language[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize font-weight-medium">
                                        <a class="nav-link lang-link <?php echo e($lang == $defaultLanguage ? 'active':''); ?>"
                                           href="javascript:"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="<?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> lang-form"
                                             id="<?php echo e($lang); ?>-form">
                                            <input type="text" name="deal_type" value="flash_deal" class="d-none">
                                            <div class="form-group">
                                                <label for="name"
                                                       class="title-color font-weight-medium text-capitalize"><?php echo e(translate('title')); ?>

                                                    (<?php echo e(strtoupper($lang)); ?>)</label>
                                                <input type="text" name="title[]" class="form-control" id="title"
                                                       placeholder="<?php echo e(translate('ex').':'.translate('LUX')); ?>"
                                                    <?php echo e($lang == $defaultLanguage ? 'required':''); ?>>
                                            </div>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                        <label for="name"
                                               class="title-color font-weight-medium text-capitalize"><?php echo e(translate('start_date')); ?></label>
                                        <input type="date" name="start_date"  id="start-date-time" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name"
                                               class="title-color font-weight-medium text-capitalize"><?php echo e(translate('end_date')); ?></label>
                                        <input type="date" name="end_date" id="end-date-time" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <img class="border radius-10 ratio-4:1 max-w-655px w-100" id="viewer"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/placeholder.png')); ?>"
                                                 alt="<?php echo e(translate('banner_image')); ?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name"
                                               class="title-color font-weight-medium text-capitalize"><?php echo e(translate('upload_image')); ?></label>
                                        <span class="text-info ml-1">( <?php echo e(translate('ratio').' '.'5:1'); ?> )</span>
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" id="custom-file-upload"
                                                   class="custom-file-input image-input" data-image-id="viewer"
                                                   accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label text-capitalize"
                                                   for="custom-file-upload"><?php echo e(translate('choose_file')); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary px-4"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('submit')); ?></button>
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
                                <h5 class="mb-0 text-capitalize d-flex gap-2">
                                    <?php echo e(translate('flash_deal_table')); ?>

                                    <span
                                        class="badge badge-soft-dark radius-50 fz-12"><?php echo e($flashDeals->total()); ?></span>
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
                        <table id="datatable"
                               style="text-align: <?php echo e($direction === "rtl" ? 'right' : 'left'); ?>;"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('title')); ?></th>
                                <th><?php echo e(translate('duration')); ?></th>
                                <th><?php echo e(translate('status')); ?></th>
                                <th  class="text-center"><?php echo e(translate('active_products')); ?></th>
                                <th  class="text-center"><?php echo e(translate('publish')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $flashDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($flashDeals->firstItem()+ $key); ?></td>
                                    <td><span class="font-weight-semibold"><?php echo e($deal['title']); ?></span></td>
                                    <td><?php echo e(date('d-M-y',strtotime($deal['start_date'])).'-'.' '); ?>

                                        <?php echo e(date('d-M-y',strtotime($deal['end_date']))); ?></td>
                                    <td>
                                        <?php if(Carbon::parse($deal['end_date'])->endOfDay()->isPast()): ?>
                                            <span class="badge badge-soft-danger"><?php echo e(translate('expired')); ?> </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-success"> <?php echo e(translate('active')); ?> </span>
                                        <?php endif; ?>
                                    </td>
                                    <td  class="text-center"><?php echo e($deal->products_count); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.deal.status-update')); ?>" method="post"
                                              id="flash-deal-status<?php echo e($deal['id']); ?>-form" data-from="deal">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($deal['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       id="flash-deal-status<?php echo e($deal['id']); ?>" name="status"
                                                       value="1"
                                                       <?php echo e($deal['status'] == 1?'checked':''); ?>

                                                       data-modal-id = "toggle-status-modal"
                                                       data-toggle-id = "flash-deal-status<?php echo e($deal['id']); ?>"
                                                       data-on-image = "flash-deal-status-on.png"
                                                       data-off-image = "flash-deal-status-off.png"
                                                       data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Flash_Deal_Status').'?'); ?>"
                                                       data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Flash_Deal_Status').'?'); ?>"
                                                       data-on-message = "<p><?php echo e(translate('if_enabled_this_flash_sale_will_be_available_on_the_website_and_customer_app')); ?></p>"
                                                       data-off-message = "<p><?php echo e(translate('if_disabled_this_flash_sale_will_be_hidden_from_the_user_website_and_customer_app')); ?></p>">`)">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-10">
                                            <a class="h-30 d-flex gap-2 text-capitalize align-items-center btn btn-soft-info btn-sm border-info"
                                               href="<?php echo e(route('admin.deal.add-product',[$deal['id']])); ?>">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/plus.svg')); ?>" class="svg"
                                                     alt="">
                                                <?php echo e(translate('add_product')); ?>

                                            </a>
                                            <a title="<?php echo e(translate('edit')); ?>"
                                               href="<?php echo e(route('admin.deal.update',[$deal['id']])); ?>"
                                               class="btn btn-outline--primary btn-sm edit">
                                                <i class="tio-edit"></i>
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
                            <?php echo e($flashDeals->links()); ?>

                        </div>
                    </div>

                    <?php if(count($flashDeals)==0): ?>
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
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/deal.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/deal/flash-index.blade.php ENDPATH**/ ?>