<?php
use App\Models\Model\bed;
use App\Models\Model\patient;
use App\Models\User;
?>
<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="description">
            
        </x-slot>

        <x-slot name="form">

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('説明') }}" />
                <x-jet-input id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient_master.description" />
                <x-jet-input-error for="patient_master.description" class="mt-2" />
            </div>

            @if($action == "createPatientmaster")

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="patient_id" value="{{ __('患者') }}" />
                <select id="patient_id" wire:model.defer="patient_master.patient_id" class="mt-1 block w-full form-control shadow-none">
                        <option></option>
                    @foreach (patient::where('deleted', 0)->get() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="patient_master.patient_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="bed_id" value="{{ __('ベッド') }}" />
                <select id="bed_id" wire:model.defer="patient_master.bed_id" class="mt-1 block w-full form-control shadow-none">
                        <option></option>
                    @foreach (bed::where('deleted', '=', 0)->get() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="patient_master.bed_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="user_id" value="{{ __('看護師') }}" />
                <select id="user_id" wire:model.defer="patient_master.user_id" class="mt-1 block w-full form-control shadow-none">
                        <option></option>
                    @foreach (User::where('deleted', 0') as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="patient_master.user_id" class="mt-2" />
            </div>

            @else

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="patient_id" value="{{ __('患者') }}" />
                <select id="patient_id" wire:model.defer="patient_master.patient_id" class="mt-1 block w-full form-control shadow-none">
                    @foreach (patient::where('deleted', '=', '0') as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="patient_master.patient_id" class="mt-2" />
            </div>
            
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="bed_id" value="{{ __('ベッド') }}" />
                <select id="bed_id" wire:model.defer="patient_master.bed_id" class="mt-1 block w-full form-control shadow-none">
                    @foreach (bed::where('deleted', '0') as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="patient_master.bed_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="user_id" value="{{ __('看護師') }}" />
                <select id="user_id" wire:model.defer="patient_master.user_id" class="mt-1 block w-full form-control shadow-none">
                    @foreach (User::where('deleted', '0')->andwhere('role_id', '2') as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="patient_master.user_id" class="mt-2" />
            </div>

            @endif

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="entry_date" value="{{ __('入院日') }}" />
                <x-jet-input id="entry_date" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient_master.entry_date" />
                <x-jet-input-error for="patient_master.entry_date" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="leave_date" value="{{ __('退院日') }}" />
                <x-jet-input id="leave_date" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient_master.leave_date" />
                <x-jet-input-error for="patient_master.leave_date" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
