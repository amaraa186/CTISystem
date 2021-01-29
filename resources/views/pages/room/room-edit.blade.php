<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('部屋を編集する') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">部屋</a></div>
            <div class="breadcrumb-item"><a href="{{ route('room') }}">部屋を編集する</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-room action="updateRoom" :roomId="request()->roomId" />
    </div>
</x-app-layout>
