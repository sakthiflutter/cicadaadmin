<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(Session::get('direction')); ?>"
    style="text-align: <?php echo e(Session::get('direction') === 'rtl' ? 'right' : 'left'); ?>;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(dynamicStorage(path: 'storage/app/public/company/'.getWebConfig(name: 'company_fav_icon'))); ?>">

    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/vendor.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/google-fonts.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/icon-set/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/theme.minc619.css?v=1.0')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/style.css')); ?>">
    <?php if(Session::get('direction') === 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/menurtl.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/css/lightbox.css')); ?>">
    <?php echo $__env->yieldPushContent('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/custom.css')); ?>">
    <style>
        select {
            background-image: url('<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/arrow-down.png')); ?>');
            background-size: 7px;
            background-position: 96% center;
        }
    </style>
</head>
<body class="footer-offset">
    <?php echo $__env->make('layouts.back-end.partials._front-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-12 position-fixed z-9999 mt-10rem">
            <div id="loading" class="d--none">
                <div id="loader"></div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.back-end.partials-seller._header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.back-end.partials-seller._side-bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="content" role="main" class="main pointer-event">
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('layouts.back-end.partials-seller._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.back-end.partials-seller._modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.back-end.partials-seller._toggle-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.back-end._translator-for-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.back-end.partials-seller._sign-out-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </main>

    <audio id="myAudio">
        <source src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/sound/notification.mp3')); ?>" type="audio/mpeg">
    </audio>

    <span class="please_fill_out_this_field" data-text="<?php echo e(translate('please_fill_out_this_field')); ?>"></span>
    <span id="onerror-chatting" data-onerror-chatting="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/image-place-holder.png')); ?>"></span>
    <span id="onerror-user" data-onerror-user="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/160x160/img1.jpg')); ?>"></span>
    <span id="get-root-path-for-toggle-modal-image" data-path="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/modal')); ?>"></span>
    <span id="get-customer-list-route" data-action="<?php echo e(route('vendor.customer.list')); ?>"></span>
    <span id="get-search-product-route" data-action="<?php echo e(route('vendor.products.search-product')); ?>"></span>
    <span id="get-orders-list-route" data-action="<?php echo e(route('vendor.orders.list', ['status' => 'all'])); ?>"></span>
    <span class="system-default-country-code" data-value="<?php echo e(getWebConfig(name: 'country_code') ?? 'us'); ?>"></span>
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

    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/vendor.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/theme.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/sweet_alert.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/toastr.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/js/lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/custom.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/app-script.js')); ?>"></script>

    <?php echo Toastr::message(); ?>

    <?php if($errors->any()): ?>
        <script>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error('<?php echo e($error); ?>', Error, {
                    CloseButton: true,
                    ProgressBar: true
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>

    <script>
        'use strict'
        setInterval(function() {
            $.get({
                url: '<?php echo e(route('vendor.get-order-data')); ?>',
                dataType: 'json',
                success: function(response) {
                    let data = response.data;
                    if (data.new_order > 0) {
                        playAudio();
                        $('#popup-modal').appendTo("body").modal('show');
                    }
                },
            });
        }, 10000);
    </script>

    <script>
        $('.notification-data-view').on('click',function (){
            let id= $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: "<?php echo e(route('vendor.notification.index')); ?>",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: id,
                },
                beforeSend: function () {
                },
                success: function (data) {
                    $('.notification_data_new_badge'+id).fadeOut();
                    $('#NotificationModalContent').empty().html(data.view);
                    $('#NotificationModal').modal('show');
                    let notificationDataCount = $('.notification_data_new_count');
                    let notificationCount = parseInt(data.notification_count);
                    notificationCount === 0 ? notificationDataCount.fadeOut() : notificationDataCount.html(notificationCount);
                },
                complete: function () {
                },
            });
        })
        if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write(
            '<script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end')); ?>/vendor/babel-polyfill/polyfill.min.js"><\/script>');
    </script>

    <?php echo $__env->yieldPushContent('script'); ?>

    <?php echo $__env->yieldPushContent('script_2'); ?>

</body>

</html>
<?php /**PATH /var/www/html/moores/resources/views/layouts/back-end/app-seller.blade.php ENDPATH**/ ?>