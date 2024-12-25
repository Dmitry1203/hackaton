<x-organizer-layout>
<x-slot name="title">Логотипы партнеров</x-slot>
  <x-slot name="content">

        <div class="content sponsor">
            <div class="content-header">
                <h3>Логотипы партнеров</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">
                    <form
                        id="logos-form"
                        name="logos-form"
                        class="info-form"
                         action="{{ Route('organizer.event.logos.update', ['id' => $eventId]) }}"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    @csrf

                        <input type="hidden" id="removed-elements" name="removed-elements" value="">
                        <div class="form-inner">
                            <div class="form-group form-group-row partner-logo-group">
                                <span class="form-label body-text-large">Логотип</span>
                                <div class="custom-upload custom-upload-advanced custom-upload-multi">
                                    <div class="preview-container">
                                        @foreach ($logos as $logo)
                                        <div class="preview-item">
                                            <button type="button" class="preview-remove"
                                                data-target=".partner-item" data-id="{{ $logo->id }}"></button>
                                            <div class="preview-image">
                                                <img src="{{ asset("storage/images/logo/".$logo->logo) }}">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <label>
                                        <input type="file" name="partner_logo[]" accept=".jpg, .jpeg, .png">
                                        <div class="add-button button button__large">
                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg> Добавить логотип
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-actions mt-5">
                                <button
                                type="submit"
                                class="save-notification submit-button button button__block button__filled button__large">
                                Сохранить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

  </x-slot>
</x-sponsor-layout>