<?php $__env->startSection('title',translate('FAQ')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="FAQ of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description"
          content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(dynamicStorage(path: 'storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="FAQ of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description"
          content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="__inline-60">
        <div class="container rtl">
            <div class="row">
                <div class="col-md-12 sidebar_heading text-center mb-2">
                    <h1 class="h3  mb-0 text-center headerTitle"><?php echo e(translate('frequently_asked_question')); ?></h1>
                </div>
            </div>
            <hr>
        </div>

        <div class="container pb-5 mb-2 mb-md-4 mt-3 rtl">
            <div class="row">
                <div class="col-lg-2"></div>
                <section class="col-lg-10 mt-3">
                    <section class="container pt-4 pb-5 ">
                        <div class="row pt-4">
                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <?php $length=count($helps); ?>
                                    <?php if($length%2!=0){$first=($length+1)/2;}else{$first=$length/2;}?>
                                    <?php for($i=0;$i<$first;$i++): ?>
                                        <div id="accordion">
                                            <div class="row mb-0 text-black">
                                                <div class="col-1 mt-3">
                                                    <i class="czi-book text-muted mr-2"></i>
                                                </div>
                                                <div class="col-11">
                                                    <button class="btnF btn-link collapsed text-align-direction" data-toggle="collapse"
                                                            data-target="#collapseTwo<?php echo e($helps[$i]['id']); ?>"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                        <span class="d-flex align-items-center border-bottom pb-3 mb-3"><?php echo e($helps[$i]['question']); ?></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo<?php echo e($helps[$i]['id']); ?>" class="collapse"
                                                 aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php echo e($helps[$i]['answer']); ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <ul class="list-unstyled">
                                    <?php for($i=$first; $i<$length; $i++): ?>
                                        <div id="accordion">
                                            <div class="row mb-0 text-black">
                                                <div class="col-1 mt-3">
                                                    <i class="czi-book text-muted mr-2"></i>
                                                </div>
                                                <div class="col-11">
                                                    <button class="btnF btn-link collapsed text-align-direction" data-toggle="collapse"
                                                            data-target="#collapseTwo<?php echo e($helps[$i]['id']); ?>"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                        <span class="d-flex align-items-center border-bottom pb-3 mb-3"><?php echo e($helps[$i]['question']); ?></span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="collapseTwo<?php echo e($helps[$i]['id']); ?>" class="collapse"
                                                 aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php echo e($helps[$i]['answer']); ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/moores/resources/themes/default/web-views/pages/help-topics.blade.php ENDPATH**/ ?>