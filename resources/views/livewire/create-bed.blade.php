<?php
use App\Models\Model\room;
use App\Models\Model\bedStatus;
?>
<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="description">
            
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('ベッド') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="bed.name" />
                <x-jet-input-error for="bed.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('説明') }}" />
                <x-jet-input id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="bed.description" />
                <x-jet-input-error for="bed.description" class="mt-2" />
            </div>

            @if($action == "createBed")
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="room_id" value="{{ __('部屋') }}" />
                <select id="room_id" wire:model.defer="bed.room_id" class="mt-1 block w-full form-control shadow-none">
                        <option></option>
                    @foreach (room::all() as $item)
                        @if($item->deleted == 0)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                <x-jet-input-error for="bed.room_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="status" value="{{ __('ステータス') }}" />
                <select id="status" wire:model.defer="bed.status" class="mt-1 block w-full form-control shadow-none">
                        <option></option>
                    @foreach (bedStatus::all() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="bed.status" class="mt-2" />
            </div>
            @else
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="room_id" value="{{ __('部屋') }}" />
                <select id="room_id" wire:model.defer="bed.room_id" class="mt-1 block w-full form-control shadow-none">
                    @foreach (room::all() as $item)
                        @if($item->deleted == 0)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                <x-jet-input-error for="bed.room_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="status" value="{{ __('ステータス') }}" />
                <select id="status" wire:model.defer="bed.status" class="mt-1 block w-full form-control shadow-none">
                    @foreach (bedStatus::all() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="bed.status" class="mt-2" />
            </div>
            @endif

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
