<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use App\Models\Store;
use Illuminate\Http\Request;

class UpdateStoreForm extends Component
{
    public $request;

    public $store = [];

    public function mount(Request $request)
    {        
        $this->store = Store::find($request->storeId)->toArray();
    }

    public function updateStoreInformation()
    {                        
        Store::updateOrCreate(['id' => $this->store['id']], [
            'name' => $this->store['name'],
            'address' => $this->store['address'],
            'city' => $this->store['city'],
            'state' => $this->store['state'],
            'zipcode' => $this->store['zipcode'],
            'phone' => $this->store['phone'],
        ]);
        
        $this->store = $this->store;
    }
    
    public function render()
    {        
        return view('livewire.store.update-store-form');
    }
}
