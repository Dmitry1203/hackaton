<form
    class="custom-modal actions-modal save-solution-form"
    style="display: none;"
    id="save-solution"
    action="<?php echo e(Route('personal.solution.store')); ?>"
    method="POST"
>

    <?php echo csrf_field(); ?>

    <input type="hidden" id="team-id" name="team-id" value="<?php echo e($myTeamId); ?>">
    <input type="hidden" id="event-id" name="event-id" value="<?php echo e($eventId); ?>">
    <input type="hidden" id="stage-id" name="stage-id" value="<?php echo e($stageId); ?>">
    <input type="hidden" id="solution-store" name="solution-store" value="">

    <div class="custom-modal-header">
        <h6>Отправка решения</h6>
    </div>
    <div class="custom-modal-body">
        <div class="form-message body-text-medium">
            Вы действительно хотите отправить решение? После отправки нельзя будет внести изменения.
        </div>
    </div>
    <div class="custom-modal-footer">
        <div class="actions">
            <a class="button button__link button__small" data-fancybox-close>Отменить</a>
            <button type="submit" class="button button__block button__filled button__medium">Отправить</button>
        </div>
    </div>
</form><?php /**PATH C:\OSPanel\domains\smolathon\resources\views/personal/modal/solution.blade.php ENDPATH**/ ?>