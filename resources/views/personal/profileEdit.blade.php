<x-personal-layout>
    <x-slot name="title">Мой профиль. Редактирование</x-slot>
    <x-slot name="content">
        <div class="content account__user">
            <div class="content-header">
                <h3>Мой профиль</h3>
                <a href="{{ Route('personal.profile') }}"
                    class="button button__block button__filled button__medium">Просмотр профиля</a>
            </div>
            <div class="account-layout">
                <form id="profile-form" name="profile-form" class="account-form settings-form"
                    action="{{ Route('personal.profile.update') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="column col">
                            <h5>Контактные данные</h5>
                            <div class="form-block">
                                <div class="form-group">
                                    <label for="surname" class="body-text-large">Фамилия*</label>
                                    <input type="text" name="surname" class="form-control" id="surname"
                                        placeholder="Фамилия" value="{{ auth()->user()->surname }}" data-required="1"
                                        maxlength="32">
                                    @error('surname')
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name" class="body-text-large">Имя*</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя"
                                        value="{{ auth()->user()->name }}" data-required="1" maxlength="32">
                                    @error('name')
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="body-text-large">Телефон*</label>
                                    <input type="tel" name="phone" class="form-control" id="phone"
                                        placeholder="+7 (___) ___-__-__" value="{{ auth()->user()->phone }}"
                                        data-required="1">
                                    @error('phone')
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="birthdate" class="body-text-large">Дата рождения*</label>
                                    <input type="text" name="birthdate" class="form-control" id="birthdate"
                                        data-value="{{ is_null(auth()->user()->date_b) ? '' : _date_MM_DD_YYYY(auth()->user()->date_b) }}"
                                        data-required="1">
                                    @error('birthdate')
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="city" class="body-text-large">Город*</label>
                                    <input
                                        type="text"
                                        name="city"
                                        class="form-control"
                                        id="city"
                                        placeholder="Город"
                                        value="@if(!empty(@old('city'))){{@old('city')}}@else{{auth()->user()->city}}@endif"
                                        data-required="1"
                                        maxlength="32"
                                    >
                                    @error('city')
                                    <div></div>
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="level" class="body-text-large">Ваш уровень</label>
                                    <select name="level" id="level" class="form-control">
                                      <option value="">Выберите уровень</option>
                                      <option
                                      value="Студент"
                                      @if(auth()->user()->level == 'Студент') selected @endif
                                      >Студент</option>

                                      <option
                                      value="Junior"
                                      @if(auth()->user()->level == 'Junior') selected @endif
                                      >Junior</option>

                                      <option
                                      value="Middle"
                                      @if(auth()->user()->level == 'Middle') selected @endif
                                      >Middle</option>

                                      <option
                                      value="Senior"
                                      @if(auth()->user()->level == 'Senior') selected @endif
                                      >Senior</option>

                                      <option
                                      value="Lead"
                                      @if(auth()->user()->level == 'Lead') selected @endif
                                      >Lead</option>

                                      <option
                                      value="Trainee"
                                      @if(auth()->user()->level == 'Trainee') selected @endif
                                      >Trainee</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="job-search" class="body-text-large">Вы находитесь в поиске работы?</label>
                                    <select name="job-search" id="job-search" class="form-control">
                                      <option
                                      value="Нет"
                                      @if(auth()->user()->is_job_search == 'Нет') selected @endif
                                      >Нет</option>
                                      <option
                                      value="Да"
                                      @if(auth()->user()->is_job_search == 'Да') selected @endif
                                      >Да</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="experience-hack" class="body-text-large">Опыт участия<br>в хакатонах<br>&nbsp;<br></label>
                                    <div class="input-group">
                                        <textarea
                                            type="text"
                                            name="experience-hack"
                                            class="form-control"
                                            id="experience-hack"
                                            placeholder="Расскажите о Вашем опыте участия в других хакатонах" maxlength="256"
                                        >@if(!empty(@old('experience-hack'))){{@old('experience-hack')}}@else{{auth()->user()->experience_hack}}@endif</textarea>
                                        <div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                    </div>
                                    @error('experience-hack')
                                    <div></div>
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <hr>
                                <div class="body-text-large">Публичная информация:</div>
                                <div class="body-text-small mt-2 mb-5">Другие участники будут видеть эту информацию о вас и это поможет найти команду. Вы в любой момент можете изменить то, что тут написано.</div>

                                <div class="form-group">
                                    <label for="education" class="body-text-large">Образование<br>&nbsp;<br></label>
                                    <div class="input-group">
                                        <textarea
                                        type="text"
                                        name="education"
                                        class="form-control"
                                        id="education"
                                        placeholder="Образование"
                                        maxlength="256">@if(!empty(@old('education'))){{@old('education')}}@else{{auth()->user()->education}}@endif</textarea>
                                        <div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                    </div>
                                    @error('education')
                                    <div></div>
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="experience" class="body-text-large">Опыт работы<br>&nbsp;<br></label>
                                    <div class="input-group">
                                        <textarea
                                        type="text"
                                        name="experience"
                                        class="form-control"
                                        id="experience"
                                        placeholder="Опыт работы"
                                        maxlength="256"
                                        >@if(!empty(@old('experience'))){{@old('experience')}}@else{{auth()->user()->experience}}@endif</textarea>
                                        <div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                    </div>
                                    @error('experience')
                                    <div></div>
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="about-me" class="body-text-large">О себе*<br>&nbsp;<br></label>
                                    <div class="input-group">
                                        <textarea
                                        type="text"
                                        name="about-me"
                                        class="form-control"
                                        id="about-me"
                                        placeholder="Расскажите о себе"
                                        data-required="1"
                                        maxlength="256">@if(!empty(@old('about-me'))){{@old('about-me')}}@else{{auth()->user()->about_me}}@endif</textarea>
                                        <div class="textarea-counter body-text-small"><span>0</span>/256</div>
                                    </div>
                                    @error('about-me')
                                    <div></div>
                                    <p class="error-message body-text-small">{!! $message !!}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="column col">
                            <h5>Фотография профиля</h5>
                            <div class="form-block">
                                <div class="account-photo">

                                    <div class="preview">
                                        @if (empty(auth()->user()->avatar) )
                                        <img src="/images/user-default.png">
                                        @else
                                        <img src="{{ asset("storage/images/avatars/".auth()->user()->avatar) }}"
                                            alt="{{ auth()->user()->name }} {{ auth()->user()->surname }}">
                                        @endif
                                    </div>

                                    <div class="action">
                                        <div class="custom-upload custom-upload-simple">

                                            @if (empty(auth()->user()->avatar) )
                                            <input type="hidden" name="required">
                                            @else
                                            <input type="hidden" name="required" value="1">
                                            @endif

                                            <label>
                                                <input type="file" class="custom-file-input" id="avatar" name="avatar"
                                                    accept=".jpg, .jpeg, .png">
                                                @if (empty(auth()->user()->avatar) )
                                                <div class="custom-upload-button body-text-regular">Загрузить
                                                    фотографию*</div>
                                                @else
                                                <div class="custom-upload-button body-text-regular">Обновить фотографию
                                                </div>
                                                @endif
                                            </label>
                                            <div class="required-message body-text-small">Загрузка фото обязательна</div>
                                            <div class="error-message body-text-small"></div>
                                        </div>
                                        <div class="note body-text-small">Не больше 5 Мб</div>
                                        <div class="note body-text-small">Допустимые форматы файлов - .jpg, .png</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="column col">
                            <div class="form-actions">
                                <button type="submit"
                                    class="submit-button button button__block button__filled button__large">
                                    <span class="loader"></span>
                                    <span>Сохранить изменения</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-personal-layout>