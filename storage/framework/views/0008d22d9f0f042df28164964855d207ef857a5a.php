<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Главная страница <?php $__env->endSlot(); ?>
 <?php $__env->slot('content', null, []); ?> 

    <div class="content sponsor">
        <div class="content-header">
            <h3>Заполнение данных о хакатоне</h3>
        </div>
        <div class="sponsor-layout">
            <div class="sponsors-block">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Общая информация о хакатоне</h5>
                            <a class="body-text-medium" href="<?php echo e(Route('organizer.event.edit', ['id' => $event->event_id ])); ?>">Редактировать</a>
                        </div>

                        <?php if(!empty($event->logo)): ?>
                            <div class="form-block">
                                <img src="<?php echo e(asset("storage/images/logo/".$event->logo)); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="form-block">
                            <div class="form-block-header">
                                <h6>О мероприятии</h6>
                            </div>
                            <div class="form-group form-group-row">
                                <label for="event_name" class="body-text-large">Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo e($event->event_name); ?>"
                                    readonly
                                >
                            </div>
                            <div class="form-group form-group-row textarea-group">
                                <label for="event_text" class="body-text-large">Основной текст</label>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="event_text"
                                    readonly><?php echo e($event->event_text); ?></textarea>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="form-block-header">
                                <h6>Информация об организаторе</h6>
                            </div>
                            <div class="form-group form-group-row">
                                <label for="organizer_name" class="body-text-large">Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="<?php echo e($event->organizer_name); ?>"
                                    readonly
                                >
                            </div>
                            <div class="form-group form-group-row textarea-group">
                                <label for="organizer_text" class="body-text-large">Основной текст</label>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    readonly><?php echo e($event->event_text); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Логотипы партнеров</h5>
                            <a class="body-text-medium" href="<?php echo e(Route('organizer.event.logos.edit', ['id' => $event->event_id ])); ?>">Редактировать</a>
                        </div>
                        <div class="form-block">
                            <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img class="p-3" src="<?php echo e(asset("storage/images/logo/".$logo->logo)); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>



            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Временные этапы хакатона</h5>
                            <a class="body-text-medium" href="<?php echo e(Route('organizer.event.stages.edit', ['id' => $event->event_id ])); ?>">Редактировать</a>
                        </div>
                        <div class="timeline-container">
                            <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-block timeline-item">
                                    <div class="form-block-header">
                                        <h6><span class="number"><?php echo e($key+1); ?></span> Этап</h6>
                                    </div>
                                    <div class="form-row-grid">
                                        <div class="form-group">
                                            <label class="body-text-large">Название этапа</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="<?php echo e($stage->stage); ?>"
                                                readonly
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label class="body-text-large">Сокращенное название этапа</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="<?php echo e($stage->stage_short); ?>"
                                                readonly
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
                                                readonly><?php echo e($stage->stage_description); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="form-group">
                                                <label class="body-text-large">Сокращенное описание этапа</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="<?php echo e($stage->stage_description_short); ?>"
                                                    readonly
                                                >
                                            </div>
                                            <div class="form-row-grid">
                                                <div class="form-group">
                                                    <label class="body-text-large">Дата окончания</label>
                                                    <input
                                                        type="text"
                                                        class="form-control expiration-date"
                                                        value="<?php echo e($stage->stage_date_end); ?>"
                                                        readonly
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="body-text-large">Время окончания</label>
                                                        <input
                                                            type="text"
                                                            name="stage_time_end[]"
                                                            class="form-control expiration-time"
                                                            value="<?php echo e($stage->stage_time_end); ?>"
                                                            readonly
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>




            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Задачи для хакатона</h5>
                            <a class="body-text-medium" href="<?php echo e(Route('organizer.event.tasks.edit', ['id' => $event->event_id ])); ?>">Редактировать</a>
                        </div>
                        <div class="tasks-container">
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-block task-item">
                                <div class="form-block-header">
                                    <h6>Задача <span class="number"><?php echo e($key+1); ?></span></h6>
                                </div>
                                <div class="form-group form-group-row">
                                    <label class="body-text-large">Название задачи</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="<?php echo e($task->name); ?>"
                                        readonly
                                    >
                                </div>
                                <div class="form-group form-group-row textarea-group">
                                    <label class="body-text-large">Описание задачи</label>
                                    <textarea
                                    type="text"
                                    class="form-control"
                                    readonly
                                    ><?php echo $task->text; ?></textarea>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Критерии оценивания команд</h5>
                            <a class="body-text-medium" href="<?php echo e(Route('organizer.event.criteria.edit', ['id' => $event->event_id ])); ?>">Редактировать</a>
                        </div>
                        <div class="criteria-container">
                            <?php $__currentLoopData = $criteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="criteria-item">
                                <div class="form-group form-group-row">
                                    <label class="body-text-large">Название критерия</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="<?php echo e($item->criteria); ?>"
                                        readonly
                                        >
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774)): ?>
<?php $component = $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774; ?>
<?php unset($__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/index.blade.php ENDPATH**/ ?>