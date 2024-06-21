<?php $__env->startSection('title', translate('product_Edit')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
            <h2 class="h1 mb-0 d-flex align-items-center gap-2">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                <?php echo e(translate('product_Edit')); ?>

            </h2>
        </div>

        <form class="product-form text-start" action="<?php echo e(route('admin.products.update',$product->id)); ?>" method="post"
              enctype="multipart/form-data" id="product_form">
            <?php echo csrf_field(); ?>

            <div class="card">
                <div class="px-4 pt-3">
                    <ul class="nav nav-tabs w-fit-content mb-4">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item text-capitalize">
                                <a class="nav-link form-system-language-tab  <?php echo e($language == $defaultLanguage? 'active':''); ?>" href="#"
                                   id="<?php echo e($language); ?>-link"><?php echo e(getLanguageName($language).'('.strtoupper($language).')'); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="card-body">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            if (count($product['translations'])) {
                                $translate = [];
                                foreach ($product['translations'] as $translation) {
                                    if ($translation->locale == $language && $translation->key == "name") {
                                        $translate[$language]['name'] = $translation->value;
                                    }
                                    if ($translation->locale == $language && $translation->key == "description") {
                                        $translate[$language]['description'] = $translation->value;
                                    }
                                }
                            }
                            ?>
                        <div class="<?php echo e($language != 'en'? 'd-none':''); ?> form-system-language-form" id="<?php echo e($language); ?>-form">
                            <div class="form-group">
                                <label class="title-color" for="<?php echo e($language); ?>_name"><?php echo e(translate('product_name')); ?>

                                    (<?php echo e(strtoupper($language)); ?>)</label>
                                <input type="text" <?php echo e($language == 'en'? 'required':''); ?> name="name[]"
                                       id="<?php echo e($language); ?>_name"
                                       value="<?php echo e($translate[$language]['name']??$product['name']); ?>"
                                       class="form-control" placeholder="<?php echo e(translate('new_Product')); ?>" required>
                            </div>
                            <input type="hidden" name="lang[]" value="<?php echo e($language); ?>">
                            <div class="form-group pt-4">
                                <label class="title-color"><?php echo e(translate('description')); ?>

                                    (<?php echo e(strtoupper($language)); ?>)</label>
                                <textarea name="description[]" class="summernote"
                                ><?php echo $translate[$language]['description']??$product['details']; ?></textarea>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <div class="card mt-3 rest-part">
                <div class="card-header">
                    <div class="d-flex gap-2">
                        <i class="tio-user-big"></i>
                        <h4 class="mb-0"><?php echo e(translate('general_setup')); ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="name" class="title-color"><?php echo e(translate('category')); ?></label>
                                <select class="js-example-basic-multiple js-states js-example-responsive form-control action-get-request-onchange"
                                    name="category_id"
                                    id="category_id"
                                    data-url-prefix="<?php echo e(url('/admin/products/get-categories?parent_id=')); ?>"
                                    data-element-id="sub-category-select"
                                    data-element-type="select">
                                    <option value="0" selected disabled>---<?php echo e(translate('select')); ?>---</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category['id']); ?>" <?php echo e($category->id==$product['category_id'] ? 'selected' : ''); ?>><?php echo e($category['defaultName']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label class="title-color"><?php echo e(translate('sub_Category')); ?></label>
                                <select
                                    class="js-example-basic-multiple js-states js-example-responsive form-control action-get-request-onchange"
                                    name="sub_category_id" id="sub-category-select"
                                    data-id="<?php echo e($product['sub_category_id']); ?>"
                                    data-url-prefix="<?php echo e(url('/admin/products/get-categories?parent_id=')); ?>"
                                    data-element-id="sub-sub-category-select"
                                    data-element-type="select">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label class="title-color"><?php echo e(translate('sub_Sub_Category')); ?></label>
                                <select
                                    class="js-example-basic-multiple js-states js-example-responsive form-control"
                                    data-id="<?php echo e($product['sub_sub_category_id']); ?>"
                                    name="sub_sub_category_id" id="sub-sub-category-select">
                                </select>
                            </div>
                        </div>
                        <?php if($brandSetting): ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label class="title-color"><?php echo e(translate('brand')); ?></label>
                                    <select
                                        class="js-example-basic-multiple js-states js-example-responsive form-control"
                                        name="brand_id">
                                        <option value="<?php echo e(null); ?>" selected disabled>---<?php echo e(translate('select')); ?>---
                                        </option>
                                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($brand['id']); ?>" <?php echo e($brand['id']==$product->brand_id ? 'selected' : ''); ?> ><?php echo e($brand['defaultName']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label class="title-color"><?php echo e(translate('product_type')); ?></label>
                                <select name="product_type" id="product_type" class="form-control" required>
                                    <option
                                        value="physical" <?php echo e($product->product_type=='physical' ? 'selected' : ''); ?>><?php echo e(translate('physical')); ?></option>
                                    <?php if($digitalProductSetting): ?>
                                        <option
                                            value="digital" <?php echo e($product->product_type=='digital' ? 'selected' : ''); ?>><?php echo e(translate('digital')); ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3" id="digital_product_type_show">
                            <div class="form-group">
                                <label for="digital_product_type"
                                       class="title-color"><?php echo e(translate("delivery_type")); ?></label>
                                <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                      title="<?php echo e(translate('for_“Ready_Product”_deliveries,_customers_can_pay_&_instantly_download_pre-uploaded_digital_products._For_“Ready_After_Sale”_deliveries,_customers_pay_first,_then_admin_uploads_the_digital_products_that_become_available_to_customers_for_download')); ?>">
                                    <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                </span>
                                <select name="digital_product_type" id="digital_product_type" class="form-control"
                                        required>
                                    <option value="<?php echo e(old('category_id')); ?>"
                                            <?php echo e(!$product->digital_product_type ? 'selected' : ''); ?> disabled>
                                        ---<?php echo e(translate('select')); ?>---
                                    </option>
                                    <option
                                        value="ready_after_sell" <?php echo e($product->digital_product_type=='ready_after_sell' ? 'selected' : ''); ?>><?php echo e(translate("ready_After_Sell")); ?></option>
                                    <option
                                        value="ready_product" <?php echo e($product->digital_product_type=='ready_product' ? 'selected' : ''); ?>><?php echo e(translate("ready_Product")); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3" id="digital_file_ready_show">
                            <div class="form-group">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <label for="digital_file_ready"
                                           class="title-color mb-0"><?php echo e(translate("upload_file")); ?></label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('upload_the_digital_products_from_here')); ?>">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="digital_file_ready"
                                               id="digital_file_ready" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label"
                                               for="digital_file_ready"><?php echo e(translate('choose_file')); ?></label>
                                    </div>
                                </div>

                                <div class="mt-2"><?php echo e(translate('file_type').': jpg, jpeg, png, gif, zip, pdf'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label class="title-color d-flex justify-content-between gap-2">
                                    <span class="d-flex align-items-center gap-2">
                                        <?php echo e(translate('product_SKU')); ?>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              title="<?php echo e(translate('create_a_unique_product_code_by_clicking_on_the_“Generate_Code”_button')); ?>">
                                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </span>
                                    <span class="style-one-pro cursor-pointer user-select-none text--primary action-onclick-generate-number" data-input="#generate_number">
                                        <?php echo e(translate('generate_code')); ?>

                                    </span>
                                </label>

                                <input type="text" id="generate_number" name="code" class="form-control"
                                       value="<?php echo e($product->code); ?>" placeholder="<?php echo e(translate('ex').': 161183'); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 physical_product_show">
                            <div class="form-group">
                                <label class="title-color"><?php echo e(translate('unit')); ?></label>
                                <select
                                    class="js-example-basic-multiple js-states js-example-responsive form-control"
                                    name="unit">
                                    <?php $__currentLoopData = units(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value=<?php echo e($unit); ?> <?php echo e($product->unit==$unit ? 'selected' : ''); ?>><?php echo e($unit); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="title-color d-flex align-items-center gap-2">
                                    <?php echo e(translate('search_tags')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('add_the_product_search_tag_for_this_product_that_customers_can_use_to_search_quickly')); ?>">
                                        <img width="16" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                             alt="">
                                    </span>
                                </label>
                                <input type="text" class="form-control" name="tags"
                                       value="<?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($c->tag.','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
                                       data-role="tagsinput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3 rest-part">
                <div class="card-header">
                    <div class="d-flex gap-2">
                        <i class="tio-user-big"></i>
                        <h4 class="mb-0"><?php echo e(translate('Pricing_&_others')); ?></h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-6 col-lg-4 col-xl-3 d-none">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"><?php echo e(translate('purchase_price')); ?>

                                        (<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>

                                        ) </label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('add_the_purchase_price_for_this_product')); ?>.">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <input type="number" min="0" step="0.01"
                                       placeholder="<?php echo e(translate('purchase_price')); ?>"
                                       name="purchase_price" class="form-control"
                                       value=<?php echo e(usdToDefaultCurrency($product->purchase_price)); ?> required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"><?php echo e(translate('unit_price')); ?>

                                        (<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>

                                        )</label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('set_the_selling_price_for_each_unit_of_this_product._This_Unit_Price_section_won’t_be_applied_if_you_set_a_variation_wise_price')); ?>.">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <input type="number" min="0" step="0.01"
                                       placeholder="<?php echo e(translate('unit_price')); ?>"
                                       name="unit_price" class="form-control"
                                       value=<?php echo e(usdToDefaultCurrency($product->unit_price)); ?> required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3" id="minimum_order_qty">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"
                                           for="minimum_order_qty"><?php echo e(translate('minimum_order_qty')); ?></label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('set_the_minimum_order_quantity_that_customers_must_choose._Otherwise,_the_checkout_process_won’t_start')); ?>.">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <input type="number" min="1" value=<?php echo e($product->minimum_order_qty); ?> step="1"
                                       placeholder="<?php echo e(translate('minimum_order_quantity')); ?>"
                                       name="minimum_order_qty" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 physical_product_show" id="quantity">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"
                                           for="current_stock"><?php echo e(translate('current_stock_qty')); ?></label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('add_the_Stock_Quantity_of_this_product_that_will_be_visible_to_customers')); ?>.">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>
                                <input type="number" min="0" value=<?php echo e($product->current_stock); ?> step="1"
                                       placeholder="<?php echo e(translate('quantity')); ?>"
                                       name="current_stock" id="current_stock" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"
                                           for="discount_Type"><?php echo e(translate('discount_Type')); ?></label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('if_“Flat”,_discount_amount_will_be_set_as_fixed_amount._If_“Percentage”,_discount_amount_will_be_set_as_percentage.')); ?>">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <select class="form-control" name="discount_type" id="discount_type">
                                    <option
                                        value="flat" <?php echo e($product['discount_type']=='flat'?'selected':''); ?>><?php echo e(translate('flat')); ?></option>
                                    <option
                                        value="percent" <?php echo e($product['discount_type']=='percent'?'selected':''); ?>><?php echo e(translate('percent')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color" for="discount">
                                        <?php echo e(translate('discount_amount')); ?>

                                        <span class="discount_amount_symbol">(<?php echo e($product->discount_type=='flat'? getCurrencySymbol(currencyCode: getCurrencyCode()) : '%'); ?>)</span>
                                    </label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('add_the_discount_amount_in_percentage_or_a_fixed_value_here')); ?>.">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <input type="number" min="0"
                                       value="<?php echo e($product->discount_type=='flat'?usdToDefaultCurrency($product->discount): $product->discount); ?>" step="0.01"
                                       placeholder="<?php echo e(translate('ex: 5')); ?>" name="discount" id="discount"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color" for="tax"><?php echo e(translate('tax_amount')); ?>(%)</label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('set_the_Tax_Amount_in_percentage_here')); ?>">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <input type="number" min="0" value=<?php echo e($product->tax ?? 0); ?> step="0.01"
                                       placeholder="<?php echo e(translate('tax')); ?>" name="tax" id="tax"
                                       class="form-control" required>
                                <input name="tax_type" value="percent" class="d-none">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"
                                           for="tax_model"><?php echo e(translate('tax_calculation')); ?></label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('set_the_tax_calculation_method_from_here._Select_“Include_with_product”_to_combine_product_price_and_tax_on_the_checkout._Pick_“Exclude_from_product”_to_display_product_price_and_tax_amount_separately.')); ?>">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>
                                <select name="tax_model" id="tax_model" class="form-control" required>
                                    <option
                                        value="include" <?php echo e($product->tax_model == 'include' ? 'selected':''); ?>><?php echo e(translate("include_with_product")); ?></option>
                                    <option
                                        value="exclude" <?php echo e($product->tax_model == 'exclude' ? 'selected':''); ?>><?php echo e(translate("exclude_with_product")); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 physical_product_show" id="shipping_cost">
                            <div class="form-group">
                                <div class="d-flex gap-2">
                                    <label class="title-color"><?php echo e(translate('shipping_cost')); ?>

                                        (<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>

                                        )</label>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('set_the_shipping_cost_for_this_product_here._Shipping_cost_will_only_be_applicable_if_product-wise_shipping_is_enabled.')); ?>">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>

                                <input type="number" min="0" value="<?php echo e(usdToDefaultCurrency($product->shipping_cost)); ?>"
                                       step="1"
                                       placeholder="<?php echo e(translate('shipping_cost')); ?>"
                                       name="shipping_cost" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6 physical_product_show" id="shipping_cost_multy">
                            <div class="form-group">
                                <div
                                    class="form-control h-auto min-form-control-height d-flex align-items-center flex-wrap justify-content-between gap-2">
                                    <div class="d-flex gap-2">
                                        <label class="title-color text-capitalize"
                                               for="shipping_cost"><?php echo e(translate('shipping_cost_multiply_with_quantity')); ?></label>

                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              title="<?php echo e(translate('if_enabled,_the_shipping_charge_will_increase_with_the_product_quantity')); ?>">
                                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </div>
                                    <div>
                                        <label class="switcher">
                                            <input class="switcher_input" type="checkbox" name="multiply_qty"
                                                   id="" <?php echo e($product['multiply_qty'] == 1?'checked':''); ?>>
                                            <span class="switcher_control"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3 rest-part physical_product_show">
                <div class="card-header">
                    <div class="d-flex gap-2">
                        <i class="tio-user-big"></i>
                        <h4 class="mb-0"><?php echo e(translate('product_variation_setup')); ?></h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="mb-3 d-flex align-items-center gap-2">
                                    <label class="mb-0 title-color">
                                        <?php echo e(translate('select_colors')); ?> :
                                    </label>
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher_input" id="product-color-switcher"
                                               name="colors_active" <?php echo e(count($product['colors'])>0?'checked':''); ?>>
                                        <span class="switcher_control"></span>
                                    </label>
                                </div>

                                <select
                                    class="js-example-basic-multiple js-states js-example-responsive form-control color-var-select"
                                    name="colors[]" multiple="multiple"
                                    id="colors-selector" <?php echo e(count($product['colors'])>0?'':'disabled'); ?>>
                                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value=<?php echo e($color->code); ?> <?php echo e(in_array($color->code,$product['colors'])?'selected':''); ?>>
                                            <?php echo e($color['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="choice_attributes" class="pb-1 title-color">
                                    <?php echo e(translate('select_attributes')); ?> :
                                </label>
                                <select
                                    class="js-example-basic-multiple js-states js-example-responsive form-control"
                                    name="choice_attributes[]" id="choice_attributes" multiple="multiple">
                                    <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($product['attributes']!='null'): ?>
                                            <option
                                                value="<?php echo e($attribute['id']); ?>" <?php echo e(in_array($attribute->id,json_decode($product['attributes'],true))?'selected':''); ?>>
                                                <?php echo e($attribute['name']); ?>

                                            </option>
                                        <?php else: ?>
                                            <option value="<?php echo e($attribute['id']); ?>"><?php echo e($attribute['name']); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2 mb-2">
                            <div class="row customer_choice_options mt-2" id="customer_choice_options">
                                <?php echo $__env->make('admin-views.product.partials._choices',['choice_no'=>json_decode($product['attributes']),'choice_options'=>json_decode($product['choice_options'],true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>

                            <div class="sku_combination table-responsive form-group mt-2" id="sku_combination">
                                <?php echo $__env->make('admin-views.product.partials._edit_sku_combinations',['combinations'=>json_decode($product['variation'],true)], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 rest-part">
                <div class="row g-2">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                    <div>
                                        <label for="name"
                                               class="title-color text-capitalize font-weight-bold mb-0"><?php echo e(translate('product_thumbnail')); ?></label>
                                        <span
                                            class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Product Image']); ?></span>
                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              title="<?php echo e(translate('add_your_products_thumbnail_in')); ?> JPG, PNG or JPEG <?php echo e(translate('format_within')); ?> 2MB">
                                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="custom_upload_input">
                                        <input type="file" name="image" class="custom-upload-input-file action-upload-color-image" id=""
                                               data-imgpreview="pre_img_viewer"
                                               accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">

                                        <?php if(File::exists(base_path('storage/app/public/product/thumbnail/'. $product->thumbnail))): ?>
                                            <span class="delete_file_input btn btn-outline-danger btn-sm square-btn d-flex">
                                                <i class="tio-delete"></i>
                                            </span>
                                        <?php else: ?>
                                            <span class="delete_file_input btn btn-outline-danger btn-sm square-btn d--none">
                                                <i class="tio-delete"></i>
                                            </span>
                                        <?php endif; ?>

                                        <div class="img_area_with_preview position-absolute z-index-2">
                                            <img id="pre_img_viewer" class="h-auto aspect-1 bg-white onerror-add-class-d-none" alt=""
                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product->thumbnail, type:'backend-product')); ?>">
                                        </div>
                                        <div
                                            class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img alt=""
                                                    src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>"
                                                    class="w-75">
                                                <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="text-muted mt-2"><?php echo e(translate('image_format')); ?> : <?php echo e("Jpg, png, jpeg, webp "); ?><br>
                                        <?php echo e(translate('image_size')); ?> : <?php echo e(translate('max')); ?> <?php echo e("2 MB"); ?></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 color_image_column d-none">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <label for="name"
                                           class="title-color text-capitalize font-weight-bold mb-0"><?php echo e(translate('colour_wise_product_image')); ?></label>
                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          title="<?php echo e(translate('add_color-wise_product_images_here')); ?>.">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </div>
                                <p class="text-muted"><?php echo e(translate('must_upload_colour_wise_images_first._Colour_is_shown_in_the_image_section_top_right.')); ?> </p>

                                <div id="color-wise-image-area" class="row g-2 mb-4">
                                    <div class="col-12">
                                        <div class="row g-2" id="color_wise_existing_image"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row g-2" id="color-wise-image-section"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="additional_image_column col-md-9">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                                    <div>
                                        <label for="name"
                                               class="title-color text-capitalize font-weight-bold mb-0"><?php echo e(translate('upload_additional_image')); ?></label>
                                        <span
                                            class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Product Image']); ?></span>
                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                              title="<?php echo e(translate('upload_any_additional_images_for_this_product_from_here')); ?>.">
                                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                        </span>
                                    </div>

                                </div>
                                <p class="text-muted"><?php echo e(translate('upload_additional_product_images')); ?></p>

                                <div class="coba-area">

                                    <div class="row g-2" id="additional_Image_Section">

                                        <?php if(count($product->colors) == 0): ?>
                                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php ($unique_id = rand(1111,9999)); ?>

                                                <div class="col-sm-12 col-md-4">
                                                    <div
                                                        class="custom_upload_input custom-upload-input-file-area position-relative border-dashed-2">

                                                        <a class="delete_file_input_css btn btn-outline-danger btn-sm square-btn"
                                                           href="<?php echo e(route('admin.products.delete-image',['id'=>$product['id'],'name'=>$photo])); ?>">
                                                            <i class="tio-delete"></i>
                                                        </a>

                                                        <div
                                                            class="img_area_with_preview position-absolute z-index-2 border-0">
                                                            <img id="additional_Image_<?php echo e($unique_id); ?>" alt=""
                                                                 class="h-auto aspect-1 bg-white onerror-add-class-d-none"
                                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type:'backend-product')); ?>">
                                                        </div>
                                                        <div
                                                            class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                            <div
                                                                class="d-flex flex-column justify-content-center align-items-center">
                                                                <img alt=""
                                                                    src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>"
                                                                    class="w-75">
                                                                <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php if($product->color_image): ?>
                                                <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($photo->color == null): ?>
                                                        <?php ($unique_id = rand(1111,9999)); ?>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div
                                                                class="custom_upload_input custom-upload-input-file-area position-relative border-dashed-2">
                                                                <a class="delete_file_input_css btn btn-outline-danger btn-sm square-btn"
                                                                   href="<?php echo e(route('admin.products.delete-image',['id'=>$product['id'],'name'=>$photo->image_name,'color'=>'null'])); ?>">
                                                                    <i class="tio-delete"></i>
                                                                </a>

                                                                <div
                                                                    class="img_area_with_preview position-absolute z-index-2 border-0">
                                                                    <img id="additional_Image_<?php echo e($unique_id); ?>" alt=""
                                                                         class="h-auto aspect-1 bg-white onerror-add-class-d-none"
                                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.($photo->image_name), type: 'backend-product')); ?>">
                                                                </div>
                                                                <div
                                                                    class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                                    <div
                                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                                        <img alt=""
                                                                            src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>"
                                                                            class="w-75">
                                                                        <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php ($unique_id = rand(1111,9999)); ?>

                                                    <div class="col-sm-12 col-md-4">
                                                        <div
                                                            class="custom_upload_input custom-upload-input-file-area position-relative border-dashed-2">
                                                            <a class="delete_file_input_css btn btn-outline-danger btn-sm square-btn"
                                                               href="<?php echo e(route('admin.products.delete-image',['id'=>$product['id'],'name'=>$photo])); ?>">
                                                                <i class="tio-delete"></i>
                                                            </a>

                                                            <div
                                                                class="img_area_with_preview position-absolute z-index-2 border-0">
                                                                <img id="additional_Image_<?php echo e($unique_id); ?>" alt=""
                                                                     class="h-auto aspect-1 bg-white onerror-add-class-d-none"
                                                                     src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type:'backend-product' )); ?>">
                                                            </div>
                                                            <div
                                                                class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                                <div
                                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                                    <img alt="" class="w-75"
                                                                        src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>">
                                                                    <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <div class="col-sm-12 col-md-4">
                                            <div class="custom_upload_input position-relative border-dashed-2">
                                                <input type="file" name="images[]" class="custom-upload-input-file action-add-more-image"
                                                       data-index="1" data-imgpreview="additional_Image_1"
                                                       accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                                       data-target-section="#additional_Image_Section">

                                                <span class="delete_file_input delete_file_input_section btn btn-outline-danger btn-sm square-btn d-none">
                                                    <i class="tio-delete"></i>
                                                </span>

                                                <div class="img_area_with_preview position-absolute z-index-2 border-0">
                                                    <img id="additional_Image_1" class="h-auto aspect-1 bg-white d-none" alt=""
                                                         src="">
                                                </div>
                                                <div
                                                    class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                    <div
                                                        class="d-flex flex-column justify-content-center align-items-center">
                                                        <img alt=""
                                                            src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>"
                                                            class="w-75">
                                                        <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="color_image" value="<?php echo e($product->color_image); ?>">
                <input type="hidden" id="images" value="<?php echo e($product->images); ?>">
                <input type="hidden" id="product_id" value="<?php echo e($product->id); ?>">
                <input type="hidden" id="remove_url" value="<?php echo e(route('admin.products.delete-image')); ?>">
            </div>

            <div class="card mt-3 rest-part">
                <div class="card-header">
                    <div class="d-flex gap-2">
                        <i class="tio-user-big"></i>
                        <h4 class="mb-0"><?php echo e(translate('product_video')); ?></h4>
                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                              title="<?php echo e(translate('add_the_YouTube_video_link_here._Only_the_YouTube-embedded_link_is_supported')); ?>.">
                            <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="title-color mb-0"><?php echo e(translate('youtube_video_link')); ?></label>
                        <span class="text-info"> ( <?php echo e(translate('optional_please_provide_embed_link_not_direct_link')); ?>. )</span>
                    </div>
                    <input type="text" value="<?php echo e($product['video_url']); ?>" name="video_url"
                           placeholder="<?php echo e(translate('ex').': https://www.youtube.com/embed/5R06LRdUCSE'); ?>"
                           class="form-control" required>
                </div>
            </div>

            <div class="card mt-3 rest-part">
                <div class="card-header">
                    <div class="d-flex gap-2">
                        <i class="tio-user-big"></i>
                        <h4 class="mb-0">
                            <?php echo e(translate('seo_section')); ?>

                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                  data-placement="top"
                                  title="<?php echo e(translate('add_meta_titles_descriptions_and_images_for_products').', '.translate('this_will_help_more_people_to_find_them_on_search_engines_and_see_the_right_details_while_sharing_on_other_social_platforms')); ?>">
                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                            </span>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="title-color">
                                    <?php echo e(translate('meta_Title')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          data-placement="top"
                                          title="<?php echo e(translate('add_the_products_title_name_taglines_etc_here').' '.translate('this_title_will_be_seen_on_Search_Engine_Results_Pages_and_while_sharing_the_products_link_on_social_platforms') .' [ '. translate('character_Limit')); ?> : 100 ]">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </label>
                                <input type="text" name="meta_title" value="<?php echo e($product['meta_title']); ?>" placeholder=""
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="title-color">
                                    <?php echo e(translate('meta_Description')); ?>

                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                          data-placement="top"
                                          title="<?php echo e(translate('write_a_short_description_of_the_InHouse_shops_product').' '.translate('this_description_will_be_seen_on_Search_Engine_Results_Pages_and_while_sharing_the_products_link_on_social_platforms') .' [ '. translate('character_Limit')); ?> : 100 ]">
                                        <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>" alt="">
                                    </span>
                                </label>
                                <textarea rows="4" type="text" name="meta_description"
                                          class="form-control"><?php echo e($product['meta_description']); ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex justify-content-center">
                                <div class="form-group w-100">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div>
                                            <label class="title-color" for="meta_Image">
                                                <?php echo e(translate('meta_Image')); ?>

                                            </label>
                                            <span
                                                class="badge badge-soft-info"><?php echo e(THEME_RATIO[theme_root_path()]['Meta Thumbnail']); ?></span>
                                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                                  title="<?php echo e(translate('add_Meta_Image_in')); ?> JPG, PNG or JPEG <?php echo e(translate('format_within')); ?> 2MB, <?php echo e(translate('which_will_be_shown_in_search_engine_results')); ?>.">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/info-circle.svg')); ?>"
                                                     alt="">
                                            </span>
                                        </div>

                                    </div>

                                    <div>
                                        <div class="custom_upload_input">
                                            <input type="file" name="meta_image"
                                                   class="custom-upload-input-file meta-img action-upload-color-image" id=""
                                                   data-imgpreview="pre_meta_image_viewer"
                                                   accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">

                                            <?php if(File::exists(base_path('storage/app/public/product/meta/'. $product['meta_image']))): ?>
                                                <span class="delete_file_input btn btn-outline-danger btn-sm square-btn d-flex">
                                                    <i class="tio-delete"></i>
                                                </span>
                                            <?php else: ?>
                                                <span class="delete_file_input btn btn-outline-danger btn-sm square-btn d--none">
                                                    <i class="tio-delete"></i>
                                                </span>
                                            <?php endif; ?>

                                            <div class="img_area_with_preview position-absolute z-index-2 d-flex">
                                                <img id="pre_meta_image_viewer" class="h-auto aspect-1 bg-white onerror-add-class-d-none" alt=""
                                                     src="<?php echo e(getValidImage(path: 'storage/app/public/product/meta/'. $product['meta_image'], type: 'backend-banner')); ?>">
                                            </div>
                                            <div
                                                class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <img alt=""
                                                        src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>"
                                                        class="w-75">
                                                    <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="button" class="btn btn--primary px-5 product-add-requirements-check">
                    <?php if($product->request_status == 2): ?>
                        <?php echo e(translate('update_&_Publish')); ?>

                    <?php else: ?>
                        <?php echo e(translate('update')); ?>

                    <?php endif; ?>
                </button>
            </div>

        </form>
    </div>

    <span id="route-admin-products-sku-combination" data-url="<?php echo e(route('admin.products.sku-combination')); ?>"></span>
    <span id="image-path-of-product-upload-icon" data-path="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>"></span>
    <span id="image-path-of-product-upload-icon-two" data-path="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/400x400/img2.jpg')); ?>"></span>
    <span id="message-enter-choice-values" data-text="<?php echo e(translate('enter_choice_values')); ?>"></span>
    <span id="message-upload-image" data-text="<?php echo e(translate('upload_Image')); ?>"></span>
    <span id="message-are-you-sure" data-text="<?php echo e(translate('are_you_sure')); ?>"></span>
    <span id="message-yes-word" data-text="<?php echo e(translate('yes')); ?>"></span>
    <span id="message-no-word" data-text="<?php echo e(translate('no')); ?>"></span>
    <span id="message-want-to-add-or-update-this-product" data-text="<?php echo e(translate('want_to_update_this_product')); ?>"></span>
    <span id="message-please-only-input-png-or-jpg" data-text="<?php echo e(translate('please_only_input_png_or_jpg_type_file')); ?>"></span>
    <span id="message-product-added-successfully" data-text="<?php echo e(translate('product_added_successfully')); ?>"></span>
    <span id="message-discount-will-not-larger-then-variant-price" data-text="<?php echo e(translate('the_discount_price_will_not_larger_then_Variant_Price')); ?>"></span>
    <span id="system-currency-code" data-value="<?php echo e(getCurrencySymbol(currencyCode: getCurrencyCode())); ?>"></span>
    <span id="system-session-direction" data-value="<?php echo e(Session::get('direction')); ?>"></span>


    <span id="message-file-size-too-big" data-text="<?php echo e(translate('file_size_too_big')); ?>"></span>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/tags-input.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/plugins/summernote/summernote.min.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/product-add-update.js')); ?>"></script>

    <script>
        "use strict";

        let colors = <?php echo e(count($product->colors)); ?>;
        let imageCount = <?php echo e(15-count(json_decode($product->images))); ?>;
        let thumbnail = '<?php echo e(productImagePath('thumbnail').'/'.$product->thumbnail ?? dynamicAsset(path: 'public/assets/back-end/img/400x400/img2.jpg')); ?>';
        $(function () {
            if (imageCount > 0) {
                $("#coba").spartanMultiImagePicker({
                    fieldName: 'images[]',
                    maxCount: colors === 0 ? 15 : imageCount,
                    rowHeight: 'auto',
                    groupClassName: 'col-6 col-md-4 col-xl-3 col-xxl-2',
                    maxFileSize: '',
                    placeholderImage: {
                        image: '<?php echo e(dynamicAsset(path: "public/assets/back-end/img/400x400/img2.jpg")); ?>',
                        width: '100%',
                    },
                    dropFileLabel: "Drop Here",
                    onAddRow: function (index, file) {
                    },
                    onRenderedPreview: function (index) {
                    },
                    onRemoveRow: function (index) {
                    },
                    onExtensionErr: function () {
                        toastr.error(messagePleaseOnlyInputPNGOrJPG, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    },
                    onSizeErr: function () {
                        toastr.error(messageFileSizeTooBig, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                });
            }

            $("#thumbnail").spartanMultiImagePicker({
                fieldName: 'image',
                maxCount: 1,
                rowHeight: 'auto',
                groupClassName: 'col-12',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(productImagePath('thumbnail').'/'. $product->thumbnail ?? dynamicAsset(path: 'public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%',
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function () {
                    toastr.error(messagePleaseOnlyInputPNGOrJPG, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function () {
                    toastr.error(messageFileSizeTooBig, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });

        });

        setTimeout(function () {
            $('.call-update-sku').on('change', function () {
                getUpdateSKUFunctionality();
            });
        }, 2000)

        function colorWiseImageFunctionality(t) {
            let colors = t.val();
            let color_image = $('#color_image').val() ? $.parseJSON($('#color_image').val()) : [];
            let images = $.parseJSON($('#images').val());
            let product_id = $('#product_id').val();
            let remove_url = $('#remove_url').val();

            let color_image_value = $.map(color_image, function (item) {
                return item.color;
            });

            $('#color_wise_existing_image').html('')
            $('#color-wise-image-section').html('')

            $.each(colors, function (key, value) {
                let value_id = value.replace('#', '');
                let in_array_image = $.inArray(value_id, color_image_value);
                let input_image_name = "color_image_" + value_id;

                $.each(color_image, function (color_key, color_value) {
                    if ((in_array_image !== -1) && (color_value['color'] === value_id)) {
                        let image_name = color_value['image_name'];
                        let exist_image_html = `
                            <div class="col-6 col-md-4 col-xl-4">
                                <div class="position-relative p-2 border-dashed-2">
                                    <div class="upload--icon-btns d-flex gap-2 position-absolute z-index-2 p-2" >
                                        <button type="button" class="btn btn-square text-white btn-sm" style="background: #${color_value['color']}"><i class="tio-done"></i></button>
                                        <a href="` + remove_url + `?id=` + product_id + `&name=` + image_name + `&color=` + color_value['color'] + `"
                                    class="btn btn-outline-danger btn-sm square-btn"><i class="tio-delete"></i></a>
                                    </div>
                                    <img class="w-100" height="auto"
                                        onerror="this.src='<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(dynamicStorage(path: 'storage/app/public/product')); ?>/`+image_name+`"
                                        alt="Product image">
                                </div>
                            </div>`;
                        $('#color_wise_existing_image').append(exist_image_html)
                    }
                });
            });

            $.each(colors, function (key, value) {
                let value_id = value.replace('#', '');
                let in_array_image = $.inArray(value_id, color_image_value);
                let input_image_name = "color_image_" + value_id;

                if (in_array_image === -1) {
                    let html = `<div class='col-6 col-md-4 col-xl-4'>
                                    <div class="position-relative p-2 border-dashed-2">
                                        <label style='border-radius: 3px; cursor: pointer; text-align: center; overflow: hidden; position : relative; display: flex; align-items: center; margin: auto; justify-content: center; flex-direction: column;'>
                                        <span class="upload--icon" style="background: ${value}">
                                        <i class="tio-edit"></i>
                                            <input type="file" name="` + input_image_name + `" id="` + value_id + `" class="d-none" accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required="">
                                        </span>

                                        <div class="h-100 top-0 aspect-1 w-100 d-flex align-content-center justify-content-center overflow-hidden">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/icons/product-upload-icon.svg')); ?>" class="w-75">
                                                <h3 class="text-muted"><?php echo e(translate('Upload_Image')); ?></h3>
                                            </div>
                                        </div>
                                    </label>
                                    </div>
                                    </div>`;
                    $('#color-wise-image-section').append(html)

                    $("#color-wise-image-section input[type='file']").each(function () {

                        let thisElement = $(this).closest('label');

                        function proPicURL(input) {
                            if (input.files && input.files[0]) {
                                let uploadedFile = new FileReader();
                                uploadedFile.onload = function (e) {
                                    thisElement.find('img').attr('src', e.target.result);
                                    thisElement.fadeIn(300);
                                    thisElement.find('h3').hide();
                                };
                                uploadedFile.readAsDataURL(input.files[0]);
                            }
                        }

                        $(this).on("change", function () {
                            proPicURL(this);
                        });
                    });
                }
            });
        }

        $(document).ready(function () {
            setTimeout(function () {
                let category = $("#category_id").val();
                let sub_category = $("#sub-category-select").attr("data-id");
                let sub_sub_category = $("#sub-sub-category-select").attr("data-id");
                getRequestFunctionality('<?php echo e(route('admin.products.get-categories')); ?>?parent_id=' + category + '&sub_category=' + sub_category, 'sub-category-select', 'select');
                getRequestFunctionality('<?php echo e(route('admin.products.get-categories')); ?>?parent_id=' + sub_category + '&sub_category=' + sub_sub_category, 'sub-sub-category-select', 'select');
            }, 100)
        });

        updateProductQuantity();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/product/edit.blade.php ENDPATH**/ ?>