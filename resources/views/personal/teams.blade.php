<x-personal-layout>
    <x-slot name="title">Команды</x-slot>
    <x-slot name="content">
        <div class="content teams">
            <div class="content-header">
                <h3>Команды</h3>

                @if (auth()->user()->has_profile < 2)
                	<span class="tippy-tooltip" data-tippy-content='Заполните профиль, чтобы создать команду'>
						<a href class="create-button button button__block button__filled button__medium disabled">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
							Создать команду</a>
					</span>
				@else
					@if (!$myTeam)
						<a href="{{ Route('personal.team.create') }}" class="create-button button button__block button__filled button__medium">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						Создать команду</a>
					@else
						<span class="tippy-tooltip" data-tippy-content='Вы уже состоите в команде'>
							<a href class="create-button button button__block button__filled button__medium disabled">
								<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M12 5.5V19.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M5 12.5H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
								Создать команду</a>
						</span>
					@endif
				@endif
			</div>

			<div class="teams-layout">

				@if (auth()->user()->has_profile > 1)
					@if (!$myTeam)
						<x-info-box	text="Вы не состоите в команде" />
					@else
						<x-my-team
							team-id="{{ $myTeam[0]->team_id }}"
							team-name="{!! $myTeam[0]->team !!}"
							team-task="{{ $myTeam[0]->Task }}"
							team-avatars="{{ $avatarsInString }}"
							team-users-count="{{ $usersInMyTeam }}"
						/>
					@endif
				@endif

				<div class="teams-block">

                    <ul class="tab-nav nav nav-pills body-text-medium">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab_1" data-toggle="tab">Все команды</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab_2" data-toggle="tab">Приглашения
                            	@if ($newInvitations > 0)
	                                <svg width="8" height="9" viewBox="0 0 8 9" fill="none"
	                                    xmlns="http://www.w3.org/2000/svg">
	                                    <circle cx="4" cy="4.5" r="4" fill="#1BD767" />
	                                </svg>
                                @endif
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <h5>Все команды</h5>

							<div class="filter">
		                        <div class="form-group">
		                            <label for="team" class="body-text-large">Поиск команды</label>
		                            <input
		                            type="text"
		                            name="search-team"
		                            class="form-control search-control"
		                            id="search-team"
		                            placeholder="Введите название команды">
		                        </div>
		                        <div class="form-group">
		                            <label for="tasks-filter" class="body-text-large">Фильтр по задачам</label>
		                            <select name="tasks-filter" class="form-control list-control" id="tasks-filter" placeholder="Задача">
		                            	<option value="#">Все задачи</option>
		                                @foreach ($tasks as $task)
		                                	<option value="{{ $task->task_id }}">{{ $task->name }}</option>
										@endforeach
		                            </select>
		                        </div>
		                    </div>

                    		<br>

							<div class="teams-list">

								{{-- Другие команды --}}

								@if (!$myTeam)

									@foreach ($teams as $team)
										@php
											$applicationCreatedAt = '';
											$applicationStatus = '';
										@endphp

										{{-- Если я подавал заявки в другие команды, то покажем дату и статус --}}

										@foreach ($applications as $application)
											@if ($application->team_id == $team->team_id)
												@php
												$applicationCreatedAt = $application->created_at;
												$applicationStatus = $application->status;
												break
												@endphp
											@endif
										@endforeach

										<x-team
											team-id="{{ $team->team_id }}"
											team-task="{{ $team->Task }}"
											team-task-id="{{ $team->TaskId }}"
											team-name="{!! $team->team !!}"
											team-application-created="{{ $applicationCreatedAt }}"
											team-application-status="{{ $applicationStatus }}"
											in-team=0
										/>

									@endforeach

								@else

									@foreach ($teams as $team)

										<x-team
											team-id="{{ $team->team_id }}"
											team-task="{{ $team->Task }}"
											team-task-id="{{ $team->TaskId }}"
											team-name="{!! $team->team !!}"
											team-application-created=""
											team-application-status=""
											in-team=1
										/>

									@endforeach

								@endif
							</div>
						</div>
						<div class="tab-pane" id="tab_2">
							<h5>Приглашения</h5>
                            <div class="invitations-list">
                            	@foreach ($invitations as $invitation)
	                        		<x-invitation-team
	                        			invitation-id="{{ $invitation->id }}"
	                        			invitation-status="{{ $invitation->status }}"
										team-id="{{ $invitation->TeamId }}"
										team-task="{{ $invitation->Task }}"
										team-name="{{ $invitation->Team }}"
									/>
								@endforeach
								@if (count($invitations) == 0)
									<p class="body-text-large mt-5">Нет новых приглашений</p>
                                @endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        @include('personal.modal.teams')

    </x-slot>

</x-personal-layout>