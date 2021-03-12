<?php

namespace App\Http\Livewire\Organization;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class UpdateStoreForm extends Component
{
    public $addStoreForm = [
        'store_id' => null,
        'name' => '',
    ];

    public $stores;
    public $organization;
    public $storeIdBeingRemoved = null;

    /**
     * Indicates if the application is confirming if a team member should be removed.
     *
     * @var bool
     */
    public $confirmingStoreRemoval = false;

    public function mount()
    {
        $this->store = Auth::user()->organization;
        $this->organization = Auth::user()->organization;
        // dd($this->store->stores);
    }

    public function addStore(Request $request)
    {
        $this->resetErrorBag();

        $updater = $this->addStoreForm;

        // dd(Auth::user()->organization_id);

        Store::updateOrCreate(['id' => $updater['store_id']], [
            'name' => $this->addStoreForm['name'],
            'organization_id' => Auth::user()->organization_id,
        ]);

        $this->addStoreForm['name'] = '';

        $this->organization = $this->organization->fresh();

        // $this->emit('saved');

        // return redirect()->route('organization.show');
    }

    public function manageStore($storeId)
    {
        return redirect()->route('store.show', compact('storeId'));
    }

    public function confirmStoreRemoval($storeId)
    {
        $this->confirmingStoreRemoval = true;

        $this->storeIdBeingRemoved = $storeId;
    }

    /**
     * Remove a team member from the team.
     *
     * @param  \Laravel\Jetstream\Contracts\RemovesTeamMembers  $remover
     * @return void
     */
    public function removeStore($storeId)
    {
        $store = Store::find($storeId);
        $store->delete();
               
        // $remover->remove(
        //     $this->user,
        //     $this->team,
        //     $user = Jetstream::findUserByIdOrFail($this->teamMemberIdBeingRemoved)
        // );

        $this->confirmingStoreRemoval = false;

        $this->storeIdBeingRemoved = null;

        $this->organization = $this->organization->fresh();
    }
    
    public function render()
    {
        return view('livewire.organization.update-store-form');
    }
}
