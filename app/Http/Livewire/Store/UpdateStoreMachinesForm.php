<?php

namespace App\Http\Livewire\Store;

use App\Models\Machine;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Store;

class UpdateStoreMachinesForm extends Component
{
    public $addMachineForm = [
        'machine_id' => null,
    ];

    public $store;
    public $machines;
    public $machineIdBeingRemoved = null;
    public $confirmingMachineRemoval = false;
    public $sortField;
    public $sortDirection = 'asc';

    public function mount(Request $request)
    {
        dd(Machine::search('W01')->get());
        
        // $this->machines = Machine::search('store_id', $request->storeId)->orderBy($this->sortField, $this->sortDirection)->paginate(10);

        dd($this->machines);
        
        $this->store = Store::find($request->storeId);
        // $this->machines = $this->store->machines;
        
        // dd($this->machines->orderBy($this->sortField, $this->sortDirection));

        // $store = Store::find($request->storeId);
    }

    public function sortBy($field)
    {
        $this->sortField = $field;
    }

    public function addMachine()
    {
        $this->resetErrorBag();

        $updater = $this->addMachineForm;
                
        Machine::updateOrCreate(['id' => $updater['machine_id']], [
            'name' => $updater['name'],
            'type' => $updater['type'],
            'store_id' => $this->store['id'],
        ]);

        $this->addMachineForm = [
            'name' => '',
            'type' => '',
            'machine_id' => null,
        ];

        $this->store = $this->store->fresh();
    }

    public function manageMachine($machineId)
    {
        $machine = Machine::find($machineId);
        
        $this->addMachineForm = [
            'name' => $machine['name'],
            'type' => $machine['type'],
            'machine_id' => $machineId,
        ];
    }

    public function confirmingMachineRemoval($machineId)
    {        
        $this->confirmingMachineRemoval = true;

        $this->machineIdBeingRemoved = $machineId;
    }

    public function removeMachine($machineId)
    {        
        $machine = Machine::find($machineId);
        $machine->delete();
               
        // $remover->remove(
        //     $this->user,
        //     $this->team,
        //     $user = Jetstream::findUserByIdOrFail($this->teamMemberIdBeingRemoved)
        // );

        $this->confirmingMachineRemoval = false;

        $this->machineIdBeingRemoved = null;

        $machineId = null;

        $this->store = $this->store->fresh();
    }
    
    public function render(Request $request)
    {
        // dd($this->store);

        // $machines = Machine::where('store_id', $request->storeId)->get();

        if ($this->sortField == null)
        {
            $this->sortField = "id";
        }
        
        return view('livewire.store.update-store-machines-form');
    }
}
