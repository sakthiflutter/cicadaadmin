<?php
    use Illuminate\Support\Facades\Session;
?>


<?php $__env->startSection('title', $seller?->shop->name ?? translate("shop_name_not_found")); ?>

<?php $__env->startSection('content'); ?>
    <?php ($direction =Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/add-new-seller.png')); ?>" alt="">
                <?php echo e(translate('vendor_details')); ?>

            </h2>
        </div>
        <div class="flex-between d-sm-flex row align-items-center justify-content-between mb-2 mx-1">
            <div>
                <?php if($seller->status=="pending"): ?>
                    <div class="mt-4 pr-2">
                        <div class="flex-start">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><h4><?php echo e(translate('vendor_request_for_open_a_shop')); ?>.</h4></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn--primary btn-sm"><?php echo e(translate('approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(translate('reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="page-header">
            <div class="flex-between mx-1 row">
                <div>
                    <h1 class="page-header-title"><?php echo e($seller?->shop->name ?? translate("shop_Name")." : ".translate("update_Please")); ?></h1>
                </div>
            </div>
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <ul class="nav nav-tabs flex-wrap page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(translate('shop')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'order'])); ?>"><?php echo e(translate('order')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'product'])); ?>"><?php echo e(translate('product')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'setting'])); ?>"><?php echo e(translate('setting')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'transaction'])); ?>"><?php echo e(translate('transaction')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(translate('review')); ?></a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <form action="<?php echo e(route('admin.sellers.update-setting',['id'=>$seller['id']])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize"> <?php echo e(translate('sales_commission').' '.':'); ?> </h5>
                            <label class="switcher" for="commission-status">
                                <input type="checkbox" class="switcher_input toggle-switch-message" value="1" name="commission_status"
                                       id="commission-status"
                                       <?php echo e($seller['sales_commission_percentage'] !=null ? 'checked':''); ?>

                                       data-modal-id="toggle-modal"
                                       data-toggle-id="commission-status"
                                       data-on-image="general-icon.png"
                                       data-off-image="general-icon.png"
                                       data-on-title="<?php echo e(translate('want_to_Turn_ON_Sales_Commission_For_This_Vendor')); ?>"
                                       data-off-title="<?php echo e(translate('want_to_Turn_OFF_Sales_Commission_For_This_Vendor')); ?>"
                                       data-on-message="<p><?php echo e(translate('if_sales_commission_is_enabled_here_the_this_commission_will_be_applied')); ?></p>"
                                       data-off-message="<p><?php echo e(translate('if_sales_commission_is_disabled_here_the_system_default_commission_will_be_applied')); ?></p>">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                        <div class="card-body">
                            <small class="badge badge-soft-info text-wrap mb-3">
                                <?php echo e(translate('if_sales_commission_is_disabled_here_the_system_default_commission_will_be_applied')); ?>.
                            </small>
                            <div class="form-group">
                                <label><?php echo e(translate('commission').'( % )'); ?></label>
                                <input type="number" value="<?php echo e($seller['sales_commission_percentage']); ?>"
                                       class="form-control" name="commission">
                            </div>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form action="<?php echo e(route('admin.sellers.update-setting',['id'=>$seller['id']])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0"> <?php echo e(translate('GST_Number').':'); ?></h5>

                            <label class="switcher" for="gst-status">
                                <input type="checkbox" class="switcher_input toggle-switch-message" value="1" name="gst_status" id="gst-status" <?php echo e($seller['gst'] !=null ? 'checked':''); ?>

                                       data-modal-id="toggle-modal"
                                       data-toggle-id="gst-status"
                                       data-on-image="general-icon.png"
                                       data-off-image="general-icon.png"
                                       data-on-title="<?php echo e(translate('want_to_Turn_ON_GST_Number_For_This_Vendor')); ?>"
                                       data-off-title="<?php echo e(translate('want_to_Turn_OFF_GST_Number_For_This_Vendor')); ?>"
                                       data-on-message="<p><?php echo e(translate('if_GST_number_is_enabled_here_it_will_be_show_in_invoice')); ?></p>"
                                       data-off-message="<p><?php echo e(translate('if_GST_number_is_disabled_here_it_will_not_show_in_invoice')); ?></p>">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                        <div class="card-body">
                            <small class="badge text-wrap badge-soft-info mb-3">
                                <?php echo e(translate('if_GST_number_is_disabled_here_it_will_not_show_in_invoice')); ?>.
                            </small>
                            <div class="form-group">
                                <label> <?php echo e(translate('number')); ?> </label>
                                <input type="text" value="<?php echo e($seller['gst']); ?>"
                                       class="form-control" name="gst">
                            </div>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?> </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(translate('vendor_POS')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.sellers.update-setting',['id'=>$seller['id']])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="seller_pos_update" value="1">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color text-capitalize">
                                        <?php echo e(translate('vendor_POS_permission')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled_this_vendor_can_access_POS_from_the_website_and_vendor_app')); ?>">
                                            <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>
                                    <label class="switcher" for="seller-pos">
                                        <input type="checkbox" class="switcher_input toggle-switch-message" value="1" name="seller_pos"
                                               id="seller-pos" <?php echo e($seller['pos_status'] == 1 ? 'checked':''); ?>

                                               data-modal-id="toggle-modal"
                                               data-toggle-id="seller-pos"
                                               data-on-image="pos-seller-on.png"
                                               data-off-image="pos-seller-off.png"
                                               data-on-title="<?php echo e(translate('want_to_Turn_ON_POS_For_This_Vendor')); ?>"
                                               data-off-title="<?php echo e(translate('want_to_Turn_OFF_POS_For_This_Vendor')); ?>"
                                               data-on-message="<p><?php echo e(translate('if_enabled_this_vendor_can_access_POS_from_the_website_and_vendor_app')); ?></p>"
                                               data-off-message="<p><?php echo e(translate('if_disabled_this_vendor_cannot_access_POS_from_the_website_and_vendor_app')); ?></p>">
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/seller/view/setting.blade.php ENDPATH**/ ?>