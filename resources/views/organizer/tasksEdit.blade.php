<x-organizer-layout>
<x-slot name="title">Задачи для хакатона</x-slot>
  <x-slot name="content">

        <div class="content sponsor">
            <div class="content-header">
                <h3>Задачи для хакатона</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="tasks-form"
                        name="tasks-form"
                        class="info-form"
                        action="{{ Route('organizer.event.tasks.update', ['id' => $eventId]) }}"
                        method="POST"
                        autocomplete="off"
                    >
                    @csrf

                        <div class="form-inner">
                            <div class="form-section">
                                <div class="tasks-container">

                                    <input type="hidden" id="removed-elements" name="removed-elements" value="">

                                    @foreach ($tasks as $key=>$task)

                                    <input type="hidden" id="task-ids[]" name="task-ids[]" value="{{ $task->id }}">

                                    <div class="form-block task-item">
                                        <div class="form-block-header">
                                            <h6>Задача <span class="number">{{ $key+1 }}</span></h6>
                                            <button type="button" class="remove-button"
                                                data-target=".task-item" data-id="{{ $task->id }}"></button>
                                        </div>
                                        <div class="form-group form-group-row">
                                            <label class="body-text-large">Название задачи</label>
                                            <input
                                                type="text"
                                                name="task[]"
                                                class="form-control"
                                                placeholder="Название задачи"
                                                value="{{ $task->name }}"
                                                data-required="1"
                                            >
                                        </div>
                                        <div class="form-group form-group-row textarea-group">
                                            <label class="body-text-large">Описание задачи</label>
                                            <textarea
                                            type="text"
                                            name="task_description[]"
                                            class="form-control"
                                            placeholder="Описание задачи"
                                            data-required="1">{!! $task->text !!}</textarea>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="actions">
                                    <button type="button" class="add-task add-button button button__large">
                                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                        Добавить задачу
                                    </button>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit"
                                    class="save-notification submit-button button button__block button__filled button__large">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

  </x-slot>
</x-sponsor-layout>