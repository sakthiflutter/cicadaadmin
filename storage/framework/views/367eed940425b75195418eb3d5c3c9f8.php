<?php $__env->startSection('title',translate('shop_Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <?php if($shop['id'] != 0): ?>
        <meta property="og:image" content="<?php echo e(dynamicStorage(path: 'storage/app/public/shop')); ?>/<?php echo e($shop->image); ?>"/>
        <meta property="og:title" content="<?php echo e($shop->name); ?> "/>
        <meta property="og:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="og:title" content="<?php echo e($shop['name']); ?> "/>
        <meta property="og:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php endif; ?>

    <?php if($shop['id'] != 0): ?>
        <meta property="twitter:card" content="<?php echo e(dynamicStorage(path: 'storage/app/public/shop')); ?>/<?php echo e($shop->image); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('shopView',[$shop['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php else: ?>
        <meta property="twitter:card" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('shopView',[$shop['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php endif; ?>

    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php ($decimalPointSettings = getWebConfig(name: 'decimal_point_settings')); ?>

    <div class="container py-4 __inline-67">
        <div class="rtl">
            <div class="bg-white __shop-banner-main">
                <?php if($shop['id'] != 0): ?>
                    <img class="__shop-page-banner" alt=""
                         src="<?php echo e(getValidImage(path: 'storage/app/public/shop/banner/'.$shop->banner, type: 'wide-banner')); ?>">
                <?php else: ?>
                    <?php ($banner=getWebConfig(name: 'shop_banner')); ?>
                    <img class="__shop-page-banner" alt=""
                         src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.($banner ?? 'banner'), type: 'wide-banner')); ?>">
                <?php endif; ?>
                <?php echo $__env->make('web-views.seller-view.shop-info-card', ['displayClass' => 'd-none d-md-block max-width-500px'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>

        <?php echo $__env->make('web-views.seller-view.shop-info-card', ['displayClass' => 'd-md-none border mt-3'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="d-flex flex-wrap gap-3 justify-content-sm-between py-4 web-direction">
            <div class="d-flex flex-wrap justify-content-between align-items-center w-max-md-100 me-auto gap-3">
                <h3 class="widget-title align-self-center font-bold fs-16 my-0"><?php echo e(translate('categories')); ?></h3>
                <div class="filter-ico-button btn btn--primary p-2 m-0 d-lg-none d-flex align-items-center">
                    <i class="tio-filter"></i>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row gap-3">
                <form>
                    <div class="sorting-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M11.6667 7.80078L14.1667 5.30078L16.6667 7.80078" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.91675 4.46875H4.58341C4.3533 4.46875 4.16675 4.6553 4.16675 4.88542V8.21875C4.16675 8.44887 4.3533 8.63542 4.58341 8.63542H7.91675C8.14687 8.63542 8.33341 8.44887 8.33341 8.21875V4.88542C8.33341 4.6553 8.14687 4.46875 7.91675 4.46875Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.91675 11.9688H4.58341C4.3533 11.9688 4.16675 12.1553 4.16675 12.3854V15.7188C4.16675 15.9489 4.3533 16.1354 4.58341 16.1354H7.91675C8.14687 16.1354 8.33341 15.9489 8.33341 15.7188V12.3854C8.33341 12.1553 8.14687 11.9688 7.91675 11.9688Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.1667 5.30078V15.3008" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <label class="for-sorting" for="sorting">
                            <span class="text-nowrap"><?php echo e(translate('sort_by')); ?></span>
                        </label>
                        <select class="action-sort-shop-products-by-data">
                            <option value="latest"><?php echo e(translate('latest')); ?></option>
                            <option
                                value="low-high"><?php echo e(translate('low_to_High_Price')); ?> </option>
                            <option
                                value="high-low"><?php echo e(translate('high_to_Low_Price')); ?></option>
                            <option
                                value="a-z"><?php echo e(translate('A_to_Z_Order')); ?></option>
                            <option
                                value="z-a"><?php echo e(translate('Z_to_A_Order')); ?></option>
                        </select>
                    </div>
                </form>

                <form method="get" action="<?php echo e(route('shopView',['id'=>$seller_id])); ?>">
                    <div class="search_form input-group search-form-input-group">
                        <input type="hidden" name="category_id" value="<?php echo e(request('category_id')); ?>" >
                        <input type="hidden" name="sub_category_id" value="<?php echo e(request('sub_category_id')); ?>" >
                        <input type="hidden" name="sub_sub_category_id" value="<?php echo e(request('sub_sub_category_id')); ?>" >
                        <input type="search" class="form-control rounded-left text-align-direction" name="product_name" value="<?php echo e(request('product_name')); ?>" placeholder="<?php echo e(translate('search_products_from_this_store')); ?>">
                        <button type="submit" class="btn--primary btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row rtl">
            <div class="col-lg-3 mr-0 pe-4">
                <aside class="SearchParameters" id="SearchParameters">

                    <div class="__shop-page-sidebar">
                        <div class="cz-sidebar-header">
                            <button class="shop-page-sidebar-close close ms-auto" type="button" data-dismiss="sidebar" aria-label="Close">
                                <i class="tio-clear"></i>
                            </button>
                        </div>
                        <div class="accordion __cate-side-arrordion">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="menu--caret-accordion">

                                    <div class="card-header flex-between">
                                        <div>
                                            <label class="for-hover-label cursor-pointer get-view-by-onclick"
                                                   data-link="<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$category['id']])); ?>">
                                                <?php echo e($category['name']); ?>

                                            </label>
                                        </div>
                                        <div class="px-2 cursor-pointer menu--caret">
                                            <strong class="pull-right for-brand-hover">
                                                <?php if($category->childes->count()>0): ?>
                                                    <i class="tio-next-ui fs-13"></i>
                                                <?php endif; ?>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="card-body p-0 ms-2 d--none"
                                         id="collapse-<?php echo e($category['id']); ?>">
                                        <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="menu--caret-accordion">
                                                <div class="for-hover-label card-header flex-between">
                                                    <div>
                                                        <label class="cursor-pointer get-view-by-onclick" data-link="<?php echo e(route('shopView',['id'=> $seller_id,'sub_category_id'=>$child['id']])); ?>">
                                                            <?php echo e($child['name']); ?>

                                                        </label>
                                                    </div>
                                                    <div class="px-2 cursor-pointer menu--caret">
                                                        <strong class="pull-right">
                                                            <?php if($child->childes->count()>0): ?>
                                                                <i class="tio-next-ui fs-13"></i>
                                                            <?php endif; ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 ms-2 d--none"
                                                     id="collapse-<?php echo e($child['id']); ?>">
                                                    <?php $__currentLoopData = $child->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="card-header">
                                                            <label class="for-hover-label d-block cursor-pointer text-left get-view-by-onclick"
                                                                   data-link="<?php echo e(route('shopView',['id'=> $seller_id,'sub_sub_category_id'=>$ch['id']])); ?>">
                                                                <?php echo e($ch['name']); ?>

                                                            </label>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-9 product-div">
                <?php if(count($products) > 0): ?>
                    <div class="row g-3" id="ajax-products">
                        <?php echo $__env->make('web-views.products._ajax-products',['products'=>$products,'decimal_point_settings' => $decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php else: ?>
                    <div class="d-flex justify-content-center align-items-center w-100 py-5 my-2">
                        <div>
                            <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/media/product.svg')); ?>" class="img-fluid" alt="">
                            <h6 class="text-muted text-capitalize"><?php echo e(translate('no_product_found')); ?></h6>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <span id="shop-sort-by-filter-url" data-url="<?php echo e(url('/')); ?>/shopView/<?php echo e($shop['id']); ?>"></span>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-faded-info">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(translate('Send_Message_to_vendor')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('messages_store')); ?>" method="post" id="shop-view-chat-form">
                        <?php echo csrf_field(); ?>
                        <input value="<?php echo e($shop['id']); ?>" name="shop_id" hidden>
                        <?php if($shop['id'] != 0): ?>
                            <input value="<?php echo e($shop->seller_id); ?>}" name="seller_id" hidden>
                        <?php endif; ?>

                        <textarea name="message" class="form-control min-height-100px max-height-200px" required placeholder="<?php echo e(translate('Write_here')); ?>..."></textarea>
                        <br>

                        <div class="justify-content-end gap-2 d-flex flex-wrap">
                            <a href="<?php echo e(route('chat', ['type' => 'seller'])); ?>" class="btn btn-soft-primary bg--secondary border">
                                <?php echo e(translate('go_to_chatbox')); ?>

                            </a>
                            <button class="btn btn--primary text-white">
                                <?php echo e(translate('send')); ?>

                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <span id="store-request-data-product-name" data-value="<?php echo e(request('product_name')); ?>"></span>
    <span id="store-request-data-category-id" data-value="<?php echo e(request('category_id')); ?>"></span>
    <span id="store-request-data-sub-category-id" data-value="<?php echo e(request('sub_category_id')); ?>"></span>
    <span id="store-request-data-sub-sub-category-id" data-value="<?php echo e(request('sub_sub_category_id')); ?>"></span>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/seller-view/shopview.blade.php ENDPATH**/ ?>