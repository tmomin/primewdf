<?php

namespace App\Http\Livewire\Organization;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $state;

    public function mount()
    {
        $this->state = Auth::user();
    }

    public function render()
    {
        return view('livewire.organization.show');
    }
}
