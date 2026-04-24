<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\produkcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', function(){
    return ("ini adalah halaman produk");
});

Route::get('/produk', [produkcontroller::class, 'index']);

Route::get('/showproduk', [produkcontroller::class, 'show']);

Route::get('/viewproduk', [produkcontroller::class, 'view']);