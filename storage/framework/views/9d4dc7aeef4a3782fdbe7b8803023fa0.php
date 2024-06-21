<?php $__env->startSection('title', $web_config['name']->value.' '.translate('online_Shopping').' | '.$web_config['name']->value.' '.translate('ecommerce')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(theme_asset(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(theme_asset(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Welcome To <?php echo e($web_config['name']->value); ?> Home"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/home.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/owl.theme.default.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="__inline-61">
        <?php ($decimalPointSettings = !empty(getWebConfig(name: 'decimal_point_settings')) ? getWebConfig(name: 'decimal_point_settings') : 0); ?>
        <section class="bg-transparent py-3">
            <div class="container position-relative">
                <?php echo $__env->make('web-views.partials._home-top-slider',['main_banner'=>$main_banner], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </section>

        <?php if($web_config['flash_deals'] && count($web_config['flash_deals']->products) >0 ): ?>
            <?php echo $__env->make('web-views.partials._flash-deal', ['decimal_point_settings'=>$decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if($featured_products->count() > 0 ): ?>
            <div class="container py-4 rtl px-0 px-md-3">
                <div class="__inline-62 pt-3">
                    <div class="feature-product-title mt-0 web-text-primary">
                        <?php echo e(translate('featured_products')); ?>

                    </div>
                    <div class="text-end px-3 d-none d-md-block">
                        <a class="text-capitalize view-all-text web-text-primary" href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                            <?php echo e(translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === 'rtl' ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'); ?>"></i>
                        </a>
                    </div>
                    <div class="feature-product">
                        <div class="carousel-wrap p-1">
                            <div class="owl-carousel owl-theme" id="featured_products_list">
                                <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div>
                                        <?php echo $__env->make('web-views.partials._feature-product',['product'=>$product, 'decimal_point_settings'=>$decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="text-center pt-2 d-md-none">
                            <a class="text-capitalize view-all-text web-text-primary" href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>">
                                <?php echo e(translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'); ?>"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php echo $__env->make('web-views.partials._category-section-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($web_config['featured_deals'] && (count($web_config['featured_deals'])>0)): ?>
            <section class="featured_deal">
                <div class="container">
                    <div class="__featured-deal-wrap bg--light">
                        <div class="d-flex flex-wrap justify-content-between gap-8 mb-3">
                            <div class="w-0 flex-grow-1">
                                <span class="featured_deal_title font-bold text-dark"><?php echo e(translate('featured_deal')); ?></span>
                                <br>
                                <span class="text-left text-nowrap"><?php echo e(translate('see_the_latest_deals_and_exciting_new_offers')); ?>!</span>
                            </div>
                            <div>
                                <a class="text-capitalize view-all-text web-text-primary" href="<?php echo e(route('products',['data_from'=>'featured_deal'])); ?>">
                                    <?php echo e(translate('view_all')); ?>

                                    <i class="czi-arrow-<?php echo e(Session::get('direction') === 'rtl' ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'); ?>"></i>
                                </a>
                            </div>
                        </div>
                        <div class="owl-carousel owl-theme new-arrivals-product">
                            <?php $__currentLoopData = $web_config['featured_deals']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('web-views.partials._product-card-1',['product'=>$product, 'decimal_point_settings'=>$decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if(isset($main_section_banner)): ?>
            <div class="container rtl pt-4 px-0 px-md-3">
                <a href="<?php echo e($main_section_banner->url); ?>" target="_blank"
                    class="cursor-pointer d-block">
                    <img class="d-block footer_banner_img __inline-63" alt=""
                         src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$main_section_banner['photo'], type: 'wide-banner')); ?>">
                </a>
            </div>
        <?php endif; ?>

        <?php ($businessMode = getWebConfig(name: 'business_mode')); ?>
        <?php if($businessMode == 'multi' && count($top_sellers) > 0): ?>
            <?php echo $__env->make('web-views.partials._top-sellers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php echo $__env->make('web-views.partials._deal-of-the-day', ['decimal_point_settings'=>$decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($footer_banner->count() > 0 ): ?>
            <?php $__currentLoopData = $footer_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key == 0): ?>
                <div class="container rtl d-sm-none">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <a href="<?php echo e($banner->url); ?>" class="d-block" target="_blank">
                                <img class="footer_banner_img __inline-63" alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$banner['photo'], type: 'banner')); ?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <section class="new-arrival-section">

            <div class="container rtl mt-4">
                <?php if($latest_products->count() >0 ): ?>
                    <div class="section-header">
                        <div class="arrival-title d-block">
                            <div class="text-capitalize">
                                <?php echo e(translate('new_arrivals')); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="container rtl mb-3 overflow-hidden">
                <div class="py-2">
                    <div class="new_arrival_product">
                        <div class="carousel-wrap">
                            <div class="owl-carousel owl-theme new-arrivals-product">
                                <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('web-views.partials._product-card-2',['product'=>$product,'decimal_point_settings'=>$decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container rtl px-0 px-md-3">
                <div class="row g-3 mx-max-md-0">

                    <?php if($bestSellProduct->count() >0): ?>
                        <?php echo $__env->make('web-views.partials._best-selling', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <?php if($topRated->count() >0): ?>
                        <?php echo $__env->make('web-views.partials._top-rated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php if($footer_banner->count() > 0 ): ?>
            <?php $__currentLoopData = $footer_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key == 1): ?>
                <div class="container rtl pt-4 d-sm-none">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <a href="<?php echo e($banner->url); ?>" class="d-block" target="_blank">
                                <img class="footer_banner_img __inline-63"  alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$banner['photo'], type: 'banner')); ?>">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php if(count($footer_banner) > 0): ?>
            <div class="container rtl d-md-block d-none">
                <div class="row g-3 mt-3">

                    <?php if(count($footer_banner) <= 2): ?>
                        <?php $__currentLoopData = $footer_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerIndex => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6">
                                <a href="<?php echo e($banner->url); ?>" class="d-block" target="_blank">
                                    <img class="footer_banner_img __inline-63"  alt=""
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$banner['photo'], type: 'banner')); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php
                            $footerBannerGroup = $footer_banner->take(count($footer_banner) / 2);
                            $footerBannerGroup2 = $footer_banner->splice(count($footer_banner) / 2);
                        ?>
                        <div class="col-md-6">
                            <div class="<?php echo e(count($footerBannerGroup) > 1 ? 'owl-carousel owl-theme footer-banner-slider':''); ?>">
                                <?php $__currentLoopData = $footerBannerGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($banner['url']); ?>" class="d-block" target="_blank">
                                        <img class="footer_banner_img __inline-63"  alt=""
                                             src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$banner['photo'], type: 'banner')); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="<?php echo e(count($footerBannerGroup2) > 1 ? 'owl-carousel owl-theme footer-banner-slider':''); ?>">
                                <?php $__currentLoopData = $footerBannerGroup2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e($banner['url']); ?>" class="d-block" target="_blank">
                                        <img class="footer_banner_img __inline-63"  alt=""
                                             src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$banner['photo'], type: 'banner')); ?>">
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if($web_config['brand_setting'] && $brands->count() > 0): ?>
            <section class="container rtl pt-4">

                <div class="section-header">
                    <div class="text-black font-bold __text-22px">
                        <span> <?php echo e(translate('brands')); ?></span>
                    </div>
                    <div class="__mr-2px">
                        <a class="text-capitalize view-all-text web-text-primary" href="<?php echo e(route('brands')); ?>">
                            <?php echo e(translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === 'rtl' ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                        </a>
                    </div>
                </div>

                <div class="mt-sm-3 mb-3 brand-slider">
                    <div class="owl-carousel owl-theme p-2 brands-slider">
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center">
                                <a href="<?php echo e(route('products',['id'=> $brand['id'],'data_from'=>'brand','page'=>1])); ?>"
                                   class="__brand-item">
                                    <img alt="<?php echo e($brand->name); ?>"
                                        src="<?php echo e(getValidImage(path: "storage/app/public/brand/$brand->image", type: 'brand')); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if($home_categories->count() > 0): ?>
            <?php $__currentLoopData = $home_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('web-views.partials._category-wise-product', ['decimal_point_settings'=>$decimalPointSettings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <?php ($companyReliability = getWebConfig(name: 'company_reliability')); ?>
        <?php if($companyReliability != null): ?>
            <?php echo $__env->make('web-views.partials._company-reliability', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>

    <span id="direction-from-session" data-value="<?php echo e(session()->get('direction')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/home.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/home.blade.php ENDPATH**/ ?>