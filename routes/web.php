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
// Kelola data
Route::get('/kelola-peralatan', function () {
    return view('admin/kelola/kelola-perlatan');
});
Route::get('/kelola-jadwal', function () {
    return view('admin/kelola/kelola-jadwal');
});
Route::get('/kelola-grup', function () {
    return view('admin/kelola/kelola-grup');
});

// Informasi data
Route::get('/informasi-peralatan', function () {
    return view('admin/info/info-perlatan');
});
Route::get('/informasi-jadwal', function () {
    return view('admin/info/info-jadwal');
});
Route::get('/informasi-grup', function () {
    return view('admin/info/info-grup');
});

// Edit | Tambah
Route::get('/edit-jadwal', function () {
    return view('admin/layouts/edit');
});
Route::get('/tambah-jadwal', function () {
    return view('admin/layouts/tambah');
});

// User
Route::get('/tambah-user', function(){
    return view('admin/user/tambah_user');
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
