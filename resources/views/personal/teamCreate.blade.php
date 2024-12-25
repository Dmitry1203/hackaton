<x-personal-layout>
    <x-slot name="title">Главная страница</x-slot>
    <x-slot name="bodyClassName">profile tasks</x-slot>
    <x-slot name="content">

        <div class="content teams">
            <div class="content-header">
                <h3>Создание команды</h3>
                <a href="{{ Route('personal.teams') }}"
                    class="go-back-link button button__block button__light button__medium">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 14.5L4 9.5L9 4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M20 20.5V13.5C20 12.4391 19.5786 11.4217 18.8284 10.6716C18.0783 9.92143 17.0609 9.5 16 9.5H4"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Вернуться к списку</a>
            </div>
            <div class="teams-layout">

                @if (!$myTeamInfo)

                <form id="team-form" name="team-form" class="create-team-form novalidate"
                    action="{{ Route('personal.team.store') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-inner">
                        <div class="column">
                            <h5>Основная информация</h5>
                            <div class="form-block">
                                <div class="form-group">
                                    <label for="team" class="body-text-large">Название команды*</label>
                                    <input type="text" name="team" class="form-control" id="team"
                                        placeholder="Название команды" value="" data-required="1">
                                    @error('team')
                                    <div class="text-danger">{!! $message !!}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="chat" class="body-text-large">Ссылка на чат команды</label>
                                    <input type="url" name="chat" class="form-control" id="chat"
                                        placeholder="Вставьте ссылку" value="">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="body-text-large">Описание команды*</label>
                                    <div class="input-group">
                                        <textarea type="text" name="description" class="form-control" id="description"
                                            placeholder="Описание команды" maxlength="256" data-required="1"></textarea>
                                        <div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <h5>Логотип команды</h5>
                            <div class="form-block">
                                <div class="account-photo">

                                    <div class="preview" style="background-color: #0089D7">
                                        <img alt="">
                                        <div class="preview-text">
                                            К
                                        </div>
                                    </div>

                                    <div class="action">
                                        <div class="custom-upload custom-upload-simple">
                                            <label>
                                                <input type="file" class="custom-file-input" id="logo" name="logo"
                                                    accept="image/jpeg">
                                                <div class="custom-upload-button body-text-medium">Загрузить логотип
                                                </div>
                                            </label>
                                            <div class="error-message body-text-small"></div>
                                        </div>
                                        <div class="note body-text-small">Не больше 5 Мб</div>
                                        <div class="note body-text-small">Допустимые форматы файлов - .png, .jpg</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="button"
                            class="submit-button create-team button button__block button__filled button__large">
                            Создать команду
                        </button>
                    </div>
                </form>

                @else

                <x-info-box text="Вы уже состоите в команде и не можете создать новую." />

                @endif

            </div>
        </div>

        @include('personal.modal.teamCreate')

    </x-slot>
</x-personal-layout>