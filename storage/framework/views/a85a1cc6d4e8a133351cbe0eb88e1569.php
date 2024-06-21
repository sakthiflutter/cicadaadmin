<?php $__env->startSection('title', translate('All_vendor_Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Brands of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
    <meta property="twitter:card" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Brands of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container mb-md-4 <?php echo e(Session::get('direction') === "rtl" ? 'rtl' : ''); ?> __inline-65">
        <div class="bg-primary-light rounded-10 my-4 p-3 p-sm-4" data-bg-img="<?php echo e(theme_asset(path: 'public/assets/front-end/img/media/bg.png')); ?>">
            <div class="row g-2 align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column gap-1 text-primary">
                        <h4 class="mb-0 text-start fw-bold text-primary text-uppercase"><?php echo e(translate('all_Stores')); ?></h4>
                        <p class="fs-14 fw-semibold mb-0"><?php echo e(translate('Find_your_desired_stores_and_shop_your_favourite_products')); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <form action="<?php echo e(route('vendors')); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-10" value="<?php echo e(request('shop_name')); ?>"  placeholder="<?php echo e(translate('Search_Store')); ?>" name="shop_name">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded-10" type="submit"><?php echo e(translate('search')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="col-lg-12">
                <?php if(count($sellers) > 0): ?>
                    <div class="row mx-n2 __min-h-200px">
                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ($current_date = date('Y-m-d')); ?>
                            <?php ($start_date = date('Y-m-d', strtotime($seller['vacation_start_date']))); ?>
                            <?php ($end_date = date('Y-m-d', strtotime($seller['vacation_end_date']))); ?>

                            <div class="col-lg-3 col-md-6 col-sm-12 px-2 pb-4 text-center">
                                <a href="<?php echo e(route('shopView',['id'=>$seller['id']])); ?>" class="others-store-card text-capitalize">
                                    <div class="overflow-hidden other-store-banner">
                                        <?php if($seller['id'] != 0): ?>
                                            <img class="w-100 h-100 object-cover" alt="" src="<?php echo e(getValidImage(path: 'storage/app/public/shop/banner/'.$seller['banner'], type: 'shop-banner')); ?>">
                                        <?php else: ?>
                                            <img class="w-100 h-100 object-cover" alt="" src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$seller['banner'], type: 'shop-banner')); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="name-area">
                                        <div class="position-relative">
                                            <div class="overflow-hidden other-store-logo rounded-full">
                                                <?php if($seller['id'] != 0): ?>
                                                    <img class="rounded-full" alt="<?php echo e(translate('store')); ?>"
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$seller['image'], type: 'shop')); ?>">
                                                <?php else: ?>
                                                <img class="rounded-full" alt="<?php echo e(translate('store')); ?>"
                                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'.$seller['image'], type: 'shop')); ?>">
                                                <?php endif; ?>
                                            </div>

                                            <?php if($seller['temporary_close'] || ($seller['vacation_status'] && ($current_date >= $seller['vacation_start_date']) && ($current_date <= $seller['vacation_end_date']))): ?>
                                                <span class="temporary-closed position-absolute text-center rounded-full p-2">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="info pt-2">
                                            <h5 class="text-start"><?php echo e($seller['name']); ?></h5>
                                            <div class="d-flex align-items-center">
                                                <h6 class="web-text-primary"><?php echo e(number_format($seller['average_rating'],1)); ?></h6>
                                                <i class="tio-star text-star mx-1"></i>
                                                <small><?php echo e(translate('rating')); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="info-area">
                                        <div class="info-item">
                                            <h6 class="web-text-primary"><?php echo e($seller['review_count'] < 1000 ? $seller['review_count'] : number_format($seller['review_count']/1000 , 1).'K'); ?></h6>
                                            <span><?php echo e(translate('reviews')); ?></span>
                                        </div>
                                        <div class="info-item">
                                            <h6 class="web-text-primary"><?php echo e($seller['products_count'] < 1000 ? $seller['products_count'] : number_format($seller['products_count']/1000 , 1).'K'); ?></h6>
                                            <span><?php echo e(translate('products')); ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="row mx-n2">
                        <div class="col-md-12">
                            <div class="text-center">
                                <?php echo e($sellers->links()); ?>

                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="mb-5 text-center text-muted">
                        <div class="d-flex justify-content-center my-2">
                            <img alt="" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/media/seller.svg')); ?>">
                        </div>
                        <h4 class="text-muted"><?php echo e(translate('vendor_not_available')); ?></h4>
                        <p><?php echo e(translate('Sorry_no_data_found_related_to_your_search')); ?></p>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/seller-view/sellers.blade.php ENDPATH**/ ?>