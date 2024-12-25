<x-organizer-layout>
<x-slot name="title">Критерии оценивания команд</x-slot>
  <x-slot name="content">

        <div class="content sponsor">
            <div class="content-header">
                <h3>Критерии оценивания команд</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="criteria-form"
                        name="criteria-form"
                        class="info-form"
                        action="{{ Route('organizer.event.criteria.update', ['id' => $eventId]) }}"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    @csrf

                        <div class="form-inner">
                            <div class="form-section">
                                <div class="form-block">
                                    <div class="criteria-container">

                                        <input type="hidden" id="removed-elements" name="removed-elements" value="">

                                        @foreach ($criteria as $key=>$item)

                                        <input type="hidden" id="criteria-ids[]" name="criteria-ids[]" value="{{ $item->id }}">

                                        <div class="criteria-item">
                                            <div class="form-group form-group-row">
                                                <label class="body-text-large">Название критерия</label>
                                                <input
                                                    type="text"
                                                    name="criteria[]"
                                                    class="form-control"
                                                    placeholder="Название критерия"
                                                    value="{{ $item->criteria }}"
                                                    data-required="1">
                                                <button type="button" class="remove-button"
                                                    data-target=".criteria-item" data-id="{{ $item->id }}"></button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="add-button add-criteria button button__large">
                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            Добавить критерий
                                        </button>
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