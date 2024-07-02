<?php $__env->startSection('title', translate('product_Report')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex gap-2 align-items-center">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/seller_sale.png')); ?>" alt="">
                <?php echo e(translate('product_Report')); ?>

            </h2>
        </div>

        <?php echo $__env->make('admin-views.report.product-report-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="card mb-2">
            <div class="card-body">
                <form action="" id="form-data" method="GET">
                    <h4 class="mb-3"><?php echo e(translate('filter_Data')); ?></h4>
                    <div class="row gx-2 gy-3 align-items-center text-left">
                        <div class="col-sm-6 col-md-3">
                            <select class="js-select2-custom form-control __form-control" name="seller_id">
                                <option class="text-center" value="all" <?php echo e($seller_id == 'all' ? 'selected' : ''); ?>>
                                    <?php echo e(translate('all')); ?>

                                </option>
                                <option class="text-center"
                                        value="inhouse" <?php echo e($seller_id == 'inhouse' ? 'selected' : ''); ?>>
                                    <?php echo e(translate('inhouse')); ?>

                                </option>
                                <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($seller['id']); ?>" <?php echo e($seller_id==$seller['id']?'selected':''); ?>>
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
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/cart.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle"><?php echo e($product_count['reject_product_count']+$product_count['active_product_count']+$product_count['pending_product_count']); ?></h4>
                        <h6 class="subtext"><?php echo e(translate('total_Product')); ?></h6>
                    </div>
                    <div class="coupon__discount w-100 text-right d-flex justify-content-between">
                        <div class="text-center">
                            <strong class="text-danger"><?php echo e($product_count['reject_product_count']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('rejected')); ?></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-primary"><?php echo e($product_count['pending_product_count']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('pending')); ?></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <strong class="text-success"><?php echo e($product_count['active_product_count']); ?></strong>
                            <div class="d-flex">
                                <span><?php echo e(translate('active')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/products.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle">
                            <?php echo e($total_product_sale); ?>

                        </h4>
                        <h6 class="subtext"><?php echo e(translate('total_Product_Sale')); ?></h6>
                    </div>
                </div>
                <div class="left-content-card">
                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/stores.svg')); ?>" alt="">
                    <div class="info">
                        <h4 class="subtitle">
                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $total_discount_given), currencyCode: getCurrencyCode())); ?>

                        </h4>
                        <h6 class="subtext d-flex">
                            <?php echo e(translate('total_Discount_Given')); ?>

                            <span class="ml-2" data-toggle="tooltip" data-placement="top"
                                  title="<?php echo e(translate('product_wise_discounted_amount_will_be_shown_here')); ?>">
                                <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                     alt="img">
                            </span>
                        </h6>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = array_values($chart_data['total_product']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($chart_val[] = usdToDefaultCurrency(amount: $amount)); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="center-chart-area size-lg">
                <div class="center-chart-header">
                    <h3 class="title d-flex"><?php echo e(translate('product_Statistics')); ?>

                        <span class="ml-2" data-toggle="tooltip" data-placement="top"
                              title="<?php echo e(translate('the_product_report_will_show_based_on_the_product_added_date')); ?>">
                            <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                 alt="img">
                        </span>
                    </h3>
                </div>
                <canvas id="updatingData" class="store-center-chart"
                        data-hs-chartjs-options='{
                "type": "bar",
                "data": {
                  "labels": [<?php echo e('"'.implode('","', array_keys($chart_data['total_product'])).'"'); ?>],
                  "datasets": [{
                    "label": "<?php echo e(translate('total_product')); ?>",
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
                        "postfix": " "
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
        </div>

        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex flex-wrap w-100 gap-3 align-items-center">
                    <h4 class="mb-0 mr-auto">
                        <?php echo e(translate('total_Product')); ?>

                        <span class="badge badge-soft-dark radius-50 fz-12"> <?php echo e($products->total()); ?></span>
                    </h4>
                    <form action="#" method="GET">
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-custom">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input type="hidden" name="seller_id" value="<?php echo e($seller_id); ?>">
                            <input type="hidden" name="date_type" value="<?php echo e($date_type); ?>">
                            <input type="hidden" name="from" value="<?php echo e($from); ?>">
                            <input type="hidden" name="to" value="<?php echo e($to); ?>">
                            <input id="datatableSearch_" type="search" name="search" class="form-control"
                                   placeholder="<?php echo e(translate('search_product_name')); ?>" aria-label="Search orders"
                                   value="<?php echo e($search); ?>">
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                        </div>
                        <!-- End Search -->
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
                                   href="<?php echo e(route('admin.report.all-product-excel', ['seller_id' => request('seller_id'), 'search' => request('search'), 'date_type' => request('date_type'), 'from' => request('from'), 'to' => request('to')])); ?>">
                                    <img width="14" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/excel.png')); ?>" alt="">
                                    <?php echo e(translate('excel')); ?>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" id="products-table">
                    <table
                        class="table table-hover __table table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 <?php echo e(Session::get('direction') === "rtl" ? 'text-right' : 'text-left'); ?>">
                        <thead class="thead-light thead-50 text-capitalize">
                        <tr>
                            <th><?php echo e(translate('SL')); ?></th>
                            <th>
                                <?php echo e(translate('product_Name')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('product_Unit_Price')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('total_Amount_Sold')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('total_Quantity_Sold')); ?>

                            </th>
                            <th>
                                <span><?php echo e(translate('average_Product_Value')); ?> </span>
                            </th>
                            <th>
                                <?php echo e(translate('current_Stock_Amount')); ?>

                            </th>
                            <th>
                                <?php echo e(translate('average_Ratings')); ?>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($products->firstItem()+$key); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.products.view',['addedBy'=>$product['added_by'],'id'=>$product['id']])); ?>">
                                            <span class="media-body title-color hover-c1">
                                                <?php echo e(\Illuminate\Support\Str::limit($product['name'], 20)); ?>

                                            </span>
                                    </a>
                                </td>
                                <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product->unit_price), currencyCode: getCurrencyCode())); ?></td>
                                <td><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: isset($product->orderDetails[0]->total_sold_amount) ? $product->orderDetails[0]->total_sold_amount : 0), currencyCode: getCurrencyCode())); ?></td>
                                <td><?php echo e(isset($product->orderDetails[0]->product_quantity) ? $product->orderDetails[0]->product_quantity : 0); ?></td>
                                <td>
                                    <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: (
                                            isset($product->orderDetails[0]->total_sold_amount) ? $product->orderDetails[0]->total_sold_amount : 0) /
                                            (isset($product->orderDetails[0]->product_quantity) ? $product->orderDetails[0]->product_quantity : 1)
                                        ), currencyCode: getCurrencyCode())); ?>

                                </td>
                                <td>
                                    <?php echo e($product->product_type == 'digital' ? ($product->status==1 ? translate('available') : translate('not_available')) : $product->current_stock); ?>

                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rating mr-1"><i class="tio-star"></i>
                                            <?php echo e(count($product->rating)>0?number_format($product->rating[0]->average, 2, '.', ' '):0); ?>

                                        </div>
                                        <div>
                                            ( <?php echo e($product->reviews->count()); ?> )
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($products)==0): ?>
                            <tr>
                                <td colspan="7">
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
            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-center justify-content-md-end">
                    <!-- Pagination -->
                    <?php echo $products->links(); ?>

                </div>
            </div>
        </div>

        <!-- End Stats -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chart.js/dist/Chart.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chart.js.extensions/chartjs-extensions.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/product-report.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/report/all-product.blade.php ENDPATH**/ ?>