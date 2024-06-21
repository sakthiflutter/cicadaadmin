<?php
    use App\Enums\ViewPaths\Vendor\Chatting;
    use App\Enums\ViewPaths\Vendor\Product;
    use App\Enums\ViewPaths\Vendor\Profile;
    use App\Enums\ViewPaths\Vendor\Refund;
    use App\Enums\ViewPaths\Vendor\Review;
    use App\Enums\ViewPaths\Vendor\DeliveryMan;
    use App\Enums\ViewPaths\Vendor\EmergencyContact;
    use App\Models\Order;
    use App\Models\RefundRequest;
    use App\Models\Shop;
    use App\Enums\ViewPaths\Vendor\Order as OrderEnum;
?>
<div id="sidebarMain" class="d-none">
    <aside style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
           class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between side-logo">
                    <?php ($shop=Shop::where(['seller_id'=>auth('seller')->id()])->first()); ?>
                    <a class="navbar-brand" href="<?php echo e(route('vendor.dashboard.index')); ?>" aria-label="Front">
                        <?php if(isset($shop)): ?>
                            <img class="navbar-brand-logo-mini for-seller-logo"
                                 src="<?php echo e(getValidImage(path: 'storage/app/public/shop/'.$shop->image,type:'backend-logo')); ?>" alt="<?php echo e(translate('logo')); ?>">
                        <?php else: ?>
                            <img class="navbar-brand-logo-mini for-seller-logo"
                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/900x400/img1.jpg')); ?>"
                                 alt="<?php echo e(translate('logo')); ?>">
                        <?php endif; ?>
                    </a>
                    <button type="button"
                            class="d-none js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>

                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                           data-template="<div class=&quot;tooltip d-none d-sm-block&quot; role=&quot;tooltip&quot;><div class=&quot;arrow&quot;></div><div class=&quot;tooltip-inner&quot;></div></div>"
                           ></i>
                    </button>
                </div>
                <div class="navbar-vertical-content">
                    <div class="sidebar--search-form pb-3 pt-4">
                        <div class="search--form-group">
                            <button type="button" class="btn"><i class="tio-search"></i></button>
                            <input type="text" class="js-form-search form-control form--control" id="search-bar-input"
                                   placeholder="<?php echo e(translate('search_menu').'...'); ?>">
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/dashboard*')?'show':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('vendor.dashboard.index')); ?>">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('dashboard')); ?>

                                </span>
                            </a>
                        </li>
                        <?php ($seller = auth('seller')->user()); ?>
                        <?php ($sellerId = $seller['id']); ?>
                        <?php ($sellerPOS=getWebConfig('seller_pos')); ?>
                        <?php if($sellerPOS == 1 && $seller['pos_status'] == 1): ?>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/pos*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('vendor.pos.index')); ?>">
                                    <i class="tio-shopping nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('POS')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-item">
                            <small class="nav-subtitle"><?php echo e(translate('order_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/orders*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-shopping-cart nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('orders')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('vendor/order*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/all')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['all'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('all')); ?>

                                            <span
                                                class="badge badge-soft-info badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/pending')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['pending'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('pending')); ?>

                                            <span
                                                class="badge badge-soft-info badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'pending'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/confirmed')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['confirmed'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('confirmed')); ?>

                                            <span
                                                class="badge badge-soft-info badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'confirmed'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/processing')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['processing'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('packaging')); ?>

                                            <span
                                                class="badge badge-soft-warning badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'processing'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/out_for_delivery')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['out_for_delivery'])); ?>"
                                       title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize">
                                            <?php echo e(translate('out_for_delivery')); ?>

                                            <span
                                                class="badge badge-soft-warning badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'out_for_delivery'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/delivered')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['delivered'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('delivered')); ?>

                                            <span
                                                class="badge badge-soft-success badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'delivered'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/returned')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['returned'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('returned')); ?>

                                            <span
                                                class="badge badge-soft-danger badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'returned'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/failed')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['failed'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('failed To Deliver')); ?>

                                            <span
                                                class="badge badge-soft-danger badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'failed'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/orders/'.OrderEnum::LIST[URI].'/canceled')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.orders.list',['canceled'])); ?>" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            <?php echo e(translate('canceled')); ?>

                                            <span
                                                class="badge badge-soft-danger badge-pill <?php echo e(Session::get('direction') === "rtl" ? 'mr-1' : 'ml-1'); ?>">
                                                <?php echo e(Order::where(['seller_is'=>'seller'])->where(['seller_id'=>$sellerId])->where(['order_status'=>'canceled'])->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/refund*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                               href="javascript:">
                                <i class="tio-receipt-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('refund_Requests')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e(Request::is('vendor/refund*')?'block':'none'); ?>">
                                <li class="nav-item <?php echo e(Request::is('vendor/refund/'.Refund::INDEX[URI].'/pending')?'active':''); ?>">
                                    <a class="nav-link"
                                       href="<?php echo e(route('vendor.refund.index',['pending'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                          <?php echo e(translate('pending')); ?>

                                            <span class="badge badge-soft-danger badge-pill ml-1">
                                                <?php echo e(RefundRequest::whereHas('order', function ($query) {
                                                    $query->where('seller_is', 'seller')->where('seller_id',auth('seller')->id());
                                                        })->where('status','pending')->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('vendor/refund/'.Refund::INDEX[URI].'/approved')?'active':''); ?>">
                                    <a class="nav-link"
                                       href="<?php echo e(route('vendor.refund.index',['approved'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                           <?php echo e(translate('approved')); ?>

                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                <?php echo e(RefundRequest::whereHas('order', function ($query) {
                                                    $query->where('seller_is', 'seller')->where('seller_id',auth('seller')->id());
                                                        })->where('status','approved')->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/refund/'.Refund::INDEX[URI].'/refunded')?'active':''); ?>">
                                    <a class="nav-link"
                                       href="<?php echo e(route('vendor.refund.index',['refunded'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                           <?php echo e(translate('refunded')); ?>

                                            <span class="badge badge-soft-success badge-pill ml-1">
                                                <?php echo e(RefundRequest::whereHas('order', function ($query) {
                                                    $query->where('seller_is', 'seller')->where('seller_id',auth('seller')->id());
                                                        })->where('status','refunded')->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/refund/'.Refund::INDEX[URI].'/rejected')?'active':''); ?>">
                                    <a class="nav-link"
                                       href="<?php echo e(route('vendor.refund.index',['rejected'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                           <?php echo e(translate('rejected')); ?>

                                            <span class="badge badge-danger badge-pill ml-1">
                                                <?php echo e(RefundRequest::whereHas('order', function ($query) {
                                                    $query->where('seller_is', 'seller')->where('seller_id',auth('seller')->id());
                                                        })->where('status','rejected')->count()); ?>

                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <small class="nav-subtitle"><?php echo e(translate('product_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('vendor/product*'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-premium-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('products')); ?>

                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: <?php echo e((Request::is('vendor/products*'))?'block':''); ?>">
                                <li class="nav-item <?php echo e(Request::is('vendor/products/'.Product::LIST[URI].'/all')|| Request::is('vendor/products/'.Product::UPDATE[URI].'*')||   Request::is('vendor/products/'.Product::VIEW[URI].'*') || Request::is('vendor/products/'.Product::STOCK_LIMIT[URI])?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.products.list',['type'=>'all'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize"><?php echo e(translate('product_list')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/products/'.Product::LIST[URI].'/approved')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.products.list',['type'=>'approved'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize"><?php echo e(translate('approved_product_list')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/products/'.Product::LIST[URI].'/new-request')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.products.list',['type'=>'new-request'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize"><?php echo e(translate('new_product_request')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/products/'.Product::LIST[URI].'/denied')?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.products.list',['type'=>'denied'])); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize"><?php echo e(translate('denied_product_request')); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('vendor/products/'.Product::ADD[URI])?'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.products.add')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span
                                            class="text-truncate text-capitalize"><?php echo e(translate('add_new_product')); ?></span>
                                    </a>
                                </li>

                                <li class="nav-item <?php echo e(Request::is('vendor/products/'.Product::BULK_IMPORT[URI]) ? 'active':''); ?>">
                                    <a class="nav-link " href="<?php echo e(route('vendor.products.bulk-import')); ?>">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate"><?php echo e(translate('bulk_import')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/reviews/'.Review::INDEX[URI].'*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('vendor.reviews.index')); ?>">
                                <i class="tio-star nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('product_Reviews')); ?>

                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <small class="nav-subtitle"><?php echo e(translate('promotion_management')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/coupon*')?'active':''); ?>">
                            <a class="nav-link"
                               href="<?php echo e(route('vendor.coupon.index')); ?>" title="<?php echo e(translate('coupons')); ?>">
                                <i class="tio-users-switch nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('coupons')); ?></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <small class="nav-subtitle"><?php echo e(translate('help_&_support')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/messages*')?'active':''); ?>">
                            <a class="nav-link"
                               href="<?php echo e(route('vendor.messages.index', ['type' => 'customer'])); ?>">
                                <i class="tio-chat nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('inbox')); ?>

                                    </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e((Request::is('vendor/transaction/order-list')) ? 'scroll-here':''); ?>">
                            <small class="nav-subtitle"><?php echo e(translate('reports_&_analytics')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('vendor/transaction/order-list') || Request::is('vendor/transaction/expense-list') || Request::is('vendor/transaction/order-history-log*'))?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('vendor.transaction.order-list')); ?>"
                               title="<?php echo e(translate('transactions_Report')); ?>">
                                <i class="tio-chart-bar-3 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                    <?php echo e(translate('transactions_Report')); ?>

                                </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('vendor/report/all-product') ||Request::is('vendor/report/stock-product-report')) ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link text-capitalize"
                               href="<?php echo e(route('vendor.report.all-product')); ?>" title="<?php echo e(translate('product_report')); ?>">
                                <i class="tio-chart-bar-4 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <span class="position-relative text-capitalize">
                                        <?php echo e(translate('product_report')); ?>

                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/report/order-report')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link text-capitalize"
                               href="<?php echo e(route('vendor.report.order-report')); ?>"
                               title="<?php echo e(translate('order_report')); ?>">
                                <i class="tio-chart-bar-1 nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                             <?php echo e(translate('order_Report')); ?>

                            </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo e(( Request::is('vendor/business-settings*'))?'scroll-here':''); ?>">
                            <small class="nav-subtitle" title=""><?php echo e(translate('business_section')); ?></small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <?php ($shippingMethod = getWebConfig('shipping_method')); ?>
                        <?php if($shippingMethod=='sellerwise_shipping'): ?>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/business-settings/shipping-method*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('vendor.business-settings.shipping-method.index')); ?>">
                                    <i class="tio-settings nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize text-capitalize">
                                        <?php echo e(translate('shipping_methods')); ?>

                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/business-settings/withdraw*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('vendor.business-settings.withdraw.index')); ?>">
                                <i class="tio-wallet-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                        <?php echo e(translate('withdraws')); ?>

                                </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/profile/'.Profile::INDEX[URI]) || Request::is('vendor/profile/'.Profile::BANK_INFO_UPDATE[URI]) ?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('vendor.profile.index')); ?>">
                                <i class="tio-shop nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                    <?php echo e(translate('bank_Information')); ?>

                                </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/shop*')?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="<?php echo e(route('vendor.shop.index')); ?>">
                                <i class="tio-home nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                    <?php echo e(translate('shop_Settings')); ?>

                                </span>
                            </a>
                        </li>
                        <?php ( $shippingMethod = getWebConfig('shipping_method')); ?>
                        <?php if($shippingMethod=='sellerwise_shipping'): ?>
                            <li class="nav-item <?php echo e(Request::is('vendor/delivery-man*')?'scroll-here':''); ?>">
                                <small class="nav-subtitle"><?php echo e(translate('delivery_man_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('vendor/delivery-man*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:">
                                    <i class="tio-user nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('delivery-Man')); ?>

                                </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('vendor/delivery-man*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('vendor/delivery-man/'.DeliveryMan::INDEX[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('vendor.delivery-man.index')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate text-capitalize"><?php echo e(translate('add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('vendor/delivery-man/'.DeliveryMan::LIST[URI]) || Request::is('vendor/delivery-man/'.DeliveryMan::UPDATE[URI])  ||Request::is('vendor/delivery-man/'.DeliveryMan::RATING[URI].'/*') ||  Request::is('vendor/delivery-man/wallet*') ? 'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('vendor.delivery-man.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('list')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('vendor/delivery-man/withdraw/*')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('vendor.delivery-man.withdraw.index')); ?>"
                                           title="<?php echo e(translate('withdraws')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('withdraws')); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('vendor/delivery-man/emergency-contact/*') ? 'active' : ''); ?>">
                                        <a class="nav-link "
                                           href="<?php echo e(route('vendor.delivery-man.emergency-contact.index')); ?>"
                                           title="<?php echo e(translate('withdraws')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate text-capitalize"><?php echo e(translate('emergency_contact')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>


<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/partials-seller/_side-bar.blade.php ENDPATH**/ ?>