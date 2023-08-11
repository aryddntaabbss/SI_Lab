<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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

// ****** ADMIN ******
// INTERFACE
Route::get('/dashboard/matakuliah', function () {
    return view('admin/matakuliah/index');
});
Route::get('/dashboard/tambah-matkul', function () {
    return view('admin/matakuliah/tambah');
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
    return view('admin/layouts/edit-jadwal');
});
Route::get('/tambah-jadwal', function () {
    return view('admin/layouts/tambah-jadwal');
});

// User
// Route::get('/tambah-user', function () {
//     return view('admin/user/tambah_user');
// });
// Route::get('/dashboard/profil-user', function () {
//     return view('admin/user/profil_user');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {  
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile/info', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
    Route::patch('/dashboard/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::delete('/dashboard/dosen/{id}', [ProfileController::class, 'destroy'])->name('dosen.delete');
});

require __DIR__ . '/auth.php';
