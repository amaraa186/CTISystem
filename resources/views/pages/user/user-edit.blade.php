<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('看護師を編集する') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">看護師</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">看護師を編集する</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="updateUser" :userId="request()->userId" />
    </div>
</x-app-layout>
