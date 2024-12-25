<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Таймлайн <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 

        <div class="content timelines">
            <div class="content-header">
                <h3>Таймлайн</h3>
            </div>
            <div class="timeline-layout">
                <div class="timeline-wrapper">
                    <div class="timeline-pane">
                        <ul class="nav nav-pills body-text-medium">
                            <?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <?php if (isset($component)) { $__componentOriginal1421d9895fd317a88fbde0b623fad0215ad6dcac = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TimelineNav::class, ['timelineNumber' => ''.e($key+1).'','timelineComplete' => ''.e($stage['is_complete']).'','timelineNext' => ''.e($stage['is_next']).'','timelinePrevComplete' => ''.e($stage['prev_complete']).'','timelineStage' => ''.e($stage['stage']).'','timelineDateEnd' => ''.e(_date_MM_DD_YYYY($stage['stage_date_end'])).'','timelineDescription' => ''.e($stage['stage_description']).'']); ?>
<?php $component->withName('timeline-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1421d9895fd317a88fbde0b623fad0215ad6dcac)): ?>
<?php $component = $__componentOriginal1421d9895fd317a88fbde0b623fad0215ad6dcac; ?>
<?php unset($__componentOriginal1421d9895fd317a88fbde0b623fad0215ad6dcac); ?>
<?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <div class="timeline-content">
                        <h5>Текущий статус</h5>
                        <div class="tab-content">
                            <?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginal9a3d9fc7e12804205e024bb6f3b27bcc1df2b5f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TimelineDetail::class, ['timelineNumber' => ''.e($key+1).'','timelineComplete' => ''.e($stage['is_complete']).'','timelineNext' => ''.e($stage['is_next']).'','timelinePrevComplete' => ''.e($stage['prev_complete']).'','timelineStage' => ''.e($stage['stage']).'','timelineDateEnd' => ''.e(_date_MM_DD_YYYY($stage['stage_date_end'])).'','timelineDescription' => ''.e($stage['stage_description']).'']); ?>
<?php $component->withName('timeline-detail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a3d9fc7e12804205e024bb6f3b27bcc1df2b5f4)): ?>
<?php $component = $__componentOriginal9a3d9fc7e12804205e024bb6f3b27bcc1df2b5f4; ?>
<?php unset($__componentOriginal9a3d9fc7e12804205e024bb6f3b27bcc1df2b5f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
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
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/timeline.blade.php ENDPATH**/ ?>