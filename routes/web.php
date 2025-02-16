<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inventory', [InventoryController::class, 'viewAll'])->middleware(['auth', 'verified'])->name('inventory');

Route::post('/add-car', [InventoryController::class, 'store'])->middleware(['auth', 'verified'])->name('add-car');

Route::get('/view-car/{id}', [InventoryController::class, 'viewCar'])->middleware(['auth', 'verified'])->name('view-car');

Route::get('/add-car', function () {
    return view('inventory.add-car');
})->middleware(['auth', 'verified'])->name('add-car');

Route::post('/edit-car/{id}', [InventoryController::class, 'update'])->middleware(['auth', 'verified'])->name('edit-car');

Route::get('/edit-car/{id}', [InventoryController::class, 'viewEdit'])->middleware(['auth', 'verified'])->name('edit-car');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
