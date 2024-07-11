<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    PasienController,
    DokterController,
    JanjitemuController,
    LaporanController,
    LayananController,
    LoginController,
    PenyakitController,
    PerawatController,
    RekammedisController,
    WebsiteController,
    BeritaController
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

// login logout
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

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

// perawat
Route::get('/perawat', [PerawatController::class, 'index'])->name('perawat.index');
Route::get('/perawat/create', [PerawatController::class, 'create'])->name('perawat.create');
Route::get('/perawat/update/{id}', [PerawatController::class, 'create'])->name('perawat.edit');
Route::post('/perawat', [PerawatController::class, 'store'])->name('perawat.store');
Route::delete('/perawat/{perawat}', [PerawatController::class, 'destroy'])->name('perawat.destroy');

// layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
Route::get('/layanan/update/{id}', [LayananController::class, 'edit'])->name('layanan.edit');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::delete('/layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');


// penykit
Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
Route::get('/penyakit/create', [PenyakitController::class, 'create'])->name('penyakit.create');
Route::get('/penyakit/update/{id}', [PenyakitController::class, 'edit'])->name('penyakit.edit');
Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
Route::delete('/penyakit/{penyakit}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');

// laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/lp_pasien_cetak', [LaporanController::class, 'cetak_pasien'])->name('laporan.lp_pasien_cetak');
Route::get('/lp_catatan/{id}', [LaporanController::class, 'catatan'])->name('laporan.catatan');
Route::get('/lp_catatan_cetak/{id}', [LaporanController::class, 'cetak_catatan'])->name('laporan.lp_catatan_cetak');


// berita
Route::get('beritas', [BeritaController::class, 'index'])->name('beritas.index');
Route::get('beritas/create', [BeritaController::class, 'create'])->name('beritas.create');
Route::post('beritas', [BeritaController::class, 'store'])->name('beritas.store');
Route::get('beritas/{berita}', [BeritaController::class, 'show'])->name('beritas.show');
Route::get('beritas/{berita}/edit', [BeritaController::class, 'edit'])->name('beritas.edit');
Route::put('beritas/{berita}', [BeritaController::class, 'update'])->name('beritas.update');
Route::delete('beritas/{berita}', [BeritaController::class, 'destroy'])->name('beritas.destroy');
});


// WEBSITE
Route::get('/', [WebsiteController::class, 'index'])->name('web.index');
Route::get('/about', [WebsiteController::class, 'about'])->name('web.about');
Route::get('/news', [WebsiteController::class, 'berita'])->name('berita.index');
Route::get('/news/{id}', [WebsiteController::class, 'showberita'])->name('berita.show');
// WEBSITE