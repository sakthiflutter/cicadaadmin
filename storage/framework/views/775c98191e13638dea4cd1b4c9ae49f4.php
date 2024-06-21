<div class="col-sm-6 col-lg-3">
    <div class="business-analytics">
        <h5 class="business-analytics__subtitle"><?php echo e(translate('total_Sale')); ?></h5>
        <h2 class="business-analytics__title"><?php echo e($data['total_sale']); ?></h2>
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/total-sale.png')); ?>" class="business-analytics__img" alt="">
    </div>
</div>
<div class="col-sm-6 col-lg-3">
    <div class="business-analytics">
        <h5 class="business-analytics__subtitle"><?php echo e(translate('total_Stores')); ?></h5>
        <h2 class="business-analytics__title"><?php echo e($data['store']); ?></h2>
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/total-stores.png')); ?>" class="business-analytics__img" alt="">
    </div>
</div>
<div class="col-sm-6 col-lg-3">
    <div class="business-analytics">
        <h5 class="business-analytics__subtitle"><?php echo e(translate('total_Products')); ?></h5>
        <h2 class="business-analytics__title"><?php echo e($data['product']); ?></h2>
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/total-product.png')); ?>" class="business-analytics__img" alt="">
    </div>
</div>
<div class="col-sm-6 col-lg-3">
    <div class="business-analytics">
        <h5 class="business-analytics__subtitle"><?php echo e(translate('total_Customers')); ?></h5>
        <h2 class="business-analytics__title"><?php echo e($data['customer']); ?></h2>
        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/total-customer.png')); ?>" class="business-analytics__img" alt="">
    </div>
</div>


<div class="col-sm-6 col-lg-3">
    <a class="order-stats order-stats_pending" href="<?php echo e(route('admin.orders.list',['pending'])); ?>">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: '/public/assets/back-end/img/pending.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('pending')); ?></h6>
        </div>
        <span class="order-stats__title">
            <?php echo e($data['pending']); ?>

        </span>
    </a>
</div>

<div class="col-sm-6 col-lg-3">
    <a class="order-stats order-stats_confirmed" href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/confirmed.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('confirmed')); ?></h6>
        </div>
        <span class="order-stats__title">
            <?php echo e($data['confirmed']); ?>

        </span>
    </a>
</div>

<div class="col-sm-6 col-lg-3">
    <a class="order-stats order-stats_packaging" href="<?php echo e(route('admin.orders.list',['processing'])); ?>">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/packaging.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('packaging')); ?></h6>
        </div>
        <span class="order-stats__title">
            <?php echo e($data['processing']); ?>

        </span>
    </a>
</div>

<div class="col-sm-6 col-lg-3">
    <a class="order-stats order-stats_out-for-delivery" href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/out-of-delivery.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('out_for_delivery')); ?></h6>
        </div>
        <span class="order-stats__title">
            <?php echo e($data['out_for_delivery']); ?>

        </span>
    </a>
</div>



<div class="col-sm-6 col-lg-3">
    <div class="order-stats order-stats_delivered cursor-pointer" onclick="location.href='<?php echo e(route('admin.orders.list',['delivered'])); ?>'">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/delivered.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('delivered')); ?></h6>
        </div>
        <span class="order-stats__title"><?php echo e($data['delivered']); ?></span>
    </div>
</div>

<div class="col-sm-6 col-lg-3">
    <div class="order-stats order-stats_canceled cursor-pointer" onclick="location.href='<?php echo e(route('admin.orders.list',['canceled'])); ?>'">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/canceled.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('canceled')); ?></h6>
        </div>
        <span class="order-stats__title h3"><?php echo e($data['canceled']); ?></span>
    </div>
</div>

<div class="col-sm-6 col-lg-3">
    <div class="order-stats order-stats_returned cursor-pointer" onclick="location.href='<?php echo e(route('admin.orders.list',['returned'])); ?>'">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/returned.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('returned')); ?></h6>
        </div>
        <span class="order-stats__title h3"><?php echo e($data['returned']); ?></span>
    </div>
</div>

<div class="col-sm-6 col-lg-3">
    <div class="order-stats order-stats_failed cursor-pointer" onclick="location.href='<?php echo e(route('admin.orders.list',['failed'])); ?>'">
        <div class="order-stats__content">
            <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/failed-to-deliver.png')); ?>" alt="">
            <h6 class="order-stats__subtitle"><?php echo e(translate('failed_to_delivery')); ?></h6>
        </div>
        <span class="order-stats__title h3"><?php echo e($data['failed']); ?></span>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/partials/_dashboard-order-stats.blade.php ENDPATH**/ ?>