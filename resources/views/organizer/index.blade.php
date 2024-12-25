<x-organizer-layout>
<x-slot name="title">Главная страница</x-slot>
<x-slot name="content">

    <div class="content sponsor">
        <div class="content-header">
            <h3>Заполнение данных о хакатоне</h3>
        </div>
        <div class="sponsor-layout">
            <div class="sponsors-block">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Общая информация о хакатоне</h5>
                            <a class="body-text-medium" href="{{ Route('organizer.event.edit', ['id' => $event->event_id ])}}">Редактировать</a>
                        </div>

                        @if (!empty($event->logo))
                            <div class="form-block">
                                <img src="{{ asset("storage/images/logo/".$event->logo) }}">
                            </div>
                        @endif

                        <div class="form-block">
                            <div class="form-block-header">
                                <h6>О мероприятии</h6>
                            </div>
                            <div class="form-group form-group-row">
                                <label for="event_name" class="body-text-large">Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $event->event_name }}"
                                    readonly
                                >
                            </div>
                            <div class="form-group form-group-row textarea-group">
                                <label for="event_text" class="body-text-large">Основной текст</label>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    id="event_text"
                                    readonly>{{ $event->event_text }}</textarea>
                            </div>
                        </div>
                        <div class="form-block">
                            <div class="form-block-header">
                                <h6>Информация об организаторе</h6>
                            </div>
                            <div class="form-group form-group-row">
                                <label for="organizer_name" class="body-text-large">Заголовок</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $event->organizer_name }}"
                                    readonly
                                >
                            </div>
                            <div class="form-group form-group-row textarea-group">
                                <label for="organizer_text" class="body-text-large">Основной текст</label>
                                <textarea
                                    type="text"
                                    class="form-control"
                                    readonly>{{ $event->event_text }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Логотипы партнеров</h5>
                            <a class="body-text-medium" href="{{ Route('organizer.event.logos.edit', ['id' => $event->event_id ])}}">Редактировать</a>
                        </div>
                        <div class="form-block">
                            @foreach ($logos as $logo)
                                <img class="p-3" src="{{ asset("storage/images/logo/".$logo->logo) }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Временные этапы хакатона</h5>
                            <a class="body-text-medium" href="{{ Route('organizer.event.stages.edit', ['id' => $event->event_id ])}}">Редактировать</a>
                        </div>
                        <div class="timeline-container">
                            @foreach ($stages as $key=>$stage)
                                <div class="form-block timeline-item">
                                    <div class="form-block-header">
                                        <h6><span class="number">{{ $key+1 }}</span> Этап</h6>
                                    </div>
                                    <div class="form-row-grid">
                                        <div class="form-group">
                                            <label class="body-text-large">Название этапа</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="{{ $stage->stage }}"
                                                readonly
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label class="body-text-large">Сокращенное название этапа</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                value="{{ $stage->stage_short }}"
                                                readonly
                                            >
                                        </div>
                                    </div>
                                    <div class="form-row-grid">
                                        <div class="column">
                                            <div class="form-group">
                                                <label class="body-text-large">Описание этапа</label>
                                                <textarea
                                                type="text"
                                                class="form-control"
                                                readonly>{{ $stage->stage_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="column">
                                            <div class="form-group">
                                                <label class="body-text-large">Сокращенное описание этапа</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="{{ $stage->stage_description_short }}"
                                                    readonly
                                                >
                                            </div>
                                            <div class="form-row-grid">
                                                <div class="form-group">
                                                    <label class="body-text-large">Дата окончания</label>
                                                    <input
                                                        type="text"
                                                        class="form-control expiration-date"
                                                        value="{{ $stage->stage_date_end }}"
                                                        readonly
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <label class="body-text-large">Время окончания</label>
                                                        <input
                                                            type="text"
                                                            name="stage_time_end[]"
                                                            class="form-control expiration-time"
                                                            value="{{ $stage->stage_time_end }}"
                                                            readonly
                                                        >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>




            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Задачи для хакатона</h5>
                            <a class="body-text-medium" href="{{ Route('organizer.event.tasks.edit', ['id' => $event->event_id ])}}">Редактировать</a>
                        </div>
                        <div class="tasks-container">
                            @foreach ($tasks as $key=>$task)
                            <div class="form-block task-item">
                                <div class="form-block-header">
                                    <h6>Задача <span class="number">{{ $key+1 }}</span></h6>
                                </div>
                                <div class="form-group form-group-row">
                                    <label class="body-text-large">Название задачи</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $task->name }}"
                                        readonly
                                    >
                                </div>
                                <div class="form-group form-group-row textarea-group">
                                    <label class="body-text-large">Описание задачи</label>
                                    <textarea
                                    type="text"
                                    class="form-control"
                                    readonly
                                    >{!! $task->text !!}</textarea>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="sponsors-block mt-5">
                <div class="form-inner">
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <h5>Критерии оценивания команд</h5>
                            <a class="body-text-medium" href="{{ Route('organizer.event.criteria.edit', ['id' => $event->event_id ])}}">Редактировать</a>
                        </div>
                        <div class="criteria-container">
                            @foreach ($criteria as $key=>$item)
                            <div class="criteria-item">
                                <div class="form-group form-group-row">
                                    <label class="body-text-large">Название критерия</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $item->criteria }}"
                                        readonly
                                        >
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-slot>
</x-sponsor-layout>