<?php $__env->startSection('title', translate('social_Media_Chatting')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-4 pb-2">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/3rd-party.png')); ?>" alt="">
                <?php echo e(translate('3rd_party')); ?>

            </h2>
        </div>
        <?php echo $__env->make('admin-views.business-settings.third-party-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php ($whatsapp = getWebConfig('whatsapp')); ?>
        <div class="card overflow-hidden">
            <form action="<?php echo e(route('admin.social-media-chat.update',['whatsapp'])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-header mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/whatsapp.png')); ?>" alt="">
                        <h4 class="text-center mb-0"><?php echo e(translate('whatsApp')); ?></h4>
                    </div>
                    <label class="switcher">
                        <input class="switcher_input toggle-switch-message" type="checkbox" value="1"
                               id="whatsapp-id" name="status" <?php echo e($whatsapp['status']==1?'checked':''); ?>

                               data-modal-id = "toggle-modal"
                               data-toggle-id = "whatsapp-id"
                               data-on-image = "social/whatsapp-on.png"
                               data-off-image = "social/whatsapp-off.png"
                               data-on-title = "<?php echo e(translate('want_to_turn_ON_WhatsApp_as_social_media_chat_option').'?'); ?>"
                               data-off-title = "<?php echo e(translate('want_to_turn_OFF_WhatsApp_as_social_media_chat_option').'?'); ?>"
                               data-on-message = "<p><?php echo e(translate('if_enabled,WhatsApp_chatting_option_will_be_available_in_the_system')); ?></p>"
                               data-off-message = "<p><?php echo e(translate('if_enabled,WhatsApp_chatting_option_will_be_hidden_from_the_system')); ?></p>">
                        <span class="switcher_control"></span>
                    </label>
                </div>
                <div class="card-body text-start">
                    <?php if($whatsapp): ?>
                        <div class="form-group">
                            <label class="title-color font-weight-bold text-capitalize"><?php echo e(translate('whatsapp_number')); ?></label>
                            <span class="ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo e(translate('provide_a_WhatsApp_number_without_country_code')); ?>">
                                <img class="info-img" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="img">
                            </span>
                            <input type="text" class="form-control form-ellipsis" name="phone" value="<?php echo e($whatsapp['phone']); ?>" placeholder="<?php echo e(translate('ex').':'.'1234567890'); ?>">
                        </div>
                        <div class="d-flex justify-content-end flex-wrap gap-3">
                            <button type="reset" class="btn btn-secondary px-5"><?php echo e(translate('reset')); ?></button>
                            <button type="<?php echo e(env('APP_MODE')!='demo'?'submit':'button'); ?>" class="btn btn--primary px-5"><?php echo e(translate('save')); ?></button>
                        </div>
                    <?php else: ?>
                        <div class="mt-3 d-flex flex-wrap justify-content-center gap-10">
                            <button type="submit" class="btn btn--primary px-5 text-uppercase"><?php echo e(translate('configure')); ?></button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/social-media-chat/view.blade.php ENDPATH**/ ?>