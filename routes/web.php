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

Route::get('/inventory', function () {
    return view('inventory.inventory');
})->middleware(['auth', 'verified'])->name('inventory');

Route::post('/add-car', [InventoryController::class, 'store'])->middleware(['auth', 'verified'])->name('add-car');

Route::get('/add-car', function () {
    return view('inventory.add-car');
})->middleware(['auth', 'verified'])->name('add-car');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
