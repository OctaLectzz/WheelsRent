<?php

use App\Models\Armada;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;

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

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Mobil
Route::get('/mobil', [TransaksiController::class, 'mobil']);

// Transaksi
Route::prefix('transaksi')->controller(TransaksiController::class)->group(function() {
    Route::get('/', 'index')->name('transaksi.index')->middleware(['auth', 'verified']);
    Route::get('/bayar/{armadaId}', 'create')->name('transaksi.create')->middleware(['auth', 'verified']);
    Route::post('/bayar/{armadaId}', 'store')->name('transaksi.store')->middleware(['auth', 'verified']);
});

Route::middleware(['auth', 'verified'])->group(function() {

    // Bayar
    Route::controller(BayarController::class)->group(function() {
        Route::post('/transaksi/{transaksiId}', 'store')->name('bayar.store');
        Route::put('/transaksi/{transaksi}', 'cancel')->name('bayar.cancel');
        Route::put('/dashboard/transaksi/proses/{transaksi}', 'setuju')->name('bayar.setuju');
    });

    // Profile
    Route::get('/profile', function () {
        $user = auth()->user();
        return view('profile', compact('user'));
    })->name('profile');

});

// -----Welcome----- //




// -----Dashboard----- //

Auth::routes();
Route::prefix('dashboard')->middleware(['auth', 'Admin'])->group(function() {

    // Profile
    Route::prefix('profile')->controller(ProfileController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard.profile');
        Route::put('/{id}', 'update')->name('profile.update');
    });

    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Transaksi
    Route::prefix('transaksi')->controller(TransaksiController::class)->group(function() {
        // Index //
        Route::get('/semuaTransaksi', 'semua')->name('transaksi.semua');
        Route::get('/belumBayar', 'belumBayar')->name('transaksi.belumBayar');
        Route::get('/proses', 'proses')->name('transaksi.proses');
        Route::get('/selesai', 'selesai')->name('transaksi.selesai');
        Route::get('/batal', 'batal')->name('transaksi.batal');
        // List //
        Route::get('/semuaTransaksi/list',  'semualist')->name('transaksi.semualist');
        Route::get('/belumBayar/list',  'belumBayarlist')->name('transaksi.belumBayarlist');
        Route::get('/proses/list',  'proseslist')->name('transaksi.proseslist');
        Route::get('/selesai/list',  'selesailist')->name('transaksi.selesailist');
        Route::get('/batal/list',  'batallist')->name('transaksi.batallist');
    });

    // Master Mobil
    Route::prefix('mobil')->controller(MobilController::class)->group(function() {
        Route::get('/', 'index')->name('mobil.index');
        Route::get('/mobil',  'list')->name('mobil.list');
        Route::post('/', 'store')->name('mobil.create');
        Route::put('/{mobil}', 'update')->name('mobil.edit');
        Route::delete('/{mobil}', 'destroy')->name('mobil.destroy');
    });

    // Master Supir
    Route::prefix('supir')->controller(SupirController::class)->group(function() {
        Route::get('/', 'index')->name('supir.index');
        Route::get('/supir',  'list')->name('supir.list');
        Route::post('/', 'store')->name('supir.create');
        Route::put('/{supir}', 'update')->name('supir.edit');
        Route::delete('/{supir}', 'destroy')->name('supir.destroy');
    });

    // Master Armada
    Route::prefix('armada')->controller(ArmadaController::class)->group(function() {
        Route::get('/', 'index')->name('armada.index');
        Route::get('/armada',  'list')->name('armada.list');
        Route::post('/', 'store')->name('armada.create');
    });

});

// -----Dashboard----- //