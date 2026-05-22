<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\produkcontroller;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function(){
    return ("ini adalah halaman produk");
});

Route::get('/produk', [produkcontroller::class, 'index']);

Route::get('/showproduk', [produkcontroller::class, 'show']);

Route::get('/viewproduk', [produkcontroller::class, 'view']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
Route::get('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy']);