<?php if (isset($component)) { $__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SponsorLayout::class, []); ?>
<?php $component->withName('sponsor-layout'); ?>
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
                        action="<?php echo e(Route('sponsor.notifications.store')); ?>"
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
<?php if (isset($__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080)): ?>
<?php $component = $__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080; ?>
<?php unset($__componentOriginal87cbb05f3f52d953dc93700a87dcdfe24cfad080); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/sponsor/notificationCreate.blade.php ENDPATH**/ ?>