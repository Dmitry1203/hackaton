<?php if (isset($component)) { $__componentOriginal8504f5c99ace4704a17dd926f6fcc808e0b3d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrganizerLayout::class, []); ?>
<?php $component->withName('organizer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
 <?php $__env->slot('title', null, []); ?> Логотипы партнеров <?php $__env->endSlot(); ?>
   <?php $__env->slot('content', null, []); ?> 

        <div class="content sponsor">
            <div class="content-header">
                <h3>Логотипы партнеров</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="logos-form"
                        name="logos-form"
                        class="info-form"
                         action="<?php echo e(Route('organizer.event.logos.update', ['id' => $eventId])); ?>"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    <?php echo csrf_field(); ?>

                        <input type="hidden" id="removed-elements" name="removed-elements" value="">
                        <div class="form-inner">
                            <div class="form-group form-group-row partner-logo-group">
                                <span class="form-label body-text-large">Логотип</span>
                                <div class="custom-upload custom-upload-advanced custom-upload-multi">
                                    <div class="preview-container">
                                        <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="preview-item">
                                            <button type="button" class="preview-remove"
                                                data-target=".partner-item" data-id="<?php echo e($logo->id); ?>"></button>
                                            <div class="preview-image">
                                                <img src="<?php echo e(asset("storage/images/logo/".$logo->logo)); ?>">
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <div class="form-actions mt-5">
                                <button
                                type="submit"
                                class="save-notification submit-button button button__block button__filled button__large">
                                Сохранить
                                </button>
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
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/organizer/logosEdit.blade.php ENDPATH**/ ?>