<?php $__env->startSection('title',translate($data['data_from']).' '.translate('products')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']); ?>"/>
    <meta property="og:title" content="Products of <?php echo e($web_config['name']); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description"
          content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']); ?>"/>
    <meta property="twitter:title" content="Products of <?php echo e($web_config['name']); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description"
          content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <style>
        .for-count-value {
        <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 0.6875 rem;;
        }

        .for-count-value {

        <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 0.6875 rem;
        }

        .for-brand-hover:hover {
            color: var(--web-primary);
        }

        .for-hover-label:hover {
            color: var(--web-primary)!important;
        }

        .page-item.active .page-link {
            background-color: var(--web-primary) !important;
        }

        .for-sorting {
            padding- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 9px;
        }

        .sidepanel {
        <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;
        }

        .sidepanel .closebtn {
        <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 25 px;
        }

        @media (max-width: 360px) {
            .for-sorting-mobile {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 0% !important;
            }

            .for-mobile {

                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10% !important;
            }

        }

        @media (max-width: 500px) {
            .for-mobile {

                margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 27%;
            }
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php ($decimal_point_settings = getWebConfig(name: 'decimal_point_settings')); ?>

    <div class="container py-3" dir="<?php echo e(Session::get('direction')); ?>">
        <div class="search-page-header">
            <div>
                <h5 class="font-semibold mb-1"><?php echo e(translate(str_replace('_',' ',$data['data_from']))); ?> <?php echo e(translate('products')); ?> <?php echo e(isset($data['brand_name']) ? '('.$data['brand_name'].')' : ''); ?></h5>
                <div><span class="view-page-item-count"><?php echo e($products->total()); ?></span> <?php echo e(translate('items_found')); ?></div>
            </div>
            <form id="search-form" class="d-none d-lg-block" action="<?php echo e(route('products')); ?>" method="GET">
                <input hidden name="data_from" value="<?php echo e($data['data_from']); ?>">
                <div class="sorting-item">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                        <path d="M11.6667 7.80078L14.1667 5.30078L16.6667 7.80078" stroke="#D9D9D9" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M7.91675 4.46875H4.58341C4.3533 4.46875 4.16675 4.6553 4.16675 4.88542V8.21875C4.16675 8.44887 4.3533 8.63542 4.58341 8.63542H7.91675C8.14687 8.63542 8.33341 8.44887 8.33341 8.21875V4.88542C8.33341 4.6553 8.14687 4.46875 7.91675 4.46875Z"
                            stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M7.91675 11.9688H4.58341C4.3533 11.9688 4.16675 12.1553 4.16675 12.3854V15.7188C4.16675 15.9489 4.3533 16.1354 4.58341 16.1354H7.91675C8.14687 16.1354 8.33341 15.9489 8.33341 15.7188V12.3854C8.33341 12.1553 8.14687 11.9688 7.91675 11.9688Z"
                            stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.1667 5.30078V15.3008" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                    <label class="for-sorting" for="sorting">
                        <span><?php echo e(translate('sort_by')); ?></span>
                    </label>
                    <select class="product-list-filter-on-viewpage">
                        <option value="latest" <?php echo e(request('sort_by') == 'latest' ? 'selected':''); ?>><?php echo e(translate('latest')); ?></option>
                        <option
                            value="low-high" <?php echo e(request('sort_by') == 'low-high' ? 'selected':''); ?>><?php echo e(translate('low_to_High_Price')); ?> </option>
                        <option
                            value="high-low" <?php echo e(request('sort_by') == 'high-low' ? 'selected':''); ?>><?php echo e(translate('High_to_Low_Price')); ?></option>
                        <option
                            value="a-z" <?php echo e(request('sort_by') == 'a-z' ? 'selected':''); ?>><?php echo e(translate('A_to_Z_Order')); ?></option>
                        <option
                            value="z-a" <?php echo e(request('sort_by') == 'z-a' ? 'selected':''); ?>><?php echo e(translate('Z_to_A_Order')); ?></option>
                    </select>
                </div>
            </form>
            <div class="d-lg-none">
                <div class="filter-show-btn btn btn--primary py-1 px-2 m-0">
                    <i class="tio-filter"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="container pb-5 mb-2 mb-md-4 rtl __inline-35" dir="<?php echo e(Session::get('direction')); ?>">
        <div class="row">
            <aside
                class="col-lg-3 hidden-xs col-md-3 col-sm-4 SearchParameters __search-sidebar <?php echo e(Session::get('direction') === "rtl" ? 'pl-2' : 'pr-2'); ?>"
                id="SearchParameters">
                <div class="cz-sidebar __inline-35" id="shop-sidebar">
                    <div class="cz-sidebar-header bg-light">
                        <button class="close ms-auto"
                                type="button" data-dismiss="sidebar" aria-label="Close">
                            <i class="tio-clear"></i>
                        </button>
                    </div>
                    <div class="pb-0">
                        <div class="text-center">
                            <div class="__cate-side-title border-bottom">
                                <span class="widget-title font-semibold"><?php echo e(translate('filter')); ?> </span>
                            </div>
                            <div class="__p-25-10 w-100 pt-4">
                                <label class="w-100 opacity-75 text-nowrap for-sorting d-block mb-0 ps-0" for="sorting">
                                    <select class="form-control custom-select" id="searchByFilterValue">
                                        <option selected disabled><?php echo e(translate('choose')); ?></option>
                                        <option
                                            value="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'best-selling','page'=>1])); ?>" <?php echo e(isset($data['data_from'])!=null?$data['data_from']=='best-selling'?'selected':'':''); ?>><?php echo e(translate('best_selling_product')); ?></option>
                                        <option
                                            value="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'top-rated','page'=>1])); ?>" <?php echo e(isset($data['data_from'])!=null?$data['data_from']=='top-rated'?'selected':'':''); ?>><?php echo e(translate('top_rated')); ?></option>
                                        <option
                                            value="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'most-favorite','page'=>1])); ?>" <?php echo e(isset($data['data_from'])!=null?$data['data_from']=='most-favorite'?'selected':'':''); ?>><?php echo e(translate('most_favorite')); ?></option>
                                        <option
                                            value="<?php echo e(route('products',['id'=> $data['id'],'data_from'=>'featured_deal','page'=>1])); ?>" <?php echo e(isset($data['data_from'])!=null?$data['data_from']=='featured_deal'?'selected':'':''); ?>><?php echo e(translate('featured_deal')); ?></option>
                                    </select>
                                </label>
                            </div>

                            <div class="__p-25-10 w-100 pt-0 d-lg-none">
                                <form id="search-form" action="<?php echo e(route('products')); ?>" method="GET">
                                    <input hidden name="data_from" value="<?php echo e($data['data_from']); ?>">
                                    <select class="form-control product-list-filter-on-viewpage">
                                        <option value="latest"><?php echo e(translate('latest')); ?></option>
                                        <option
                                            value="low-high"><?php echo e(translate('low_to_High_Price')); ?> </option>
                                        <option
                                            value="high-low"><?php echo e(translate('High_to_Low_Price')); ?></option>
                                        <option
                                            value="a-z"><?php echo e(translate('A_to_Z_Order')); ?></option>
                                        <option
                                            value="z-a"><?php echo e(translate('Z_to_A_Order')); ?></option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="text-center">
                            <div class="__cate-side-title pt-0">
                                <span class="widget-title font-semibold"><?php echo e(translate('price')); ?> </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center __cate-side-price">
                                <div class="__w-35p">
                                    <input
                                        class="bg-white cz-filter-search form-control form-control-sm appended-form-control"
                                        type="number" value="0" min="0" max="1000000" id="min_price"
                                        placeholder="<?php echo e(translate('min')); ?>">

                                </div>
                                <div class="__w-10p">
                                    <p class="m-0"><?php echo e(translate('to')); ?></p>
                                </div>
                                <div class="__w-35p">
                                    <input value="100" min="100" max="1000000"
                                           class="bg-white cz-filter-search form-control form-control-sm appended-form-control"
                                           type="number" id="max_price" placeholder="<?php echo e(translate('max')); ?>">

                                </div>

                                <div class="d-flex justify-content-center align-items-center __number-filter-btn">

                                    <a class="action-search-products-by-price">
                                        <i class="__inline-37 czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($web_config['brand_setting']): ?>
                        <div>
                            <div class="text-center">
                                <div class="__cate-side-title">
                                    <span class="widget-title font-semibold"><?php echo e(translate('brands')); ?></span>
                                </div>
                                <div class="__cate-side-price pb-3">
                                    <div class="input-group-overlay input-group-sm">
                                        <input placeholder="<?php echo e(translate('search_by_brands')); ?>"
                                            class="__inline-38 cz-filter-search form-control form-control-sm appended-form-control"
                                            type="text" id="search-brand">
                                        <div class="input-group-append-overlay">
                                        <span class="input-group-text">
                                            <i class="czi-search"></i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <ul id="lista1" class="__brands-cate-wrap" data-simplebar
                                    data-simplebar-auto-hide="false">
                                    <?php $__currentLoopData = \App\Utils\BrandManager::get_active_brands(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="brand mt-2 for-brand-hover <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : ''); ?>"
                                            id="brand">
                                            <li class="flex-between __inline-39 get-view-by-onclick"
                                                data-link="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>">
                                                <div class="text-start">
                                                    <?php echo e($brand['name']); ?>

                                                </div>
                                                <div class="__brands-cate-badge">
                                                    <span>
                                                        <?php echo e($brand['brand_products_count']); ?>

                                                    </span>
                                                </div>
                                            </li>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="mt-3 __cate-side-arrordion">
                        <div>
                            <div class="text-center __cate-side-title">
                                <span class="widget-title font-semibold"><?php echo e(translate('categories')); ?></span>
                            </div>
                            <?php ($categories=\App\Utils\CategoryManager::parents()); ?>
                            <div class="accordion mt-n1 __cate-side-price" id="shop-categories">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="menu--caret-accordion">
                                        <div class="card-header flex-between">
                                            <div>
                                                <label class="for-hover-label cursor-pointer get-view-by-onclick"
                                                       data-link="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>">
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
                                        <div
                                            class="card-body p-0 ms-2 d--none"
                                            id="collapse-<?php echo e($category['id']); ?>">
                                            <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="menu--caret-accordion">
                                                    <div class="for-hover-label card-header flex-between">
                                                        <div>
                                                            <label class="cursor-pointer get-view-by-onclick"
                                                                   data-link="<?php echo e(route('products',['id'=> $child['id'],'data_from'=>'category','page'=>1])); ?>">
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
                                                    <div
                                                        class="card-body p-0 ms-2 d--none"
                                                        id="collapse-<?php echo e($child['id']); ?>">
                                                        <?php $__currentLoopData = $child->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="card-header">
                                                                <label
                                                                    class="for-hover-label d-block cursor-pointer text-left get-view-by-onclick"
                                                                    data-link="<?php echo e(route('products',['id'=> $ch['id'],'data_from'=>'category','page'=>1])); ?>">
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
                    </div>
                </div>

            </aside>

            <section class="col-lg-9">
                <div class="row" id="ajax-products">
                    <?php echo $__env->make('web-views.products._ajax-products',['products'=>$products,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </section>
        </div>
    </div>

    <span id="products-search-data-backup"
        data-url="<?php echo e(url('/products')); ?>"
        data-id="<?php echo e($data['id']); ?>"
        data-name="<?php echo e($data['name']); ?>"
        data-from="<?php echo e($data['data_from']); ?>"
        data-sort="<?php echo e($data['sort_by']); ?>"
        data-min-price="<?php echo e($data['min_price']); ?>"
        data-max-price="<?php echo e($data['max_price']); ?>"
        data-message="<?php echo e(translate('items_found')); ?>"
    ></span>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/product-view.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/products/view.blade.php ENDPATH**/ ?>