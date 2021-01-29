<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('新しい部屋') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">部屋</a></div>
            <div class="breadcrumb-item"><a href="{{ route('room') }}">新しい部屋</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-room action="createRoom" />
    </div>
</x-app-layout>
