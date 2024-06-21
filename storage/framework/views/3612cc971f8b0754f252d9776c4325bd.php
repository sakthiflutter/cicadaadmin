<div class="modal fade" id="add-discount" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(translate('update_discount')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="title-color"><?php echo e(translate('type')); ?></label>
                    <select name="type" id="type_ext_dis" class="form-control">
                        <option value="amount" <?php echo e(isset($discount_type) && $discount_type == 'amount' ? 'selected' : ''); ?>>
                            <?php echo e(translate('amount')); ?>

                        </option>
                        <option
                            value="percent" <?php echo e(isset($discount_type) && $discount_type == 'percent' ? 'selected' : ''); ?>>
                            <?php echo e(translate('percent')); ?>(%)
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="title-color"><?php echo e(translate('discount')); ?></label>
                    <input type="number" id="dis_amount" class="form-control" name="discount" placeholder="Ex: 500">
                </div>
                <div class="form-group">
                    <button class="btn btn--primary action-extra-discount" data-dismiss="modal">
                        <?php echo e(translate('submit')); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/pos/partials/modals/_add-discount.blade.php ENDPATH**/ ?>