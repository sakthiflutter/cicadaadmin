<?php
use Illuminate\Support\Facades\Session;
?>
<?php ($direction = Session::get('direction')); ?>
<div id="headerMain" class="d-none">
    <header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container shadow">

        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper d-none d-sm-block d-xl-none">
                <?php ($ecommerceLogo = getWebConfig('company_web_logo')); ?>
                <a class="navbar-brand" href="<?php echo e(route('admin.dashboard.index')); ?>" aria-label="">
                    <img class="navbar-brand-logo"
                         src="<?php echo e(getValidImage('storage/app/public/company/'.$ecommerceLogo,type: 'backend-logo')); ?>" alt="<?php echo e(translate('logo')); ?>">
                    <img class="navbar-brand-logo-mini"
                         src="<?php echo e(getValidImage('storage/app/public/company/'.$ecommerceLogo,type: 'backend-logo')); ?>"
                         alt="<?php echo e(translate('logo')); ?>">
                </a>
            </div>
            <div class="navbar-nav-wrap-content-left">
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3 d-xl-none">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                       data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-toggle="tooltip" data-placement="right" title="Expand"></i>
                </button>
            </div>
            <div class="navbar-nav-wrap-content-right"
                 style="<?php echo e($direction == "rtl" ? 'margin-left:unset; margin-right: auto' : 'margin-right:unset; margin-left: auto'); ?>">
                <ul class="navbar-nav align-items-center flex-row gap-xl-16px">
                    <li class="nav-item">
                        <div class="hs-unfold">
                            <div>
                                <?php ( $local = session()->has('local')?session('local'):'en'); ?>
                                <?php ($lang = \App\Models\BusinessSetting::where('type', 'language')->first()); ?>
                                <div class="topbar-text dropdown disable-autohide <?php echo e($direction == "rtl" ? 'ml-3' : 'm-1'); ?> text-capitalize">
                                    <a class="topbar-link dropdown-toggle d-flex align-items-center title-color"
                                       href="javascript:" data-toggle="dropdown">
                                        <?php $__currentLoopData = json_decode($lang['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($data['code']==$local): ?>
                                                <img class="<?php echo e($direction == "rtl" ? 'ml-2' : 'mr-2'); ?>" width="20"
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
                                                    <a class="dropdown-item py-1"
                                                       href="javascript:">
                                                        <img class="<?php echo e($direction == "rtl" ? 'ml-2' : 'mr-2'); ?>" width="20"
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
                            <a title="Website home"
                               class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="<?php echo e(route('home')); ?>" target="_blank">
                                <i class="tio-globe"></i>
                            </a>
                        </div>
                    </li>

                    <?php if(\App\Utils\Helpers::module_permission_check('support_section')): ?>
                        <li class="nav-item">
                            <!-- Notification -->
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                                   href="<?php echo e(route('admin.contact.list')); ?>">
                                    <i class="tio-email"></i>
                                    <?php ($message=\App\Models\Contact::where('seen',0)->count()); ?>
                                    <?php if($message!=0): ?>
                                        <span class="btn-status btn-sm-status btn-status-danger"><?php echo e($message); ?></span>
                                    <?php endif; ?>
                                </a>
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if(\App\Utils\Helpers::module_permission_check('order_management')): ?>
                        <li class="nav-item">
                            <div class="hs-unfold">
                                <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                                   href="<?php echo e(route('admin.orders.list',['status'=>'pending'])); ?>">
                                    <i class="tio-shopping-cart-outlined"></i>
                                    <span
                                            class="btn-status btn-sm-status btn-status-danger"><?php echo e(\App\Models\Order::where('order_status','pending')->count()); ?></span>
                                </a>
                            </div>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker media align-items-center gap-3 navbar-dropdown-account-wrapper dropdown-toggle dropdown-toggle-left-arrow"
                               href="javascript:"
                               data-hs-unfold-options='{
                                     "target": "#accountNavbarDropdown",
                                     "type": "css-animation"
                                   }'>
                                <div class="d-none d-md-block media-body text-right">
                                    <h5 class="profile-name mb-0"><?php echo e(auth('admin')->user()->name); ?></h5>
                                    <span class="fz-12"><?php echo e(auth('admin')->user()->role->name ?? ''); ?></span>
                                </div>
                                <div class="avatar border avatar-circle">
                                    <img class="avatar-img"
                                         src="<?php echo e(getValidImage('storage/app/public/admin/'.auth('admin')->user()->image,type: 'backend-profile')); ?>"
                                         alt="<?php echo e(translate('image_description')); ?>">
                                    <span class="d-none avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>
                            <div id="accountNavbarDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account">
                                <div class="dropdown-item-text">
                                    <div class="media align-items-center text-break">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            <img class="avatar-img" src="<?php echo e(getValidImage('storage/app/public/admin/'.auth('admin')->user()->image,type: 'backend-profile')); ?>"
                                                 alt="<?php echo e(translate('image_description')); ?>">
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5"><?php echo e(auth('admin')->user()->name); ?></span>
                                            <span class="card-text"><?php echo e(auth('admin')->user()->email); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                   href="<?php echo e(route('admin.profile.update',auth('admin')->user()->id)); ?>">
                                    <span class="text-truncate pr-2" title="Settings"><?php echo e(translate('settings')); ?></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:" data-toggle="modal"  data-target="#sign-out-modal">
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
                    <?php ( $local = session()->has('local')?session('local'):'en'); ?>
                    <div class="topbar-text dropdown disable-autohide <?php echo e($direction == "rtl" ? 'ml-3' : 'm-1'); ?> text-capitalize">
                        <a class="topbar-link dropdown-toggle title-color d-flex align-items-center" href="#"
                           data-toggle="dropdown">
                            <?php $__currentLoopData = json_decode($lang['value'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data['code']==$local): ?>
                                    <img class="<?php echo e($direction == "rtl" ? 'ml-2' : 'mr-2'); ?>" width="20"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/flags/'.$data['code'].'.png')); ?>"
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
                                            <img class="<?php echo e($direction == "rtl" ? 'ml-2' : 'mr-2'); ?>" width="20"
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
                <div class="bg-white p-1 rounded mt-2">
                    <a title="Website home" class="p-2 title-color"
                       href="<?php echo e(route('home')); ?>" target="_blank">
                        <i class="tio-globe"></i>
                        <?php echo e(translate('view_website')); ?>

                    </a>
                </div>
                <?php if(\App\Utils\Helpers::module_permission_check('support_section')): ?>
                    <div class="bg-white p-1 rounded mt-2">
                        <a class="p-2  title-color"
                           href="<?php echo e(route('admin.contact.list')); ?>">
                            <i class="tio-email"></i>
                            <?php echo e(translate('message')); ?>

                            <?php ($message=\App\Models\Contact::where('seen',0)->count()); ?>
                            <?php if($message!=0): ?>
                                <span>(<?php echo e($message); ?>)</span>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(\App\Utils\Helpers::module_permission_check('order_management')): ?>
                    <div class="bg-white p-1 rounded mt-2">
                        <a class="p-2  title-color"
                           href="<?php echo e(route('admin.orders.list',['status'=>'pending'])); ?>">
                            <i class="tio-shopping-cart-outlined"></i>
                            <?php echo e(translate('order_list')); ?>

                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
</div>
<div id="headerFluid" class="d-none"></div>
<div id="headerDouble" class="d-none"></div>
<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/partials/_header.blade.php ENDPATH**/ ?>