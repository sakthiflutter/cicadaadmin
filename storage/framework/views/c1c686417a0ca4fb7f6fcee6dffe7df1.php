<?php $__env->startSection('title', translate('deal_Update')); ?>
<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img width="20" src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/deal_of_the_day.png')); ?>" alt="">
                <?php echo e(translate('update_Deal_of_The_Day')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.deal.day-update',[$deal['id']])); ?>"
                              class="text-start onsubmit-disable-action-button"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <?php ($language = getWebConfig(name:'pnc_language')); ?>
                            <?php ($defaultLanguage = 'en'); ?>
                            <?php ($defaultLanguage = $language[0]); ?>
                            <ul class="nav nav-tabs w-fit-content mb-4">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item text-capitalize">
                                        <a class="nav-link lang-link <?php echo e($lang == $defaultLanguage? 'active':''); ?>"
                                           href="javascript:"
                                           id="<?php echo e($lang); ?>-link"><?php echo e(getLanguageName($lang).'('.strtoupper($lang).')'); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <div class="form-group">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if (count($deal['translations'])) {
                                                $translate = [];
                                                foreach ($deal['translations'] as $t) {
                                                    if ($t->locale == $lang && $t->key == "title") {
                                                        $translate[$lang]['title'] = $t->value;
                                                    }
                                                }
                                            }
                                        ?>
                                    <div class="row <?php echo e($lang != $defaultLanguage ? 'd-none':''); ?> lang-form"
                                         id="<?php echo e($lang); ?>-form">
                                        <div class="col-md-12">
                                            <label for="name" class="title-color"><?php echo e(translate('title')); ?>

                                                (<?php echo e(strtoupper($lang)); ?>)</label>
                                            <input type="text" name="title[]"
                                                   value="<?php echo e($lang==$defaultLanguage?$deal['title']:($translate[$lang]['title']??'')); ?>"
                                                   class="form-control" id="title"
                                                   placeholder="<?php echo e(translate('ex')); ?> : <?php echo e(translate('LUX')); ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <label for="name" class="title-color"><?php echo e(translate('products')); ?></label>
                                        <input type="text" class="product_id" name="product_id"
                                               value="<?php echo e($deal['product_id']); ?>" hidden>
                                        <div class="dropdown select-product-search w-100">
                                            <button class="form-control text-start dropdown-toggle select-product-button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo e(isset($deal->product) ? $deal->product->name : translate('product_not_found')); ?>

                                            </button>
                                            <div class="dropdown-menu w-100 px-2">
                                                <div class="search-form mb-3">
                                                    <button type="button" class="btn"><i class="tio-search"></i>
                                                    </button>
                                                    <input type="text"
                                                           class="js-form-search form-control search-bar-input search-product"
                                                           placeholder="<?php echo e(translate('search menu').'...'); ?>">
                                                </div>
                                                <div class="d-flex flex-column gap-3 max-h-200 overflow-y-auto overflow-x-hidden search-result-box">
                                                    <?php echo $__env->make('admin-views.partials._search-product',['products'=>$products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-3">
                                <button type="reset" id="reset"
                                        class="btn btn-secondary reset-button"><?php echo e(translate('reset')); ?></button>
                                <button type="submit" class="btn btn--primary"><?php echo e(translate('update')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/search-product.js')); ?>"></script>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/admin/deal.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/deal/day-update.blade.php ENDPATH**/ ?>