<?php

use App\Http\Controllers\ParfumController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;

// Rute utama
Route::get('/', [ParfumController::class, 'index'])->name('home');
Route::get('/detail/{id}', [ParfumController::class, 'show'])->name('parfum.detail');
Route::get('/category_pria', [ParfumController::class, 'category_pria'])->name('category_pria');
Route::get('/parfum/{id}', [ParfumController::class, 'show'])->name('parfum.show');
Route::get('/pembelian/{id}', [ParfumController::class, 'pembelianForm'])->name('pembelian.form');
Route::post('/pembelians', [PembelianController::class, 'store'])->name('pembelians.store');

/// Rute autentikasi
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin', [AuthController::class, 'admin'])->name('admin');
Route::get('/admin/pembelians', [AuthController::class, 'pembelians'])->name('admin.pembelians');
Route::get('/admin/barangs', [BarangController::class, 'index'])->name('admin.barangs');

Route::get('/admin/barangs', [BarangController::class, 'index'])->name('admin.barangs');
Route::post('/admin/barangs', [BarangController::class, 'store'])->name('admin.barangs.store');
Route::get('/admin/barangs/{id}/edit', [BarangController::class, 'edit'])->name('admin.barangs.edit');
Route::put('/admin/barangs/{id}', [BarangController::class, 'update'])->name('admin.barangs.update');
Route::delete('/admin/barangs/{id}', [BarangController::class, 'destroy'])->name('admin.barangs.destroy');



Route::post('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
