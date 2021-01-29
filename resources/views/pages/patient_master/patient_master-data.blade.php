<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('患者マスターデータ') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">患者マスター</a></div>
            <div class="breadcrumb-item"><a href="{{ route('patient_master') }}">患者マスターデータ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="patient_master" :model="$patient_master" />
    </div>
</x-app-layout>
