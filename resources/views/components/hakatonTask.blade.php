{{-- Список задач на главной страницы в разделе Задачи хакатона --}}
<a href="{{ Route('personal.task', ['id' => $taskId ]) }}" class="widget-item">
	<div class="widget-inner">
		<div class="widget-text body-text-medium">{{ $taskName }}
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M8 4L16 12L8 20" stroke="#00A3FF" stroke-width="1.5" stroke-linecap="round"
			stroke-linejoin="round" />
			</svg>
		</div>
	</div>
</a>