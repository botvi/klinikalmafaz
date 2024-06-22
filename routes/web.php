<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    PasienController,
    DokterController,
    JanjitemuController,
    RekammedisController
};
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


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/tambah', [PasienController::class, 'tambah'])->name('pasien.tambah');
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update');
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/dokter/tambah', [DokterController::class, 'tambah'])->name('dokter.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

Route::get('/rekammedis', [RekammedisController::class, 'index'])->name('rekam_medis.index');
Route::get('/rekammedis/tambah', [RekammedisController::class, 'tambah'])->name('rekam_medis.create');
Route::post('/rekammedis', [RekammedisController::class, 'store'])->name('rekam_medis.store');
Route::get('/rekammedis/{id}/edit', [RekammedisController::class, 'edit'])->name('rekam_medis.edit');
Route::put('/rekammedis/{id}', [RekammedisController::class, 'update'])->name('rekam_medis.update');
Route::delete('/rekammedis/{id}', [RekammedisController::class, 'destroy'])->name('rekam_medis.destroy');

Route::get('/janjitemu', [JanjitemuController::class, 'index'])->name('janjitemu.index');
Route::get('/janjitemu/tambah', [JanjitemuController::class, 'tambah'])->name('janjitemu.tambah');
Route::post('/janjitemu', [JanjitemuController::class, 'store'])->name('janjitemu.store');
Route::get('/janjitemu/{id}/edit', [JanjitemuController::class, 'edit'])->name('janjitemu.edit');
Route::put('/janjitemu/{id}', [JanjitemuController::class, 'update'])->name('janjitemu.update');
Route::delete('/janjitemu/{id}', [JanjitemuController::class, 'destroy'])->name('janjitemu.destroy');