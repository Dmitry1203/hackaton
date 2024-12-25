<div class="notification-item <?php echo e($notificationNew); ?>">
	<div class="notification-title"><a name="<?php echo e($notificationHash); ?>"></a>
		<div class="label body-text-medium">
			<svg width="25" height="24" viewBox="0 0 25 24" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<rect opacity="0.15" width="24.8892" height="24" rx="7" fill="#13D7FF" />
				<path
					d="M12.4444 18.6673C16.2627 18.6673 19.3581 15.6825 19.3581 12.0007C19.3581 8.31875 16.2627 5.33398 12.4444 5.33398C8.62611 5.33398 5.53076 8.31875 5.53076 12.0007C5.53076 15.6825 8.62611 18.6673 12.4444 18.6673Z"
					stroke="#00A3FF" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M12.4443 8V12L15.2098 13.3333" stroke="#00A3FF" stroke-linecap="round"
					stroke-linejoin="round" />
			</svg>
			<?php echo e($notificationDate); ?>

		</div>
		<h6><?php echo e($notificationTitle); ?></h6>
	</div>
	<div class="notification-content body-text-large"><?php echo e($notificationText); ?></div>
</div><?php /**PATH C:\OSPanel\domains\smolathon\resources\views/components/notification.blade.php ENDPATH**/ ?>