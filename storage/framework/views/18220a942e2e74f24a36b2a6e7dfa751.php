<div class="row no-gutters position-relative rtl">
    <?php if($categories->count() > 0 ): ?>
        <div class="col-xl-3 position-static d-none d-xl-block __top-slider-cate">
            <div class="category-menu-wrap position-static">
                <ul class="category-menu mt-0">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('products',['id'=> $category['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($category->name); ?></a>
                            <?php if($category->childes->count() > 0): ?>
                                <div class="mega_menu z-2">
                                    <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="mega_menu_inner">
                                            <h6><a href="<?php echo e(route('products',['id'=> $sub_category['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($sub_category->name); ?></a></h6>
                                            <?php if($sub_category->childes->count() >0): ?>
                                                <?php $__currentLoopData = $sub_category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div><a href="<?php echo e(route('products',['id'=> $sub_sub_category['id'],'data_from'=>'category','page'=>1])); ?>"><?php echo e($sub_sub_category->name); ?></a></div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-center">
                        <a href="<?php echo e(route('categories')); ?>" class="text-primary font-weight-bold justify-content-center text-capitalize">
                            <?php echo e(translate('view_all')); ?>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-12 col-xl-9 __top-slider-images">
        <div class="<?php echo e(Session::get('direction') === "rtl" ? 'pr-xl-2' : 'pl-xl-2'); ?>">
            <div class="owl-theme owl-carousel hero-slider">
                <?php $__currentLoopData = $main_banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($banner['url']); ?>" class="d-block" target="_blank">
                    <img class="w-100 __slide-img" alt=""
                         src="<?php echo e(getValidImage(path: 'storage/app/public/banner/'.$banner['photo'], type: 'banner')); ?>">
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /var/www/html/moores/resources/themes/default/web-views/partials/_home-top-slider.blade.php ENDPATH**/ ?>