<x-organizer-layout>
<x-slot name="title">Общая информации о хакатоне</x-slot>
  <x-slot name="content">

        <div class="content sponsor">
            <div class="content-header">
                <h3>Общая информации о хакатоне</h3>
            </div>
            <div class="sponsor-layout">

                <div class="sponsors-block">
                    <form
                        id="event-form-1"
                        name="event-form-1"
                        class="info-form"
                        action="{{ Route('organizer.event.update', ['id' => $eventId]) }}"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    @csrf

                        <div class="form-inner">
                            <div class="form-section">
                                <div class="form-block">

                                    @if (!empty($event->logo))
                                        <div class="form-block">
                                            <img src="{{ asset("storage/images/logo/".$event->logo) }}">
                                        </div>
                                    @endif

                                    <div class="form-block-header">
                                        <h6>О мероприятии</h6>
                                    </div>

                                    <div class="form-group form-group-row">
                                        <label for="event_name" class="body-text-large">Заголовок</label>
                                        <input
                                            type="text"
                                            name="event_name"
                                            class="form-control"
                                            id="event_name"
                                            placeholder="Заголовок" data-required="1"
                                            value="{{ $event->event_name }}"
                                        >
                                    </div>
                                    <div class="form-group form-group-row textarea-group">
                                        <label for="event_text" class="body-text-large">Основной текст</label>
                                        <textarea
                                            type="text"
                                            name="event_text"
                                            class="form-control"
                                            id="event_text"
                                            placeholder="Основной текст" data-required="1">{{ $event->event_text }}</textarea>
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
                                            name="organizer_name"
                                            class="form-control"
                                            id="organizer_name"
                                            placeholder="Заголовок" data-required="1"
                                            value="{{ $event->organizer_name }}"
                                        >
                                    </div>
                                    <div class="form-group form-group-row textarea-group">
                                        <label for="organizer_text" class="body-text-large">Основной текст</label>
                                        <textarea
                                            type="text"
                                            name="organizer_text"
                                            class="form-control"
                                            id="organizer_text"
                                            placeholder="Основной текст" data-required="1">{{ $event->organizer_text }}</textarea>
                                    </div>

                                    <div class="form-group form-group-row">
                                        <span class="form-label body-text-large">Логотип</span>
                                        <div class="custom-upload custom-upload-advanced custom-upload-single">
                                            <div class="preview-container"></div>
                                            <label>
                                                <input type="file" name="organizer_logo" accept=".jpg, .jpeg, .png">
                                                <div class="add-button button button__large">
                                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg> Загрузить логотип
                                                </div>
                                            </label>
                                        </div>
                                    </div>

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