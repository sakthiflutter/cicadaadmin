<?php $__env->startSection('title', translate('review_List')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/product-review.png')); ?>" class="mb-1 mr-1"
                     alt="">
                <?php echo e(translate('product_reviews')); ?>

            </h2>
        </div>
        <div class="card card-body">
            <div class="row border-bottom pb-3 align-items-center mb-20">
                <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                    <h5 class="text-capitalize mb-0 d-flex gap-1">
                        <?php echo e(translate('review_table')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($reviews->total()); ?></span>
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
                            <input id="datatableSearch_" type="search" name="searchValue" class="form-control"
                                   placeholder="<?php echo e(translate('search_by_Product_or_Customer')); ?>"
                                   aria-label="Search orders" value="<?php echo e($searchValue); ?>" required>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <form action="<?php echo e(url()->current()); ?>" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="name" class="title-color"><?php echo e(translate('products')); ?></label>
                            <div class="dropdown select-product-search w-100">
                                <input type="text" class="product_id" name="product_id" value="<?php echo e(request('product_id')); ?>"
                                       hidden>
                                <button class="form-control text-start dropdown-toggle selected-product-name text-truncate select-product-button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(request('product_id') !=null ? $product['name']: translate('select_Product')); ?>

                                </button>
                                <div class="dropdown-menu w-100 px-2">
                                    <div class="search-form mb-3">
                                        <button type="button" class="btn"><i class="tio-search"></i></button>
                                        <input type="text" class="js-form-search form-control search-bar-input search-product" placeholder="<?php echo e(translate('search menu').'...'); ?>">
                                    </div>
                                    <div class="d-flex flex-column gap-3 max-h-40vh overflow-y-auto overflow-x-hidden search-result-box">
                                        <?php echo $__env->make('admin-views.partials._search-product',['products'=>$products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label class="title-color" for="customer"><?php echo e(translate('customer')); ?></label>
                            <input type="hidden" id='customer_id' name="customer_id"
                                   value="<?php echo e(request('customer_id') ? request('customer_id') : 'all'); ?>">
                            <select data-placeholder="
                                        <?php if($customer == 'all'): ?>
                                            <?php echo e(translate('all_customer')); ?>

                                        <?php else: ?>
                                            <?php echo e($customer['name'] ?? $customer['f_name'].' '.$customer['l_name'].' '.'('.$customer['phone'].')'); ?>

                                        <?php endif; ?>"
                                    class="get-customer-list-by-ajax-request form-control form-ellipsis set-customer-value">
                                <option value="all"><?php echo e(translate('all_customer')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="status" class="title-color d-flex"><?php echo e(translate('choose')); ?>

                                <?php echo e(translate('status')); ?></label>
                            <select class="form-control" name="status">
                                <option value="" selected> <?php echo e('---'.translate('select_status').'---'); ?> </option>
                                <option value="1" <?php echo e(isset($status) && $status == 1 ? 'selected' : ''); ?>>
                                    <?php echo e(translate('active')); ?></option>
                                <option value="0" <?php echo e(isset($status) && $status == 0 ? 'selected' : ''); ?>>
                                    <?php echo e(translate('inactive')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="from" class="title-color d-flex"><?php echo e(translate('from')); ?></label>
                            <input type="date" name="from" id="start-date-time" value="<?php echo e($from); ?>"
                                   class="form-control"
                                   title="<?php echo e(translate('from_date')); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-2">
                            <label for="to" class="title-color d-flex"><?php echo e(translate('to')); ?></label>
                            <input type="date" name="to" id="end-date-time" value="<?php echo e($to); ?>"
                                   class="form-control"
                                   title="<?php echo e(ucfirst(translate('to_date'))); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-end h-100">
                            <div class="mb-2 form-group w-100">
                                <button id="filter" type="submit" class="btn btn--primary btn-block filter">
                                    <i class="tio-filter-list nav-icon"></i><?php echo e(translate('filter')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex align-items-end h-100">
                            <div class="mb-2 form-group w-100">
                                <button type="button" class="btn btn-outline--primary w-100" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a type="submit" class="dropdown-item"
                                           href="<?php echo e(route('vendor.reviews.export', ['product_id' => $product_id, 'customer_id' => $customer_id, 'status' => $status, 'from' => $from, 'to' => $to])); ?>">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card mt-20">
            <div class="table-responsive datatable-custom">
                <table
                        class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table text-start">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('product')); ?></th>
                        <th><?php echo e(translate('customer')); ?></th>
                        <th><?php echo e(translate('rating')); ?></th>
                        <th><?php echo e(translate('review')); ?></th>
                        <th><?php echo e(translate('date')); ?></th>
                        <th class="text-center"><?php echo e(translate('status')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($review->product): ?>
                            <tr>
                                <td>
                                    <?php echo e($reviews->firstItem()+$key); ?>

                                </td>
                                <td>
                                    <a class="title-color hover-c1"
                                       href="<?php echo e(route('vendor.products.view', [$review['product_id']])); ?>">
                                        <?php echo e(Str::limit($review->product['name'], 25)); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if($review->customer): ?>
                                        <?php echo e($review->customer->f_name . ' ' . $review->customer->l_name); ?>

                                    <?php else: ?>
                                        <label class="badge badge-soft-danger"><?php echo e(translate('customer_removed')); ?></label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <label class="badge badge-soft-info mb-0">
                                            <span class="fz-12 d-flex align-items-center gap-1"><?php echo e($review->rating); ?> <i
                                                        class="tio-star"></i>
                                            </span>
                                    </label>
                                </td>
                                <td>
                                    <div class="gap-1">
                                        <div><?php echo e($review->comment ? Str::limit($review->comment, 35) : translate('no_comment_found')); ?></div>
                                        <br>
                                        <?php if($review->attachment): ?>
                                            <div class="d-flex flex-wrap">
                                                <?php $__currentLoopData = json_decode($review->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(getValidImage(path:'storage/app/public/review/'.$img,type: 'backend-basic')); ?>"
                                                       data-lightbox="mygallery">
                                                        <img width="60" height="60"
                                                             class="mx-1"
                                                             src="<?php echo e(getValidImage(path:'storage/app/public/review/'.$img,type: 'backend-basic')); ?>"
                                                             alt="<?php echo e(translate('image')); ?>">
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td><?php echo e(date('d M Y', strtotime($review->created_at))); ?></td>
                                <td>
                                    <form action="<?php echo e(route('vendor.reviews.update-status', [$review['id'], $review->status ? 0 : 1])); ?>"
                                          method="get" id="reviews-status<?php echo e($review['id']); ?>-form"
                                          class="reviews_status_form">
                                        <label class="switcher mx-auto">
                                            <input type="checkbox" class="switcher_input toggle-switch-message"
                                                   id="reviews-status<?php echo e($review['id']); ?>"
                                                   <?php echo e($review->status ? 'checked' : ''); ?>

                                                   data-modal-id = "toggle-status-modal"
                                                   data-toggle-id = "reviews-status<?php echo e($review['id']); ?>"
                                                   data-on-image = "customer-reviews-on.png"
                                                   data-off-image = "customer-reviews-off.png"
                                                   data-on-title = "<?php echo e(translate('Want_to_Turn_ON_Customer_Reviews').'?'); ?>"
                                                   data-off-title = "<?php echo e(translate('Want_to_Turn_OFF_Customer_Reviews').'?'); ?>"
                                                   data-on-message = "<p><?php echo e(translate('if_enabled_anyone_can_see_this_review_on_the_user_website_and_customer_app')); ?></p>"
                                                   data-off-message = "<p><?php echo e(translate('if_disabled_this_review_will_be_hidden_from_the_user_website_and_customer_app')); ?></p>">`)">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <?php echo $reviews->links(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/search-product.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/reviews/index.blade.php ENDPATH**/ ?>