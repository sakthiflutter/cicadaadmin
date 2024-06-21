<?php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Session
?>

<?php $__env->startSection('title', translate('feature_Deal')); ?>

<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/featured_deal.png')); ?>" alt="">
                <?php echo e(translate('feature_deal')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.deal.flash')); ?>"
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
                                           id="<?php echo e($lang); ?>-link"><?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <div class="form-group">
                                <div class="row">
                                    <input type="text" name="deal_type" value="feature_deal" class="d-none">
                                    <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-12 <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> lang-form"
                                             id="<?php echo e($lang); ?>-form">
                                            <label for="name"
                                                   class="title-color text-capitalize"><?php echo e(translate('title')); ?>

                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="title[]" class="form-control" id="title"
                                                   placeholder="<?php echo e(translate('ex').':'.translate('LUX')); ?>" <?php echo e($lang == $defaultLanguage? 'required':''); ?>>
                                        </div>
                                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label for="name"
                                               class="title-color text-capitalize"><?php echo e(translate('start_date')); ?></label>
                                        <input type="date" name="start_date" id="start-date-time" required class="form-control">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="name"
                                               class="title-color text-capitalize"><?php echo e(translate('end_date')); ?></label>
                                        <input type="date" name="end_date" id="end-date-time" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-3">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
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
                                <h5 class="mb-0 text-capitalize align-items-center d-flex gap-2">
                                    <?php echo e(translate('feature_deal_table')); ?>

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
                                               placeholder="<?php echo e(translate('search_by_title')); ?>" aria-label="Search orders"
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
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('title')); ?></th>
                                <th><?php echo e(translate('start_Date')); ?></th>
                                <th><?php echo e(translate('end_Date')); ?></th>
                                <th><?php echo e(translate('active')); ?> / <?php echo e(translate('expired')); ?></th>
                                <th class="text-center"><?php echo e(translate('status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $flashDeals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($key+1); ?></th>
                                    <td><?php echo e($deal['title']); ?></td>
                                    <td><?php echo e(date('d-M-y',strtotime($deal['start_date']))); ?></td>
                                    <td><?php echo e(date('d-M-y',strtotime($deal['end_date']))); ?></td>
                                    <td>
                                        <?php if(Carbon::parse($deal['end_date'])->endOfDay()->isPast()): ?>
                                            <span class="badge badge-soft-danger"> <?php echo e(translate('expired')); ?> </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-success"> <?php echo e(translate('active')); ?> </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('admin.deal.feature-status')); ?>" method="post"
                                              id="feature-status<?php echo e($deal['id']); ?>-form" data-from="deal">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($deal['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       id="feature-status<?php echo e($deal['id']); ?>" name="status" value="1"
                                                       <?php echo e($deal['status'] == 1 ? 'checked':''); ?>

                                                       data-modal-id = "toggle-status-modal"
                                                       data-toggle-id = "feature-status<?php echo e($deal['id']); ?>"
                                                       data-on-image = "feature-status-on.png"
                                                       data-off-image = "feature-status-off.png"
                                                       data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Featured_Deal_Status').'?'); ?>"
                                                       data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Featured_Deal_Status').'?'); ?>"
                                                       data-on-message = "<p><?php echo e(translate('if_enabled_this_featured_deal_will_be_available_on_the_website_and_customer_app')); ?></p>"
                                                       data-off-message = "<p><?php echo e(translate('if_disabled_this_featured_deal_will_be_hidden_from_the_website_and_customer_app')); ?></p>">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center gap-10">
                                            <a class="h-30 d-flex gap-2 align-items-center btn btn-soft-info btn-sm border-info"
                                               href="<?php echo e(route('admin.deal.add-product',[$deal['id']])); ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9"
                                                     viewBox="0 0 9 9" fill="none" class="svg replaced-svg">
                                                    <path
                                                        d="M9 3.9375H5.0625V0H3.9375V3.9375H0V5.0625H3.9375V9H5.0625V5.0625H9V3.9375Z"
                                                        fill="#00A3AD"></path>
                                                </svg>
                                                <?php echo e(translate('add_product')); ?>

                                            </a>
                                            <a title="<?php echo e(trans ('edit')); ?>"
                                               href="<?php echo e(route('admin.deal.edit',[$deal['id']])); ?>"
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/deal/feature-index.blade.php ENDPATH**/ ?>