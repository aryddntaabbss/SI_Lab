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
// INTERFACE

// MATA KULIAH
Route::prefix('dashboard/matakuliah')->group(function () {

    Route::get('/', [MatkulController::class, 'index'])->name('matkul.index');

    Route::get('/tambah', [MatkulController::class, 'create'])->name('matkul.create');

    Route::post('/tambah', [MatkulController::class, 'store'])->name('matkul.store');

    Route::get('/{matkul}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');

    Route::patch('/{matkul}/edit', [MatkulController::class, 'update'])->name('matkul.update');

    Route::delete('/{matkul}', [MatkulController::class, 'destroy'])->name('matkul.delete');
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
