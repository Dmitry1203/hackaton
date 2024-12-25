<x-personal-layout>
<x-slot name="title">Главная страница</x-slot>
  <x-slot name="content">
    <div class="content profile__user">
      <div class="content-header">
      <h3>Главная</h3>
      </div>
      <div class="profile-layout">
        {{-- @include('personal.common.timeline') --}}
        <div class="widget-wrapper">
          @include('personal.common.notifications')
          <div class="column">
            @include('personal.common.anons')
            {{-- @include('personal.common.tasks') --}}
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-personal-layout>