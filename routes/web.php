<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  HomeController,
  KategoriController,
  TransaksiController,
  RegisterController
};
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('/');
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register/store', [App\Http\Controllers\RegisterController::class, 'data'])->name('register.store');

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'register'=>false,
]);
Route::resources([
    'home' => App\Http\Controllers\HomeController::class,
    'transaksi' => App\Http\Controllers\TransaksiController::class,
    'kategori' => App\Http\Controllers\KategoriController::class
]);

//datatable
Route::post('/get/datatables/kategori', [KategoriController::class, 'getDtRowData'])->name('get.datatables.kategori');
Route::post('/get/datatables/transaksi', [TransaksiController::class, 'getDtRowData'])->name('get.datatables.transaksi');

//drowpdown
Route::post('/get/dropdown/kategori', [KategoriController::class, 'getDropdown'])->name('get.dropdown.kategori');

//data home
Route::post('/data/home', [HomeController::class, 'data'])->name('data.home');