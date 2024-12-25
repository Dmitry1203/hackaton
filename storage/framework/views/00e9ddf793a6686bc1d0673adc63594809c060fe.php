<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Задачи <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
        <div class="content tasks">
            <div class="content-header">
                <h3>Задачи</h3>
            </div>
            <div class="tasks-layout">

                <div class="tasks-list">

					
					<?php if(!empty($myTeam[0]->TaskId)): ?>
						<?php if (isset($component)) { $__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Task::class, ['taskId' => ''.e($myTeam[0]->TaskExternalId).'','taskActive' => 'active','taskName' => ''.e($myTeam[0]->Task).'']); ?>
<?php $component->withName('task'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9)): ?>
<?php $component = $__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9; ?>
<?php unset($__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9); ?>
<?php endif; ?>
					<?php endif; ?>

					<?php $__currentLoopData = $otherTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<?php if (isset($component)) { $__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Task::class, ['taskId' => ''.e($task->task_id).'','taskActive' => '','taskName' => ''.e($task->name).'']); ?>
<?php $component->withName('task'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9)): ?>
<?php $component = $__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9; ?>
<?php unset($__componentOriginal27bd0294dd48cc6d393c7f84fb27c56e129118b9); ?>
<?php endif; ?>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/tasks.blade.php ENDPATH**/ ?>