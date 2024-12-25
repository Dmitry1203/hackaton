<div class="card widget-card announce">
  <div class="card-header">
    <h6><?php echo e($event->event_name); ?></h6>
  </div>
  <div class="card-body">
    <div class="announce-text body-text-medium"><?php echo e($event->event_text); ?></div>
    <div class="actions">
      <a href="<?php echo e(Route('personal.about')); ?>" class="button button__link button__small widget-link">Подробнее</a>
    </div>
  </div>
</div><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/common/anons.blade.php ENDPATH**/ ?>