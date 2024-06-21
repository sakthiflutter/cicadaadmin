<?php $__env->startSection('title', translate('deal_Product')); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize">
                <img src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/img/inhouse-product-list.png')); ?>" class="mb-1 mr-1" alt="">
                <?php echo e(translate('add_new_product')); ?>

            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 text-capitalize"><?php echo e($deal['title']); ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.deal.add-product',[$deal['id']])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <label for="name" class="title-color"><?php echo e(translate('products')); ?></label>
                                        <div class="dropdown select-product-search w-100">
                                            <input type="text" class="product_id" name="product_id" hidden>
                                            <button class="form-control text-start dropdown-toggle text-capitalize select-product-button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo e(translate('select_product')); ?>


                                            </button>
                                            <div class="dropdown-menu w-100 px-2">
                                                <div class="search-form mb-3">
                                                    <button type="button" class="btn"><i class="tio-search"></i></button>
                                                    <input type="text" class="js-form-search form-control search-bar-input search-product"
                                                           placeholder="<?php echo e(translate('search menu').'...'); ?>">
                                                </div>
                                                <div
                                                    class="d-flex flex-column gap-3 max-h-200 overflow-y-auto overflow-x-hidden search-result-box">
                                                    <?php echo $__env->make('admin-views.partials._search-product',['products'=>$products], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('add')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="px-3 py-4">
                        <h5 class="mb-0 text-capitalize">
                            <?php echo e(translate('product_table')); ?>

                            <span class="badge badge-soft-dark radius-50 fz-12 ml-1"><?php echo e($dealProducts->total()); ?></span>
                        </h5>
                    </div>
                    <div class="table-responsive">
                        <table
                            class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('name')); ?></th>
                                <th><?php echo e(translate('price')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $dealProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($dealProducts->firstitem() + $key); ?></td>
                                    <td><a href="javascript:" target="_blank"
                                           class="font-weight-semibold title-color hover-c1"><?php echo e($product['name']); ?></a>
                                    </td>
                                    <td><?php echo e(usdToDefaultCurrency(amount: $product['unit_price'])); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a title="<?php echo e(translate ('delete')); ?>"
                                               class="btn btn-outline-danger btn-sm delete-data-without-form"
                                               data-action="<?php echo e(route('admin.deal.delete-product')); ?>" data-id="<?php echo e($product['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <table>
                            <tfoot>
                            <?php echo $dealProducts->links(); ?>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/js/search-product.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/views/admin-views/deal/add-product.blade.php ENDPATH**/ ?>