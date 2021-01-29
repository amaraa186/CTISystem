<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('新しい看護師') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">看護師</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">新しい看護師</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="createUser" />
    </div>
</x-app-layout>
