<?php $__env->startSection('title',translate('shipping_Address')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/css/intlTelInput.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<?php ($billingInputByCustomer=getWebConfig(name: 'billing_input_by_customer')); ?>
    <div class="container py-4 rtl __inline-56 px-0 px-md-3 text-align-direction">
        <div class="row mx-max-md-0">
            <div class="col-md-12 mb-3">
                <h3 class="font-weight-bold text-center text-lg-left"><?php echo e(translate('checkout')); ?></h3>
            </div>
            <section class="col-lg-8 px-max-md-0">
                <div class="checkout_details">
                <div class="px-3 px-md-3">
                    <?php echo $__env->make('web-views.partials._checkout-steps',['step'=>2], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                    <?php ($defaultLocation = getWebConfig(name: 'default_location')); ?>

                    <?php if($physical_product_view): ?>
                    <input type="hidden" id="physical_product" name="physical_product" value="<?php echo e($physical_product_view ? 'yes':'no'); ?>">
                        <div class="px-3 px-md-0">
                            <h4 class="pb-2 mt-4 fs-18 text-capitalize"><?php echo e(translate('shipping_address')); ?></h4>
                        </div>

                        <?php ($shippingAddresses=\App\Models\ShippingAddress::where(['customer_id'=>auth('customer')->id(), 'is_billing'=>0, 'is_guest'=>0])->get()); ?>
                        <form method="post" class="card __card" id="address-form">
                            <div class="card-body p-0">
                                <ul class="list-group">
                                    <li class="list-group-item add-another-address">
                                        <?php if($shippingAddresses->count() >0): ?>
                                            <div class="d-flex align-items-center justify-content-end gap-3">
                                                <div class="dropdown">
                                                    <button class="form-control dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo e(translate('saved_address')); ?>

                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right saved-address-dropdown scroll-bar-saved-address" aria-labelledby="dropdownMenuButton">
                                                        <?php $__currentLoopData = $shippingAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="dropdown-item select_shipping_address <?php echo e($key == 0 ? 'active' : ''); ?>" id="shippingAddress<?php echo e($key); ?>">
                                                            <input type="hidden" class="selected_shippingAddress<?php echo e($key); ?>" value="<?php echo e($address); ?>">
                                                            <input type="hidden" name="shipping_method_id" value="<?php echo e($address['id']); ?>">
                                                            <div class="media gap-2">
                                                                <div class="">
                                                                    <i class="tio-briefcase"></i>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="mb-1 text-capitalize"><?php echo e($address->address_type); ?></div>
                                                                    <div class="text-muted fs-12 text-capitalize text-wrap"><?php echo e($address->address); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div id="accordion">
                                            <div class="">
                                                <div class="mt-3">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('contact_person_name')); ?>

                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" class="form-control" name="contact_person_name" <?php echo e($shippingAddresses->count()==0?'required':''); ?> id="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('phone')); ?>

                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" class="form-control phone-input-with-country-picker" name="phone" id="phone" <?php echo e($shippingAddresses->count()==0?'required':''); ?>>
                                                                <input type="hidden" id="shipping_phone_view" class="country-picker-phone-number w-50" name="phone" readonly>
                                                            </div>
                                                        </div>
                                                        <?php if(!auth('customer')->check()): ?>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        <?php echo e(translate('email')); ?>

                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <input type="email" class="form-control"  name="email" id="email" <?php echo e($shippingAddresses->count()==0?'required':''); ?>>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('address_type')); ?></label>
                                                                <select class="form-control" name="address_type" id="address_type">
                                                                    <option value="permanent"><?php echo e(translate('permanent')); ?></option>
                                                                    <option value="home"><?php echo e(translate('home')); ?></option>
                                                                    <option value="others"><?php echo e(translate('others')); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('country')); ?>

                                                                    <span class="text-danger">*</span></label>
                                                                <select name="country" id="country" class="form-control selectpicker" data-live-search="true" required>
                                                                    <?php $__empty_1 = true; $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($country['name']); ?>"><?php echo e($country['name']); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <option value=""><?php echo e(translate('no_country_to_deliver')); ?></option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('city')); ?><span  class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="city" id="city" <?php echo e($shippingAddresses->count()==0?'required':''); ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('zip_code')); ?>

                                                                    <span class="text-danger">*</span></label>
                                                                <?php if($zip_restrict_status == 1): ?>
                                                                    <select name="zip" class="form-control selectpicker" data-live-search="true" id="select2-zip-container" required>
                                                                        <?php $__empty_1 = true; $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <option value="<?php echo e($code->zipcode); ?>"><?php echo e($code->zipcode); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                            <option value=""><?php echo e(translate('no_zip_to_deliver')); ?></option>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                <?php else: ?>
                                                                <input type="text" class="form-control"
                                                                       name="zip" id="zip" <?php echo e($shippingAddresses->count()==0?'required':''); ?>>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group mb-1">
                                                                <label><?php echo e(translate('address')); ?><span class="text-danger">*</span></label>
                                                                <textarea class="form-control" id="address" type="text" name="address" <?php echo e($shippingAddresses->count()==0?'required':''); ?>></textarea>
                                                                <span class="fs-14 text-danger font-semi-bold opacity-0 map-address-alert">
                                                                    <?php echo e(translate('note')); ?>: <?php echo e(translate('you_need_to_select_address_from_your_selected_country')); ?>

                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group location-map-canvas-area map-area-alert-border">
                                                        <input id="pac-input" class="controls rounded __inline-46 location-search-input-field" title="<?php echo e(translate('search_your_location_here')); ?>" type="text" placeholder="<?php echo e(translate('search_here')); ?>"/>
                                                        <div class="__h-200px" id="location_map_canvas"></div>
                                                    </div>

                                                    <div class="d-flex gap-3 align-items-center">
                                                        <label class="form-check-label d-flex gap-2 align-items-center" id="save_address_label">
                                                            <input type="hidden" name="shipping_method_id" id="shipping_method_id" value="0">
                                                            <?php if(auth('customer')->check()): ?>
                                                                <input type="checkbox" name="save_address" id="save_address">
                                                                <?php echo e(translate('save_this_Address')); ?>

                                                            <?php endif; ?>
                                                        </label>
                                                    </div>

                                                    <input type="hidden" id="latitude"
                                                           name="latitude" class="form-control d-inline"
                                                           placeholder="<?php echo e(translate('ex')); ?> : -94.22213"
                                                           value="<?php echo e($defaultLocation?$defaultLocation['lat']:0); ?>" required
                                                           readonly>
                                                    <input type="hidden"
                                                           name="longitude" class="form-control"
                                                           placeholder="<?php echo e(translate('ex')); ?> : 103.344322" id="longitude"
                                                           value="<?php echo e($defaultLocation?$defaultLocation['lng']:0); ?>" required
                                                           readonly>

                                                    <button type="submit" class="btn btn--primary d--none" id="address_submit"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    <?php endif; ?>

                    <?php if($billingInputByCustomer): ?>
                    <div>
                        <div class="billing-methods_label d-flex flex-wrap justify-content-between gap-2 mt-4 pb-3 px-3 px-md-0">
                            <h4 class="mb-0 fs-18 text-capitalize"><?php echo e(translate('billing_address')); ?></h4>

                            <?php ($billingAddresses=\App\Models\ShippingAddress::where(['customer_id'=>auth('customer')->id(), 'is_billing'=>1, 'is_guest'=>'0'])->get()); ?>
                            <?php if($physical_product_view): ?>
                                <div class="form-check d-flex gap-3 align-items-center">
                                    <input type="checkbox" id="same_as_shipping_address" name="same_as_shipping_address"
                                        class="form-check-input action-hide-billing-address" <?php echo e($billingInputByCustomer==1?'':'checked'); ?>>
                                    <label class="form-check-label" for="same_as_shipping_address">
                                        <?php echo e(translate('same_as_shipping_address')); ?>

                                    </label>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if(!$physical_product_view): ?>
                        <div class="rounded px-3 py-3 fs-15 text-base font-weight-medium custom-light-primary-color mb-3 d-flex align-items-center gap-2">
                            <img src="<?php echo e(theme_asset('public/assets/front-end/img/icons/info-light.svg')); ?>" alt="">
                            <span><?php echo e(translate('if_you_fill_up_this_section_this_address_will_use_in_future._if_need_to_send_to_you')); ?></span>
                        </div>
                        <?php endif; ?>

                        <form method="post" class="card __card" id="billing-address-form">
                            <div id="hide_billing_address" class="">
                                <ul class="list-group">

                                    <li class="list-group-item action-billing-address-hide">
                                        <?php if($billingAddresses->count() >0): ?>
                                            <div class="d-flex align-items-center justify-content-end gap-3">

                                                <div class="dropdown">
                                                    <button class="form-control dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo e(translate('saved_address')); ?>

                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right saved-address-dropdown scroll-bar-saved-address" aria-labelledby="dropdownMenuButton">
                                                        <?php $__currentLoopData = $billingAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="dropdown-item select_billing_address <?php echo e($key == 0 ? 'active' : ''); ?>" id="billingAddress<?php echo e($key); ?>">
                                                                <input type="hidden" class="selected_billingAddress<?php echo e($key); ?>" value="<?php echo e($address); ?>">
                                                                <input type="hidden" name="billing_method_id" value="<?php echo e($address['id']); ?>">
                                                                <div class="media gap-2">
                                                                    <div class="">
                                                                        <i class="tio-briefcase"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="mb-1 text-capitalize"><?php echo e($address->address_type); ?></div>
                                                                        <div class="text-muted fs-12 text-capitalize text-wrap"><?php echo e($address->address); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div id="accordion">
                                            <div class="">
                                                <div class="">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('contact_person_name')); ?><span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control"
                                                                    name="billing_contact_person_name" id="billing_contact_person_name"  <?php echo e($billingAddresses->count()==0?'required':''); ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('phone')); ?>

                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text" class="form-control phone-input-with-country-picker-2"
                                                                    id="billing_phone" <?php echo e($billingAddresses->count()==0 ? 'required' : ''); ?>>
                                                                <input type="hidden" class="country-picker-phone-number-2 w-50" name="billing_phone" readonly>
                                                            </div>
                                                        </div>
                                                        <?php if(!auth('customer')->check()): ?>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="exampleInputEmail1"><?php echo e(translate('email')); ?>

                                                                        <span class="text-danger">*</span></label>
                                                                    <input type="text" class="form-control"
                                                                        name="billing_contact_email" id="billing_contact_email" id <?php echo e($billingAddresses->count()==0?'required':''); ?>>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('address_type')); ?></label>
                                                                <select class="form-control" name="billing_address_type" id="billing_address_type">
                                                                    <option value="permanent"><?php echo e(translate('permanent')); ?></option>
                                                                    <option value="home"><?php echo e(translate('home')); ?></option>
                                                                    <option value="others"><?php echo e(translate('others')); ?></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('country')); ?><span class="text-danger">*</span></label>
                                                                <select name="billing_country" id="" class="form-control selectpicker" data-live-search="true" id="billing_country">
                                                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($country['name']); ?>"><?php echo e($country['name']); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"><?php echo e(translate('city')); ?><span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="billing_city"
                                                                    name="billing_city" <?php echo e($billingAddresses->count()==0?'required':''); ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label><?php echo e(translate('zip_code')); ?>

                                                                    <span class="text-danger">*</span></label>
                                                                <?php if($zip_restrict_status): ?>
                                                                    <select name="billing_zip" id="" class="form-control selectpicker" data-live-search="true" id="select_billing_zip">
                                                                        <?php $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($code->zipcode); ?>"><?php echo e($code->zipcode); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                <?php else: ?>
                                                                    <input type="text" class="form-control" id="billing_zip"
                                                                           name="billing_zip" <?php echo e($billingAddresses->count()==0?'required':''); ?>>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-1">
                                                        <label><?php echo e(translate('address')); ?><span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="billing_address" type="billing_text" name="billing_address" id="billing_address" <?php echo e($billingAddresses->count()==0?'required':''); ?>></textarea>

                                                        <span class="fs-14 text-danger font-semi-bold opacity-0 map-address-alert">
                                                            <?php echo e(translate('note')); ?>: <?php echo e(translate('you_need_to_select_address_from_your_selected_country')); ?>

                                                        </span>
                                                    </div>

                                                    <div class="form-group map-area-alert-border location-map-billing-canvas-area">
                                                        <input id="pac-input-billing" class="controls rounded __inline-46 location-search-input-field"
                                                            title="<?php echo e(translate('search_your_location_here')); ?>"
                                                            type="text"
                                                            placeholder="<?php echo e(translate('search_here')); ?>"/>
                                                        <div class="__h-200px" id="location_map_canvas_billing"></div>
                                                    </div>

                                                    <input type="hidden" name="billing_method_id" id="billing_method_id" value="0">
                                                    <?php if(auth('customer')->check()): ?>
                                                    <div class=" d-flex gap-3 align-items-center">
                                                        <label class="form-check-label d-flex gap-2 align-items-center" id="save-billing-address-label">
                                                            <input type="checkbox" name="save_address_billing" id="save_address_billing">
                                                            <?php echo e(translate('save_this_Address')); ?>

                                                        </label>
                                                    </div>
                                                    <?php endif; ?>

                                                    <input type="hidden" id="billing_latitude"
                                                        name="billing_latitude" class="form-control d-inline"
                                                        placeholder="<?php echo e(translate('ex')); ?> : -94.22213"
                                                        value="<?php echo e($defaultLocation?$defaultLocation['lat']:0); ?>" required
                                                        readonly>
                                                    <input type="hidden"
                                                        name="billing_longitude" class="form-control"
                                                        placeholder="<?php echo e(translate('ex')); ?> : 103.344322" id="billing_longitude"
                                                        value="<?php echo e($defaultLocation?$defaultLocation['lng']:0); ?>" required
                                                        readonly>

                                                    <button type="submit" class="btn btn--primary d--none" id="address_submit"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
            <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <span id="message-update-this-address" data-text="<?php echo e(translate('Update_this_Address')); ?>"></span>
    <span id="route-customer-choose-shipping-address-other" data-url="<?php echo e(route('customer.choose-shipping-address-other')); ?>"></span>
    <span id="default-latitude-address" data-value="<?php echo e($defaultLocation ? $defaultLocation['lat']:'-33.8688'); ?>"></span>
    <span id="default-longitude-address" data-value="<?php echo e($defaultLocation ? $defaultLocation['lng']:'151.2195'); ?>"></span>
    <span id="route-action-checkout-function" data-route="checkout-details"></span>
    <span id="system-country-restrict-status" data-value="<?php echo e($country_restrict_status); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/js/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/country-picker-init.js')); ?>"></script>
    <script>
        "use strict";
        const deliveryRestrictedCountries = <?php echo json_encode($countriesName, 15, 512) ?>;
        function deliveryRestrictedCountriesCheck(countryOrCode, elementSelector, inputElement) {
            const foundIndex = deliveryRestrictedCountries.findIndex(country => country.toLowerCase() === countryOrCode.toLowerCase());
            if (foundIndex !== -1) {
                $(elementSelector).removeClass('map-area-alert-danger');
                $(inputElement).parent().find('.map-address-alert').removeClass('opacity-100').addClass('opacity-0')
            } else {
                $(elementSelector).addClass('map-area-alert-danger');
                $(inputElement).val('')
                $(inputElement).parent().find('.map-address-alert').removeClass('opacity-0').addClass('opacity-100')
            }
        }
        initializePhoneInput(".phone-input-with-country-picker-2", ".country-picker-phone-number-2");
    </script>

    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/shipping.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(getWebConfig(name: 'map_api_key')); ?>&callback=mapsShopping&libraries=places&v=3.49" defer></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/checkout/shipping.blade.php ENDPATH**/ ?>