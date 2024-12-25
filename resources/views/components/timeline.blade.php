<div class="card guide">
  <div class="card-header">
    <h6>Текущий шаг</h6>
  </div>
  <div class="card-body">
    <div class="guide-header">
      <div class="guide-title body-text-large">{{ $nextStage }}</div>
    </div>
    <div class="guide-text body-text-regular">
      {{ $nextStageDescriptionShort }}
    </div>
  </div>
</div>

<div class="card timeline-card">
  <div class="card-body">
    <div class="timeline-slider">
		@php $counter = 0; @endphp
		@foreach ($stages as $stage)
			@php $counter++; @endphp

			@if( $stage['is_complete'] )
				<div class="timeline-item complete">
			@elseif ( $stage['is_next'] )
				<div class="timeline-item current">
			@else
				<div class="timeline-item">
			@endif
				<div class="timeline-icon">
					<div class="timeline-number">{{ $counter }}</div>
				</div>
				<div class="timeline-title body-text-medium">Шаг {{ $counter }}</div>
				<div class="timeline-text body-text-small">{!! $stage['stage'] !!}</div>
			</div>
		@endforeach
    </div>
  </div>
</div>


















