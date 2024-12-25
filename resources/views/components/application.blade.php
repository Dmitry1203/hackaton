<div class="team-content-item">
    <a
        class="team-item user-profile-link"
        data-name="{{ $applicationUserName }}"
        data-surname="{{ $applicationUserSurname }}"
        data-jobsearch="{{ $applicationUserJobSearch }}"
        data-education="{{ $applicationUserEducation }}"
        data-experience="{{ $applicationUserExperience }}"
        data-info="{{ $applicationUserAbout }}"
        data-avatar="{{ $applicationUserAvatar }}"
    >
        <div class="team-item-icon">
            @if (empty($applicationUserAvatar))
                <img src="/images/user-default.png">
            @else
                <img src="{{ asset("storage/images/avatars/".$applicationUserAvatar) }}" alt="{{ $applicationUserName }}">
            @endif
        </div>
        <div class="team-item-info">
            <div class="team-item-name body-text-large">{{ $applicationUserName }} {{ $applicationUserSurname }}</div>
            <div class="team-content-info mobile">
                <div class="team-content-info-title body-text-small">
                    Комментарий
                </div>
                <div class="team-content-info-text body-text-medium">{{ $applicationMessage }}</div>
            </div>
        </div>
    </a>

    <div class="team-content-info desktop">
        <div class="team-content-info-title body-text-small">
            Комментарий
        </div>
        <div class="team-content-info-text body-text-medium">{{ $applicationMessage }}</div>
    </div>

    <div class="actions">
        <a class="application-action accept-application"
            data-id="{{ $applicationId }}"
            data-name="{{ $applicationUserName }} {{ $applicationUserSurname }}"
        ></a>
        <a class="application-action decline-application"
            data-id="{{ $applicationId }}"
            data-name="{{ $applicationUserName }} {{ $applicationUserSurname }}"
        ></a>
    </div>
</div>