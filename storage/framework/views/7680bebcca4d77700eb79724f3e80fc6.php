<?php $__env->startSection('title', translate('contact_List')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/message.png')); ?>" alt="">
                <?php echo e(translate('customer_message')); ?>

            </h2>
        </div>
        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center flex-grow-1">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="d-flex gap-2 align-items-center">
                                    <?php echo e(translate('customer_message_table')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12" id="row-count"><?php echo e($contacts->total()); ?>

                                    </span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <div class="d-flex flex-wrap flex-md-nowrap gap-2">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET" class="flex-grow-1">
                                        <div class="input-group input-group-merge input-group-custom">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="datatableSearch_" type="search" name="searchValue" class="form-control"
                                                   placeholder="<?php echo e(translate('search_by_Name_or_Mobile_No_or_Email')); ?>"
                                                   aria-label="Search orders" value="<?php echo e(request('searchValue')); ?>">
                                            <button type="submit"
                                                    class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                        </div>
                                    </form>
                                    <div class="hs-unfold mr-2">
                                        <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle min-height-44 arrow-hidden" href="javascript:;"
                                           data-hs-unfold-options='{
                                        "target": "#menu",
                                        "type": "css-animation"
                                    }'>
                                            <i class="tio-column-view-outlined mr-1"></i> <?php echo e(translate('filter')); ?>

                                        </a>

                                        <div id="menu" class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right px-3 py-4">
                                            <div class="d-flex justify-content-between align-items-center gap-2 mb-3">
                                        <span>
                                            <?php echo e(translate('reply_sent')); ?>

                                        </span>
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher_input status-filter" name="reply_status" value="replied">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center gap-2">
                                        <span>
                                            <?php echo e(translate('reply_not_sent')); ?>

                                        </span>
                                                <label class="switcher">
                                                    <input type="checkbox" class="switcher_input status-filter" name="reply_status" value="not_replied">
                                                    <span class="switcher_control"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="status-wise-view">
                        <?php echo $__env->make('admin-views.contacts._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <span id="get-filter-route" data-action="<?php echo e(route('admin.contact.filter')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/contact.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/contacts/list.blade.php ENDPATH**/ ?>