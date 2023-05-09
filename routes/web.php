<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\ProfileController;

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




// -----Welcome----- //

// Halaman Utama //
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Profile //
Route::get('/profile', function () {
    $user = auth()->user();
    return view('profile', compact('user'));
})->middleware(['auth', 'verified'])->name('profile');

// -----Welcome----- //




// -----Dashboard----- //

Auth::routes();
Route::prefix('dashboard')->middleware(['auth', 'verified', 'Admin'])->group(function() {

    // Profile //
    Route::prefix('profile')->controller(ProfileController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard.profile');
        Route::put('/{id}', 'update')->name('profile.update');
    });

    // Home //
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Master Mobil //
    Route::prefix('mobil')->controller(MobilController::class)->group(function() {
        Route::get('/', 'index')->name('mobil.index');
        Route::get('/mobil',  'list')->name('mobil.list');
        Route::post('/', 'store')->name('mobil.create');
        Route::put('/{mobil}', 'update')->name('mobil.edit');
        Route::delete('/{mobil}', 'destroy')->name('mobil.destroy');
    });

    // Master Supir //
    Route::prefix('supir')->controller(SupirController::class)->group(function() {
        Route::get('/', 'index')->name('supir.index');
        Route::get('/supir',  'list')->name('supir.list');
        Route::post('/', 'store')->name('supir.create');
        Route::put('/{supir}', 'update')->name('supir.edit');
        Route::delete('/{supir}', 'destroy')->name('supir.destroy');
    });

});

// -----Dashboard----- //