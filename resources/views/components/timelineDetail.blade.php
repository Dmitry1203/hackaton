@if (($timelineNext && !$timelineComplete && $timelinePrevComplete) || ($timelineNext && !$timelineComplete && !$timelinePrevComplete))
    <div class="tab-pane active" id="tab_{{ $timelineNumber }}">
@else
    <div class="tab-pane" id="tab_{{ $timelineNumber }}">
@endif

    <div class="timelines-card">

        @if (!$timelineNext && !$timelineComplete && !$timelinePrevComplete)
            <x-info-box text="Выполните предыдущий шаг" />
        @endif

        <div class="timelines-header">
            <div class="timeline-item @if ($timelineComplete) complete @endif">
                <div class="timeline-icon">
                    <div class="timeline-number">{{ $timelineNumber }}</div>
                </div>
                <div class="timeline-text">
                    <div class="timeline-title body-text-medium">Шаг {{ $timelineNumber }}</div>
                    <div class="timeline-description body-text-large">{{ $timelineStage }}
                    </div>
                </div>
            </div>
            <div class="label body-text-medium">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.15" width="36" height="36" rx="7" fill="#13D7FF" />
                    <path
                        d="M18 28C23.5228 28 28 23.5228 28 18C28 12.4772 23.5228 8 18 8C12.4772 8 8 12.4772 8 18C8 23.5228 12.4772 28 18 28Z"
                        stroke="#00A3FF" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M18 12V18L22 20" stroke="#00A3FF" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Дедлайн {{ $timelineDateEnd }}
            </div>
        </div>
        <div class="timelines-info body-text-medium">
            <p>{!! $timelineDescription !!}</p>
            @if($timelineNumber <= 8)
                @if ($timelineComplete || $timelineNext)
                    <p><a href="{{ Route('personal.intensive') }}">Смотреть видео</a></p>
                @endif
            @endif
        </div>
    </div>
</div>