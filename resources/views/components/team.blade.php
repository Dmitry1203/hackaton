<div
	class="teams-item"
	data-name="{{ $teamName }}"
	data-id="{{ $teamTaskId }}"
>
	<a href="{{ Route('personal.team.profile', [ 'id' => $teamId ])}}" class="team-link team-wrapper">
		<div class="team-title">
			<div class="name title-text-light">{{ $teamName }}</div>
			<div class="users">
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
			@if(!empty($teamTask))
				<div class="text body-text-medium">{{ $teamTask }}</div>
			@else
				<div class="text body-text-medium">не выбрана</div>
			@endif
		</div>
	</a>
</div>