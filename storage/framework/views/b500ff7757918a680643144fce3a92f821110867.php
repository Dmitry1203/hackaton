<a href="<?php echo e(Route('personal.notifications') . '#'.$notificationHash); ?>" class="widget-item">
	<div class="widget-inner">
		<div class="label body-text-small">
			<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect opacity="0.15" width="36" height="36" rx="7" fill="#13D7FF" />
			<path
			d="M24 14C24 12.4087 23.3679 10.8826 22.2426 9.75736C21.1174 8.63214 19.5913 8 18 8C16.4087 8 14.8826 8.63214 13.7574 9.75736C12.6321 10.8826 12 12.4087 12 14C12 21 9 23 9 23H27C27 23 24 21 24 14Z"
			stroke="#00A3FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			<path
			d="M19.7295 27C19.5537 27.3031 19.3014 27.5547 18.9978 27.7295C18.6941 27.9044 18.3499 27.9965 17.9995 27.9965C17.6492 27.9965 17.3049 27.9044 17.0013 27.7295C16.6977 27.5547 16.4453 27.3031 16.2695 27"
			stroke="#00A3FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			<?php echo e($notificationDate); ?>

		</div>
		<div class="widget-text body-text-medium"><?php echo e($notificationTitle); ?></div>
	</div>
</a><?php /**PATH C:\OSPanel\domains\green\resources\views/components/notificationMain.blade.php ENDPATH**/ ?>