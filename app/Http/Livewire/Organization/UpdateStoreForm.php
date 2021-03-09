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

    public function mount()
    {
        $this->store = Auth::user()->organization;
        dd($this->store->stores);
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
    }
    
    public function render()
    {
        return view('livewire.organization.update-store-form');
    }
}
