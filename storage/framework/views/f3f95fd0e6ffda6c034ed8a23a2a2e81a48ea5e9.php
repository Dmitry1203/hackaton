<div
	class="teams-item"
	data-name="<?php echo e($teamName); ?>"
	data-id="<?php echo e($teamTaskId); ?>"
>
	<a href="<?php echo e(Route('personal.team.profile', [ 'id' => $teamId ])); ?>" class="team-link team-wrapper">
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
			<?php if(!empty($teamTask)): ?>
				<div class="text body-text-medium"><?php echo e($teamTask); ?></div>
			<?php else: ?>
				<div class="text body-text-medium">не выбрана</div>
			<?php endif; ?>
		</div>
	</a>

	<?php if(empty($inTeam)): ?>

		<?php if(empty($teamApplicationCreated)): ?>

			<a
				class="apply-button button button__block button__light button__small"
				data-id="<?php echo e($teamId); ?>"
				data-team="<?php echo e($teamName); ?>"
			>Подать	заявку</a>

		<?php else: ?>

			<span class="tippy-tooltip"
			    data-tippy-content='Заявка подана <?php echo e(_date_MM_DD_YYYY ($teamApplicationCreated)); ?>'>
			    <a class="apply-button disabled button button__block button__light button__small">Подать заявку</a>
			</span>

		<?php endif; ?>

	<?php else: ?>

		<span class="tippy-tooltip"
		    data-tippy-content='Вы не можете вступить в другую команду, пока не покинете свою'>
		    <a class="apply-button disabled button button__block button__light button__small">Подать заявку</a>
		</span>

	<?php endif; ?>

</div><?php /**PATH C:\OSPanel\domains\green\resources\views/components/team.blade.php ENDPATH**/ ?>