<x-personal-layout>
	<x-slot name="title">Задача</x-slot>
    <x-slot name="content">

            <div class="content task">
                <div class="content-header">
                    <h3>Задачи</h3>
                    <a href="{{ Route('personal.tasks') }}" class="go-back-link button button__block button__light button__medium">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 14.5L4 9.5L9 4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M20 20.5V13.5C20 12.4391 19.5786 11.4217 18.8284 10.6716C18.0783 9.92143 17.0609 9.5 16 9.5H4"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        Вернуться к списку</a>
                </div>
                <div class="task-layout">
                    <div class="task-card">
                        <div class="task-card-header">
                            <h6>{{ $task->name }}</h6>
                            @if ($myTask)
                            	<div class="status body-text-small">Выбрана</div>
                            @endif
                        </div>
                        <div class="task-text body-text-medium">{!! $task->text !!}</div>
                    </div>

                    {{-- не моя задача и я в команде --}}

                    @if (!$myTask && !empty(auth()->user()->team_id) && $hasSolutions == 0 )
                        <div class="action">
                            <form
                                id="task-form"
                                name="task-form"
                                class="create-team-form"
                                action="{{ Route('personal.task.binding') }}"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    id="id"
                                    value="{{ $id }}"
                                >
                                @csrf
                                <button class="submit-button button button__block button__filled button__medium">Выбрать задачу</button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>

    </x-slot>
</x-personal-layout>
