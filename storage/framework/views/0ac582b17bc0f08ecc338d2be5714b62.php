<?php $__env->startSection('title', translate('environment_setup')); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <div class="mb-4 pb-2">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/system-setting.png')); ?>" alt="">
            <?php echo e(translate('system_Setup')); ?>

        </h2>
    </div>
    <?php echo $__env->make('admin-views.business-settings.system-settings-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card">
        <div class="border-bottom px-4 py-3">
            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/environment.png')); ?>" alt="">
                <?php echo e(translate('environment_information')); ?>

            </h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.business-settings.web-config.environment-setup')); ?>" method="post"
                    enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('app_name')); ?></label>
                            <input type="text" value="TeckSpiral"
                                    name="app_name" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.translate('EFood')); ?>" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('app_debug')); ?></label>
                            <select name="app_debug" class="form-control js-select2-custom">
                                <option value="true" <?php echo e(env('APP_DEBUG')==1?'selected':''); ?>>
                                    <?php echo e(translate('true')); ?>

                                </option>
                                <option value="false" <?php echo e(env('APP_DEBUG')==0?'selected':''); ?>>
                                    <?php echo e(translate('false')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('app_mode')); ?></label>
                            <select name="app_mode" class="form-control js-select2-custom">
                                <option value="live" <?php echo e(env('APP_MODE')=='live'?'selected':''); ?>>
                                    <?php echo e(translate('live')); ?>

                                </option>
                                <option value="dev" <?php echo e(env('APP_MODE')=='dev'?'selected':''); ?>>
                                    <?php echo e(translate('dev')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('app_url')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_URL')); ?>"
                                    name="app_url" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.'http://localhost'); ?>" required disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('DB_connection')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_MODE') != 'demo' ? env('DB_CONNECTION') : '---'); ?>"
                                    name="db_connection" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.'mysql'); ?>" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('DB_host')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_MODE') != 'demo' ? env('DB_HOST') : '---'); ?>"
                                    name="db_host" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.'http://localhost/'); ?>" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('DB_port')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_MODE') != 'demo' ? env('DB_PORT') : '---'); ?>"
                                    name="db_port" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.'3306'); ?>" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('DB_database')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_MODE') != 'demo' ? env('DB_DATABASE') : '---'); ?>"
                                    name="db_database" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.'demo_db'); ?> " required disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('DB_username')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_MODE') != 'demo' ? env('DB_USERNAME') : '---'); ?>"
                                    name="db_username" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.translate('root')); ?>" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('DB_password')); ?></label>
                            <input type="text" value="<?php echo e(env('APP_MODE') != 'demo' ? env('DB_PASSWORD') : '---'); ?>"
                                    name="db_password" class="form-control"
                                    placeholder="<?php echo e(translate('ex').':'.translate('password')); ?>" disabled>
                        </div>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="title-color d-flex"><?php echo e(translate('buyer_username')); ?></label>
                            <input type="text" value="<?php echo e(env('BUYER_USERNAME')); ?>" class="form-control" placeholder="<?php echo e(translate('6valley-admin-demo-jhisdfhisufjifjfijqw5467')); ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group" id="purchase_code_div">
                            <label class="title-color d-flex"><?php echo e(translate('purchase_code')); ?></label>
                            <div class="input-icons">
                                <input type="password" value="<?php echo e(env('PURCHASE_CODE')); ?>" class="form-control" id="purchase_code" placeholder="<?php echo e(translate('00000000000000')); ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="d-flex justify-content-end flex-wrap gap-3">
                    <button type="reset" class="btn btn-secondary px-5"><?php echo e(translate('reset')); ?></button>
                    <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>"
                        class="btn btn--primary px-5 <?php echo e(env('APP_MODE')!='demo'?'':'call-demo'); ?>"><?php echo e(translate('submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/environment-index.blade.php ENDPATH**/ ?>