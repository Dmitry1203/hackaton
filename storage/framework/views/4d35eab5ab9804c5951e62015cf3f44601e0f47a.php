<a href="<?php echo e(Route('personal.task', ['id' => $taskId])); ?>" class="task-item <?php echo e($taskActive); ?>">
	<div class="task-item-inner">
		<div class="task-content">
			<div class="task-title body-text-medium">Задача
			<?php if($taskActive == 'active'): ?>
				<div class="status body-text-small">Выбрана</div>
			<?php endif; ?>
			</div>
			<div class="task-description body-text-large"><?php echo e($taskName); ?></div>
		</div>
		<svg width="58" height="58" viewBox="0 0 58 58" fill="none"
			xmlns="http://www.w3.org/2000/svg">
			<path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2" stroke-linecap="round"
				stroke-linejoin="round" />
			<path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
				stroke-linecap="round" stroke-linejoin="round" />
		</svg>
	</div>
</a><?php /**PATH C:\OSPanel\domains\smolathon\resources\views/components/task.blade.php ENDPATH**/ ?>