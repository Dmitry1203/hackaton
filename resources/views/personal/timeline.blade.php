<x-personal-layout>
	<x-slot name="title">Таймлайн</x-slot>
    <x-slot name="content">

        <div class="content timelines">
            <div class="content-header">
                <h3>Таймлайн</h3>
            </div>
            <div class="timeline-layout">
                <div class="timeline-wrapper">
                    <div class="timeline-pane">
                        <ul class="nav nav-pills body-text-medium">
                            @foreach($timeline as $key=>$stage)
                                <li class="nav-item">
                                    <x-timeline-nav
                                        timeline-number="{{ $key+1 }}"
                                        timeline-complete="{{ $stage['is_complete'] }}"
                                        timeline-next="{{ $stage['is_next'] }}"
                                        timeline-prev-complete="{{ $stage['prev_complete'] }}"
                                        timeline-stage="{{ $stage['stage'] }}"
                                        timeline-date-end="{{ _date_MM_DD_YYYY($stage['stage_date_end']) }}"
                                        timeline-description="{!! $stage['stage_description'] !!}"
                                    />
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="timeline-content">
                        <h5>Текущий статус</h5>
                        <div class="tab-content">
                            @foreach($timeline as $key=>$stage)
                                <x-timeline-detail
                                    timeline-number="{{ $key+1 }}"
                                    timeline-complete="{{ $stage['is_complete'] }}"
                                    timeline-next="{{ $stage['is_next'] }}"
                                    timeline-prev-complete="{{ $stage['prev_complete'] }}"
                                    timeline-stage="{{ $stage['stage'] }}"
                                    timeline-date-end="{{ _date_MM_DD_YYYY($stage['stage_date_end']) }}"
                                    timeline-description="{!! $stage['stage_description'] !!}"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-personal-layout>
