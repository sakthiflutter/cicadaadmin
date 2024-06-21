<?php $__env->startSection('title', translate('flash_Deal_Products')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Deals of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Deals of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description"
          content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
    <style>
        .countdown-background {
            background: var(--web-primary);
        }

        .cz-countdown-days {
            border: .5px solid var(--web-primary);
        }

        .cz-countdown-hours {
            border: .5px solid var(--web-primary);
        }

        .cz-countdown-minutes {
            border: .5px solid var(--web-primary);
        }

        .cz-countdown-seconds {
            border: .5px solid var(--web-primary);
        }

        .flash_deal_product_details .flash-product-price {
            color: var(--web-primary);
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php ($decimal_point_settings = getWebConfig(name: 'decimal_point_settings')); ?>
    <div class="__inline-59 pt-md-3">
        <?php if(file_exists('storage/app/public/deal/'.$deal['banner'])): ?>
            <?php ($deal_banner = dynamicStorage(path: 'storage/app/public/deal/'.$deal['banner'])); ?>
        <?php else: ?>
            <?php ($deal_banner = theme_asset(path: 'public/assets/front-end/img/flash-deals.png')); ?>
        <?php endif; ?>
        <div class="container md-4 mt-3 rtl text-align-direction">
            <div class="__flash-deals-bg rounded" style="background: url(<?php echo e($deal_banner); ?>) no-repeat center center / cover">
                <div class="row g-3 justify-content-end align-items-center">
                    <?php ($flash_deals=\App\Models\FlashDeal::with(['products.product.reviews'])->where(['status'=>1])->where(['deal_type'=>'flash_deal'])->whereDate('start_date','<=',date('Y-m-d'))->whereDate('end_date','>=',date('Y-m-d'))->first()); ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="countdown-card bg-transparent">
                            <div class="text-center text-white">
                                <div class="countdown-background">
                                 <span class="cz-countdown d-flex justify-content-center align-items-center"
                                       data-countdown="<?php echo e($web_config['flash_deals']?date('m/d/Y',strtotime($web_config['flash_deals']['end_date'])):''); ?> 23:59:00">
                                     <span class="cz-countdown-days">
                                         <span class="cz-countdown-value"></span>
                                         <span class="cz-countdown-text"><?php echo e(translate('days')); ?></span>
                                     </span>
                                     <span class="cz-countdown-value p-1">:</span>
                                     <span class="cz-countdown-hours">
                                         <span class="cz-countdown-value"></span>
                                         <span class="cz-countdown-text"><?php echo e(translate('hrs')); ?></span>
                                     </span>
                                     <span class="cz-countdown-value p-1">:</span>
                                     <span class="cz-countdown-minutes">
                                         <span class="cz-countdown-value"></span>
                                         <span class="cz-countdown-text"><?php echo e(translate('min')); ?></span>
                                     </span>
                                     <span class="cz-countdown-value p-1">:</span>
                                     <span class="cz-countdown-seconds">
                                         <span class="cz-countdown-value"></span>
                                         <span class="cz-countdown-text"><?php echo e(translate('sec')); ?></span>
                                     </span>
                                 </span>

                                    <?php
                                        $startDate = \Carbon\Carbon::parse($web_config['flash_deals']['start_date']);
                                        $endDate = \Carbon\Carbon::parse($web_config['flash_deals']['end_date']);
                                        $now = \Carbon\Carbon::now();
                                        $totalDuration = $endDate->diffInSeconds($startDate);
                                        $elapsedDuration = $now->diffInSeconds($startDate);
                                        $flashDealsPercentage = ($elapsedDuration / $totalDuration) * 100;
                                    ?>

                                    <div class="progress __progress">
                                        <div class="progress-bar flash-deal-progress-bar" role="progressbar"
                                             style="width: <?php echo e(number_format($flashDealsPercentage, 2)); ?>%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl text-align-direction">
            <div class="row">
                <div class="col-lg-4 col-md-6 my-2 text-center <?php echo e(Session::get('direction') === "rtl" ? 'text-sm-right' : 'text-sm-left'); ?>">
                    <div class="flash_deal_title">
                        <?php echo e($web_config['flash_deals']->title); ?>

                    </div>
                    <span class="fs-14 font-weight-normal"><?php echo e(translate('hurry_Up')); ?> ! <?php echo e(translate('the_offer_is_limited')); ?>. <?php echo e(translate('grab_while_it_lasts')); ?></span>
                </div>

                <section class="col-lg-12">
                    <div class="row g-3 mt-2">
                        <?php if($discountPrice): ?>
                            <?php $__currentLoopData = $deal->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($dp->product)): ?>
                                    <div class="col--xl-2 col-sm-4 col-lg-3 col-6">
                                        <?php echo $__env->make('web-views.partials._inline-single-product',['product'=>$dp->product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/deals.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/deals.blade.php ENDPATH**/ ?>