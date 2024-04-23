<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sejarah-ldii', [InformationController::class, 'getSejarah'])->name('sejarah');
Route::get('/visi-misi', [InformationController::class, 'getVisimisi'])->name('visi-misi');
Route::get('/tentang-ldii', [InformationController::class, 'getTentang'])->name('tentang');
Route::get('/struktur-organisasi', [InformationController::class, 'getStruktur'])->name('struktur-organisasi');

Route::get('/kontak', function () {
    return view('pages.kontak');
})->name('kontak');

Route::get('/dakwah', function () {
    return view('pages.kategori');
})->name('dakwah');
