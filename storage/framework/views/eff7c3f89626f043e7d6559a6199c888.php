<?php
    use App\Enums\ViewPaths\Admin\Brand;use App\Enums\ViewPaths\Admin\BusinessSettings;use App\Enums\ViewPaths\Admin\Category;use App\Enums\ViewPaths\Admin\Chatting;use App\Enums\ViewPaths\Admin\Currency;use App\Enums\ViewPaths\Admin\Customer;use App\Enums\ViewPaths\Admin\CustomerWallet;use App\Enums\ViewPaths\Admin\Dashboard;
    use App\Enums\ViewPaths\Admin\DatabaseSetting;use App\Enums\ViewPaths\Admin\DealOfTheDay;use App\Enums\ViewPaths\Admin\DeliveryMan;use App\Enums\ViewPaths\Admin\DeliverymanWithdraw;use App\Enums\ViewPaths\Admin\DeliveryRestriction;use App\Enums\ViewPaths\Admin\Employee;use App\Enums\ViewPaths\Admin\EnvironmentSettings;use App\Enums\ViewPaths\Admin\FeatureDeal;use App\Enums\ViewPaths\Admin\FeaturesSection;use App\Enums\ViewPaths\Admin\FlashDeal;use App\Enums\ViewPaths\Admin\GoogleMapAPI;use App\Enums\ViewPaths\Admin\HelpTopic;use App\Enums\ViewPaths\Admin\InhouseProductSale;use App\Enums\ViewPaths\Admin\Mail;use App\Enums\ViewPaths\Admin\OfflinePaymentMethod;use App\Enums\ViewPaths\Admin\Order;
    use App\Enums\ViewPaths\Admin\Pages;use App\Enums\ViewPaths\Admin\Product;use App\Enums\ViewPaths\Admin\PushNotification;use App\Enums\ViewPaths\Admin\Recaptcha;use App\Enums\ViewPaths\Admin\RefundRequest;use App\Enums\ViewPaths\Admin\SiteMap;use App\Enums\ViewPaths\Admin\SMSModule;use App\Enums\ViewPaths\Admin\SocialLoginSettings;use App\Enums\ViewPaths\Admin\SocialMedia;use App\Enums\ViewPaths\Admin\SoftwareUpdate;use App\Enums\ViewPaths\Admin\SubCategory;use App\Enums\ViewPaths\Admin\SubSubCategory;use App\Enums\ViewPaths\Admin\ThemeSetup;
    use App\Enums\ViewPaths\Admin\Vendor;
    use App\Enums\ViewPaths\Admin\InhouseShop;
    use App\Enums\ViewPaths\Admin\SocialMediaChat;
    use App\Enums\ViewPaths\Admin\ShippingMethod;
    use App\Enums\ViewPaths\Admin\PaymentMethod;
    use App\Utils\Helpers;

?>
<div id="sidebarMain" class="d-none">
    <aside class="bg-white js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered text-start">
        <div class="navbar-vertical-container">
            <div class="navbar-vertical-footer-offset pb-0">
                <div class="navbar-brand-wrapper justify-content-between side-logo">
                    <?php ($eCommerceLogo = getWebConfig(name: 'company_web_logo')); ?>
                    <a class="navbar-brand" href="<?php echo e(route('admin.dashboard.index')); ?>" aria-label="Front">
                        <img class="navbar-brand-logo-mini for-web-logo max-h-30"
                             src="<?php echo e(getValidImage('storage/app/public/company/'.$eCommerceLogo,type: 'backend-logo')); ?>" alt="<?php echo e(translate('logo')); ?>">
                    </a>
                    <button type="button"
                            class="d-none js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                        <i class="tio-clear tio-lg"></i>
                    </button>

                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close">
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
                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/dashboard'.Dashboard::VIEW[URI])?'active':''); ?>">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               title="<?php echo e(translate('dashboard')); ?>"
                               href="<?php echo e(route('admin.dashboard.index')); ?>">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('dashboard')); ?>

                                </span>
                            </a>
                        </li>
                        <?php if(Helpers::module_permission_check('pos_management')): ?>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/pos*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   title="<?php echo e(translate('POS')); ?>" href="<?php echo e(route('admin.pos.index')); ?>">
                                    <i class="tio-shopping nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('POS')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(Helpers::module_permission_check('order_management')): ?>
                            <li class="nav-item <?php echo e(Request::is('admin/orders*')?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(translate('order_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/orders*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('orders')); ?>">
                                    <i class="tio-shopping-cart-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('orders')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/order*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/all') ? 'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.orders.list',['all'])); ?>"
                                           title="<?php echo e(translate('all')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('all')); ?>

                                                <span class="badge badge-soft-info badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/pending')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['pending'])); ?>"
                                           title="<?php echo e(translate('pending')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('pending')); ?>

                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                <?php echo e(\App\Models\Order::where(['order_status'=>'pending'])->count()); ?>

                                            </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/confirmed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['confirmed'])); ?>"
                                           title="<?php echo e(translate('confirmed')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('confirmed')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where(['order_status'=>'confirmed'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/processing')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['processing'])); ?>"
                                           title="<?php echo e(translate('packaging')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('packaging')); ?>

                                                <span class="badge badge-soft-warning badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where(['order_status'=>'processing'])->count()); ?>

                                                </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/out_for_delivery')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['out_for_delivery'])); ?>"
                                           title="<?php echo e(translate('out_for_delivery')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('out_for_delivery')); ?>

                                                <span class="badge badge-soft-warning badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where(['order_status'=>'out_for_delivery'])->count()); ?>

                                                </span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/delivered')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['delivered'])); ?>"
                                           title="<?php echo e(translate('delivered')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                            <?php echo e(translate('delivered')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where(['order_status'=>'delivered'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/returned')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['returned'])); ?>"
                                           title="<?php echo e(translate('returned')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('returned')); ?>

                                                    <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where('order_status','returned')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/failed')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['failed'])); ?>"
                                           title="<?php echo e(translate('failed')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('failed_to_Deliver')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where(['order_status'=>'failed'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/orders/'.Order::LIST[URI].'/canceled')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.orders.list',['canceled'])); ?>"
                                           title="<?php echo e(translate('canceled')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                                <?php echo e(translate('canceled')); ?>

                                                    <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Models\Order::where(['order_status'=>'canceled'])->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/refund-section/refund/*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('refund_Requests')); ?>">
                                    <i class="tio-receipt-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('refund_Requests')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/refund-section/refund*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/'.RefundRequest::LIST[URI].'/pending')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['pending'])); ?>"
                                           title="<?php echo e(translate('pending')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('pending')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Models\RefundRequest::where('status','pending')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/'.RefundRequest::LIST[URI].'/approved')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['approved'])); ?>"
                                           title="<?php echo e(translate('approved')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(translate('approved')); ?>

                                                <span class="badge badge-soft-info badge-pill ml-1">
                                                    <?php echo e(\App\Models\RefundRequest::where('status','approved')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/'.RefundRequest::LIST[URI].'/refunded')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['refunded'])); ?>"
                                           title="<?php echo e(translate('refunded')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(translate('refunded')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(\App\Models\RefundRequest::where('status','refunded')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/refund-section/refund/'.RefundRequest::LIST[URI].'/rejected')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.refund-section.refund.list',['rejected'])); ?>"
                                           title="<?php echo e(translate('rejected')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                               <?php echo e(translate('rejected')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(\App\Models\RefundRequest::where('status','rejected')->count()); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if(Helpers::module_permission_check('product_management')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/brand*') || Request::is('admin/category*') || Request::is('admin/sub*') || Request::is('admin/attribute*') || Request::is('admin/products*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle"
                                       title=""><?php echo e(translate('product_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/category*') || Request::is('admin/sub-category*') || Request::is('admin/sub-sub-category*')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('category_Setup')); ?>">
                                    <i class="tio-filter-list nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('category_Setup')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/category*') ||Request::is('admin/sub*'))?'block':''); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/category/'.Category::LIST[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.category.view')); ?>"
                                           title="<?php echo e(translate('categories')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('categories')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-category/'.SubCategory::LIST[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-category.view')); ?>"
                                           title="<?php echo e(translate('sub_Categories')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('sub_Categories')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sub-sub-category/'.SubSubCategory::LIST[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sub-sub-category.view')); ?>"
                                           title="<?php echo e(translate('sub_Sub_Categories')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="text-truncate"><?php echo e(translate('sub_Sub_Categories')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/brand*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('brands')); ?>">
                                    <i class="tio-star nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('brands')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/brand*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/'.Brand::ADD[URI])?'active':''); ?>"
                                        title="<?php echo e(translate('add_new')); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.add-new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/brand/'.Brand::LIST[URI])?'active':''); ?>"
                                        title="<?php echo e(translate('list')); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.brand.list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('list')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/attribute*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.attribute.view')); ?>"
                                   title="<?php echo e(translate('product_Attribute_Setup')); ?>">
                                    <i class="tio-category-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('product_Attribute_Setup')); ?></span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/products/'.Product::LIST[URI].'/in_house') || Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::BULK_IMPORT[URI]) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::ADD[URI])) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::VIEW[URI].'/admin/*')) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::BARCODE_GENERATE[URI].'/*')))?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('in-House_Products')); ?>">
                                    <i class="tio-shop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <span class="text-truncate"><?php echo e(translate('in-house_Products')); ?></span>
                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/products/'.Product::ADD[URI].'/in_house') || (Request::is('admin/products/'.Product::LIST[URI].'/in_house')) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::STOCK_LIMIT[URI].'/in_house')) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::BULK_IMPORT[URI])) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::ADD[URI])) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::VIEW[URI].'/admin/*')) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::BARCODE_GENERATE[URI].'/*')))?'block':''); ?>">
                                    <li class="nav-item <?php echo e((Request::is('admin/products/'.Product::LIST[URI].'/in_house') || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::VIEW[URI].'/admin/*')) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::STOCK_LIMIT[URI].'/in_house')) || (Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::BARCODE_GENERATE[URI].'/*')))?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.products.list',['in_house', ''])); ?>"
                                           title="<?php echo e(translate('Product_List')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('Product_List')); ?>

                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(getAdminProductsCount('all')); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/products/'.Product::ADD[URI]) ? 'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.products.add')); ?>"
                                           title="<?php echo e(translate('add_New_Product')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('add_New_Product')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/products/'.Product::BULK_IMPORT[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.products.bulk-import')); ?>"
                                           title="<?php echo e(translate('bulk_import')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('bulk_import')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/products/'.Product::LIST[URI].'/seller*')||(Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::VIEW[URI].'/seller/*'))||Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::UPDATED_PRODUCT_LIST[URI])?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:"
                                   title="<?php echo e(translate('vendor_Products')); ?>">
                                    <i class="tio-airdrop nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('vendor_Products')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::LIST[URI].'/seller*')||(Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::VIEW[URI].'/seller/*'))||Request::is('admin/products/'.\App\Enums\ViewPaths\Admin\Product::UPDATED_PRODUCT_LIST[URI])?'block':''); ?>">
                                    <li class="nav-item <?php echo e(str_contains(url()->current().'?status='.request()->get('status'),'admin/products/'.\App\Enums\ViewPaths\Admin\Product::LIST[URI].'/seller?status=0')==1?'active':''); ?>">
                                        <a class="nav-link"
                                           title="<?php echo e(translate('new_Products_Requests')); ?>"
                                           href="<?php echo e(route('admin.products.list',['seller', 'status'=>'0'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('new_Products_Requests')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(getVendorProductsCount('new-product')); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <?php if(getWebConfig(name: 'product_wise_shipping_cost_approval')==1): ?>
                                        <li class="nav-item <?php echo e(Request::is('admin/products/'.Product::UPDATED_PRODUCT_LIST[URI])?'active':''); ?>">
                                            <a class="nav-link text-capitalize" title="<?php echo e(translate('product_update_requests')); ?>"
                                               href="<?php echo e(route('admin.products.updated-product-list')); ?>">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate text-capitalize"><?php echo e(Str::limit(translate('product_update_requests'), 18, '...')); ?>

                                                    <span class="badge badge-soft-info badge-pill ml-1">
                                                        <?php echo e(getVendorProductsCount('product-updated-request')); ?>

                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item <?php echo e(str_contains(url()->current().'?status='.request()->get('status'),'/admin/products/'.Product::LIST[URI].'/seller?status=1')==1?'active':''); ?>">
                                        <a class="nav-link"
                                           title="<?php echo e(translate('approved_Products')); ?>"
                                           href="<?php echo e(route('admin.products.list',['seller', 'status'=>'1'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('approved_Products')); ?>

                                                 <span class="badge badge-soft-success badge-pill ml-1">
                                                    <?php echo e(getVendorProductsCount('approved')); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(str_contains(url()->current().'?status='.request()->get('status'),'/admin/products/'.Product::LIST[URI].'/seller?status=2')==1?'active':''); ?>">
                                        <a class="nav-link"
                                           title="<?php echo e(translate('denied_Products')); ?>"
                                           href="<?php echo e(route('admin.products.list',['seller', 'status'=>'2'])); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('denied_Products')); ?>

                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                    <?php echo e(getVendorProductsCount('denied')); ?>

                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if(Helpers::module_permission_check('promotion_management')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/banner*') || (Request::is('admin/coupon*')) || (Request::is('admin/notification*')) || (Request::is('admin/deal*')))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(translate('promotion_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/banner*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.banner.list')); ?>" title="<?php echo e(translate('banner_Setup')); ?>">
                                    <i class="tio-photo-square-outlined nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('banner_Setup')); ?></span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/coupon*') || Request::is('admin/deal*')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('offers_&_Deals')); ?>">
                                    <i class="tio-users-switch nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('offers_&_Deals')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/coupon*') || Request::is('admin/deal*'))?'block':'none'); ?>">
                                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/coupon*')?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.coupon.add')); ?>"
                                           title="<?php echo e(translate('coupon')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('coupon')); ?></span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/deal/'.FlashDeal::LIST[URI]) || (Request::is('admin/deal/'.FlashDeal::UPDATE[URI].'*')))?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.deal.flash')); ?>"
                                           title="<?php echo e(translate('flash_Deals')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span
                                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('flash_Deals')); ?></span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/deal/'.DealOfTheDay::LIST[URI]) || (Request::is('admin/deal/'.DealOfTheDay::UPDATE[URI].'*')))?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.deal.day')); ?>"
                                           title="<?php echo e(translate('deal_of_the_day')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('deal_of_the_day')); ?>

                                        </span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/deal/'.FeatureDeal::LIST[URI]) || Request::is('admin/deal/'.FeatureDeal::UPDATE[URI].'*'))?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.deal.feature')); ?>"
                                           title="<?php echo e(translate('featured_Deal')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('featured_Deal')); ?>

                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/notification*') ||  Request::is('admin/push-notification/*')  ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('notifications')); ?>">
                                    <i class="tio-users-switch nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('notifications')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/notification*') || Request::is('admin/push-notification/*')) ? 'block':'none'); ?>">
                                    <li class="navbar-vertical-aside-has-menu <?php echo e(!Request::is('admin/notification/push') && Request::is('admin/notification*')?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.notification.index')); ?>"
                                           title="<?php echo e(translate('send_notification')); ?>">
                                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/send-notification.svg')); ?>"
                                                alt="<?php echo e(translate('send_notification_svg')); ?>" width="15" class="mr-2">
                                            <span
                                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                            <?php echo e(translate('send_notification')); ?>

                                        </span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/business-settings/'.PushNotification::INDEX[URI])|| Request::is('admin/push-notification/'.PushNotification::FIREBASE_CONFIGURATION[URI]) || Request::is('admin/push-notification/'.PushNotification::INDEX[URI]))?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link text-capitalize"
                                           href="<?php echo e(route('admin.push-notification.index')); ?>"
                                           title="<?php echo e(translate('push_notifications_setup')); ?>">
                                            <img
                                                src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/push-notification.svg')); ?>"
                                                alt="<?php echo e(translate('push_notification_svg')); ?>" width="15" class="mr-2">
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                            <?php echo e(translate('push_notifications_setup')); ?>

                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/'.BusinessSettings::ANNOUNCEMENT[URI])?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.business-settings.announcement')); ?>"
                                   title="<?php echo e(translate('announcement')); ?>">
                                    <i class="tio-mic-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('announcement')); ?>

                                </span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if(Helpers::module_permission_check('system_settings')): ?>
                            <?php if(count(config('get_theme_routes')) > 0): ?>
                                <li class="nav-item <?php echo e((Request::is('admin/banner*') || (Request::is('admin/coupon*')) || (Request::is('admin/notification*')) || (Request::is('admin/deal*')))?'scroll-here':''); ?>">
                                    <small class="nav-subtitle"
                                           title=""><?php echo e(config('get_theme_routes')['name']); ?> <?php echo e(translate('Menu')); ?></small>
                                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                                </li>
                                <?php $__currentLoopData = config('get_theme_routes')['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($route['module_permission']) && Helpers::module_permission_check($route['module_permission'])): ?>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is($route['path']) || Request::is($route['path'].'*')) ? 'active':''); ?> <?php $__currentLoopData = $route['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e((Request::is($sub_route['path']) || Request::is($sub_route['path'].'*')) ? 'active':''); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link <?php echo e(count($route['route_list']) > 0 ? 'nav-link-toggle':''); ?>"
                                           href="<?php echo e(count($route['route_list']) > 0 ? 'javascript:':$route['url']); ?>"
                                           title="<?php echo e(translate('offers_&_Deals')); ?>">
                                            <?php echo $route['icon']; ?>

                                            <span
                                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate($route['name'])); ?></span>
                                        </a>

                                        <?php if(count($route['route_list']) > 0): ?>
                                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                                style="display: <?php $__currentLoopData = $route['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e((Request::is($sub_route['path']) || Request::is($sub_route['path'].'*')) ? 'block':'none'); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                                <?php $__currentLoopData = $route['route_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is($sub_route['path']) || Request::is($sub_route['path'].'*')) ? 'active':''); ?>">
                                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                                           href="<?php echo e($sub_route['url']); ?>"
                                                           title="<?php echo e(translate($sub_route['name'])); ?>">
                                                            <span class="tio-circle nav-indicator-icon"></span>
                                                            <span
                                                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate($sub_route['name'])); ?></span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(Helpers::module_permission_check('support_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/support-ticket*') || Request::is('admin/contact*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle"
                                       title=""><?php echo e(translate('help_&_support')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/messages*')?'active':''); ?>">
                                <a class="nav-link"
                                   href="<?php echo e(route('admin.messages.index', ['type' => 'customer'])); ?>">
                                    <i class="tio-chat nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('inbox')); ?>

                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/contact*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.contact.list')); ?>" title="<?php echo e(translate('messages')); ?>">
                                    <i class="tio-messages nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <span class="position-relative">
                                            <?php echo e(translate('messages')); ?>

                                            <?php ($message=\App\Models\Contact::where('seen',0)->count()); ?>
                                            <?php if($message!=0): ?>
                                                <span
                                                    class="btn-status btn-xs-status btn-status-danger position-absolute top-0 menu-status"></span>
                                            <?php endif; ?>
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/support-ticket*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.support-ticket.view')); ?>"
                                   title="<?php echo e(translate('support_Ticket')); ?>">
                                    <i class="tio-support nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <span class="position-relative">
                                    <?php echo e(translate('support_Ticket')); ?>

                                    <?php if(\App\Models\SupportTicket::where('status','open')->count()>0): ?>
                                        <span class="btn-status btn-xs-status btn-status-danger position-absolute top-0 menu-status"></span>
                                    <?php endif; ?>
                                </span>
                            </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(Helpers::module_permission_check('report')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/report/earning') || Request::is('admin/report/'.InhouseProductSale::VIEW[URI]) || Request::is('admin/report/seller-report') || Request::is('admin/report/earning') || Request::is('admin/transaction/list') || Request::is('admin/refund-section/refund-list') || Request::is('admin/stock/product-in-wishlist') || Request::is('admin/reviews*') || Request::is('admin/stock/product-stock') || Request::is('admin/transaction/wallet-bonus') || Request::is('admin/report/order')) ? 'scroll-here':''); ?>">
                                <small class="nav-subtitle" title="">
                                    <?php echo e(translate('reports_&_Analysis')); ?>

                                </small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/report/admin-earning') || Request::is('admin/report/seller-earning') || Request::is('admin/report/'.InhouseProductSale::VIEW[URI]) || Request::is('admin/report/seller-report') || Request::is('admin/report/earning') || Request::is('admin/transaction/order-transaction-list') || Request::is('admin/transaction/expense-transaction-list') || Request::is('admin/report/transaction/'.App\Enums\ViewPaths\Admin\RefundTransaction::INDEX[URI]) || Request::is('admin/transaction/wallet-bonus')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('sales_&_Transaction_Report')); ?>">
                                    <i class="tio-chart-bar-4 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('sales_&_Transaction_Report')); ?>

                            </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/report/admin-earning') || Request::is('admin/report/seller-earning') || Request::is('admin/report/'.InhouseProductSale::VIEW[URI]) || Request::is('admin/report/seller-report') || Request::is('admin/report/earning') || Request::is('admin/transaction/order-transaction-list') || Request::is('admin/transaction/expense-transaction-list') || Request::is('admin/report/transaction/'.App\Enums\ViewPaths\Admin\RefundTransaction::INDEX[URI]) || Request::is('admin/transaction/wallet-bonus')) ?'block':'none'); ?>">
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/report/admin-earning') || Request::is('admin/report/seller-earning'))?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.report.admin-earning')); ?>"
                                           title="<?php echo e(translate('Earning_Reports')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                       <?php echo e(translate('Earning_Reports')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/report/'.InhouseProductSale::VIEW[URI])?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.report.inhouse-product-sale')); ?>"
                                           title="<?php echo e(translate('inhouse_Sales')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                        <?php echo e(translate('inhouse_Sales')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/report/seller-report')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.report.seller-report')); ?>"
                                           title="<?php echo e(translate('vendor_Sales')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate text-capitalize">
                                        <?php echo e(translate('vendor_Sales')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/transaction/order-transaction-list') || Request::is('admin/transaction/expense-transaction-list') || Request::is('admin/transaction/refund-transaction-list') || Request::is('admin/report/transaction/'.App\Enums\ViewPaths\Admin\RefundTransaction::INDEX[URI]) || Request::is('admin/transaction/wallet-bonus'))?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.transaction.order-transaction-list')); ?>"
                                           title="<?php echo e(translate('transaction_Report')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                     <?php echo e(translate('transaction_Report')); ?>

                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/report/all-product') ||Request::is('admin/stock/product-in-wishlist') || Request::is('admin/stock/product-stock')) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.all-product')); ?>" title="<?php echo e(translate('product_Report')); ?>">
                                    <i class="tio-chart-bar-4 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            <span class="position-relative">
                                <?php echo e(translate('product_Report')); ?>

                            </span>
                        </span>
                                </a>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/report/order')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link"
                                   href="<?php echo e(route('admin.report.order')); ?>"
                                   title="<?php echo e(translate('order_Report')); ?>">
                                    <i class="tio-chart-bar-1 nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                <?php echo e(translate('order_Report')); ?>

                            </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(Helpers::module_permission_check('user_section')): ?>
                            <li class="nav-item <?php echo e((Request::is('admin/customer/'.Customer::LIST[URI]) || Request::is('admin/customer/'.Customer::VIEW[URI].'*') || Request::is('admin/customer/'.Customer::SUBSCRIBER_LIST[URI])||Request::is('admin/sellers/'.Vendor::ADD[URI]) || Request::is('admin/sellers/'.Vendor::LIST[URI]) || Request::is('admin/delivery-man*'))?'scroll-here':''); ?>">
                                <small class="nav-subtitle" title=""><?php echo e(translate('user_management')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/customer/wallet*') || Request::is('admin/customer/'.Customer::LIST[URI]) || Request::is('admin/customer/'.Customer::VIEW[URI].'*') || Request::is('admin/reviews*') || Request::is('admin/customer/loyalty/'.Customer::LOYALTY_REPORT[URI]))?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('customers')); ?>">
                                    <i class="tio-wallet nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('customers')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((Request::is('admin/customer/wallet*') || Request::is('admin/customer/'.Customer::LIST[URI]) || Request::is('admin/customer/'.Customer::VIEW[URI].'*') || Request::is('admin/reviews*') || Request::is('admin/customer/loyalty/'.Customer::LOYALTY_REPORT[URI]))?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/customer/'.Customer::LIST[URI]) || Request::is('admin/customer/'.Customer::VIEW[URI].'*')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.customer.list')); ?>"
                                           title="<?php echo e(translate('Customer_List')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('customer_List')); ?> </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/reviews*')?'active':''); ?>">
                                        <a class="nav-link"
                                           href="<?php echo e(route('admin.reviews.list')); ?>"
                                           title="<?php echo e(translate('customer_Reviews')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('customer_Reviews')); ?>

                                </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/customer/wallet/'.CustomerWallet::REPORT[URI])?'active':''); ?>">
                                        <a class="nav-link" title="<?php echo e(translate('wallet')); ?>"
                                           href="<?php echo e(route('admin.customer.wallet.report')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                        <?php echo e(translate('wallet')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/customer/wallet/'.CustomerWallet::BONUS_SETUP[URI])?'active':''); ?>">
                                        <a class="nav-link" title="<?php echo e(translate('wallet_Bonus_Setup')); ?>"
                                           href="<?php echo e(route('admin.customer.wallet.bonus-setup')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                        <?php echo e(translate('wallet_Bonus_Setup')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/customer/loyalty/'.Customer::LOYALTY_REPORT[URI])?'active':''); ?>">
                                        <a class="nav-link" title="<?php echo e(translate('loyalty_Points')); ?>"
                                           href="<?php echo e(route('admin.customer.loyalty.report')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                        <?php echo e(translate('loyalty_Points')); ?>

                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/seller*') || Request::is('admin/sellers/withdraw-method/*') ? 'active' : ''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('vendors')); ?>">
                                    <i class="tio-users-switch nav-icon"></i>
                                    <span
                                        class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate"><?php echo e(translate('vendors')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/seller*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/sellers/'.Vendor::ADD[URI])?'active':''); ?>">
                                        <a class="nav-link" title="<?php echo e(translate('add_New_Vendor')); ?>"
                                           href="<?php echo e(route('admin.sellers.add')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                        <?php echo e(translate('add_New_Vendor')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sellers/'.Vendor::LIST[URI]) ||Request::is('admin/sellers/'.Vendor::VIEW[URI].'*') ?'active':''); ?>">
                                        <a class="nav-link" title="<?php echo e(translate('vendor_List')); ?>"
                                           href="<?php echo e(route('admin.sellers.seller-list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                        <?php echo e(translate('vendor_List')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/sellers/'.Vendor::WITHDRAW_LIST[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sellers.withdraw_list')); ?>"
                                           title="<?php echo e(translate('withdraws')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('withdraws')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e((Request::is('admin/sellers/withdraw-method/*'))?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.sellers.withdraw-method.list')); ?>"
                                           title="<?php echo e(translate('withdrawal_Methods')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('withdrawal_Methods')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/delivery-man*')?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle text-capitalize"
                                   href="javascript:" title="<?php echo e(translate('delivery_men')); ?>">
                                    <i class="tio-user nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                                <?php echo e(translate('delivery_men')); ?>

                            </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/delivery-man*')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/delivery-man/'.DeliveryMan::ADD[URI])?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.delivery-man.add')); ?>"
                                           title="<?php echo e(translate('add_new')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('add_new')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/delivery-man/'.DeliveryMan::LIST[URI])|| Request::is('admin/delivery-man/'.DeliveryMan::UPDATE[URI].'*')  || Request::is('admin/delivery-man/'.DeliveryMan::EARNING_STATEMENT_OVERVIEW[URI].'*') || Request::is('admin/delivery-man/'.DeliveryMan::ORDER_HISTORY_LOG[URI].'*') || Request::is('admin/delivery-man/'.DeliveryMan::EARNING_OVERVIEW[URI].'*')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.delivery-man.list')); ?>"
                                           title="<?php echo e(translate('list')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('list')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/messages/'.Chatting::INDEX[URI].'/delivery-man')?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.messages.index', ['type' => 'delivery-man'])); ?>"
                                           title="<?php echo e(translate('chat')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('chat')); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/delivery-man/'.DeliverymanWithdraw::LIST[URI]) || Request::is('admin/delivery-man/'.DeliverymanWithdraw::VIEW[URI].'*')?'active':''); ?>">
                                        <a class="nav-link " href="<?php echo e(route('admin.delivery-man.withdraw-list')); ?>"
                                           title="<?php echo e(translate('withdraws')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('withdraws')); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item <?php echo e(Request::is('admin/delivery-man/emergency-contact')?'active':''); ?>">
                                        <a class="nav-link "
                                           href="<?php echo e(route('admin.delivery-man.emergency-contact.index')); ?>"
                                           title="<?php echo e(translate('emergency_contact')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate"><?php echo e(translate('Emergency_Contact')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <?php if(auth('admin')->user()->admin_role_id==1): ?>
                                <li class="navbar-vertical-aside-has-menu <?php echo e((Request::is('admin/employee*') || Request::is('admin/custom-role*'))?'active':''); ?>">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                       href="javascript:" title="<?php echo e(translate('employees')); ?>">
                                        <i class="tio-user nav-icon"></i>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                            <?php echo e(translate('employees')); ?>

                                        </span>
                                    </a>
                                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                        style="display: <?php echo e(Request::is('admin/employee*') || Request::is('admin/custom-role*')?'block':'none'); ?>">
                                        <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/custom-role*')?'active':''); ?>">
                                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                                               href="<?php echo e(route('admin.custom-role.create')); ?>"
                                               title="<?php echo e(translate('employee_Role_Setup')); ?>">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span
                                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('employee_Role_Setup')); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item <?php echo e((Request::is('admin/employee/'.Employee::LIST[URI]) || Request::is('admin/employee/'.Employee::ADD[URI]) || Request::is('admin/employee/'.Employee::UPDATE[URI].'*'))?'active':''); ?>">
                                            <a class="nav-link" href="<?php echo e(route('admin.employee.list')); ?>"
                                               title="<?php echo e(translate('employees')); ?>">
                                                <span class="tio-circle nav-indicator-icon"></span>
                                                <span class="text-truncate"><?php echo e(translate('employees')); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/customer/'.Customer::SUBSCRIBER_LIST[URI])?'active':''); ?>">
                                <a class="nav-link " href="<?php echo e(route('admin.customer.subscriber-list')); ?>"
                                   title="<?php echo e(translate('subscribers')); ?>">
                                    <span class="tio-user nav-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('subscribers')); ?> </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(Helpers::module_permission_check('system_settings')): ?>
                            <li class="nav-item <?php echo e((
                                Request::is('admin/business-settings/web-config') ||
                                Request::is('admin/product-settings')||
                                Request::is('admin/business-settings/'.SocialMedia::VIEW[URI]) ||
                                Request::is('admin/business-settings/web-config/'.BusinessSettings::APP_SETTINGS[URI]) ||
                                Request::is('admin/business-settings/'.Pages::TERMS_CONDITION[URI]) ||
                                Request::is('admin/business-settings/'.Pages::VIEW[URI].'*') ||
                                Request::is('admin/business-settings/'.Pages::PRIVACY_POLICY[URI]) ||
                                Request::is('admin/business-settings/'.Pages::ABOUT_US[URI]) ||
                                Request::is('admin/helpTopic/'.HelpTopic::LIST[URI]) ||
                                Request::is('admin/business-settings/'.PushNotification::INDEX[URI]) ||
                                Request::is('admin/business-settings/'.Mail::VIEW[URI])||
                                Request::is('admin/business-settings/web-config/'.BusinessSettings::LOGIN_URL_SETUP[URI]) ||
                                Request::is('admin/business-settings/web-config/'.DatabaseSetting::VIEW[URI]) ||
                                Request::is('admin/business-settings/web-config/'.EnvironmentSettings::VIEW[URI]) ||
                                Request::is('admin/business-settings/'.BusinessSettings::INDEX[URI]) ||
                                Request::is('admin/business-settings/'.BusinessSettings::COOKIE_SETTINGS[URI]) ||
                                Request::is('admin/business-settings/'.BusinessSettings::OTP_SETUP[URI]) ||
                                Request::is('admin/system-settings/'.SoftwareUpdate::VIEW[URI]) ||
                                Request::is('admin/business-settings/web-config/theme/'.ThemeSetup::VIEW[URI]) ||
                                Request::is('admin/business-settings/shipping-method/'.ShippingMethod::UPDATE[URI].'*') ||
                                Request::is('admin/business-settings/shipping-method/'.ShippingMethod::INDEX[URI]) ||
                                Request::is('admin/business-settings/delivery-restriction') ||
                                Request::is('admin/addon')) ? 'scroll-here' : ''); ?>">

                                <small class="nav-subtitle"
                                       title=""><?php echo e(translate('system_Settings')); ?></small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>

                            <li class="navbar-vertical-aside-has-menu">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('business_Setup')); ?>">
                                    <i class="tio-pages-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('business_Setup')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((
                                        Request::is('admin/business-settings/web-config') ||
                                        Request::is('admin/product-settings')||
                                        Request::is('admin/product-settings/'.InhouseShop::VIEW[URI]) ||
                                        Request::is('admin/business-settings/payment-method/'.PaymentMethod::PAYMENT_OPTION[URI])||
                                        Request::is('admin/business-settings/seller-settings') ||
                                        Request::is('admin/customer/'.Customer::SETTINGS[URI]) ||
                                        Request::is('admin/business-settings/delivery-man-settings') ||
                                        Request::is('admin/business-settings/shipping-method/'.ShippingMethod::UPDATE[URI].'*') ||
                                        Request::is('admin/business-settings/shipping-method/'.ShippingMethod::INDEX[URI]) ||
                                        Request::is('admin/business-settings/order-settings/index') ||
                                        Request::is('admin/'.BusinessSettings::PRODUCT_SETTINGS[URI]) ||
                                        Request::is('admin/business-settings/delivery-restriction'))?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e((
                                            Request::is('admin/business-settings/web-config') ||
                                            Request::is('admin/product-settings')||
                                            Request::is('admin/business-settings/payment-method/'.PaymentMethod::PAYMENT_OPTION[URI]) ||
                                            Request::is('admin/business-settings/seller-settings') ||
                                            Request::is('admin/customer/'.Customer::SETTINGS[URI]) ||
                                            Request::is('admin/business-settings/delivery-man-settings') ||
                                            Request::is('admin/business-settings/shipping-method/'.ShippingMethod::UPDATE[URI].'*') ||
                                            Request::is('admin/business-settings/shipping-method/'.ShippingMethod::INDEX[URI]) ||
                                            Request::is('admin/business-settings/order-settings/index') ||
                                            Request::is('admin/'.BusinessSettings::PRODUCT_SETTINGS[URI]) ||
                                            Request::is('admin/business-settings/delivery-restriction'))?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.web-config.index')); ?>"
                                           title="<?php echo e(translate('business_Settings')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('business_Settings')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/product-settings/'.InhouseShop::VIEW[URI]) ? 'active' : ''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.product-settings.inhouse-shop')); ?>"
                                           title="<?php echo e(translate('in-house_Shop')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('in-house_Shop')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-vertical-aside-has-menu ">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('system_Setup')); ?>">
                                    <i class="tio-pages-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('system_Setup')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e((
                                        Request::is('admin/business-settings/web-config/'.EnvironmentSettings::VIEW[URI]) ||
                                        Request::is('admin/business-settings/web-config/'.SiteMap::VIEW[URI]) ||
                                        Request::is('admin/currency/'.Currency::LIST[URI]) ||
                                        Request::is('admin/currency/'.Currency::UPDATE[URI].'*') ||
                                        Request::is('admin/business-settings/web-config/'.DatabaseSetting::VIEW[URI]) ||
                                        Request::is('admin/business-settings/language*') ||
                                        Request::is('admin/business-settings/web-config/theme/'.ThemeSetup::VIEW[URI])  ||
                                        Request::is('admin/business-settings/web-config/'.BusinessSettings::LOGIN_URL_SETUP[URI])  ||
                                        Request::is('admin/system-settings/'.SoftwareUpdate::VIEW[URI]) ||
                                        Request::is('admin/business-settings/'.BusinessSettings::COOKIE_SETTINGS[URI]) ||
                                        Request::is('admin/business-settings/'.BusinessSettings::OTP_SETUP[URI]) ||
                                        Request::is('admin/business-settings/web-config/'.BusinessSettings::APP_SETTINGS[URI]) ||
                                        Request::is('admin/addon'))?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e((
                                            Request::is('admin/business-settings/web-config/'.EnvironmentSettings::VIEW[URI]) ||
                                            Request::is('admin/business-settings/web-config/'.SiteMap::VIEW[URI]) ||
                                            Request::is('admin/currency/'.Currency::LIST[URI]) ||
                                            Request::is('admin/currency/'.Currency::UPDATE[URI].'*') ||
                                            Request::is('admin/business-settings/web-config/'.DatabaseSetting::VIEW[URI]) ||
                                            Request::is('admin/business-settings/language*') ||
                                            Request::is('admin/system-settings/'.SoftwareUpdate::VIEW[URI]) ||
                                            Request::is('admin/business-settings/'.BusinessSettings::COOKIE_SETTINGS[URI]) ||
                                            Request::is('admin/business-settings/web-config/'.BusinessSettings::APP_SETTINGS[URI]) ||
                                            Request::is('admin/business-settings/delivery-restriction'))?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.web-config.environment-setup')); ?>"
                                           title="<?php echo e(translate('system_Settings')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('system_Settings')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/web-config/'.BusinessSettings::LOGIN_URL_SETUP[URI])  ||
                                            Request::is('admin/business-settings/'.BusinessSettings::OTP_SETUP[URI]) ? 'active' : ''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.otp-setup')); ?>"
                                           title="<?php echo e(translate('login_Settings')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('login_Settings')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item <?php echo e(Request::is('admin/addon') ||
                                        Request::is('admin/business-settings/web-config/theme/'.ThemeSetup::VIEW[URI]) ? 'active' : ''); ?>"
                                    >
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.web-config.theme.setup')); ?>"
                                           title="<?php echo e(translate('themes_&_Addons')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('themes_&_Addons')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                                   title="<?php echo e(translate('3rd_Party')); ?>">
                                    <span class="tio-key nav-icon"></span>
                                    <span class="text-truncate"><?php echo e(translate('3rd_Party')); ?></span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/business-settings/mail'.Mail::VIEW[URI]) ||
                                            Request::is('admin/business-settings/offline-payment-method/'.OfflinePaymentMethod::INDEX[URI]) ||
                                            Request::is('admin/business-settings/offline-payment-method/'.OfflinePaymentMethod::ADD[URI]) ||
                                            Request::is('admin/business-settings/offline-payment-method/'.OfflinePaymentMethod::UPDATE[URI].'/*')||
                                            Request::is('admin/business-settings/'.SMSModule::VIEW[URI]) ||
                                            Request::is('admin/business-settings/'.Recaptcha::VIEW[URI]) ||
                                            Request::is('admin/social-login/'.SocialLoginSettings::VIEW[URI]) ||
                                            Request::is('admin/social-media-chat/'.SocialMediaChat::VIEW[URI]) ||
                                            Request::is('admin/business-settings/'.GoogleMapAPI::VIEW[URI]) ||
                                            Request::is('admin/business-settings/payment-method') ||
                                            Request::is('admin/business-settings/'.BusinessSettings::ANALYTICS_INDEX[URI]) ||
                                            Request::is('admin/business-settings/payment-method/offline-payment*') ? 'block':'none'); ?>">
                                    <li class="nav-item <?php echo e(Request::is('admin/business-settings/payment-method') ||
                                            Request::is('admin/business-settings/payment-method/offline-payment*')||
                                            Request::is('admin/business-settings/offline-payment-method/'.OfflinePaymentMethod::INDEX[URI]) ||
                                            Request::is('admin/business-settings/offline-payment-method/'.OfflinePaymentMethod::ADD[URI])||
                                            Request::is('admin/business-settings/offline-payment-method/'.OfflinePaymentMethod::UPDATE[URI].'/*') ?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.payment-method.index')); ?>"
                                           title="<?php echo e(translate('payment_methods')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                              <?php echo e(translate('payment_methods')); ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu
                                    <?php echo e(Request::is('admin/business-settings/mail'.Mail::VIEW[URI]) ||
                                        Request::is('admin/business-settings/'.SMSModule::VIEW[URI]) ||
                                        Request::is('admin/business-settings/'.Recaptcha::VIEW[URI]) ||
                                        Request::is('admin/social-login/'.SocialLoginSettings::VIEW[URI]) ||
                                        Request::is('admin/social-media-chat/'.SocialMediaChat::VIEW[URI]) ||
                                        Request::is('admin/business-settings/'.BusinessSettings::ANALYTICS_INDEX[URI]) ||
                                        Request::is('admin/business-settings/'.GoogleMapAPI::VIEW[URI])?'active':''); ?>

                                    ">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.social-media-chat.view')); ?>"
                                           title="<?php echo e(translate('other_Configurations')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                                <?php echo e(translate('other_Configurations')); ?>

                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e((
                                Request::is('admin/business-settings/'.Pages::TERMS_CONDITION[URI]) ||
                                Request::is('admin/business-settings/'.Pages::VIEW[URI].'*') ||
                                Request::is('admin/business-settings/'.Pages::PRIVACY_POLICY[URI]) ||
                                Request::is('admin/business-settings/'.Pages::ABOUT_US[URI]) ||
                                Request::is('admin/helpTopic/'.HelpTopic::LIST[URI]) ||
                                Request::is('admin/business-settings/'.FeaturesSection::VIEW[URI]) ||
                                Request::is('admin/business-settings/'.FeaturesSection::COMPANY_RELIABILITY[URI])) ?'active':''); ?>">
                                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                   href="javascript:" title="<?php echo e(translate('Pages_&_Media')); ?>">
                                    <i class="tio-pages-outlined nav-icon"></i>
                                    <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('Pages_&_Media')); ?>

                                    </span>
                                </a>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                    style="display: <?php echo e(Request::is('admin/business-settings/terms-condition') || Request::is('admin/business-settings/page*') || Request::is('admin/business-settings/privacy-policy') || Request::is('admin/business-settings/about-us') || Request::is('admin/helpTopic/list') || Request::is('admin/business-settings/social-media') || Request::is('admin/file-manager*') || Request::is('admin/business-settings/features-section')?'block':'none'); ?>">
                                    <li class="nav-item <?php echo e((
                                        Request::is('admin/business-settings/'.Pages::TERMS_CONDITION[URI]) ||
                                        Request::is('admin/business-settings/'.Pages::VIEW[URI].'*') ||
                                        Request::is('admin/business-settings/'.Pages::PRIVACY_POLICY[URI]) ||
                                        Request::is('admin/business-settings/'.Pages::ABOUT_US[URI]) ||
                                        Request::is('admin/helpTopic/'.HelpTopic::LIST[URI]) ||
                                        Request::is('admin/business-settings/'.FeaturesSection::VIEW[URI]) ||
                                        Request::is('admin/business-settings/'.FeaturesSection::COMPANY_RELIABILITY[URI]))?'active':''); ?>">
                                        <a class="nav-link" href="<?php echo e(route('admin.business-settings.terms-condition')); ?>"
                                           title="<?php echo e(translate('business_Pages')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">
                                      <?php echo e(translate('business_Pages')); ?>

                                    </span>
                                        </a>
                                    </li>
                                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/business-settings/'.SocialMedia::VIEW[URI])?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.business-settings.social-media')); ?>"
                                           title="<?php echo e(translate('social_Media_Links')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    <?php echo e(translate('social_Media_Links')); ?>

                                </span>
                                        </a>
                                    </li>

                                    <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/file-manager*')?'active':''); ?>">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                                           href="<?php echo e(route('admin.file-manager.index')); ?>"
                                           title="<?php echo e(translate('gallery')); ?>">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('gallery')); ?>

                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="navbar-vertical-aside-has-menu <?php echo e(Request::is('admin/react')?'active':''); ?>">
                                <a class="nav-link text-capitalize" href="<?php echo e(route('admin.react.index')); ?>"
                                   title="<?php echo e(translate('React_website_configuration')); ?>">
                                    <span class="tio-rear-window-defrost nav-icon"></span>
                                    <span class="text-truncate text-capitalize"><?php echo e(Str::limit(translate('React_website_configuration'), 22, '...')); ?></span>
                                </a>
                            </li>

                            <?php if(count(config('addon_admin_routes'))>0): ?>
                                <li class="navbar-vertical-aside-has-menu
                                <?php $__currentLoopData = config('addon_admin_routes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(strstr(Request::url(), $route['path'])?'active':''); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ">
                                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                                       href="javascript:" title="<?php echo e(translate('Pages_&_Media')); ?>">
                                        <i class="tio-puzzle nav-icon"></i>
                                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                        <?php echo e(translate('addon_Menus')); ?>

                                    </span>
                                    </a>
                                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                        style="display:
                                    <?php $__currentLoopData = config('addon_admin_routes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e(strstr(Request::url(), $route['path'])?'block':''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    ">
                                        <?php $__currentLoopData = config('addon_admin_routes'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="navbar-vertical-aside-has-menu <?php echo e(strstr(Request::url(), $route['path'])?'active':''); ?>">

                                                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                                                       href="<?php echo e($route['url']); ?>"
                                                       title="<?php echo e(translate($route['name'])); ?>">
                                                        <span class="tio-circle nav-indicator-icon"></span>
                                                        <span
                                                            class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                                        <?php echo e(translate($route['name'])); ?>

                                                    </span>
                                                    </a>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="nav-item pt-5">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>
<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/partials/_side-bar.blade.php ENDPATH**/ ?>