<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
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


Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');



//Kecamatan




Route::prefix('admin/kecamatan')->group(function () {
    Route::get('/', [KecamatanController::class, 'index'])->name('kecamatan.index'); // Menampilkan daftar kecamatan
    Route::get('/create', [KecamatanController::class, 'create'])->name('kecamatan.create'); // Form untuk tambah kecamatan baru
    Route::post('/', [KecamatanController::class, 'store'])->name('kecamatan.store'); // Menyimpan kecamatan baru
    Route::get('/{id}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit'); // Form untuk edit kecamatan
    Route::put('/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update'); // Memperbarui kecamatan
    Route::delete('/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

});