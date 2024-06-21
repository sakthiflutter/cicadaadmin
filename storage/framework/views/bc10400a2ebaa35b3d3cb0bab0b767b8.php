<?php $__env->startSection('title', translate('earning_Reports')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/earning_report.png')); ?>" alt="">
                <?php echo e(translate('earning_Reports')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.report.earning-report-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card mb-2">
            <div class="card-body">
                <form action="" id="form-data" method="GET">
                    <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                    <div class="row gy-3 gx-2 align-items-center text-left">
                        <div class="col-sm-6 col-md-3">
                            <select class="form-control __form-control" name="date_type" id="date_type">
                                <option value="this_year" <?php echo e($date_type == 'this_year'? 'selected' : ''); ?>><?php echo e(translate('this_Year')); ?></option>
                                <option value="this_month" <?php echo e($date_type == 'this_month'? 'selected' : ''); ?>><?php echo e(translate('this_Month')); ?></option>
                                <option value="this_week" <?php echo e($date_type == 'this_week'? 'selected' : ''); ?>><?php echo e(translate('this_Week')); ?></option>
                                <option value="today" <?php echo e($date_type == 'today'? 'selected' : ''); ?>><?php echo e(translate('today')); ?></option>
                                <option value="custom_date" <?php echo e($date_type == 'custom_date'? 'selected' : ''); ?>><?php echo e(translate('custom_Date')); ?></option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3" id="from_div">
                            <div class="form-floating">
                                <input type="date" name="from" value="<?php echo e($from); ?>" id="from_date" class="form-control">
                                <label><?php echo e(ucwords(translate('start_date'))); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3" id="to_div">
                            <div class="form-floating">
                                <input type="date" value="<?php echo e($to); ?>" name="to" id="to_date" class="form-control">
                                <label><?php echo e(ucwords(translate('end_date'))); ?></label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <button type="submit" class="btn btn--primary px-4 w-100">
                                <?php echo e(translate('filter')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="store-report-content mb-2">
            <div class="left-content">
                <div class="left-content-card">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/cart.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: array_sum($earning_data['total_earning_statistics'])), currencyCode: getCurrencyCode())); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_earnings')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex flex-wrap justify-content-between g-1">
                        <div class="text-center">
                            <strong class="text-danger break-all"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $earning_data['total_commission']), currencyCode: getCurrencyCode())); ?></strong>
                            <div><?php echo e(translate('commission')); ?></div>
                        </div>
                        <div class="text-center">
                            <strong class="text-primary break-all"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $earning_data['total_inhouse_earning']), currencyCode: getCurrencyCode())); ?></strong>
                            <div><?php echo e(translate('in_House')); ?></div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success break-all"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $earning_data['total_shipping_earn']), currencyCode: getCurrencyCode())); ?></strong>
                            <div>
                                <?php echo e(translate('shipping')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/products.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($earning_data['total_in_house_products']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_In_House_Products')); ?></h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/stores.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($earning_data['total_stores']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Shop')); ?></h6>
                    </div>
                </div>
            </div>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title"><?php echo e(translate('earning_Statistics')); ?></h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                        data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [<?php echo e('"'.implode('","', array_keys($earning_data['total_earning_statistics'])).'"'); ?>],
                  "datasets": [
                  {
                    "label": "<?php echo e(translate('total_Earnings')); ?>",
                    "data": [<?php echo e('"'.implode('","', array_values($earning_data['total_earning_statistics'])).'"'); ?>],
                    "backgroundColor": "#a2ceee",
                    "hoverBackgroundColor": "#0177cd",
                    "borderColor": "#a2ceee"
                  }
                  ]
                },
                "options": {
                  "scales": {
                    "yAxes": [{
                      "gridLines": {
                        "color": "#e7eaf3",
                        "drawBorder": false,
                        "zeroLineColor": "#e7eaf3"
                      },
                      "ticks": {
                        "beginAtZero": true,
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5,
                        "postfix": " <?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>"
                      }
                    }],
                    "xAxes": [{
                      "gridLines": {
                        "display": false,
                        "drawBorder": false
                      },
                      "ticks": {
                        "fontSize": 12,
                        "fontColor": "#97a4af",
                        "fontFamily": "Open Sans, sans-serif",
                        "padding": 5
                      },
                      "categoryPercentage": 0.3,
                      "maxBarThickness": "10"
                    }]
                  },
                  "cornerRadius": 5,
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
              }'>
                </canvas>
            </div>
            <div class="right-content">
                <!-- Dognut Pie -->
                <div class="card h-100 bg-white payment-statistics-shadow">
                    <div class="card-header border-0 ">
                        <h5 class="card-title">
                            <span><?php echo e(translate('payment_Statistics')); ?></span>
                        </h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="position-relative pie-chart">
                            <div id="dognut-pie" class="label-hide"></div>
                            <!-- Total Orders -->
                            <div class="total--orders">
                                <h3><?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?><?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['total_payment']))); ?></h3>
                                <span><?php echo e(translate('payments_Amount')); ?></span>
                            </div>
                            <!-- Total Orders -->
                        </div>
                        <div class="apex-legends">
                            <div class="before-bg-004188">
                                <span><?php echo e(translate('cash_payments')); ?> (<?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $payment_data['cash_payment']), currencyCode: getCurrencyCode())); ?>)</span>
                            </div>
                            <div class="before-bg-0177CD">
                                <span><?php echo e(translate('digital_payments')); ?> (<?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $payment_data['digital_payment']), currencyCode: getCurrencyCode())); ?>) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <div class="before-bg-A2CEEE">
                                <span><?php echo e(translate('wallet')); ?> (<?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $payment_data['wallet_payment']), currencyCode: getCurrencyCode())); ?>)</span>
                            </div>
                            <div class="before-bg-CDE6F5">
                                <span><?php echo e(translate('offline_payments')); ?> (<?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $payment_data['offline_payment']), currencyCode: getCurrencyCode())); ?>)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex flex-wrap w-100 gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        <?php echo e(translate('total_Earnings')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e(count($inhouse_earn)); ?></span>
                    </h4>
                    <div>
                        <button type="button" class="btn btn-outline--primary text-nowrap btn-block"
                                data-toggle="dropdown">
                            <i class="tio-download-to"></i>
                            <?php echo e(translate('export')); ?>

                            <i class="tio-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('admin.report.admin-earning-excel-export', ['date_type'=>$date_type, 'from'=>$from, 'to'=>$to])); ?>">
                                    <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                    <?php echo e(translate('excel')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="datatable"
                       class="table __table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('duration')); ?></th>
                        <th><?php echo e(translate('in-House_Earning')); ?></th>
                        <th><?php echo e(translate('commission_Earning')); ?></th>
                        <th><?php echo e(translate('earn_From_Shipping')); ?></th>
                        <th><?php echo e(translate('deliveryman_incentive')); ?></th>
                        <th><?php echo e(translate('discount_Given')); ?></th>
                        <th><?php echo e(translate('VAT/TAX')); ?></th>
                        <th><?php echo e(translate('refund_Given')); ?></th>
                        <th><?php echo e(translate('total_Earning')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php ($i=1); ?>
                    <?php $__currentLoopData = $inhouse_earn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$earning): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($inhouse_earning = $earning-$total_tax[$key]); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($key); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $inhouse_earning), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $admin_commission_earn[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $shipping_earn[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $deliveryman_incentive[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $discount_given[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $total_tax[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $refund_given[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $inhouse_earning+$admin_commission_earn[$key]+$total_tax[$key]+$shipping_earn[$key]-$discount_given[$key]-$refund_given[$key] - $deliveryman_incentive[$key]), currencyCode: getCurrencyCode())); ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <form action="<?php echo e(route('admin.report.admin-earning-duration-download-pdf')); ?>"
                                          method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="duration" value="<?php echo e($key); ?>">
                                        <input type="hidden" name="inhouse_earning" value="<?php echo e($inhouse_earning); ?>">
                                        <input type="hidden" name="admin_commission"
                                               value="<?php echo e($admin_commission_earn[$key]); ?>">
                                        <input type="hidden" name="shipping_earn" value="<?php echo e($shipping_earn[$key]); ?>">
                                        <input type="hidden" name="discount_given" value="<?php echo e($discount_given[$key]); ?>">
                                        <input type="hidden" name="total_tax" value="<?php echo e($total_tax[$key]); ?>">
                                        <input type="hidden" name="refund_given" value="<?php echo e($refund_given[$key]); ?>">
                                        <input type="hidden" name="deliveryman_incentive" value="<?php echo e($deliveryman_incentive[$key]); ?>">
                                        <input type="hidden" name="total_earning"
                                               value="<?php echo e($inhouse_earning+$admin_commission_earn[$key]+$shipping_earn[$key]+$total_tax[$key]-$discount_given[$key]-$refund_given[$key] - $deliveryman_incentive[$key]); ?>">
                                        <button type="submit" class="btn btn-outline-success square-btn btn-sm"><i
                                                    class="tio-download-to"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($inhouse_earn)==0): ?>
                        <tr>
                            <td colspan="9">
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                         alt="Image Description">
                                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <span id="currency_symbol" data-text="<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>"></span>

    <span id="cash_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['cash_payment'])); ?>"></span>
    <span id="digital_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['digital_payment'])); ?>"></span>
    <span id="wallet_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['wallet_payment'])); ?>"></span>
    <span id="offline_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['offline_payment'])); ?>"></span>

    <span id="cash_payment_text" data-text="<?php echo e(translate('cash_Payments')); ?>"></span>
    <span id="digital_payment_text" data-text="<?php echo e(translate('digital_payment')); ?>"></span>
    <span id="wallet_payment_text" data-text="<?php echo e(translate('wallet_payment')); ?>"></span>
    <span id="offline_payment_text" data-text="<?php echo e(translate('offline_payment')); ?>"></span>

    <span id="cash_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['cash_payment']))); ?>"></span>
    <span id="digital_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['offline_payment']))); ?>"></span>
    <span id="wallet_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['wallet_payment']))); ?>"></span>
    <span id="offline_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['offline_payment']))); ?>"></span>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chart.js.extensions/chartjs-extensions.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/admin-earning-report.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/report/admin-earning.blade.php ENDPATH**/ ?>