<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // ✅ Corrected Food Management Routes
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index'); // LIST VIEW
    Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create'); // CREATE FORM
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store'); // STORE FOOD
    Route::get('/foods/{food}', [FoodController::class, 'show'])->name('foods.show'); // VIEW SINGLE FOOD
    Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit'); // EDIT FORM
    Route::put('/foods/{food}', [FoodController::class, 'update'])->name('foods.update'); // UPDATE FOOD
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy'); // DELETE FOOD
});

require __DIR__.'/auth.php';
