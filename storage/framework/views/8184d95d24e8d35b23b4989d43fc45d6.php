<?php $__env->startSection('title', translate('product_Preview')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid text-start">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-10 mb-3">
            <div class="">
                <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                    <?php echo e(translate('product_details')); ?>

                </h2>
            </div>
        </div>

        <div class="card card-top-bg-element">
            <div class="card-body">
                <div>
                    <div class="media flex-nowrap flex-column flex-sm-row gap-3 flex-grow-1">
                        <div class="d-flex flex-column align-items-center __min-w-165px">
                            <a class="aspect-1 float-left overflow-hidden"
                               href="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'. $product['thumbnail'],type: 'backend-product')); ?>"
                               data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                <img class="avatar avatar-170 rounded-0"
                                     src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'. $product['thumbnail'],type: 'backend-product')); ?>"
                                     alt="">
                            </a>
                            <?php if($productActive): ?>
                                <a href="<?php echo e(route('product', $product['slug'])); ?>"
                                   class="btn btn-outline--primary mr-1 mt-2" target="_blank">
                                    <i class="tio-globe"></i>
                                    <?php echo e(translate('view_live')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                        <?php if($product->digital_file_ready && file_exists(base_path('storage/app/public/product/digital-product/'.$product->digital_file_ready))): ?>
                            <a href="<?php echo e(dynamicAsset(path: 'storage/app/public/product/digital-product/'.$product->digital_file_ready)); ?>"
                               class="btn btn-outline--primary mr-1" title="<?php echo e(translate('Download')); ?>">
                                <i class="tio-download"></i>
                                <?php echo e(translate('download')); ?>

                            </a>
                        <?php endif; ?>

                        <div class="d-block flex-grow-1 w-max-md-100">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <?php ($languages = getWebConfig(name:'pnc_language')); ?>
                                <?php ($defaultLanguage = 'en'); ?>
                                <?php ($defaultLanguage = $languages[0]); ?>
                                <ul class="nav nav-tabs w-fit-content mb-2">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item text-capitalize">
                                            <a class="nav-link lang-link <?php echo e($language == $defaultLanguage? 'active':''); ?>"
                                            href="javascript:"
                                            id="<?php echo e($language); ?>-link"><?php echo e(getLanguageName($language).'('.strtoupper($language).')'); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="pb-4">
                                    <a href="<?php echo e(route('vendor.products.update', [$product['id']])); ?>" class="btn btn-sm btn--primary"><?php echo e(translate('Edit')); ?> <i class="tio-edit"></i> </a>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap align-items-center flex-sm-nowrap justify-content-between gap-3 min-h-50">
                                <div class="d-flex flex-wrap gap-2 align-items-center">
                                    <?php if($product->product_type == 'physical' && !empty($product->color_image) && count(json_decode($product->color_image))>0): ?>
                                        <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colorImageKey => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if( $colorImageKey < 3 || count(json_decode($product->color_image, true)) < 5): ?>
                                                <a class="aspect-1 float-left overflow-hidden img_row<?php echo e($colorImageKey); ?>"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo->image_name, type: 'backend-product')); ?>"
                                                   data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                                    <img width="50" class="img-fit max-50" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo->image_name, type: 'backend-product')); ?>">
                                                </a>
                                            <?php elseif($colorImageKey == 3): ?>
                                                <a class="aspect-1 float-left overflow-hidden d-block border rounded-lg position-relative img_row<?php echo e($colorImageKey); ?>"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo->image_name, type: 'backend-product')); ?>"
                                                   data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                                    <img width="50" class="img-fit max-50" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo->image_name, type: 'backend-product')); ?>">
                                                    <div class="extra-images">
                                                    <span class="extra-image-count">
                                                        +<?php echo e((count(json_decode($product->color_image, true)) - $colorImageKey) + 1); ?>

                                                    </span>
                                                    </div>
                                                </a>
                                            <?php else: ?>
                                                <a class="aspect-1 float-left overflow-hidden d-none img_row<?php echo e($colorImageKey); ?>"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo->image_name, type: 'backend-product')); ?>"
                                                   data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                                    <img width="50" class="img-fit max-50" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo->image_name, type: 'backend-product')); ?>">
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageKey => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($imageKey < 3 || count(json_decode($product->images, true)) < 5): ?>
                                                <a class="aspect-1 float-left overflow-hidden"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type: 'backend-product')); ?>"
                                                   data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                                    <img width="50"  class="img-fit max-50" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type: 'backend-product')); ?>">
                                                </a>
                                            <?php elseif($imageKey == 3): ?>
                                                <a class="aspect-1 float-left overflow-hidden d-block border rounded-lg position-relative"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type: 'backend-product')); ?>"
                                                   data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                                    <img width="50"  class="img-fit max-50" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type: 'backend-product')); ?>">
                                                    <div class="extra-images">
                                                    <span class="extra-image-count">
                                                        +<?php echo e((count(json_decode($product->images, true)) - $imageKey) + 1); ?>

                                                    </span>
                                                    </div>
                                                </a>
                                            <?php else: ?>
                                                <a class="aspect-1 float-left overflow-hidden d-none"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type: 'backend-product')); ?>"
                                                   data-lightbox="product-gallery-<?php echo e($product['id']); ?>">
                                                    <img width="50"  class="img-fit max-50" alt=""
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/'.$photo, type: 'backend-product')); ?>">
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex gap-3 flex-nowrap justify-content-sm-end align-items-center lh-1 badge badge--primary-light height-30px ">
                                        <span class="text-dark">
                                            <?php echo e(count($product->orderDetails)); ?> <?php echo e(translate('orders')); ?>

                                        </span>
                                            <span class="border-left py-2"></span>
                                            <div class="review-hover position-relative cursor-pointer d-flex gap-2 align-items-center">
                                                <i class="tio-star"></i>
                                                <span>
                                                <?php echo e(count($product->rating)>0 ? number_format($product->rating[0]->average, 2, '.', ' '):0); ?>

                                            </span>
                                                <div class="review-details-popup">
                                                    <h6 class="mb-2"><?php echo e(translate('rating')); ?></h6>
                                                    <div class="">
                                                        <ul class="list-unstyled list-unstyled-py-2 mb-0">
                                                            <?php ($total = $product->reviews->count()); ?>

                                                            <li class="d-flex align-items-center font-size-sm">
                                                                <?php ($five = getRatingCount($product['id'], 5)); ?>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>">
                                                            <?php echo e(translate('5')); ?> <?php echo e(translate('star')); ?>

                                                        </span>
                                                                <div class="progress flex-grow-1">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: <?php echo e($total == 0 ? 0 : ($five/$total)*100); ?>%;"
                                                                         aria-valuenow="<?php echo e($total == 0 ? 0 : ($five/$total)*100); ?>"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($five); ?></span>
                                                            </li>

                                                            <li class="d-flex align-items-center font-size-sm">
                                                                <?php ($four=getRatingCount($product['id'],4)); ?>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('4')); ?> <?php echo e(translate('star')); ?></span>
                                                                <div class="progress flex-grow-1">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: <?php echo e($total == 0 ? 0 : ($four/$total)*100); ?>%;"
                                                                         aria-valuenow="<?php echo e($total == 0 ? 0 : ($four/$total)*100); ?>"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($four); ?></span>
                                                            </li>

                                                            <li class="d-flex align-items-center font-size-sm">
                                                                <?php ($three=getRatingCount($product['id'],3)); ?>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('3')); ?> <?php echo e(translate('star')); ?></span>
                                                                <div class="progress flex-grow-1">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: <?php echo e($total == 0 ? 0 : ($three/$total)*100); ?>%;"
                                                                         aria-valuenow="<?php echo e($total == 0 ? 0 : ($three/$total)*100); ?>"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($three); ?></span>
                                                            </li>

                                                            <li class="d-flex align-items-center font-size-sm">
                                                                <?php ($two=getRatingCount($product['id'],2)); ?>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('2')); ?> <?php echo e(translate('star')); ?></span>
                                                                <div class="progress flex-grow-1">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: <?php echo e($total == 0 ? 0 : ($two/$total)*100); ?>%;"
                                                                         aria-valuenow="<?php echo e($total == 0 ? 0 : ($two/$total)*100); ?>"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($two); ?></span>
                                                            </li>

                                                            <li class="d-flex align-items-center font-size-sm">
                                                                <?php ($one=getRatingCount($product['id'],1)); ?>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('1')); ?> <?php echo e(translate('star')); ?></span>
                                                                <div class="progress flex-grow-1">
                                                                    <div class="progress-bar" role="progressbar"
                                                                         style="width: <?php echo e($total == 0 ? 0 : ($one/$total)*100); ?>%;"
                                                                         aria-valuenow="<?php echo e($total == 0 ? 0 : ($one/$total)*100); ?>"
                                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span
                                                                    class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($one); ?></span>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="border-left py-2"></span>
                                            <span class="text-dark">
                                            <?php echo e($product->reviews->whereNotNull('comment')->count()); ?> <?php echo e(translate('reviews')); ?>

                                        </span>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <span><?php echo e(translate('Status')); ?></span>
                                        <?php if($product['request_status'] == 0): ?>
                                            <span class="__badge badge badge--primary-2"><?php echo e(translate('pending')); ?></span>
                                        <?php elseif($product['request_status'] == 1): ?>
                                            <span class="__badge badge badge-soft-success"><?php echo e(translate('approved')); ?></span>
                                        <?php else: ?>
                                            <span class="__badge badge badge-soft-danger"><?php echo e(translate('rejected')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="d-block mt-2">
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
                                    <div class="<?php echo e($language != 'en'? 'd-none':''); ?> lang-form" id="<?php echo e($language); ?>-form">
                                        <div class="d-flex">
                                            <h2 class="mb-2 pb-1 text-gulf-blue"><?php echo e($translate[$language]['name']??$product['name']); ?></h2>
                                        </div>
                                        <div class="">
                                            <label class="text-gulf-blue font-weight-bold"><?php echo e(translate('description').' : '); ?></label>
                                            <div class="rich-editor-html-content">
                                                <?php echo $translate[$language]['description']??$product['details']; ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex gap-3 flex-wrap">
                    <div class="border p-3 mobile-w-100 w-170">
                        <div class="d-flex flex-column mb-1">
                            <h6 class="font-weight-normal text-capitalize"><?php echo e(translate('total_sold')); ?> :</h6>
                            <h3 class="text-primary fs-18"><?php echo e($product['qtySum']); ?></h3>
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-normal text-capitalize"><?php echo e(translate('total_sold_amount')); ?> :</h6>
                            <h3 class="text-primary fs-18">
                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: ($product['priceSum'] * $product['qtySum']) - $product['discountSum']))); ?>

                            </h3>
                        </div>
                    </div>

                    <div class="row gy-3 flex-grow-1">
                        <div class="col-sm-6 col-xl-4">
                            <h4 class="mb-3 text-capitalize"><?php echo e(translate('general_information')); ?></h4>
                            <div class="pair-list">
                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('brand')); ?></span>
                                    <span>:</span>
                                    <span class="value">
                                        <?php echo e(isset($product->brand) ? $product->brand->default_name : translate('brand_not_found')); ?>

                                    </span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('category')); ?></span>
                                    <span>:</span>
                                    <span class="value">
                                        <?php echo e(isset($product->category) ? $product->category->default_name : translate('category_not_found')); ?>

                                    </span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('product_type')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e(translate($product->product_type)); ?></span>
                                </div>
                                <div>
                                    <span class="key text-nowrap text-capitalize"><?php echo e(translate('product_unit')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($product['unit']); ?></span>
                                </div>
                                <?php if($product->product_type == 'physical'): ?>
                                    <div>
                                        <span class="key text-nowrap"><?php echo e(translate('current_Stock')); ?></span>
                                        <span>:</span>
                                        <span class="value"><?php echo e($product->current_stock); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <h4 class="mb-3 text-capitalize"><?php echo e(translate('price_information')); ?></h4>
                            <div class="pair-list">
                                <div>
                                    <span class="key text-nowrap text-capitalize">
                                        <?php echo e(translate('unit_price')); ?>

                                    </span>
                                    <span>:</span>
                                    <span class="value">
                                        <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product->unit_price), currencyCode: getCurrencyCode())); ?>

                                    </span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('tax')); ?></span>
                                    <span>:</span>
                                    <?php if($product->tax_type =='percent'): ?>
                                        <span class="value">
                                            <?php echo e($product->tax); ?>% (<?php echo e($product->tax_model); ?>)
                                        </span>
                                    <?php else: ?>
                                        <span class="value">
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product->tax))); ?> (<?php echo e($product->tax_model); ?>)
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <?php if($product->product_type == 'physical'): ?>
                                    <div>
                                        <span class="key text-nowrap text-capitalize">
                                            <?php echo e(translate('shipping_cost')); ?>

                                        </span>
                                        <span>:</span>
                                        <span class="value">
                                            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product->shipping_cost))); ?>

                                            <?php if($product->multiply_qty == 1): ?>
                                                (<?php echo e(translate('multiply_with_quantity')); ?>)
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <?php if($product->discount > 0): ?>
                                    <div>
                                        <span class="key text-nowrap">
                                            <?php echo e(translate('discount')); ?>

                                        </span>
                                        <span>:</span>
                                        <?php if($product->discount_type == 'percent'): ?>
                                            <span class="value"><?php echo e($product->discount); ?>%</span>
                                        <?php else: ?>
                                            <span class="value">
                                                <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product->discount), currencyCode: getCurrencyCode())); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('product_SKU')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($product->code); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if(count($product->tags)>0): ?>
                            <div class="col-sm-6 col-xl-4">
                                <h4 class="mb-3"><?php echo e(translate('tags')); ?></h4>
                                <div class="pair-list">
                                    <div>
                                        <span class="value">
                                            <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($tag['tag']); ?>

                                                <?php if($key === (count($product->tags)-1)): ?>
                                                    <?php break; ?>
                                                <?php endif; ?>
                                                ,
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>


        </div>
        <div class="row g-2 mt-3">
            <?php if(!empty($product['variation']) && count(json_decode($product['variation'])) >0): ?>
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="table-responsive datatable-custom">
                                <table
                                    class="table table-borderless table-nowrap table-align-middle card-table w-100 text-start">
                                    <thead class="thead-light thead-50 text-capitalize">
                                    <tr>
                                        <th class="text-center"><?php echo e(translate('SKU')); ?></th>
                                        <th class="text-center text-capitalize"><?php echo e(translate('variation_wise_price')); ?></th>
                                        <th class="text-center"><?php echo e(translate('stock')); ?></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = json_decode($product['variation']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center">
                                                <span class="py-1"><?php echo e($value->sku); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span class="py-1"><?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $value->price), currencyCode: getCurrencyCode())); ?></span>
                                            </td>
                                            <td class="text-center">
                                                <span class="py-1"><?php echo e(($value->qty)); ?></span>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg--primary--light">
                        <h5 class="card-title text-capitalize"><?php echo e(translate('product_SEO_&_meta_data')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <h6 class="mb-3 text-capitalize">
                                <?php echo e($product['meta_title'] ?? translate('meta_title_not_found').' '.'!'); ?>

                            </h6>
                        </div>
                        <p class="text-capitalize">
                            <?php echo e($product['meta_description'] ?? translate('meta_description_not_found').' '.'!'); ?>

                        </p>
                        <?php if($product['meta_image']): ?>
                            <div class="d-flex flex-wrap gap-2">
                                <a class="aspect-1 float-left overflow-hidden"
                                   href="<?php echo e(getValidImage(path: 'storage/app/public/product/meta/'.$product['meta_image'],type: 'backend-basic')); ?>"
                                   data-lightbox="meta-thumbnail">
                                    <img class="max-width-100px"
                                         src="<?php echo e(getValidImage(path: 'storage/app/public/product/meta/'.$product['meta_image'],type: 'backend-basic')); ?>" alt="<?php echo e(translate('meta_image')); ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header bg--primary--light">
                        <h5 class="card-title text-capitalize"><?php echo e(translate('product_video')); ?></h5>
                    </div>
                    <div class="card-body">
                        <div>
                            <h6 class="mb-3 text-capitalize">
                                <?php echo e($product['video_provider'].' '.translate('video_link')); ?>

                            </h6>
                        </div>
                        <?php if($product['video_url'] ): ?>
                            <a href="<?php echo e($product['video_url']); ?>" target="_blank" class="text-primary">
                                <?php echo e($product['video_url']); ?>

                            </a>
                        <?php else: ?>
                            <span><?php echo e(translate('no_data_to_show').' '.'!'); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($product->denied_note && $product['request_status'] == 2): ?>
                <div class="col-md-12">
                    <div class="card h-100">
                        <div class="card-header bg--primary--light">
                            <h5 class="card-title text-capitalize"><?php echo e(translate('reject_reason')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <?php echo e($product->denied_note); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="card mt-3">
            <div class="table-responsive datatable-custom">
                <table
                    class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-start">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('reviewer')); ?></th>
                        <th><?php echo e(translate('rating')); ?></th>
                        <th><?php echo e(translate('review')); ?></th>
                        <th><?php echo e(translate('date')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($review->customer)): ?>
                            <tr>
                                <td><?php echo e($reviews->firstItem()+$key); ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded">
                                            <img class="avatar-img"
                                                 src="<?php echo e(getValidImage(path: 'storage/app/public/profile/'.$review->customer->image,type: 'backend-profile')); ?>"
                                                 alt="">
                                        </div>
                                        <div class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>">
                                            <span class="d-block h5 text-hover-primary mb-0">
                                                <?php echo e($review->customer['f_name']." ".$review->customer['l_name']); ?>

                                                <i class="tio-verified text-primary" data-toggle="tooltip"
                                                   data-placement="top" title="Verified Customer"></i>
                                            </span>
                                            <span class="d-block font-size-sm text-body">
                                                <?php echo e($review->customer->email ?? ""); ?>

                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2 text-primary">
                                        <i class="tio-star"></i>
                                        <span><?php echo e($review->rating); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-wrap max-w-400 min-w-200">
                                        <p>
                                            <?php echo e($review['comment']); ?>

                                        </p>
                                        <?php if(json_decode($review->attachment)): ?>
                                            <?php $__currentLoopData = json_decode($review->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a class="aspect-1 float-left overflow-hidden"
                                                   href="<?php echo e(getValidImage(path: 'storage/app/public/review/'.$img,type:'backend-basic')); ?>"
                                                   data-lightbox="review-gallery-<?php echo e($review['id']); ?>">
                                                    <img class="p-2" width="60" height="60"
                                                         src="<?php echo e(getValidImage(path: 'storage/app/public/review/'.$img,type:'backend-basic')); ?>" alt=""
                                                         data-onerror="<?php echo e(dynamicAsset(path: 'public/assets/front-end/img/image-place-holder.png')); ?>">
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <?php echo e(date('d M Y H:i:s',strtotime($review['updated_at']))); ?>

                                </td>
                                <td>
                                    <form
                                        action="<?php echo e(route('vendor.reviews.update-status', [$review['id'], $review->status ? 0 : 1])); ?>"
                                        method="get" id="reviews-status<?php echo e($review['id']); ?>-form">
                                        <label class="switcher mx-auto">
                                            <input type="checkbox" class="switcher_input toggle-switch-message"
                                                   name="status"
                                                   id="reviews-status<?php echo e($review['id']); ?>" value="1"
                                                   <?php echo e($review['status'] == 1 ? 'checked' : ''); ?>

                                                   data-modal-id="toggle-status-modal"
                                                   data-toggle-id="reviews-status<?php echo e($review['id']); ?>"
                                                   data-on-image="customer-reviews-on.png"
                                                   data-off-image="customer-reviews-off.png"
                                                   data-on-title="<?php echo e(translate('Want_to_Turn_ON_Customer_Reviews')); ?>"
                                                   data-off-title="<?php echo e(translate('Want_to_Turn_OFF_Customer_Reviews')); ?>"
                                                   data-on-message="<p><?php echo e(translate('if_enabled_anyone_can_see_this_review_on_the_user_website_and_customer_app')); ?></p>"
                                                   data-off-message="<p><?php echo e(translate('if_disabled_this_review_will_be_hidden_from_the_user_website_and_customer_app')); ?></p>">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <?php echo $reviews->links(); ?>

                </div>
            </div>

            <?php if(count($reviews)==0): ?>
                <div class="text-center p-4">
                    <img class="mb-3 w-160" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
                         alt="">
                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        'use strict';
        $(".lang-link").click(function (e) {
            e.preventDefault();
            $('.lang-link').removeClass('active');
            $(".lang-form").addClass('d-none');
            $(this).addClass('active');
            let formId = this.id;
            let lang = formId.split("-")[0];
            $("#" + lang + "-form").removeClass('d-none');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/vendor-views/product/view.blade.php ENDPATH**/ ?>