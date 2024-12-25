<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Мои уведомления <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
		<div class="content notifications">
			<div class="content-header">
			<h3>Мои уведомления</h3>
			</div>
			<div class="notifications-layout">

				<?php if(count($notifications) == 0): ?>
					<?php if (isset($component)) { $__componentOriginal1860eb390c0bfd03dba5123177278f829976c146 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InfoBox::class, ['text' => 'Нет уведомлений.']); ?>
<?php $component->withName('info-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1860eb390c0bfd03dba5123177278f829976c146)): ?>
<?php $component = $__componentOriginal1860eb390c0bfd03dba5123177278f829976c146; ?>
<?php unset($__componentOriginal1860eb390c0bfd03dba5123177278f829976c146); ?>
<?php endif; ?>
				<?php endif; ?>

                <div class="notifications-list">
                	<?php $counter = 0; ?>
					<?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php
							$counter++;
							$isNew = '';
						?>
						<?php if($counter <= $newNotifications): ?>
							<?php $isNew = 'new'; ?>
						<?php endif; ?>
						<?php if (isset($component)) { $__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Notification::class, ['notificationId' => ''.e($notification->id).'','notificationNew' => ''.e($isNew).'','notificationDate' => ''.e($notification->format_created_at).'','notificationTitle' => ''.e($notification->title).'','notificationText' => ''.e($notification->text).'']); ?>
<?php $component->withName('notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365)): ?>
<?php $component = $__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365; ?>
<?php unset($__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365); ?>
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
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/notifications.blade.php ENDPATH**/ ?>