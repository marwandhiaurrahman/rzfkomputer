<?php

use App\Http\Controllers\GambarProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('user.home');
});
Route::get('/produk', function () {
    return view('user.produk');
})->name('produk');
Route::get('/produkdetail', function () {
    return view('user.produk-detail');
})->name('produkdetail');
Route::get('/promo', function () {
    return view('user.promo');
})->name('promo');
Route::get('/keranjang', function () {
    return view('user.keranjang');
})->name('keranjang');
Route::get('/kontak', function () {
    return view('user.kontak');
})->name('kontak');
Route::get('/ordersuccess', function () {
    return view('user.order-success');
})->name('ordersuccess');




Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    // Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin/home');


    Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);
    Route::resource('kategori', App\Http\Controllers\KategoriController::class);
    Route::resource('produk', App\Http\Controllers\ProdukController::class);


    Route::get('produk/gambar/{produk}',[GambarProdukController::class,'index'])->name('produk.gambar');
    Route::post('produk/gambar/store/{produk}',[GambarProdukController::class,'store'])->name('gambar.store');
    Route::delete('produk/gambar/{produk}/delete/{gambarProduk}', [GambarProdukController::class,'destroy'])->name('gambar.destroy');

    Route::prefix('produk/{produk}')->group(function () {
        Route::resource('warna', App\Http\Controllers\WarnaProdukController::class);
        Route::resource('ukuran', App\Http\Controllers\UkuranProdukController::class);

    });



});
