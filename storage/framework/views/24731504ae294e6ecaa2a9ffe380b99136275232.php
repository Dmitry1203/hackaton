<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Временные этапы хакатона <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 

        <div class="content sponsor">
            <div class="content-header">
                <h3>Временные этапы хакатона</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="stages-form"
                        name="stages-form"
                        class="info-form"
                        action="<?php echo e(Route('organizer.event.stages.update', ['id' => $eventId])); ?>"
                        method="POST"
                        autocomplete="off"
                    >
                    <?php echo csrf_field(); ?>

                        <div class="form-inner">
                            <div class="form-section">
                                <div class="timeline-container">

                                <input type="hidden" id="removed-elements" name="removed-elements" value="">

                                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <input type="hidden" id="stage-ids[]" name="stage-ids[]" value="<?php echo e($stage->id); ?>">

                                    <div class="form-block timeline-item">
                                        <div class="form-block-header">
                                            <h6><span class="number"><?php echo e($key+1); ?></span> Этап</h6>
                                            <button type="button" class="remove-button"
                                                data-target=".timeline-item" data-id="<?php echo e($stage->id); ?>"></button>
                                        </div>
                                        <div class="form-row-grid">
                                            <div class="form-group">
                                                <label class="body-text-large">Название этапа</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="stage[]"
                                                    placeholder="Название этапа"
                                                    value="<?php echo e($stage->stage); ?>"
                                                    data-required="1"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <label class="body-text-large">Сокращенное название этапа</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="stage_short[]"
                                                    value="<?php echo e($stage->stage_short); ?>"
                                                    placeholder="Сокращенное название этапа"
                                                    data-required="1"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-row-grid">
                                            <div class="column">
                                                <div class="form-group">
                                                    <label class="body-text-large">Описание этапа</label>
                                                    <textarea
                                                    type="text"
                                                    class="form-control"
                                                    name="stage_description[]"
                                                    placeholder="Описание этапа"
                                                    data-required="1"><?php echo e($stage->stage_description); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="form-group">
                                                    <label class="body-text-large">Сокращенное описание этапа</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="stage_description_short[]"
                                                        value="<?php echo e($stage->stage_description_short); ?>"
                                                        placeholder="Сокращенное описание этапа"
                                                        data-required="1"
                                                    >
                                                </div>
                                                <div class="form-row-grid">
                                                    <div class="form-group">
                                                        <label class="body-text-large">Дата окончания</label>
                                                        <input
                                                            type="text"
                                                            class="form-control expiration-date"
                                                            name="stage_date_end[]"
                                                            value="<?php echo e($stage->stage_date_end); ?>"
                                                            placeholder="дд.мм.гггг"
                                                            data-required="1"
                                                        >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="body-text-large">Время окончания</label>
                                                        <input
                                                            type="text"
                                                            name="stage_time_end[]"
                                                            value="<?php echo e($stage->stage_time_end); ?>"
                                                            class="form-control expiration-time"
                                                            placeholder="00:00"
                                                            data-required="1"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row-grid">
                                            <div></div>
                                            <label class="checkbox">
                                                <input type="checkbox" name="solution_required[]" value="<?php echo e($key+1); ?>" <?php if($stage->solution_required == 1): ?> checked <?php endif; ?>>
                                                <div class="checkbox__text body-text-medium">Требуется загрузка решения</div>
                                            </label>
                                        </div>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                                <div class="actions">
                                    <button type="button" class="add-timeline add-button button button__large">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        Добавить этап
                                    </button>
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
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/stagesEdit.blade.php ENDPATH**/ ?>