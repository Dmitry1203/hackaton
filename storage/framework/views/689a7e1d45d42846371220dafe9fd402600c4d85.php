<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Критерии оценивания команд <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 

        <div class="content sponsor">
            <div class="content-header">
                <h3>Критерии оценивания команд</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="criteria-form"
                        name="criteria-form"
                        class="info-form"
                        action="<?php echo e(Route('organizer.event.criteria.update', ['id' => $eventId])); ?>"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    <?php echo csrf_field(); ?>

                        <div class="form-inner">
                            <div class="form-section">
                                <div class="form-block">
                                    <div class="criteria-container">

                                        <input type="hidden" id="removed-elements" name="removed-elements" value="">

                                        <?php $__currentLoopData = $criteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <input type="hidden" id="criteria-ids[]" name="criteria-ids[]" value="<?php echo e($item->id); ?>">

                                        <div class="criteria-item">
                                            <div class="form-group form-group-row">
                                                <label class="body-text-large">Название критерия</label>
                                                <input
                                                    type="text"
                                                    name="criteria[]"
                                                    class="form-control"
                                                    placeholder="Название критерия"
                                                    value="<?php echo e($item->criteria); ?>"
                                                    data-required="1">
                                                <button type="button" class="remove-button"
                                                    data-target=".criteria-item" data-id="<?php echo e($item->id); ?>"></button>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="add-button add-criteria button button__large">
                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            Добавить критерий
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit"
                                    class="save-notification submit-button button button__block button__filled button__large">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

   <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774)): ?>
<?php $component = $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774; ?>
<?php unset($__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/criteriaEdit.blade.php ENDPATH**/ ?>