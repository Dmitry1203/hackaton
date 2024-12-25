<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Добавить уведомление <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 

        <div class="content sponsor">
            <div class="content-header">
                <h3>Добавить уведомление</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">

                    <form
                        id="notification-form"
                        name="notification-form"
                        class="notifications-form"
                        action="<?php echo e(Route('organizer.notifications.store')); ?>"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    <?php echo csrf_field(); ?>

                        <h5>Основная информация</h5>
                        <div class="form-block">
                            <div class="form-group form-group-row">
                                <label for="notification_name" class="body-text-large">Заголовок</label>
                                <input type="text" name="notification_name" class="form-control" id="notification_name"
                                    placeholder="Заголовок" data-required="1">
                            </div>
                            <div class="form-group form-group-row textarea-group">
                                <label for="notification_text" class="body-text-large">Основной текст</label>
                                <textarea type="text" name="notification_text" class="form-control"
                                    id="notification_text" placeholder="Основной текст" data-required="1"></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit"
                                class="save-notification submit-button button button__block button__filled button__large">Отправить</button>
                        </div>
                    </form>
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
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/notificationCreate.blade.php ENDPATH**/ ?>