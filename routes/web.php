<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraController;
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
