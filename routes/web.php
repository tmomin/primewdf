<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\StoreController;
use App\Http\Livewire\Organization\Show;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/organization', [OrganizationController::class, 'show'])->name('organization.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/store', [StoreController::class, 'show'])->name('store.show');

// Route::middleware(['auth:sanctum', 'verified'])->get('/user/organization', Show::class)->name('organization.show');