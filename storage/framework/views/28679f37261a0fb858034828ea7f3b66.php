<?php $__env->startSection('title', translate('delivery_Restriction')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.css')); ?>"/>
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/business-setup.png')); ?>" alt="">
                <?php echo e(translate('business_setup')); ?>

            </h2>
            <div class="btn-group">
                <div class="ripple-animation" data-toggle="modal" data-target="#getInformationModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none" class="svg replaced-svg">
                        <path d="M9.00033 9.83268C9.23644 9.83268 9.43449 9.75268 9.59449 9.59268C9.75449 9.43268 9.83421 9.2349 9.83366 8.99935V5.64518C9.83366 5.40907 9.75366 5.21463 9.59366 5.06185C9.43366 4.90907 9.23588 4.83268 9.00033 4.83268C8.76421 4.83268 8.56616 4.91268 8.40616 5.07268C8.24616 5.23268 8.16644 5.43046 8.16699 5.66602V9.02018C8.16699 9.25629 8.24699 9.45074 8.40699 9.60352C8.56699 9.75629 8.76477 9.83268 9.00033 9.83268ZM9.00033 13.166C9.23644 13.166 9.43449 13.086 9.59449 12.926C9.75449 12.766 9.83421 12.5682 9.83366 12.3327C9.83366 12.0966 9.75366 11.8985 9.59366 11.7385C9.43366 11.5785 9.23588 11.4988 9.00033 11.4993C8.76421 11.4993 8.56616 11.5793 8.40616 11.7393C8.24616 11.8993 8.16644 12.0971 8.16699 12.3327C8.16699 12.5688 8.24699 12.7668 8.40699 12.9268C8.56699 13.0868 8.76477 13.1666 9.00033 13.166ZM9.00033 17.3327C7.84755 17.3327 6.76421 17.1138 5.75033 16.676C4.73644 16.2382 3.85449 15.6446 3.10449 14.8952C2.35449 14.1452 1.76088 13.2632 1.32366 12.2493C0.886437 11.2355 0.667548 10.1521 0.666992 8.99935C0.666992 7.84657 0.885881 6.76324 1.32366 5.74935C1.76144 4.73546 2.35505 3.85352 3.10449 3.10352C3.85449 2.35352 4.73644 1.7599 5.75033 1.32268C6.76421 0.88546 7.84755 0.666571 9.00033 0.666016C10.1531 0.666016 11.2364 0.884905 12.2503 1.32268C13.2642 1.76046 14.1462 2.35407 14.8962 3.10352C15.6462 3.85352 16.24 4.73546 16.6778 5.74935C17.1156 6.76324 17.3342 7.84657 17.3337 8.99935C17.3337 10.1521 17.1148 11.2355 16.677 12.2493C16.2392 13.2632 15.6456 14.1452 14.8962 14.8952C14.1462 15.6452 13.2642 16.2391 12.2503 16.6768C11.2364 17.1146 10.1531 17.3332 9.00033 17.3327ZM9.00033 15.666C10.8475 15.666 12.4206 15.0168 13.7195 13.7185C15.0184 12.4202 15.6675 10.8471 15.667 8.99935C15.667 7.15213 15.0178 5.57907 13.7195 4.28018C12.4212 2.98129 10.8481 2.33213 9.00033 2.33268C7.1531 2.33268 5.58005 2.98185 4.28116 4.28018C2.98227 5.57852 2.3331 7.15157 2.33366 8.99935C2.33366 10.8466 2.98283 12.4196 4.28116 13.7185C5.57949 15.0174 7.15255 15.6666 9.00033 15.666Z" fill="currentColor"></path>
                    </svg>
                </div>
            </div>
        </div>
        <?php echo $__env->make('admin-views.business-settings.business-setup-inline-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0 text-capitalize d-flex gap-2">
                    <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/delivery2.png')); ?>" alt="">
                    <?php echo e(translate('delivery')); ?>

                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control h-auto min-form-control-height mt-2" id="customer_wallet_section">
                            <span class="title-color">
                                <?php echo e(translate('delivery_available_country')); ?>

                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled,_you_can_choose_one_or_multiple_countries_for_product_delivery').'.'); ?>">
                                    <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                </span>
                            </span>
                            <form action="<?php echo e(route('admin.business-settings.delivery-restriction.country-restriction-status-change')); ?>" method="post" id="country-area-form" data-from="delivery-restriction">
                                <?php echo csrf_field(); ?>
                                <label class="switcher">
                                    <input type="checkbox" class="switcher_input toggle-switch-message" name="status" id="country-area" <?php echo e(isset($countryRestrictionStatus->value) && $countryRestrictionStatus->value  == 1 ? 'checked' : ''); ?> value="1"
                                           data-modal-id = "toggle-status-modal"
                                           data-toggle-id = "country-area"
                                           data-on-image = "delivery-available-country-on.png"
                                           data-off-image = "delivery-available-country-off.png"
                                           data-on-title = "<?php echo e(translate('want_to_Turn_ON_Delivery_Available_Country').'?'); ?>"
                                           data-off-title = "<?php echo e(translate('want_to_Turn_OFF_Delivery_Available_Country').'?'); ?>"
                                           data-on-message = "<p><?php echo e(translate('if_enabled_the_admin_or_vendor_can_deliver_orders_to_the_selected_countries')); ?></p>"
                                           data-off-message = "<p><?php echo e(translate('if_disabled_there_will_be_no_delivery_restrictions_for_admin_or_vendors')); ?></p>">
                                    <span class="switcher_control"></span>
                                </label>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center gap-10 form-control h-auto min-form-control-height mt-2" id="customer_wallet_section" >
                            <span class="title-color">
                                <?php echo e(translate('delivery_available_zip_code_area')); ?>

                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" data-placement="right" title="<?php echo e(translate('if_enabled,_the_zip_code_areas_will_be_available_for_delivery').'. '.translate('Please_Note').' : '.translate('If_you_don’t_enter_a_specific_zip_code_from_a_country,_that_area_won’t_be_available_for_delivery').'.'); ?>">
                                    <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                </span>
                            </span>

                            <form action="<?php echo e(route('admin.business-settings.delivery-restriction.zipcode-restriction-status-change')); ?>" method="post" id="zip-area-form" data-from="delivery-restriction">
                                <?php echo csrf_field(); ?>
                                <label class="switcher">
                                    <input type="checkbox" class="switcher_input toggle-switch-message" name="status" id="zip-area" <?php echo e(isset($zipCodeAreaRestrictionStatus) && $zipCodeAreaRestrictionStatus->value  == 1? 'checked' : ''); ?> value="1"
                                           data-modal-id = "toggle-status-modal"
                                           data-toggle-id = "zip-area"
                                           data-on-image = "zip-code-on.png"
                                           data-off-image = "zip-code-off.png"
                                           data-on-title = "<?php echo e(translate('want_to_Turn_ON_Delivery_Available_Zip_Code_Area').'?'); ?>"
                                           data-off-title = "<?php echo e(translate('want_to_Turn_OFF_Delivery_Available_Zip_Code_Area').'?'); ?>"
                                           data-on-message = "<p><?php echo e(translate('if_enabled_deliveries_will_be_available_only_in_the_added_zip_code_areas')); ?></p>"
                                           data-off-message = "<p><?php echo e(translate('if_disabled_there_will_be_no_delivery_restrictions_based_on_zip_code_areas')); ?></p>">
                                    <span class="switcher_control"></span>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-2">
            <div class="col-lg-6 <?php echo e(isset($countryRestrictionStatus->value) && $countryRestrictionStatus->value  != 1 ? 'd-none' : ''); ?>">
                <div class="card mb-3">
                    <div class="card-body country-disable">
                        <form action="<?php echo e(route('admin.business-settings.delivery-restriction.add-delivery-country')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label class="title-color d-flex font-weight-bold"><?php echo e(translate('country')); ?> </label>
                                <div class="d-flex gap-2">
                                    <select class="js-example-basic-multiple js-states js-example-responsive form-control"
                                            name="country_code[]" id="choice_attributes" multiple="multiple">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country['code']); ?>" <?php echo e(in_array($country['code'], $storedCountryCode) ? 'disabled' : ''); ?>>
                                                <?php echo e($country['name']); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('save')); ?></button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-6">
                            <div class="table-responsive">
                                <table id="datatable"
                                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                    <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(translate('sl')); ?></th>
                                        <th class="text-center"><?php echo e(translate('country_name')); ?></th>
                                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $storedCountries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <td class=""><?php echo e($storedCountries->firstItem() + $key); ?></td>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($store->country_code == $country['code']): ?>
                                                <td class="text-center"><?php echo e($country['name']); ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a class="btn btn-outline-danger btn-sm square-btn delete-data"
                                                   href="javascript:" title="<?php echo e(translate('delete')); ?>" data-id="country-<?php echo e($store->id); ?>">
                                                    <i class="tio-delete"></i>
                                                </a>
                                                <form
                                                    action="<?php echo e(route('admin.business-settings.delivery-restriction.delivery-country-delete',['id' => $store->id])); ?>"
                                                    method="post" id="country-<?php echo e($store->id); ?>">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                </form>
                                            </div>
                                        </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3">
                                                <div class="text-center p-4">
                                                    <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>" alt="Image Description">
                                                    <p class="mb-0"><?php echo e(translate('no_country_found')); ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive mt-4">
                                <div class="d-flex justify-content-lg-end">
                                    <?php echo e($storedCountries->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 <?php echo e(isset($zipCodeAreaRestrictionStatus) && $zipCodeAreaRestrictionStatus->value  != 1? 'd-none' : ''); ?>">
                <div class="card mb-3">
                    <div class="card-body zip-disable">
                        <form action="<?php echo e(route('admin.business-settings.delivery-restriction.add-zip-code')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <label class="title-color d-flex font-weight-bold"> <?php echo e(translate('zip_code')); ?> </label>
                            <div class="d-flex gap-2">
                                <input type="text" class="form-control bootstrap-tags-input" name="zipcode" placeholder="<?php echo e(translate('enter_zip_code')); ?>" data-role="tagsinput" required>
                                <button type="submit" class="btn btn--primary px-4 zip_code"><?php echo e(translate('save')); ?></button>
                            </div>
                            <p class="mt-2">* <?php echo e(translate('multiple_zip_codes_can_be_inputted_by_comma_separating_or_pressing_enter_button')); ?></p>
                        </form>
                        <div class="mt-6">
                            <div class="table-responsive">
                                <table id="datatable"
                                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                                    <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th><?php echo e(translate('sl')); ?></th>
                                        <th class="text-center"><?php echo e(translate('zip_code')); ?></th>
                                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $storedZip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $zip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($storedZip->firstItem() + $key); ?></td>
                                            <td class="text-center"><?php echo e($zip->zipcode); ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a class="btn btn-outline-danger btn-sm square-btn delete-data" href="javascript:"
                                                       title="<?php echo e(translate('delete')); ?>" data-id="zip-<?php echo e($zip->id); ?>">
                                                        <i class="tio-delete"></i>
                                                    </a>
                                                    <form
                                                        action="<?php echo e(route('admin.business-settings.delivery-restriction.zip-code-delete',['id' => $zip->id])); ?>"
                                                        method="post" id="zip-<?php echo e($zip->id); ?>">
                                                        <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3">
                                                <div class="text-center p-4">
                                                    <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>" alt="Image Description">
                                                    <p class="mb-0"><?php echo e(translate('no_zip_code_found')); ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive mt-4">
                                <div class="d-flex justify-content-lg-end">
                                    <?php echo e($storedZip->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="getInformationModal" tabindex="-1" aria-labelledby="getInformationModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0 d-flex justify-content-end">
                    <button type="button" class="btn-close border-0" data-dismiss="modal" aria-label="Close"><i
                            class="tio-clear"></i></button>
                </div>
                <div class="modal-body px-4 px-sm-5 pt-0">
                    <div class="swiper mySwiper pb-3">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <img width="80" class="mb-3"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/delivery-restriction.png')); ?>" loading="lazy"
                                         alt="">
                                    <h4 class="lh-md mb-3 text-capitalize"><?php echo e(translate('delivery_restriction')); ?></h4>
                                    <ul class="d-flex flex-column px-4 gap-2 mb-4">
                                        <li>
                                            <?php echo e(translate('run_eCommerce_business_in_your_country_and_beyond').'.'); ?>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <h4 class="lh-md mb-3 text-capitalize"><?php echo e(translate('how_does_it_work').'?'); ?></h4>
                                    <ul class="d-flex flex-column px-4 gap-2 mb-4">
                                        <li>
                                            <?php echo e(translate('step').' '.'1'.' :'.translate('enable').' ‘'.translate('Delivery_Available_Country').'’ '.'['.translate('if_you_want_to_run_your_business_in_a_specific_country').']'); ?>

                                        </li>
                                        <li><?php echo e(translate('step').' '.'2'.' :'.translate('choose_Country').'(s)'); ?></li>
                                        <li><?php echo e(translate('step').' '.'3'.' :'.translate('enable').' ‘'.translate('Delivery_Available_Zip_Code_Area').'’ '); ?></li>
                                        <li><?php echo e(translate('step').' '.'4'.' :'.translate('Enter_Zip_Code').'(s)'.translate('of_the_country_you’ve_selected')); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center gap-2">
                                    <h4 class="lh-md mb-3 text-capitalize"><?php echo e(translate('important_note')); ?><i></i></h4>
                                    <ul class="d-flex flex-column px-4 gap-2 mb-4">
                                        <li><?php echo e(translate('if_both_features_are_disabled,_then_all_places_will_be_available_as_delivery_area')); ?>

                                        </li>
                                        <li><?php echo e(translate('If_only_the'.' ‘Delivery_Available_Country’ '.'feature_is_enabled,_and_you_add_your_preferred_country,_then_you’ll_be_able_to_deliver_all_over_the_country').'.'); ?> </li>
                                        <li><?php echo e(translate('If_only_the'.' ‘Delivery_Available_Zip_Code_Area’ '.'feature_is_enabled,_then_you’ll_be_able_to_deliver_on_all_the_zip_code_areas').'.'); ?>

                                        <li><?php echo e(translate('you_cannot_deliver_to_any_specific_country_or_zip_code_areas_if_it’s_not_added_and_saved').'.'); ?>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center gap-2 mb-4">
                                    <img width="80" class="mb-3"
                                         src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/confirmed.png')); ?>" loading="lazy"
                                         alt="">
                                    <h4 class="lh-md mb-3 text-capitalize"><?php echo e(translate('enjoy_a_borderless_business_experience_with_').getWebConfig('company_name').'!'); ?></h4>
                                    <ul class="d-flex flex-column px-4 gap-2 mb-4"></ul>
                                    <button class="btn btn-primary px-10 mt-3 text-capitalize" data-dismiss="modal"><?php echo e(translate('got_it')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination mb-2"></div>
                </div>
            </div>
        </div>
    </div>
    <span id="get-country-status" data-value="<?php echo e($countryRestrictionStatus?->value ?? 0); ?>"></span>
    <span id="get-zip-status" data-value="<?php echo e($zipCodeAreaRestrictionStatus?->value ?? 0); ?>"></span>
    <span id="get-zip-code-text" data-error="<?php echo e(translate('please_enter_zip_code')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/vendor/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/tags-input.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/business-setting/delivery-restriction.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/business-settings/delivery-restriction.blade.php ENDPATH**/ ?>