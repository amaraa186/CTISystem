<?php
use App\Models\Model\floor;
?>
<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="description">
            
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('部屋') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="room.name" />
                <x-jet-input-error for="room.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('説明') }}" />
                <x-jet-input id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="room.description" />
                <x-jet-input-error for="room.description" class="mt-2" />
            </div>
            @if($action == "createRoom")
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="floor_id" value="{{ __('フロア') }}" />
                <select id="floor_id" wire:model.defer="room.floor_id" class="mt-1 block w-full form-control shadow-none">
                        <option></option>
                    @foreach (floor::all() as $item)
                        @if($item->deleted == 0)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                <x-jet-input-error for="room.floor_id" class="mt-2" />
            </div>
            @else
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="floor_id" value="{{ __('フロア') }}" />
                <select id="floor_id" wire:model.defer="room.floor_id" class="mt-1 block w-full form-control shadow-none">
                    @foreach (floor::all() as $item)
                        @if($item->deleted == 0)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                <x-jet-input-error for="room.floor_id" class="mt-2" />
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