<x-personal-layout>
	<x-slot name="title">Мои уведомления</x-slot>
    <x-slot name="content">
		<div class="content notifications">
			<div class="content-header">
			<h3>Мои уведомления</h3>
			</div>
			<div class="notifications-layout">

				@if (count($notifications) == 0)
					<x-info-box	text="Нет уведомлений."	/>
				@endif

                <div class="notifications-list">
                	@php $counter = 0; @endphp
					@foreach ($notifications as $notification)
						@php
							$counter++;
							$isNew = '';
						@endphp
						@if ($counter <= $newNotifications)
							@php $isNew = 'new'; @endphp
						@endif
						<x-notification
							notification-id="{{ $notification->id }}"
							notification-new="{{ $isNew }}"
							notification-date="{{ $notification->format_created_at }}"
							notification-title="{{ $notification->title }}"
							notification-text="{!! $notification->text !!}"
						/>

					@endforeach
				</div>

			</div>
        </div>
    </x-slot>
</x-personal-layout>
