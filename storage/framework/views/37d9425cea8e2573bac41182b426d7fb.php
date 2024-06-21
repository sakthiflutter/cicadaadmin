<?php
    use Illuminate\Support\Facades\Session;
?>


<?php $__env->startSection('title', translate('DB_clean')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php ($direction = Session::get('direction')); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
                <?php echo e(translate('system_Settings')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-12 mb-3">
                <div class="alert badge-soft-danger mb-0 mx-sm-2 <?php echo e($direction === 'rtl' ? 'text-right' : 'text-left'); ?>" role="alert">
                    <?php echo e(translate('this_page_contains_sensitive_information.Make_sure_before_changing.')); ?>

                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.business-settings.web-config.clean-db')); ?>" method="post" class="form-submit"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="form-group form-check <?php echo e($direction === 'rtl' ? 'text-right' : 'text-left'); ?>">
                                            <input type="checkbox" name="tables[]" value="<?php echo e($table); ?>"
                                                class="form-check-input"
                                                id="business_section_<?php echo e($key); ?>">
                                            <label class="form-check-label text-dark cursor-pointer user-select-none"
                                                style="<?php echo e($direction === "rtl" ? 'margin-right: 1.25rem;' : ''); ?>;"
                                                for="business_section_<?php echo e($key); ?>"><?php echo e(translate(str_replace('_',' ',Str::limit($table, 20)))); ?></label>
                                            <span class="badge-pill badge-secondary mx-2"><?php echo e($rows[$key]); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="d-flex justify-content-end gap-10 flex-wrap mt-3">
                                <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                                    class="btn btn--primary <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('clear')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    'use strict';
    $('.form-submit').on('submit',function(e) {
        e.preventDefault();
        Swal.fire({
            title: "<?php echo e(translate('are_you_sure').'?'); ?>",
            text: "<?php echo e(translate('sensitive_data').'!'.translate('make_sure_before_changing').'.'); ?>",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: 'default',
            confirmButtonColor: '<?php echo e($web_config['primary_color']); ?>',
            cancelButtonText: '<?php echo e(translate("no")); ?>',
            confirmButtonText: '<?php echo e(translate("yes")); ?>',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                this.submit();
            }else{
                e.preventDefault();
                toastr.success("<?php echo e(translate('cancelled')); ?>");
                location.reload();
            }
        })
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/db-index.blade.php ENDPATH**/ ?>