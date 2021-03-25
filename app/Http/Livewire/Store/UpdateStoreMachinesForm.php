<?php

namespace App\Http\Livewire\Store;

use App\Models\Machine;
use Livewire\Component;

class UpdateStoreMachinesForm extends Component
{
    public $addMachineForm = [
        'machine_id' => null,
        'name' => '',
        'type' => '',
        'store_id' => '1',
    ];

    public function addMachine()
    {
        $this->resetErrorBag();

        $updater = $this->addMachineForm;
                
        Machine::updateOrCreate(['id' => $updater['machine_id']], [
            'name' => $this->addMachineForm['name'],
            'type' => $this->addMachineForm['type'],
            'store_id' => $this->addMachineForm['store_id'],
        ]);
    }
    
    public function render()
    {
        return view('livewire.store.update-store-machines-form');
    }
}
