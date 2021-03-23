<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use Symfony\Component\HttpFoundation\Request;

class UpdateStoreForm extends Component
{
    public $request;

    public $store = [];

    public function mount(Request $request)
    {
        $this->store = Store::find($request->storeId)->toArray();
    }
    
    public function render()
    {        
        return view('livewire.store.update-store-form');
    }
}
