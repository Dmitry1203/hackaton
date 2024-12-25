<x-organizer-layout>
<x-slot name="title">Список участников</x-slot>
  <x-slot name="content">
        <div class="content notifications">
            <div class="content-header">
                <h3>Список участников</h3>
            </div>

            <div class="teams-layout">
                <div class="teams-block">
                    <div class="table-responsive">
                    <table class="body-text-medium table">
                        <thead>
                        <tr style="background-color:#d7e4f3">
                            <th style="width:40px" class="p-3 border-bottom">№</th>
                            <th style="width:110px" class="p-3 border-bottom">Фото</th>
                            <th style="width:260px" class="p-3 border-bottom">Участник</th>
                            <th class="p-3 border-bottom"></th>
                            <th style="width:150px" class="p-3 border-bottom">Регистрация</th>
                            <th style="width:120px" class="p-3 border-bottom">Вход</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key=>$user)
                        <tr>

                            <td class="p-3">{{ $key+1 }}</td>

                            <td class="p-3">
                                <div class="organizer-avatar"
                                @if (empty($user->avatar) )
                                    style = "background-image: url(/images/avatar-default.png)"
                                @else
                                    style = "background-image: url({{ asset("storage/images/avatars/".$user->avatar) }}"
                                @endif
                                ></div>
                            </td>

                            <td class="p-3">
                                {{ $user->name }} {{ $user->surname }}
                                <div class="body-text-small" style="color:#868686">
                                    <div class="mt-2">{{ $user->phone }}</div>
                                    <div class="mt-2">{{ $user->email }}</div>
                                </div>
                            </td>

                            <td class="p-3">

                                @if(!empty($user->TeamName))
                                    <span class="p-2 mt-3" style="background-color:#d7e4f3">команда {{ $user->TeamName }}</span><br><br>
                                @endif

                                @if (!empty($user->city))
                                    <div>город {{ $user->city }}</div>
                                @endif
                                @if (!empty($user->date_b))
                                    <div>д/р {{ substr(_date_MM_DD_YYYY($user->date_b), 0, 10) }}</div>
                                @endif

                                @if (!empty($user->about_me))
                                    <div class="p-3" style="color:#868686">
                                    {{ $user->about_me }}
                                    </div>
                                @endif

                                @if (!empty($user->education))
                                    Образование
                                    <div class="p-3" style="color:#868686">
                                    {{ $user->education }}
                                    </div>
                                @endif

                                @if (!empty($user->experience))
                                    Опыт работы
                                    <div class="p-3" style="color:#868686">
                                    {{ $user->experience }}
                                    </div>
                                @endif

                                @if (!empty($user->experience_hack))
                                    Опыт участия в хакатонах
                                    <div class="p-3" style="color:#868686">
                                    {{ $user->experience_hack }}
                                    </div>
                                @endif

                            </td>
                            <td class="p-3">{{ _date_MM_DD_YYYY($user->created_at) }}</td>
                            <td class="p-3">
                                @if(!is_null($user->login_at))
                                    {{ _date_MM_DD_YYYY($user->login_at) }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-slot>
</x-sponsor-layout>