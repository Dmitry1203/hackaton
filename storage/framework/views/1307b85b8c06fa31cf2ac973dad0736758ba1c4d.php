<div class="card widget-card tasks">
	<div class="card-header">
		<h6>Задачи хакатона</h6>
		<div class="actions">
			<a href="<?php echo e(Route('personal.tasks')); ?>" class="button button__link button__small widget-link">Перейти в раздел
				<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M6 3.54919L12 9.54919L6 15.5492" stroke-width="1.5" stroke-linecap="round"
				stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="tasks-list">

			<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<?php if (isset($component)) { $__componentOriginal7c3185df116c27199ebf6913e01600b6dd23d1ea = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\HakatonTask::class, ['taskId' => ''.e($task->task_id).'','taskName' => ''.e($task->name).'']); ?>
<?php $component->withName('hakaton-task'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3185df116c27199ebf6913e01600b6dd23d1ea)): ?>
<?php $component = $__componentOriginal7c3185df116c27199ebf6913e01600b6dd23d1ea; ?>
<?php unset($__componentOriginal7c3185df116c27199ebf6913e01600b6dd23d1ea); ?>
<?php endif; ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
</div><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/common/tasks.blade.php ENDPATH**/ ?>