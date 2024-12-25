<a
href="{{ Route('personal.video', ['videoId' => $videoId]) }}"
@class(['course-item', 'complete' => $videoWatched == 1])
>
    <div class="course-item-inner">
        <div class="course-item-wrapper">
            <div class="course-item-content">
                <div class="course-item-info">
                    @if($videoWatched == 1)
                        <div class="course-item-title body-text-medium">
                            <div class="status body-text-small">Видео просмотрено</div>
                        </div>
                    @endif
                    <div class="couse-item-text body-text-large pt-2">
                        {{ $videoName }}
                    </div>
                </div>
            </div>
            <svg width="58" height="58" viewBox="0 0 58 58" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M12.083 29H45.9163" stroke="#7C8DB0" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
                <path d="M29 12.0833L45.9167 29L29 45.9167" stroke="#7C8DB0" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
</a>