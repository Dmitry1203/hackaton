<?php if (isset($component)) { $__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SponsorLayout::class, []); ?>
<?php $component->withName('sponsor-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Уведомления <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 
        <div class="content notifications">
            <div class="content-header">
                <h3>Уведомления</h3>
                <a href="<?php echo e(Route('sponsor.notifications.create')); ?>" class="button button__block button__filled button__medium">Добавить</a>
            </div>
            <div class="notifications-layout">
                <div class="notifications-list">
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalc38fa723bbde1cde1a8279f40704f35cdf16b365 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Notification::class, ['notificationId' => ''.e($notification->id).'','notificationNew' => '','notificationDate' => ''.e($notification->format_created_at).'','notificationTitle' => ''.e($notification->title).'','notificationText' => ''.e($notification->text).'']); ?>
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

                <div class="pagination-container"><?php echo e($notifications->onEachSide(5)->links('vendor.pagination.bootstrap-4')); ?></div>

            </div>
        </div>
    </div>
   <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080)): ?>
<?php $component = $__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080; ?>
<?php unset($__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/sponsor/notifications.blade.php ENDPATH**/ ?>