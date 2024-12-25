<?php if (isset($component)) { $__componentOriginalff1fc6b3bf5e7b5646f5c332eb2df472dde09150 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Timeline::class, ['eventId' => ''.e($event->event_id).'','hasProfile' => ''.e($hasProfile).'','hasTeam' => ''.e($teamId).'','hasTask' => ''.e($taskId).'']); ?>
<?php $component->withName('timeline'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff1fc6b3bf5e7b5646f5c332eb2df472dde09150)): ?>
<?php $component = $__componentOriginalff1fc6b3bf5e7b5646f5c332eb2df472dde09150; ?>
<?php unset($__componentOriginalff1fc6b3bf5e7b5646f5c332eb2df472dde09150); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/common/timeline.blade.php ENDPATH**/ ?>