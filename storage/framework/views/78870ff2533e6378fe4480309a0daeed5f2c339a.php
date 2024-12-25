<div class="team-content-item invitation">
    <div class="column">
        <div class="invitation-title desktop body-text-small">Кто отправил </div>
        <a class="team-item user-profile-link">
            <div class="team-item-icon">
                <?php if(empty($invitationAuthorAvatar)): ?>
                    <img src="/images/user-default.png">
                <?php else: ?>
                    <img src="<?php echo e(asset("storage/images/avatars/".$invitationAuthorAvatar)); ?>" alt="<?php echo e($invitationAuthor); ?>">
                <?php endif; ?>
            </div>
            <div class="team-info">
                <div class="invitation-title mobile body-text-small">Кто отправил </div>
                <div class="team-item-name body-text-large"><?php echo e($invitationAuthor); ?></div>
            </div>
        </a>
    </div>

    <?php if(!is_null($invitedUser)): ?>
        <div class="column">
            <div class="invitation-title desktop body-text-small">Кому отправлено</div>
            <a class="team-item user-profile-link">
                <div class="team-item-icon">
                    <?php if(empty($invitedUser->avatar)): ?>
                        <img src="/images/user-default.png">
                    <?php else: ?>
                        <img src="<?php echo e(asset("storage/images/avatars/".$invitedUser->avatar)); ?>" alt="<?php echo e($invitationAuthor); ?>">
                    <?php endif; ?>
                </div>
                <div class="team-info">
                    <div class="invitation-title mobile body-text-small">Кому отправлено</div>
                    <div class="team-item-name body-text-large"><?php echo e($invitedUser->name); ?> <?php echo e($invitedUser->surname); ?></div>
                </div>
            </a>
        </div>
    <?php else: ?>
        <div class="column">
            <div class="invitation-title desktop body-text-small">Кому отправлено</div>
            <div class="team-content-info">
                <div class="invitation-title mobile body-text-small">Кому отправлено</div>
                <div class="team-content-info-text body-text-large"><?php echo e($invitationEmail); ?></div>
            </div>
        </div>
    <?php endif; ?>

    <div class="column">
        <div class="invitation-title body-text-small">Дата отправки
            <span class="body-text-regular"><?php echo e($invitationCreated); ?></span>
        </div>

        <?php if($invitationStatus == 1): ?>
            <div class="team-content-label body-text-medium processing">
                Ожидается подтверждение
            </div>
        <?php elseif($invitationStatus == 2): ?>
            <div class="team-content-label body-text-medium success">
                Добавлен
            </div>
        <?php elseif($invitationStatus == 3): ?>
            <div class="team-content-label body-text-medium error">
                Приглашение отклонено
            </div>
        <?php endif; ?>

    </div>
</div><?php /**PATH C:\OSPanel\domains\green\resources\views/components/invitation.blade.php ENDPATH**/ ?>