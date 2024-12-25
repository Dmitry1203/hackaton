<x-personal-layout>
	<x-slot name="title">Задачи</x-slot>
    <x-slot name="content">
        <div class="content tasks">
            <div class="content-header">
                <h3>Задачи</h3>
            </div>
            <div class="tasks-layout">

                <div class="tasks-list">

					{{-- У моей команды выбрана задача --}}
					@if(!empty($myTeam[0]->TaskId))
						<x-task
							task-id="{{ $myTeam[0]->TaskExternalId }}"
							task-active="active"
							task-name="{{ $myTeam[0]->Task }}"
						/>
					@endif

					@foreach ($otherTasks as $task)

						<x-task
							task-id="{{ $task->task_id }}"
							task-active=""
							task-name="{{ $task->name }}"
						/>

					@endforeach

                </div>
            </div>
        </div>
    </x-slot>
</x-personal-layout>
