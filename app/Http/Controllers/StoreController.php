<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class StoreController extends Controller
{
    /**
     * Show the user store screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        // dd($request->storeId);
        
        return view('livewire.store.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
