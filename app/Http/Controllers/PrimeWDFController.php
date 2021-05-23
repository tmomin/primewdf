<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimeWDFController extends Controller
{
    public function showDashboard(Request $request)
    {      
        return view('livewire.dashboard.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
