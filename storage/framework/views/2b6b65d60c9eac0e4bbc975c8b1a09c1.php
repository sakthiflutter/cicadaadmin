<div class="modal fade" id="add-customer" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(translate('add_new_customer')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.customer.add')); ?>" method="post" id="product_form">
                    <?php echo csrf_field(); ?>
                    <div class="row pl-2">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('first_name')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="f_name" class="form-control" value="<?php echo e(old('f_name')); ?>"
                                       placeholder="<?php echo e(translate('first_name')); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('last_name')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="l_name" class="form-control" value="<?php echo e(old('l_name')); ?>"
                                       placeholder="<?php echo e(translate('last_name')); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pl-2">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('email')); ?><span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>"
                                       placeholder="<?php echo e(translate('ex')); ?>: ex@example.com" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('phone')); ?><span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>"
                                       placeholder="<?php echo e(translate('phone')); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row pl-2">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('country')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="country" class="form-control" value="<?php echo e(old('country')); ?>"
                                       placeholder="<?php echo e(translate('country')); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('city')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" value="<?php echo e(old('city')); ?>"
                                       placeholder="<?php echo e(translate('city')); ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('zip_code')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="zip_code" class="form-control"
                                       value="<?php echo e(old('zip_code')); ?>" placeholder="<?php echo e(translate('zip_code')); ?>"
                                       required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label class="input-label"><?php echo e(translate('address')); ?> <span
                                        class="input-label-secondary text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" value="<?php echo e(old('address')); ?>"
                                       placeholder="<?php echo e(translate('address')); ?>" required>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="submit_new_customer"
                                class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/pos/partials/modals/_add-customer.blade.php ENDPATH**/ ?>