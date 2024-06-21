<?php $__env->startSection('title', translate('general_Settings')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(translate('business_Setup')); ?>

            </h2>
            <div class="btn-group">
                <div class="ripple-animation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none"
                         class="svg replaced-svg">
                        <path
                            d="M9.00033 9.83268C9.23644 9.83268 9.43449 9.75268 9.59449 9.59268C9.75449 9.43268 9.83421 9.2349 9.83366 8.99935V5.64518C9.83366 5.40907 9.75366 5.21463 9.59366 5.06185C9.43366 4.90907 9.23588 4.83268 9.00033 4.83268C8.76421 4.83268 8.56616 4.91268 8.40616 5.07268C8.24616 5.23268 8.16644 5.43046 8.16699 5.66602V9.02018C8.16699 9.25629 8.24699 9.45074 8.40699 9.60352C8.56699 9.75629 8.76477 9.83268 9.00033 9.83268ZM9.00033 13.166C9.23644 13.166 9.43449 13.086 9.59449 12.926C9.75449 12.766 9.83421 12.5682 9.83366 12.3327C9.83366 12.0966 9.75366 11.8985 9.59366 11.7385C9.43366 11.5785 9.23588 11.4988 9.00033 11.4993C8.76421 11.4993 8.56616 11.5793 8.40616 11.7393C8.24616 11.8993 8.16644 12.0971 8.16699 12.3327C8.16699 12.5688 8.24699 12.7668 8.40699 12.9268C8.56699 13.0868 8.76477 13.1666 9.00033 13.166ZM9.00033 17.3327C7.84755 17.3327 6.76421 17.1138 5.75033 16.676C4.73644 16.2382 3.85449 15.6446 3.10449 14.8952C2.35449 14.1452 1.76088 13.2632 1.32366 12.2493C0.886437 11.2355 0.667548 10.1521 0.666992 8.99935C0.666992 7.84657 0.885881 6.76324 1.32366 5.74935C1.76144 4.73546 2.35505 3.85352 3.10449 3.10352C3.85449 2.35352 4.73644 1.7599 5.75033 1.32268C6.76421 0.88546 7.84755 0.666571 9.00033 0.666016C10.1531 0.666016 11.2364 0.884905 12.2503 1.32268C13.2642 1.76046 14.1462 2.35407 14.8962 3.10352C15.6462 3.85352 16.24 4.73546 16.6778 5.74935C17.1156 6.76324 17.3342 7.84657 17.3337 8.99935C17.3337 10.1521 17.1148 11.2355 16.677 12.2493C16.2392 13.2632 15.6456 14.1452 14.8962 14.8952C14.1462 15.6452 13.2642 16.2391 12.2503 16.6768C11.2364 17.1146 10.1531 17.3332 9.00033 17.3327ZM9.00033 15.666C10.8475 15.666 12.4206 15.0168 13.7195 13.7185C15.0184 12.4202 15.6675 10.8471 15.667 8.99935C15.667 7.15213 15.0178 5.57907 13.7195 4.28018C12.4212 2.98129 10.8481 2.33213 9.00033 2.33268C7.1531 2.33268 5.58005 2.98185 4.28116 4.28018C2.98227 5.57852 2.3331 7.15157 2.33366 8.99935C2.33366 10.8466 2.98283 12.4196 4.28116 13.7185C5.57949 15.0174 7.15255 15.6666 9.00033 15.666Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
                <div
                    class="dropdown-menu dropdown-menu-right bg-aliceblue border border-color-primary-light p-4 dropdown-w-lg">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/note.png')); ?>" alt="">
                        <h5 class="text-primary mb-0"><?php echo e(translate('note')); ?></h5>
                    </div>
                    <p class="title-color font-weight-medium mb-0"><?php echo e(translate('please_click_save_information_button_below_to_save_all_the_changes')); ?></p>
                </div>
            </div>
        </div>
        <?php echo $__env->make('admin-views.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="alert alert-danger d-none mb-3" role="alert">
            <?php echo e(translate('changing_some_settings_will_take_time_to_show_effect_please_clear_session_or_wait_for_60_minutes_else_browse_from_incognito_mode')); ?>

        </div>
        <div class="card mb-3">
            <div class="card-body">
                <form action="<?php echo e(route('admin.business-settings.maintenance-mode')); ?>" method="post" id="maintenance-mode-form">
                    <?php echo csrf_field(); ?>
                    <div class="border rounded border-color-c1 px-4 py-3 d-flex justify-content-between mb-1">
                        <h5 class="mb-0 d-flex gap-1 c1">
                            <?php echo e(translate('maintenance_mode')); ?>

                        </h5>
                        <div class="position-relative">
                            <label class="switcher">
                                <input type="checkbox" class="switcher_input toggle-switch-message" id="maintenance-mode" name="value"
                                   value="1" <?php echo e(isset($businessSetting['maintenance_mode']) && $businessSetting['maintenance_mode']==1?'checked':''); ?>

                                   data-modal-id="toggle-status-modal"
                                   data-toggle-id="maintenance-mode"
                                   data-on-image="maintenance_mode-on.png"
                                   data-off-image="maintenance_mode-off.png"
                                   data-on-title="<?php echo e(translate('Want_to_enable_the_Maintenance_Mode')); ?>"
                                   data-off-title="<?php echo e(translate('Want_to_disable_the_Maintenance_Mode')); ?>"
                                   data-on-message="<p><?php echo e(translate('if_enabled_all_your_apps_and_customer_website_will_be_temporarily_off')); ?></p>"
                                   data-off-message="<p><?php echo e(translate('if_disabled_all_your_apps_and_customer_website_will_be_functional')); ?></p>">
                                <span class="switcher_control"></span>
                            </label>
                        </div>
                    </div>
                </form>
                <p><?php echo e('*'.translate('by_turning_the').', "'. translate('Maintenance_Mode').'"'.translate('ON').' '.translate('all_your_apps_and_customer_website_will_be_disabled_until_you_turn_this_mode_OFF').' '.translate('only_the_Admin_Panel_&_Vendor_Panel_will_be_functional')); ?>

                </p>
            </div>
        </div>
        <form action="<?php echo e(route('admin.business-settings.web-config.update')); ?>" method="POST"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize d-flex gap-1">
                        <i class="tio-user-big"></i>
                        <?php echo e(translate('company_information')); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label
                                    class="title-color d-flex"><?php echo e(translate('company_Name')); ?></label>
                                <input class="form-control" type="text" name="company_name"
                                       value="<?php echo e($businessSetting['company_name']); ?>"
                                       placeholder="<?php echo e(translate('new_business')); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('phone')); ?></label>
                                <input class="form-control" type="text" name="company_phone"
                                       value="<?php echo e($businessSetting['company_phone']); ?>"
                                       placeholder="<?php echo e(translate('01xxxxxxxx')); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label
                                    class="title-color d-flex"><?php echo e(translate('email')); ?></label>
                                <input class="form-control" type="text" name="company_email"
                                       value="<?php echo e($businessSetting['company_email']); ?>"
                                       placeholder="<?php echo e(translate('company@gmail.com')); ?>">
                            </div>
                        </div>

                        <?php ($countryCode = getWebConfig(name: 'country_code')); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('country')); ?> </label>
                                <select id="country" name="country_code" class="form-control js-select2-custom">
                                    <?php $__currentLoopData = COUNTRIES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country['code']); ?>" <?php echo e($countryCode?($countryCode==$country['code']?'selected':''):''); ?> >
                                            <?php echo e($country['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <?php ($timeZone = getWebConfig(name: 'timezone')); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('time_zone')); ?></label>
                                <select name="timezone" class="form-control js-select2-custom">
                                    <?php $__currentLoopData = App\Enums\GlobalConstant::TIMEZONE_ARRAY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timeZoneArray): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($timeZoneArray['value']); ?>" <?php echo e($timeZone?($timeZone==$timeZoneArray['value'] ? 'selected':''):''); ?>>
                                            <?php echo e($timeZoneArray['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex" for="language"><?php echo e(translate('language')); ?></label>
                                <select name="language" class="form-control js-select2-custom">
                                    <?php if(isset($businessSetting['language'])): ?>
                                        <?php $__currentLoopData = json_decode($businessSetting['language']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($item->code); ?>" <?php echo e($item->default == 1?'selected':''); ?>><?php echo e(ucwords($item->name).' ('.ucwords($item->code).')'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('company_address')); ?></label>
                                <input type="text" value="<?php echo e($businessSetting['shop_address']); ?>"
                                       name="shop_address" class="form-control" id="shop-address"
                                       placeholder="<?php echo e(translate('your_shop_address')); ?>"
                                       required>
                            </div>
                        </div>
                        <?php ($default_location = getWebConfig(name: 'default_location')); ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex">
                                    <?php echo e(translate('latitude')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(translate('copy_the_latitude_of_your_business_location_from_Google_Maps_and_paste_it_here')); ?>">
                                        <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                             alt="">
                                    </span>
                                </label>
                                <input class="form-control latitude" type="text" name="latitude" id="latitude"
                                       value="<?php echo e(!empty($default_location['lat'])?$default_location['lat']: '-33.8688'); ?>"
                                       placeholder="<?php echo e(translate('latitude')); ?>"  disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex">
                                    <?php echo e(translate('longitude')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(translate('copy_the_longitude_of_your_business_location_from_Google_Maps_and_paste_it_here')); ?>">
                                        <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                             alt="">
                                    </span>
                                </label>
                                <input class="form-control longitude" type="text" name="longitude" id="longitude"
                                       value="<?php echo e(!empty($default_location['lng'])?$default_location['lng']:'151.2195'); ?>"
                                       placeholder="<?php echo e(translate('longitude')); ?>"   disabled>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="title-color d-flex justify-content-end">
                                    <span class="badge badge--primary-2">
                                       <?php echo e(translate('latitude').' : '); ?>

                                        <span  id="showLatitude">
                                            <?php echo e((!empty($default_location['lat'])?$default_location['lat']:'-33.8688')); ?>

                                        </span>
                                    </span>
                                    <span class="mx-1 badge badge--primary-2" id="showLongitude">
                                       <?php echo e(translate('longitude').' : '); ?>

                                        <span  id="showLongitude">
                                            <?php echo e((!empty($default_location['lng'])?$default_location['lng']:'151.2195')); ?>

                                        </span>
                                    </span>
                                </label>
                                <input id="map-pac-input" class="form-control rounded __map-input mt-1"
                                       title="<?php echo e(translate('search_your_location_here')); ?>" type="text"
                                       placeholder="<?php echo e(translate('search_here')); ?>"/>
                                <div class="rounded w-100 __h-200px mb-5"
                                     id="location-map-canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize d-flex gap-1">
                        <i class="tio-briefcase"></i>
                        <?php echo e(translate('business_information')); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex" for="currency"><?php echo e(translate('currency')); ?> </label>
                                <select name="currency_id" class="form-control js-select2-custom">
                                    <?php $__currentLoopData = $CurrencyList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($item->id); ?>" <?php echo e($item->id == $businessSetting['system_default_currency'] ?'selected':''); ?>>
                                            <?php echo e($item->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <label class="title-color d-flex"><?php echo e(translate('currency_Position')); ?></label>
                            <div class="form-control form-group d-flex gap-2">
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="left"
                                           name="currency_symbol_position"
                                           id="currency_position_left" <?php echo e($businessSetting['currency_symbol_position'] == 'left' ? 'checked':''); ?>>
                                    <label class="custom-control-label"
                                           for="currency_position_left">(<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode(type: 'default'))); ?>

                                        ) <?php echo e(translate('left')); ?></label>
                                </div>
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="right"
                                           name="currency_symbol_position"
                                           id="currency_position_right" <?php echo e($businessSetting['currency_symbol_position'] == 'right' ? 'checked':''); ?>>
                                    <label class="custom-control-label"
                                           for="currency_position_right"><?php echo e(translate('right')); ?>

                                        (<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode(type: 'default'))); ?>

                                        )</label>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <label class="title-color d-flex">
                                <?php echo e(translate('forgot_password_verification_by')); ?>

                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                      data-placement="right"
                                      title="<?php echo e(translate('set_how_users_of_recover_their_forgotten_password')); ?>">
                                    <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                         alt="">
                                </span>
                            </label>
                            <div class="form-control form-group d-flex gap-2">
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="email"
                                           name="forgot_password_verification"
                                           id="verification_by_email" <?php echo e($businessSetting['forgot_password_verification'] == 'email' ? 'checked':''); ?>>
                                    <label class="custom-control-label"
                                           for="verification_by_email"><?php echo e(translate('email')); ?></label>
                                </div>
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="phone"
                                           name="forgot_password_verification"
                                           id="verification_by_phone" <?php echo e($businessSetting['forgot_password_verification'] == 'phone' ? 'checked':''); ?>>
                                    <label class="custom-control-label"
                                           for="verification_by_phone"><?php echo e(translate('phone').' '.'('.translate('OTP').')'); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <label class="title-color d-flex"><?php echo e(translate('business_model')); ?></label>
                            <div class="form-control form-group d-flex gap-2">
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="single" name="business_mode"
                                           id="single_vendor" <?php echo e($businessSetting['business_mode'] == 'single' ? 'checked':''); ?>>
                                    <label class="custom-control-label"
                                           for="single_vendor"><?php echo e(translate('single_vendor')); ?></label>
                                </div>
                                <div class="custom-control custom-radio flex-grow-1">
                                    <input type="radio" class="custom-control-input" value="multi" name="business_mode"
                                           id="multi_vendor" <?php echo e($businessSetting['business_mode'] == 'multi' ? 'checked':''); ?>>
                                    <label class="custom-control-label"
                                           for="multi_vendor"><?php echo e(translate('multi_vendor')); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color text-capitalize">
                                        <?php echo e(translate('email_verification')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              data-placement="right"
                                              title="<?php echo e(translate('if_enabled_users_can_receive_verification_codes_on_their_registered_email_addresses')); ?>">
                                            <img width="16"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="email-verification">
                                        <input type="checkbox" class="switcher_input toggle-switch-message"
                                               name="email_verification"
                                               id="email-verification"
                                               value="1"
                                               <?php echo e($businessSetting['email_verification'] == 1 ? 'checked':''); ?>

                                               data-modal-id="toggle-modal"
                                               data-toggle-id="email-verification"
                                               data-on-image="email-verification-on.png"
                                               data-off-image="email-verification-off.png"
                                               data-on-title="<?php echo e(translate('want_to_Turn_OFF_the_Email_Verification')); ?>"
                                               data-off-title="<?php echo e(translate('want_to_Turn_ON_the_Email_Verification')); ?>"
                                               data-on-message="<p><?php echo e(translate('if_disabled_users_would_not_receive_verification_codes_on_their_registered_email_addresses')); ?></p>"
                                               data-off-message="<p><?php echo e(translate('if_enabled_users_will_receive_verification_codes_on_their_registered_email_addresses')); ?></p>">
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <?php ($phoneVerification = getWebConfig(name: 'phone_verification')); ?>
                            <div class="form-group">
                                <div class="d-flex justify-content-between align-items-center gap-10 form-control">
                                    <span class="title-color">
                                        <?php echo e(translate('OTP_Verification')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              data-placement="right"
                                              title="<?php echo e(translate('if_enabled_users_can_receive_verification_codes_via_OTP_messages_on_their_registered_phone_numbers')); ?>">
                                            <img width="16"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="otp-verification">
                                        <input type="checkbox" class="switcher_input toggle-switch-message"
                                               name="phone_verification"
                                               id="otp-verification"
                                               value="1" <?php echo e($phoneVerification == 1 ? 'checked':''); ?>

                                               data-modal-id="toggle-modal"
                                               data-toggle-id="otp-verification"
                                               data-on-image="otp-verification-on.png"
                                               data-off-image="otp-verification-off.png"
                                               data-on-title="<?php echo e(translate('want_to_Turn_OFF_the_OTP_Verification')); ?>"
                                               data-off-title="<?php echo e(translate('want_to_Turn_ON_the_OTP_Verification')); ?>"
                                               data-on-message="<p><?php echo e(translate('if_disabled_users_would_not_receive_verification_codes_on_their_registered_phone_numbers')); ?></p>"
                                               data-off-message="<p><?php echo e(translate('if_enabled_users_will_receive_verification_codes_on_their_registered_phone_numbers')); ?></p>">
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex">
                                    <?php echo e(translate('pagination')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(translate('this_number_indicates_how_much_data_will_be_shown_in_the_list_or_table')); ?>">
                                        <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                             alt="">
                                    </span>
                                </label>
                                <input type="number" value="<?php echo e($businessSetting['pagination_limit']); ?>"
                                       name="pagination_limit" class="form-control" placeholder="25">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label class="title-color d-flex"><?php echo e(translate('Company_Copyright_Text')); ?></label>
                                <input class="form-control" type="text" name="company_copyright_text"
                                       value="<?php echo e($businessSetting['company_copyright_text']); ?>"
                                       placeholder="<?php echo e(translate('company_copyright_text')); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label
                                    class="input-label text-capitalize"><?php echo e(translate('digit_after_decimal_point')); ?>

                                    ( <?php echo e(translate('ex').':'. '0.00'); ?>)</label>
                                <input type="number" value="<?php echo e($businessSetting['decimal_point_settings']); ?>"
                                       name="decimal_point_settings" class="form-control" min="0"
                                       placeholder="<?php echo e(translate('4')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0 text-capitalize d-flex gap-2">
                        <i class="tio-briefcase"></i>
                        <?php echo e(translate('app_download_info')); ?>

                    </h5>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <div class="d-flex gap-2 align-items-center text-capitalize mb-3">
                                <img width="22" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/apple.png')); ?>" alt="">
                                <?php echo e(translate('apple_store')); ?>:
                            </div>

                            <?php ($appStoreDownload = getWebConfig('download_app_apple_stroe')); ?>

                            <div class="bg-aliceblue p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                    <span class="title-color text-capitalize">
                                        <?php echo e(translate('download_link')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              data-placement="right"
                                              title="<?php echo e(translate('if_enabled_the_download_button_from_the_App_Store_will_be_visible_in_the_Footer_section')); ?>">
                                            <img width="16"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="app-store-download-status">
                                        <input type="checkbox" value="1" class="switcher_input toggle-switch-message"
                                               name="app_store_download_status"
                                               id="app-store-download-status"
                                               <?php echo e($appStoreDownload['status'] == 1 ? 'checked':''); ?>

                                               data-modal-id="toggle-modal"
                                               data-toggle-id="app-store-download-status"
                                               data-on-image="app-store-download-on.png"
                                               data-off-image="app-store-download-off.png"
                                               data-on-title="<?php echo e(translate('want_to_Turn_OFF_the_App_Store_button')); ?>"
                                               data-off-title="<?php echo e(translate('want_to_Turn_ON_the_App_Store_button')); ?>"
                                               data-on-message="<p><?php echo e(translate('if_disabled_the_App_Store_button_will_be_hidden_from_the_website_footer')); ?></p>"
                                               data-off-message="<p><?php echo e(translate('if_enabled_everyone_can_see_the_App_Store_button_in_the_website_footer')); ?></p>">
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <input type="url" name="app_store_download_url" class="form-control"
                                       value="<?php echo e($appStoreDownload['link'] ?? ''); ?>"
                                       placeholder="<?php echo e(translate('ex').':'.'https://www.apple.com/app-store/'); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex gap-2 align-items-center text-capitalize mb-3">
                                <img width="22" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/play_store.png')); ?>" alt="">
                                <?php echo e(translate('google_play_store').':'); ?>

                            </div>

                            <?php ($playStoreDownload = getWebConfig('download_app_google_stroe')); ?>
                            <div class="bg-aliceblue p-3 rounded">
                                <div class="d-flex justify-content-between align-items-center gap-2 mb-2">
                                    <span class="title-color text-capitalize">
                                        <?php echo e(translate('download_link')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              data-placement="right"
                                              title="<?php echo e(translate('if_enabled_the_Google_Play_Store_will_be_visible_in_the_website_footer_section')); ?>">
                                            <img width="16"
                                                 src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>

                                    <label class="switcher" for="play-store-download-status">
                                        <input type="checkbox" value="1" class="switcher_input toggle-switch-message"
                                               name="play_store_download_status"
                                               id="play-store-download-status"
                                               <?php echo e($playStoreDownload['status'] == 1 ? 'checked':''); ?>

                                               data-modal-id="toggle-modal"
                                               data-toggle-id="play-store-download-status"
                                               data-on-image="play-store-download-on.png"
                                               data-off-image="play-store-download-off.png"
                                               data-on-title="<?php echo e(translate('want_to_Turn_OFF_the_Google_Play_Store_button')); ?>"
                                               data-off-title="<?php echo e(translate('want_to_Turn_ON_the_Google_Play_Store_button')); ?>"
                                               data-on-message="<p><?php echo e(translate('if_disabled_the_Google_Play_Store_button_will_be_hidden_from_the_website_footer')); ?></p>"
                                               data-off-message="<p><?php echo e(translate('if_enabled_everyone_can_see_the_Google_Play_Store_button_in_the_website_footer')); ?></p>">
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <input type="url" name="play_store_download_url" class="form-control"
                                       value="<?php echo e($playStoreDownload['link'] ?? ''); ?>"
                                       placeholder="<?php echo e(translate('Ex: https://play.google.com/store/apps')); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/website-color.png')); ?>" alt="">
                                <?php echo e(translate('website_Color')); ?>

                            </h5>
                        </div>
                        <div class="card-body d-flex flex-wrap gap-4 justify-content-around">
                            <div class="form-group">
                                <input type="color" name="primary" value="<?php echo e($businessSetting['primary_color']); ?>"
                                       class="form-control form-control_color">
                                <div class="text-center">
                                    <div
                                        class="title-color mb-4 mt-3"><?php echo e(strtoupper($businessSetting['primary_color'])); ?></div>
                                    <label class="title-color text-capitalize"><?php echo e(translate('primary_Color')); ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="color" name="secondary" value="<?php echo e($businessSetting['secondary_color']); ?>"
                                       class="form-control form-control_color">
                                <div class="text-center">
                                    <div
                                        class="title-color mb-4 mt-3"><?php echo e(strtoupper($businessSetting['secondary_color'])); ?></div>
                                    <label class="title-color text-capitalize">
                                        <?php echo e(translate('secondary_Color')); ?>

                                    </label>
                                </div>
                            </div>
                            <?php if(theme_root_path() == 'theme_aster'): ?>
                                <div class="form-group">
                                    <input type="color" name="primary_light"
                                           value="<?php echo e($businessSetting['primary_color_light'] ?? '#CFDFFB'); ?>"
                                           class="form-control form-control_color">
                                    <div class="text-center">
                                        <div
                                            class="title-color mb-4 mt-3"><?php echo e($businessSetting['primary_color_light'] ?? '#CFDFFB'); ?></div>
                                        <label
                                            class="title-color text-capitalize"><?php echo e(translate('primary_Light_Color')); ?></label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/header-logo.png')); ?>" alt="">
                                <?php echo e(translate('website_header_logo')); ?>

                            </h5>
                            <span
                                class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Main website Logo']); ?></span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <div class="d-flex justify-content-center">
                                <img height="60" id="view-website-logo" alt=""
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'. $businessSetting['web_logo'] , type: 'backend-basic')); ?>">
                            </div>
                            <div class="mt-4 position-relative">
                                <input type="file" name="company_web_logo" id="website-logo"
                                       class="custom-file-input image-input" data-image-id="view-website-logo"
                                       accept=".webp, .jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label text-capitalize"
                                       for="website-logo"><?php echo e(translate('choose_file')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('website_footer_logo')); ?>

                            </h5>
                            <span
                                class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Main website Logo']); ?></span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <div class="d-flex justify-content-center">
                                <img height="60" id="view-website-footer-logo"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'. $businessSetting['footer_logo'] , type: 'backend-basic')); ?>"alt="">
                            </div>
                            <div class="position-relative mt-4">
                                <input type="file" name="company_footer_logo" id="website-footer-logo"
                                       class="custom-file-input image-input" data-image-id="view-website-footer-logo"
                                       accept=".webp, .jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label text-capitalize"
                                       for="website-footer-logo"><?php echo e(translate('choose_file')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('website_Favicon')); ?>

                            </h5>
                            <span class="badge badge-soft-info">( <?php echo e(translate('ratio').'1:1'); ?> )</span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <div class="d-flex justify-content-center">
                                <img height="60" id="view-website-fav-icon"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'. $businessSetting['fav_icon'] , type: 'backend-basic')); ?>" alt="">
                            </div>
                            <div class="position-relative mt-4">
                                <input type="file" name="company_fav_icon" id="website-fav-icon"
                                       class="custom-file-input image-input" data-image-id="view-website-fav-icon"
                                       accept=".webp, .jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label"
                                       for="website-fav-icon"><?php echo e(translate('choose_File')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('loading_gif')); ?>

                            </h5>
                            <span class="badge badge-soft-info">( <?php echo e(translate('ratio').'1:1'); ?>)</span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <div class="d-flex justify-content-center">
                                <img height="60" id="view-loader-icon"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'. $businessSetting['loader_gif'] , type: 'backend-basic')); ?>" alt="">
                            </div>
                            <div class="position-relative mt-4">
                                <input type="file" name="loader_gif" id="loader-icon"
                                       class="custom-file-input image-input" data-image-id="view-loader-icon"
                                       accept=".webp, .jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label text-capitalize"
                                       for="loader-icon"><?php echo e(translate('choose_file')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0 text-capitalize d-flex align-items-center gap-2">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/footer-logo.png')); ?>" alt="">
                                <?php echo e(translate('App_Logo')); ?>

                            </h5>
                            <span class="badge badge-soft-info"><?php echo e('('.'100X60'.'px'.')'); ?></span>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-around">
                            <div class="d-flex justify-content-center">
                                <img height="60" id="view-app-logo"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/company/'. $businessSetting['mob_logo'] , type: 'backend-basic')); ?>" alt="">
                            </div>
                            <div class="mt-4 position-relative">
                                <input type="file" name="company_mobile_logo" id="app-logo"
                                       class="custom-file-input image-input" data-image-id="view-app-logo"
                                       accept=".webp, .jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                <label class="custom-file-label text-capitalize"
                                       for="app-logo"><?php echo e(translate('choose_file')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn--primary text-capitalize px-4"><?php echo e(translate('save_information')); ?></button>
            </div>
        </form>
    </div>
    <span id="get-default-latitude" data-latitude="<?php echo e($default_location['lat']??'-33.8688'); ?>"></span>
    <span id="get-default-longitude" data-longitude="<?php echo e($default_location['lng']??'151.2195'); ?>"></span>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(getWebConfig('map_api_key')); ?>&callback=initAutocomplete&libraries=places&v=3.49"
        defer></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/business-setting.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/website-info.blade.php ENDPATH**/ ?>