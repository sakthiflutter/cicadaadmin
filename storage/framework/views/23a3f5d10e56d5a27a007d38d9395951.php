<div class="pos-product-item card action-select-product" data-id="<?php echo e($product['id']); ?>">
    <div class="pos-product-item_thumb">
        <img class="img-fit" src="<?php echo e(getValidImage(path: 'storage/app/public/product/thumbnail/'.$product['thumbnail'], type: 'backend-product')); ?>"
             alt="<?php echo e($product['name']); ?>">
    </div>

    <div class="pos-product-item_content clickable">
        <div class="pos-product-item_title">
            <?php echo e($product['name']); ?>

        </div>
        <div class="pos-product-item_price">
            <?php echo e(setCurrencySymbol(amount: usdToDefaultCurrency(amount: $product['unit_price'] - getProductDiscount(product: $product, price: $product['unit_price'])), currencyCode: getCurrencyCode())); ?>

        </div>
        <div class="pos-product-item_hover-content">
            <div class="d-flex flex-wrap gap-2">
                <span class="fz-22 text-capitalize">
                    <?php echo e($product['product_type'] == 'physical' ? ($product['current_stock'] >0 ? $product['current_stock'].' '.$product['unit'].($product['current_stock']>1?'s':'') : translate('out_of_stock').'.') : translate('click_for_details').'.'); ?>

                </span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/pos/partials/_single-product.blade.php ENDPATH**/ ?>