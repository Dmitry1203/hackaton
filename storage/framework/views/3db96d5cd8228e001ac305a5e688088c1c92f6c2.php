    <form
        class="custom-modal team-apply-modal team-apply-form"
        style="display: none;"
        id="team-apply"
    >

        <input type="hidden" name="team-id" id="team-id">
        <div class="custom-modal-header">
            <h6>Подача заявки в команду </h6>
        </div>
        <div class="custom-modal-body">
            <div class="form-message body-text-medium">
                Вы подаете заявку в команду <span id="team-name"></span>.
            </div>
            <div class="form-group">
                <div class="input-group">
                    <textarea type="text" name="apply_message" class="form-control" id="apply_message"
                        placeholder="Введите ваше сообщение" maxlength="100"></textarea>
                    <div class="textarea-counter body-text-small"><span>0</span>/100</div>
                </div>
            </div>
        </div>
        <div class="custom-modal-footer">
            <div class="actions">
                <a class="button button__link button__small" data-fancybox-close>Отмена</a>
                <button type="submit" class="button button__block button__filled button__medium">Отправить</button>
            </div>
        </div>
    </form>

    <div class="custom-modal team-apply-modal success" style="display: none;" id="team-apply-success">
        <div class="custom-modal-header">
            <h6>Подача заявки в команду</h6>
        </div>
        <div class="custom-modal-body">
            <div class="form-message body-text-medium">
                Ваша заявка отправлена. Ожидайте подтверждения участников.
            </div>
        </div>
    </div>

    <div class="custom-modal team-apply-modal exist" style="display: none;" id="team-apply-exist">
        <div class="custom-modal-header">
            <h6>Подача заявки в команду </h6>
        </div>
        <div class="custom-modal-body">
            <div class="form-message body-text-medium">
                Вы уже отправили заявку, которая находится не рассмотрении участников.
            </div>
        </div>
    </div>

    <div class="custom-modal team-apply-modal fail" style="display: none;" id="team-apply-fail">
        <div class="custom-modal-header">
            <h6>Подача заявки в команду </h6>
        </div>
        <div class="custom-modal-body">
            <div class="form-message body-text-medium">
                Что-то пошло не так...
            </div>
        </div>
    </div>

    <form
        class="custom-modal actions-modal accept-invitation-form"
        style="display: none;"
        id="accept-invitation"
        action="<?php echo e(Route('personal.team.invitation.accept')); ?>"
        method="POST"
    >

        <?php echo csrf_field(); ?>

        <input type="hidden" id="accept-invitation-team-id" name="accept-invitation-team-id" value="">
        <input type="hidden" id="accept-invitation-id" name="accept-invitation-id" value="">

        <div class="custom-modal-header">
            <h6>Приглашение в команду</h6>
        </div>
        <div class="custom-modal-body">
            <div class="form-message body-text-medium">
                Вы действительно хотите принять приглашение в команду?
            </div>
        </div>
        <div class="custom-modal-footer">
            <div class="actions">
                <a class="button button__link button__small" data-fancybox-close>Отмена</a>
                <button type="submit" class="button button__block button__filled button__medium">Принять</button>
            </div>
        </div>
    </form>

    <form
        class="custom-modal actions-modal decline-invitation-form"
        style="display: none;"
        id="decline-invitation"
        action="<?php echo e(Route('personal.team.invitation.decline')); ?>"
        method="POST"
    >

        <?php echo csrf_field(); ?>

        <input type="hidden" id="decline-invitation-team-id" name="decline-invitation-team-id" value="">
        <input type="hidden" id="decline-invitation-id" name="decline-invitation-id" value="">

        <div class="custom-modal-header">
            <h6>Приглашение в команду</h6>
        </div>
        <div class="custom-modal-body">
            <div class="form-message body-text-medium">
                Вы действительно хотите отклонить приглашение в команду?
            </div>
        </div>
        <div class="custom-modal-footer">
            <div class="actions">
                <a class="button button__link button__small" data-fancybox-close>Отмена</a>
                <button type="submit" class="button button__block button__filled button__medium">Отклонить</button>
            </div>
        </div>
    </form><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/modal/teams.blade.php ENDPATH**/ ?>