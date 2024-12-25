<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Заполнение данных о хакатоне <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 

        <div class="content sponsor">
            <div class="content-header">
                <h3>Заполнение данных о хакатоне</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="event-form"
                        name="event-form"
                        class="info-form"
                        action="<?php echo e(Route('organizer.event.store')); ?>"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    <?php echo csrf_field(); ?>

                        <div class="form-inner">
                            <div class="form-section">
                                <h5>Шаг 1. Добавление общей информации о хакатоне</h5>
                                <div class="form-block">
                                    <div class="form-block-header">
                                        <h6>О мероприятии</h6>
                                    </div>
                                    <div class="form-group form-group-row">
                                        <label for="event_name" class="body-text-large">Заголовок</label>
                                        <input
                                            type="text"
                                            name="event_name"
                                            class="form-control"
                                            id="event_name"
                                            placeholder="Заголовок" data-required="1"
                                        >
                                    </div>
                                    <div class="form-group form-group-row textarea-group">
                                        <label for="event_text" class="body-text-large">Основной текст</label>
                                        <textarea
                                            type="text"
                                            name="event_text"
                                            class="form-control"
                                            id="event_text"
                                            placeholder="Основной текст" data-required="1"></textarea>
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
                                            name="organizer_name"
                                            class="form-control"
                                            id="organizer_name"
                                            placeholder="Заголовок" data-required="1"
                                        >
                                    </div>
                                    <div class="form-group form-group-row textarea-group">
                                        <label for="organizer_text" class="body-text-large">Основной текст</label>
                                        <textarea
                                            type="text"
                                            name="organizer_text"
                                            class="form-control"
                                            id="organizer_text"
                                            placeholder="Основной текст" data-required="1"></textarea>
                                    </div>


                                    <div class="form-group form-group-row">
                                        <span class="form-label body-text-large">Логотип</span>
                                        <div class="custom-upload custom-upload-advanced custom-upload-single">
                                            <div class="preview-container"></div>
                                            <label>
                                                <input type="file" name="sponsor_logo" accept=".jpg, .jpeg, .png">
                                                <div class="add-button button button__large">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Добавить логотип
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-block">
                                    <div class="form-block-header">
                                        <h6>Логотипы партнеров</h6>
                                    </div>

                                    <div class="form-group form-group-row partner-logo-group">
                                        <span class="form-label body-text-large">Логотип</span>
                                        <div class="custom-upload custom-upload-advanced custom-upload-multi">
                                            <div class="preview-container">
                                                
                                            </div>
                                            <label>
                                                <input type="file" name="partner_logo[]" accept=".jpg, .jpeg, .png">
                                                <div class="add-button button button__large">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                    </svg> Добавить логотип
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5>Шаг 2. Задайте временные этапы хакатона</h5>
                                <div class="timeline-container">
                                    <div class="form-block timeline-item">
                                        <div class="form-block-header">
                                            <h6><span class="number">1</span> Этап</h6>
                                            <button type="button" class="remove-button"
                                                data-target=".timeline-item"></button>
                                        </div>
                                        <div class="form-row-grid">
                                            <div class="form-group">
                                                <label class="body-text-large">Название этапа</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="stage[]"
                                                    placeholder="Название этапа"
                                                    data-required="1"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <label class="body-text-large">Сокращенное название этапа</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="stage_short[]"
                                                    placeholder="Сокращенное название этапа" data-required="1"
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
                                                    data-required="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="form-group">
                                                    <label class="body-text-large">Сокращенное описание этапа</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="stage_description_short[]"
                                                        placeholder="Сокращенное описание этапа" data-required="1"
                                                    >
                                                </div>
                                                <div class="form-row-grid">
                                                    <div class="form-group">
                                                        <label class="body-text-large">Дата окончания</label>
                                                        <input
                                                            type="text"
                                                            class="form-control expiration-date"
                                                            name="stage_date_end[]"
                                                            placeholder="дд.мм.гггг"
                                                            data-required="1"
                                                        >
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="body-text-large">Время окончания</label>
                                                        <input
                                                            type="text"
                                                            name="stage_time_end[]"
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
                                                <input type="checkbox" name="solution_required[]" value="1">
                                                <div class="checkbox__text body-text-medium">Требуется загрузка решения</div>
                                            </label>
                                        </div>

                                    </div>
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
                            <div class="form-section">
                                <h5>Шаг 3. Добавление задач для хакатона</h5>
                                <div class="tasks-container">
                                    <div class="form-block task-item">
                                        <div class="form-block-header">
                                            <h6>Задача <span class="number">1</span></h6>
                                            <button type="button" class="remove-button"
                                                data-target=".task-item"></button>
                                        </div>
                                        <div class="form-group form-group-row">
                                            <label class="body-text-large">Название задачи</label>
                                            <input
                                                type="text"
                                                name="task[]"
                                                class="form-control"
                                                placeholder="Название задачи"
                                                data-required="1"
                                            >
                                        </div>
                                        <div class="form-group form-group-row textarea-group">
                                            <label class="body-text-large">Описание задачи</label>
                                            <textarea
                                            type="text"
                                            name="task_description[]"
                                            class="form-control"
                                            placeholder="Описание задачи"
                                            data-required="1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions">
                                    <button type="button" class="add-task add-button button button__large">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        Добавить задачу
                                    </button>
                                </div>
                            </div>
                            <div class="form-section">
                                <h5>Шаг 4. Критерии оценивания команд</h5>
                                <div class="form-block">
                                    <div class="criteria-container">
                                        <div class="criteria-item">
                                            <div class="form-group form-group-row">
                                                <label class="body-text-large">Название критерия</label>
                                                <input
                                                    type="text"
                                                    name="criteria[]"
                                                    class="form-control"
                                                    placeholder="Название критерия"
                                                    data-required="1">
                                                <button type="button" class="remove-button"
                                                    data-target=".criteria-item"></button>
                                            </div>
                                        </div>
                                        <div class="criteria-item">
                                            <div class="form-group form-group-row">
                                                <label class="body-text-large">Название критерия</label>
                                                <input
                                                    type="text"
                                                    name="criteria[]"
                                                    class="form-control"
                                                    placeholder="Название критерия"
                                                    data-required="1">
                                                <button type="button" class="remove-button"
                                                    data-target=".criteria-item"></button>
                                            </div>
                                        </div>
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
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/eventCreate.blade.php ENDPATH**/ ?>