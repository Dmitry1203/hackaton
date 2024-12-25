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

                <h3>Команды</h3>
                <?php if(auth()->user()->has_profile
                < 2): ?> <span class="tippy-tooltip" data-tippy-content='Заполните профиль, чтобы создать команду'>
						<a href="#" class="create-button button button__block button__filled button__medium disabled">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							Создать команду</a>
					</span>
				<?php else: ?>
					<?php if(!$myTeam): ?>
						<a href="<?php echo e(Route('personal.team.create')); ?>" class="create-button button button__block button__filled button__medium">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						Создать команду</a>
					<?php else: ?>
						<span class="tippy-tooltip" data-tippy-content='Вы уже состоите в команде'>
							<a href="#" class="create-button button button__block button__filled button__medium disabled">
								<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								Создать команду</a>
						</span>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="teams-layout">

				<?php if(auth()->user()->has_profile > 1): ?>
					<?php if(!$myTeam): ?>
						<?php if (isset($component)) { $__componentOriginal1860eb390c0bfd03dba5123177278f829976c146 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InfoBox::class, ['text' => 'Вы не состоите в команде, выберите или создайте свою команду!']); ?>
<?php $component->withName('info-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1860eb390c0bfd03dba5123177278f829976c146)): ?>
<?php $component = $__componentOriginal1860eb390c0bfd03dba5123177278f829976c146; ?>
<?php unset($__componentOriginal1860eb390c0bfd03dba5123177278f829976c146); ?>
<?php endif; ?>
					<?php else: ?>
						<?php if (isset($component)) { $__componentOriginale37e6d75cbbbdb67e05247134cfe7b9b9c4d3d79 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MyTeam::class, ['teamId' => ''.e($myTeam[0]->team_id).'','teamName' => ''.e($myTeam[0]->team).'','teamTask' => ''.e($myTeam[0]->Task).'','teamAvatars' => ''.e($avatarsInString).'','teamUsersCount' => ''.e($usersInMyTeam).'']); ?>
<?php $component->withName('my-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale37e6d75cbbbdb67e05247134cfe7b9b9c4d3d79)): ?>
<?php $component = $__componentOriginale37e6d75cbbbdb67e05247134cfe7b9b9c4d3d79; ?>
<?php unset($__componentOriginale37e6d75cbbbdb67e05247134cfe7b9b9c4d3d79); ?>
<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>

				<div class="teams-block">

                    <ul class="tab-nav nav nav-pills body-text-medium">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab_1" data-toggle="tab">Все команды</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab_2" data-toggle="tab">Приглашения
                            	<?php if(count($invitations) > 0): ?>
	                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
	                                    xmlns="http://www.w3.org/2000/svg">
	                                    <circle cx="4" cy="4.5" r="4" fill="#1BD767" />
	                                </svg>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <h5>Все команды</h5>

							<div class="filter">
		                        <div class="form-group">
		                            <label for="team" class="body-text-large">Поиск команды</label>
		                            <input
		                            type="text"
		                            name="search-team"
		                            class="form-control search-control"
		                            id="search-team"
		                            placeholder="Введите название команды">
		                        </div>
		                        <div class="form-group">
		                            <label for="tasks-filter" class="body-text-large">Фильтр по задачам</label>
		                            <select name="tasks-filter" class="form-control list-control" id="tasks-filter" placeholder="Задача">
		                            	<option value="#">Все задачи</option>
		                                <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                                	<option value="<?php echo e($task->task_id); ?>"><?php echo e($task->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                            </select>
		                        </div>
		                    </div>

                    		<br>

							<div class="teams-list">

								

								<?php if(!$myTeam): ?>

									<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
											$applicationCreatedAt = '';
											$applicationStatus = '';
										?>

										

										<?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($application->team_id == $team->team_id): ?>
												<?php
												$applicationCreatedAt = $application->created_at;
												$applicationStatus = $application->status;
												break
												?>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

										<?php if (isset($component)) { $__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Team::class, ['teamId' => ''.e($team->team_id).'','teamTask' => ''.e($team->Task).'','teamTaskId' => ''.e($team->TaskId).'','teamName' => ''.e($team->team).'','teamApplicationCreated' => ''.e($applicationCreatedAt).'','teamApplicationStatus' => ''.e($applicationStatus).'','inTeam' => '0']); ?>
<?php $component->withName('team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f)): ?>
<?php $component = $__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f; ?>
<?php unset($__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f); ?>
<?php endif; ?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php else: ?>

									<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<?php if (isset($component)) { $__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Team::class, ['teamId' => ''.e($team->team_id).'','teamTask' => ''.e($team->Task).'','teamTaskId' => ''.e($team->TaskId).'','teamName' => ''.e($team->team).'','teamApplicationCreated' => '','teamApplicationStatus' => '','inTeam' => '1']); ?>
<?php $component->withName('team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f)): ?>
<?php $component = $__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f; ?>
<?php unset($__componentOriginal4e87815adf488e11d3a1ff66d2598d879810534f); ?>
<?php endif; ?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php endif; ?>
							</div>
						</div>

						<div class="tab-pane" id="tab_2">
							<h5>Приглашения</h5>
                            <div class="invitations-list">

                            	<?php $__currentLoopData = $invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	                        		<?php if (isset($component)) { $__componentOriginal49d2af28cd846fea193c331299a1ab2b56b752c7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InvitationTeam::class, ['invitationId' => ''.e($invitation->id).'','invitationStatus' => ''.e($invitation->status).'','teamId' => ''.e($invitation->TeamId).'','teamTask' => ''.e($invitation->Task).'','teamName' => ''.e($invitation->Team).'']); ?>
<?php $component->withName('invitation-team'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49d2af28cd846fea193c331299a1ab2b56b752c7)): ?>
<?php $component = $__componentOriginal49d2af28cd846fea193c331299a1ab2b56b752c7; ?>
<?php unset($__componentOriginal49d2af28cd846fea193c331299a1ab2b56b752c7); ?>
<?php endif; ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php if(count($invitations) == 0): ?>
									<p class="body-text-large mt-5">Нет новых приглашений</p>
                                <?php endif; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <?php echo $__env->make('personal.modal.teams', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php $__env->endSlot(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4)): ?>
<?php $component = $__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4; ?>
<?php unset($__componentOriginal08448aee20404a0b59e1f3a120f707fd870b3da4); ?>
<?php endif; ?><?php /**PATH C:\OSPanel\domains\green\resources\views/personal/teams.blade.php ENDPATH**/ ?>