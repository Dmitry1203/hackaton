<div class="card current-team">
	<div class="card-header">
		<h6>Моя команда</h6>
	</div>
	<div class="card-body">
		<div class="teams-item">
			<div class="team-wrapper">
				<div class="team-title">
					<div class="name title-text-light"><?php echo e($teamName); ?></div>
					<div class="users">
						
						<div class="users-list">
							<?php $__currentLoopData = $teamAvatars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if(!empty($avatar)): ?>
									<div class="user"><img src='<?php echo e(asset("storage/images/avatars/{$avatar}")); ?>'></div>
								<?php else: ?>
									<div class="user"><img src = "/images/user-default.png"></div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
						<?php if($teamUsersCountPlus > 0): ?>
							<div class="users-count body-text-medium">+ <?php echo e($teamUsersCountPlus); ?></div>
						<?php endif; ?>
					</div>
				</div>
				<div class="team-task">
					<div class="title body-text-small">Задача</div>
					<div class="text body-text-medium">
						<?php if(empty($teamTask)): ?>
							Не выбрана
						<?php else: ?>
							<?php echo e($teamTask); ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
			<a href="<?php echo e(Route('personal.team.profile')); ?>" class="team-profile button button__block button__light button__small">Профиль команды</a>
		</div>
	</div>
</div>
<?php /**PATH C:\OSPanel\domains\smolathon\resources\views/components/myTeam.blade.php ENDPATH**/ ?>