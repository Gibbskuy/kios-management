<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;


Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');
Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');
Route::resource('profile', App\Http\Controllers\ProfileController::class)->middleware('auth');
Route::resource('hobi', App\Http\Controllers\HobiController::class);

Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

