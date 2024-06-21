<div class="table-responsive">
    <table id="datatable"
           style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
           class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
        <thead class="thead-light thead-50 text-capitalize">
        <tr>
            <th><?php echo e(translate('SL')); ?></th>
            <th><?php echo e(translate('customer_Name')); ?></th>
            <th><?php echo e(translate('contact_Info')); ?></th>
            <th><?php echo e(translate('subject')); ?></th>
            <th class="text-center"><?php echo e(translate('reply_status')); ?></th>
            <th class="text-center"><?php echo e(translate('action')); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="background: <?php echo e($contact->seen==0?'#F8FBFE':'white'); ?>">
                <td><?php echo e($contacts->firstItem()+$key); ?></td>
                <td><?php echo e($contact['name']); ?></td>
                <td>
                    <div>
                        <div><?php echo e($contact['mobile_number']); ?></div>
                        <div><?php echo e($contact['email']); ?></div>
                    </div>
                </td>
                <td class="text-wrap"><?php echo e($contact['subject']); ?></td>
                <td class="text-center">
                    <?php if(empty($contact['reply'])): ?>
                        <span class="badge badge-secondary badge-secondary-2"><?php echo e(translate('not_sent')); ?> <i class="tio-all-done"></i></span>
                    <?php else: ?>
                        <span class="badge badge-success badge-success-2"><?php echo e(translate('sent')); ?> <i class="tio-all-done"></i></span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="d-flex gap-10 justify-content-center">
                        <a title="<?php echo e(translate('view')); ?>"
                           class="btn btn-outline-info btn-sm square-btn"
                           href="<?php echo e(route('admin.contact.view',$contact->id)); ?>">
                            <i class="tio-invisible"></i>
                        </a>
                        <a class="btn btn-outline-danger btn-sm delete delete-data-without-form"
                           data-id="<?php echo e($contact['id']); ?>"
                           data-action="<?php echo e(route('admin.contact.delete')); ?>"
                           title="<?php echo e(translate('delete')); ?>">
                            <i class="tio-delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<div class="table-responsive mt-4">
    <div class="px-4 d-flex justify-content-lg-end">
        <?php echo e($contacts->links()); ?>

    </div>
</div>
<?php if(count($contacts)==0): ?>
    <div class="text-center p-4">
        <img class="mb-3 w-160"
             src="<?php echo e(dynamicAsset(path: 'public/assets/back-end/svg/illustrations/sorry.svg')); ?>"
             alt="<?php echo e(translate('image_description')); ?>">
        <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/moores/resources/views/admin-views/contacts/_table.blade.php ENDPATH**/ ?>