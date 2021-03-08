<x-jet-form-section submit="updateOrganizationInformation">
    <x-slot name="title">
        {{ __('Organization Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s organization information.') }}
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
            <x-jet-input id="organization_id" type="hidden" wire:model.defer="state.organization_id"/>
            <x-jet-label for="organization_name" value="{{ __('Organazation Name') }}" />
            <x-jet-input id="organization_name" type="text" class="mt-1 block w-full" wire:model.defer="state.organization.name" autocomplete="name" />
            <x-jet-input-error for="organization_name" class="mt-2" />
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
