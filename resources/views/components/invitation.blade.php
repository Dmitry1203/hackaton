<div class="team-content-item invitation">
    <div class="column">
        <div class="invitation-title desktop body-text-small">Кто отправил </div>
        <a class="team-item user-profile-link">
            <div class="team-item-icon">
                @if (empty($invitationAuthorAvatar))
                    <img src="/images/user-default.png">
                @else
                    <img src="{{ asset("storage/images/avatars/".$invitationAuthorAvatar) }}" alt="{{ $invitationAuthor }}">
                @endif
            </div>
            <div class="team-info">
                <div class="invitation-title mobile body-text-small">Кто отправил </div>
                <div class="team-item-name body-text-large">{{ $invitationAuthor }}</div>
            </div>
        </a>
    </div>

    @if(!is_null($invitedUser))
        <div class="column">
            <div class="invitation-title desktop body-text-small">Кому отправлено</div>
            <a class="team-item user-profile-link">
                <div class="team-item-icon">
                    @if (empty($invitedUser->avatar))
                        <img src="/images/user-default.png">
                    @else
                        <img src="{{ asset("storage/images/avatars/".$invitedUser->avatar) }}" alt="{{ $invitationAuthor }}">
                    @endif
                </div>
                <div class="team-info">
                    <div class="invitation-title mobile body-text-small">Кому отправлено</div>
                    <div class="team-item-name body-text-large">{{ $invitedUser->name }} {{ $invitedUser->surname }}</div>
                </div>
            </a>
        </div>
    @else
        <div class="column">
            <div class="invitation-title desktop body-text-small">Кому отправлено</div>
            <div class="team-content-info">
                <div class="invitation-title mobile body-text-small">Кому отправлено</div>
                <div class="team-content-info-text body-text-large">{{ $invitationEmail }}</div>
            </div>
        </div>
    @endif

    <div class="column">
        <div class="invitation-title body-text-small">Дата отправки
            <span class="body-text-regular">{{ $invitationCreated }}</span>
        </div>

        @if ($invitationStatus == 1)
            <div class="team-content-label body-text-medium processing">
                Ожидается подтверждение
            </div>
        @elseif ($invitationStatus == 2)
            <div class="team-content-label body-text-medium success">
                Добавлен
            </div>
        @elseif ($invitationStatus == 3)
            <div class="team-content-label body-text-medium error">
                Приглашение отклонено
            </div>
        @endif

    </div>
</div>