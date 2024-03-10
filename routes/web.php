<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard.index');



// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

 ///DASHBAORD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  
Route::get('/tenants', 'TenantController@index')->name('tenants.index');
Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
Route::resource('tenants', TenantController::class);
Route::get('add', 'TenantController@add'); 
Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
Route::put('/tenants/{id}', [TenantController::class, 'update'])->name('tenants.update');
Route::delete('/tenants/{id}', [TenantController::class, 'destroy'])->name('tenants.destroy');

});   


require __DIR__.'/auth.php';