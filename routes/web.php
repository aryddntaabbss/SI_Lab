<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatkulController;
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

Route::get('/', function () {
    return view('pages.index');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



// ****** ADMIN ******
Route::prefix('admin/dashboard')->middleware(['auth', 'IsAdmin'])->group(function () {
    // INTERFACE
    // Dosen

    // Mata kuliah
    Route::get('/matakuliah', [MatkulController::class, 'index'])->name('matkul.index');

    Route::get('/matakuliah/tambah', [MatkulController::class, 'create'])->name('matkul.create');

    Route::post('/matakuliah/tambah', [MatkulController::class, 'store'])->name('matkul.store');

    Route::get('/matakuliah/{matkul}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');

    Route::patch('/matakuliah/{matkul}/edit', [MatkulController::class, 'update'])->name('matkul.update');

    Route::delete('/matakuliah/{matkul}', [MatkulController::class, 'destroy'])->name('matkul.delete');

});








// Jadwal
Route::get('dashboard/kelola', function () {
    return view('admin/jadwal/kelola');
});
Route::get('dashboard/informasi', function () {
    return view('admin/jadwal/info');
});

// Edit |
Route::get('/edit-jadwal', function () {
    return view('admin/layouts/edit-jadwal');
});
Route::get('/tambah-jadwal', function () {
    return view('admin/layouts/tambah-jadwal');
});

require __DIR__ . '/auth.php';
