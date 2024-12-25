<x-personal-layout>
    <x-slot name="title">Интенсив</x-slot>
    <x-slot name="content">
        <div class="content courses">
            <div class="content-header">
                <h3>Интенсив</h3>
            </div>
            <div class="courses-layout">
                <div class="courses-list">
                    @foreach ($video as $v)
                        @php $isWatched = 0 @endphp
                        @foreach ($watched as $watch)
                            @if($watch->user_id == auth()->user()->user_id && $watch->video_id == $v->video_id)
                                @php $isWatched = 1 @endphp
                            @endif
                        @endforeach
                        <x-video
                            video-id="{{ $v->video_id }}"
                            video-watched="{{ $isWatched }}"
                            video-name="{{ $v->name }}"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-personal-layout>
