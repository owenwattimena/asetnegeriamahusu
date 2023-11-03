<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaControler;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengelolahanController;
use App\Http\Controllers\PengelolahController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\SatuanController;
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

Route::get('/', [BerandaControler::class, 'index'])->name('beranda');
Route::get('/keluar', [AuthController::class, 'logout'])->name('logout');

Route::get('/masuk', [AuthController::class, 'login'])->name('login');
Route::post('/masuk', [AuthController::class, 'doLogin'])->name('login.do');

Route::prefix('master')->group(function(){
    Route::prefix('satuan')->group(function(){
        Route::get('/', [SatuanController::class, 'index'])->name('master.satuan');
        Route::post('/', [SatuanController::class, 'create'])->name('master.satuan.create');
        Route::put('/{slug}', [SatuanController::class, 'update'])->name('master.satuan.update');
        Route::delete('/{slug}', [SatuanController::class, 'delete'])->name('master.satuan.delete');
    });
    Route::prefix('kategori')->group(function(){
        Route::get('/', [KategoriController::class, 'index'])->name('master.kategori');
        Route::post('/', [KategoriController::class, 'create'])->name('master.kategori.create');
        Route::put('/{slug}', [KategoriController::class, 'update'])->name('master.kategori.update');
        Route::delete('/{slug}', [KategoriController::class, 'delete'])->name('master.kategori.delete');
    });
});
Route::prefix('perencanaan')->group(function(){
    Route::get('/', [PerencanaanController::class, 'index'])->name('perencanaan');
    Route::post('/', [PerencanaanController::class, 'create'])->name('perencanaan.create');
    Route::put('/{id}', [PerencanaanController::class, 'update'])->name('perencanaan.update');
    Route::delete('/{id}', [PerencanaanController::class, 'delete'])->name('perencanaan.delete');
});
Route::prefix('aset')->group(function(){
    Route::get('/', [AsetController::class, 'index'])->name('aset');
    Route::post('/', [AsetController::class, 'create'])->name('aset.create');
    Route::put('/{id}', [AsetController::class, 'update'])->name('aset.update');
    Route::delete('/{id}', [AsetController::class, 'delete'])->name('aset.delete');
});
Route::prefix('pengelolah')->group(function(){
    Route::get('/', [PengelolahController::class, 'index'])->name('pengelolah');
    Route::post('/', [PengelolahController::class, 'create'])->name('pengelolah.create');
    Route::put('/{id}', [PengelolahController::class, 'update'])->name('pengelolah.update');
    Route::delete('/{id}', [PengelolahController::class, 'delete'])->name('pengelolah.delete');
});
Route::prefix('pengelolahan')->group(function(){
    Route::get('/', [PengelolahanController::class, 'index'])->name('pengelolahan');
    Route::post('/', [PengelolahanController::class, 'create'])->name('pengelolahan.create');
    Route::put('/{id}', [PengelolahanController::class, 'update'])->name('pengelolahan.update');
    Route::delete('/{id}', [PengelolahanController::class, 'delete'])->name('pengelolahan.delete');
});
