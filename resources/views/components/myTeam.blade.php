<div class="card current-team">
	<div class="card-header">
		<h6>Моя команда</h6>
	</div>
	<div class="card-body">
		<div class="teams-item">
			<div class="team-wrapper">
				<div class="team-title">
					<div class="name title-text-light">{{ $teamName }}</div>
					<div class="users">
						{{-- Тут не более 5 аватаров --}}
						<div class="users-list">
							@foreach ($teamAvatars as $avatar)
								@if(!empty($avatar))
									<div class="user"><img src='{{ asset("storage/images/avatars/{$avatar}") }}'></div>
								@else
									<div class="user"><img src = "/images/user-default.png"></div>
								@endif
							@endforeach
						</div>
						@if($teamUsersCountPlus > 0)
							<div class="users-count body-text-medium">+ {{ $teamUsersCountPlus }}</div>
						@endif
					</div>
				</div>
				<div class="team-task">
					<div class="title body-text-small">Задача</div>
					<div class="text body-text-medium">
						@if (empty($teamTask))
							Не выбрана
						@else
							{{ $teamTask }}
						@endif
					</div>
				</div>
			</div>
			<a href="{{ Route('personal.team.profile') }}" class="team-profile button button__block button__light button__small">Профиль команды</a>
		</div>
	</div>
</div>
