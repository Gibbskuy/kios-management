<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');
Route::get('/kategori/{id}/filter', [KategoriController::class, 'filterByCategory'])->name('kategori.filter');
Route::resource('profile', App\Http\Controllers\ProfileController::class)->middleware('auth');
Route::resource('artikel', App\Http\Controllers\ArtikelController::class)->middleware('auth');

Route::get('/password/edit', [PasswordController::class, 'edit'])->middleware('auth')->name('password.edit');
Route::post('/password/update', [PasswordController::class, 'update'])->middleware('auth')->name('password.update1');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/artikel/pending', [ArtikelController::class, 'pendingartikel'])->name('admin.artikel.pending');
    Route::post('/admin/artikel/{id}/approve', [ArtikelController::class, 'approveartikel'])->name('admin.artikel.approve');
    Route::post('/admin/artikel/{id}/reject', [ArtikelController::class, 'rejectartikel'])->name('admin.artikel.reject');
    Route::resource('content', App\Http\Controllers\ContentController::class);

});
