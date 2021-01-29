<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('患者マスターを編集する') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">患者マスター</a></div>
            <div class="breadcrumb-item"><a href="{{ route('patient_master') }}">患者マスターを編集する</a></div>
        </div>
    </x-slot>

    <div>
    <livewire:create-patient_master action="updatePatientmaster" :patient_masterId="request()->patient_masterId" />
    </div>
</x-app-layout>
