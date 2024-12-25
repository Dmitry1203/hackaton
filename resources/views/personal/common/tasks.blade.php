<div class="card widget-card tasks">
	<div class="card-header">
		<h6>Задачи хакатона</h6>
		<div class="actions d-none">
			<a href="{{ Route('personal.tasks') }}" class="button button__link button__small widget-link">Перейти в раздел
				<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M6 3.54919L12 9.54919L6 15.5492" stroke-width="1.5" stroke-linecap="round"
				stroke-linejoin="round" />
				</svg>
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="tasks-list">

			@foreach ($tasks as $task)

				<x-hakaton-task
					task-id="{{ $task->task_id }}"
					task-name="{{ $task->name }}"
				/>

			@endforeach

		</div>
	</div>
</div>