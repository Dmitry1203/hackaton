<div class="team-content-item">

    <a
    class="team-item user-profile-link"
        data-name="<?php echo e($applicationUserName); ?>"
        data-surname="<?php echo e($applicationUserSurname); ?>"
        data-age="<?php echo e($applicationUserAge); ?>"
        data-phone="<?php echo e($applicationUserPhone); ?>"
        data-email="<?php echo e($applicationUserEmail); ?>"
        data-school="<?php echo e($applicationUserSchool); ?>"
        data-class="<?php echo e($applicationUserClass); ?>"
        data-info="<?php echo e($applicationUserAbout); ?>"
        data-avatar="<?php echo e($applicationUserAvatar); ?>"
    >
        <div class="team-item-icon">

            <?php if(empty($applicationUserAvatar)): ?>
                <img src="/images/user-default.png">
            <?php else: ?>
                <img src="<?php echo e(asset("storage/images/avatars/".$applicationUserAvatar)); ?>" alt="<?php echo e($applicationUserName); ?>">
            <?php endif; ?>

        </div>
        <div class="team-item-name body-text-large"><?php echo e($applicationUserName); ?> <?php echo e($applicationUserSurname); ?></div>
    </a>
    <div class="team-content-info">
        <div class="team-content-info-title body-text-small">
            Комментарий
        </div>
        <div class="team-content-info-text body-text-medium"><?php echo e($applicationMessage); ?></div>
    </div>
    <div class="actions">
        <a class="application-action accept-application"
            data-id="<?php echo e($applicationId); ?>"
            data-name="<?php echo e($applicationUserName); ?> <?php echo e($applicationUserSurname); ?>"
        ></a>
        <a class="application-action decline-application"
            data-id="<?php echo e($applicationId); ?>"
            data-name="<?php echo e($applicationUserName); ?> <?php echo e($applicationUserSurname); ?>"
        ></a>
    </div>
</div><?php /**PATH C:\OSPanel\domains\green\resources\views/components/application.blade.php ENDPATH**/ ?>