<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('看護師データ') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">看護師</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">看護師データ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user" :model="$user" />
    </div>
</x-app-layout>
