<?php use App\Utils\Helpers; ?>

<?php $__env->startSection('title', translate('dashboard')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(auth('admin')->user()->admin_role_id==1 || Helpers::module_permission_check('dashboard')): ?>
        <div class="content container-fluid">
            <div class="page-header pb-0 mb-0 border-0">
                <div class="flex-between align-items-center">
                    <div>
                        <h1 class="page-header-title"><?php echo e(translate('welcome').' '.auth('admin')->user()->name); ?></h1>
                        <p><?php echo e(translate('monitor_your_business_analytics_and_statistics').'.'); ?></p>
                    </div>
                </div>
            </div>
            <div class="card mb-2 remove-card-shadow">
                <div class="card-body">
                    <div class="row flex-between align-items-center g-2 mb-3">
                        <div class="col-sm-6">
                            <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/business_analytics.png')); ?>"
                                     alt=""><?php echo e(translate('business_analytics')); ?></h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-sm-end">
                            <select class="custom-select w-auto" name="statistics_type" id="statistics_type">
                                <option
                                    value="overall" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'overall'?'selected':''); ?>>
                                    <?php echo e(translate('overall_statistics')); ?>

                                </option>
                                <option
                                    value="today" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'today'?'selected':''); ?>>
                                    <?php echo e(translate("todays_Statistics")); ?>

                                </option>
                                <option
                                    value="this_month" <?php echo e(session()->has('statistics_type') && session('statistics_type') == 'this_month'?'selected':''); ?>>
                                    <?php echo e(translate("this_Months_Statistics")); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-2" id="order_stats">
                        <?php echo $__env->make('admin-views.partials._dashboard-order-stats',['data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <div class="card mb-3 remove-card-shadow">
                <div class="card-body">
                    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-3">
                        <img width="20" class="mb-1" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/admin-wallet.png')); ?>"
                             alt="">
                        <?php echo e(translate('admin_wallet')); ?>

                    </h4>

                    <div class="row g-2" id="order_stats">
                        <?php echo $__env->make('admin-views.partials._dashboard-wallet-stats',['data'=>$data], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>

            <div class="row g-1">
                <div class="col-lg-8" id="order-statistics-div">
                    <?php echo $__env->make('admin-views.system.partials.order-statistics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-4">
                    <div class="card remove-card-shadow h-100">
                        <div class="card-header">
                            <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0 ">
                                <?php echo e(translate('user_overview')); ?>

                            </h4>
                        </div>
                        <div class="card-body justify-content-center d-flex flex-column">
                            <div>
                                <div class="position-relative">
                                    <div id="chart" class="d-flex justify-content-center"></div>
                                    <div class="total--orders">
                                        <h3><?php echo e($data['getTotalCustomerCount']+$data['getTotalVendorCount']+$data['getTotalDeliveryManCount']); ?></h3>
                                        <span><?php echo e(translate('user')); ?></span>
                                    </div>
                                </div>
                                <div class="apex-legends flex-column">
                                    <div class="before-bg-017EFA">
                                        <span ><?php echo e(translate('customer').' '.'('.$data['getTotalCustomerCount'].')'); ?> </span>
                                    </div>
                                    <div class="before-bg-51CBFF">
                                        <span class="text-capitalize"><?php echo e(translate('vendor').' '.'('.$data['getTotalVendorCount'].')'); ?></span>
                                    </div>
                                    <div class="before-bg-56E7E7">
                                        <span class="text-capitalize"><?php echo e(translate('delivery_man').' '.'('.$data['getTotalDeliveryManCount'].')'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card remove-card-shadow">
                        <div class="card-body">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-6">
                                    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/earning_statictics.png')); ?>"
                                             alt="">
                                        <?php echo e(translate('earning_statistics')); ?>

                                    </h4>
                                </div>
                                <div class="col-md-6 d-flex justify-content-md-end">
                                    <ul class="option-select-btn">
                                        <li>
                                            <label class="basic-box-shadow">
                                                <input type="radio" name="statistics2" hidden="" checked="">
                                                <span data-earn-type="yearEarn" class="earning-statistics"><?php echo e(translate('this_Year')); ?></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="basic-box-shadow">
                                                <input type="radio" name="statistics2" hidden="">
                                                <span data-earn-type="MonthEarn" class="earning-statistics"><?php echo e(translate('this_Month')); ?></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="basic-box-shadow">
                                                <input type="radio" name="statistics2" hidden="">
                                                <span data-earn-type="WeekEarn" class="earning-statistics"><?php echo e(translate('this_Week')); ?></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chartjs-custom mt-2" id="set-new-graph">
                                <canvas id="updatingData"
                                        data-hs-chartjs-options='{
                                            "type": "bar",
                                            "data": {
                                              "labels": ["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                                              "datasets": [{
                                                "label": " <?php echo e(translate('in-house')); ?> ",
                                                "data": [<?php echo e($inhouseEarningStatisticsData[1]); ?>,<?php echo e($inhouseEarningStatisticsData[2]); ?>,<?php echo e($inhouseEarningStatisticsData[3]); ?>,<?php echo e($inhouseEarningStatisticsData[4]); ?>,<?php echo e($inhouseEarningStatisticsData[5]); ?>,<?php echo e($inhouseEarningStatisticsData[6]); ?>,<?php echo e($inhouseEarningStatisticsData[7]); ?>,<?php echo e($inhouseEarningStatisticsData[8]); ?>,<?php echo e($inhouseEarningStatisticsData[9]); ?>,<?php echo e($inhouseEarningStatisticsData[10]); ?>,<?php echo e($inhouseEarningStatisticsData[11]); ?>,<?php echo e($inhouseEarningStatisticsData[12]); ?>],
                                                "backgroundColor": "#ACDBAB",
                                                "hoverBackgroundColor": "#ACDBAB",
                                                "borderColor": "#ACDBAB"
                                              },
                                              {
                                                "label": " <?php echo e(translate('vendor')); ?> ",
                                                "data": [<?php echo e($sellerEarningStatisticsData[1]); ?>,<?php echo e($sellerEarningStatisticsData[2]); ?>,<?php echo e($sellerEarningStatisticsData[3]); ?>,<?php echo e($sellerEarningStatisticsData[4]); ?>,<?php echo e($sellerEarningStatisticsData[5]); ?>,<?php echo e($sellerEarningStatisticsData[6]); ?>,<?php echo e($sellerEarningStatisticsData[7]); ?>,<?php echo e($sellerEarningStatisticsData[8]); ?>,<?php echo e($sellerEarningStatisticsData[9]); ?>,<?php echo e($sellerEarningStatisticsData[10]); ?>,<?php echo e($sellerEarningStatisticsData[11]); ?>,<?php echo e($sellerEarningStatisticsData[12]); ?>],
                                                "backgroundColor": "#0177CD",
                                                "borderColor": "#0177CD"
                                              },
                                              {
                                                "label": " <?php echo e(translate('commission')); ?> ",
                                                "data": [<?php echo e($commissionEarningStatisticsData[1]); ?>,<?php echo e($commissionEarningStatisticsData[2]); ?>,<?php echo e($commissionEarningStatisticsData[3]); ?>,<?php echo e($commissionEarningStatisticsData[4]); ?>,<?php echo e($commissionEarningStatisticsData[5]); ?>,<?php echo e($commissionEarningStatisticsData[6]); ?>,<?php echo e($commissionEarningStatisticsData[7]); ?>,<?php echo e($commissionEarningStatisticsData[8]); ?>,<?php echo e($commissionEarningStatisticsData[9]); ?>,<?php echo e($commissionEarningStatisticsData[10]); ?>,<?php echo e($commissionEarningStatisticsData[11]); ?>,<?php echo e($commissionEarningStatisticsData[12]); ?>],
                                                "backgroundColor": "#FFB36D",
                                                "borderColor": "#FFB36D"
                                              }]
                                            },
                                            "options": {
                                                "legend": {
                                                    "display": true,
                                                    "position": "top",
                                                    "align": "center",
                                                    "labels": {
                                                        "usePointStyle": true,
                                                        "boxWidth": 8,
                                                        "fontColor": "#758590",
                                                        "fontSize": 14
                                                    }
                                                },
                                                "scales": {
                                                    "yAxes": [{
                                                    "gridLines": {
                                                        "color": "rgba(180, 208, 224, 0.5)",
                                                        "borderDash": [8, 4],
                                                        "drawBorder": false,
                                                        "zeroLineColor": "rgba(180, 208, 224, 0.5)"
                                                    },
                                                    "ticks": {
                                                        "beginAtZero": true,
                                                        "fontSize": 12,
                                                        "fontColor": "#5B6777",
                                                        "padding": 10,
                                                        "postfix": " <?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>"
                                                    }
                                                    }],
                                                    "xAxes": [{
                                                    "gridLines": {
                                                        "color": "rgba(180, 208, 224, 0.5)",
                                                        "display": true,
                                                        "drawBorder": true,
                                                        "zeroLineColor": "rgba(180, 208, 224, 0.5)"
                                                    },
                                                    "ticks": {
                                                        "fontSize": 12,
                                                        "fontColor": "#5B6777",
                                                        "fontFamily": "Open Sans, sans-serif",
                                                        "padding": 5
                                                    },
                                                    "categoryPercentage": 0.5,
                                                    "maxBarThickness": "7"
                                                    }]
                                                },
                                                "cornerRadius": 3,
                                                "tooltips": {
                                                    "prefix": " ",
                                                    "hasIndicator": true,
                                                    "mode": "index",
                                                    "intersect": false
                                                },
                                                "hover": {
                                                    "mode": "nearest",
                                                    "intersect": true
                                                }
                                            }
                                  }'></canvas>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-customer',['top_customer'=>$data['top_customer']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>


                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-store-by-order',['top_store_by_order_received'=>$data['top_store_by_order_received']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-selling-store',['topVendorByEarning'=>$data['topVendorByEarning']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._most-rated-products',['mostRatedProducts'=>$data['mostRatedProducts']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-selling-products',['topSellProduct'=>$data['topSellProduct']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card h-100 remove-card-shadow">
                        <?php echo $__env->make('admin-views.partials._top-delivery-man',['topRatedDeliveryMan'=>$data['topRatedDeliveryMan']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>

            </div>
        </div>
    <?php else: ?>
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-12 mb-2 mb-sm-0">
                        <h3 class="text-center"><?php echo e(translate('hi')); ?> <?php echo e(auth('admin')->user()->name); ?>

                            , <?php echo e(translate('welcome_to_dashboard')); ?>.</h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <span id="earning-statistics-url" data-url="<?php echo e(route('admin.dashboard.earning-statistics')); ?>"></span>
    <span id="order-status-url" data-url="<?php echo e(route('admin.dashboard.order-status')); ?>"></span>
    <span id="seller-text" data-text="<?php echo e(translate('vendor')); ?>"></span>
    <span id="message-commission-text" data-text="<?php echo e(translate('commission')); ?>"></span>
    <span id="in-house-text" data-text="<?php echo e(translate('In-house')); ?>"></span>
    <span id="customer-text" data-text="<?php echo e(translate('customer')); ?>"></span>
    <span id="store-text" data-text="<?php echo e(translate('store')); ?>"></span>
    <span id="product-text" data-text="<?php echo e(translate('product')); ?>"></span>
    <span id="order-text" data-text="<?php echo e(translate('order')); ?>"></span>
    <span id="brand-text" data-text="<?php echo e(translate('brand')); ?>"></span>
    <span id="business-text" data-text="<?php echo e(translate('business')); ?>"></span>
    <span id="orders-text" data-text="<?php echo e($data['order']); ?>"></span>
    <span id="user-overview-data"
          data-customer="<?php echo e($data['getTotalCustomerCount']); ?>"
          data-customer-title="<?php echo e(translate('customer')); ?>"
          data-vendor="<?php echo e($data['getTotalVendorCount']); ?>"
          data-vendor-title="<?php echo e(translate('vendor')); ?>"
          data-delivery-man="<?php echo e($data['getTotalDeliveryManCount']); ?>"
          data-delivery-man-title="<?php echo e(translate('delivery_man')); ?>"
    ></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/chart.js.extensions/chartjs-extensions.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/dashboard.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/system/dashboard.blade.php ENDPATH**/ ?>