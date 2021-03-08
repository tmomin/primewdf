<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrganizationController extends Controller
{
    /**
     * Show the user organziation screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('livewire.organization.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
