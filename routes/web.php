<?php

use App\Http\Controllers\MasterHargaSampahController;
use App\Http\Controllers\MasterJenisSampahController;
use App\Http\Controllers\MasterNasabahController;
use App\Http\Controllers\MasterSatuanController;
use App\Http\Controllers\TransaksiNasabahController;
use App\Http\Controllers\ProfileController;
use App\Models\MasterJenisSampah;
use App\Models\MasterNasabah;
use App\Models\MasterSatuan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/mikrotik', [MikrotikController::class, 'index'])->name('mikrotik.index');
    // Route::get('/mikrotik/create', [MikrotikController::class, 'create'])->name('mikrotik.create');
    // Route::get('/mikrotik/edit/{id}', [MikrotikController::class, 'edit'])->name('mikrotik.edit')->where('id', '[0-9]+');

    // Route::get('/mikrotik/pppoe', [MikrotikController::class, 'pppoe'])->name('mikrotik.pppoe');

    // Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    // Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    // Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    // Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit')->where('id', '[0-9]+');
    // Route::put('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update')->where('id', '[0-9]+');

    Route::get('manajemen/nasabah', [MasterNasabahController::class, 'index'])->name('nasabah.index');
    Route::get('manajemen/nasabah/create', [MasterNasabahController::class, 'create'])->name('nasabah.create');
    Route::post('manajemen/nasabah/store', [MasterNasabahController::class, 'store'])->name('nasabah.store');
    Route::get('manajemen/nasabah/edit/{id}', [MasterNasabahController::class, 'edit'])->name('nasabah.edit')->where('id', '[0-9]+');
    Route::put('manajemen/nasabah/update/{id}', [MasterNasabahController::class, 'update'])->name('nasabah.update')->where('id', '[0-9]+');

    Route::get('manajemen/transaksi', [TransaksiNasabahController::class, 'index'])->name('transaksi.index');
    Route::get('manajemen/transaksi/create', [TransaksiNasabahController::class, 'create'])->name('transaksi.create');
    Route::post('manajemen/transaksi/store', [TransaksiNasabahController::class, 'store'])->name('transaksi.store');
    Route::get('manajemen/transaksi/edit/{id}', [TransaksiNasabahController::class, 'edit'])->name('transaksi.edit')->where('id', '[0-9]+');
    Route::put('manajemen/transaksi/update/{id}', [TransaksiNasabahController::class, 'update'])->name('transaksi.update')->where('id', '[0-9]+');

    Route::get('bank/satuan', [MasterSatuanController::class, 'index'])->name('satuan.index');
    Route::get('bank/satuan/create', [MasterSatuanController::class, 'create'])->name('satuan.create');
    Route::post('bank/satuan/store', [MasterSatuanController::class, 'store'])->name('satuan.store');
    Route::get('bank/satuan/edit/{id}', [MasterSatuanController::class, 'edit'])->name('satuan.edit')->where('id', '[0-9]+');
    Route::put('bank/satuan/update/{id}', [MasterSatuanController::class, 'update'])->name('satuan.update')->where('id', '[0-9]+');

    Route::get('bank/jenis', [MasterJenisSampahController::class, 'index'])->name('jenis.index');
    Route::get('bank/jenis/create', [MasterJenisSampahController::class, 'create'])->name('jenis.create');
    Route::post('bank/jenis/store', [MasterJenisSampahController::class, 'store'])->name('jenis.store');
    Route::get('bank/jenis/edit/{id}', [MasterJenisSampahController::class, 'edit'])->name('jenis.edit')->where('id', '[0-9]+');
    Route::put('bank/jenis/update/{id}', [MasterJenisSampahController::class, 'update'])->name('jenis.update')->where('id', '[0-9]+');

    Route::get('bank/harga', [MasterHargaSampahController::class, 'index'])->name('harga.index');
    Route::get('bank/harga/create', [MasterHargaSampahController::class, 'create'])->name('harga.create');
    Route::post('bank/harga/store', [MasterHargaSampahController::class, 'store'])->name('harga.store');
    Route::get('bank/harga/edit/{id}', [MasterHargaSampahController::class, 'edit'])->name('harga.edit')->where('id', '[0-9]+');
    Route::put('bank/harga/update/{id}', [MasterHargaSampahController::class, 'update'])->name('harga.update')->where('id', '[0-9]+');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



require __DIR__.'/auth.php';
