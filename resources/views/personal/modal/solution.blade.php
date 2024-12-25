<form
    class="custom-modal actions-modal save-solution-form"
    style="display: none;"
    id="save-solution"
    action="{{ Route('personal.solution.store') }}"
    method="POST"
>

    @csrf

    <input type="hidden" id="event-id" name="event-id" value="{{ $eventId }}">
    <input type="hidden" id="stage-id" name="stage-id" value="{{ $stageId }}">
    <input type="hidden" id="solution-store" name="solution-store" value="">

    <div class="custom-modal-header">
        <h6>Отправка решения</h6>
    </div>
    <div class="custom-modal-body">
        <div class="form-message body-text-medium">
            Вы действительно хотите отправить решение?
        </div>
    </div>
    <div class="custom-modal-footer">
        <div class="actions">
            <a class="button button__link button__small" data-fancybox-close>Отменить</a>
            <button type="submit" class="button button__block button__filled button__medium">Отправить</button>
        </div>
    </div>
</form>