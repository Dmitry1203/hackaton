<div class="column">
	<div class="card widget-card notifications">
		<div class="card-header">
		<h6>Уведомления</h6>
		</div>
		<div class="card-body">
			<div class="notifications-list">
			<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<?php if (isset($component)) { $__componentOriginal8d18c0c3bc12893179585bded20d5a0910ec3a61 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\NotificationMain::class, ['notificationLink' => '#','notificationDate' => ''.e($notification->format_created_at).'','notificationTitle' => ''.e($notification->title).'']); ?>
<?php $component->withName('notification-main'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d18c0c3bc12893179585bded20d5a0910ec3a61)): ?>
<?php $component = $__componentOriginal8d18c0c3bc12893179585bded20d5a0910ec3a61; ?>
<?php unset($__componentOriginal8d18c0c3bc12893179585bded20d5a0910ec3a61); ?>
<?php endif; ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/common/notifications.blade.php ENDPATH**/ ?>