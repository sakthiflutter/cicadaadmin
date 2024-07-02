<div class="modal fade" id="social-share-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="social-share-popup">
                <header>
                    <span><?php echo e(translate('Share_Modal')); ?></span>
                    <div class="close" data-dismiss="modal" aria-label="Close"><i class="tio-clear"></i></div>
                </header>
                <div class="content">
                    <p class="text-center"><?php echo e(translate('Share_this_link_via')); ?></p>
                    <ul class="icons p-0">
                        <li>
                            <a href="javascript:"
                               class="share-on-social-media"
                               data-action="<?php echo e($link); ?>"
                               data-social-media-name="facebook.com/sharer/sharer.php?u=">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:" class="share-on-social-media"
                               data-action="<?php echo e($link); ?>"
                               data-social-media-name="twitter.com/intent/tweet?text=">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:" class="share-on-social-media"
                               data-action="<?php echo e($link); ?>"
                               data-social-media-name="linkedin.com/shareArticle?mini=true&url=">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:" class="share-on-social-media"
                               data-action="<?php echo e($link); ?>"
                               data-social-media-name="api.whatsapp.com/send?text=">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </li>
                    </ul>
                    <?php if(isset($link)): ?>
                        <p class="text-center pt-3"><?php echo e(translate('Or_copy_link')); ?></p>
                        <div class="field">
                            <i class="tio-link"></i>
                            <input type="text" readonly value="<?php echo e($link); ?>">
                            <button class="click-to-copy-data-value btn--primary" data-value="<?php echo e($link); ?>">
                                <?php echo e(translate('copy')); ?>

                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/moores/resources/themes/default/layouts/front-end/partials/modal/_social-share-modal.blade.php ENDPATH**/ ?>