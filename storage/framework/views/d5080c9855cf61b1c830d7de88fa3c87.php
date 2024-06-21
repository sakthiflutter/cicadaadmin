<?php $__env->startSection('title', translate('sign_in')); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-4 py-lg-5 my-4 text-align-direction">
         <div class="login-card">
            <div class="mx-auto __max-w-360">
                <h2 class="text-center h4 mb-4 font-bold text-capitalize fs-18-mobile"><?php echo e(translate('sign_in')); ?></h2>
                <form class="needs-validation mt-2" autocomplete="off" action="<?php echo e(route('customer.auth.login')); ?>"
                        method="post" id="customer-login-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label class="form-label font-semibold">
                            <?php echo e(translate('email')); ?> / <?php echo e(translate('phone')); ?>

                        </label>
                        <input class="form-control text-align-direction" type="text" name="user_id" id="si-email"
                                value="<?php echo e(old('user_id')); ?>" placeholder="<?php echo e(translate('enter_email_address_or_phone_number')); ?>"
                                required>
                        <div class="invalid-feedback"><?php echo e(translate('please_provide_valid_email_or_phone_number')); ?> .</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label font-semibold"><?php echo e(translate('password')); ?></label>
                        <div class="password-toggle rtl">
                            <input class="form-control text-align-direction" name="password" type="password" id="si-password" placeholder="<?php echo e(translate('password_must_be_7+_Character')); ?>" required>
                            <label class="password-toggle-btn">
                                <input class="custom-control-input" type="checkbox">
                                    <i class="tio-hidden password-toggle-indicator"></i>
                                    <span class="sr-only"><?php echo e(translate('show_password')); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group d-flex flex-wrap justify-content-between">
                        <div class="rtl">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember"
                                        id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                <label class="custom-control-label text-primary" for="remember"><?php echo e(translate('remember_me')); ?></label>
                            </div>
                        </div>
                        <a class="font-size-sm text-primary text-underline" href="<?php echo e(route('customer.auth.recover-password')); ?>">
                            <?php echo e(translate('forgot_password')); ?>?
                        </a>
                    </div>
                    <?php ($recaptcha = getWebConfig(name: 'recaptcha')); ?>
                    <?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
                        <div id="recaptcha_element" class="w-100" data-type="image"></div>
                        <br/>
                    <?php else: ?>
                        <div class="row py-2">
                            <div class="col-6 pr-2">
                                <input type="text" class="form-control border __h-40" name="default_recaptcha_id_customer_login" value=""
                                    placeholder="<?php echo e(translate('enter_captcha_value')); ?>" autocomplete="off">
                            </div>
                            <div class="col-6 input-icons mb-2 w-100 rounded bg-white">
                                <a href="javascript:" class="d-flex align-items-center align-items-center get-login-recaptcha-verify" data-link="<?php echo e(URL('/customer/auth/code/captcha')); ?>">
                                    <img src="<?php echo e(URL('/customer/auth/code/captcha/1?captcha_session_id=default_recaptcha_id_customer_login')); ?>" class="input-field rounded __h-40" id="customer_login_recaptcha_id" alt="">
                                    <i class="tio-refresh icon cursor-pointer p-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <button class="btn btn--primary btn-block btn-shadow" type="submit"><?php echo e(translate('sign_in')); ?></button>
                </form>
                <?php if($web_config['social_login_text']): ?>
                <div class="text-center m-3 text-black-50">
                    <small><?php echo e(translate('or_continue_with')); ?></small>
                </div>
                <?php endif; ?>
                <div class="d-flex justify-content-center my-3 gap-2">
                <?php $__currentLoopData = getWebConfig(name: 'social_login'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialLoginService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($socialLoginService) && $socialLoginService['status']): ?>
                        <div>
                            <a class="d-block" href="<?php echo e(route('customer.auth.service-login', $socialLoginService['login_medium'])); ?>">
                                <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/'.$socialLoginService['login_medium'].'.png')); ?>" alt="">
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-black-50 text-center">
                    <small>
                        <?php echo e(translate('Enjoy_New_experience')); ?>

                        <a class="text-primary text-underline" href="<?php echo e(route('customer.auth.sign-up')); ?>">
                            <?php echo e(translate('sign_up')); ?>

                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
        <script type="text/javascript">
            "use strict";
            var onloadCallback = function () {
                grecaptcha.render('recaptcha_element', {
                    'sitekey': '<?php echo e(getWebConfig(name: 'recaptcha')['site_key']); ?>'
                });
            };
        </script>
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                async defer></script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/customer-views/auth/login.blade.php ENDPATH**/ ?>