<x-jet-form-section submit="updateStoreInformation">
    <x-slot name="title">
        {{ __('Store Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s store information.') }}
    </x-slot>

    <x-slot name="form">
        {{-- <!-- Organization Info -->
        @if ($state->organization_id = NULL)
            <!-- Organization Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="organization_name" value="{{ __('Organazation Name') }}" />
                <x-jet-input id="organization_name" type="text" class="mt-1 block w-full" wire:model.defer="state.organization.name" autocomplete="name" />
                <x-jet-input-error for="organization_name" class="mt-2" />
            </div>
        @endif --}}
        <!-- Organization Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-input id="store_id" type="hidden" wire:model.defer="store.store_id"/>
            <x-jet-label for="store_name" value="{{ __('Store Name') }}" />
            <x-jet-input id="store_name" type="text" class="mt-1 block w-full" wire:model.defer="store.name" autocomplete="name" />
            <x-jet-input-error for="store_name" class="mt-2" />
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
