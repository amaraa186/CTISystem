<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('ベッドを編集する') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">レイアウト</a></div>
            <div class="breadcrumb-item"><a href="{{ route('floor') }}">ベッドを編集する</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-bed action="updateBed" :bedId="request()->bedId" />
    </div>
</x-app-layout>
