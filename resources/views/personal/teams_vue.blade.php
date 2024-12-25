<x-personal-layout>
	<x-slot name="title">Команды</x-slot>
    <x-slot name="content">
		<style>
		[v-cloak] > * { display:none; }
		[v-cloak]::before { content: "loading..."; }
		</style>
		<div class="content teams">
			<div class="content-header">
				<h3>Команды</h3>
				@if (auth()->user()->status < 2)
					<span class="tippy-tooltip" data-tippy-content='Заполните профиль, чтобы создать команду'>
						<a href="#" class="create-button button button__block button__filled button__medium disabled">
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
							<a href="#" class="create-button button button__block button__filled button__medium disabled">
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

				@if (auth()->user()->status > 1)
					@if (!$myTeam)
						<x-info-box	text="Вы не состоите в команде, выберите или создайте свою команду!" />
					@else
						<x-my-team
							team-id="{{ $myTeam[0]->team_id }}"
							team-name="{{ $myTeam[0]->team }}"
							team-task="{{ $myTeam[0]->Task }}"
						/>
					@endif
				@endif

				<div class="teams-block">
					<h5>Все команды</h5>

					<div class="teams-list" id="app" v-cloak>
						<v-teams></v-teams>
					</div>

				</div>
			</div>
		</div>

    </x-slot>

</x-personal-layout>
<script src="/v-components/vue3.2.6.js"></script>
<script src="/v-components/axios.min.js"></script>
<script src="/v-components/teams.js"></script>
