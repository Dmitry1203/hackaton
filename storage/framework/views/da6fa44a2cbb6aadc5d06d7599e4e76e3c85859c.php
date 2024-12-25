<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Команда <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
        <div class="content teams">

            <?php if(session('teamExist')): ?>
            <div class="position-absolute text-center bg-danger p-4">
                <h5>Невозможно принять заявку</h5>
                <p>Данный пользователь уже состоит в другой команде</p>
            </div>
            <?php endif; ?>

            <div class="content-header">
                <h3>Команда</h3>
                <a href="<?php echo e(Route('personal.teams')); ?>"
                    class="go-back-link button button__block button__light button__medium">
                    Список команд</a>
            </div>

            <div class="teams-layout">

                <div class="team-widget">
                    <div class="column">
                        <div class="team-widget-card">
                            <div class="logo">

                                <?php if(empty($myTeam[0]->logo)): ?>
                                <img src="/images/team-default.png" alt="Название команды">
                                <?php else: ?>
                                <img src="<?php echo e(asset("storage/images/logo/".$myTeam[0]->logo)); ?>"
                                    alt="<?php echo e($myTeam[0]->team); ?>">
                                <?php endif; ?>

                            </div>
                            <div class="team-title title-text-small"><?php echo e($myTeam[0]->team); ?></div>
                            <div class="team-date body-text-medium">Дата создания команды:
                                <?php echo e(_date_MM_DD_YYYY($myTeam[0]->created_at)); ?></div>
                        </div>

                        <?php if(!empty($myTeam[0]->chat)): ?>
                        <div class="team-widget-card">
                            <h6>Ссылка на чат команды</h6>
                            <div class="team-chat">
                                <button type="button" class="copy-button"></button>
                                <a target="_blank" href="<?php echo e($myTeam[0]->chat); ?>"
                                    class="button button__link button__small">Ссылка</a>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                    <div class="column">
                        <div class="team-widget-card">
                            <h6>Задача</h6>
                            <div class="body-text-medium"><?php echo e($myTeam[0]->Task); ?></p>
                            </div>
                        </div>
                        <div class="team-widget-card">
                            <h6>Описание команды</h6>
                            <div class="body-text-medium"><?php echo e($myTeam[0]->description); ?></div>
                        </div>
                        <div class="team-widget-card">
                            <div class="actions">
                                <a href="<?php echo e(Route('personal.team.edit')); ?>"
                                    class="edit-profile button button__block button__filled button__medium">Настройки профиля</a>
                                <a class="team-out button button__block button__outline__white button__medium">Покинуть команду</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="team-panel">
                    <ul class="tab-nav nav nav-pills body-text-medium">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Участники</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Заявки
                                <?php if(count($applications) > 0): ?>
                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="4" cy="4.5" r="4" fill="#1BD767" />
                                </svg>
                                <?php endif; ?>
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Приглашения
                                <?php if(count($invitations) > 0): ?>
                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="4" cy="4.5" r="4" fill="#1BD767" />
                                </svg>
                                <?php endif; ?>
                        </a></li>
                    </ul>

                    <div class="tab-content team-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="team-content-header">
                                <h6>Участники</h6>
                                <a class="add-user button button__block button__light button__medium">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Добавить участника</a>
                            </div>
                            <div class="team-list">
                                <?php $__currentLoopData = $membersTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <a class="team-item user-profile-link" data-name="<?php echo e($member->name); ?>"
                                    data-surname="<?php echo e($member->surname); ?>" data-age="<?php echo e($member->age); ?>"
                                    data-phone="<?php echo e($member->phone); ?>" data-email="<?php echo e($member->email); ?>"
                                    data-school="<?php echo e($member->school); ?>" data-class="<?php echo e($member->class); ?>"
                                    data-info="<?php echo e($member->about_me); ?>" data-avatar="<?php echo e($member->avatar); ?>">
                                    <div class="team-item-icon">
                                        <?php if(empty($member->avatar) ): ?>
                                        <img src="/images/user-default.png">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset("storage/images/avatars/".$member->avatar)); ?>"
                                            alt="<?php echo e($member->name); ?> <?php echo e($member->surname); ?>">
                                        <?php endif; ?>
                                    </div>

                                    <div class="team-item-name body-text-large">
                                        <?php echo e($member->name); ?> <?php echo e($member->surname); ?>

                                        <?php if(!is_null($member->join_team)): ?>
                                        <p class="body-text-small mt-2">В команде с <?php echo e($member->join_team); ?></p>
                                        <?php endif; ?>
                                    </div>

                                </a>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="team-content-header">
                                <h6>Заявки</h6>
                            </div>
                            <div class="team-content-list">
                                <?php if(count($applications) == 0): ?>
                                <span class="body-text-medium">Нет активных заявок</span>
                                <?php endif; ?>

                                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if (isset($component)) { $__componentOriginale058b1ec3e58ba848b1264664339e334df57b734 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Application::class, ['applicationId' => ''.e($application->id).'','applicationUserName' => ''.e($application->UserName).'','applicationUserSurname' => ''.e($application->UserSurname).'','applicationUserEmail' => ''.e($application->UserEmail).'','applicationUserPhone' => ''.e($application->UserPhone).'','applicationUserSchool' => ''.e($application->UserSchool).'','applicationUserClass' => ''.e($application->UserClass).'','applicationUserAbout' => ''.e($application->UserAbout).'','applicationUserAvatar' => ''.e($application->UserAvatar).'','applicationUserAge' => ''.e($application->age).'','applicationMessage' => ''.e($application->message).'','applicationDate' => ''.e($application->created_at).'']); ?>
<?php $component->withName('application'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale058b1ec3e58ba848b1264664339e334df57b734)): ?>
<?php $component = $__componentOriginale058b1ec3e58ba848b1264664339e334df57b734; ?>
<?php unset($__componentOriginale058b1ec3e58ba848b1264664339e334df57b734); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <div class="tab-pane" id="tab_3">
                            <div class="team-content-header">
                                <h6>Приглашения</h6>
                            </div>
                            <div class="team-content-list">
                                <?php if(count($invitations) == 0): ?>
                                <span class="body-text-medium">Нет приглашений</span>
                                <?php endif; ?>

                                <?php $__currentLoopData = $invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if (isset($component)) { $__componentOriginalcc9a4bfec7326540d75a7272362a0cc73a788278 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Invitation::class, ['invitationAuthor' => ''.e($invitation->AuthorName).' '.e($invitation->AuthorSurname).'','invitationAuthorAvatar' => ''.e($invitation->AuthorAvatar).'','invitationEmail' => ''.e($invitation->email).'','invitationStatus' => ''.e($invitation->status).'','invitationUserId' => ''.e($invitation->invited_user_id).'','invitationCreated' => ''.e($invitation->created).'']); ?>
<?php $component->withName('invitation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc9a4bfec7326540d75a7272362a0cc73a788278)): ?>
<?php $component = $__componentOriginalcc9a4bfec7326540d75a7272362a0cc73a788278; ?>
<?php unset($__componentOriginalcc9a4bfec7326540d75a7272362a0cc73a788278); ?>
<?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('personal.modal.team', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/teamProfile.blade.php ENDPATH**/ ?>