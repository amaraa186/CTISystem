<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('患者データ') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">ホームページ</a></div>
            <div class="breadcrumb-item"><a href="#">患者</a></div>
            <div class="breadcrumb-item"><a href="{{ route('patient') }}">患者データ</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="patient" :model="$patient" />
    </div>
</x-app-layout>
