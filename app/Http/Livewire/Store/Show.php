<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class Show extends Component
{
    public $state;

    public function mount()
    {
        $this->state = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.store.show');
    }
}
