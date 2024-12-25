<div class="card guide">
  <div class="card-header">
    <h6>Следующее действие</h6>
  </div>
  <div class="card-body">
    <div class="guide-header">
      <div class="guide-title body-text-large"><?php echo e($nextStage); ?></div>
      <div class="label body-text-medium">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect opacity="0.15" width="36" height="36" rx="7" fill="#13D7FF" />
          <path fill-rule="evenodd" clip-rule="evenodd"
          d="M24 9H22V11H14V9H12V11H10C8.89543 11 8 11.8954 8 13V25C8 26.1046 8.89543 27 10 27H26C27.1046 27 28 26.1046 28 25V13C28 11.8954 27.1046 11 26 11H24V9ZM26 13V16H10V13H26ZM10 18V25H26V18H10Z"
          fill="#00A3FF" />
        </svg>
        Дедлайн до <?php echo e(_date_MM_DD_YYYY($nextStageDateEnd)); ?>

      </div>
    </div>
    <div class="guide-text body-text-regular">
      <?php echo e($nextStageDescriptionShort); ?>

    </div>

    <?php if($nextStageNum < count($stages)): ?>

      <div class="actions">

        <?php if($nextStageNum == 1): ?>
          <a href="<?php echo e(Route('personal.profile')); ?>" class="button button__block button__filled button__medium">Выполнить</a>
        <?php elseif($nextStageNum == 2): ?>
          <a href="<?php echo e(Route('personal.teams')); ?>" class="button button__block button__filled button__medium">Выполнить</a>
        <?php elseif($nextStageNum == 3): ?>
          <a href="<?php echo e(Route('personal.tasks')); ?>" class="button button__block button__filled button__medium">Выполнить</a>
        <?php elseif($nextStageNum > 3): ?>
          <a href="<?php echo e(Route('personal.solutions')); ?>" class="button button__block button__filled button__medium">Выполнить</a>
        <?php endif; ?>

        <a href="<?php echo e(Route('personal.timeline')); ?>" class="button button__link button__small">Подробнее</a>
      </div>

    <?php endif; ?>

  </div>
</div>

<div class="card timeline-card">
  <div class="card-body">
    <div class="timeline-slider">
		<?php $counter = 0; ?>
		<?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $counter++; ?>

			<?php if( $stage['is_complete'] ): ?>
				<div class="timeline-item complete">
			<?php elseif( $stage['is_next'] ): ?>
				<div class="timeline-item current">
			<?php else: ?>
				<div class="timeline-item">
			<?php endif; ?>
				<div class="timeline-icon">
					<div class="timeline-number"><?php echo e($counter); ?></div>
				</div>
				<div class="timeline-title body-text-medium">Шаг <?php echo e($counter); ?></div>
				<div class="timeline-text body-text-small"><?php echo e($stage['stage']); ?></div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>


















<?php /**PATH C:\OSPanel\domains\green\resources\views/components/timeline.blade.php ENDPATH**/ ?>