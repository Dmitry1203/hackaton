<x-personal-layout>
	<x-slot name="title">Команды</x-slot>
    <x-slot name="content">
        <div class="content teams">
            <div class="content-header">
                <h3>Команда</h3>
                <a href="{{ Route('personal.teams') }}" class="go-back-link button button__block button__light button__medium">
                    Список команд</a>
            </div>

            <div class="teams-layout">

                <div class="team-widget">
                    <div class="column">
                        <div class="team-widget-card">
                            <div class="logo">

                                @if(empty($team[0]->logo))
                                    <img src="/images/team-default.png" alt="Название команды">
                                @else
                                    <img src="{{ asset("storage/images/logo/".$team[0]->logo) }}"
                                    alt="{{ $team[0]->team }}">
                                @endif

                            </div>
                            <div class="team-title title-text-small">{{ $team[0]->team }}</div>
                            <div class="team-date body-text-medium">Дата создания команды: {{ _date_MM_DD_YYYY($team[0]->created_at) }}</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="team-widget-card">
                            <h6>Задача</h6>
                            <div class="body-text-medium">{{ $team[0]->Task }}</p>
                            </div>
                        </div>
                        <div class="team-widget-card">
                            <h6>Описание команды</h6>
                            <div class="body-text-medium">{{ $team[0]->description }}</div>
                        </div>

                        {{-- Все действия, только если пользователь не в команде --}}

                        @if(empty(auth()->user()->team_id))

						<div class="team-widget-card">

                            @if(empty($myApplication[0]->id))
                                <div class="actions">
                                <a
                                class="apply-button button button__block button__filled button__medium"
                                data-id="{{ $team[0]->team_id }}"
                                data-team="{{ $team[0]->team }}"
                                >
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Подать заявку</a>
                                </div>
                            @else

                                <h6>Заявка в команду подана {{ _date_MM_DD_YYYY ($myApplication[0]->created_at) }}</h6>

                            @endif

                        </div>

                        @endif

                    </div>
                </div>

                @if(count($membersTeam) > 0)

                <div class="team-panel">
                    <div class="team-content-header">
                        <h6>Участники</h6>
                    </div>
                    <div class="team-list">
                        @foreach ($membersTeam as $member)

                            <a
                                class="team-item user-profile-link"
                                data-name="{{ $member->name }}"
                                data-surname="{{ $member->surname }}"
                                data-age="{{ $member->age }}"
                                data-phone="{{ $member->phone }}"
                                data-email="{{ $member->email }}"
                                data-school="{{ $member->school }}"
                                data-class="{{ $member->class }}"
                                data-info="{{ $member->about_me }}"
                                data-avatar="{{ $member->avatar }}"
                            >
                                <div class="team-item-icon">
                                @if (empty($member->avatar) )
                                    <img src = "/images/user-default.png">
                                @else
                                    <img src="{{ asset("storage/images/avatars/".$member->avatar) }}"
                                    alt="{{ $member->name }} {{ $member->surname }}">
                                @endif
                                </div>

                                <div class="team-item-name body-text-large">
                                    {{ $member->name }} {{ $member->surname }}
                                </div>
                            </a>

                        @endforeach
                    </div>
                </div>

                @endif

            </div>
        </div>

        @include('personal.modal.teamOther')
        @include('personal.modal.teams')

    </x-slot>
</x-personal-layout>
