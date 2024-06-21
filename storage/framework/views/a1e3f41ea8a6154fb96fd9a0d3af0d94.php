<?php if(count($combinations[0]) > 0): ?>
    <table class="table physical_product_show table-borderless">
        <thead class="thead-light thead-50 text-capitalize">
        <tr>
            <th class="text-center">
                <label for="" class="control-label">
                    <?php echo e(translate('SL')); ?>

                </label>
            </th>
            <th class="text-center">
                <label for="" class="control-label">
                    <?php echo e(translate('attribute_Variation')); ?>

                </label>
            </th>
            <th class="text-center">
                <label for="" class="control-label">
                    <?php echo e(translate('variation_Wise_Price')); ?>

                    (<?php echo e(getCurrencySymbol()); ?>)
                </label>
            </th>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('SKU')); ?></label>
            </th>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('Variation_Wise_Stock')); ?></label>
            </th>
        </tr>
        </thead>
        <tbody>

        <?php
            $serial = 1;
        ?>

        <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $sku = '';
                foreach (explode(' ', $productName) as $value) {
                    $sku .= substr($value, 0, 1);
                }

                $str = '';
                foreach ($combination as $index => $item){
                    if($index > 0 ){
                        $str .= '-'.str_replace(' ', '', $item);
                        $sku .='-'.str_replace(' ', '', $item);
                    }
                    else{
                        if($colorsActive == 1){
                            $color_name = \App\Models\Color::where('code', $item)->first()->name;
                            $str .= $color_name;
                            $sku .='-'.$color_name;
                        }
                        else{
                            $str .= str_replace(' ', '', $item);
                            $sku .='-'.str_replace(' ', '', $item);
                        }
                    }
                }
            ?>

            <?php if(strlen($str) > 0): ?>
                <tr>
                    <td class="text-center">
                        <?php echo e($serial++); ?>

                    </td>
                    <td>
                        <label for="" class="control-label"><?php echo e($str); ?></label>
                    </td>
                    <td>
                        <input type="number" name="price_<?php echo e($str); ?>" value="<?php echo e($unitPrice); ?>" min="0" step="0.01"
                               class="form-control variation-price-input remove-symbol" required
                               placeholder="<?php echo e(translate('ex').': 100'); ?>">
                    </td>
                    <td>
                        <input type="text" name="sku_<?php echo e($str); ?>" value="<?php echo e(strtoupper($sku)); ?>" class="form-control" required
                               placeholder="<?php echo e(translate('ex').': MCU-47-V593-M'); ?>">
                    </td>
                    <td>
                        <input type="number" name="qty_<?php echo e($str); ?>" value="1" min="1"
                               max="1000000" step="1" class="form-control remove-symbol" required
                               placeholder="<?php echo e(translate('ex')); ?>: 5">
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php endif; ?>

<?php /**PATH /var/www/html/moores/resources/views/admin-views/product/partials/_sku_combinations.blade.php ENDPATH**/ ?>