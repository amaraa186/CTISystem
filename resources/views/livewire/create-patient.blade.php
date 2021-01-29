<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            
        </x-slot>

        <x-slot name="description">
            
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('名前') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient.name" />
                <x-jet-input-error for="patient.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="kana" value="{{ __('名前(カタカナ)') }}" />
                <x-jet-input id="kana" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient.kana" />
                <x-jet-input-error for="patient.kana" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('説明') }}" />
                <x-jet-input id="description" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient.description" />
                <x-jet-input-error for="patient.description" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="age" value="{{ __('年齢') }}" />
                <x-jet-input id="age" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient.age" />
                <x-jet-input-error for="patient.age" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="address" value="{{ __('住所') }}" />
                <x-jet-input id="address" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient.address" />
                <x-jet-input-error for="patient.address" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="phone_number" value="{{ __('電話番号') }}" />
                <x-jet-input id="phone_number" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="patient.phone_number" />
                <x-jet-input-error for="patient.phone_number" class="mt-2" />
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
