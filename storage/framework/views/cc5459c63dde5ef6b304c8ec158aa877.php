<?php
    use App\Utils\Helpers;
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(Session::get('direction')); ?>"
      style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(dynamicStorage(path: 'storage/app/public/company/'.getWebConfig(name: 'company_fav_icon'))); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/vendor.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/google-fonts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/icon-set/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/theme.minc619.css?v=1.0')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/toastr.css')); ?>">
    <?php if(Session::get('direction') === "rtl"): ?>
        <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/menurtl.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/css/lightbox.css')); ?>">
    <?php echo $__env->yieldPushContent('css_or_js'); ?>
    <script
        src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js')); ?>"></script>
    <style>
        select {
            background-image: url('<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/arrow-down.png')); ?>');
            background-size: 7px;
            background-position: 96% center;
        }
    </style>
    <?php if(Request::is('admin/payment/configuration/addon-payment-get')): ?>
        <style>
            .form-floating > label {
                position: relative;
                display: block;
                margin-bottom: 12px;
                padding: 0;
                inset-inline: 0 !important;
            }
        </style>
    <?php endif; ?>
</head>

<body class="footer-offset">

<?php echo $__env->make('layouts.back-end.partials._front-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<span class="d-none" id="placeholderImg" data-img="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/400x400/img3.png')); ?>"></span>
<div class="row">
    <div class="col-12 position-fixed z-9999 mt-10rem">
        <div id="loading" class="d--none">
            <div id="loader"></div>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.back-end.partials._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.back-end.partials._side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.back-end._translator-for-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<span id="get-root-path-for-toggle-modal-image" data-path="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/modal')); ?>"></span>

<main id="content" role="main" class="main pointer-event">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('layouts.back-end.partials._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back-end.partials._modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back-end.partials._toggle-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back-end.partials._sign-out-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<span class="please_fill_out_this_field" data-text="<?php echo e(translate('please_fill_out_this_field')); ?>"></span>
<span class="get-application-environment-mode" data-value="<?php echo e(env('APP_MODE') == 'demo' ? 'demo':'live'); ?>"></span>
<span id="get-currency-symbol"
      data-currency-symbol="<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode(type: 'default'))); ?>"></span>

<span id="message-select-word" data-text="<?php echo e(translate('select')); ?>"></span>
<span id="message-yes-word" data-text="<?php echo e(translate('yes')); ?>"></span>
<span id="message-no-word" data-text="<?php echo e(translate('no')); ?>"></span>
<span id="message-cancel-word" data-text="<?php echo e(translate('cancel')); ?>"></span>
<span id="message-are-you-sure" data-text="<?php echo e(translate('are_you_sure')); ?> ?"></span>
<span id="message-invalid-date-range" data-text="<?php echo e(translate('invalid_date_range')); ?>"></span>
<span id="message-status-change-successfully" data-text="<?php echo e(translate('status_change_successfully')); ?>"></span>
<span id="message-are-you-sure-delete-this" data-text="<?php echo e(translate('are_you_sure_to_delete_this')); ?> ?"></span>
<span id="message-you-will-not-be-able-to-revert-this"
      data-text="<?php echo e(translate('you_will_not_be_able_to_revert_this')); ?>"></span>

<span id="get-customer-list-route" data-action="<?php echo e(route('admin.customer.customer-list-search')); ?>"></span>

<span id="get-search-product-route" data-action="<?php echo e(route('admin.products.search-product')); ?>"></span>
<span id="get-orders-list-route" data-action="<?php echo e(route('admin.orders.list',['status'=>'all'])); ?>"></span>
<span class="system-default-country-code" data-value="<?php echo e(getWebConfig(name: 'country_code') ?? 'us'); ?>"></span>

<audio id="myAudio">
    <source src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/sound/notification.mp3')); ?>" type="audio/mpeg">
</audio>


<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/vendor.min.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/theme.min.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/sweet_alert.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/toastr.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/js/lightbox.min.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/custom.js')); ?>"></script>
<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/app-script.js')); ?>"></script>

<?php echo Toastr::message(); ?>


<?php if($errors->any()): ?>
    <script>
        'use strict';
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<?php echo $__env->yieldPushContent('script'); ?>

<?php if(Helpers::module_permission_check('order_management') && env('APP_MODE')!='dev'): ?>
<script>
    'use strict'
        setInterval(function () {
            $.get({
                url: '<?php echo e(route('admin.orders.get-order-data')); ?>',
                dataType: 'json',
                success: function (response) {
                    let data = response.data;
                    if (data.new_order > 0) {
                        playAudio();
                        $('#popup-modal').appendTo("body").modal('show');
                    }
                },
            });
        }, 5000);
</script>
<?php endif; ?>

<?php echo $__env->yieldPushContent('script_2'); ?>

</body>
</html>
<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/app.blade.php ENDPATH**/ ?>