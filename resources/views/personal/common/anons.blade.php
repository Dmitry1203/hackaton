<div class="card widget-card announce">
  <div class="card-header">
    <h6>{{ $event->event_name }}</h6>
  </div>
  <div class="card-body">
    <div class="announce-text body-text-medium">{!! $event->event_text !!}</div>
    <div class="actions">
      <a href="{{ Route('personal.about') }}" class="button button__link button__small widget-link">Подробнее</a>
    </div>
  </div>
</div>