<?php $__env->startSection('title', translate('order_Report')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/order_report.png')); ?>" alt="">
                <?php echo e(translate('order_Report')); ?>

            </h2>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <form action="" id="form-data" method="GET">
                    <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                    <div class="row gx-2 gy-3 align-items-center text-left">
                        <div class="col-sm-6 col-md-3">
                            <select class="js-select2-custom form-control text-ellipsis" name="seller_id">
                                <option value="all" <?php echo e($seller_id == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all')); ?></option>
                                <option value="inhouse" <?php echo e($seller_id == 'inhouse' ? 'selected' : ''); ?>><?php echo e(translate('in-House')); ?></option>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($seller['id']); ?>" <?php echo e($seller_id == $seller['id'] ? 'selected' : ''); ?>>
                                        <?php echo e($seller['f_name']); ?> <?php echo e($seller['l_name']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
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
                        <div class="col-sm-6 col-md-3 filter-btn">
                            <button type="submit" class="btn btn--primary px-4 px-md-5">
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
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/cart.svg')); ?>" alt="<?php echo e(translate('image')); ?>">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($order_count['total_order']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Orders')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex flex-wrap justify-content-between gap-2">
                        <div class="text-center">
                            <strong class="text-danger fs-12 font-weight-bold"><?php echo e($order_count['canceled_order']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('canceled')); ?></span>
                                <span class="ml-2" data-toggle="tooltip" data-placement="top"
                                      title="<?php echo e(translate('this_count_is_the_summation_of')); ?> <?php echo e(translate('failed_to_deliver')); ?>, <?php echo e(translate('canceled')); ?>, <?php echo e(translate('and')); ?> <?php echo e(translate('returned_orders')); ?>">
                                    <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                         alt="img">
                                </span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-primary fs-12 font-weight-bold"><?php echo e($order_count['ongoing_order']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('ongoing')); ?></span>
                                <span class="ml-2" data-toggle="tooltip" data-placement="top"
                                      title="<?php echo e(translate('this_count_is_the_summation_of')); ?> <?php echo e(translate('pending')); ?>, <?php echo e(translate('confirmed')); ?>, <?php echo e(translate('packaging')); ?>, <?php echo e(translate('out_for_delivery_orders')); ?>">
                                    <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                         alt="img">
                                </span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success fs-12 font-weight-bold"><?php echo e($order_count['delivered_order']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('completed')); ?></span>
                                <span class="ml-2" data-toggle="tooltip" data-placement="top"
                                      title="<?php echo e(translate('this_count_is_the_summation_of_delivered_orders')); ?>">
                                    <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                         alt="img">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/products.svg')); ?>" alt="<?php echo e(translate('image')); ?>">
                    <div class="info">
                        <h4 class="subtitle">
                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $due_amount+$settled_amount), currencyCode: getCurrencyCode())); ?>

                        </h4>
                        <h6 class="subtext"><?php echo e(translate('total_Order_Amount')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div class="text-center">
                            <strong class="text-danger">
                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $due_amount), currencyCode: getCurrencyCode())); ?>

                            </strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('due_Amount')); ?></span>
                                <span class="trx-y-2 ml-2" data-toggle="tooltip" data-placement="top"
                                      title="<?php echo e(translate('the_ongoing_order_amount_will_be_shown_here')); ?>">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="<?php echo e(translate('image')); ?>">
                                </span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success">
                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $settled_amount), currencyCode: getCurrencyCode())); ?>

                            </strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('already_Settled')); ?></span>
                                <span class="trx-y-2 ml-2" data-toggle="tooltip" data-placement="top"
                                      title="<?php echo e(translate('after_the_order_is_delivered_total_order_amount_will_be_shown_here')); ?>">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="<?php echo e(translate('image')); ?>">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = array_values($chart_data['order_amount']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($chart_val[] = usdToDefaultCurrency(amount: $amount)); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="center-chart-area">
                <div class="center-chart-header">
                    <h3 class="title"><?php echo e(translate('order_Statistics')); ?></h3>
                </div>
                <canvas id="updatingData" class="store-center-chart style-2"
                        data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [<?php echo e('"'.implode('","', array_keys($chart_data['order_amount'])).'"'); ?>],
                  "datasets": [{
                    "label": "<?php echo e(translate('total_settled_amount')); ?>",
                    "data": [<?php echo e('"'.implode('","', array_values($chart_val)).'"'); ?>],
                    "backgroundColor": "#a2ceee",
                    "hoverBackgroundColor": "#0177cd",
                    "borderColor": "#a2ceee"
                  }]
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
                <div class="card h-100 bg-white payment-statistics-shadow">
                    <div class="card-header border-0 ">
                        <h5 class="card-title">
                            <span><?php echo e(translate('payment_Statistics')); ?></span>
                        </h5>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="position-relative pie-chart">
                            <div id="dognut-pie" class="label-hide"></div>
                            <div class="total--orders">
                                <h3 class="mb-1">
                                    <?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?><?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['total_payment']))); ?>

                                </h3>
                                <span><?php echo e(translate('completed')); ?> <br> <?php echo e(translate('payments')); ?></span>
                            </div>
                        </div>
                        <div class="apex-legends">
                            <div class="before-bg-004188">
                                <span><?php echo e(translate('cash_Payments')); ?> (<?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $payment_data['cash_payment']), currencyCode: getCurrencyCode())); ?>)</span>
                            </div>
                            <div class="before-bg-0177CD">
                                <span><?php echo e(translate('digital_Payments')); ?> (<?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $payment_data['digital_payment']), currencyCode: getCurrencyCode())); ?>)</span>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <?php echo e(translate('total_Orders')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-14"><?php echo e($orders->total()); ?></span>
                    </h4>
                    <form action="" method="GET" class="mb-0">
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo e($seller_id); ?>" name="seller_id">
                            <input type="hidden" value="<?php echo e($date_type); ?>" name="date_type">
                            <input type="hidden" value="<?php echo e($from); ?>" name="from">
                            <input type="hidden" value="<?php echo e($to); ?>" name="to">
                            <input id="datatableSearch_" value="<?php echo e($search); ?>" type="search" name="search"
                                   class="form-control" placeholder="<?php echo e(translate('search_by_order_id')); ?>"
                                   aria-label="Search orders" required>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                    </form>
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
                                   href="<?php echo e(route('admin.report.order-report-excel', ['date_type'=>request('date_type'), 'seller_id'=>request('seller_id'), 'from'=>request('from'), 'to'=>request('to'), 'search'=>request('search')])); ?>">
                                    <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                    <?php echo e(translate('excel')); ?>

                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('admin.report.order-report-pdf', ['date_type'=>request('date_type'), 'seller_id'=>request('seller_id'), 'from'=>request('from'), 'to'=>request('to'), 'search'=>request('search')])); ?>">
                                    <span class="text-warning"><i class="tio-file-text"></i></span>
                                    <?php echo e(translate('Download_PDF')); ?>

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
                        <th><?php echo e(translate('order_ID')); ?></th>
                        <th><?php echo e(translate('total_Amount')); ?></th>
                        <th><?php echo e(translate('product_Discount')); ?></th>
                        <th><?php echo e(translate('coupon_Discount')); ?></th>
                        <th><?php echo e(translate('shipping_Charge')); ?></th>
                        <th><?php echo e(translate('VAT/TAX')); ?></th>
                        <th><?php echo e(translate('commission')); ?></th>
                        <th><?php echo e(translate('deliveryman_incentive')); ?></th>
                        <th class="text-center"><?php echo e(translate('status')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($orders->firstItem()+$key); ?></td>
                            <td>
                                <a class="title-color"
                                   href="<?php echo e(route('admin.orders.details',['id'=>$order->id])); ?>"><?php echo e($order->id); ?></a>
                            </td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->order_amount), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->details_sum_discount), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->discount_amount), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->shipping_cost - ($order->extra_discount_type == 'free_shipping_over_order_amount' ? $order->extra_discount : 0)), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->details_sum_tax), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->admin_commission), currencyCode: getCurrencyCode())); ?></td>
                            <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $order->deliveryman_charge), currencyCode: getCurrencyCode())); ?></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <?php if($order['order_status']=='pending'): ?>
                                        <span class="badge badge-soft-info fz-12">
                                            <?php echo e(translate($order['order_status'])); ?>

                                        </span>
                                    <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                        <span class="badge badge-soft-warning fz-12">
                                            <?php echo e(str_replace('_',' ',($order['order_status'] == 'processing') ? translate('packaging'):translate($order['order_status']))); ?>

                                        </span>
                                    <?php elseif($order['order_status']=='confirmed'): ?>
                                        <span class="badge badge-soft-success fz-12">
                                            <?php echo e(translate($order['order_status'])); ?>

                                        </span>
                                    <?php elseif($order['order_status']=='failed'): ?>
                                        <span class="badge badge-soft-danger fz-12">
                                            <?php echo e(translate('failed_to_deliver')); ?>

                                        </span>
                                    <?php elseif($order['order_status']=='delivered'): ?>
                                        <span class="badge badge-soft-success fz-12">
                                            <?php echo e(translate($order['order_status'])); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="badge badge-soft-danger fz-12">
                                            <?php echo e(translate($order['order_status'])); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($orders->total()==0): ?>
                        <tr>
                            <td colspan="9">
                                <div class="text-center p-4">
                                    <img class="mb-3 w-160"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                                         alt="Image Description">
                                    <p class="mb-0"><?php echo e(translate('no_data_to_found')); ?></p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="table-responsive mt-4">
            <div class="px-4 d-flex justify-content-center justify-content-md-end">
                <?php echo $orders->links(); ?>

            </div>
        </div>
    </div>

    <span id="currency_symbol" data-text="<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>"></span>

    <span id="cash_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['cash_payment'])); ?>"></span>
    <span id="digital_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['digital_payment'])); ?>"></span>
    <span id="wallet_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['wallet_payment'])); ?>"></span>
    <span id="offline_payment" data-text="<?php echo e(usdToDefaultCurrency(amount: $payment_data['offline_payment'])); ?>"></span>

    <span id="digital_payment_text" data-text="<?php echo e(translate('digital_payment')); ?>"></span>
    <span id="cash_payment_text" data-text="<?php echo e(translate('cash_payment')); ?>"></span>
    <span id="wallet_payment_text" data-text="<?php echo e(translate('wallet_payment')); ?>"></span>
    <span id="offline_payment_text" data-text="<?php echo e(translate('offline_payments')); ?>"></span>

    <span id="digital_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['digital_payment']))); ?>"></span>
    <span id="cash_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['cash_payment']))); ?>"></span>
    <span id="wallet_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['wallet_payment']))); ?>"></span>
    <span id="offline_payment_format" data-text="<?php echo e(getFormatCurrency(amount: usdToDefaultCurrency(amount: $payment_data['offline_payment']))); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chart.js.extensions/chartjs-extensions.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/order-report.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/report/order-index.blade.php ENDPATH**/ ?>