<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> О мероприятии <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
        <div class="content about">
            <div class="content-header">
                <h3>О мероприятии</h3>
            </div>
            <div class="about-layout">
                <div class="about-card">
                    <h6><?php echo e($event->event_name); ?></h6>
                    <div class="body-text-medium"><?php echo $event->event_text; ?></div>
                </div>

                <div class="about-card">
                    <div class="about-card-wrapper">
                        <?php if(!empty($event->logo)): ?>
                            <div class="logo">
                                <img src="<?php echo e(asset("storage/images/logo/".$event->logo)); ?>">
                            </div>
                        <?php endif; ?>
                        <div class="about-card-content">
                            <h6><?php echo e($event->organizer_name); ?></h6>
                            <div class="body-text-medium"><?php echo $event->organizer_text; ?></div>
                        </div>
                    </div>
                </div>

                <div class="card about-card">
                    <h6>Партнеры</h6>
                    <div class="about-card-list">
                        <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="about-card-item">
                                <img src="<?php echo e(asset("storage/images/logo/".$logo->logo)); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?>
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/about.blade.php ENDPATH**/ ?>