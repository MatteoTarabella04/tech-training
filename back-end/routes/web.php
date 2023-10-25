<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\DishController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// REDIRECT TO LOGIN PAGE WHEN A GUEST LANDS ON THE HOMEPAGE
Route::get('/', function () {
    return view('auth.login');
});

// REDIRECT TO DASHBOARD WHEN A REGISTERED USER LANDS ON THE HOMEPAGE
Route::get('/', function () {
    return to_route('admin.dashboard');
})->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        //TODO: add dashboard controller
        Route::resource('/restaurant', RestaurantController::class);
        Route::resource('/dish', DishController::class)->parameters([
            'dishes' => 'dishes:id',
        ]);
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
