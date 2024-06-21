<?php
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Str;
    use Illuminate\Support\Carbon;
?>
<?php ($direction = Session::get('direction')); ?>
<div id="headerMain" class="d-none">
    <header id="header"
            class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper d-none d-sm-block d-xl-none">
                <?php ($shop=\App\Models\Shop::where(['seller_id'=>auth('seller')->id()])->first()); ?>
                <a class="navbar-brand" href="<?php echo e(route('vendor.dashboard.index')); ?>" aria-label="">
                    <?php if(isset($shop)): ?>
                        <img class="navbar-brand-logo"
                             src="<?php echo e(getValidImage('storage/app/public/shop/'.$shop->image,type:'backend-logo')); ?>" alt="<?php echo e(translate('logo')); ?>"
                             height="40">
                        <img class="navbar-brand-logo-mini"
                             src="<?php echo e(getValidImage('storage/app/public/shop/'.$shop->image,type:'backend-logo')); ?>"
                             alt="<?php echo e(translate('logo')); ?>" height="40">

                    <?php else: ?>
                        <img class="navbar-brand-logo-mini"
                             src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/160x160/img1.jpg')); ?>"
                             alt="<?php echo e(translate('logo')); ?>" height="40">
                    <?php endif; ?>
                </a>
            </div>
            <div class="navbar-nav-wrap-content-left">
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-sm-3 d-xl-none">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                       data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-toggle="tooltip" data-placement="right" title="Expand"></i>
                </button>
                <div class="d-none">
                    <form class="position-relative">
                    </form>
                </div>
            </div>
            <div class="navbar-nav-wrap-content-right"
                 style="<?php echo e($direction === "rtl" ? 'margin-left:unset; margin-right: auto' : 'margin-right:unset; margin-left: auto'); ?>">
                <ul class="navbar-nav align-items-center flex-row gap-xl-16px">

                    <li class="nav-item">
                        <div class="hs-unfold">
                            <div>
                                <?php ( $local = session()->has('local')?session('local'):'en'); ?>
                                <?php ($lang = \App\Models\BusinessSetting::where('type', 'language')->first()); ?>
                                <div
                                    class="topbar-text dropdown disable-autohide <?php echo e($direction === "rtl" ? 'ml-3' : 'm-1'); ?> text-capitalize">
                                    <a class="topbar-link dropdown-toggle text-black d-flex align-items-center title-color"
                                       href="javascript:" data-toggle="dropdown"
                                    >
                                        <?php $__currentLoopData = json_decode($lang['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data['code']==$local): ?>
                                                <img class="<?php echo e($direction === "rtl" ? 'ml-2' : 'mr-2'); ?>" width="20"
                                                     src="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/flags/'.$data['code'].'.png')); ?>"
                                                     alt="<?php echo e($data['name']); ?>">
                                                    <span class="d-none d-sm-block"><?php echo e($data['name']); ?></span>
                                                    <span class="d-sm-none"><?php echo e($data['code']); ?></span>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </a>
                                    <ul class="dropdown-menu position-absolute">
                                        <?php $__currentLoopData = json_decode($lang['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data['status']==1): ?>
                                                <li class="change-language" data-action="<?php echo e(route('change-language')); ?>" data-language-code="<?php echo e($data['code']); ?>">
                                                    <a class="dropdown-item pb-1" href="javascript:">
                                                        <img class="<?php echo e($direction === "rtl" ? 'ml-2' : 'mr-2'); ?>"
                                                            width="20"
                                                            src="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/flags/'.$data['code'].'.png')); ?>"
                                                            alt="<?php echo e($data['name']); ?>"/>
                                                        <span class="text-capitalize"><?php echo e($data['name']); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a title="<?php echo e(translate('website_shop_view')); ?>"
                               class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="<?php echo e(route('shopView',['id'=>auth('seller')->id()])); ?>" target="_blank">
                                <i class="tio-globe"></i>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a
                                class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle media align-items-center gap-3 navbar-dropdown-account-wrapper dropdown-toggle-left-arrow dropdown-toggle-empty"
                                href="javascript:"
                                data-hs-unfold-options='{
                                     "target": "#notificationDropdown",
                                     "type": "css-animation"
                                   }'>
                                <i class="tio-notifications-on-outlined"></i>
                                <?php ($notification=App\Models\Notification::whereBetween('created_at', [auth('seller')->user()->created_at, Carbon::now()])->where('sent_to', 'seller')->whereDoesntHave('notificationSeenBy')->count()); ?>
                                <?php if($notification!=0): ?>
                                    <span
                                        class="btn-status btn-sm-status btn-status-danger notification_data_new_count"><?php echo e($notification); ?></span>
                                <?php endif; ?>
                            </a>
                            <div id="notificationDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account py-0 overflow-hidden width--20rem">
                                <?php ($notification_data=App\Models\Notification::whereBetween('created_at', [auth('seller')->user()->created_at, Carbon::now()])->where('sent_to', 'seller')->with('notificationSeenBy')->latest()->get()); ?>
                                <?php $__currentLoopData = $notification_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button class="dropdown-item position-relative notification-data-view"
                                            data-id="<?php echo e($item->id); ?>">
                                    <span class="text-truncate pr-2 d-block"
                                          title="Settings"><?php echo e(translate($item->title)); ?></span>
                                        <span class="fs-10"><?php echo e($item->created_at->diffforHumans()); ?></span>
                                        <?php if($item->notification_seen_by == null): ?>
                                            <span class="badge-soft-danger float-right small py-1 px-2 rounded notification_data_new_badge<?php echo e($item->id); ?>"><?php echo e(translate('new')); ?></span>
                                        <?php endif; ?>
                                    </button>
                                    <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a
                                class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle media align-items-center gap-3 navbar-dropdown-account-wrapper dropdown-toggle dropdown-toggle-left-arrow"
                                href="javascript:"
                                data-hs-unfold-options='{
                                     "target": "#messageDropdown",
                                     "type": "css-animation"
                                   }'
                            >
                                <i class="tio-email"></i>
                                <?php ($message=\App\Models\Chatting::where(['seen_by_seller'=>0, 'seller_id'=>auth('seller')->id()])->count()); ?>
                                <?php if($message!=0): ?>
                                    <span class="btn-status btn-sm-status btn-status-danger"><?php echo e($message); ?></span>
                                <?php endif; ?>
                            </a>
                            <div id="messageDropdown"
                                 class="hs-unfold-content width--16rem dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account">
                                <a class="dropdown-item position-relative"
                                   href="<?php echo e(route('vendor.messages.index', ['type' => 'customer'])); ?>">
                                    <span class="text-truncate pr-2"
                                          title="Settings"><?php echo e(translate('customer')); ?></span>
                                    <?php ($messageCustomer=\App\Models\Chatting::where(['seen_by_seller'=>0, 'seller_id'=>auth('seller')->id()])->whereNotNull(['user_id'])->count()); ?>
                                    <?php if($messageCustomer > 0): ?>
                                        <span
                                            class="btn-status btn-sm-status-custom btn-status-danger"><?php echo e($messageCustomer); ?></span>
                                    <?php endif; ?>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item position-relative"
                                   href="<?php echo e(route('vendor.messages.index', ['type' => 'delivery-man'])); ?>">
                                    <span class="text-truncate pr-2"
                                          title="Settings"><?php echo e(translate('delivery_man')); ?></span>
                                    <?php ($messageDeliveryMan =\App\Models\Chatting::where(['seen_by_seller'=>0, 'seller_id'=>auth('seller')->id()])->whereNotNull(['delivery_man_id'])->count()); ?>
                                    <?php if($messageDeliveryMan > 0): ?>
                                        <span class="btn-status btn-sm-status-custom btn-status-danger"><?php echo e($messageDeliveryMan); ?></span>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="<?php echo e(route('vendor.orders.list',['pending'])); ?>">
                                <i class="tio-shopping-cart-outlined"></i>
                                <?php ($order=\App\Models\Order::where(['seller_is'=>'seller','seller_id'=>auth('seller')->id(), 'order_status'=>'pending'])->count()); ?>
                                <?php if($order!=0): ?>
                                    <span class="btn-status btn-sm-status btn-status-danger"><?php echo e($order); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker media align-items-center gap-3 navbar-dropdown-account-wrapper dropdown-toggle dropdown-toggle-left-arrow"
                               href="javascript:"
                               data-hs-unfold-options='{
                                     "target": "#accountNavbarDropdown",
                                     "type": "css-animation"
                                   }'>
                                <div class="d-none d-md-block media-body text-right">
                                    <h5 class="profile-name mb-0"><?php echo e(auth('seller')->user()->name); ?></h5>
                                    <span class="fz-12"><?php echo e(Str::limit($shop->name, 20)); ?></span>
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img"
                                         src="<?php echo e(getValidImage(path:'storage/app/public/seller/'.auth('seller')->user()->image,type:'backend-profile')); ?>"
                                         alt="<?php echo e(translate('image_description')); ?>">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>
                            <div id="accountNavbarDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account __w-16rem">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center text-break">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            <img class="avatar-img"
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/seller/'.auth('seller')->user()->image,type:'backend-profile')); ?>"
                                                 alt="<?php echo e(translate('image_description')); ?>">
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5"><?php echo e(auth('seller')->user()->f_name); ?></span>

                                            <span class="card-text"><?php echo e(auth('seller')->user()->email); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('vendor.profile.update',[auth('seller')->id()])); ?>">
                                    <span class="text-truncate pr-2" title="Settings"><?php echo e(translate('settings')); ?></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:" data-toggle="modal" data-target="#sign-out-modal">
                                    <span class="text-truncate pr-2" title="<?php echo e(translate('sign_out')); ?>"><?php echo e(translate('sign_out')); ?></span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div id="website_info" class="bg-secondary w-100 d-none">
            <div class="p-3">
                <div class="bg-white p-1 rounded">
                    <div class="topbar-text dropdown disable-autohide <?php echo e($direction === "rtl" ? 'ml-3' : 'm-1'); ?> text-capitalize">
                        <a class="topbar-link dropdown-toggle title-color d-flex align-items-center" href="#"
                           data-toggle="dropdown">
                            <?php $__currentLoopData = json_decode($lang['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data['code']==$local): ?>
                                    <img class="<?php echo e($direction === "rtl" ? 'ml-2' : 'mr-2'); ?>"  width="20"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/front-end').'/img/flags/'.$data['code']); ?>.png"
                                         alt="<?php echo e($data['name']); ?>">
                                    <?php echo e($data['name']); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php $__currentLoopData = json_decode($lang['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data['status']==1): ?>
                                    <li class="change-language" data-action="<?php echo e(route('change-language')); ?>" data-language-code="<?php echo e($data['code']); ?>">
                                        <a class="dropdown-item pb-1" href="javascript:">
                                            <img class="<?php echo e($direction === "rtl" ? 'ml-2' : 'mr-2'); ?>" width="20"
                                                src="<?php echo e(dynamicAsset(path: 'public/assets/front-end').'/img/flags/'.$data['code']); ?>.png"
                                                alt="<?php echo e($data['name']); ?>"/>
                                            <span class="text-capitalize"><?php echo e($data['name']); ?></span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="bg-white p-1 rounded mt-2">
                    <a title="<?php echo e(('website_shop_view')); ?>" class="p-2 title-color"
                       href="<?php echo e(route('shopView',['id'=>auth('seller')->id()])); ?>" target="_blank">
                        <i class="tio-globe"></i>
                        <?php echo e(translate('view_website')); ?>

                    </a>
                </div>
                <div class="bg-white p-1 rounded mt-2">
                    <a class="p-2  title-color"
                       href="<?php echo e(route('vendor.messages.index', ['type' => 'customer'])); ?>">
                        <i class="tio-email"></i>
                        <?php echo e(translate('message')); ?>

                        <?php ($message=\App\Models\Chatting::where(['seen_by_seller'=>1,'seller_id'=>auth('seller')->id()])->count()); ?>
                        <?php if($message!=0): ?>
                            <span>(<?php echo e($message); ?>)</span>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="bg-white p-1 rounded mt-2">
                    <a class="p-2 title-color"
                       href="<?php echo e(route('vendor.orders.list',['pending'])); ?>">
                        <i class="tio-shopping-cart-outlined"></i>
                        <?php echo e(translate('order_list')); ?>

                    </a>
                </div>
            </div>
        </div>
    </header>
</div>
<div id="headerFluid" class="d-none"></div>
<div id="headerDouble" class="d-none"></div>
<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/partials-seller/_header.blade.php ENDPATH**/ ?>