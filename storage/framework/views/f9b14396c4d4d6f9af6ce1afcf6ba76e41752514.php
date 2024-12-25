<?php if(($timelineNext && !$timelineComplete && $timelinePrevComplete) || ($timelineNext && !$timelineComplete && !$timelinePrevComplete)): ?>
    <div class="tab-pane active" id="tab_<?php echo e($timelineNumber); ?>">
<?php else: ?>
    <div class="tab-pane" id="tab_<?php echo e($timelineNumber); ?>">
<?php endif; ?>

    <div class="timelines-card">

        <?php if(!$timelineNext && !$timelineComplete && !$timelinePrevComplete): ?>
            <?php if (isset($component)) { $__componentOriginal1860eb390c0bfd03dba5123177278f829976c146 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InfoBox::class, ['text' => 'Выполните предыдущий шаг']); ?>
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

        <div class="timelines-header">
            <div class="timeline-item <?php if($timelineComplete): ?> complete <?php endif; ?>">
                <div class="timeline-icon">
                    <div class="timeline-number"><?php echo e($timelineNumber); ?></div>
                </div>
                <div class="timeline-text">
                    <div class="timeline-title body-text-medium">Шаг <?php echo e($timelineNumber); ?></div>
                    <div class="timeline-description body-text-large"><?php echo e($timelineStage); ?>

                    </div>
                </div>
            </div>
            <div class="label body-text-medium">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.15" width="36" height="36" rx="7" fill="#13D7FF" />
                    <path
                        d="M18 28C23.5228 28 28 23.5228 28 18C28 12.4772 23.5228 8 18 8C12.4772 8 8 12.4772 8 18C8 23.5228 12.4772 28 18 28Z"
                        stroke="#00A3FF" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M18 12V18L22 20" stroke="#00A3FF" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Дедлайн до <?php echo e($timelineDateEnd); ?>

            </div>
        </div>
        <div class="timelines-info body-text-medium">
            <p><?php echo e($timelineDescription); ?></p>
        </div>
    </div>
</div><?php /**PATH C:\OSPanel\domains\green\resources\views/components/timelineDetail.blade.php ENDPATH**/ ?>