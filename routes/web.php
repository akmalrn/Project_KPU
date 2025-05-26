<?php

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

Route::get('/gate-admin', [App\Http\Controllers\Backend\AuthController::class, 'halamanLogin'])->name('halaman.login.admin');
Route::post('/login-admin', [App\Http\Controllers\Backend\AuthController::class, 'login'])->name('login.admin');
Route::get('/logout-admin', [App\Http\Controllers\Backend\AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-admin', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/get-poin/{id}', [App\Http\Controllers\Backend\IndikatorController::class, 'getPoin']);
    Route::get('/get-indikator/{id_kategori}', [App\Http\Controllers\Backend\IndikatorController::class, 'getIndikatorByKategori']);
    Route::resource('/dashboard-admin/siswa', App\Http\Controllers\Backend\SiswaController::class);
    Route::resource('/dashboard-admin/kategori', App\Http\Controllers\Backend\KategoriIndikatorController::class);
    Route::resource('/dashboard-admin/indikator', App\Http\Controllers\Backend\IndikatorController::class);
    Route::resource('/dashboard-admin/prestasi', App\Http\Controllers\Backend\PrestasiController::class);
    Route::get('/get-indikator/{kategori_indikator_id}', [App\Http\Controllers\Backend\IndikatorController::class, 'getIndikatorByKategori']);
    Route::get('/get-poin/{id}', [App\Http\Controllers\Backend\IndikatorController::class, 'getPoin']);
    Route::get('/prestasi/pdf', [App\Http\Controllers\Backend\PrestasiController::class, 'downloadPdfAll'])->name('prestasi.pdf.all');
      Route::get('/prestasi/pdf/{id_siswa}', [App\Http\Controllers\Backend\PrestasiController::class, 'downloadPdf'])->name('prestasi.pdf');
    Route::get('/get-jam-by-kategori', [App\Http\Controllers\Backend\PrestasiController::class, 'getJamByKategori']);
    Route::delete('/prestasi/reset/unggulan', [App\Http\Controllers\Backend\PrestasiController::class, 'resetUnggulan'])->name('prestasi.reset.unggulan');
    Route::delete('/prestasi/reset/reguler', [App\Http\Controllers\Backend\PrestasiController::class, 'resetReguler'])->name('prestasi.reset.reguler');
});

Route::get('/', [App\Http\Controllers\Frontend\AuthController::class, 'halamanLogin'])->name('halaman.login');
Route::post('/login-siswa', [App\Http\Controllers\Frontend\AuthController::class, 'login'])->name('login.siswa');

Route::middleware('auth:siswa')->group(function () {
    Route::get('/dashboard-siswa', [App\Http\Controllers\Frontend\SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
});
