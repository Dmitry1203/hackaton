<x-personal-layout>
	<x-slot name="title">О мероприятии</x-slot>
    <x-slot name="content">
        <div class="content about">
            <div class="content-header">
                <h3>О мероприятии</h3>
            </div>
            <div class="about-layout">
                <div class="about-card">
                    <h6>{{ $event->event_name }}</h6>
                    <div class="body-text-medium">{!! $event->event_text !!}</div>
                </div>

                <div class="about-card">
                    <div class="about-card-wrapper">
                        @if (!empty($event->logo))
                            <div class="logo">
                                <img src="{{ asset("storage/images/logo/".$event->logo) }}">
                            </div>
                        @endif
                        <div class="about-card-content">
                            <h6>{{ $event->organizer_name }}</h6>
                            <div class="body-text-medium">{!! $event->organizer_text !!}</div>
                        </div>
                    </div>
                </div>

                <div class="card about-card">
                    <h6>Партнеры</h6>
                    <div class="about-card-list">
                        @foreach ($logos as $logo)
                            <div class="about-card-item">
                                <img src="{{ asset("storage/images/logo/".$logo->logo) }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-personal-layout>
