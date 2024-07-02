<?php $__env->startSection('title', translate('my_Address')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/vendor/nouislider/distribute/nouislider.min.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/css/address.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/css/intlTelInput.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="__account-address">
        <div class="modal fade rtl text-align-direction" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-name"><?php echo e(translate('add_new_address')); ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('address-store')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="donate-now d-flex gap-2">
                                        <li>
                                            <input type="radio" id="a25" name="addressAs" value="permanent"/>
                                            <label for="a25" class="component"><?php echo e(translate('permanent')); ?></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="a50" name="addressAs" value="home"/>
                                            <label for="a50" class="component"><?php echo e(translate('home')); ?></label>
                                        </li>
                                        <li>
                                            <input type="radio" id="a75" name="addressAs" value="office"
                                                   checked="checked"/>
                                            <label for="a75" class="component"><?php echo e(translate('office')); ?></label>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-6 d-flex">

                                    <ul class="donate-now d-flex gap-2">
                                        <li>
                                            <input type="radio" name="is_billing" id="b25" value="0" checked/>
                                            <label for="b25" class="billing_component"><?php echo e(translate('shipping')); ?></label>
                                        </li>
                                        <li>
                                            <input type="radio" name="is_billing" id="b50" value="1"/>
                                            <label for="b50" class="billing_component"><?php echo e(translate('billing')); ?></label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div id="home" class="container tab-pane active"><br>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">
                                                <?php echo e(translate('contact_person_name')); ?>

                                                <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control" type="text" id="name" name="name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="firstName">
                                                <?php echo e(translate('phone')); ?>

                                                <span class="text-danger">*</span>
                                            </label>

                                            <input class="form-control phone-input-with-country-picker" id="phone" type="text"
                                                   placeholder="<?php echo e(translate('enter_phone_number')); ?>" required>
                                            <input type="hidden" class="country-picker-phone-number w-50" name="phone" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="address-city">
                                                <?php echo e(translate('city')); ?>

                                                <span class="text-danger">*</span>
                                            </label>
                                            <input class="form-control" type="text" id="address-city" name="city"
                                                   required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="zip">
                                                <?php echo e(translate('zip_code')); ?>

                                                <span class="text-danger">*</span>
                                            </label>
                                            <?php if($zip_restrict_status): ?>
                                                <select name="zip" id="" class="form-control selectpicker"
                                                        data-live-search="true">
                                                    <?php $__currentLoopData = $zip_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                            value="<?php echo e($code->zipcode); ?>"><?php echo e($code->zipcode); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            <?php else: ?>
                                                <input class="form-control" type="text" id="zip" name="zip" required>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="address-city">
                                                <?php echo e(translate('country')); ?>

                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="country" id="" class="form-control selectpicker"
                                                    data-live-search="true">
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($d['name']); ?>"><?php echo e($d['name']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-1">
                                                <label for="address">
                                                    <?php echo e(translate('address')); ?>

                                                    <span class="text-danger">*</span>
                                                </label>

                                                <textarea class="form-control" id="address" type="text" name="address"
                                                          required></textarea>

                                                <span class="fs-14 text-danger font-semi-bold opacity-0 map-address-alert">
                                                    <?php echo e(translate('note')); ?>: <?php echo e(translate('you_need_to_select_address_from_your_selected_country')); ?>

                                                </span>
                                            </div>
                                        </div>

                                        <?php ($default_location=getWebConfig(name: 'default_location')); ?>
                                        <div class="col-md-12">
                                            <div class="form-group map-area-alert-border location-map-address-canvas-area">
                                                <input id="pac-input" class="controls rounded __inline-46 location-search-input-field"
                                                       title="<?php echo e(translate('search_your_location_here')); ?>" type="text"
                                                       placeholder="<?php echo e(translate('search_here')); ?>"/>
                                                <div class="__h-200px" id="location_map_canvas"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" id="latitude"
                                       name="latitude" class="form-control d-inline"
                                       placeholder="<?php echo e(translate('ex')); ?> : -94.22213"
                                       value="<?php echo e($default_location?$default_location['lat']:0); ?>" required readonly>
                                <input type="hidden"
                                       name="longitude" class="form-control"
                                       placeholder="<?php echo e(translate('ex')); ?> : 103.344322" id="longitude"
                                       value="<?php echo e($default_location?$default_location['lng']:0); ?>" required readonly>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(translate('close')); ?></button>
                                    <button type="submit"
                                            class="btn btn--primary"><?php echo e(translate('add_informations')); ?>  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <div class="container py-2 py-md-4 p-0 p-md-2 user-profile-container px-5px">
            <div class="row ">
                <?php echo $__env->make('web-views.partials._profile-aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <section class="col-lg-9 __customer-profile px-0">

                    <div class="card card-body border-0">
                        <div class="d-flex justify-content-between align-items-center mb-3 gap-2">
                            <h5 class="font-bold m-0 fs-16"><?php echo e(translate('my_Address')); ?></h5>
                            <div class="d-flex justify-content-end align-items-center mb-3 gap-2">
                                <button type="submit" class="btn btn--primary text-capitalize btn-sm d-flex align-items-center gap-1" data-toggle="modal"
                                        data-target="#exampleModal" id="add_new_address">
                                    <img src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/add-address-icon.png')); ?>" class=""
                                         alt="">
                                    <?php echo e(translate('add_address')); ?>

                                </button>

                                <div class="d-flex justify-content-end d-lg-none">
                                    <button class="profile-aside-btn btn btn--primary px-2 rounded px-2 py-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                             fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M7 9.81219C7 9.41419 6.842 9.03269 6.5605 8.75169C6.2795 8.47019 5.898 8.31219 5.5 8.31219C4.507 8.31219 2.993 8.31219 2 8.31219C1.602 8.31219 1.2205 8.47019 0.939499 8.75169C0.657999 9.03269 0.5 9.41419 0.5 9.81219V13.3122C0.5 13.7102 0.657999 14.0917 0.939499 14.3727C1.2205 14.6542 1.602 14.8122 2 14.8122H5.5C5.898 14.8122 6.2795 14.6542 6.5605 14.3727C6.842 14.0917 7 13.7102 7 13.3122V9.81219ZM14.5 9.81219C14.5 9.41419 14.342 9.03269 14.0605 8.75169C13.7795 8.47019 13.398 8.31219 13 8.31219C12.007 8.31219 10.493 8.31219 9.5 8.31219C9.102 8.31219 8.7205 8.47019 8.4395 8.75169C8.158 9.03269 8 9.41419 8 9.81219V13.3122C8 13.7102 8.158 14.0917 8.4395 14.3727C8.7205 14.6542 9.102 14.8122 9.5 14.8122H13C13.398 14.8122 13.7795 14.6542 14.0605 14.3727C14.342 14.0917 14.5 13.7102 14.5 13.3122V9.81219ZM12.3105 7.20869L14.3965 5.12269C14.982 4.53719 14.982 3.58719 14.3965 3.00169L12.3105 0.915687C11.725 0.330188 10.775 0.330188 10.1895 0.915687L8.1035 3.00169C7.518 3.58719 7.518 4.53719 8.1035 5.12269L10.1895 7.20869C10.775 7.79419 11.725 7.79419 12.3105 7.20869ZM7 2.31219C7 1.91419 6.842 1.53269 6.5605 1.25169C6.2795 0.970186 5.898 0.812187 5.5 0.812187C4.507 0.812187 2.993 0.812187 2 0.812187C1.602 0.812187 1.2205 0.970186 0.939499 1.25169C0.657999 1.53269 0.5 1.91419 0.5 2.31219V5.81219C0.5 6.21019 0.657999 6.59169 0.939499 6.87269C1.2205 7.15419 1.602 7.31219 2 7.31219H5.5C5.898 7.31219 6.2795 7.15419 6.5605 6.87269C6.842 6.59169 7 6.21019 7 5.81219V2.31219Z"
                                                  fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <?php if($shippingAddresses->count() ==0): ?>
                            <div class="text-center text-capitalize pb-5 pt-5">
                                <img class="mb-4" src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/icons/address.svg')); ?>"
                                     alt="" width="70">
                                <h5 class="fs-14"><?php echo e(translate('no_address_found')); ?>!</h5>
                            </div>
                        <?php endif; ?>
                        <div class="row g-3">

                            <?php $__currentLoopData = $shippingAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shippingAddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <section class="col-lg-6 col-md-6">
                                    <div class="card __shadow h-100">
                                        <div
                                            class="card-header d-flex justify-content-between d-flex align-items-center bg-aliceblue border-0">
                                            <div class="w-0 flex-grow-1">
                                                <h6 class="mb-0 fw-semibold">
                                                    <?php echo e(translate($shippingAddress['address_type'])); ?>

                                                    <span class="font-semibold fs-12">( <?php echo e($shippingAddress['is_billing']==1?translate('Billing_address'):translate('shipping_address')); ?> )</span>
                                                </h6>
                                            </div>
                                            <div class="d-flex justify-content-between gap-2 align-items-center">
                                                <a class="" title="Edit Address" id="edit"
                                                   href="<?php echo e(route('address-edit',$shippingAddress->id)); ?>">
                                                    <img
                                                        src="<?php echo e(theme_asset(path: 'public/assets/front-end/img/address-edit-icon.png')); ?>"
                                                        width="19" alt="">
                                                </a>

                                                <button class="no-gutter remove-address-by-modal"
                                                        data-link="<?php echo e(route('address-delete',['id'=>$shippingAddress->id])); ?>">
                                                    <i class="fa fa-trash fa-lg"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div>
                                                <span class="font-nameA">
                                                    <span class="fw-semibold min-w-60px">
                                                        <?php echo e(translate('Name')); ?> </span>
                                                    <span class="px-1">:</span>
                                                    <?php echo e($shippingAddress['contact_person_name']); ?>

                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-nameA">
                                                    <span class="fw-semibold min-w-60px">
                                                        <?php echo e(translate('phone')); ?>

                                                    </span>
                                                    <span class="px-1">:</span>
                                                    <?php echo e($shippingAddress['phone']); ?>

                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-nameA">
                                                    <span class="fw-semibold min-w-60px">
                                                        <?php echo e(translate('city')); ?>

                                                    </span>
                                                    <span class="px-1">:</span>
                                                    <?php echo e($shippingAddress['city']); ?>

                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-nameA">
                                                    <span class="fw-semibold min-w-60px">
                                                        <?php echo e(translate('zip_code')); ?>

                                                    </span>
                                                    <span class="px-1">:</span>
                                                    <?php echo e($shippingAddress['zip']); ?>

                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-nameA">
                                                    <span class="fw-semibold min-w-60px">
                                                        <?php echo e(translate('address')); ?>

                                                    </span>
                                                    <span class="px-1">:</span>
                                                    <?php echo e($shippingAddress['address']); ?>

                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-nameA">
                                                    <span class="fw-semibold min-w-60px">
                                                        <?php echo e(translate('country')); ?>

                                                    </span>
                                                    <span class="px-1">:</span>
                                                    <?php echo e($shippingAddress['country']); ?>

                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <span id="system-country-restrict-status" data-value="<?php echo e($country_restrict_status); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/account-address.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(getWebConfig(name: 'map_api_key')); ?>&libraries=places&v=3.49"></script>

    <script>
        "use strict";

        function initAutocomplete() {
            var myLatLng = {
                lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

            };

            const map = new google.maps.Map(document.getElementById("location_map_canvas"), {
                center: {
                    lat: <?php echo e($default_location?$default_location['lat']:'-33.8688'); ?>,
                    lng: <?php echo e($default_location?$default_location['lng']:'151.2195'); ?>

                },
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap(map);
            var geocoder = geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng(coordinates['lat'], coordinates['lng']);
                marker.setPosition(latlng);
                map.panTo(latlng);

                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                            document.getElementById('address').value = results[1].formatted_address;

                            let systemCountryRestrictStatus = $('#system-country-restrict-status').data('value');
                            if (systemCountryRestrictStatus) {
                                const countryObject = findCountryObject(results[1].address_components);
                                deliveryRestrictedCountriesCheck(countryObject.long_name, '.location-map-address-canvas-area', '#address')
                            }
                        }
                    }
                });
            });

            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });

                    google.maps.event.addListener(mrkr, "click", function (event) {
                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();
                    });

                    markers.push(mrkr);

                    if (place.geometry.viewport) {
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        $(document).on('ready', function () {
            initAutocomplete();
        });

        $(document).on("keydown", "input", function (e) {
            if (e.which == 13) e.preventDefault();
        });

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
    </script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/plugin/intl-tel-input/js/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(theme_asset(path: 'public/assets/front-end/js/country-picker-init.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/users-profile/account-address.blade.php ENDPATH**/ ?>