<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('新しい患者') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">患者</a></div>
            <div class="breadcrumb-item"><a href="{{ route('patient') }}">新しい患者</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-patient action="createPatient" />
    </div>
</x-app-layout>
