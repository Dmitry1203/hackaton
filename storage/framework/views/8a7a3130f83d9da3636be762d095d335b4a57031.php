<?php if (isset($component)) { $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PersonalLayout::class, []); ?>
<?php $component->withName('personal-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Команды <?php $__env->endSlot(); ?>
     <?php $__env->slot('content', null, []); ?> 
        <div class="content teams">
            <div class="content-header">
                <h3>Команда</h3>
                <a href="<?php echo e(Route('personal.teams')); ?>" class="go-back-link button button__block button__light button__medium">
                    Список команд</a>
            </div>

            <div class="teams-layout">

                <div class="team-widget">
                    <div class="column">
                        <div class="team-widget-card">
                            <div class="logo">

                                <?php if(empty($team[0]->logo)): ?>
                                    <img src="/images/team-default.png" alt="Название команды">
                                <?php else: ?>
                                    <img src="<?php echo e(asset("storage/images/logo/".$team[0]->logo)); ?>"
                                    alt="<?php echo e($team[0]->team); ?>">
                                <?php endif; ?>

                            </div>
                            <div class="team-title title-text-small"><?php echo e($team[0]->team); ?></div>
                            <div class="team-date body-text-medium">Дата создания команды: <?php echo e(_date_MM_DD_YYYY($team[0]->created_at)); ?></div>
                        </div>
                        <div class="team-widget-card">
                            <h6>Ссылка на чат команды</h6>
                            <div class="team-chat">
                                <button type="button" class="copy-button"></button>
                                <a target="_blank" href="<?php echo e($team[0]->chat); ?>" class="button button__link button__small">Ссылка</a>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="team-widget-card">
                            <h6>Задача</h6>
                            <div class="body-text-medium"><?php echo e($team[0]->Task); ?></p>
                            </div>
                        </div>
                        <div class="team-widget-card">
                            <h6>Описание команды</h6>
                            <div class="body-text-medium"><?php echo e($team[0]->description); ?></div>
                        </div>

                        

                        <?php if(empty(auth()->user()->team_id)): ?>

						<div class="team-widget-card">

                            <?php if(empty($myApplication[0]->id)): ?>
                                <div class="actions">
                                <a
                                class="apply-button button button__block button__filled button__medium"
                                data-id="<?php echo e($team[0]->team_id); ?>"
                                data-team="<?php echo e($team[0]->team); ?>"
                                >
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Подать заявку</a>
                                </div>
                            <?php else: ?>

                                <h6>Заявка в команду подана <?php echo e(_date_MM_DD_YYYY ($myApplication[0]->created_at)); ?></h6>

                            <?php endif; ?>

                        </div>

                        <?php endif; ?>

                    </div>
                </div>

                <?php if(count($membersTeam) > 0): ?>

                <div class="team-panel">
                    <div class="team-content-header">
                        <h6>Участники</h6>
                    </div>
                    <div class="team-list">
                        <?php $__currentLoopData = $membersTeam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <a
                                class="team-item user-profile-link"
                                data-name="<?php echo e($member->name); ?>"
                                data-surname="<?php echo e($member->surname); ?>"
                                data-age="<?php echo e($member->age); ?>"
                                data-phone="<?php echo e($member->phone); ?>"
                                data-email="<?php echo e($member->email); ?>"
                                data-school="<?php echo e($member->school); ?>"
                                data-class="<?php echo e($member->class); ?>"
                                data-info="<?php echo e($member->about_me); ?>"
                                data-avatar="<?php echo e($member->avatar); ?>"
                            >
                                <div class="team-item-icon">
                                <?php if(empty($member->avatar) ): ?>
                                    <img src = "/images/user-default.png">
                                <?php else: ?>
                                    <img src="<?php echo e(asset("storage/images/avatars/".$member->avatar)); ?>"
                                    alt="<?php echo e($member->name); ?> <?php echo e($member->surname); ?>">
                                <?php endif; ?>
                                </div>

                                <div class="team-item-name body-text-large">
                                    <?php echo e($member->name); ?> <?php echo e($member->surname); ?>

                                </div>
                            </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <?php endif; ?>

            </div>
        </div>

        <?php echo $__env->make('personal.modal.teamOther', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?>
<?php /**PATH C:\OSPanel\domains\green\resources\views/personal/teamProfileOther.blade.php ENDPATH**/ ?>