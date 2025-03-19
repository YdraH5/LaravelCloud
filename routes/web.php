<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\TenantImportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    Route::get('/import', function () {
        return view('import'); // Ensure you have import.blade.php in resources/views
    });
    Route::get('/import-tenants', function () {
        return view('import-tenants');
    });
    
    Route::post('/import-tenants', [TenantImportController::class, 'import'])->name('import.tenants');
    
    Route::post('/import', [ImportController::class, 'import'])->name('import');
    
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
