<section class="overflow-hidden">
    <div class="container px-0 px-md-3">
        <div class="flash-deals-wrapper">
            <div class="flash-deal-view-all-web row d-flex justify-content-end mb-3">
                <?php if(count($web_config['flash_deals']->products)>0): ?>
                    <a class="text-capitalize view-all-text web-text-primary"
                    href="<?php echo e(route('flash-deals',[$web_config['flash_deals']?$web_config['flash_deals']['id']:0])); ?>">
                        <?php echo e(translate('view_all')); ?>

                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                    </a>
                <?php endif; ?>
            </div>

            <?php
                $startDate = \Carbon\Carbon::parse($web_config['flash_deals']['start_date']);
                $endDate = \Carbon\Carbon::parse($web_config['flash_deals']['end_date']);
                $now = \Carbon\Carbon::now();
                $totalDuration = $endDate->diffInSeconds($startDate);
                $elapsedDuration = $now->diffInSeconds($startDate);
                $flashDealsPercentage = ($elapsedDuration / $totalDuration) * 100;
            ?>

            <div class="row g-3 mx-max-md-0">
                <div class="col-lg-4 px-max-md-0">
                    <div class="countdown-card bg-transparent">
                        <div class="flash-deal-text web-text-primary">
                            <div>
                                <span><?php echo e($web_config['flash_deals']->title); ?></span>
                            </div>
                            <small><?php echo e(translate('hurry_Up')); ?> ! <?php echo e(translate('the_offer_is_limited')); ?>. <?php echo e(translate('grab_while_it_lasts')); ?></small>
                        </div>
                        <div class="text-center text-white">
                            <div class="countdown-background">
                                <span class="cz-countdown d-flex justify-content-center align-items-center flash-deal-countdown"
                                    data-countdown="<?php echo e($web_config['flash_deals']?date('m/d/Y',strtotime($web_config['flash_deals']['end_date'])):''); ?> 23:59:00 ">
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
                                <div class="progress __progress">
                                <div class="progress-bar flash-deal-progress-bar" role="progressbar" style="width: <?php echo e(number_format($flashDealsPercentage, 2)); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php ($nullFilter = 0); ?>
                <?php $__currentLoopData = $web_config['flash_deals']->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($deal->product): ?>
                        <?php ($nullFilter = $nullFilter+1); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($nullFilter<=10): ?>
                    <div class="col-lg-8 d-none d-md-block px-max-md-0">
                        <div class="owl-theme owl-carousel flash-deal-slider">
                            <?php $__currentLoopData = $web_config['flash_deals']->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($deal->product): ?>
                                    <?php echo $__env->make('web-views.partials._feature-product',['product'=>$deal->product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php ($index = 0); ?>
                    <?php $__currentLoopData = $web_config['flash_deals']->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($index<10 && $deal->product): ?>
                            <?php ($index = $index+1); ?>
                            <div class="col-lg-2 col-6 col-sm-4 col-md-3 d-none d-md-block px-max-md-0">
                                <?php echo $__env->make('web-views.partials._feature-product',['product'=>$deal->product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <div class="col-12 pb-0 d-md-none px-max-md-0">
                    <div class="owl-theme owl-carousel flash-deal-slider-mobile">
                        <?php $__currentLoopData = $web_config['flash_deals']->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if( $key<10 && $deal->product): ?>
                                <?php echo $__env->make('web-views.partials._product-card-1',['product'=>$deal->product,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if(count($web_config['flash_deals']->products)>0): ?>
                    <div class="col-12 d-md-none text-center px-max-md-0">
                        <a class="text-capitalize view-all-text web-text-primary"
                            href="<?php echo e(route('flash-deals',[$web_config['flash_deals']?$web_config['flash_deals']['id']:0])); ?>">
                            <?php echo e(translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 float-left' : 'right ml-1 mr-n1'); ?>"></i>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_flash-deal.blade.php ENDPATH**/ ?>