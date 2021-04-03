<x-jet-form-section submit="updateStoreInformation">
    <x-slot name="title">
        {{ __('Store Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s store information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Store Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-input id="store_id" name="store_id" type="hidden" wire:model.defer="store.store_id"/>
            <x-jet-label for="name" value="{{ __('Store Name') }}" />
            <x-jet-input id="name" name="store_name" type="text" class="mt-1 block w-full" wire:model.defer="store.name" autocomplete="off" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="phone" value="{{ __('Phone #') }}" />
            <x-jet-input id="phone" name="phone" type="text" class="mt-1 block w-full" wire:model.defer="store.phone" autocomplete="on" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" name="address1" type="text" class="mt-1 block w-full" wire:model.defer="store.address" autocomplete="on" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" name="city" type="text" class="mt-1 block w-full" wire:model.defer="store.city" autocomplete="on" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
            <x-jet-label for="state" value="{{ __('State') }}" />
            <x-jet-input id="state" name="state" type="text" class="mt-1 block w-full" wire:model.defer="store.state" autocomplete="on" />
            <x-jet-input-error for="state" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
            <x-jet-label for="zipcode" value="{{ __('Zipcode') }}" />
            <x-jet-input id="zipcode" name="zip" type="text" class="mt-1 block w-full" wire:model.defer="store.zipcode" autocomplete="on" />
            <x-jet-input-error for="zipcode" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
