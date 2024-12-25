<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Решения <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 

         <div class="content solutions">
            <div class="content-header">
                <h3>Решения</h3>
            </div>
            <div class="solutions-layout">
                <div class="solutions-block">
                    <div class="solutions-nav">
                        <ul class="tab-nav nav nav-pills body-text-medium">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab_1" data-toggle="tab">Промежуточные решения</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_2" data-toggle="tab">Финальное решение</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content solutions-content">
                        <div class="tab-pane active" id="tab_1">
                            <h6>Промежуточные решения</h6>
                            <div class="solutions-list">
                                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key < $countPreliminaryStages): ?>
                                        <?php if (isset($component)) { $__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Stage::class, ['eventId' => ''.e($stage->event_id).'','stageId' => ''.e($stage->stage_id).'','stageName' => ''.e($stage->stage).'','stageDescriptionShort' => ''.e($stage->stage_description_short).'','stageDateEnd' => ''.e(_date_MM_DD_YYYY($stage->stage_date_end)).'','isLoadedSolution' => ''.e($stage->count).'']); ?>
<?php $component->withName('stage'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e)): ?>
<?php $component = $__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e; ?>
<?php unset($__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <h6>Финальное решение</h6>
                            <div class="solutions-list">
                                <?php if (isset($component)) { $__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Stage::class, ['eventId' => ''.e($stages[$countPreliminaryStages]->event_id).'','stageId' => ''.e($stages[$countPreliminaryStages]->stage_id).'','stageName' => ''.e($stages[$countPreliminaryStages]->stage).'','stageDescriptionShort' => ''.e($stages[$countPreliminaryStages]->stage_description_short).'','stageDateEnd' => ''.e(_date_MM_DD_YYYY($stages[$countPreliminaryStages]->stage_date_end)).'','isLoadedSolution' => ''.e($stages[$countPreliminaryStages]->count).'']); ?>
<?php $component->withName('stage'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e)): ?>
<?php $component = $__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e; ?>
<?php unset($__componentOriginalb099d51e283bef43f4b35aa76ac146abdd3ec57e); ?>
<?php endif; ?>
                            </div>
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
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/solutions.blade.php ENDPATH**/ ?>