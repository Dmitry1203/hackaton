<x-personal-layout>
	<x-slot name="title">Решения</x-slot>
    <x-slot name="content">
        <div class="content solutions">
            <div class="content-header">
                <h3>Решения</h3>
                <a href="{{ Route('personal.solutions') }}" class="go-back-link button button__block button__light button__medium">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 14.5L4 9.5L9 4.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M20 20.5V13.5C20 12.4391 19.5786 11.4217 18.8284 10.6716C18.0783 9.92143 17.0609 9.5 16 9.5H4"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    Вернуться к списку</a>
            </div>
            <div class="solutions-layout">
                <div class="solutions-container">
                    <div class="solutions-header">
                        <div class="solutions-header-wrapper body-text-large">
                            <div class="solution-title">{{ $stage->stage }}</div>
                            <div class="solution-time">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9998 23C13.989 23 15.8966 22.2098 17.3032 20.8033C18.7097 19.3968 19.4999 17.4891 19.4999 15.5C19.4999 14.634 19.2699 13.803 18.9999 13.03C17.3329 14.677 16.0668 15.5 15.1999 15.5C19.1948 8.5 16.9998 5.5 10.9998 1.5C11.4998 6.5 8.20385 8.774 6.86185 10.037C5.76718 11.0667 5.00709 12.4015 4.68013 13.8683C4.35318 15.3352 4.47444 16.8664 5.0282 18.2635C5.58195 19.6606 6.54266 20.8592 7.78576 21.7037C9.02885 22.5483 10.497 22.9999 11.9998 23ZM12.7099 5.235C15.9509 7.985 15.9669 10.122 13.4629 14.509C12.7019 15.842 13.6649 17.5 15.1999 17.5C15.8878 17.5 16.5839 17.3 17.3189 16.905C17.101 17.728 16.6951 18.4892 16.133 19.1286C15.571 19.768 14.8682 20.2682 14.0799 20.5899C13.2917 20.9115 12.4395 21.0458 11.5906 20.9821C10.7417 20.9184 9.91909 20.6585 9.18765 20.2229C8.45622 19.7873 7.8359 19.1878 7.37553 18.4717C6.91517 17.7556 6.62732 16.9424 6.53467 16.0961C6.44201 15.2498 6.54708 14.3936 6.84158 13.5948C7.13609 12.7961 7.61201 12.0766 8.23185 11.493C8.35785 11.375 8.99685 10.808 9.02485 10.783C9.44885 10.403 9.79785 10.066 10.1428 9.697C11.3728 8.379 12.2568 6.917 12.7088 5.235H12.7099Z"
                                        fill="#F93232" />
                                </svg>
                                До {{ _date_MM_DD_YYYY($stage->stage_date_end) }}

                            </div>
                        </div>
                        <h5>{{ $stage->stage_short }}</h5>
                    </div>
                    <div class="solutions-content">
                        <div class="solutions-content-title body-text-large">
                            Описание
                        </div>
                        <div class="solutions-content-description body-text-medium">
                            {!! $stage->stage_description !!}
                        </div>
                    </div>

                    @if ($sendingIsAllowed)

                        <form
                            class="solutions-form"
                            id="save-solution-1"
                            action="{{ Route('personal.solution.store') }}"
                            method="POST"
                            autocomplete="off"
                        >

                        @csrf

                            <input type="hidden" id="event-token" name="event-token" value="__{{ $token }}__">
                            <div class="solutions-form-title body-text-large">
                                Решение команды
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <textarea type="text" name="solution" class="form-control" id="solution"
                                        placeholder="Ваше решение" data-required="1">{{ str_replace("<br />", "", $solutionText) }}</textarea>
                                </div>
                            </div>

                            <div class="actions">
                                <button type="submit"
                                    class="save-solution button button__block button__filled button__medium">Отправить</button>
                            </div>
                        </form>

                    @else

                        <div class="solutions-content">
                            <div class="solutions-content-title body-text-large">
                                Решение команды
                            </div>
                            <div class="solutions-content-description body-text-medium">
                                {!! $solutionText !!}
                            </div>
                        </div>

                    @endif

                </div>
            </div>
        </div>
        @if ($sendingIsAllowed)
                 @include('personal.modal.solution')
        @endif
    </x-slot>
</x-personal-layout>
