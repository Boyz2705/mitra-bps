<?php

use App\Http\Controllers\Subsurvey1Controller;
use App\Http\Controllers\Subsurvey2Controller;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('mitra', MitraController::class);
// Route::prefix('mitra')->group(function () {
//     Route::get('/', [MitraController::class, 'index'])->name('mitra.index'); // Menampilkan daftar mitra
//     Route::get('/create', [MitraController::class, 'create'])->name('mitra.create'); // Form untuk tambah mitra baru
//     Route::post('/', [MitraController::class, 'store'])->name('mitra.store'); // Menyimpan mitra baru
//     Route::get('/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit'); // Form untuk edit mitra
//     Route::put('/{id}', [MitraController::class, 'update'])->name('mitra.update'); // Memperbarui mitra
//     Route::delete('/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy'); // Menghapus mitra
// });

Route::prefix('surveys')->group(function () {
    Route::get('/', [SurveyController::class, 'index'])->name('surveys.index');
    Route::get('/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/surveys/{id}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/surveys/{id}', [SurveyController::class, 'update'])->name('surveys.update');

    Route::delete('/{id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');
});


Route::prefix('subsurvey1s')->group(function () {
    // Menampilkan daftar Subsurvey1
    Route::get('/', [Subsurvey1Controller::class, 'index'])->name('subsurvey1s.index');

    // Menampilkan form untuk membuat Subsurvey1 baru
    Route::get('/create', [Subsurvey1Controller::class, 'create'])->name('subsurvey1s.create');

    // Menyimpan Subsurvey1 baru
    Route::post('/', [Subsurvey1Controller::class, 'store'])->name('subsurvey1s.store');

    // Menampilkan form untuk mengedit Subsurvey1
    Route::get('/subsurvey1/{id}/edit', [Subsurvey1Controller::class, 'edit'])->name('subsurvey1s.edit');

    // Memperbarui Subsurvey1 yang ada
    Route::put('/subsurvey1s/{id}', [Subsurvey1Controller::class, 'update'])->name('subsurvey1s.update');

    // Menghapus Subsurvey1
    Route::delete('/subsurvey1s/{id}', [Subsurvey1Controller::class, 'destroy'])->name('subsurvey1s.destroy');
});


Route::prefix('subsurvey2s')->group(function () {
    // Menampilkan daftar Subsurvey2
    Route::get('/', [Subsurvey2Controller::class, 'index'])->name('subsurvey2s.index');

    // Menampilkan form untuk membuat Subsurvey2 baru
    Route::get('/create', [Subsurvey2Controller::class, 'create'])->name('subsurvey2s.create');

    // Menyimpan Subsurvey2 baru
    Route::post('/', [Subsurvey2Controller::class, 'store'])->name('subsurvey2s.store');

    // Menampilkan form untuk mengedit Subsurvey2
    Route::get('subsurvey2/{id}/edit', [Subsurvey2Controller::class, 'edit'])->name('subsurvey2s.edit');

    // Memperbarui Subsurvey2 yang ada
    Route::put('/subsurvey2/{id}', [Subsurvey2Controller::class, 'update'])->name('subsurvey2s.update');

    // Menghapus Subsurvey2
    Route::delete('/subsurvey2/{id}', [Subsurvey2Controller::class, 'destroy'])->name('subsurvey2s.destroy');
});



Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
