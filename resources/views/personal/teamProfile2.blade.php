<x-personal-layout>
    <x-slot name="title">Команда</x-slot>
    <x-slot name="content">
        <div class="content teams">

            @if (session('teamExist'))
            <div class="position-absolute text-center bg-danger p-4">
                <h5>Невозможно принять заявку</h5>
                <p>Данный пользователь уже состоит в другой команде</p>
            </div>
            @endif

            <div class="content-header">
                <h3>Команда</h3>
                <a href="{{ Route('personal.teams') }}"
                    class="go-back-link button button__block button__light button__medium">
                    Список команд</a>
            </div>

            <div class="teams-layout">

                <div class="team-widget">
                    <div class="column">
                        <div class="team-widget-card">
                            <div class="logo">

                                @if(empty($myTeam[0]->logo))
                                <img src="/images/team-default.png" alt="Название команды">
                                @else
                                <img src="{{ asset("storage/images/logo/".$myTeam[0]->logo) }}"
                                    alt="{{ $myTeam[0]->team }}">
                                @endif

                            </div>
                            <div class="team-title title-text-small">{{ $myTeam[0]->team }}</div>
                            <div class="team-date body-text-medium">Дата создания команды:
                                {{ _date_MM_DD_YYYY($myTeam[0]->created_at) }}</div>
                        </div>

                        @if (!empty($myTeam[0]->chat))
                        <div class="team-widget-card">
                            <h6>Ссылка на чат команды</h6>
                            <div class="team-chat">
                                <button type="button" class="copy-button"></button>
                                <a target="_blank" href="{{ $myTeam[0]->chat }}"
                                    class="button button__link button__small">Ссылка</a>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="column">
                        <div class="team-widget-card">
                            <h6>Задача</h6>
                            <div class="body-text-medium">{{ $myTeam[0]->Task }}</p>
                            </div>
                        </div>
                        <div class="team-widget-card">
                            <h6>Описание команды</h6>
                            <div class="body-text-medium">{{ $myTeam[0]->description }}</div>
                        </div>
                        <div class="team-widget-card">
                            <div class="actions">
                                <a href="{{ Route('personal.team.edit') }}"
                                    class="edit-profile button button__block button__filled button__medium">Настройки профиля</a>
                                <a class="team-out button button__block button__outline__white button__medium">Покинуть команду</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="team-panel">
                    <ul class="tab-nav nav nav-pills body-text-medium">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Участники</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Заявки
                                @if (count($applications) > 0)
                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="4" cy="4.5" r="4" fill="#1BD767" />
                                </svg>
                                @endif
                            </a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Приглашения
                                @if (count($invitations) > 0)
                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="4" cy="4.5" r="4" fill="#1BD767" />
                                </svg>
                                @endif
                        </a></li>
                    </ul>

                    <div class="tab-content team-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="team-content-header">
                                <h6>Участники***</h6>
                                <a class="add-user button button__block button__light button__medium">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Добавить участника</a>
                            </div>
                            <div class="team-list">
                                @foreach ($membersTeam as $member)

                                <a class="team-item user-profile-link" data-name="{{ $member->name }}"
                                    data-surname="{{ $member->surname }}" data-age="{{ $member->age }}"
                                    data-phone="{{ $member->phone }}" data-email="{{ $member->email }}"
                                    data-school="{{ $member->school }}" data-class="{{ $member->class }}"
                                    data-info="{{ $member->about_me }}" data-avatar="{{ $member->avatar }}">
                                    <div class="team-item-icon">
                                        @if (empty($member->avatar) )
                                        <img src="/images/user-default.png">
                                        @else
                                        <img src="{{ asset("storage/images/avatars/".$member->avatar) }}"
                                            alt="{{ $member->name }} {{ $member->surname }}">
                                        @endif
                                    </div>

                                    <div class="team-item-name body-text-large">
                                        {{ $member->name }} {{ $member->surname }}
                                        @if (!is_null($member->join_team))
                                        <p class="body-text-small mt-2">В команде с {{ $member->join_team }}</p>
                                        @endif
                                    </div>

                                </a>

                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <div class="team-content-header">
                                <h6>Заявки</h6>
                            </div>
                            <div class="team-content-list">
                                @if (count($applications) == 0)
                                <span class="body-text-medium">Нет активных заявок</span>
                                @endif

                                @foreach ($applications as $application)
                                    <x-application
                                        application-id="{{ $application->id }}"
                                        application-user-name="{{ $application->UserName }}"
                                        application-user-surname="{{ $application->UserSurname }}"
                                        application-user-email="{{ $application->UserEmail }}"
                                        application-user-phone="{{ $application->UserPhone }}"
                                        application-user-school="{{ $application->UserSchool }}"
                                        application-user-class="{{ $application->UserClass }}"
                                        application-user-about="{{ $application->UserAbout }}"
                                        application-user-avatar="{{ $application->UserAvatar }}"
                                        application-user-age="{{ $application->age }}"
                                        application-message="{{ $application->message }}"
                                        application-date="{{ $application->created_at }}"
                                    />
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane" id="tab_3">
                            <div class="team-content-header">
                                <h6>Приглашения</h6>
                            </div>
                            <div class="team-content-list">
                                @if (count($invitations) == 0)
                                <span class="body-text-medium">Нет приглашений</span>
                                @endif

                                @foreach ($invitations as $invitation)

                                    <x-invitation
                                        invitation-author="{{ $invitation->AuthorName }} {{ $invitation->AuthorSurname }}"
                                        invitation-author-avatar="{{ $invitation->AuthorAvatar }}"
                                        invitation-email="{{ $invitation->email }}"
                                        invitation-status="{{ $invitation->status }}"
                                        invitation-user-id="{{ $invitation->invited_user_id }}"
                                        invitation-created="{{ $invitation->created }}"
                                    />

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('personal.modal.team')

    </x-slot>
</x-personal-layout>