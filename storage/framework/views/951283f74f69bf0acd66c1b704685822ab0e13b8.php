<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Общая информации о хакатоне <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 

        <div class="content sponsor">
            <div class="content-header">
                <h3>Общая информации о хакатоне</h3>
            </div>
            <div class="sponsor-layout">

                <div class="sponsors-block">
                    <form
                        id="event-form-1"
                        name="event-form-1"
                        class="info-form"
                        action="<?php echo e(Route('organizer.event.update', ['id' => $eventId])); ?>"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    <?php echo csrf_field(); ?>

                        <div class="form-inner">
                            <div class="form-section">
                                <div class="form-block">

                                    <?php if(!empty($event->logo)): ?>
                                        <div class="form-block">
                                            <img src="<?php echo e(asset("storage/images/logo/".$event->logo)); ?>">
                                        </div>
                                    <?php endif; ?>

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
                                            value="<?php echo e($event->event_name); ?>"
                                        >
                                    </div>
                                    <div class="form-group form-group-row textarea-group">
                                        <label for="event_text" class="body-text-large">Основной текст</label>
                                        <textarea
                                            type="text"
                                            name="event_text"
                                            class="form-control"
                                            id="event_text"
                                            placeholder="Основной текст" data-required="1"><?php echo e($event->event_text); ?></textarea>
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
                                            value="<?php echo e($event->organizer_name); ?>"
                                        >
                                    </div>
                                    <div class="form-group form-group-row textarea-group">
                                        <label for="organizer_text" class="body-text-large">Основной текст</label>
                                        <textarea
                                            type="text"
                                            name="organizer_text"
                                            class="form-control"
                                            id="organizer_text"
                                            placeholder="Основной текст" data-required="1"><?php echo e($event->organizer_text); ?></textarea>
                                    </div>

                                    <div class="form-group form-group-row">
                                        <span class="form-label body-text-large">Логотип</span>
                                        <div class="custom-upload custom-upload-advanced custom-upload-single">
                                            <div class="preview-container"></div>
                                            <label>
                                                <input type="file" name="organizer_logo" accept=".jpg, .jpeg, .png">
                                                <div class="add-button button button__large">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Загрузить логотип
                                                </div>
                                            </label>
                                        </div>
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
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/eventEdit.blade.php ENDPATH**/ ?>