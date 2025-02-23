<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/inventory', [InventoryController::class, 'viewList'])->middleware(['auth', 'verified'])->name('inventory');

Route::post('/add-car', [InventoryController::class, 'store'])->middleware(['auth', 'verified'])->name('add-car');

Route::get('/view-car/{id}', [InventoryController::class, 'viewCar'])->middleware(['auth', 'verified'])->name('view-car');

Route::get('/add-car', function () {
    return view('inventory.add-car');
})->middleware(['auth', 'verified'])->name('add-car');

Route::post('/edit-car/{id}', [InventoryController::class, 'update'])->middleware(['auth', 'verified'])->name('edit-car');

Route::get('/edit-car/{id}', [InventoryController::class, 'viewEdit'])->middleware(['auth', 'verified'])->name('edit-car');

Route::post('/submit-sale', [SalesController::class, 'sellCar'])->middleware(['auth', 'verified'])->name('submit-sale');

Route::get('/sell-car/{id}', [SalesController::class, 'sellForm'])->middleware(['auth', 'verified'])->name('sell-car');

Route::get('/transaction-details/{id}', [SalesController::class, 'transactionDetails'])->middleware(['auth', 'verified'])->name('transaction-details');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
