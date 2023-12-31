<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\RegisteredUSerController;
use App\Http\Controllers\UserController;
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
// ******* USER *******

Route::get('/', [DashboardController::class, 'mainPage'])->name('mainpage');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// ****** ADMIN ******
Route::prefix('dashboard')->middleware(['auth', 'IsAdmin'])->group(function () {
    // INTERFACE
    // Jadwal
    Route::get('/kelola-jadwal', [JadwalController::class, 'indexKelola'])->name('kelolaJadwal.index');
    Route::post('/kelola-jadwal', [JadwalController::class, 'algoritmaGen'])->name('kelolaJadwal.create');
    Route::patch('/kelola-jadwal/{jadwal}', [JadwalController::class, 'updateKelola'])->name('kelolaJadwal.update');
    Route::post('/kelola-jadwal/next', [JadwalController::class, 'nextGeneration'])->name('kelolaJadwal.next');
});


// ****** DASHBOARD ******
Route::prefix('dashboard')->middleware('auth')->group(function () {

    // Mata kuliah
    Route::get('/matakuliah', [MatkulController::class, 'index'])->name('matkul.index');

    Route::get('/matakuliah/tambah', [MatkulController::class, 'create'])->name('matkul.create');

    Route::post('/matakuliah/tambah', [MatkulController::class, 'store'])->name('matkul.store');

    Route::get('/matakuliah/{matkul}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');

    Route::patch('/matakuliah/{matkul}/edit', [MatkulController::class, 'update'])->name('matkul.update');

    Route::delete('/matakuliah/{matkul}', [MatkulController::class, 'destroy'])->name('matkul.delete');


    // Edit Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile/info', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');

    Route::patch('/profile/password', [ProfileController::class, 'updatePass'])->name('profile.updatePass');
});


require __DIR__ . '/auth.php';
