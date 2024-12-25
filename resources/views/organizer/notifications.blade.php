<x-organizer-layout>
<x-slot name="title">Уведомления</x-slot>
  <x-slot name="content">
        <div class="content notifications">
            <div class="content-header">
                <h3>Уведомления</h3>
                <a href="{{ Route('organizer.notifications.create') }}" class="button button__block button__filled button__medium">Добавить</a>
            </div>
            <div class="notifications-layout">
                <div class="notifications-list">
                    @foreach ($notifications as $notification)
                        <x-notification
                            notification-id="{{ $notification->id }}"
                            notification-new=""
                            notification-date="{{ $notification->format_created_at }}"
                            notification-title="{{ $notification->title }}"
                            notification-text="{!! $notification->text !!}"
                        />
                    @endforeach
                </div>

                <div class="pagination-container">{{ $notifications->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}</div>

            </div>
        </div>
    </div>
  </x-slot>
</x-sponsor-layout>