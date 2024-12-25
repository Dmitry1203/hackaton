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
                        @foreach ($users as $key=>$user)
                        <tr>

                            <td class="p-3">{{ $key+1 }}</td>

                            <td class="p-3">
                                {{ $user->name }}
                            </td>

                            <td class="p-3">
                                {{ $user->surname }}
                            </td>

                            <td class="p-3">
                                {{ $user->phone }}
                            </td>

                            <td class="p-3">
                                {{ $user->email }}
                            </td>

                            <td class="p-3">
                                {{ $user->city }}
                            </td>

                            <td class="p-3">
                                {{ substr(_date_MM_DD_YYYY($user->date_b), 0, 10) }}
                            </td>

                            <td class="p-3">
                                {{ $user->TeamName }}
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