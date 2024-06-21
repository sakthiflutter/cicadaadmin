<?php $__env->startSection('title', translate('product_List')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">

        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                <?php if($type == 'in_house'): ?>
                    <?php echo e(translate('in_House_Product_List')); ?>

                <?php elseif($type == 'seller'): ?>
                    <?php echo e(translate('vendor_Product_List')); ?>

                <?php endif; ?>
                <span class="badge badge-soft-dark radius-50 fz-14 ml-1"><?php echo e($products->total()); ?></span>
            </h2>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(url()->current()); ?>" method="GET">
                    <input type="hidden" value="<?php echo e(request('status')); ?>" name="status">
                    <div class="row gx-2">
                        <div class="col-12">
                            <h4 class="mb-3"><?php echo e(translate('filter_Products')); ?></h4>
                        </div>
                        <?php if(request('type') == 'seller'): ?>
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label class="title-color" for="store"><?php echo e(translate('store')); ?></label>
                                    <select name="seller_id" class="form-control text-capitalize">
                                        <option value="" selected><?php echo e(translate('all_store')); ?></option>
                                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($seller->id); ?>"<?php echo e(request('seller_id')==$seller->id ? 'selected' :''); ?>>
                                                <?php echo e($seller->shop->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label class="title-color" for="store"><?php echo e(translate('brand')); ?></label>
                                <select name="brand_id" class="js-select2-custom form-control text-capitalize">
                                    <option value="" selected><?php echo e(translate('all_brand')); ?></option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>" <?php echo e(request('brand_id')==$brand->id ? 'selected' :''); ?>><?php echo e($brand->default_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="name" class="title-color"><?php echo e(translate('category')); ?></label>
                                <select class="js-select2-custom form-control action-get-request-onchange" name="category_id"
                                        data-url-prefix="<?php echo e(url('/admin/products/get-categories?parent_id=')); ?>"
                                        data-element-id="sub-category-select"
                                        data-element-type="select">
                                    <option value="<?php echo e(old('category_id')); ?>" selected
                                            disabled><?php echo e(translate('select_category')); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category['id']); ?>"
                                                <?php echo e(request('category_id') == $category['id'] ? 'selected' : ''); ?>>
                                            <?php echo e($category['defaultName']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="name" class="title-color"><?php echo e(translate('sub_Category')); ?></label>
                                <select class="js-select2-custom form-control action-get-request-onchange" name="sub_category_id"
                                        id="sub-category-select"
                                        data-url-prefix="<?php echo e(url('/admin/products/get-categories?parent_id=')); ?>"
                                        data-element-id="sub-sub-category-select"
                                        data-element-type="select">
                                    <option value="<?php echo e(request('sub_category_id') != null ? request('sub_category_id') : null); ?>"
                                            selected <?php echo e(request('sub_category_id') != null ? '' : 'disabled'); ?>><?php echo e(request('sub_category_id') != null ? $subCategory['defaultName']: translate('select_Sub_Category')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="name" class="title-color"><?php echo e(translate('sub_Sub_Category')); ?></label>
                                <select class="js-select2-custom form-control" name="sub_sub_category_id"
                                        id="sub-sub-category-select">
                                    <option value="<?php echo e(request('sub_sub_category_id') != null ? request('sub_sub_category_id') : null); ?>"
                                            selected <?php echo e(request('sub_sub_category_id') != null ? '' : 'disabled'); ?>><?php echo e(request('sub_sub_category_id') != null ? $subSubCategory['defaultName'] : translate('select_Sub_Sub_Category')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex gap-3 justify-content-end">
                                <a href="<?php echo e(route('admin.products.list',['type'=>request('type')])); ?>"
                                   class="btn btn-secondary px-5">
                                    <?php echo e(translate('reset')); ?>

                                </a>
                                <button type="submit" class="btn btn--primary px-5 action-get-element-type">
                                    <?php echo e(translate('show_data')); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <div class="row align-items-center">
                            <div class="col-lg-4">

                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="searchValue"
                                               class="form-control"
                                               placeholder="<?php echo e(translate('search_Product_Name')); ?>"
                                               aria-label="Search orders"
                                               value="<?php echo e(request('searchValue')); ?>">
                                        <input type="hidden" value="<?php echo e(request('status')); ?>" name="status">
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8 mt-3 mt-lg-0 d-flex flex-wrap gap-3 justify-content-lg-end">

                                <div>
                                    <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                        <i class="tio-download-to"></i>
                                        <?php echo e(translate('export')); ?>

                                        <i class="tio-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item"
                                               href="<?php echo e(route('admin.products.export-excel',['type'=>request('type')])); ?>?brand_id=<?php echo e(request('brand_id')); ?>&searchValue=<?php echo e(request('searchValue')); ?>&category_id=<?php echo e(request('category_id')); ?>&sub_category_id=<?php echo e(request('sub_category_id')); ?>&sub_sub_category_id=<?php echo e(request('sub_sub_category_id')); ?>&seller_id=<?php echo e(request('seller_id')); ?>&status=<?php echo e(request('status')); ?>">
                                                <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>"
                                                     alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php if($type == 'in_house'): ?>
                                    <a href="<?php echo e(route('admin.products.stock-limit-list',['in_house'])); ?>"
                                       class="btn btn-info">
                                        <span class="text"><?php echo e(translate('limited_Stocks')); ?></span>
                                    </a>
                                    <a href="<?php echo e(route('admin.products.add')); ?>" class="btn btn--primary">
                                        <i class="tio-add"></i>
                                        <span class="text"><?php echo e(translate('add_new_product')); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-start">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('product Name')); ?></th>
                                <th class="text-center"><?php echo e(translate('product Type')); ?></th>
                                <th class="text-center"><?php echo e(translate('unit_price')); ?></th>
                                <th class="text-center"><?php echo e(translate('show_as_featured')); ?></th>
                                <th class="text-center"><?php echo e(translate('active_status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($products->firstItem()+$key); ?></th>
                                    <td>
                                        <a href="<?php echo e(route('admin.products.view',['addedBy'=>$product['added_by'],'id'=>$product['id']])); ?>"
                                           class="media align-items-center gap-2">
                                            <img src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'backend-product')); ?>"
                                                 class="avatar border" alt="">
                                            <span class="media-body title-color hover-c1">
                                            <?php echo e(Str::limit($product['name'], 20)); ?>

                                        </span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <?php echo e(translate(str_replace('_',' ',$product['product_type']))); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product['unit_price']), currencyCode: getCurrencyCode())); ?>

                                    </td>
                                    <td class="text-center">

                                        <?php ($productName = str_replace("'",'`',$product['name'])); ?>
                                        <form action="<?php echo e(route('admin.products.featured-status')); ?>" method="post"
                                              id="product-featured<?php echo e($product['id']); ?>-form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($product['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       name="status"
                                                       id="product-featured<?php echo e($product['id']); ?>" value="1"
                                                       <?php echo e($product['featured'] == 1 ? 'checked' : ''); ?>

                                                       data-modal-id="toggle-status-modal"
                                                       data-toggle-id="product-featured<?php echo e($product['id']); ?>"
                                                       data-on-image="product-status-on.png"
                                                       data-off-image="product-status-off.png"
                                                       data-on-title="<?php echo e(translate('Want_to_Add').' '.$productName.' '.translate('to_the_featured_section')); ?>"
                                                       data-off-title="<?php echo e(translate('Want_to_Remove').' '.$productName.' '.translate('to_the_featured_section')); ?>"
                                                       data-on-message="<p><?php echo e(translate('if_enabled_this_product_will_be_shown_in_the_featured_product_on_the_website_and_customer_app')); ?></p>"
                                                       data-off-message="<p><?php echo e(translate('if_disabled_this_product_will_be_removed_from_the_featured_product_section_of_the_website_and_customer_app')); ?></p>">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>

                                    </td>
                                    <td class="text-center">
                                        <form action="<?php echo e(route('admin.products.status-update')); ?>" method="post" data-from="product-status"
                                              id="product-status<?php echo e($product['id']); ?>-form" class="admin-product-status-form">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($product['id']); ?>">
                                            <label class="switcher mx-auto">
                                                <input type="checkbox" class="switcher_input toggle-switch-message"
                                                       name="status"
                                                       id="product-status<?php echo e($product['id']); ?>" value="1"
                                                       <?php echo e($product['status'] == 1 ? 'checked' : ''); ?>

                                                       data-modal-id="toggle-status-modal"
                                                       data-toggle-id="product-status<?php echo e($product['id']); ?>"
                                                       data-on-image="product-status-on.png"
                                                       data-off-image="product-status-off.png"
                                                       data-on-title="<?php echo e(translate('Want_to_Turn_ON').' '.$productName.' '.translate('status')); ?>"
                                                       data-off-title="<?php echo e(translate('Want_to_Turn_OFF').' '.$productName.' '.translate('status')); ?>"
                                                       data-on-message="<p><?php echo e(translate('if_enabled_this_product_will_be_available_on_the_website_and_customer_app')); ?></p>"
                                                       data-off-message="<p><?php echo e(translate('if_disabled_this_product_will_be_hidden_from_the_website_and_customer_app')); ?></p>">
                                                <span class="switcher_control"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline-info btn-sm square-btn"
                                               title="<?php echo e(translate('barcode')); ?>"
                                               href="<?php echo e(route('admin.products.barcode', [$product['id']])); ?>">
                                                <i class="tio-barcode"></i>
                                            </a>
                                            <a class="btn btn-outline-info btn-sm square-btn" title="View"
                                               href="<?php echo e(route('admin.products.view',['addedBy'=>$product['added_by'],'id'=>$product['id']])); ?>">
                                                <i class="tio-invisible"></i>
                                            </a>
                                            <a class="btn btn-outline--primary btn-sm square-btn"
                                               title="<?php echo e(translate('edit')); ?>"
                                               href="<?php echo e(route('admin.products.update',[$product['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <span class="btn btn-outline-danger btn-sm square-btn delete-data"
                                               title="<?php echo e(translate('delete')); ?>"
                                               data-id="product-<?php echo e($product['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </span>
                                        </div>
                                        <form action="<?php echo e(route('admin.products.delete',[$product['id']])); ?>"
                                              method="post" id="product-<?php echo e($product['id']); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>

                    <?php if(count($products)==0): ?>
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

    <span id="message-select-word" data-text="<?php echo e(translate('select')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/product/list.blade.php ENDPATH**/ ?>