<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('新しい患者マスター') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">患者</a></div>
            <div class="breadcrumb-item"><a href="{{ route('patient_master') }}">新しい患者マスター</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-patient_master action="createPatientmaster" />
    </div>
</x-app-layout>
