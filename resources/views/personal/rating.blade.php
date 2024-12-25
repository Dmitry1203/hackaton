<x-personal-layout>
    <x-slot name="title">Рейтинг команд</x-slot>
    <x-slot name="content">
        <div class="content teams">
            <div class="content-header">
                <h3>Рейтинг команд</h3>
			</div>
			<div class="teams-layout">
				<div class="teams-block">
					<p class="mb-4 body-text-large">1. Клиентский портал по исследованию защищенности внешнего периметра заказчика</p>
					<table class="body-text-large table">
						<thead>
						<tr style="background-color:#f4f8fd">
							<th style="width:50%" class="p-4 border-bottom">Команда</td>
							<th style="width:50%" class="p-4 border-bottom">Рейтинг</td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td class="p-4">SUAI.dev</td>
							<td class="p-4">1 место</td>
						</tr>
						<tr>
							<td class="p-4">IKIGAI</td>
							<td class="p-4">дополнительный приз</td>
						</tr>
						<tr>
							<td class="p-4">Team Liquid</td>
							<td class="p-4">дополнительный приз</td>
						</tr>
						<tr>
							<td class="p-4">Nestor's team</td>
							<td class="p-4">дополнительный приз</td>
						</tr>
						</tbody>
					</table>
				</div>

				<div class="teams-block">
					<p class="mb-4 body-text-large">2. Идеальная платформа для хакатонов и IT-соревнований</p>
					<table class="body-text-large table">
						<thead>
						<tr style="background-color:#f4f8fd">
							<th style="width:50%" class="p-4 border-bottom">Команда</td>
							<th style="width:50%" class="p-4 border-bottom">Рейтинг (количество баллов)</td>
						</tr>
						</thead>
						<tbody>
						@foreach ($teams as $team)
						<tr>
							<td class="p-4">{{ $team->TeamName }}</td>
							<td class="p-4">{{ $team->TeamResult }}</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </x-slot>
</x-personal-layout>