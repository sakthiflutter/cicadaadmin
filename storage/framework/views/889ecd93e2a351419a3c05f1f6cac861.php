<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e("Payment"); ?></title>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/libs/bootstrap-5/bootstrap.min.css')); ?>">

    <?php echo $__env->yieldPushContent('script'); ?>
</head>
<body>
    <?php echo $__env->yieldContent('content'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/libs/bootstrap-5/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH /var/www/html/moores/resources/views/payment/layouts/master.blade.php ENDPATH**/ ?>