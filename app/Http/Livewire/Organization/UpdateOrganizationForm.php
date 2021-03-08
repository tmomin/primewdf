<?php

namespace App\Http\Livewire\Organization;

use App\Models\Organization;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateOrganizationForm extends Component
{
    public $state;
    public $organization;

    protected $rules = [
        'state.organization.name' => ['required'],
    ];

    public function mount()
    {
        // dd(Auth::user()->organization->toArray());
        
        $this->state = Auth::user();
        // dd($this->state);
        $this->organization = Auth::user()->organization;

        // dd($this->organization);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserOrganizationInformation  $updater
     * @return void
     */
    public function updateOrganizationInformation(Request $request)
    {
        $this->resetErrorBag();

        $updater = $this->state;

        // dd($request);

        // dd($updater->organization['name']);

        $organization = Organization::updateOrCreate(['id' => $updater['organization_id']], [
            'name' => $updater->organization['name']
        ]);

        $user = Auth::user();

        $user->organization()->associate($organization);

        $user->save();

        $this->emit('saved');

        return redirect()->route('organization.show');

        // $updater->update(
        //     Auth::user(),
        //     $this->photo
        //         ? array_merge($this->state, ['photo' => $this->photo])
        //         : $this->state
        // );

        // if (isset($this->photo)) {
        //     return redirect()->route('profile.show');
        // }

        // $this->emit('saved');

        // $this->emit('refresh-navigation-menu');
    }
    
    public function render()
    {
        // dd($this->organizaiton['name']);
        // dd($this->state->organization->name);
        // $this->state;
        // $this->organization_name = $this->state->organization->name;
        // dd($this->organizaiton_name);
        return view('livewire.organization.update-organization-form');
    }
}
