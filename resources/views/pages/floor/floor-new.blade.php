<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('新しいフロア') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">レイアウト</a></div>
            <div class="breadcrumb-item"><a href="{{ route('floor') }}">フロアデータ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-floor action="createFloor" />
    </div>
</x-app-layout>
