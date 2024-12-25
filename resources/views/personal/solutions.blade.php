<x-personal-layout>
	<x-slot name="title">Решения</x-slot>
    <x-slot name="content">

         <div class="content solutions">
            <div class="content-header">
                <h3>Решения</h3>
            </div>
            <div class="solutions-layout">

                @if(session("solutionInfo"))
                    <x-info-box text="{{ session('solutionInfo') }}" /><br>
                @endif

                <div class="solutions-block">
                    <div class="solutions-nav">
                        <ul class="tab-nav nav nav-pills body-text-medium">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tab_1" data-toggle="tab">Промежуточные решения</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tab_2" data-toggle="tab">Финальное решение</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content solutions-content">
                        <div class="tab-pane active" id="tab_1">
                            <h6>Промежуточные решения</h6>
                            <div class="solutions-list">
                                @foreach ($stages as $key=>$stage)
                                    @if ($key < $countPreliminaryStages)
                                        <x-stage
                                            event-id="{{ $stage->event_id }}"
                                            stage-id="{{ $stage->stage_id }}"
                                            stage-name="{{ $stage->stage }}"
                                            stage-description-short="{{ $stage->stage_description_short }}"
                                            stage-date_end="{{ _date_MM_DD_YYYY($stage->stage_date_end) }}"
                                            is-loaded-solution="{{ $stage->count }}"
                                        />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_2">
                            <h6>Финальное решение</h6>
                            <div class="solutions-list">
                                <x-stage
                                    event-id="{{ $stages[$countPreliminaryStages]->event_id }}"
                                    stage-id="{{ $stages[$countPreliminaryStages]->stage_id }}"
                                    stage-name="{{ $stages[$countPreliminaryStages]->stage }}"
                                    stage-description-short="{!! $stages[$countPreliminaryStages]->stage_description_short !!}"
                                    stage-date_end="{{ _date_MM_DD_YYYY($stages[$countPreliminaryStages]->stage_date_end) }}"
                                    is-loaded-solution="{{ $stages[$countPreliminaryStages]->count }}"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-personal-layout>
