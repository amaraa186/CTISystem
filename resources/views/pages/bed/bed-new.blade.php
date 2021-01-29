<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('新しいベッド') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">レイアウト</a></div>
            <div class="breadcrumb-item"><a href="{{ route('bed') }}">新しいベッド</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-bed action="createBed" />
    </div>
</x-app-layout>
