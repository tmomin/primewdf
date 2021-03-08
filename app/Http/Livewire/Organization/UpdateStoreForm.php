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

    public function addStore(Request $request)
    {
        $this->resetErrorBag();

        $updater = $this->addStoreForm;

        // dd(Auth::user()->organization_id);

        Store::updateOrCreate(['id' => $updater['store_id']], [
            'name' => $this->addStoreForm['name'],
            'organization_id' => Auth::user()->organization_id,
        ]);
    }
    
    public function render()
    {
        return view('livewire.organization.update-store-form');
    }
}
