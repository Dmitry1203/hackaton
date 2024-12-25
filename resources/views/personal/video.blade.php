<x-personal-layout>
    <x-slot name="title">{{ $video->name}}</x-slot>
    <x-slot name="content">
        <div class="content courses">
            <div class="content-header">
                <h3>{{ $video->name}}</h3>
            </div>
            <div class="courses-layout">
                {!! $video->code !!}
            </div>
        </div>
    </x-slot>
</x-personal-layout>
