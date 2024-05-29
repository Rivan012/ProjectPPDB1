<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardWelcomeController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardWelcomeController::class, 'index']);


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/dashboard/gelombang/create', [GelombangController::class, 'store'])->name('gelombang.store');
    Route::put('/dashboard/gelombang/update', [GelombangController::class, 'update'])->name('gelombang.edit');
    Route::delete('/dashboard/admin', [GelombangController::class, 'destroy'])->name('gelombang.delete');
    Route::get('/dashboard/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.admin');
    Route::put('/dashboard/pengumuman', [PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::post('/dashboard/pengumuman/create', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::delete('/dashboard/pengumuman', [PengumumanController::class, 'delete'])->name('pengumuman.delete');


    Route::get('/dashboard/sekolah', [WebConfigController::class, 'index'])->name('profile.sekolah');
    Route::put('/dashboard/sekolah/post', [WebConfigController::class, 'update'])->name('web.store');

    Route::get('/dashboard/seo', [\App\Http\Controllers\SeoController::class, 'index'])->name('profile.seo');
    Route::put('/dashboard/seo', [\App\Http\Controllers\SeoController::class, 'store'])->name('seo.store');
});
Route::middleware('auth', 'verified', 'petugas')->group(function () {
    Route::get('/dashboard/petugas', function () {
        return view('petugas.index');
    })->name('petugas');
});
// SISWA DASHBOARD ROUTES
Route::middleware('auth', 'verified', 'siswa')->group(function () {
    Route::get('/dashboard/siswa', [\App\Http\Controllers\DashSiswaController::class, 'tampildashsiswa'])->name('siswa');
    Route::post('/dashboard/siswa', [\App\Http\Controllers\SiswaController::class, 'biodatasimpan'])->name('simpan-biodata');
    Route::put('/dashboard/siswa/biodata/up', [\App\Http\Controllers\SiswaController::class, 'biodataupdate'])->name('update-biodata');
    Route::get('dashboard/siswa/foto', [\App\Http\Controllers\SiswaController::class, 'foto'])->name('up-foto');
    Route::post('dashboard/siswa/foto', [\App\Http\Controllers\SiswaController::class, 'fotoup'])->name('up-foto');
    Route::put('dashboard/siswa/fotoup', [\App\Http\Controllers\SiswaController::class, 'fotoupdate'])->name('up-foto-update');
});
Route::middleware('auth', 'verified', 'adminorpetugas')->group(function () {
    Route::get('dashboard/siswa/daftar', [\App\Http\Controllers\SiswaController::class, 'index'])->name('siswapage');
    Route::post('dashboard/siswa/daftar', [\App\Http\Controllers\SiswaController::class, 'store'])->name('nilai-siswa');
    Route::put('dashboard/siswa/terima', [\App\Http\Controllers\SiswaController::class, 'updateterima'])->name('terima');
    Route::put('dashboard/siswa/tolak', [\App\Http\Controllers\SiswaController::class, 'updatetolak'])->name('tolak');
});

require __DIR__ . '/auth.php';
