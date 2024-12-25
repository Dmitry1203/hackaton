<div class="column">
	<div class="card widget-card notifications">
		<div class="card-header">
		<h6>Уведомления</h6>
		</div>
		<div class="card-body">
			<div class="notifications-list">
			@foreach ($notifications as $notification)

				<x-notification-main
					notification-link="#"
					notification-date="{{ $notification->format_created_at }}"
					notification-title="{{ $notification->title }}"
				/>

			@endforeach
			</div>
		</div>
	</div>
</div>