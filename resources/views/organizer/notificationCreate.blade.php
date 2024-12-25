<x-organizer-layout>
<x-slot name="title">Добавить уведомление</x-slot>
  <x-slot name="content">

        <div class="content sponsor">
            <div class="content-header">
                <h3>Добавить уведомление</h3>
            </div>
            <div class="sponsor-layout">
                <div class="sponsors-block">

                    <form
                        id="notification-form"
                        name="notification-form"
                        class="notifications-form"
                        action="{{ Route('organizer.notifications.store') }}"
                        method="POST"
                        autocomplete="off"
                        enctype="multipart/form-data"
                    >
                    @csrf

                        <h5>Основная информация</h5>
                        <div class="form-block">
                            <div class="form-group form-group-row">
                                <label for="notification_name" class="body-text-large">Заголовок</label>
                                <input type="text" name="notification_name" class="form-control" id="notification_name"
                                    placeholder="Заголовок" data-required="1">
                            </div>
                            <div class="form-group form-group-row textarea-group">
                                <label for="notification_text" class="body-text-large">Основной текст</label>
                                <textarea type="text" name="notification_text" class="form-control"
                                    id="notification_text" placeholder="Основной текст" data-required="1"></textarea>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit"
                                class="save-notification submit-button button button__block button__filled button__large">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
  </x-slot>
</x-sponsor-layout>