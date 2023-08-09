<?php

use App\Http\Controllers\ProfileController;
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

// ****** ADMIN ******
// INTERFACE
Route::get('/dashboard/matakuliah', function () {
    return view('admin/matakuliah/index');
});
Route::get('/dashboard/tambah-matkul', function () {
    return view('admin/matakuliah/tambah');
});
Route::get('/dashboard/dosen', function () {
    return view('admin/dosen/index');
});
Route::get('/dashboard/tambah-dosen', function () {
    return view('admin/dosen/tambah');
});

// Jadwal
Route::get('dashboard/kelola', function () {
    return view('admin/jadwal/kelola');
});
Route::get('dashboard/informasi', function () {
    return view('admin/jadwal/info');
});

// Edit | Tambah
Route::get('/edit-jadwal', function () {
    return view('admin/layouts/edit-data-jadwal');
});
Route::get('/tambah-jadwal', function () {
    return view('admin/layouts/tambah-data-jadwal');
});
Route::get('/edit-peralatan', function () {
    return view('admin/layouts/edit-data-peralatan');
});
Route::get('/tambah-peralatan', function () {
    return view('admin/layouts/tambah-data-peralatan');
});

// User
Route::get('/tambah-user', function () {
    return view('admin/user/tambah_user');
});
Route::get('/dashboard/profil-user', function () {
    return view('admin/user/profil_user');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
