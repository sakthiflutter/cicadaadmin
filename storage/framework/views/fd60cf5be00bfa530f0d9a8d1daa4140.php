<?php $__env->startSection('content'); ?>
    <div>
        <h1 class="text-center"><?php echo e("Please do not refresh this page..."); ?></h1>
    </div>

    <form action="<?php echo route('razor-pay.payment',['payment_id'=>$data->id]); ?>" id="form" method="POST">
    <?php echo csrf_field(); ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo e(config()->get('razor_config.api_key')); ?>"
                data-amount="<?php echo e(round($data->payment_amount, 2)*100); ?>"
                data-buttontext="Pay <?php echo e(round($data->payment_amount, 2) . ' ' . $data->currency_code); ?>"
                data-name=<?php echo e($business_name); ?>

                data-description="<?php echo e($data->payment_amount); ?>"
                data-image=<?php echo e($business_logo); ?>

                data-prefill.name="<?php echo e($payer->name ?? ''); ?>"
                data-prefill.email="<?php echo e($payer->email ?? ''); ?>"
                data-theme.color="#ff7529">
        </script>
        <button class="btn btn-block" id="pay-button" type="submit" style="display:none"></button>
    </form>

    <script type="text/javascript">
        "use strict";
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("pay-button").click();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('payment.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/payment/razor-pay.blade.php ENDPATH**/ ?>