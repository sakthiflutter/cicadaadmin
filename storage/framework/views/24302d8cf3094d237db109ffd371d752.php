

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title><?php echo e(translate($role)); ?> | <?php echo e(translate('login')); ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/toastr.css">
</head>

<body>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="position-fixed top-0 right-0 left-0 bg-img-hero __inline-1"
         style="background-image: url(<?php echo e(asset('public/assets/admin')); ?>/svg/components/abstract-bg-4.svg);">
        <!-- SVG Bottom Shape -->
        <figure class="position-absolute right-0 bottom-0 left-0">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                <polygon fill="#fff" points="0,273 1921,273 1921,0 "/>
            </svg>
        </figure>
        <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <label class="badge badge-soft-success float-right __inline-2"><?php echo e(translate('software_version')); ?> : <?php echo e(env('SOFTWARE_VERSION')); ?></label>
        <?php ($e_commerce_logo=DB::table('business_settings')->where(['type'=>'company_web_logo'])->first()->value); ?>
        <a class="d-flex justify-content-center mb-5" href="javascript:">
            <img class="z-index-2" height="40" src="<?php echo e(asset("storage/app/public/company/".$e_commerce_logo)); ?>" alt="Logo"
                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'">
        </a>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <!-- Card -->
                <div class="card card-lg mb-5">
                    <div class="card-body">
                        <!-- Form -->
                        <form id="form-id" action="<?php echo e(route('login_post')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="text-center">
                                <div class="mb-5">
                                    <h1 class="display-4"><?php echo e(translate('sign_in')); ?></h1><br>
                                    <span>( <?php echo e(translate($role)); ?> <?php echo e(translate('Login')); ?>)</span>
                                </div>
                            </div>

                            <input type="hidden" class="form-control mb-3" name="role" value="<?php echo e($role); ?>">

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signinSrEmail"><?php echo e(translate('your_email')); ?></label>

                                <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                       tabindex="1" placeholder="email@address.com" aria-label="email@address.com"
                                       required data-msg="Please enter a valid email address.">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrPassword" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                      <?php echo e(translate('password')); ?>

                                    </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg"
                                           name="password" id="signupSrPassword" placeholder="<?php echo e(translate('8+_characters_required')); ?>"
                                           aria-label="8+ characters required" required
                                           data-msg="Your password is invalid. Please try again."
                                           data-hs-toggle-password-options='{
                                                     "target": "#changePassTarget",
                                            "defaultClass": "tio-hidden-outlined",
                                            "showClass": "tio-visible-outlined",
                                            "classChangeTarget": "#changePassIcon"
                                            }'>
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:">
                                            <i id="changePassIcon" class="tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCheckbox"
                                           name="remember">
                                    <label class="custom-control-label text-muted" for="termsCheckbox">
                                        <?php echo e(translate('remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->
                            
                          

                            <button type="submit" class="btn btn-lg btn-block btn--primary"><?php echo e(translate('sign_in')); ?></button>
                        </form>
                        <!-- End Form -->
                    </div>
                    <?php if(env('APP_MODE')=='demo'): ?>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-10">
                                    <span><?php echo e(translate('email')); ?> : <?php echo e(translate('admin@admin.com')); ?></span><br>
                                    <span><?php echo e(translate('password')); ?> : <?php echo e(translate('12345678')); ?></span>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn--primary" onclick="copy_cred()"><i class="tio-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/theme.min.js"></script>
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/toastr.js"></script>
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

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });
    });
</script>


<?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('recaptcha_element', {
                'sitekey': '<?php echo e(\App\CPU\Helpers::get_business_settings('recaptcha')['site_key']); ?>'
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script>
        $("#form-id").on('submit',function(e) {
            var response = grecaptcha.getResponse();

            if (response.length === 0) {
                e.preventDefault();
                toastr.error("<?php echo e(translate('please_check_the_recaptcha')); ?>");
            }
        });
    </script>
<?php else: ?>
    <script type="text/javascript">
        function re_captcha() {
            $url = "<?php echo e(URL('/auth/captcha')); ?>";
            $url = $url + "/" + Math.random()+"?captcha_session_id=default_recaptcha_id_<?php echo e($role); ?>_login";
            document.getElementById('default_recaptcha_id').src = $url;
            console.log('url: '+ $url);
        }
    </script>
<?php endif; ?>


<?php if(env('APP_MODE')=='demo'): ?>
    <script>
        function copy_cred() {
            $('#signinSrEmail').val('admin@admin.com');
            $('#signupSrPassword').val('12345678');
            toastr.success('Copied successfully!', 'Success!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
<?php endif; ?>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>

<?php /**PATH /var/www/html/moores/resources/views/admin-views/auth/login.blade.php ENDPATH**/ ?>