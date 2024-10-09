<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\KecamatanController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('mitra', MitraController::class);
Route::prefix('mitra')->group(function () {
    Route::get('/', [MitraController::class, 'index'])->name('mitra.index'); // Menampilkan daftar mitra
    Route::get('/create', [MitraController::class, 'create'])->name('mitra.create'); // Form untuk tambah mitra baru
    Route::post('/', [MitraController::class, 'store'])->name('mitra.store'); // Menyimpan mitra baru
    Route::get('/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit'); // Form untuk edit mitra
    Route::put('/{id}', [MitraController::class, 'update'])->name('mitra.update'); // Memperbarui mitra
    Route::delete('/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy'); // Menghapus mitra
});

Route::prefix('kerjasama')->group(function () {
    Route::get('/', [KerjasamaController::class, 'index'])->name('kerjasama.index'); // Menampilkan daftar kerjasama
    Route::get('/create', [KerjasamaController::class, 'create'])->name('kerjasama.create'); // Form untuk tambah kerjasama baru
    Route::post('/', [KerjasamaController::class, 'store'])->name('kerjasama.store'); // Menyimpan kerjasama baru
    Route::get('/{id}/edit', [KerjasamaController::class, 'edit'])->name('kerjasama.edit'); // Form untuk edit kerjasama
    Route::put('/{id}', [KerjasamaController::class, 'update'])->name('kerjasama.update'); // Memperbarui kerjasama
    Route::delete('/{id}', [KerjasamaController::class, 'destroy'])->name('kerjasama.destroy'); // Menghapus kerjasama
});




//Kecamatan




Route::prefix('admin/kecamatan')->group(function () {
    Route::get('/', [KecamatanController::class, 'index'])->name('kecamatan.index'); // Menampilkan daftar kecamatan
    Route::get('/create', [KecamatanController::class, 'create'])->name('kecamatan.create'); // Form untuk tambah kecamatan baru
    Route::post('/', [KecamatanController::class, 'store'])->name('kecamatan.store'); // Menyimpan kecamatan baru
    Route::get('/{id}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit'); // Form untuk edit kecamatan
    Route::put('/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update'); // Memperbarui kecamatan
    Route::delete('/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

});

Route::prefix('admin/jenis')->group(function () {
    Route::get('/', [JenisController::class, 'index'])->name('jenis.index'); // Menampilkan daftar jenis
    Route::get('/create', [JenisController::class, 'create'])->name('jenis.create'); // Form untuk tambah jenis baru
    Route::post('/', [JenisController::class, 'store'])->name('jenis.store'); // Menyimpan jenis baru
    Route::get('/{id}/edit', [JenisController::class, 'edit'])->name('jenis.edit'); // Form untuk edit jenis
    Route::put('/{id}', [JenisController::class, 'update'])->name('jenis.update'); // Memperbarui jenis
    Route::delete('/{id}', [JenisController::class, 'destroy'])->name('jenis.destroy');

});