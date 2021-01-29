<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('フロアを編集する') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">レイアウト</a></div>
            <div class="breadcrumb-item"><a href="{{ route('floor') }}">フロアを編集する</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-floor action="updateFloor" :floorId="request()->floorId" />
    </div>
</x-app-layout>
