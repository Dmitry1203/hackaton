<div class="teams-item invitations-item">
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


	<div class="actions">
	@if($invitationStatus == 1)

	    <a
	    	class="invitations-action accept-invitation"
	    	data-id="{{ $invitationId }}"
	    	data-team="{{ $teamId }}"
	    ></a>
	    <a
	    	class="invitations-action decline-invitation"
	    	data-id="{{ $invitationId }}"
	    	data-team="{{ $teamId }}"
	    ></a>

	@elseif($invitationStatus == 2)

	    <p class="body-text-medium">Вы приняли предложение</p>

    @elseif($invitationStatus == 3)

	    <p class="body-text-medium">Вы отклонили предложение</p>

    @endif
    </div>


</div>