
<?php $__currentLoopData = $chattingMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php ($genTimeGap = $message->created_at); ?>
    <?php if($message->sent_by_customer || $message->sent_by_delivery_man): ?>
        <div class="incoming_msg d-flex align-items-end gap-2">
            <div class="">
                <img class="avatar-img user-avatar-image border inbox-user-avatar-25" id="profile_image" width="40" height="40"
                     src="<?php echo e(request('type') == 'customer' ? getValidImage(path: 'storage/app/public/profile/'.$lastChatUser['image'],type: 'backend-profile') : getValidImage(path:'storage/app/public/delivery-man/'.$lastChatUser['image'],type: 'backend-profile')); ?>"
                     alt="Image Description">
            </div>
            <div class="received_msg" data-toggle="tooltip" data-custom-class="chatting-time min-w-0" data-title="<?php if($message->message): ?> <?php echo e($message->created_at->format('D')); ?> <?php echo e($message->created_at->format('h:i A')); ?> <?php endif; ?>">
                <div class="received_withdraw_msg">
                    <?php if(json_decode($message['attachment'])): ?>
                        <div class="row g-1 flex-wrap pt-1 w-140">
                            <?php $__currentLoopData = json_decode($message['attachment']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($index < 3 || count(json_decode($message['attachment'], true)) < 5): ?>
                                    <div class="col-6 position-relative img_row<?php echo e($index); ?>">
                                        <a data-lightbox="message-group-items-<?php echo e($message['id']); ?>"
                                           href="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>"
                                           class="aspect-1 overflow-hidden d-block border rounded-lg position-relative">
                                            <img class="img-fit" alt=""
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>">
                                        </a>
                                    </div>
                                <?php elseif($index == 3): ?>
                                    <div class="col-6 position-relative img_row<?php echo e($index); ?>">
                                        <a data-lightbox="message-group-items-<?php echo e($message['id']); ?>"
                                           href="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>"
                                           class="aspect-1 overflow-hidden d-block border rounded-lg position-relative">
                                            <img class="img-fit" alt=""
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>">
                                            <div class="extra-images">
                                                    <span class="extra-image-count">
                                                        +<?php echo e(count(json_decode($message['attachment'], true)) - $index); ?>

                                                    </span>
                                            </div>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="col-6 position-relative d-none img_row<?php echo e($index); ?>">
                                        <a data-lightbox="message-group-items-<?php echo e($message['id']); ?>"
                                           href="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>"
                                           class="aspect-1 overflow-hidden d-block border rounded position-relative">
                                            <img class="img-fit" alt=""
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>">
                                            <div class="extra-images">
                                                    <span class="extra-image-count">
                                                        +<?php echo e(count(json_decode($message['attachment'], true)) - $index); ?>

                                                    </span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($message->message): ?>
                        <div class="message-text-section rounded mb-1">
                            <p class="m-0 pb-1">
                                <?php echo e($message->message); ?>

                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="outgoing_msg mb-0">
            <div class="sent_msg p-2" data-toggle="tooltip" data-custom-class="chatting-time min-w-0" data-title="<?php if($message->message): ?> <?php echo e($message->created_at->format('D')); ?> <?php echo e($message->created_at->format('h:i A')); ?> <?php endif; ?>">
                <?php if(json_decode($message['attachment'])): ?>
                    <div class="d-flex justify-content-end flex-wrap mb-2">
                        <div class="row g-1 flex-wrap pt-1 justify-content-end w-140">
                            <?php $__currentLoopData = json_decode($message['attachment']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secondIndex => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($secondIndex < 3 || count(json_decode($message['attachment'], true)) < 5): ?>
                                    <div class="col-6 position-relative img_row<?php echo e($secondIndex); ?>">
                                        <a data-lightbox="message-group-items-<?php echo e($message['id']); ?>"
                                           href="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>"
                                           class="aspect-1 overflow-hidden d-block border rounded-lg position-relative">
                                            <img class="img-fit" alt=""
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>">
                                        </a>
                                    </div>
                                <?php elseif($secondIndex == 3): ?>
                                    <div class="col-6 position-relative img_row<?php echo e($secondIndex); ?>">
                                        <a data-lightbox="message-group-items-<?php echo e($message['id']); ?>"
                                           href="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>"
                                           class="aspect-1 overflow-hidden d-block border rounded-lg position-relative">
                                            <img class="img-fit" alt=""
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>">
                                            <div class="extra-images">
                                                <span class="extra-image-count">
                                                    +<?php echo e(count(json_decode($message['attachment'], true)) - $secondIndex); ?>

                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="col-6 position-relative d-none img_row<?php echo e($secondIndex); ?>">
                                        <a data-lightbox="message-group-items-<?php echo e($message['id']); ?>"
                                           href="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>"
                                           class="aspect-1 overflow-hidden d-block border rounded position-relative">
                                            <img class="img-fit" alt=""
                                                 src="<?php echo e(getValidImage(path:'storage/app/public/chatting/'.$photo,type: 'backend-basic')); ?>">
                                            <div class="extra-images">
                                                <span class="extra-image-count">
                                                    +<?php echo e(count(json_decode($message['attachment'], true)) - $secondIndex); ?>

                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(!empty($message->message)): ?>
                    <div class="message-text-section rounded mb-1">
                        <p class="m-0 pb-1">
                            <?php echo e($message->message); ?>

                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/moores/resources/views/vendor-views/chatting/messages.blade.php ENDPATH**/ ?>