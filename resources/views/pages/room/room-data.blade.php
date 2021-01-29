<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('部屋データ') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">レイアウト</a></div>
            <div class="breadcrumb-item"><a href="{{ route('room') }}">看護師データ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="room" :model="$room" />
    </div>
</x-app-layout>
