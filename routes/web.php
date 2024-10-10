<?php

use App\Http\Controllers\Subsurvey1Controller;
use App\Http\Controllers\Subsurvey2Controller;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\KerjasamaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;


Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/mykerjasama', [KerjasamaController::class, 'kerjasama'])->name('mykerjasama');
Route::get('/kerjasama/pivot-report', [KerjasamaController::class, 'pivotReport'])->name('kerjasama.pivot_report');
Route::get('/kerjatidaktepat', [KerjasamaController::class, 'index2'])->name('kerjasama.index2');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin/mitra')->group(function () {
    Route::get('/', [MitraController::class, 'index'])->name('mitra.index'); // Menampilkan daftar mitra
    Route::get('/create', [MitraController::class, 'create'])->name('mitra.create'); // Form untuk tambah mitra baru
    Route::post('/', [MitraController::class, 'store'])->name('mitra.store'); // Menyimpan mitra baru
    Route::get('/{id}/edit', [MitraController::class, 'edit'])->name('mitra.edit'); // Form untuk edit mitra
    Route::put('/{id}', [MitraController::class, 'update'])->name('mitra.update'); // Memperbarui mitra
    Route::delete('/{id}', [MitraController::class, 'destroy'])->name('mitra.destroy'); // Menghapus mitra
});

Route::prefix('surveys')->group(function () {
    Route::get('/', [SurveyController::class, 'index'])->name('surveys.index');
    Route::get('/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/surveys/{id}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/surveys/{id}', [SurveyController::class, 'update'])->name('surveys.update');
    Route::delete('/{id}', [SurveyController::class, 'destroy'])->name('surveys.destroy');
});

Route::prefix('subsurvey1s')->group(function () {
    Route::get('/', [Subsurvey1Controller::class, 'index'])->name('subsurvey1s.index');
    Route::get('/create', [Subsurvey1Controller::class, 'create'])->name('subsurvey1s.create');
    Route::post('/', [Subsurvey1Controller::class, 'store'])->name('subsurvey1s.store');
    Route::get('/subsurvey1/{id}/edit', [Subsurvey1Controller::class, 'edit'])->name('subsurvey1s.edit');
    Route::put('/subsurvey1s/{id}', [Subsurvey1Controller::class, 'update'])->name('subsurvey1s.update');
    Route::delete('/subsurvey1s/{id}', [Subsurvey1Controller::class, 'destroy'])->name('subsurvey1s.destroy');
});

Route::prefix('kerjasama')->group(function () {
    Route::get('/', [KerjasamaController::class, 'index'])->name('kerjasama.index'); // Menampilkan daftar kerjasama
    Route::get('/create', [KerjasamaController::class, 'create'])->name('kerjasama.create'); // Form untuk tambah kerjasama baru
    Route::post('/', [KerjasamaController::class, 'store'])->name('kerjasama.store'); // Menyimpan kerjasama baru
    Route::get('/{id}/edit', [KerjasamaController::class, 'edit'])->name('kerjasama.edit'); // Form untuk edit kerjasama
    Route::put('/{id}', [KerjasamaController::class, 'update'])->name('kerjasama.update'); // Memperbarui kerjasama
    Route::delete('/kerjasama/kerjasama/{id}', [KerjasamaController::class, 'destroy'])->name('kerjasama.destroy'); // Menghapus kerjasama
});

Route::prefix('subsurvey2s')->group(function () {
    // Menampilkan daftar Subsurvey2
    Route::get('/', [Subsurvey2Controller::class, 'index'])->name('subsurvey2s.index');
    Route::get('/create', [Subsurvey2Controller::class, 'create'])->name('subsurvey2s.create');
    Route::post('/', [Subsurvey2Controller::class, 'store'])->name('subsurvey2s.store');
    Route::get('subsurvey2/{id}/edit', [Subsurvey2Controller::class, 'edit'])->name('subsurvey2s.edit');
    Route::put('/subsurvey2/{id}', [Subsurvey2Controller::class, 'update'])->name('subsurvey2s.update');
    Route::delete('/subsurvey2/{id}', [Subsurvey2Controller::class, 'destroy'])->name('subsurvey2s.destroy');
});

Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


Route::prefix('admin/kecamatan')->group(function () {
    Route::get('/', [KecamatanController::class, 'index'])->name('kecamatan.index'); // Menampilkan daftar kecamatan
    Route::get('/create', [KecamatanController::class, 'create'])->name('kecamatan.create'); // Form untuk tambah kecamatan baru
    Route::post('/', [KecamatanController::class, 'store'])->name('kecamatan.store'); // Menyimpan kecamatan baru
    Route::get('/{id}/edit', [KecamatanController::class, 'edit'])->name('kecamatan.edit'); // Form untuk edit kecamatan
    Route::put('/{id}', [KecamatanController::class, 'update'])->name('kecamatan.update'); // Memperbarui kecamatan
    Route::delete('/{id}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

});

//Jenis

Route::prefix('admin/jenis')->group(function () {
    Route::get('/', [JenisController::class, 'index'])->name('jenis.index'); // Menampilkan daftar jenis
    Route::get('/create', [JenisController::class, 'create'])->name('jenis.create'); // Form untuk tambah jenis baru
    Route::post('/', [JenisController::class, 'store'])->name('jenis.store'); // Menyimpan jenis baru
    Route::get('/{id}/edit', [JenisController::class, 'edit'])->name('jenis.edit'); // Form untuk edit jenis
    Route::put('/{id}', [JenisController::class, 'update'])->name('jenis.update'); // Memperbarui jenis
    Route::delete('/{id}', [JenisController::class, 'destroy'])->name('jenis.destroy');

});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/kerjasamaku', function () {
    return view('kerjasamaku');
});


Route::get('/kerjasamaku', [KerjasamaController::class, 'index3'])->name('kerjasamaku.index');
Route::get('/mitra', [MitraController::class, 'index2'])->name('mitra.index');
