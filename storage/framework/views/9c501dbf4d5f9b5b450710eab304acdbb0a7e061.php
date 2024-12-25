        <div class="custom-modal user-profile-modal" style="display: none;" id="user-profile">
            <div class="custom-modal-header">
                <h6>Профиль участника</h6>
            </div>
            <div class="custom-modal-body">
                <div class="user-profile-block">
                    <div class="user-icon" id="card-user-avatar"></div>
                    <div class="user-info">
                        <div class="user-name body-text-large" id="card-user-name"></div>
                        <div class="user-info-list body-text-medium">
                            <div class="user-info-item">
                                <div class="user-info-icon" style="background-image: url(/images/icons/mail.svg)"></div>
                                <div id="card-user-email"></div>
                            </div>
                            <div class="user-info-item">
                                <div class="user-info-icon" style="background-image: url(/images/icons/phone.svg)"></div>
                                <div id="card-user-phone"></div>
                            </div>
                            <div class="user-info-item">
                                <div class="user-info-icon" style="background-image: url(/images/icons/degree.svg)"></div>
                                <span id="card-user-school"></span>
                            </div>
                            <div class="user-info-item">
                                <div class="user-info-icon" style="background-image: url(/images/icons/work.svg)"></div>
                                <span id="card-user-work"></span>
                            </div>
                        </div>
                        <div  id="card-user-about" class="user-about body-text-regular"></div>
                    </div>
                </div>
            </div>
        </div>

        <form
            class="custom-modal actions-modal add-user-form"
            style="display: none;"
            id="add-user"
            action="<?php echo e(Route('personal.team.invitation.create')); ?>"
            method="POST"
        >
            <?php echo csrf_field(); ?>
            <div class="custom-modal-header">
                <h6>Добавление участника </h6>
            </div>
            <div class="custom-modal-body">
                <div class="form-message body-text-medium">
                    Пригласить участника по email
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="email"
                        placeholder="Введите Email участника" data-required="1">
                </div>
            </div>
            <div class="custom-modal-footer">
                <div class="actions">
                    <a class="button button__link button__small" data-fancybox-close>Отмена</a>
                    <button type="submit" class="button button__block button__filled button__medium">Отправить
                        запрос</button>
                </div>
            </div>
        </form>

        <form
            class="custom-modal actions-modal team-out-form"
            style="display: none;"
            id="team-out"
            action="<?php echo e(Route('personal.team.leave')); ?>"
            method="POST"
        >

            <?php echo csrf_field(); ?>

            <div class="custom-modal-header">
                <h6>Покинуть команду</h6>
            </div>
            <div class="custom-modal-body">
                <div class="form-message body-text-medium">
                    Вы действительно хотите покинуть команду <?php echo e($myTeam[0]->team); ?>?
                </div>
            </div>
            <div class="custom-modal-footer">
                <div class="actions">
                    <a class="button button__link button__small" data-fancybox-close>Отмена</a>
                    <button type="submit" class="button button__block button__filled button__medium">Покинуть</button>
                </div>
            </div>
        </form>

        <form
            class="custom-modal actions-modal accept-application-form"
            style="display: none;"
            id="accept-application"
            action="<?php echo e(Route('personal.team.application.accept')); ?>"
            method="POST"
        >
            <?php echo csrf_field(); ?>

            <input type="hidden" id="application-accept-id" name="application-accept-id">

            <div class="custom-modal-header">
                <h6>Заявка участника</h6>
            </div>
            <div class="custom-modal-body">
                <div class="form-message body-text-medium">
                    Вы действительно хотите принять участника <span id="application-user-name"></span> в команду?
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
            class="custom-modal actions-modal decline-application-form"
            style="display: none;"
            id="decline-application"
            action="<?php echo e(Route('personal.team.application.decline')); ?>"
            method="POST"
        >
            <?php echo csrf_field(); ?>

            <input type="hidden" id="application-decline-id" name="application-decline-id">

            <div class="custom-modal-header">
                <h6>Заявка участника</h6>
            </div>
            <div class="custom-modal-body">
                <div class="form-message body-text-medium">
                    Вы действительно хотите отклонить участника <span id="application-user-name"></span>?
                </div>
            </div>
            <div class="custom-modal-footer">
                <div class="actions">
                    <a class="button button__link button__small" data-fancybox-close>Отмена</a>
                    <button type="submit" class="button button__block button__filled button__medium">Отклонить</button>
                </div>
            </div>
        </form><?php /**PATH C:\OSPanel\domains\smolathon\resources\views/personal/modal/team.blade.php ENDPATH**/ ?>